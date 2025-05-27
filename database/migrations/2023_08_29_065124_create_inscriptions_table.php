<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscriptions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('category_inscription_id');
            $table->decimal('price_category', 8, 2);
            $table->unsignedBigInteger('accompanist_id')->nullable();
            $table->decimal('price_accompanist', 8, 2);
            $table->decimal('total', 8, 2);
            $table->string('special_code')->nullable();
            $table->string('document_file')->nullable();
            $table->string('invoice');
            $table->string('invoice_ruc')->nullable();
            $table->string('invoice_social_reason')->nullable();
            $table->string('invoice_address')->nullable();
            $table->string('payment_method');
            $table->string('voucher_file')->nullable();
            $table->string('status')->default('Pendiente');
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
        Schema::dropIfExists('inscriptions');
    }
}
