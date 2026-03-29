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
        Schema::create('pieces_jointes', function (Blueprint $table) {
            $table->id();
            $table->morphs('joignable');
            $table->foreignId('televerse_par')->nullable()->constrained('utilisateurs')->nullOnDelete();
            $table->string('disque')->default('public');
            $table->string('chemin');
            $table->string('nom_original');
            $table->string('type_mime')->nullable();
            $table->unsignedBigInteger('taille')->default(0);
            $table->json('metadonnees')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pieces_jointes');
    }
};
