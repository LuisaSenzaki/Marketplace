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
        $table->string('tempo_desenvolvimento')->nullable();
        $table->string('capacidade_maxima')->nullable();
        $table->string('dimensoes')->nullable();
        $table->string('publico_sugerido')->nullable();
        $table->string('tecnologias_utilizadas')->nullable();

        // Novas colunas de imagem
        $table->string('imagem1')->nullable();
        $table->string('imagem2')->nullable();
        $table->string('imagem3')->nullable();
        $table->string('imagem4')->nullable();
        $table->string('imagem5')->nullable();
        $table->string('imagem6')->nullable();
        $table->string('imagem7')->nullable();
        $table->string('imagem8')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn([
            'tempo_desenvolvimento',
            'capacidade_maxima',
            'dimensoes',
            'publico_sugerido',
            'tecnologias_utilizadas',
            'imagem1',
            'imagem2',
            'imagem3',
            'imagem4',
            'imagem5',
            'imagem6',
            'imagem7',
            'imagem8'
        ]);
        });
    }
};
