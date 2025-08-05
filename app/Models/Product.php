<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
    'name',
    'categoria',
    'description',
    'sistema_operacional',
    'modalidade',
    'price',
    'tempo_montagem',
    'image',
    'tempo_desenvolvimento',
    'capacidade_maxima',
    'dimensoes',
    'publico_sugerido',
    'tecnologias_utilizadas',
    'image',
    'imagem1',
    'imagem2',
    'imagem3',
    'imagem4',
    'imagem5',
    'imagem6',
    'imagem7',
    'imagem8'
    ];
}