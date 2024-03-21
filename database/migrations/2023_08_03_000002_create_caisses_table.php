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
        Schema::create('caisses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('identifiant');
            $table->string('intitule');
            $table->dateTime('date_debut');
            $table->dateTime('date_echeance')->nullable();
            $table->bigInteger('solde_actuel');
            $table->string('status')->nullable();
            $table->unsignedBigInteger('utilisateur_id');
            $table->unsignedBigInteger('type_caisse_id');
            $table->unsignedBigInteger('structure_financiere_id');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('caisses');
    }
};
