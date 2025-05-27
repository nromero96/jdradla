<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('name');
            $table->string('lastname')->nullable();
            $table->string('second_lastname')->nullable();
            $table->string('document_type')->nullable();
            $table->string('document_number')->nullable();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('address')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('phone_code')->nullable();
            $table->string('phone_code_city')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('whatsapp_code')->nullable();
            $table->string('whatsapp_number')->nullable();
            $table->string('workplace')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->string('status');
            $table->text('photo');
            $table->string('solapin_name')->nullable();
            $table->string('confir_information')->nullable();
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
        Schema::dropIfExists('users');
    }
}
