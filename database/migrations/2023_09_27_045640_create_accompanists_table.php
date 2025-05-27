<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccompanistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accompanists', function (Blueprint $table) {
            $table->id();
            $table->string('accompanist_name');
            $table->string('accompanist_typedocument');
            $table->string('accompanist_numdocument');
            $table->string('accompanist_solapin');
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
        Schema::dropIfExists('accompanists');
    }
}
