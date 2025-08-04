
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
    <div id="formulario-produto" style="display: none;">
        <div class="formulario-container-add">
            <h2>Adicionar Produto</h2>
            <form class="forms-add" action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="infos-principais-add">
                    <div id="img-add">
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="#333" class="bi bi-upload" viewBox="0 0 16 16">
                            <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5"/>
                            <path d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708z"/>
                        </svg>
                        <p>Adicione a Imagem Principal</p>
                        <input type="file" name="image" style="display: none">
                    </div>
                    <div class="first-container-add">
                        <div class="texto-info-edit">
                            <div class="title-texto-completo-edit">
                                <p>Título</p>
                            </div>  
                            <input type="text" name="name" placeholder="Adicione um Título para a Ativação..." required>
                        </div>
                        <div class="texto-info-edit">
                            <div class="title-texto-completo-edit">
                                <p>Modalidade</p>
                            </div>
                            <input type="text" name="modalidade" placeholder="Adicione uma Modalidade...">
                        </div>
                        <div class="texto-info-edit">
                            <div class="title-texto-completo-edit">
                                <p>Valor Aproximado</p>
                            </div>
                            <input type="text" name="price" placeholder="Adicione um valor aproximado...">
                        </div>
                    </div>
                </div>

                <div class="container-infos-complementares-add">
                    <div class="infos-complementares">
                        <h3>Informações Importantes:</h3>
                        <div class="infos-complementares-edit">
                            <div class="spam-area">
                                <p>Sistema Operacional</p>
                            </div>
                            <input type="text" name="sistema_operacional" placeholder="Adicione se o sistema operacional é próprio ou de terceiros...">
                        </div>
                        <div class="infos-complementares-edit">
                            <div class="spam-area">
                                <p>Tempo Montagem</p>
                            </div>
                            <input type="text" name="tempo_montagem" placeholder="Adicione o tempo de montagem em DIAS...">
                        </div>
                        <div class="infos-complementares-edit">
                            <div class="spam-area">
                                <p>Tempo Desenvolvimento</p>
                            </div>
                            <input type="text" name="tempo_desenvolvimento" placeholder="Adicione o tempo de desenvolvimento em DIAS...">
                        </div>
                        <div class="infos-complementares-edit">
                            <div class="spam-area">
                                <p>Capacidade Máxima</p>
                            </div>
                            <input type="text" name="capacidade_maxima" placeholder="Adicione a capacidade máxima de brindes/usuários...">
                        </div>
                        <div class="infos-complementares-edit">
                            <div class="spam-area">
                                <p>Dimensão</p>
                            </div>
                            <input type="text" name="dimensoes" placeholder="Adicione as dimensões...">
                        </div>
                        <div class="infos-complementares-edit">
                            <div class="spam-area">
                                <p>Público Sugerido</p>
                            </div>
                            <input type="text" name="publico_sugerido" placeholder="Adicione o público-sugerido...">
                        </div>
                        <div class="infos-complementares-edit">
                            <div class="spam-area">
                                <p>Tecnologias Utilizadas</p>
                            </div>
                            <input type="text" name="tecnologias_utilizadas" placeholder="Adicione as tecnologias utilizadas...">
                        </div>
                     </div>
                
                    <div class="descricao-edit">
                        <div class="descricao-edit-title">
                            <h3>Descrição da Ativação:</h3>
                        </div>
                        <textarea name="description" id="description" placeholder="Adicione a descrição da Ativação..."></textarea>
                    </div>
                </div>

                <div class="img-cases-add"> 
                    <label>Espaço de Cases</label>
                    <div id="drop-zone" style="border: 1px solid #888; background: #eee; text-align: center; padding: 40px; cursor: pointer; border-radius:8px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#333" class="bi bi-upload" viewBox="0 0 16 16">
                            <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5"/>
                            <path d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708z"/>
                        </svg>
                        <p>Adicione até 8 Arquivos</p>
                        <input type="file" name="imagens[]" id="imagens" accept="image/*" multiple style="display: none;" onchange="validateFiles(this)">
                    </div>
                </div>

                <div class="btn-edit">
                    <button class="btn-edit-cancelar" type="button" onclick="history.back()">Cancelar</button>
                    <button class="btn-edit-salvar" type="submit">Salvar Produto</button>
                </div>
            </form>
        </div>
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
<script>
    const dropZone = document.getElementById('drop-zone');
    const fileInput = document.getElementById('imagens');

    dropZone.addEventListener('click', () => {
        fileInput.click();
    });

    function validateFiles(input) {
        if (input.files.length > 8) {
            alert('Você só pode enviar até 8 arquivos.');
            input.value = "";
        }
    }
</script>

<script>
    const ImagePrincipal = document.getElementById('img-add')

    ImagePrincipal.addEventListener('click', () => {
        fileInput.click();
    })
</script>

    @endsection