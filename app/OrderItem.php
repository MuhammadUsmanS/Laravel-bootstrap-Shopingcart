<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    //
	protected   $fillable = ['order_id','product_id','product_qty','product_price','sub_total','discount','total'];




	public function orders(){

			return $this->hasOne('App\Order','id','order_id');
	}

	public function payments(){

			return $this->hasOne('App\Payment','order_id','order_id');
	}


	public function products(){
		return $this->hasOne('App\Products','id','product_id');
	}
}

