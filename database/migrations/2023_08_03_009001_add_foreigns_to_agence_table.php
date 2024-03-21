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
        Schema::table('agence', function (Blueprint $table) {
            $table
                ->foreign('structure_financiere_id')
                ->references('id')
                ->on('structure_financieres')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('commune_id')
                ->references('id')
                ->on('communes')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('agence', function (Blueprint $table) {
            $table->dropForeign(['structure_financiere_id']);
            $table->dropForeign(['commune_id']);
        });
    }
};
