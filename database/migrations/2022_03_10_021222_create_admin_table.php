<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin', function (Blueprint $table) {
            $table->id('id');
            $table->string('name');
            $table->string('phone',20);
            $table->string('email')->unique();
            $table->string('password');
            $table->date('created_at');
            $table->date('updated_at');
            $table->unsignedBigInteger('id_role');
            $table->foreign('id_role')->references('id')->on('role');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin');
    }
}
