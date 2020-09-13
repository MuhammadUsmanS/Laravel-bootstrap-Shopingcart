<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth; ///// use auth here 

class UserLoginController extends Controller
{	


	public function __construct(){

  $this->middleware('guest:web', ['except'=> ['logout' , 'login']]);
	// $this->middleware('guest:admin', ['except'=>['logout']]);

	}

    public function showUserLoginForm()
    { // show  admin login form 
    	return view('user.login');
    }

    public function loginForm(Request $request)
    {
      // dd($request->route()->getActionMethod());

      // $userIP = $request->ip();
      // dd($userIP) ;
    	
    	//validate the form data 
    $this->validate($request , [
   		'email' => 'required|email',
   		'password'=> 'required|min:6'
   		]);
      
	//attempt to log the user in
   	// i.e Auth::attempt->$credential->$remeber;
   	if(Auth::guard('web')->attempt(['email'=>$request->email , 'password'=>$request->password],$request->remember))
   		{
   	  	//if user successful to log in the redirect to intended location 
   			return  redirect()->intended(route('user.dashboard'));
   		}	
	//if un-successful then redirect back to the login with the form data 
      session()->put('inCorrect', ' " Incorrect email OR '.'password " ');
   		return redirect()->back()->withInput($request->only('email','remember'));
   	   	
    }



    public function logout(){
      //this function is not accessable because we have guest middleware
      //SOlution  use  except logout()

        Auth::guard('web')->logout();

        // $request->session()->flush();
        /*$request->session()->invalidate();*/
        return redirect()->intended(route('products'));
    }
    




    

}
