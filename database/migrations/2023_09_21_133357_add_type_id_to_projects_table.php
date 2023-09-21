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
        Schema::table('projects', function (Blueprint $table) {
            $table->unsignedBigInteger('type')->nullable()->after('content');

            $table->foreign('type')      // Colonna della tabella posts che conterrà il vincolo di FK
                ->references('id')              // Colonna della tabella a cui mi riferisco
                ->on('types')              // Tabella a cui mi riferisco
                ->onUpdate('cascade')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            // Rimuovo la FK
            $table->dropForeign(['type']);

            // Rimuovo la colonna
            $table->dropColumn('type');
        });
    }
};