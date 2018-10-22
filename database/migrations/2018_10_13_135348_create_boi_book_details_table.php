<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBoiBookDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boi_book_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('sell_book_name',101);
            $table->string('sell_book_author',101);
            $table->string('sell_book_edition',101);
            $table->string('sell_book_condition',101);
            $table->string('sell_book_delivary_location',101);
            $table->enum('sell_book_sell_status',['0','1']);
            $table->string('sell_book_phone_number',101);
            $table->string('sell_book_price',101);
            $table->string('image_id',100);
            $table->string('image_name',101);
            $table->string('image_path',101);
            $table->string('image_type',101);
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
        Schema::dropIfExists('boi_book_details');
    }
}
