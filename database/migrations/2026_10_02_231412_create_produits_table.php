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
        Schema::create('produits', function (Blueprint $table) {
            $table->id();
            $table->string('nom_produit');
            $table->longText('caracteristiques');
            $table->decimal('prix', 10, 2);
            $table->string('etat');
            $table->integer('quantite')->default(0);
            $table->longText('photo_1');
            $table->longText('photo_2')->nullable();
            $table->longText('photo_3')->nullable();
            $table->enum('status', ['disponible', 'rupture de stock', 'indisponible'])->default('disponible');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produits');
    }
};
