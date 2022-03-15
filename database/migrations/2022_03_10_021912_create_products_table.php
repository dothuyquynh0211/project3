<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id('id');
            $table->string('name');
            $table->string('image');
            $table->text('description');
            $table->date('create');
            $table->float('price');
            $table->tinyInteger('status')->default(1);
            $table->string('sku')->unique();
            
            $table->unsignedBigInteger('id_brand');
            $table->foreign('id_brand')->references('id')->on('brands');

            $table->unsignedBigInteger('id_category');
            $table->foreign('id_category')->references('id')->on('categories');

            $table->unsignedBigInteger('id_size')->nullable();
            $table->foreign('id_size')->references('id')->on('sizes');

            $table->unsignedBigInteger('id_color')->nullable();
            $table->foreign('id_color')->references('id')->on('colors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}