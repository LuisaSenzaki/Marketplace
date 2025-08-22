    
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

    @section('title', 'Página Produto Hub')

    @section('content')

    <section class="hub-product-page">
        <h2>{{ $hub->name }}</h2>
        <img src="{{ asset('storage/'.$hub->image) }}" alt="{{ $hub->name }}">
        <div class="hr-hub-product"><hr></div>
        <div class="text-hub-product">
            <h3>Sobre a Tecnologia</h3>
            <p class="description-hub-product" style=" white-space: normal; word-wrap: break-word; overflow-wrap: break-word;">{{ $hub->description }}</p>
        </div>
    </section>

    @endsection
</body>
</html>