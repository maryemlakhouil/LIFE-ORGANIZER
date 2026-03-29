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
        Schema::create('attachments', function (Blueprint $table) {
            $table->id();
            $table->string('nom_fichier');
            $table->string('type_fichier');
            $table->string('chemin_fichier');
            $table->timestamp('cree_le')->useCurrent();

            $table->foreignId('message_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('tache_id')->nullable()->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attachments');
    }
};
