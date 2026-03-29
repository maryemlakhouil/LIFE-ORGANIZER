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
        Schema::create('avis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('famille_id')->nullable()->constrained('familles')->nullOnDelete();
            $table->foreignId('tache_id')->nullable()->constrained('taches')->nullOnDelete();
            $table->foreignId('auteur_id')->nullable()->constrained('utilisateurs')->nullOnDelete();
            $table->foreignId('cible_id')->nullable()->constrained('utilisateurs')->nullOnDelete();
            $table->unsignedTinyInteger('note');
            $table->text('comment')->nullable();
            $table->timestamp('soumis_a');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('avis');
    }
};
