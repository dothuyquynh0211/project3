<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id('id');
            $table->string('receiver');
            $table->string('phone',20);
            $table->string('address');
            $table->float('total_payment');
            $table->string('note')->nullable();
            $table->timestamp('created_at');
            $table->tinyInteger('status_order')->default(1);
            $table->tinyInteger('payment_method')->default(1);
            $table->unsignedBigInteger('id_admin')->nullable();
            $table->foreign('id_admin')->references('id')->on('admins');
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users');

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