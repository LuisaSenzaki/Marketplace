<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CalcController extends Controller
{
    public function calc()
    {
        $produtoIds = session('carrinho', []);

        if (empty($produtoIds)) {
            $produtos = collect();
            $total = 0;
        } else {
            $produtos = Product::whereIn('id', $produtoIds)->get();
            $total = $produtos->sum('price');
        }

        return view('calc', compact('produtos', 'total'));
    }

    public function adicionar(Request $request, $id)
    {
        $produto = Product::findOrFail($id);

    $carrinho = session('carrinho', []);
    $carrinho[] = $produto->id;
    session(['carrinho' => $carrinho]);

    $payload = [
        'success' => true,
        'count'   => count($carrinho),
        'name'    => $produto->name,
    ];

    if ($request->expectsJson() || $request->ajax()) {
        return response()->json($payload);
    }

    return redirect()->back()->with('calc_added', $payload);
    }

    public function remover($id)
    {
        $carrinho = session('carrinho', []);
        $carrinho = array_values(array_filter($carrinho, fn($itemId) => (int)$itemId !== (int)$id));

        session(['carrinho' => $carrinho]);

        return redirect()->route('calc')->with('success', 'Produto removido com sucesso!');
    }

    public function limpar()
    {
        session()->forget('carrinho');

        return redirect()->back()->with('success', 'Calculadora limpa com sucesso!');
    }

    public function count()
{
    $carrinho = session('carrinho', []);
    return response()->json([
        'count' => is_array($carrinho) ? count($carrinho) : 0,
    ]);
}

}
