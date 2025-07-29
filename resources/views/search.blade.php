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
        <!-- Filtros -->
        <section class="left-search">
            @if(isset($searchTerm) && $searchTerm != '')
                <h2>{{ $searchTerm }}</h2>
            @else 
                <h2>Ativações</h2>
            @endif
            <form method="GET" action="{{ route('search') }}">
                <div class="filtros">
                    <!-- CATEGORIAS -->
                    <div class="opcoes-filtros">
                        <h4>Categorias Especiais</h4>
                        @php
                            $categorias = [
                                'Eventos Corporativos',
                                'Eventos de Agronegócio',
                                'Eventos de Saúde',
                                'Eventos de Beleza e Cosméticos',
                                'Eventos Alimentícios'
                            ];
                        @endphp
                        @foreach($categorias as $categoria)
                            <label>
                                <input type="checkbox" name="categoria[]" value="{{ $categoria }}"
                                    {{ in_array($categoria, request()->input('categoria', [])) ? 'checked' : '' }}>
                                {{ $categoria }}
                            </label>
                        @endforeach
                    </div>

                    <!-- SISTEMAS OPERACIONAIS -->
                    <div class="opcoes-filtros">
                        <h4>Sistemas Operacionais</h4>
                        @php
                            $sistemas = [
                                'Realidade Virtual',
                                'Games Virtuais',
                                'Cabines e Estações',
                                'Experiências Interativas',
                                'ChatBots e Assistentes'
                            ];
                        @endphp
                        @foreach($sistemas as $so)
                            <label>
                                <input type="checkbox" name="sistema_operacional[]" value="{{ $so }}"
                                    {{ in_array($so, request()->input('sistema_operacional', [])) ? 'checked' : '' }}>
                                {{ $so }}
                            </label>
                        @endforeach
                    </div>

                    <!-- MODALIDADE -->
                    <div class="opcoes-filtros">
                        <h4>Modalidade</h4>
                        @php
                            $modalidades = ['Presencial', 'Virtual', 'Híbrido'];
                        @endphp
                        @foreach($modalidades as $modo)
                            <label>
                                <input type="checkbox" name="modalidade[]" value="{{ $modo }}"
                                    {{ in_array($modo, request()->input('modalidade', [])) ? 'checked' : '' }}>
                                {{ $modo }}
                            </label>
                        @endforeach
                    </div>

                    <!-- FAIXA DE INVESTIMENTO -->
                    <div class="opcoes-filtros">
                        <h4>Faixa de Investimento</h4>
                        <div class="range-container">
                            <input 
                                type="range" 
                                id="preco_min" 
                                name="preco_min" 
                                min="0" 
                                max="10000" 
                                value="{{ request('preco_min', 0) }}">
                        </div>
                    </div>

                    <!-- BOTÃO FILTRAR -->
                    <div class="button-container">
                        <button type="submit">Filtrar</button>
                    </div>
                </div>
            </form>
        </section>

        <!-- Produtos -->
        <div class="produtos">
            @if($products->isEmpty())
                <p>Nenhum produto encontrado.</p>
            @else
                @foreach($products as $product)
                    <div class="card-produto">
                        <img src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}">
                        <p class="name-product">{{ $product->name }}</p>
                        <p class="preco">R$ {{ number_format($product->price, 2, ',', '.') }}</p>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

    <!-- Script da barra de preço -->
    <script>
        const range = document.getElementById("preco_min");

        function atualizarCorBarra() {
            const valor = ((range.value - range.min) / (range.max - range.min)) * 100;
            range.style.background = `linear-gradient(to right, #D0147A ${valor}%, #9F9F9F ${valor}%)`;
        }

        atualizarCorBarra();
        range.addEventListener("input", atualizarCorBarra);
    </script>
    @endsection

</body>
</html>