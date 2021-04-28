<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CustomerTableHistory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_histories', function (Blueprint $table) {
            $table->id();
            $table->string("customer_firstname")->nullable();
            $table->string("customer_lastname")->nullable();
            $table->string("product_name")->nullable();
            $table->bigInteger("cost_of_per_token")->nullable();
            $table->bigInteger("no_of_token_utilized")->nullable();
            $table->bigInteger("remaning_token")->nullable();
            $table->bigInteger("total_token")->nullable();
            $table->bigInteger("user_id")->nullable();
            $table->Integer("customer_id")->nullable();
            $table->bigInteger("mobile1")->nullable();
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
        Schema::dropIfExists('customer_histories');
    }
}