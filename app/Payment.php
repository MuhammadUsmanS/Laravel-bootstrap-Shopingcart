<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['order_id','sub_total','discount','total','customer_id','customer_name','last4','exp_month','exp_year','charge_id','balance_transaction','amount','currency','funding','payment_method','payment_status'] ;
}
