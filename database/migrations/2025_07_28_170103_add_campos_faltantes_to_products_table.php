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
        Schema::table('products', function (Blueprint $table) {
        $table->string('sistema_operacional')->nullable();
        $table->string('modalidade')->nullable();
        $table->integer('tempo_montagem')->nullable();
        // outras colunas que você quiser adicionar
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['sistema_operacional', 'modalidade', 'tempo_montagem']);
        });
    }
};
