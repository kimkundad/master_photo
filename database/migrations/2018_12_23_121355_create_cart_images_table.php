<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_images', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cart_id_detail')->default('0');
            $table->text('cart_image')->nullable();
            $table->integer('cart_image_id')->default('0');
            $table->integer('cart_image_sum')->default('0');
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
        Schema::dropIfExists('cart_images');
    }
}
