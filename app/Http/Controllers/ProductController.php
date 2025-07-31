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
       $data = $request->validate([
        'name' => 'required|string',
        'sistema_operacional' => 'nullable|string',
        'modalidade' => 'nullable|string',
        'price' => 'nullable|string',
        'tempo_montagem' => 'nullable|string',
        'tempo_desenvolvimento' => 'nullable|string',
        'capacidade_maxima' => 'nullable|string',
        'dimensoes' => 'nullable|string',
        'publico_sugerido' => 'nullable|string',
        'tecnologias_utilizadas' => 'nullable|string',
    ]);

    // Salvar imagem principal
    if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')->store('produtos', 'public');
    }

    // Salvar imagens adicionais
    for ($i = 1; $i <= 8; $i++) {
        $field = 'imagem' . $i;
        if ($request->hasFile($field)) {
            $data[$field] = $request->file($field)->store('produtos', 'public');
        }
    }

    Product::create($data);
    return redirect()->route('admin')->with('success', 'Produto salvo com sucesso!');
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
        return view('edit-product', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
        'name' => 'required|string',
        'sistema_operacional' => 'nullable|string',
        'modalidade' => 'nullable|string',
        'price' => 'nullable|string',
        'tempo_montagem' => 'nullable|string',
        'tempo_desenvolvimento' => 'nullable|string',
        'capacidade_maxima' => 'nullable|string',
        'dimensoes' => 'nullable|string',
        'publico_sugerido' => 'nullable|string',
        'tecnologias_utilizadas' => 'nullable|string',
    ]);

    // Atualiza imagens se forem enviadas novas
    if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')->store('produtos', 'public');
    }

    for ($i = 1; $i <= 8; $i++) {
        $field = 'imagem' . $i;
        if ($request->hasFile($field)) {
            $data[$field] = $request->file($field)->store('produtos', 'public');
        }
    }

    $product->update($data);

    return redirect()->route('admin')->with('success', 'Produto atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin')->with('success', 'Produto excluído com sucesso!');
    }

    public function admin()
    {
        $products = Product::all();
        return view('admin', compact('products'));
    }
}
