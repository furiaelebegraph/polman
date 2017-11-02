<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AgrearDescripcionProductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('produ', function (Blueprint $table) {
            DB::statement('ALTER TABLE produ add column descripcion TEXT');

            DB::statement('ALTER TABLE produ add column precio varchar(191)');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produ');
    }
}
