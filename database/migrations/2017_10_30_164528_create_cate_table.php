<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cate', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('imagen');
            $table->string('nombre');
            $table->enum('activo', ['si', 'no'])->default('si');
            $table->integer('orden');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cate');
    }
}
