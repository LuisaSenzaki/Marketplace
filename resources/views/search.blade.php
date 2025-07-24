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

    <section class="filtros">
    filtros
    </section>

    <section class="products">
        <h1>Lista de Produtos</h1>
        <ul>
            @foreach ($products as $product)
                <li>
                    <h1>{{ $product->name }}</h1>  
                    <p>{{ number_format($product->price, 2, ',', '.') }}</p>
                </li>
            @endforeach
        </ul>
    </section>

    

    @endsection
</body>
</html>