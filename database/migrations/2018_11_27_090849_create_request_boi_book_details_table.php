<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestBoiBookDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_boi_book_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('boi_user_info');
            $table->string('request_book_name',101);
            $table->string('request_book_author',101);
            $table->string('request_book_edition',101);
            $table->string('request_book_condition',101);
            $table->string('request_book_receive_location',101);
            $table->enum('sell_book_sell_status',['0','1']);
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
        Schema::dropIfExists('request_boi_book_details');
    }
}
