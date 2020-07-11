<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    //
   	protected $fillable = ['imagePath','title','description','price'];



// public function cart(){

// 	return $this->belongsTo('App\Cart' ,'productId');
// }

// public function cart(){

// 	return $this->hasMany('App\Cart' ,'productId');
// }



}


