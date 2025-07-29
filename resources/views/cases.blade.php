<!DOCTYPE html>
<html lang="en">
<head>
    @vite(['resources/css/app.css', 'resources/js/app.js','resources/css/header-style.css', 'resources/css/desktop.css'])

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cases</title>
</head>
<body>
    @extends('layouts.app')

    @section('title', 'Página Cases')

    @section('content')
    <div class="container-hub">
        <!-- Área de Produtos -->
        <section class="left-hub">
            <h2>Hub TV1</h2>
            <div class="hub-products">
                @foreach($casesImages as $product)
                    <div class="hub-product">
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                        <h3 class="name-product-hub">{{ $product->name }}</h3>
                        <p class="description-product">{{ $product->description }}</p>
                    </div>
                @endforeach
            </div>
        </section>
    </div>
    @endsection
</body>
</html>