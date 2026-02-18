<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Faire des modifications
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            // Utilisation de UUID comme clé primaire
            $table->uuid()->primary();

            $table->string('name'); 
            $table->string('email')->unique();
            $table->string('password');

            // Définition des Enums demanndés
            $table->enum('status', ['inactive', 'active', 'suspended', 'deleted'])->default('active');
            $table->enum ('role', ['admin', 'usser'])->default('user');

            // Timestamps automatiques (created_at, updated_at)
            $table->timestamps();

        });
    }

    /**
     * Annuler les modifications
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
