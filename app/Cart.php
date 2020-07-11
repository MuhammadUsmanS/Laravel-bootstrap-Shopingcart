<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
   	protected $fillable = ['productId','customerId','productQuantity'] ;

   	protected $primaryKey = 'cartId';




	public function products(){

		return $this->hasOne('App\Products','id','productId');
	}


	public function users(){

		return $this->hasOne('App\User','id','customerId');
	}


	// public function products(){

	// 	return $this->belongsTo('App\Products');
	// }


	// public function users(){

	// 	return $this->belongsTo('App\User');
	// }



}


