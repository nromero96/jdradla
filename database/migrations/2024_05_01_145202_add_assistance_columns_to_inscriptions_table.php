<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAssistanceColumnsToInscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('inscriptions', function (Blueprint $table) {
            $table->dateTime('assistance')->nullable();
            $table->dateTime('assistance_accomp')->nullable();
            $table->unsignedBigInteger('assis_marked_by')->nullable();
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
            $table->dropColumn('assistance');
            $table->dropColumn('assistance_accomp');
            $table->dropColumn('assis_marked_by');
        });
    }
}
