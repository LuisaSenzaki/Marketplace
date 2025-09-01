<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\HubProduct;
use App\Models\User;
use App\Mail\UserApproved; // Importe o Mailable
use Illuminate\Support\Facades\Mail; // Importe a fachada de Mail

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //   $pendingUsers = User::where('is_approved', false)->get();
        // $approvedUsers = User::where('is_approved', true)->get();

        // return view('admin', compact('pendingUsers', 'approvedUsers'));
    }

     public function approve(User $user)
    {
        $user->update(['is_approved' => 1]);

        Mail::to($user->email)->send(new UserApproved($user));

    return redirect()->route('admin')->with('success', 'Usuário aprovado e e-mail de notificação enviado com sucesso!');
    }

    public function disapprove(User $user)
    {
        $user->update(['is_approved' => 0]);

        return redirect()->route('admin')->with('success', 'Usuário desaprovado com sucesso!');
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
        $query->where('price', '>=', $request->preco_min);
    }

    if ($request->filled('preco_max')) {
        $query->where('price', '<=', $request->preco_max);
    }

    if ($request->filled('tempo_montagem')) {
        $query->where('tempo_montagem', '<=', $request->tempo_montagem);
    }

    // Busca tudo final
    $products = $query->get();

     $categorias = [
        'Eventos Corporativos',
        'Eventos de Agronegócio',
        'Eventos de Saúde',
        'Eventos de Beleza e Cosméticos',
        'Eventos Alimentícios'
    ];

    $sistemas = [
        'Realidade Virtual',
        'Games Virtuais',
        'Cabines e Estações',
        'Experiências Interativas',
        'ChatBots e Assistentes'
    ];

    $modalidades = [
        'Presencial',
        'Virtual',
        'Híbrido'
    ];

    return view('search', compact('products', 'searchTerm', 'categorias', 'sistemas', 'modalidades'));
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
        'categoria' => 'nullable|string',
        'sistema_operacional' => 'nullable|string',
        'modalidade' => 'nullable|string',
        'price' => 'nullable|string',
        'tempo_montagem' => 'nullable|string',
        'tempo_desenvolvimento' => 'nullable|string',
        'capacidade_maxima' => 'nullable|string',
        'dimensoes' => 'nullable|string',
        'publico_sugerido' => 'nullable|string',
        'tecnologias_utilizadas' => 'nullable|string',
        'description' => 'nullable|string',
        'video_id' => ['nullable','string','max:64','regex:/^[A-Za-z0-9_-]{5,}$/'],
        // 'imagens.*' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:2048',
        // 'imagens' => 'nullable|array|max:8',
    ]);

    // Salvar imagem principal
    if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')->store('produtos', 'public');
    }

   for ($i = 1; $i <= 8; $i++) {
        $campo_imagem = 'imagem' . $i;
        if ($request->hasFile($campo_imagem)) {
            $data[$campo_imagem] = $request->file($campo_imagem)->store('produtos', 'public');
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
        'categoria' => 'nullable|string',
        'sistema_operacional' => 'nullable|string',
        'modalidade' => 'nullable|string',
        'price' => 'nullable|string',
        'tempo_montagem' => 'nullable|string',
        'tempo_desenvolvimento' => 'nullable|string',
        'capacidade_maxima' => 'nullable|string',
        'dimensoes' => 'nullable|string',
        'publico_sugerido' => 'nullable|string',
        'tecnologias_utilizadas' => 'nullable|string',
        'description' => 'nullable|string',
        'video_id' => ['nullable','string','max:64','regex:/^[A-Za-z0-9_-]{5,}$/'],
        // 'imagens.*' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:2048',
        // 'imagens' => 'nullable|array|max:8',
    ]);

    // Atualiza imagens se forem enviadas novas
    if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')->store('produtos', 'public');
    }

  // Atualiza imagens extras individualmente
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
        $hubProducts = HubProduct::all();

        $users = User::orderBy('is_approved')->get();

        return view('admin', compact('users', 'products', 'hubProducts'));
    }


    public function getVideoId($id)
    {
        $product = Product::findOrFail($id);

        // Retorna só o campo video_ip
        return response()->json([
            'id' => $product->id,
            'video_id' => $product->video_id,
        ]);
    }



}