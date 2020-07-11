<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserMetasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_metas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_id');    
            $table->string('email');    
            $table->string('firstname');    
            $table->string('username');    
            $table->string('lastname');    
            $table->string('country');    
            $table->string('state');    
            $table->string('city');    
            $table->string('address');    
            $table->string('postalcode');    
            $table->string('phone');    
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_metas');
    }
}
