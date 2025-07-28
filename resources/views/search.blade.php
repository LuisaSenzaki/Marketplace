<!DOCTYPE html>
<html lang="pt-br">
<head>
    @vite(['resources/css/app.css', 'resources/js/app.js','resources/css/header-style.css', 'resources/css/desktop.css'])

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
</head>
<body>
    @extends('layouts.app')

    @section('title', 'Página Cases')

    @section('content')

    <div class="container-search">

    <!-- Área de Filtros e Opções -->
    <section class="left-side">
        <h2>Ativações</h2>
        <form method="GET" action="{{ route('search') }}">
            <div class="filtros">
                <h4>Categorias Especiais</h4>
                <label><input type="checkbox" name="categoria[]" value="Eventos Corporativos"> Eventos Corporativos</label>
                <label><input type="checkbox" name="categoria[]" value="Eventos de Agronegócio"> Eventos de Agronegócio</label>
                <label><input type="checkbox" name="categoria[]" value="Eventos de Saúde"> Eventos de Saúde</label>
                <label><input type="checkbox" name="categoria[]" value="Eventos de Beleza e Cosméticos"> Eventos de Beleza e Cosméticos</label>
                <label><input type="checkbox" name="categoria[]" value="Eventos Alimentícios"> Eventos Alimentícios</label>

                <h4>Sistemas Operacionais</h4>
                <label><input type="checkbox" name="sistema_operacional[]" value="Realidade Virtual"> Realidade Virtual</label>
                <label><input type="checkbox" name="sistema_operacional[]" value="Games Virtuais"> Games Virtuais</label>
                <label><input type="checkbox" name="sistema_operacional[]" value="Cabines e Estações"> Cabines e Estações</label>
                <label><input type="checkbox" name="sistema_operacional[]" value="Experiências Interativas"> Experiências Interativas</label>
                <label><input type="checkbox" name="sistema_operacional[]" value="ChatBots e Assistentes"> ChatBots e Assistentes</label>

                <h4>Modalidade</h4>
                <label><input type="checkbox" name="modalidade[]" value="Presencial"> Presencial</label>
                <label><input type="checkbox" name="modalidade[]" value="Virtual"> Virtual</label>
                <label><input type="checkbox" name="modalidade[]" value="Híbrido"> Híbrido</label>

                <h4>Faixa de Investimento</h4>
                <input type="range" name="preco_min" placeholder="Min" min="0" max="10000">

                <button type="submit">Filtrar</button>
            </div>
        </form>
    </section>

    <!-- Lista de Produtos -->
    <div class="produtos">
        @foreach($products as $product)
        <div class="card-produto">
            <img src="{{ asset('storage/'.$product->image) }}" alt="Produto">
            <p>{{ $product->name }}</p>
            <p>R$ {{ number_format($product->price, 2, ',', '.') }}</p>
        </div>
        @endforeach
    </div>
</div>
    
    @endsection
</body>
</html>