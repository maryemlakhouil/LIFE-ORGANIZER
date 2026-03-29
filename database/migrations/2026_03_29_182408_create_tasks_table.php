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
            $table->string('titre');
            $table->text('description')->nullable();
            $table->string('priorite')->default('moyenne');
            $table->date('date_fin')->nullable();
            $table->string('statut')->default('en_attente');
            $table->boolean('est_complete')->default(false);
            $table->string('frequence')->nullable();
            $table->timestamp('commence_a')->nullable();
            $table->foreignId('enfant_id')->nullable()->constrained('enfants')->nullOnDelete();
            $table->foreignId('creee_par')->constrained('users')->cascadeOnDelete();
            $table->foreignId('nounou_id')->nullable()->constrained('users')->nullOnDelete();
          
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
