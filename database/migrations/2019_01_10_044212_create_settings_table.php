<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('store_name');
            $table->string('store_logo');
            $table->string('address')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('invoice_message')->nullable();
            $table->string('commercial_register')->nullable();
            $table->enum('status',['opened','closed'])->default('opened');
            $table->longtext('close_message')->nullable();
            $table->string('logo')->nullable();
            $table->string('icon')->nullable();
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
        Schema::dropIfExists('settings');
    }
}
