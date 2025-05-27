<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('description')->nullable();
            $table->string('type');
            $table->integer('amount');
            $table->integer('quantity');
            $table->integer('used')->default(0);
            $table->date('start_date');
            $table->date('end_date');
            $table->string('inscripcion_category')->nullable();
            $table->boolean('is_email_restrict')->default(false);
            $table->string('status')->default('active');
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
        Schema::dropIfExists('coupons');
    }
}
