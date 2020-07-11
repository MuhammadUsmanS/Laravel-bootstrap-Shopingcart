<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Order;
use App\OrderItem;
use Illuminate\Support\Facades\Auth;

use Stripe\Stripe;
use Stripe\Charge;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    //

	public function __construct(){

		$this->middleware('auth:web');
	}


    public static function saveOrder(){

   	$user_id = Auth::guard('web')->user()->id ; 		
   	$cartItemObject = Cart::with('products' ,'users')->where('customerId',$user_id)->get();

   	$productQuantity = 0 ;
   	$subTotal = 0;

   		foreach ($cartItemObject as $cart => $items) {

   			$productQuantity =$productQuantity + $items->productQuantity ; 
   			$subTotal = $subTotal  + $items->products->price * $items->productQuantity;		
   		}				
    			$order = Order::create([      // for order 
                	
			   		'order_status'=> 'processing',
			   		'customer_id' =>  $user_id,
			   		'product_qty' =>  $productQuantity,
			   		'discount'    =>  '0',
			   		'sub_total'   =>  $subTotal,
		        ]);
 				$order->save();
    }


    public static function saveOrderItem(){

   	$userId = Auth::guard('web')->user()->id ;         
    $cartItemObject = Cart::with('products')->where('customerId',$userId)->get();

    if(!empty($cartItemObject)){
    	$subTotal = 0 ;  
        	foreach ($cartItemObject as $total) {  // for subtotal
          		$subTotal = $subTotal + $total->productQuantity*$total->products->price;
        	}
    	
   			$orders = Order::where('customer_id',$userId)->where('sub_total',$subTotal)->get();
	   			foreach ($orders as $order){
	   	
			    	$cart = Cart::with('products')->where('customerId',$userId)->get();
			    		if(!empty($order->id)){
			    			foreach ($cart as $cartitems => $items) {


			    				$orderItem = OrderItem::create([
			    					
					    			"order_id"     =>$order->id,
					    			"product_id"   =>$items->productId,
					   				"product_qty"  =>$items->productQuantity,
				    				"product_price"=>$items->products->price,
				    				"sub_total"    =>$items->productQuantity*$items->products->price,
				    				"discount" 	   =>'0',
				    				"total"        =>$items->productQuantity*$items->products->price
				    			]);

				    		}
			    				$orderItem->save();
			    		}//if(!empty$order)

			    }//outer foreach
	}//if(!empty($cartItemObject)
}


// for dashbaord 
    public function getOrders(){

    	$userId = Auth::guard('web')->user()->id;
    	$orderObj = Order::with('orderItems','payments','userMeta')->where('customer_id',$userId)->get();
    	// dd($orderObj);
    	return view('user.order' , ['orderItems' => $orderObj] );

    }


    public function orderDetail($orderId){

    	$orderObj = Order::with('orderItems')->where('id' , $orderId)->get();
    	
    	return view('user.orderDetail', ['orderItems' => $orderObj]);

      
    }


}
