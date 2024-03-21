<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('utilisateurs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom');
            $table->string('prenom');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('remember_token', 100)->nullable();
            $table->string('lieu_naissance');
            $table->string('profession');
            $table->string('identifiant_perso')->nullable();
            $table->string('avatar')->nullable();
            $table->string('sexe');
            $table->string('ville_residence');
            $table->string('code_parainage')->nullable();
            $table->json('preference')->nullable();
            $table->string('piece_identite');
            $table->string('cni')->nullable();
            $table->string('numero_imatriculation')->nullable();
            $table->json('agence')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('utilisateurs');
    }
};
