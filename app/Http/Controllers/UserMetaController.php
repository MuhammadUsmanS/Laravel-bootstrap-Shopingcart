<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Order;
use App\OrderItem;
use App\UserMeta;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
class UserMetaController extends Controller
{
    //


    public static function payment(Request $request){


    	Stripe::setApiKey('sk_test_h2OJikP9MvyFuYRGmOvr3mFS002Wbd0E7K');    
    	
    	

    	 	
    }
}

    