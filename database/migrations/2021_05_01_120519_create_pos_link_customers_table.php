<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePosLinkCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('poscustomers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("pos_mobile")->nullable();
            $table->bigInteger("customer_id")->nullable();
            $table->bigInteger("user_mobile")->nullable();
            $table->bigInteger("user_id")->nullable();
            $table->bigInteger("pos_id");
            $table->Integer("status")->nullable();
            $table->string("customer_name")->nullable();
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
        Schema::dropIfExists('poscustomers');
    }
}
