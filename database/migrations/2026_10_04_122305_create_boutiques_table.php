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
        Schema::create('boutiques', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_proprietaire')->constrained('users')->cascadeOnDelete;
            $table->string('nom_boutique');
            $table->longText('slogan')->nullable();
            $table->string('numero_boutique');
            $table->string('numero_whatsapp');
            $table->string('email_boutique')->nullable();
            $table->string('adresse_boutique');
            $table->string('heure_ouverture');
            $table->longText('photo_1_boutique');
            $table->longText('photo_2_boutique')->nullable();
            $table->longText('photo_3_boutique')->nullable();
            $table->string('categorie_boutique')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('boutiques');
    }
};
