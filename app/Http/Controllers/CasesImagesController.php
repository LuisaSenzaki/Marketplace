<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\CasesImages;
use Illuminate\Http\Request;

class CasesImagesController extends Controller

{
     public function cases()
    {
    $imagens = Product::pluck('imagens2');
    return view('cases', compact('imagens'));
    }
}
