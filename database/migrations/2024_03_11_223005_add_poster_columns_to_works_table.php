<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPosterColumnsToWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('works', function (Blueprint $table) {
            $table->string('poster_file')->nullable();
            $table->dateTime('poster_date_uploaded')->nullable();
            $table->string('poster_verification_status')->nullable();
            $table->integer('poster_count_views')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('works', function (Blueprint $table) {
            $table->dropColumn('poster_file');
            $table->dropColumn('poster_date_uploaded');
            $table->dropColumn('poster_verification_status');
            $table->dropColumn('poster_count_views');
        });
    }
}
