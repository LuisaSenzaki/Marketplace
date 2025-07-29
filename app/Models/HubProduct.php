<?php

namespace App\Models;


use App\Http\Controllers\HubProductController;
use Illuminate\Database\Eloquent\Model;

class HubProduct extends Model
{
    protected $fillable = ['name', 'description', 'image'];
}
