<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pointofsales', function (Blueprint $table) {
            $table->id();
            $table->string("name")->nullable();
            $table->bigInteger("mobile")->nullable();
            $table->bigInteger("pincode")->nullable();
            $table->string("address")->nullable();
            $table->string("city")->nullable();
            $table->boolean("status")->nullable()->default(1);
            $table->bigInteger("user_mobile")->nullable();
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
        Schema::dropIfExists('pointofsales');
    }
}
