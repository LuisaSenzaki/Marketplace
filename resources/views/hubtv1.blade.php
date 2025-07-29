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
                @foreach($hubProducts as $product)
                    <div class="hub-product">
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                        <h3>{{ $product->name }}</h3>
                        <p>{{ $product->description }}</p>
                    </div>
                @endforeach
            </div>
        </section>

    @endsection
</body>
</html>