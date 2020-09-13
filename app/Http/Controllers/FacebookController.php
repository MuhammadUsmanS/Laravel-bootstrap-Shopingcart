<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Facebook;

use Auth;

use Laravel\Socialite\Facades\Socialite ;

class FacebookController extends Controller
{
    //

	public function redirectToFacebook()   
	 //redirect to provider   services.php > facebook 
    {
        return Socialite::driver('facebook')->redirect();
        // make connection to chek ID and Secret key 
        // And   redirect to call back url  
        // that call back url 
    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleFacebookCallback()
    {
        try {


            $socialUser = Socialite::driver('facebook')->user();


            $create['name']  = $socialUser->getName();
            $create['email'] = $socialUser->getEmail();
            $create['facebook_id'] = $socialUser->getId();
            
            $findUser =  Facebook::where('facebook_id',$socialUser->getId())->first();

            if($findUser)
            {
	            Auth::loginUsingId($createdUser->id);
				return redirect()->route('products');

            }
            else
            {
            $newUser = Facebook::create( [ 

            		'facebook_id' => $create['facebook_id'],
            		'email' => $create['email'],
            		'name' => $create['name'],

            	]);
				return redirect()->route('products');
            }	



        } catch (Exception $e) {


            return redirect('auth/facebook');


        }
         
    }


}
