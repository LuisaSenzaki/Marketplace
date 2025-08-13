
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
            <button onclick="mostrarFormulario()" style="cursor: pointer;">Novo Produto <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2"/>
                </svg></button>
        </div>

        <div class="options-especifica">
            <button id="btn-produtos" style="cursor: pointer;">Produtos</button>
            <button id="btn-hub" style="cursor: pointer;">Hub TV1</button>
        </div>

        <div class="hr-options"><hr></div>
    </div>

    <!-- Formulário de Adicionar Produto Hub -->
    <div id="formulario-hub" style="display: none;">
        <div class="formulario-container-add">
            <h2>Adicionar Produto Hub</h2>
            <form class="forms-add" id="form-hub" action="{{ route('hub-admin.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="infos-principais-add">
                    <input type="file" name="image" class="img-add">
                    <div class="first-container-add">
                        <div class="texto-info-edit">
                            <p>Título</p>
                            <input type="text" name="name" placeholder="Título do Hub" required>
                        </div>
                        <div class="texto-info-edit">
                            <p>Descrição da Ativação</p>
                            <input type="text" name="description">
                        </div>
                    </div>
                </div>

                <div class="btn-edit">
                    <button class="btn-edit-cancelar" type="button" onclick="voltarLista()">Cancelar</button>
                    <button class="btn-edit-salvar" type="submit">Salvar Produto Hub</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Formulário de Adicionar Produto -->
    <div id="formulario-produto" style="display: none;">
        <div class="formulario-container-add">
            <h2>Adicionar Produto</h2>
            <form class="forms-add" id="form-produto" action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="infos-principais-add">
                    <div id="img-add" style="cursor: pointer; text-align: center;">

                    <!-- Conteúdo que some -->
                        <div id="upload-content" >
                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="#333" class="bi bi-upload" viewBox="0 0 16 16">
                                <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5"/>
                                <path d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708z"/>
                            </svg>
                            <p>Adicione a Imagem Principal</p>
                        </div>

                        <!-- Input e preview -->
                        <input type="file" name="image" id="input-image" accept="image/*" style="display: none;">
                        <img id="preview-image" src="" alt="Preview da imagem" style="width: 100%; height: 350px; display: none; border-radius: 8px; margin-top: 10px; text-align: center;">
                    </div>
                    <div class="first-container-add">
                        <div class="texto-info-edit">
                            <div class="title-texto-completo-edit">
                                <p>Título</p>
                            </div>  
                            <input type="text" name="name" placeholder="Adicione um Título para a Ativação..." required>
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
                    <option value="">Selecione uma Modalidade de Evento</option>
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
                            <select name="sistema_operacional" class="form-select" style="border: #9F9F9F solid 1px; width: 350px; padding: 0px 10px; font-family: 'gilroy-light', sans-serif; color: #9F9F9F;">
                                <option value="">Selecione uma opção</option>
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
                        <div class="infos-complementares-edit">
                            <div class="spam-area">
                                <p>Categoria Relacionada</p>
                            </div>
                            <select name="categoria" class="form-select" style="border: #9F9F9F solid 1px; width: 350px; padding: 0px 10px; font-family: 'gilroy-light', sans-serif; color: #9F9F9F;">
                                <option value="">Selecione uma Categoria</option>
                                <option value="Eventos Corporativos">Eventos Corporativos</option>
                                <option value="Eventos de Agronegócio">Eventos de Agronegócio</option>
                                <option value="Eventos de Saúde">Eventos de Saúde</option>
                                <option value="Eventos de Beleza e Cosméticos">Eventos de Beleza e Cosméticos</option>
                                <option value="Eventos Alimentícios">Eventos Alimentícios</option>
                            </select>
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
                        <input type="file" name="imagens[]" id="imagens" accept="image/*" multiple style="display: none;">
                    </div>
                    <div id="files-list">
                        Nenhum arquivo selecionado.
                    </div>
                    
                </div>

                <div class="btn-edit">
                    <button class="btn-edit-cancelar" type="button" onclick="voltarLista()">Cancelar</button>
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
                        <img class="perfil-img" src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}" style="object-fit: cover;">
                        <div class="produto-texto">
                            <p>{{ $product->name }} </p>
                            <p>{{ $product->modalidade }}</p>
                            <p class="price-infos">R$ {{ number_format($product->price, 2, ',', '.')}}</p>
                        </div>
                    </div>
                    <div class="btn-edicao">
                        <a href="{{ route('admin.edit', $product) }}" title="Editar produto" style="margin-right: 8px;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                class="bi bi-pencil" viewBox="0 0 16 16">
                                <path d="M12.146.854a.5.5 0 0 1 .708 0l2.292 2.292a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2L2 11.207V13h1.793L14 3.793 11.207 2z"/>
                            </svg>
                        </a>

                        <form action="{{ route('admin.destroy', $product) }}" method="POST" class="form-excluir" style="display:inline; cursor:pointer;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" title="Excluir produto">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" cursor="pointer"
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

    <!-- Lista de produtos cadastrados Hub TV1 -->
    <div id="lista-hub" style="display: none;">
        <ul class="produtos-totais">
            @foreach($hubProducts as $hub)
                <li class="produto-infos">
                    <div class="left-side-infos">
                        <img class="perfil-img" src="{{ asset('storage/'.$hub->image) }}" alt="{{ $hub->name }}" style="object-fit: cover;">
                        <div class="produto-texto">
                            <p>{{ $hub->name }}</p>
                            <p>{{ $hub->modalidade }}</p>
                            <p class="price-infos">R$ {{ number_format($hub->price, 2, ',', '.') }}</p>
                        </div>
                    </div>
                    <div class="btn-edicao">
                        <a href="{{ route('hub-admin.edit', $hub) }}" title="Editar produto" style="margin-right: 8px;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                class="bi bi-pencil" viewBox="0 0 16 16">
                                <path d="M12.146.854a.5.5 0 0 1 .708 0l2.292 2.292a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2L2 11.207V13h1.793L14 3.793 11.207 2z"/>
                            </svg>
                        </a>

                        <form action="{{ route('hub-admin.destroy', $hub) }}" method="POST" class="form-excluir" style="display:inline;">
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
    const btn = event.target;
    const formProduto = document.getElementById('formulario-produto');
    const formHub = document.getElementById('formulario-hub');
    const listaProdutos = document.getElementById('lista-produtos');
    const listaHub = document.getElementById('lista-hub');

    if (abaAtiva === 'produto') {
        formProduto.style.display = 'block';
        formHub.style.display = 'none';
        listaProdutos.style.display = 'none';
    } else if (abaAtiva === 'hub') {
        formHub.style.display = 'block';
        formProduto.style.display = 'none';
        listaHub.style.display = 'none';
    }

    btn.style.display = 'none';
    }
    </script>

    <!-- Script de Alerta de Exclusão de produtos -->
    <script>
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

    <!-- Script para Imagens de Cases e listagem de arquivos -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
        const dropZone = document.getElementById('drop-zone');
        const fileInput = document.getElementById('imagens');
        const filesListDiv = document.getElementById('files-list');

        let arquivosSelecionados = new DataTransfer();

        dropZone.addEventListener('click', () => {
            fileInput.value = null; // limpa o valor para abrir sempre o seletor
            fileInput.click();
        });

        fileInput.addEventListener('change', function(event) {
            const novosArquivos = event.target.files;

            if ((arquivosSelecionados.files.length + novosArquivos.length) > 8) {
                alert('Você só pode enviar até 8 arquivos.');
                return;
            }

            for (let i = 0; i < novosArquivos.length; i++) {
                arquivosSelecionados.items.add(novosArquivos[i]);
            }

            // Atualiza o input com os arquivos acumulados
            fileInput.files = arquivosSelecionados.files;

            // Atualiza a lista visual
            atualizarLista(arquivosSelecionados.files);
        });

        function atualizarLista(files) {
            if (files.length === 0) {
                filesListDiv.textContent = 'Nenhum arquivo selecionado.';
                return;
            }

            let listHtml = `<p>${files.length} arquivo(s) selecionado(s):</p><ul>`;
            for (let i = 0; i < files.length; i++) {
                listHtml += `<li>${files[i].name} <button type="button" onclick="removerArquivo(${i})" style="color:#333; cursor:pointer;">X</button></li><div class="files-list-hr">
                        <hr>
                    </div>`;
            }
            listHtml += '</ul>';
            filesListDiv.innerHTML = listHtml;
        }

        // Função precisa estar global para funcionar no onclick inline
        window.removerArquivo = function(index) {
            arquivosSelecionados.items.remove(index);
            fileInput.files = arquivosSelecionados.files;
            atualizarLista(arquivosSelecionados.files);
        };

        // Inicializa a lista (caso haja arquivos)
        atualizarLista(arquivosSelecionados.files);
    });
    </script>

    <!-- Script para alternar entre imagens na Imagem Principal -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const imgAdd = document.getElementById('img-add');
            const inputImage = document.getElementById('input-image');
            const previewImage = document.getElementById('preview-image');
            const uploadContent = document.getElementById('upload-content');

            imgAdd.onclick = function () {
                inputImage.click();
            };

            inputImage.onchange = function () {
                const file = this.files[0];

                if (file) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        previewImage.src = e.target.result;
                        previewImage.style.display = 'block';
                        uploadContent.style.display = 'none';
                    };
                    reader.readAsDataURL(file);
                }
            };
        });
    </script>

    <!-- Função para alternar entre produto e hub; função para alternar formulário de novo produto -->
     <script>
        let abaAtiva = 'produto';

        document.addEventListener('DOMContentLoaded', function () {
        const btnProdutos = document.getElementById('btn-produtos');
        const btnHub = document.getElementById('btn-hub');
        const btnNovoProduto = document.querySelector('.add-produto button');

        const listaProdutos = document.getElementById('lista-produtos');
        const listaHub = document.getElementById('lista-hub');

        const formProduto = document.getElementById('formulario-produto');
        const formHub = document.getElementById('formulario-hub');

        // Alternar abas
        btnProdutos.addEventListener('click', function () {
            abaAtiva = 'produto';
            listaProdutos.style.display = 'block';
            listaHub.style.display = 'none';
            formProduto.style.display = 'none';
            formHub.style.display = 'none';
            btnNovoProduto.style.display = 'inline-flex';
        });

        btnHub.addEventListener('click', function () {
            abaAtiva = 'hub';
            listaProdutos.style.display = 'none';
            listaHub.style.display = 'block';
            formProduto.style.display = 'none';
            formHub.style.display = 'none';
            btnNovoProduto.style.display = 'inline-flex';
        });

        // Botão "Novo Produto"
        btnNovoProduto.addEventListener('click', function (event) {
            if (abaAtiva === 'produto') {
                formProduto.style.display = 'block';
                listaProdutos.style.display = 'none';
            } else {
                formHub.style.display = 'block';
                listaHub.style.display = 'none';
            }
            event.target.style.display = 'none';
            });
        });

        // Voltar para a tela de listagem
        function voltarLista() {
            const formProduto = document.getElementById('formulario-produto');
            const formHub = document.getElementById('formulario-hub');
            const listaProdutos = document.getElementById('lista-produtos');
            const listaHub = document.getElementById('lista-hub');
            const btnNovoProduto = document.querySelector('.add-produto button');

            formProduto.style.display = 'none';
            formHub.style.display = 'none';
            listaProdutos.style.display = abaAtiva === 'produto' ? 'block' : 'none';
            listaHub.style.display = abaAtiva === 'hub' ? 'block' : 'none';
            btnNovoProduto.style.display = 'inline-flex';
        }
    </script>

    @endsection