<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CasesImages;
use Illuminate\Http\Request;

class CasesImagesController extends Controller

{
    public function cases()
    {
        $casesImages = CasesImages::all();
        return view('cases', compact('casesImages'));
    }
}
