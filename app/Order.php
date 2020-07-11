<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $fillable = ['order_status','customer_id','product_qty','discount','sub_total'];

    protected $id;


    public function cartUsers(){
    	return	$this->hasOne('App\User','id','customer_id');
    }

    public function cart(){

        return  $this->hasOne('App\Cart','customerId', 'customer_id');
    }

    public function orderItems(){

        return  $this->hasMany('App\OrderItem','order_id', 'id');
    }

    public function payments(){

            return $this->hasOne('App\Payment','order_id','id');
    }

    public function userMeta(){

            return $this->hasOne('App\UserMeta','user_id','customer_id');
    }    


    
}
