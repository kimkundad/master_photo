<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_ad');
            $table->integer('user_id');
            $table->string('phone_ad')->nullable();
            $table->string('address_ad')->nullable();
            $table->integer('province')->nullable();
            $table->integer('district')->nullable();
            $table->integer('sub_district')->nullable();
            $table->string('zip_code')->nullable();
            $table->integer('type_address')->default('0');
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
        Schema::dropIfExists('user_addresses');
    }
}
