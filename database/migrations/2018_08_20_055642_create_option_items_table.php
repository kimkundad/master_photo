<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOptionItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('option_items', function (Blueprint $table) {
            $table->increments('id');
            $table->text('item_name')->nullable();
            $table->double('item_price')->default('0');
            $table->integer('item_option_id')->default('0');
            $table->string('item_image')->nullable();
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
        Schema::dropIfExists('option_items');
    }
}
