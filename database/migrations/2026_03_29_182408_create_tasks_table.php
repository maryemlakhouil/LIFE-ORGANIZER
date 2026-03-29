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
        Schema::create('taches', function (Blueprint $table) {
            $table->id();
            $table->foreignId('famille_id')->constrained('familles')->cascadeOnDelete();
            $table->foreignId('enfant_id')->nullable()->constrained('enfants')->nullOnDelete();
            $table->foreignId('creee_par')->constrained('users')->cascadeOnDelete();
            $table->foreignId('attribuee_a')->nullable()->constrained('users')->nullOnDelete();
            $table->string('titre');
            $table->text('description')->nullable();
            $table->string('frequence')->nullable();
            $table->string('priorite')->default('moyenne');
            $table->string('statut')->default('en_attente');
            $table->boolean('est_recurrente')->default(false);
            $table->string('regle_recurrence')->nullable();
            $table->timestamp('commence_a')->nullable();
            $table->timestamp('echeance_a')->nullable();
            $table->timestamp('terminee_a')->nullable();
            $table->timestamp('rappel_a')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('taches');
    }
};
