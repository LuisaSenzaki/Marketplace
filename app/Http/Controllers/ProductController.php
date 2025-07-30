<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    public function search(Request $request)
{
      $searchTerm = $request->input('query');
    $query = Product::query();

    // Aplica busca por nome/descrição SE o campo for preenchido
    if (!empty($searchTerm)) {
        $query->where(function ($q) use ($searchTerm) {
            $q->where('name', 'like', "%{$searchTerm}%")
              ->orWhere('description', 'like', "%{$searchTerm}%");
        });
    }

    // Aplica os filtros (mesmo se não houver busca)
    if ($request->filled('categoria')) {
        $query->whereIn('categoria', $request->categoria);
    }

    if ($request->filled('sistema_operacional')) {
        $query->whereIn('sistema_operacional', $request->sistema_operacional);
    }

    if ($request->filled('modalidade')) {
        $query->whereIn('modalidade', $request->modalidade);
    }

    if ($request->filled('preco_min')) {
        $query->where('preco', '>=', $request->preco_min);
    }

    if ($request->filled('preco_max')) {
        $query->where('preco', '<=', $request->preco_max);
    }

    if ($request->filled('tempo_montagem')) {
        $query->where('tempo_montagem', '<=', $request->tempo_montagem);
    }

    // Busca tudo final
    $products = $query->get();

    return view('search', compact('products', 'searchTerm'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */

    public function show($id)
    {
    $product = Product::findOrFail($id); // Busca o produto pelo ID ou retorna 404
    return view('productpage', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
