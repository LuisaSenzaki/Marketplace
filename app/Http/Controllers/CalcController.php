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
        $produtos = \App\Models\Product::whereIn('id', $produtoIds)->get();
        $total = $produtos->sum('price');
    }

    return view('calc', compact('produtos', 'total'));
    }

    public function remover($id)
    {
        $carrinho = session('carrinho', []);
        $carrinho = array_filter($carrinho, fn($itemId) => $itemId != $id);
        session(['carrinho' => $carrinho]);

        return redirect()->route('calc')->with('success', 'Produto removido com sucesso!');
    }

    public function adicionar($id)
    {
    {
    $carrinho = session('carrinho', []);

    if (!in_array($id, $carrinho)) {
        $carrinho[] = $id;
        session(['carrinho' => $carrinho]);
    }

    return redirect()->back()->with('success', 'Produto adicionado à calculadora!');
    }
}

public function limpar()
{
    session()->forget('carrinho');

    return redirect()->back()->with('success', 'Calculadora limpa com sucesso!');
}


}
