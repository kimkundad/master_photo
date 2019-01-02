<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->default('0');
            $table->integer('user_id');
            $table->string('product_name')->nullable();
            $table->integer('sum_image')->default('0');
            $table->integer('sum_price')->default('0');
            $table->integer('list_link')->default('0');
            $table->integer('size_photo')->default('0');
            $table->integer('image_radio')->default('0');
            $table->integer('cart_details_status')->default('0');
            $table->integer('status')->default('0');
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
        Schema::dropIfExists('cart_details');
    }
}
