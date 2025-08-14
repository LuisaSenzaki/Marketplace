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
            <input type="file" name="image" id="image-input" style="display: none;" onchange="mostrarPreview(this, 'img-preview')">
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
                <div class="select-wrapper">
                    <select name="modalidade" class="form-select"
                    style="font-family: 'gilroy-light', sans-serif;
                            color: #9F9F9F;
                            background: #fff;
                            box-shadow: 4px 4px 4px 0 rgba(0, 0, 0, 0.05);
                            width: 100%;
                            height: 50px;
                            border-radius: 10px;
                            padding: 10px 40px 10px 10px; /* Espaço extra p/ ícone */
                            appearance: none;
                            -webkit-appearance: none;
                            -moz-appearance: none;">
                    <option value="">{{ $product->modalidade }}</option>
                    <option value="Híbrido">Híbrido</option>
                    <option value="Presencial">Presencial</option>
                    <option value="Virtual">Virtual</option>
                    </select>

                    <svg xmlns="http://www.w3.org/2000/svg"
                        width="16" height="16" fill="#9F9F9F"
                        class="select-icon bi bi-caret-down"
                        viewBox="0 0 16 16">
                    <path d="M3.204 5h9.592L8 10.481zm-.753.659 
                            4.796 5.48a1 1 0 0 0 1.506 0l4.796-5.48
                            c.566-.647.106-1.659-.753-1.659H3.204
                            a1 1 0 0 0-.753 1.659"/>
                    </svg>
                </div>
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
                        <p>Categoria Relacionada</p>
                    </div>
                    <select name="categoria" class="form-select" style="border: #9F9F9F solid 1px; width: 350px; padding: 0px 10px; font-family: 'gilroy-light', sans-serif; color: #9F9F9F;">
                        <option value="">{{ $product->categoria }}</option>
                        <option value="Eventos Corporativos">Eventos Corporativos</option>
                        <option value="Eventos de Agronegócio">Eventos de Agronegócio</option>
                        <option value="Eventos de Saúde">Eventos de Saúde</option>
                        <option value="Eventos de Beleza e Cosméticos">Eventos de Beleza e Cosméticos</option>
                        <option value="Eventos Alimentícios">Eventos Alimentícios</option>
                    </select>
                </div>
                <div class="infos-complementares-edit">
                    <div class="spam-area">
                         <p>Sistema Operacional</p>
                    </div>
                    <select name="sistema_operacional" class="form-select" style="border: #9F9F9F solid 1px; width: 350px; padding: 0px 10px; font-family: 'gilroy-light', sans-serif; color: #9F9F9F;">
                        <option value="">{{ $product->sistema_operacional }}</option>
                        <option value="Realidade Virtual">Realidade Virtual</option>
                        <option value="Games Virtuais">Games Virtuais</option>
                        <option value="Cabines e Estações">Cabines e Estações</option>
                        <option value="Experiências Interativas">Experiências Interativas</option>
                        <option value="ChatBots e Assistentes">ChatBots e Assistentes</option>
                    </select>
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
                    <select name="publico_sugerido"  class="form-select" style="border: #9F9F9F solid 1px; width: 350px; padding: 0px 10px; font-family: 'gilroy-light', sans-serif; color: #9F9F9F;">
                        <option value="">{{ $product->publico_sugerido }}</option>
                        <option value="B2C">B2C</option>
                        <option value="B2B">B2B</option>
                        <option value="B2C e B2B">B2C e B2B</option>
                    </select>
                </div>
                <div class="infos-complementares-edit">
                    <div class="spam-area">
                         <p>Tecnologias Utilizadas</p>
                    </div>
                    <select name="tecnologias_utilizadas"  class="form-select" style="border: #9F9F9F solid 1px; width: 350px; padding: 0px 10px; font-family: 'gilroy-light', sans-serif; color: #9F9F9F;">
                        <option value="">{{ $product->tecnologias_utilizadas }}</option>
                        <option value="Software">Software</option>
                        <option value="Hardware">Hardware</option>
                        <option value="Sensores">Sensores</option>
                        <option value="Inteligência Artificial">Inteligência Artificial</option>
                    </select>
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
                        $imagemUrl = $product->$campo ? asset('storage/' . $product->$campo) : null;
                    @endphp
                    <div class="imagem-box" style="cursor: pointer; width: 200px; height: 200px; border: 1px solid #9F9F9F; border-radius: 8px; padding: 10px; display: flex; justify-content: center; align-items: center;">
                        <label for="imagem{{ $i }}" style="cursor: pointer; width: 100%; height: 100%; display: flex; justify-content: center; align-items: center;">
                            @if ($imagemUrl)
                                <img id="preview-imagem{{ $i }}" src="{{ $imagemUrl }}" alt="Preview Imagem {{ $i }}" style="width: 100%; height: 100%; object-fit: cover; border-radius: 8px;">
                            @else
                                {{-- SVG de upload --}}
                                <svg id="preview-imagem{{ $i }}" xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="#333" class="bi bi-upload" viewBox="0 0 16 16">
                                    <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5"/>
                                    <path d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708z"/>
                                </svg>
                            @endif
                        </label>
                        <input type="file" name="imagem{{ $i }}" id="imagem{{ $i }}" style="display: none;" accept="image/*" onchange="mostrarPreview(this, 'preview-imagem{{ $i }}')">
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

    <!-- Função de pré-visualização -->
    <script>
    function mostrarPreview(input, previewId) {
        const file = input.files[0];
        const preview = document.getElementById(previewId);
        if (!file || !preview) return;

        const reader = new FileReader();
        reader.onload = function (e) {
        if (preview.tagName.toLowerCase() === 'img') {
            preview.src = e.target.result;
        } else {
            const img = document.createElement('img');
            img.id = previewId;
            img.src = e.target.result;
            img.style.width = '100%';
            img.style.height = '100%';
            img.style.objectFit = 'cover';
            img.style.borderRadius = '8px';
            preview.parentNode.replaceChild(img, preview);
        }
        }
        reader.readAsDataURL(file);
        }

        // clicar na imagem abre o seletor
        document.getElementById('img-preview').addEventListener('click', function () {
            document.getElementById('image-input').click();
        });
    </script>


    @endsection
</body>
</html>