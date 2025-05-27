<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddComprobantesColumnsToInscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('inscriptions', function (Blueprint $table) {
            $table->string('status_compr')->default('Ninguna');
            $table->string('type_compr')->nullable();
            $table->string('num_compr')->nullable();
            $table->string('compr_pdf')->nullable();
            $table->string('compr_xml')->nullable();
            $table->string('compr_cdr')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('inscriptions', function (Blueprint $table) {
            //
        });
    }
}
