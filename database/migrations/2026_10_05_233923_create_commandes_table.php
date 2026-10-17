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
        Schema::create('commandes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_client')->constrained('users')->cascadeOnDelete;
            $table->string('code');
            $table->decimal('montant_total', 10, 2);
            $table->decimal('frais_livraison', 6, 2)->nullable();
            $table->enum('status', ['En attente', 'Livré', 'Confirmee', 'annulee', 'terminee'])->default('En attente');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commandes');
    }
};
