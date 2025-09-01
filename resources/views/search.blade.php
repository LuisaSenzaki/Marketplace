<!DOCTYPE html>
<html lang="pt-br">
<head>
    @vite(['resources/css/app.css', 'resources/js/app.js','resources/css/header-style.css', 'resources/css/desktop.css'])

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marketplace Xlab</title>
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}?v=1">
    <link rel="alternate icon" type="image/x-icon" href="{{ asset('favicon.ico') }}?v=1">
</head>
<body>
    @extends('layouts.app')

    @section('title', 'Página Cases')

    @section('content')

    <div class="container-search">
        <!-- Filtros -->
        <section class="left-search">
    <form method="GET" action="{{ route('search') }}">
        <div class="filtros">
            <div class="opcoes-filtros">
                <h4>Eventos</h4>
                <div class="conteudo-filtro">
                    @foreach($categorias as $categoria)
                        <label>
                            <input type="checkbox" name="categoria[]" value="{{ $categoria }}"
                                {{ in_array($categoria, request()->input('categoria', [])) ? 'checked' : '' }}>
                            {{ $categoria }}
                        </label>
                    @endforeach
                </div>
            </div>

            <div class="opcoes-filtros">
                <h4>Sistemas</h4>
                <div class="conteudo-filtro">
                    @foreach($sistemas as $so)
                        <label>
                            <input type="checkbox" name="sistema_operacional[]" value="{{ $so }}"
                                {{ in_array($so, request()->input('sistema_operacional', [])) ? 'checked' : '' }}>
                            {{ $so }}
                        </label>
                    @endforeach
                </div>
            </div>

            <div class="opcoes-filtros">
                <h4>Modalidade</h4>
                <div class="conteudo-filtro">
                    @foreach($modalidades as $modo)
                        <label>
                            <input type="checkbox" name="modalidade[]" value="{{ $modo }}"
                                {{ in_array($modo, request()->input('modalidade', [])) ? 'checked' : '' }}>
                            {{ $modo }}
                        </label>
                    @endforeach
                </div>
            </div>

            <div class="button-container">
                <button type="submit">Filtrar</button>
            </div>
        </div>
    </form>
</section>
        <div class="divider" style="border-left: 0.5px solid #ccc; height: 100%; margin: 0 20px;"></div>

        <!-- Produtos -->
         <div class="product-side">
         @if($products->isEmpty())
            <div class="sem-resultados">
                <p>Nenhuma ativação encontrada por agora.</p>
                <img src="{{ asset('images/triste.png') }}" alt="Sem Resultados"> 
            </div>
        @else
            <div class="produtos">
                @foreach($products as $product)
                    <a href="{{ route('produto.show', $product->id) }}" class="card-produto"> <!-- página do produto específico -->
                        <div class="img-produto">
                            <img src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}">
                        </div>
                        <p class="name-product">{{ $product->name }}</p>
                        <p class="preco">R$ {{ number_format($product->price, 2, ',', '.') }}</p>
                    </a>
                @endforeach
            @endif
            </div>
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

    <script>
        (function(){if(!window.chatbase||window.chatbase("getState")!=="initialized"){window.chatbase=(...arguments)=>{if(!window.chatbase.q){window.chatbase.q=[]}window.chatbase.q.push(arguments)};window.chatbase=new Proxy(window.chatbase,{get(target,prop){if(prop==="q"){return target.q}return(...args)=>target(prop,...args)}})}const onLoad=function(){const script=document.createElement("script");script.src="https://www.chatbase.co/embed.min.js";script.id="iEZeS178uETGfn5mK5-BS";script.domain="www.chatbase.co";document.body.appendChild(script)};if(document.readyState==="complete"){onLoad()}else{window.addEventListener("load",onLoad)}})();
    </script>

    <script>
    // Seleciona todos os títulos de filtro
    const titulosFiltro = document.querySelectorAll('.opcoes-filtros h4');

    titulosFiltro.forEach(titulo => {
        titulo.addEventListener('click', () => {
            // Encontra o elemento pai (o container do filtro)
            const opcoesFiltro = titulo.parentElement;

            // Alterna a classe 'expandido' no container
            opcoesFiltro.classList.toggle('expandido');
        });
    });
</script>
    @endsection

</body>
</html>