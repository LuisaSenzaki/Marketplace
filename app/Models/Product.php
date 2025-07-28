<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'categoria', 'sistema_operacional', 'modalidade',
        'price', 'tempo_montagem', 'image'];
}