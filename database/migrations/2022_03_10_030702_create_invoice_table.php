<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice', function (Blueprint $table) {
            $table->id('id');
            $table->string('receiver');
            $table->string('phone',20);
            $table->string('address',300);
            $table->float('total_payment');
            $table->string('note',300);
            $table->timestamp('created_at');
            $table->tinyInteger('stt')->default(1);
            $table->string(' payment_method');
            $table->unsignedBigInteger('id_admin');
            $table->foreign('id_admin')->references('id')->on('admin');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoice');
    }
}
