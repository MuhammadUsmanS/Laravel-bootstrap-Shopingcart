<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserMeta extends Model
{
    //
   protected $fillable = ['user_id','email','firstname','username','lastname','country','state','city','address','postalcode','phone'];


   public function orderUsersData(){
   	$this->hasOne('App/Order','customer_id','user_id');
   }


   
}
