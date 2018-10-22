<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBoiUserInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boi_user_info', function (Blueprint $table) {
            $table->increments('id');
            $table->String('user_name',20);
            $table->String('user_location',100);
            $table->String('user_phone_number',11);
            $table->String('user_email_address',50);
            $table->String('user_password');
            $table->string('avatar')->default('user.png');
            //$table->integer('id');
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
        Schema::dropIfExists('boi_user_info');
    }
}
