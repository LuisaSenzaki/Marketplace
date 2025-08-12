<?php

namespace App\Http\Controllers;

use App\Models\HubProduct;
use Illuminate\Http\Request;

class HubProductController extends Controller
{
    public function index()
    {
        $hubProducts = HubProduct::all();
        return view('hubtv1', compact('hubProducts'));
    }

    public function create()
    {
        return view('hubtv1-create'); // Crie essa view se quiser
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('hub', 'public');
        }

        HubProduct::create($data);

        return redirect()->route('hub-admin.index')->with('success', 'Produto Hub criado com sucesso!');
    }

    public function edit(HubProduct $hubProduct)
    {
        return view('hubtv1-edit', compact('hubProduct'));
    }

    public function update(Request $request, HubProduct $hubProduct)
    {
    $data = $request->validate([
        'name' => 'required|string',
        'description' => 'nullable|string',
        'image' => 'nullable|image|max:2048'
    ]);

    if ($request->hasFile('image')) {
        if ($hubProduct->image && \Storage::disk('public')->exists($hubProduct->image)) {
            \Storage::disk('public')->delete($hubProduct->image);
        }
        $data['image'] = $request->file('image')->store('hub', 'public');
    } else {
        unset($data['image']);
    }

    $hubProduct->update($data);

    return redirect()->route('admin', ['filtro' => 'hub'])->with('success', 'Produto Hub atualizado com sucesso!');
}

    public function destroy(HubProduct $hubProduct)
    {
        $hubProduct->delete();

        return redirect()->route('admin', ['filtro' => 'hub'])->with('success', 'Produto Hub excluído com sucesso!');

    }

    public function hubtv1()
    {
    $hubProducts = HubProduct::all();
    return view('hubtv1', compact('hubProducts'));
    }

    public function show($id)
    {
    $hub = HubProduct::findOrFail($id); // Busca o produto pelo ID ou retorna 404
    return view('producthub-page', compact('hub'));
    }

}
