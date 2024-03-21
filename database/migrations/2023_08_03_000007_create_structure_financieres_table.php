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
        Schema::create('structure_financieres', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('identifiant');
            $table->string('denomination');
            $table->date('date_creation');
            $table->string('email');
            $table->string('siege_social');
            $table->string('agrement');
            $table->string('site_internet')->nullable();
            $table->string('statut_juridique');
            $table->string('numero_inscription');
            $table->string('boite_postal');
            $table->json('immatriculation')->nullable();
            $table->json('phone')->nullable();
            $table->json('cellulaire')->nullable();
            $table->json('fax')->nullable();
            $table->integer('taux_interet');
            $table->string('delai_retrait_fond');
            $table->string('avatar')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('structure_financieres');
    }
};
