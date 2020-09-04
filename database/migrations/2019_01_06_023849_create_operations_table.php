<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOperationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operations', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('type',['sale','buy','add','exchange','retrieval','service','maintenance','charge_palance_to_client','pay_invoice','charge_our_payment_account']);
            $table->integer('product_id')->unsigned()->nullable();
            $table->foreign('product_id')->references('id')->on('products');
            $table->string('service_type')->nullable();
            $table->integer('moderator_id')->unsigned();
            $table->foreign('moderator_id')->references('id')->on('moderators');            
            $table->integer('invoice_id')->unsigned()->nullable();
            $table->foreign('invoice_id')->references('id')->on('invoices');
            $table->integer('original_price')->nullable();
            $table->integer('sale_price');
            $table->integer('discount')->nullable();
            $table->integer('new_price');
            $table->integer('saled_count')->default(1);            
            $table->integer('total_price');            
            $table->enum('status',['done','waiting','canceled']);            
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
        Schema::dropIfExists('operations');
    }
}
