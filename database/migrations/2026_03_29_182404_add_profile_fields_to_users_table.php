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
        Schema::table('users', function (Blueprint $table) {
            $table->id();
            $table->string('nom')->nullable()->after('prenom');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('telephone')->nullable();
            $table->string('photo')->nullable();
            $table->string('role');
            $table->boolean('est_actif')->default(true);
            $table->timestamp('date_creation')->useCurrent();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
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
