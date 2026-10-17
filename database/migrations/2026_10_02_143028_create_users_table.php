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
            $table->foreignId('id_role')->constrained('roles')->onDelete('cascade');
            $table->string('nom');
            $table->string('prenom');
            $table->string('numero_telephone')->unique();
            $table->string('password');
            $table->string('otp')->nullable();
            $table->dateTime('otp_expiration')->nullable();
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
