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
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('address')->nullable();
            $table->string('colony')->nullable();
            $table->string('city')->nullable();
            $table->bigInteger('mobile1')->unique();
            $table->bigInteger('mobile2')->nullable();
            $table->string('shift')->nullable();
            $table->string('agent')->nullable(); //sanchi,kuber
            $table->string('status')->nullable(); //prepaid, postpaid
            $table->bigInteger('amount')->nullable(); //paid or unpaid amount
            $table->bigInteger('total_token')->nullable(); //kitni unit deliver karni hai total
            $table->bigInteger('cost_of_per_token')->nullable(); 
            $table->bigInteger('no_of_token_utilized')->nullable(); 
            $table->bigInteger('remaning_token')->nullable(); 
            $table->string('product_name')->nullable();   
            $table->date('start_date')->nullable(); 
            $table->date('end_date')->nullable(); 
            $table->bigInteger('pincode')->nullable(); 
            $table->string('user_name')->nullable(); 
            $table->bigInteger('user_mobile')->nullable(); 
            $table->date_get_last_errors('token_expire_date')->nullable(); 
            
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
