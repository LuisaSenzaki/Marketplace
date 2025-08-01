<!DOCTYPE html>
<html lang="pt-br">
<head>

    @vite(['resources/css/app.css', 'resources/js/app.js','resources/css/header-style.css', 'resources/css/desktop.css'])
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
</head>
<body>
    @extends('layouts.app')

    @section('title', 'Página Admin-edit')

    @section('content')

    <div class="edit-produto">
        <h2>Editar Produto</h2>

        <form action="{{ route('admin.update', $product) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="first-container-edit">
            <img src="{{ asset('storage/'.$product->image) }}" alt="Imagem atual" id="img-preview">
            <input type="file" name="image" id="image-input" style="display: none;">
            <div class="texto-completo-edit">
                <div class="texto-info-edit">
                    <div class="title-texto-completo-edit">
                        <p>Título</p>
                    </div>  
                    <input type="text" name="name" value="{{ $product->name }}" required>
                </div>
                <div class="texto-info-edit">
                    <div class="title-texto-completo-edit">
                        <p>Modalidade</p>
                    </div>
                    <input type="text" name="modalidade" value="{{ $product->modalidade }}">
                </div>
                <div class="texto-info-edit">
                    <div class="title-texto-completo-edit">
                        <p>Valor Aproximado</p>
                    </div>
                    <input type="text" name="price" value="{{ $product->price }}">
                </div>
            </div>
        </div>

        <div class="second-section-edit">
            
            <div class="infos-complementares">
                <h3>Informações Importantes:</h3>
                <div class="infos-complementares-edit">
                    <div class="spam-area">
                        <p>Sistema Operacional</p>
                    </div>
                    <input type="text" name="sistema_operacional" value="{{ $product->sistema_operacional }}">
                </div>
                <div class="infos-complementares-edit">
                    <div class="spam-area">
                        <p>Tempo Montagem</p>
                    </div>
                    <input type="text" name="tempo_montagem" value="{{ $product->tempo_montagem }}">
                </div>
                <div class="infos-complementares-edit">
                    <div class="spam-area">
                        <p>Tempo Desenvolvimento</p>
                    </div>
                    <input type="text" name="tempo_desenvolvimento" value="{{ $product->tempo_desenvolvimento }}">
                </div>
                <div class="infos-complementares-edit">
                    <div class="spam-area">
                        <p>Capacidade Máxima</p>
                    </div>
                    <input type="text" name="capacidade_maxima" value="{{ $product->capacidade_maxima }}">
                </div>
                <div class="infos-complementares-edit">
                    <div class="spam-area">
                        <p>Dimensão</p>
                    </div>
                    <input type="text" name="dimensoes" value="{{ $product->dimensoes }}">
                </div>
                <div class="infos-complementares-edit">
                    <div class="spam-area">
                        <p>Público Sugerido</p>
                    </div>
                    <input type="text" name="publico_sugerido" value="{{ $product->publico_sugerido }}">
                </div>
                <div class="infos-complementares-edit">
                    <div class="spam-area">
                        <p>Tecnologias Utilizadas</p>
                    </div>
                    <input type="text" name="tecnologias_utilizadas" value="{{ $product->tecnologias_utilizadas }}">
                </div>
            </div>

            <div class="descricao-edit">
                <div class="descricao-edit-title">
                    <h3>Descrição da Ativação:</h3> <!-- ARRUMAR STYLE -->
                </div>
                <textarea name="description" id="description" >{{ $product->description }}</textarea>
            </div>
        </div>

        <!-- Cases Adicionados referente a ativação-->
        <div class="cases-container-edit">
            <h2>Cases</h2>       
            <div class="cases-imagens-edit">
                @for ($i = 1; $i <= 8; $i++)
                    @php
                        $campo = 'imagem' . $i;
                        $imagemUrl = $product->$campo ? asset('storage/' . $product->$campo) : asset('icons/image-placeholder.svg');
                    @endphp
                    <div class="imagem-box">
                        <label for="imagem{{ $i }}" style="display: flex; justify-content: center;">
                            <img id="preview-imagem{{ $i }}"
                                src="{{ $imagemUrl }}"
                                alt="Preview Imagem {{ $i }}"
                                style="width: 200px; height: 200px; object-fit: cover; border: 1px solid #9F9F9F; border-radius: 8px; padding: 10px; cursor: pointer;">
                        </label>
                        <input type="file"
                            name="imagem{{ $i }}"
                            id="imagem{{ $i }}"
                            style="display: none;"
                            accept="image/*"
                            onchange="mostrarPreview(this, 'preview-imagem{{ $i }}')">
                    </div>
                @endfor
            </div>

            <div class="btn-edit">
                <button class="btn-edit-cancelar" type="button" onclick="history.back()">Cancelar</button>
                <button class="btn-edit-salvar" type="submit">Salvar Alterações</button>
            </div>
        </div>
        </form>
    </div>

    <script>
    document.getElementById('img-preview').addEventListener('click', function () {
        document.getElementById('image-input').click();
    });
    </script>

    <script>
        function mostrarPreview(input, previewId) {
            const file = input.files[0];
            const preview = document.getElementById(previewId);

            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    preview.src = e.target.result;
                }
                reader.readAsDataURL(file);
            }
        }
    </script>
    @endsection
</body>
</html>