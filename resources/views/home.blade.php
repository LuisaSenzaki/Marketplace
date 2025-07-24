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

    @section('title', 'Página Inicial')

    @section('content')

    <!-- Sessão introdutória do Marketplace XLab -->
     <container class="page-intro">
        <container class="home">
            <div class="inicial">     
                <div class="left-content">
                    <div class="text-content">
                        <div class="paragraph">
                            <h1>Marketplace XLab</h1>
                            <h1>Seu Próximo Projeto Começa Aqui</h1>
                        </div>

                        <div class="text">
                            <p>O Marketplace XLab centraliza todas as ativações, soluções e serviços da Xlab num só lugar, pensado especialmente para os criativos da TV1.</p>
                            <p>Agilidade e autonomia para transformar suas ideias em projetos de sucesso.</p>
                        </div>
                    </div>
                    <container class="icons">
                        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="white" class="bi bi-cash-stack" viewBox="0 0 16 16">
                            <path d="M1 3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1zm7 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4"/>
                            <path d="M0 5a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V7a2 2 0 0 1-2-2z"/>
                        </svg>

                        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="white" class="bi bi-controller" viewBox="0 0 16 16">
                            <path d="M11.5 6.027a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0m-1.5 1.5a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1m2.5-.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0m-1.5 1.5a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1m-6.5-3h1v1h1v1h-1v1h-1v-1h-1v-1h1z"/>
                            <path d="M3.051 3.26a.5.5 0 0 1 .354-.613l1.932-.518a.5.5 0 0 1 .62.39c.655-.079 1.35-.117 2.043-.117.72 0 1.443.041 2.12.126a.5.5 0 0 1 .622-.399l1.932.518a.5.5 0 0 1 .306.729q.211.136.373.297c.408.408.78 1.05 1.095 1.772.32.733.599 1.591.805 2.466s.34 1.78.364 2.606c.024.816-.059 1.602-.328 2.21a1.42 1.42 0 0 1-1.445.83c-.636-.067-1.115-.394-1.513-.773-.245-.232-.496-.526-.739-.808-.126-.148-.25-.292-.368-.423-.728-.804-1.597-1.527-3.224-1.527s-2.496.723-3.224 1.527c-.119.131-.242.275-.368.423-.243.282-.494.575-.739.808-.398.38-.877.706-1.513.773a1.42 1.42 0 0 1-1.445-.83c-.27-.608-.352-1.395-.329-2.21.024-.826.16-1.73.365-2.606.206-.875.486-1.733.805-2.466.315-.722.687-1.364 1.094-1.772a2.3 2.3 0 0 1 .433-.335l-.028-.079zm2.036.412c-.877.185-1.469.443-1.733.708-.276.276-.587.783-.885 1.465a14 14 0 0 0-.748 2.295 12.4 12.4 0 0 0-.339 2.406c-.022.755.062 1.368.243 1.776a.42.42 0 0 0 .426.24c.327-.034.61-.199.929-.502.212-.202.4-.423.615-.674.133-.156.276-.323.44-.504C4.861 9.969 5.978 9.027 8 9.027s3.139.942 3.965 1.855c.164.181.307.348.44.504.214.251.403.472.615.674.318.303.601.468.929.503a.42.42 0 0 0 .426-.241c.18-.408.265-1.02.243-1.776a12.4 12.4 0 0 0-.339-2.406 14 14 0 0 0-.748-2.295c-.298-.682-.61-1.19-.885-1.465-.264-.265-.856-.523-1.733-.708-.85-.179-1.877-.27-2.913-.27s-2.063.091-2.913.27"/>
                        </svg>

                        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="white" class="bi bi-headset-vr" viewBox="0 0 16 16">
                            <path d="M8 1.248c1.857 0 3.526.641 4.65 1.794a5 5 0 0 1 2.518 1.09C13.907 1.482 11.295 0 8 0 4.75 0 2.12 1.48.844 4.122a5 5 0 0 1 2.289-1.047C4.236 1.872 5.974 1.248 8 1.248"/>
                            <path d="M12 12a4 4 0 0 1-2.786-1.13l-.002-.002a1.6 1.6 0 0 0-.276-.167A2.2 2.2 0 0 0 8 10.5c-.414 0-.729.103-.935.201a1.6 1.6 0 0 0-.277.167l-.002.002A4 4 0 1 1 4 4h8a4 4 0 0 1 0 8"/>
                        </svg>
                    </container>
                </div>
            </div>
        </container>

    <!-- Sessão de produtos sugeridos -->
        <section class="details">
            <container class="products"></container>
        </section>

    <!-- Sessão de categorias -->
        <section class="categories">
            <container class="categories-title">
                <h2>Descubra Eventos Especiais por Categoria</h2>
                <div class="line"> <hr> </div>
            </container>

            <container class="categories-list">
                <button> <svg xmlns="http://www.w3.org/2000/svg" width="92" height="92" fill="currentColor" class="bi bi-stars" viewBox="0 0 16 16">
                            <path d="M7.657 6.247c.11-.33.576-.33.686 0l.645 1.937a2.89 2.89 0 0 0 1.829 1.828l1.936.645c.33.11.33.576 0 .686l-1.937.645a2.89 2.89 0 0 0-1.828 1.829l-.645 1.936a.361.361 0 0 1-.686 0l-.645-1.937a2.89 2.89 0 0 0-1.828-1.828l-1.937-.645a.361.361 0 0 1 0-.686l1.937-.645a2.89 2.89 0 0 0 1.828-1.828zM3.794 1.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387A1.73 1.73 0 0 0 4.593 5.69l-.387 1.162a.217.217 0 0 1-.412 0L3.407 5.69A1.73 1.73 0 0 0 2.31 4.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387A1.73 1.73 0 0 0 3.407 2.31zM10.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.16 1.16 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.16 1.16 0 0 0-.732-.732L9.1 2.137a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732z"/>
                        </svg><spam>Beleza e Cosméticos</spam></button>
                <button> <svg xmlns="http://www.w3.org/2000/svg" width="92" height="92" fill="currentColor" class="bi bi-hospital" viewBox="0 0 16 16">
                            <path d="M8.5 5.034v1.1l.953-.55.5.867L9 7l.953.55-.5.866-.953-.55v1.1h-1v-1.1l-.953.55-.5-.866L7 7l-.953-.55.5-.866.953.55v-1.1zM13.25 9a.25.25 0 0 0-.25.25v.5c0 .138.112.25.25.25h.5a.25.25 0 0 0 .25-.25v-.5a.25.25 0 0 0-.25-.25zM13 11.25a.25.25 0 0 1 .25-.25h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5a.25.25 0 0 1-.25-.25zm.25 1.75a.25.25 0 0 0-.25.25v.5c0 .138.112.25.25.25h.5a.25.25 0 0 0 .25-.25v-.5a.25.25 0 0 0-.25-.25zm-11-4a.25.25 0 0 0-.25.25v.5c0 .138.112.25.25.25h.5A.25.25 0 0 0 3 9.75v-.5A.25.25 0 0 0 2.75 9zm0 2a.25.25 0 0 0-.25.25v.5c0 .138.112.25.25.25h.5a.25.25 0 0 0 .25-.25v-.5a.25.25 0 0 0-.25-.25zM2 13.25a.25.25 0 0 1 .25-.25h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5a.25.25 0 0 1-.25-.25z"/>
                            <path d="M5 1a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v1a1 1 0 0 1 1 1v4h3a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V8a1 1 0 0 1 1-1h3V3a1 1 0 0 1 1-1zm2 14h2v-3H7zm3 0h1V3H5v12h1v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1zm0-14H6v1h4zm2 7v7h3V8zm-8 7V8H1v7z"/>
                        </svg> <spam>Área da Saúde</spam></button>
                <button><svg xmlns="http://www.w3.org/2000/svg" width="92" height="92" fill="currentColor" class="bi bi-receipt-cutoff" viewBox="0 0 16 16">
                            <path d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5M11.5 4a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1z"/>
                            <path d="M2.354.646a.5.5 0 0 0-.801.13l-.5 1A.5.5 0 0 0 1 2v13H.5a.5.5 0 0 0 0 1h15a.5.5 0 0 0 0-1H15V2a.5.5 0 0 0-.053-.224l-.5-1a.5.5 0 0 0-.8-.13L13 1.293l-.646-.647a.5.5 0 0 0-.708 0L11 1.293l-.646-.647a.5.5 0 0 0-.708 0L9 1.293 8.354.646a.5.5 0 0 0-.708 0L7 1.293 6.354.646a.5.5 0 0 0-.708 0L5 1.293 4.354.646a.5.5 0 0 0-.708 0L3 1.293zm-.217 1.198.51.51a.5.5 0 0 0 .707 0L4 1.707l.646.647a.5.5 0 0 0 .708 0L6 1.707l.646.647a.5.5 0 0 0 .708 0L8 1.707l.646.647a.5.5 0 0 0 .708 0L10 1.707l.646.647a.5.5 0 0 0 .708 0L12 1.707l.646.647a.5.5 0 0 0 .708 0l.509-.51.137.274V15H2V2.118z"/>
                        </svg> <spam>Área Corporativa</spam></button>
                <button> <svg xmlns="http://www.w3.org/2000/svg" width="92" height="92" fill="currentColor" class="bi bi-fork-knife" viewBox="0 0 16 16">
                            <path d="M13 .5c0-.276-.226-.506-.498-.465-1.703.257-2.94 2.012-3 8.462a.5.5 0 0 0 .498.5c.56.01 1 .13 1 1.003v5.5a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5zM4.25 0a.25.25 0 0 1 .25.25v5.122a.128.128 0 0 0 .256.006l.233-5.14A.25.25 0 0 1 5.24 0h.522a.25.25 0 0 1 .25.238l.233 5.14a.128.128 0 0 0 .256-.006V.25A.25.25 0 0 1 6.75 0h.29a.5.5 0 0 1 .498.458l.423 5.07a1.69 1.69 0 0 1-1.059 1.711l-.053.022a.92.92 0 0 0-.58.884L6.47 15a.971.971 0 1 1-1.942 0l.202-6.855a.92.92 0 0 0-.58-.884l-.053-.022a1.69 1.69 0 0 1-1.059-1.712L3.462.458A.5.5 0 0 1 3.96 0z"/>
                        </svg> <spam>Alimentos e Bebidas</spam></button>
                <button><svg xmlns="http://www.w3.org/2000/svg" width="92" height="92" fill="currentColor" class="bi bi-tree-fill" viewBox="0 0 16 16">
                            <path d="M8.416.223a.5.5 0 0 0-.832 0l-3 4.5A.5.5 0 0 0 5 5.5h.098L3.076 8.735A.5.5 0 0 0 3.5 9.5h.191l-1.638 3.276a.5.5 0 0 0 .447.724H7V16h2v-2.5h4.5a.5.5 0 0 0 .447-.724L12.31 9.5h.191a.5.5 0 0 0 .424-.765L10.902 5.5H11a.5.5 0 0 0 .416-.777z"/>
                        </svg><spam>Agronegócio</spam></button>
            </container>
        </section>



    <!-- Sessão de Cases e IA -->
     <section class="information">
        <section class="cases">
            <h2>Conheça nossos cases</h2>
            <div class="line"> <hr> </div>

            <button class="seta-esquerda">
                <svg xmlns="http://www.w3.org/2000/svg" width="33" height="33" fill="#D0147A" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
                    <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0m3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z"/>
                </svg>
            </button>

            <container class="carrossel">
                <div class="case-item">
                    <img src="{{ asset('images/case1.jpg') }}" alt="Case 1">
                </div>
                <div class="case-item">
                    <img src="{{ asset('images/case2.jpg') }}" alt="Case 2">
                </div>
                <div class="case-item">
                    <img src="{{ asset('images/case3.jpg') }}" alt="Case 3">
                </div>
                <div class="case-item">
                    <img src="{{ asset('images/case3.jpg') }}" alt="Case 4">
                </div>
            </container>
            <button class="seta-direita">
                <svg xmlns="http://www.w3.org/2000/svg" width="33" height="33" fill="#D0147A" class="bi bi-arrow-right-circle-fill" viewBox="0 0 16 16">
                    <path d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z"/>
                </svg>
            </button>
        </section>

        <section class="artificial-intelligence">
            <container class="ai-chat">
                <iframe
                    src="https://www.chatbase.co/chatbot-iframe/iEZeS178uETGfn5mK5-BS"
                    width="100%"
                    style="height: 100%; min-height: 700px"
                    frameborder="0"
                ></iframe>
            </container>
        </section>
        <div class="line"> <hr> </div>
    </section>

    <!-- Sessão Sobre a Xlab -->
    <section class="about"> 
        <container class="about-xlab">
            <h2>Sobre a Xlab</h2>
            <p>A Xlab é um hub de tecnologia e inovação para comunicação e marketing, criando conexões profundas entre pessoas e marcas, utilizando a tecnologia como ferramenta para desenvolver experiências com significado. Na Xlab, acreditamos que a criatividade humana e o potencial tecnológico, juntos, são capazes de romper as fronteiras da imaginação.</p>
            <p>Contamos com um time multidisciplinar de especialistas em tecnologia, design e gestão, focado em criar em criar soluções personalizadas, inovadoras e alinhadas ao objetivos do seu negócio. Trabalhamos com grande foco em Inteligência Artificial, e acreditamos que no cenário de dinâmico do Live Marketing, a inteligência artificial revoluciona a forma como as marcas se conectam com seu público, criando interações mais envolventes e impactantes.</p>
        </container>
    </section>
    @endsection
</body>
</html>