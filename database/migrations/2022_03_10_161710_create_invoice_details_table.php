<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_details', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('id_product');
            $table->foreign('id_product')->references('id')->on('products');
            $table->integer('quantity');
            $table->float('price',10,2);
            $table->unsignedBigInteger('id_invoice');
            $table->foreign('id_invoice')->references('id')->on('invoices');
            $table->string('coupons_code')->nullable();
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoice_details');
    }
}