<?php

// import nécessaire pour le fonctionnement de la migration de table users
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
            // id != uuid
            $table->uuid('id')->primary(); 

            $table->string('name'); 
            $table->string('email')->unique();
            $table->string('password');

            $table->enum('status', ['inactive', 'active', 'suspended', 'deleted'])->default('active');
            $table->enum ('role', ['admin', 'user'])->default('user');

            $table->timestamps();
        });
    }

    /**
     * Annuler des modifications
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
