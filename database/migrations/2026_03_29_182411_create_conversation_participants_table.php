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
        Schema::create('participants_conversation', function (Blueprint $table) {
            $table->id();
            $table->foreignId('conversation_id')->constrained()->cascadeOnDelete();
            $table->foreignId('utilisateur_id')->constrained('utilisateurs')->cascadeOnDelete();
            $table->timestamp('rejoint_a')->nullable();
            $table->timestamp('dernier_lu_a')->nullable();
            $table->timestamp('archive_a')->nullable();
            $table->boolean('est_muet')->default(false);
            $table->timestamps();

            $table->unique(['conversation_id', 'utilisateur_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('participants_conversation');
    }
};
