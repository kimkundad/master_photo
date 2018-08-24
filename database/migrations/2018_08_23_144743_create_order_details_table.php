<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id')->default('0');
            $table->integer('product_id')->default('0');
            $table->string('product_name')->nullable();
            $table->integer('sum_image')->default('0');
            $table->integer('sum_price')->default('0');
            $table->integer('list_link')->default('0');
            $table->integer('size_photo')->default('0');
            $table->integer('image_radio')->default('0');
            $table->integer('order_details_status')->default('0');
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
        Schema::dropIfExists('order_details');
    }
}
