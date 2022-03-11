<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImportGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('import_goods', function (Blueprint $table) {
            $table->id('id');
            $table->date('date');
            $table->unsignedBigInteger('id_admin');
            $table->foreign('id_admin')->references('id')->on('admins');
            $table->unsignedBigInteger('id_warehouse');
            $table->foreign('id_warehouse')->references('id')->on('warehouses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('import_goods');
    }
}
