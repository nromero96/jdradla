<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('inscription_id');
            $table->unsignedBigInteger('user_id');
            $table->string('action_description')->nullable();
            $table->string('purchasenumber')->nullable();
            $table->string('card_brand')->nullable();
            $table->string('card_number')->nullable();
            $table->string('amount')->nullable();
            $table->string('currency')->nullable();
            $table->string('transaction_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
