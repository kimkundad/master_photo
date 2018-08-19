<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pro_name')->nullable();
            $table->text('pro_title')->nullable();
            $table->text('pro_name_detail')->nullable();
            $table->integer('pro_category')->nullable();
            $table->integer('pro_code')->nullable();
            $table->integer('pro_price')->nullable();
            $table->string('pro_image')->nullable();
            $table->integer('views')->default('0');
            $table->integer('pro_status')->default('0');
            $table->integer('pro_discount')->default('0');
            $table->integer('pro_status_show')->default('0');
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
        Schema::dropIfExists('products');
    }
}
