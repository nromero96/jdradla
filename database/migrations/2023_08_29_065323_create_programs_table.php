<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->string('exponent_id',30)->nullable();
            $table->string('insc_id',30)->nullable();
            $table->string('apellido')->nullable();
            $table->string('nombre')->nullable();
            $table->string('hotel')->nullable();
            $table->string('status')->nullable();
            $table->string('pais')->nullable();
            $table->string('sesion')->nullable();
            $table->string('nombre_sesion')->nullable();
            $table->string('fecha')->nullable();
            $table->string('bloque')->nullable();
            $table->string('inicio')->nullable();
            $table->string('termino')->nullable();
            $table->string('sala')->nullable();
            $table->string('tema')->nullable();
            $table->string('email')->nullable();
            $table->string('notificado')->default('no');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('programs');
    }
}
