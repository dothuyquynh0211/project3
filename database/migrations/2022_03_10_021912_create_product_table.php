<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->id('id');
            $table->string('image',300);
            $table->string('description',300);
            $table->date('create');
            $table->tinyInteger('stt')->default(1);
            $table->string('sku')->unique();
            
            $table->unsignedBigInteger('id_brand');
            $table->foreign('id_brand')->references('id')->on('brand');

            $table->unsignedBigInteger('id_category');
            $table->foreign('id_category')->references('id')->on('category');

            $table->unsignedBigInteger('id_size')->nullable();
            $table->foreign('id_size')->references('id')->on('size');

            $table->unsignedBigInteger('id_color')->nullable();
            $table->foreign('id_color')->references('id')->on('color');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
}
