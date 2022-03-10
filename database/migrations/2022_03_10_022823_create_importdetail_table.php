<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImportdetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('importdetail', function (Blueprint $table) {
            $table->id('id');
            $table->integer('id_product');
            $table->integer('quantity');
            $table->float('cost_price');
            $table->float('cost');
            $table->unsignedBigInteger('id_importgoods');
            $table->foreign('id_importgoods')->references('id')->on('importgoods');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('importdetail');
    }
}
