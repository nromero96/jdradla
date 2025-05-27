<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNoteAndStatusToHotelReservations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hotel_reservations', function (Blueprint $table) {
            $table->text('note')->nullable()->after('comment');
            $table->string('status', 20)->default('Pendiente')->after('note');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hotel_reservations', function (Blueprint $table) {
            $table->dropColumn(['note', 'status']);
        });
    }
}
