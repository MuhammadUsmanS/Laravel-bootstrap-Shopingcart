<?php

namespace App\Http\Controllers;

use App\User;

use Illuminate\Http\Request;
use App\Http\Requests;




class UserRegisterController extends Controller
{
    
    public function signUp(){

    	return view('user.register');
    	
    }

    public function signUpSubmit(Request $request){

    	$this->validate($request , [
    			'name'   => 'required|max:255',
    			'email'  =>  'email|required|unique:users',
    			'password'=> 'required|min:4'
    			    				]) ; 

    	$create_user =  User::create([
    		'name'  => $request['name'] ,
    		'email' => $request['email'],
    		'password' => bcrypt($request['password']),

    	]);

    	$create_user->save();

    	return redirect()->intended(route('user.dashboard')); 

    }

		    
}
