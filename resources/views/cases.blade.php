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
            <h2>Cases</h2>
            <div class="cases-products">
                @foreach($casesImages as $product)
               
                    <div class="cases-product">
                        <h3 class="name-case">{{ $product->name }}</h3>
                        <div class="title-line">
                            <hr>
                        </div>
                        <div class="container-images-cases">
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </div>
    @endsection
</body>
</html>