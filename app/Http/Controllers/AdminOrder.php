<?php

namespace App\Http\Controllers;

use App\Order;
use App\Payment;
use Illuminate\Http\Request;

class AdminOrder extends Controller
{
    //

    public function __construct()
    {

    	$this->middleware('auth:admin');
    }

    public function adminOrders()
    {

    	$orderObj = Order::with('orderItems','payments','userMeta')->get();

    	return view('admin.ordersListing' , ['orderItems' => $orderObj] );
    }
  	

  	public function orderDetail($orderId)
  	{
    	$orderObj = Order::with('orderItems')->where('id' , $orderId)->get();	
    	return view('user.orderDetail', ['orderItems' => $orderObj]);
    }

    public function orderCompleted($orderId)
    {
    	$payment = Payment::where('order_id' , $orderId)->get();

	    	foreach ($payment as $pay){ }

		    	if($pay->payment_status ='succeeded')
		    	{
		    		$order = Order::where('id',$orderId)->update(['order_status' => 'Completed']);
		    		return redirect()->intended(route('admin.orders'));
		    	}
		    	else 
		    	{
		    		return redirect()->intended(route('admin.orders'));
		    	}	
    }




}
	