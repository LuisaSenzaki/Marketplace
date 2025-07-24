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

    <h1>Lista de Produtos</h1>

<ul>
    @foreach ($products as $product)
        <li>
            <strong>{{ $product->name }}</strong> - R$ {{ number_format($product->price, 2, ',', '.') }}
        </li>
    @endforeach
</ul>


    @endsection
</body>
</html>