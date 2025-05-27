<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('program_sessions', function (Blueprint $table) {
            $table->id();
            $table->string('code_session')->unique();
            $table->string('name_session');
            $table->date('date');
            $table->string('start_time_block');
            $table->string('end_time_block');
            $table->string('room');
            $table->string('image_program');
            $table->string('file_program');
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
        Schema::dropIfExists('program_sessions');
    }
}
