<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('file_name');
            $table->string('disk');
            $table->string('conversions_disk')->nullable();
            $table->string('collection_name');
            $table->string('mime_type');
            $table->unsignedBigInteger('size');
            $table->json('custom_properties')->nullable();
            $table->json('generated_conversions')->nullable();
            $table->json('responsive_images')->nullable();
            $table->json('manipulations')->nullable();
            $table->unsignedBigInteger('model_id')->nullable();
            $table->string('model_type')->nullable();
            $table->uuid('uuid');
            $table->unsignedInteger('order_column')->nullable();
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
        Schema::dropIfExists('media');
    }
}
