<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('address')->nullable();
            $table->string('colony')->nullable();
            $table->string('city')->nullable();
            $table->bigInteger('mobile1')->unique();
            $table->bigInteger('user_mobile')->nullable();
            $table->bigInteger('user_id');
            $table->boolean('status')->nullable()->default(1);  
            $table->bigInteger('pincode')->nullable();           
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
        Schema::dropIfExists('customers');
    }
}
