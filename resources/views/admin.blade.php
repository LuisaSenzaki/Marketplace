<!DOCTYPE html>
<html lang="pt-br">
<head>
    @vite(['resources/css/app.css', 'resources/js/app.js','resources/css/header-style.css', 'resources/css/desktop.css'])

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adm</title>
</head>
<body>
    @extends('layouts.app')

    @section('title', 'Página Admin')

    @section('content')
    
     <h1>Painel de Administração</h1>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <!-- Botão que exibe o formulário e oculta a lista -->
    <button onclick="mostrarFormulario()">Adicionar novo produto</button>

    <!-- Formulário de Adicionar Produto -->
    <div id="formulario-produto" style="display: none; margin-top: 20px;">
        <h2>Adicionar Produto</h2>
        <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <label>Imagem Principal:</label>
            <input type="file" name="image">

            <input type="text" name="name" placeholder="Nome" required>
            <input type="text" name="categoria" placeholder="Categoria">
            <input type="text" name="sistema_operacional" placeholder="Sistema Operacional">
            <input type="text" name="modalidade" placeholder="Modalidade">
            <input type="text" name="price" placeholder="Preço">
            <input type="text" name="tempo_montagem" placeholder="Tempo de Montagem">

            <input type="text" name="tempo_desenvolvimento" placeholder="Tempo de Desenvolvimento">
            <input type="text" name="capacidade_maxima" placeholder="Capacidade Máxima">
            <input type="text" name="dimensoes" placeholder="Dimensões">
            <input type="text" name="publico_sugerido" placeholder="Público Sugerido">
            <input type="text" name="tecnologias_utilizadas" placeholder="Tecnologias Utilizadas">


            @for ($i = 1; $i <= 8; $i++)
                <label>Imagem {{ $i }}:</label>
                <input type="file" name="imagem{{ $i }}">
            @endfor

            <button type="submit">Salvar Produto</button>
        </form>
    </div>

    <!-- Lista de produtos já cadastrados -->
    <div id="lista-produtos">
        <h2 style="margin-top: 40px;">Produtos Cadastrados</h2>
        <ul>
            @foreach($products as $product)
                <li>
                    {{ $product->name }} — {{ $product->categoria }}
                    <form action="{{ route('admin.destroy', $product) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Excluir</button>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>

    <!-- Script para alternar visibilidade -->
    <script>
        function mostrarFormulario() {
            document.getElementById('formulario-produto').style.display = 'block';
            document.getElementById('lista-produtos').style.display = 'none';
            event.target.style.display = 'none';
        }
    </script>
    @endsection
</body>
</html>