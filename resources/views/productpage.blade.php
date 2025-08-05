<!DOCTYPE html>
<html lang="pt-br">
<head>
    @vite(['resources/css/app.css', 'resources/js/app.js','resources/css/header-style.css', 'resources/css/desktop.css'])
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>product</title>
</head>
<body>
    @extends('layouts.app')

    @section('title', 'Página Cases')

    @section('content')

    <div class="container-product">

        <div class="breadcrumbs"></div>

        <section class="information-inicial">
            <div class="image-container-left">
                <img src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}">
            </div>

            <div class="text-right">
                <h2>{{ $product->name }}</h2>

                <div class="tempo-container">
                    <p class="tempo">{{ $product->tempo_desenvolvimento }} dias</p>
                    <p>|</p>
                    <p class="tempo-termo">Tempo de Desenvolvimento</p>
                </div>

                <div class="line-tempo">
                    <hr>
                </div>

                <div class="valor-container">
                    <p class="text-valor">A partir de</p>
                    <p class="valor">R$ {{ number_format($product->price, 2, ',', '.') }}</p>
                </div>

                <h3>Detalhes da Ativação</h3>

                <div class="info">
                    <h4>Tempo de Instalação:</h4>
                    <p>{{ $product->tempo_montagem }} dias</p>
                </div>

                <div class="info">
                    <h4>Tempo de Desenvolvimento:</h4>
                    <p>{{ $product->tempo_desenvolvimento }} dias</p>
                </div>

                <div class="info">
                    <h4>Capacidade Máxima:</h4>
                    <p>{{ $product->capacidade_maxima }}</p>
                </div>

                <div class="info">
                    <h4>Dimensões:</h4>
                    <p>{{ $product->dimensoes }} m</p>
                </div>

                <div class='btn-calculadora'>
                    <form action="{{ route('calc.adicionar', $product->id) }}" method="POST">
                    @csrf
                        <button type="submit" class="btn-comprar">Adicionar à Calculadora</button>
                    </form>
                </div>
            </div>
        </section>

        <section class="information-detalhes">
            <h1>Sobre a Ativação</h1>
            <p class="description">{{ $product->description }}</p>

            <div class="info">
                <h4>Público Sugerido:</h4>
                <p>{{ $product->publico_sugerido }}</p>
            </div>

            <div class="info">
                <h4>Tecnologias Utilizadas:</h4>
                <p>{{ $product->tecnologias_utilizadas }}</p>
            </div>
        </section>

        <section class="video">
            <iframe src="https://www.youtube.com/embed/{{ $product->video_id }}" frameborder="0" allowfullscreen></iframe>
        </section>

        <div class="divider">
            <hr>
        </div>

        <section class="cases-especificos">
            <h2>Nossos Cases</h2>
            <div class="cases-imgs">
                <img src="{{ asset('storage/'.$product->imagem1) }}" alt="Caso de Sucesso">
                <img src="{{ asset('storage/'.$product->imagem2) }}" alt="Caso de Sucesso">
                <img src="{{ asset('storage/'.$product->imagem3) }}" alt="Caso de Sucesso">
                <img src="{{ asset('storage/'.$product->imagem4) }}" alt="Caso de Sucesso">
                <img src="{{ asset('storage/'.$product->imagem5) }}" alt="Caso de Sucesso">
                <img src="{{ asset('storage/'.$product->imagem6) }}" alt="Caso de Sucesso">
                <img src="{{ asset('storage/'.$product->imagem7) }}" alt="Caso de Sucesso">
                <img src="{{ asset('storage/'.$product->imagem8) }}" alt="Caso de Sucesso">
            </div>
        </section>
    </div>

    @endsection
</body>
</html>