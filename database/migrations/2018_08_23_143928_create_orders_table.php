<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('firstname_order');
            $table->string('lastname_order');
            $table->string('email_order');
            $table->string('phone_order');
            $table->text('address');
            $table->text('province');
            $table->text('zipcode');
            $table->string('point')->nullable();
            $table->text('note')->nullable();
            $table->double('order_price')->default('0');
            $table->integer('total')->default('0');
            $table->integer('discount')->default('0');
            $table->integer('order_status')->default('0');
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
        Schema::dropIfExists('orders');
    }
}
