<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class AdminLoginController extends Controller
{
    //

	public function __construct(){

		$this->middleware('guest:admin' , ['except' => 'adminLogout']);
	}


	public function adminLogin(){

		return view('admin.adminLogin');
	}

	public function postAdminLogin(Request $request){

		$this->validate($request , [

   		'email' => 'required|email',
   		'password'=> 'required|min:6'

   		]);

		// dd($request);
	if(Auth::guard('admin')->attempt(['email'=>$request->email , 'password'=>$request->password],$request->remember)){

		return redirect()->intended(route('admin.profile'));

	}//if close
	else{
		return redirect()->back()->withInput($request->only('email','remember'));
	}

	}//function close



	public function adminLogout(){

		Auth::guard('admin')->logout();

		return redirect()->intended(route('admin.login'));

	}


}
