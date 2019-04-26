<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeliranksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deliranks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('deli_main_id');
            $table->integer('product_id');
            $table->float('start_rank', 8, 2);
            $table->float('end_rank', 8, 2);
            $table->float('total_price', 8, 2);
            $table->float('total_price2', 8, 2);
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
        Schema::dropIfExists('deliranks');
    }
}
