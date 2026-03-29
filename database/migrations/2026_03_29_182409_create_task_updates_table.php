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
        Schema::create('suivis_taches', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tache_id')->constrained('taches')->cascadeOnDelete();
            $table->foreignId('acteur_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('statut_precedent')->nullable();
            $table->string('statut_actuel');
            $table->text('note')->nullable();
            $table->timestamp('modifie_a');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suivis_taches');
    }
};
