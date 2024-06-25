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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('lastname')->nullable();
            $table->text('patronymic')->nullable();
            $table->text('phone');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->text('comment')->nullable();
            $table->text('title')->nullable();
            $table->text('photo')->nullable();
            $table->text('comming')->nullable();
            $table->text('phone_2')->nullable();
            $table->text('phone_3')->nullable();
            $table->text('position')->nullable();
            $table->text('address')->nullable();
            $table->text('age')->nullable();
            $table->tinyInteger('active')->default(0);
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
        Schema::dropIfExists('users');
    }
};
