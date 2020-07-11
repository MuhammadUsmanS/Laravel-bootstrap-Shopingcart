<?php

namespace App\Http\Controllers;

use App\Products;
use App\Cart;
use App\User;

use App\Order;
use App\OrderItem;
use App\Payment;
use App\UserMeta;
use Stripe\Stripe;
use Stripe\Charge;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ProductController extends Controller 
{   

public function __construct(){

    $this->middleware('auth:web', ['except'=> ['getProducts' , 'productDetail']]);
    // $this->middleware('guest:admin', ['except'=>['logout']]);

    }

public function getProducts(){

    $products = Products::all();//  fetch  all data from products table db and give it 											to produsts variable 
	return view('shop.index',['products'=> $products]);//give itto url varible prodcts
    }

    //MINIMIZE  addToCart()  by master 
public function addToCart($productId){

    $user = Auth::user();//Authenticate user 
    $customerId = Auth::guard('web')->user()->id;
        //Cart Product Object 
    $cartItemObject = Cart::where('productId',$productId)->where('customerId',$customerId);

    $item = $cartItemObject->first();// first() method return only one " record " 


    if (empty($item)) {
        cart::create(['productId' => $productId,'customerId'=> $user->id,'productQuantity' => 1 ]);
    }
    else {

        $updateQuantity = $item->productQuantity = $item->productQuantity+1; //

        $item->where('productId', $productId)->update(['productQuantity' => $updateQuantity]);

        return redirect()->back()->with('qUpdate', 'Product Added "Again" ! ');            
        }

        return redirect()->back()->with('success', 'Product Added to cart ! ');
}

/////////////////////////////////////////////////////////////////////
    //       show  cart  products
/////////////////////////////////////////////////////////////////////
    
public  function productDetail($productId){

    $products = Products::all();

    $productObject = Products::where('id',$productId);
    $product = $productObject->first();

    return  view('shop.productDetail' , ['product' => $product , 'products' => $products]);

    }
/////////////////////////////////////////////////////////////////////
    //       show  cart  products
/////////////////////////////////////////////////////////////////////

public function getCart(){

    $user = Auth::user();
    $customerId = Auth::guard('web')->user()->id;
    //                              Relationship    
    $cartItemObject = Cart::with('products','users')->where('customerId',$customerId)->get();

    $count = count($cartItemObject)    ;
    session()->put('count', $count);
    
    return  view('shop.cart' , ['cartItems' => $cartItemObject]);

    }


/////////////////////////////////////////////////////////////////////
    //       readdir()move product form cart 
/////////////////////////////////////////////////////////////////////

public function removeFromCart(Request $request){

    $cartId = $request->cartId ;

    if(!empty($cartId)){    // cartId   coming frm ajax cartproducts.blade  
                               //  $cart = session()->get('cart'); 
        $cartProduct = Cart::find($cartId);
        $cartProduct->delete();

        session()->flash('success', 'Product removed successfully');


        }
    }
/////////////////////////////////////////////////////////////////////
    //       show  cart  products
/////////////////////////////////////////////////////////////////////


public function updateCart(Request $request){
    
    $user = Auth::user();
    $userId = $user->id ;

    if(!empty($request->cartId  AND  $request->productQuantity)){ // coming from ajax

        $cartItemObject = Cart::where('cartId',$request->cartId)->where('customerId',$userId);

        $item = $cartItemObject->first();// first() method return only one " record " 

    if (!empty($item)) {
            
        $updateQuantity = $item->productQuantity = $request->productQuantity; //

        $item->where('cartId', $request->cartId)->update(['productQuantity' => $updateQuantity]);            
        session()->flash('success', 'Cart updated successfully');    

        }

            }

    }

////////////////////////////////////////////////////////////////////////////////
    //   show customer information form 
////////////////////////////////////////////////////////////////////////////////    

public function getInformation(){

    $user = Auth::user();
    $customerId = Auth::guard('web')->user()->id;
    //                              Relationship    
    $cartItemObject = Cart::with('products','users')->where('customerId',$customerId)->get();    

    return  view('shop.information' , ['cartItems' => $cartItemObject]);
    }


////////////////////////////////////////////////////////////////////////////////
    //   show getpayment form
////////////////////////////////////////////////////////////////////////////////    


public function getPayment(){

    $user = Auth::user();

    $customerId = Auth::guard('web')->user()->id;

    $cartItemObject = Cart::with('products','users')->where('customerId',$customerId)->get();    

    return view('shop.payment', ['cartItems' => $cartItemObject]);
}

////////////////////////////////////////////////////////////////////////////////
    //   Save customer information form 
/////////////////////////////////////////////

public function postPayment(Request $request){

    $request->validate([ 
        'email'    => 'email|required',
        'firstname'=> 'required|max:255',   'username' =>  'required|max:255',
        'lastname' =>  'required|max:255',  'country'  =>  'required|max:255',
        'state'    =>  'required|max:255',  'city'     =>  'required|max:255',
        'address'  =>  'required|max:255',  'postalcode'=>'required|max:255',
        'phone'     =>'required|max:255'
    ]);

    $userId = Auth::guard('web')->user()->id ;         
    $cartItemObject = Cart::with('products' ,'users')->where('customerId',$userId)->get();

    if(!empty($cartItemObject)){
    $subTotal = 0 ; 
        foreach ($cartItemObject as $total) {
           $subTotal = $subTotal + $total->productQuantity*$total->products->price;
        }


        Stripe::setApiKey('sk_test_h2OJikP9MvyFuYRGmOvr3mFS002Wbd0E7K');    
        try{
         $charge = Charge::create(array(

                    "amount" => $subTotal*160,        
                    "currency" => "USD",        
                    "source" => $request->input('stripeToken'),
                    "description" => "Test Charge"
                            
                    ));
            // dd($charge);
            if($charge->status){
                
                OrderController::saveOrder();         //Create a new order                
                OrderController::saveOrderItem();       //Add Order items

                        ///////////////  for UserMeta   //////////////
                    $information = $request->all();
                        $userMeta = UserMeta::create([

                        'user_id'   => $userId,
                        'email'     => $information['email'],
                        'firstname' => $information['firstname'],
                        'username'  => $information['username'],
                        'lastname'  => $information['lastname'],
                        'country'   => $information['country'],
                        'state'     => $information['state'],
                        'city'      => $information['city'],
                        'address'   => $information['address'],
                        'postalcode'=> $information['postalcode'],
                        'phone'     => $information['phone']
                            ]);

                        $userMeta->save();
        //OrderId                        
        $orders = Order::where('customer_id',$userId)->where('sub_total',$subTotal)->get();
            foreach ($orders as $order){ 
                    $orderId = $order->id;

                    $payment = Payment::create([

                        "order_id"     => $orderId,
                        "sub_total"    => $subTotal,
                        "discount"     => 0,
                        "total"        => $subTotal,
                        "customer_id"  => $userId,
                        "customer_name"=> $charge->source->name,
                        "last4"        => $charge->source->last4,
                        "exp_month"    => $request->exp_month,
                        "exp_year"     => $request->exp_year,
                        "charge_id"    => $charge->id,
                        "balance_transaction"=> $charge->balance_transaction,
                        "amount"        => $charge->amount,
                        "currency"      => $charge->currency,
                        "funding"       => $charge->source->funding,
                        "payment_method"=> $charge->payment_method,
                        "payment_status"=> $charge->status
                        
                        ]);
                }       
                    $payment->save();
                //add  order Items    
                //Remove cart products
                $delCartPro = Cart::where('customerId' , $userId);
                $delCartPro->delete();

                return  redirect()->route('products')->with('successOrder', 'SucsessFully Purchased');        

            }//   if  (check->status)

 /*try*/} catch( \Exception $e){
            return  redirect()->route('post.info')->with('error', $e->getMessage());
        }
                                //empty  Cart here

    }
    



}





public function qrCode(){


        return    QrCode::size(222)->wiFi([
            'ssid' => 'Shafiq_Net',
            'encryption' => 'WPA',
        'password' => 'qasim1122'
                
            // if(!empty($cartItemObject)){   
            //             foreach ($cartItemObject as $total) {
            //                $subTotal = $subTotal + $total->productQuantity*$total->products->price;
            //             }

                    // return  redirect()->route('products')->with('successOrder', 'SucsessFully Purchased');        

                    // } else {
                    //         return  redirect()->route('post.info');
                    //         }
                                        ]);
    
}

}
        
