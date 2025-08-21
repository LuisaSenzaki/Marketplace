<!DOCTYPE html>
<html lang="pt-br">
<head>
    @vite(['resources/css/app.css', 'resources/js/app.js','resources/css/header-style.css', 'resources/css/desktop.css'])

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
@extends('layouts.app')

    @section('title', 'Hub TV1')

    @section('content')

    <div class="container-hub">
        <!-- Área de Produtos -->
        <section class="left-hub">
            <h2>Editar Produto</h2>
            <div class="hub-product-edit">
                <form action="{{ route('hub-admin.update', $hubProduct) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <img src="{{ asset('storage/' . $hubProduct->image) }}" alt="{{ $hubProduct->name }}" id="img-preview">
                    <input type="file" name="image" id="image-input" style="display: none;" >
                    <div class="texto-info-edit">
                        <div class="title-texto-completo-edit">
                            <p>Título</p>
                        </div>
                        <input type="text" name="name" value="{{ old('name', $hubProduct->name) }}" required>
                    </div>

                    <div class="descricao-edit-hub">
                        <div class="descricao-edit-title">
                            <h3>Descrição da Ativação:</h3>
                        </div>
                        <textarea name="description" class="description-hub-edit" id="description">{{ old('description', $hubProduct->description) }}</textarea>
                    </div>

                    <div class="btn-edit">
                        <button class="btn-edit-cancelar" type="button" onclick="history.back()">Cancelar</button>
                        <button class="btn-edit-salvar" type="submit">Salvar Alterações</button>
                    </div>
                </form>
            </div>
        </section>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
        const imageInput = document.getElementById('image-input');
        const imgPreview = document.getElementById('img-preview');

            imgPreview.addEventListener('click', function () {
                imageInput.click();
            });

            imageInput.addEventListener('change', function () {
                mostrarPreview(this, 'img-preview');
            });
        });

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