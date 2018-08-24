<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderImagesTable extends Migration
{
    /**
     * Run the migrations. text('note')->nullable();
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_images', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id_detail')->default('0');
            $table->text('order_image')->nullable();
            $table->integer('order_image_id')->default('0');
            $table->integer('order_image_sum')->default('0');
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
        Schema::dropIfExists('order_images');
    }
}
