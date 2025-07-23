<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('produits', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->text('description')->nullable();
            $table->decimal('prix', 10, 2);
            $table->string('image_url')->nullable();
            $table->foreignId('stand_id')->constrained('stands')->onDelete('cascade');
            $table->enum('categorie', ['nourriture', 'boisson', 'autre'])->default('nourriture');
            $table->boolean('est_disponible')->default(true);
            $table->integer('quantite_stock')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('produits');
    }
};