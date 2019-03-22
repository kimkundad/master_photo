<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThemeprosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('themepros', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pro_id');
            $table->string('themepro_name')->nullable();
            $table->text('themepro_detail')->nullable();
            $table->string('themepro_image')->nullable();
            $table->integer('themepros_price')->default('0');
            $table->integer('themepros_status')->default('0');
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
        Schema::dropIfExists('themepros');
    }
}
