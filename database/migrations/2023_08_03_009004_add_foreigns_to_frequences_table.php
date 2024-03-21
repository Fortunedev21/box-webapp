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
        Schema::table('frequences', function (Blueprint $table) {
            $table
                ->foreign('caisse_id')
                ->references('id')
                ->on('caisses')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('frequences', function (Blueprint $table) {
            $table->dropForeign(['caisse_id']);
        });
    }
};
