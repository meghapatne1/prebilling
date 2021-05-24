<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productcustomers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('customer_mobile')->nullable();  
            $table->string('payment_type')->nullable(); //prepaid, postpaid
            $table->string('shift')->nullable(); //morning,evening
            $table->string('brand')->nullable(); //sanchi,kuber
            $table->bigInteger('amount')->nullable(); 
            $table->bigInteger('total_token')->nullable(); //kitni unit deliver karni hai total
            $table->bigInteger('cost_of_per_token')->nullable(); 
            $table->bigInteger('no_of_token_utilized')->nullable(); 
            $table->bigInteger('remaning_token')->nullable(); 
            $table->string('product_name')->nullable();   
            $table->bigInteger('user_mobile')->nullable(); 
            $table->date('token_expire_date')->nullable(); 
            $table->bigInteger('customer_id')->nullable();  
            $table->bigInteger('pro_cus_id')->nullable();  
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
        Schema::dropIfExists('productcustomers');
    }
}
