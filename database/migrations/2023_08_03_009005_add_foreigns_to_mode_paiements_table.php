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
        Schema::table('mode_paiements', function (Blueprint $table) {
            $table
                ->foreign('utilisateur_id')
                ->references('id')
                ->on('utilisateurs')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mode_paiements', function (Blueprint $table) {
            $table->dropForeign(['utilisateur_id']);
        });
    }
};
