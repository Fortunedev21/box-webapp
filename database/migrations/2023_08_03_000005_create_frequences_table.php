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
        Schema::create('frequences', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('libelle');
            $table->time('heure');
            $table->json('jours');
            $table->unsignedBigInteger('caisse_id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('frequences');
    }
};
