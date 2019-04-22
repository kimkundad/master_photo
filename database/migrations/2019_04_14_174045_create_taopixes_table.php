<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaopixesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taopixes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('taopix_name');
            $table->integer('pro_id')->nullable();
            $table->text('note')->nullable();
            $table->string('url_taopix')->nullable();
            $table->integer('themes_id')->nullable();
            $table->text('arrays_data')->nullable();
            $table->integer('taopix_status')->default('0');
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
        Schema::dropIfExists('taopixes');
    }
}
