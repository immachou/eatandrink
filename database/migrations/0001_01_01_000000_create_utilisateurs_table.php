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
            Schema::create('utilisateurs', function (Blueprint $table) {
                $table->id();
                $table->string('nom_entreprise');
                $table->string('email')->unique();
                $table->string('password');
                $table->enum('role', ['admin', 'entrepreneur_en_attente', 'entrepreneur_approuve'])->default('entrepreneur_en_attente');
                $table->string('nom_contact')->nullable();
                $table->string('telephone')->nullable();
                $table->text('adresse')->nullable();
                $table->string('siret')->nullable();
                $table->text('description')->nullable();
                $table->string('logo_url')->nullable();
                $table->rememberToken();
                $table->timestamps();
            });
        

       

      
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('utilisateurs');
       
    }
};
