<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes(['verify'=> true]) ; 

Route::get('/', function () {
    return redirect()->route('products');
});


Route::get('/shop', function(){
	return redirect()->route('products');
});

//////////////////////////////////////////////////////////////

Route::group(['prefix' => 'shophere'],function(){

	Route::get('/','ProductController@getProducts')->name('products');
	Route::get('/index','ProductController@getProducts')->name('products');
	Route::get('/productDetail/{productId}','ProductController@productDetail')->name('product.detail');


//////////////////////cart Products///////////////////////////////////////	
	Route::get('/addToCart/{productId}','ProductController@addToCart')->name('products.addtocart');
//////////////////////////////////////////////////////////////////

	Route::get('/signUp','UserRegisterController@signUp')->name('user.signup');
	Route::post('/signUp','UserRegisterController@signUpSubmit')->name('user.signup.submit');

	Route::get('/signIn','UserLoginController@showUserLoginForm')->name('user.login');
	Route::post('/signIn','UserLoginController@loginForm')->name('user.login.submit');

	Route::get('userLogout' , 'UserLoginController@logout')->name('user.logout');
	Route::get('/userProfile','UserController@index')->name('user.dashboard');


////////Facebook Login Routes/////////////////////////////////////

// Route::get('facebook', function () {
//     return view('facebook');
// });

Route::get('auth/facebook', 'FacebookController@redirectToFacebook')->name('fb.login');
Route::get('auth/facebook/callback','FacebookController@handleFacebookCallback');

/////////////////cart/////////////////////////////////////////////

	Route::get('/cart','ProductController@getCart')->name('cart.products');
	Route::delete('/remove' , 'ProductController@removeFromCart')->name('remove.product');
	Route::patch('/cartUpdate' , 'ProductController@updateCart')->name('update.cart');

/////////////////Save CUstomer INformation or  place an order/////////////////////
	Route::get('/information', 'ProductController@getInformation')->name('info');
	Route::post('/information','ProductController@postPayment')->name('post.info');

	Route::get('/saveOrder','OrderController@saveOrder')->name('save.order');
	Route::get('/saveOrderItem','OrderController@saveOrderItem')->name('save.order.item');
	
	Route::post('/saveInformationUm','UserMetaController@saveInformationUm')->name('save.information.um');


Route::group(['prefix' => 'userDashboard'],function(){

	Route::get('/orders', 'OrderController@getOrders')->name('user.orders');
	Route::get('/orderDetail/{orderId}', 'OrderController@orderDetail')->name('order.detail');

	});
Route::group(['prefix' => 'admin'],function(){

	Route::get('/login','AdminLoginController@adminLogin')->name('admin.login');
	Route::post('/postlogin','AdminLoginController@postAdminLogin')->name('post.admin.login');
	Route::get('/dashboard','AdminController@adminDashboard')->name('admin.profile');
	Route::get('/logout','AdminLoginController@adminLogout')->name('admin.logout');
	Route::get('/orders','AdminOrder@adminOrders')->name('admin.orders');
	Route::get('/adminOrderDetail/{orderId}', 'AdminOrder@orderDetail')->name('admin.order.detail');
	Route::get('/orderCompleted/{orderId}', 'AdminOrder@orderCompleted')->name('order.completed');

});







	Route::get('/qrCode' , 'ProductController@qrCode')->name('qr.code');


	



});






	