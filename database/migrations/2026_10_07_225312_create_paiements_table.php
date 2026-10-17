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
        Schema::create('paiements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_commande')->constrained('commandes')->cascadeOnDelete;
            $table->foreignId('id_moyen_paiement')->constrained('moyen_paiements')->cascadeOnDelete;
            $table->foreignId('id_type_paiement')->constrained('type_paiements')->cascadeOnDelete;
            $table->decimal('montant', 10, 2);
            $table->dateTime('date');
            $table->longText('reference');
            $table->enum('status', ['En attente', 'Paye', 'Annule', 'Echec'])->default('En attente');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paiements');
    }
};
