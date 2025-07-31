<!DOCTYPE html>
<html lang="pt-br">
<head>

    @vite(['resources/css/app.css', 'resources/js/app.js','resources/css/header-style.css', 'resources/css/desktop.css'])
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @extends('layouts.app')

    @section('title', 'Página Admin-edit')

    @section('content')

    <h2>Editar Produto: {{ $product->name }}</h2>

    <form action="{{ route('admin.update', $product) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="text" name="name" value="{{ $product->name }}" required>
    <input type="text" name="categoria" value="{{ $product->categoria }}">
    <input type="text" name="sistema_operacional" value="{{ $product->sistema_operacional }}">
    <input type="text" name="modalidade" value="{{ $product->modalidade }}">
    <input type="text" name="price" value="{{ $product->price }}">
    <input type="text" name="tempo_montagem" value="{{ $product->tempo_montagem }}">
    <input type="text" name="tempo_desenvolvimento" value="{{ $product->tempo_desenvolvimento }}">
    <input type="text" name="capacidade_maxima" value="{{ $product->capacidade_maxima }}">
    <input type="text" name="dimensoes" value="{{ $product->dimensoes }}">
    <input type="text" name="publico_sugerido" value="{{ $product->publico_sugerido }}">
    <input type="text" name="tecnologias_utilizadas" value="{{ $product->tecnologias_utilizadas }}">

    <label>Imagem Principal:</label>
    <input type="file" name="image">

    @for ($i = 1; $i <= 8; $i++)
        <label>Imagem {{ $i }}:</label>
        <input type="file" name="imagem{{ $i }}">
    @endfor

    <button type="submit">Salvar Alterações</button>
    </form>

    @endsection
</body>
</html>