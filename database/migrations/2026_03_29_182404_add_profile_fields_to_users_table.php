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
        Schema::table('utilisateurs', function (Blueprint $table) {
            $table->string('prenom')->nullable()->after('nom');
            $table->string('nom_famille')->nullable()->after('prenom');
            $table->string('telephone')->nullable()->after('email');
            $table->string('role')->default('parent')->after('telephone');
            $table->string('chemin_avatar')->nullable()->after('role');
            $table->string('fuseau_horaire')->default('Africa/Casablanca')->after('chemin_avatar');
            $table->string('theme')->default('light')->after('fuseau_horaire');
            $table->boolean('est_actif')->default(true)->after('theme');
            $table->timestamp('dernier_vu_a')->nullable()->after('est_actif');

            $table->index('role');
            $table->index('est_actif');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('utilisateurs', function (Blueprint $table) {
            $table->dropIndex(['role']);
            $table->dropIndex(['est_actif']);
            $table->dropColumn([
                'prenom',
                'nom_famille',
                'telephone',
                'role',
                'chemin_avatar',
                'fuseau_horaire',
                'theme',
                'est_actif',
                'dernier_vu_a',
            ]);
        });
    }
};
