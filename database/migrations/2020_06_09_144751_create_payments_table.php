<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('order_id');
            // $table->string('product_id');
            // $table->string('product_qty');
            // $table->string('product_price');
            $table->string('sub_total');
            $table->string('discount');
            $table->string('total');
            $table->string('customer_id');
            $table->string('customer_name');
            $table->string('last4');
            $table->string('exp_month');
            $table->string('exp_year');
            $table->string('charge_id');
            $table->string('balance_transaction');
            $table->string('amount');
            $table->string('currency');
            $table->string('funding');
            $table->string('payment_method');
            $table->string('payment_status');
            $table->timestamps();
        });
    }
// charge_id
    // balance_transaction
    // amount
    // currency
    // last4
    // funding
    // exp_year
    // exp_month
    // status
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
