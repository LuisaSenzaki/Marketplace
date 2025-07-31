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
    
    <container class="admin-page">
    <h1>Painel Administrativo</h1>


    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif
    <div class="options-page"> 
        <div class="add-produto">
            <h2>Produtos</h2>
            <!-- Botão que exibe o formulário e oculta a lista -->
            <button onclick="mostrarFormulario()">Novo Produto <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2"/>
                </svg></button>
        </div>

        <div class="options-especifica">
            <button>Produtos</button>
            <button>Hub TV1</button>
        </div>

        <div class="hr-options"><hr></div>
    </div>

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
        <ul class="produtos-totais">
            @foreach($products as $product)
                <li class="produto-infos"> 
                    <div class="left-side-infos">
                        <img class="perfil-img" src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}">
                        <div class="produto-texto">
                            <p>{{ $product->name }} </p>
                            <p>{{ $product->modalidade }}</p>
                            <p class="price-infos">R$ {{ number_format($product->price, 2, ',', '.')}}</p>
                        </div>
                    </div>
                    <div class="btn-edicao">
                    <!-- Botão de edição -->
                        <a href="{{ route('admin.edit', $product) }}" title="Editar produto" style="margin-right: 8px;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                class="bi bi-pencil" viewBox="0 0 16 16">
                                <path d="M12.146.854a.5.5 0 0 1 .708 0l2.292 2.292a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2L2 11.207V13h1.793L14 3.793 11.207 2z"/>
                            </svg>
                        </a>

                        <form action="{{ route('admin.destroy', $product) }}" method="POST" class="form-excluir" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" title="Excluir produto">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                    class="bi bi-trash" viewBox="0 0 16 16">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                    <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                </svg>
                            </button>
                        </form>
                    </div>

                    
                </li>
                <div class="hr-produto"><hr></div>
            @endforeach
        </ul>
    </div>
    </container>

    <!-- Script para alternar visibilidade -->
    <script>
        function mostrarFormulario() {
            document.getElementById('formulario-produto').style.display = 'block';
            document.getElementById('lista-produtos').style.display = 'none';
            event.target.style.display = 'none';
        }
    </script>

    <script>
    // Seleciona todos os formulários de exclusão
    const forms = document.querySelectorAll('.form-excluir');

    forms.forEach(form => {
        form.addEventListener('submit', function (e) {
            const confirmed = confirm('Tem certeza que deseja excluir este produto? Essa ação não pode ser desfeita.');
            if (!confirmed) {
                e.preventDefault(); // Cancela o envio do form
            }
        });
    });
</script>
    @endsection
</body>
</html>