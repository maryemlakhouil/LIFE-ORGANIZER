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
        Schema::create('famille_users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('famille_id')->constrained('familles')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->string('role');
            $table->boolean('est_contact_principal')->default(false);
            $table->timestamp('invite_le')->nullable();
            $table->timestamp('accepte_le')->nullable();
            $table->timestamps();

            $table->unique(['famille_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('famille_users');
    }
};
