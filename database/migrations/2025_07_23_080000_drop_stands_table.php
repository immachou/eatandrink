<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        // Supprimer d'abord les contraintes de clé étrangère
        Schema::table('produits', function (Blueprint $table) {
            $table->dropForeign(['stand_id']);
        });

        // Ensuite, supprimer la table stands
        Schema::dropIfExists('stands');
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        // Recréer la table stands
        Schema::create('stands', function (Blueprint $table) {
            $table->id();
            $table->foreignId('utilisateur_id')->constrained('utilisateurs');
            $table->string('type');
            $table->decimal('surface', 8, 2);
            $table->text('description')->nullable();
            $table->text('besoins_specifiques')->nullable();
            $table->enum('statut', ['en_attente', 'approuve', 'rejete'])->default('en_attente');
            $table->timestamps();
        });

        // Recréer la contrainte de clé étrangère dans la table produits
        Schema::table('produits', function (Blueprint $table) {
            $table->foreign('stand_id')
                  ->references('id')
                  ->on('stands')
                  ->onDelete('cascade');
        });
    }
};
