<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations. 
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            // $table->integer('operation_id')->unsigned()->nullable();
            // $table->foreign('operation_id')->references('id')->on('operations');
            $table->integer('client_id')->unsigned()->nullable();
            $table->foreign('client_id')->references('id')->on('clients');
            $table->integer('moderator_id')->unsigned();
            $table->foreign('moderator_id')->references('id')->on('moderators');
            $table->enum('status',['paid','waiting_paid','canceled','partially_paid']);            
            $table->integer('total_amount')->unsigned()->nullable();
            $table->integer('additional_discount')->unsigned()->nullable();
            $table->integer('deserved_amount')->unsigned()->nullable();
            $table->integer('paid')->unsigned()->nullable();
            $table->integer('rest')->unsigned()->nullable();
            $table->timestamp('payment_date')->nullable();
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
        Schema::dropIfExists('invoices');
    }
}
