<!DOCTYPE html>
<html lang="pt-br">
<head>
     @vite(['resources/css/app.css', 'resources/js/app.js','resources/css/header-style.css', 'resources/css/desktop.css'])
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hub</title>
</head>
<body>
    @extends('layouts.app')

    @section('title', 'Hub TV1')

    @section('content')

    <div class="container-hub">
        <!-- Área de Produtos -->
        <section class="left-hub">
            <h2>Hub TV1</h2>
            <div class="hub-products">
                @foreach($hubProducts as $hub)
                <a href="{{ route('produto-hub.show', $hub->id) }}" class="hub-product"> <!-- página do produto específico -->
                    
                        <img src="{{ asset('storage/' . $hub->image) }}" alt="{{ $hub->name }}">
                        <h3 class="name-product-hub">{{ $hub->name }}</h3>
                        <p class="description-product">{{ $hub->description }}</p>
</a>
                @endforeach
            </div>
        </section>
    </div>
    @endsection
</body>
</html>