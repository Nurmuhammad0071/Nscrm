<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->text('lastname')->nullable();
            $table->text('patronymic')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->text('phone_1');
            $table->text('phone_2')->nullable();
            $table->text('science')->nullable();
            $table->text('address')->nullable();
            $table->text('birthday')->nullable();
            $table->text('comment')->nullable();
            $table->text('comming')->nullable();
            $table->text('Intership')->nullable();
            $table->text('percetage')->nullable();
            $table->text('link')->nullable();
            $table->text('photo')->nullable();
            $table->text('telegram')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
