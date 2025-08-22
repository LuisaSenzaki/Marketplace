
    <div class="header-html">
        <div class="header">
            <div class="img-logo">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('images/Group.png') }}" alt="Logo" class="logo">
                </a>
            </div>

            <div class="search">
                <section class="search-bar">
                    <form action="{{ route('search') }}" method="GET" style="display: flex; align-items: center;">
                        <input class="input" type="text" name="query" value="{{ request('query') }}" placeholder="Search for products, brands and more...">
                        <button class="button-search" type="submit" aria-label="Buscar">
                            <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="white" class="bi bi-search" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                            </svg>
                        </button>
                    </form>
                </section>

                <section class="search-filters">
                    <section class="search-options">
                        <a href="{{ route('search') }}">Ativações</a>
                        <a href="{{ route('hubtv1') }}">Laboratório de Projetos</a>
                        <a href="{{ route('cases') }}">Cases</a>
                    </section>
                    <section class="social">
                        <a href="https://www.instagram.com/xlabexperience/" target="_blank" rel="noopener noreferrer"> 
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#9F9F9F" class="bi bi-instagram" viewBox="0 0 16 16" aria-hidden="true">
                                <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334"/>
                            </svg> Entre em Contato
                        </a>
                    </section>
                </section> 
            </div>

            <div class="options">
                <div class="profile-admin">
                    <p style="font-family: 'gilroy-bold'; font-size: 20px; color: #787878ff;">Olá, {{ auth()->user()->name }}!</p>
                </div>
               <style>
                    /* Ícones base */
                    .icon { 
                        width: 1em; height: 1em; 
                        display: inline-block; 
                        vertical-align: middle; 
                        flex: 0 0 auto;
                    }
                    .icon--xl { font-size: 35px; } /* tamanho da calc e do avatar */
                    </style>

                    <div class="calc">
                    <a href="{{ route('calc') }}" aria-label="Abrir calculadora" style="position:relative; display:inline-block;">
                        <svg xmlns="http://www.w3.org/2000/svg" 
                            class="icon icon--xl bi bi-receipt-cutoff" 
                            viewBox="0 0 16 16" 
                            fill="#D0147A" 
                            aria-hidden="true" 
                            focusable="false" 
                            preserveAspectRatio="xMidYMid meet">
                        <path d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5M11.5 4a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1z"/>
                        <path d="M2.354.646a.5.5 0 0 0-.801.13l-.5 1A.5.5 0 0 0 1 2v13H.5a.5.5 0 0 0 0 1h15a.5.5 0 0 0 0-1H15V2a.5.5 0 0 0-.053-.224l-.5-1a.5.5 0 0 0-.8-.13L13 1.293l-.646-.647a.5.5 0 0 0-.708 0L11 1.293l-.646-.647a.5.5 0 0 0-.708 0L9 1.293 8.354.646a.5.5 0 0 0-.708 0L7 1.293 6.354.646a.5.5 0 0 0-.708 0L5 1.293 4.354.646a.5.5 0 0 0-.708 0L3 1.293zm-.217 1.198.51.51a.5.5 0 0 0 .707 0L4 1.707l.646.647a.5.5 0 0 0 .708 0L6 1.707l.646.647a.5.5 0 0 0 .708 0L8 1.707l.646.647a.5.5 0 0 0 .708 0L10 1.707l.646.647a.5.5 0 0 0 .708 0L12 1.707l.646.647a.5.5 0 0 0 .708 0l.509-.51.137.274V15H2V2.118z"/>
                        </svg>
                        <span id="calc-badge" class="calc-badge" aria-live="polite" style="
                        position:absolute; top: -3px; right:-6px; background:#D0147A; color:#fff; 
                        min-width:20px; height:20px; border-radius:999px; font:600 11px/20px system-ui; 
                        text-align:center; padding:0 8px; box-shadow:0 2px 6px rgba(0,0,0,.15); display:none;">0</span>
                    </a>
                    </div>

                <div class="relative" x-data="{ open: false }" @keydown.escape.window="open = false">
                    <button type="button"
                            @click="open = !open"
                            @click.outside="open = false"
                            class="focus:outline-none"
                            aria-haspopup="true"
                            :aria-expanded="open.toString()"
                            aria-label="Abrir menu do usuário">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#D0147A" class="icon icon--xl bi bi-person-circle" viewBox="0 0 16 16" aria-hidden="true" 
                            focusable="false" 
                            preserveAspectRatio="xMidYMid meet">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                            </svg>
                        <span class="sr-only">Abrir menu do usuário</span>
                    </button>

                <!-- Visitante: mostrar Entrar -->
                @guest
                    <div
                        x-show="open"
                        x-transition
                        class="absolute right-0 mt-2 w-44 bg-white rounded shadow-lg py-2 z-50 ring-1 ring-black/5"
                    >
                        <a href="{{ route('login') }}"
                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            Entrar
                        </a>
                    </div>
                @endguest

                <!-- Autenticado: admin OU edição + sair -->
                @auth
                    <div
                        x-show="open"
                        x-transition
                        class="absolute right-0 mt-2 w-48 bg-white rounded shadow-lg py-2 z-50 ring-1 ring-black/5"
                    >
                        @can('admin')
                            <a href="{{ route('admin') }}"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                Tela de Admin
                            </a>
                            <a href="{{ route('profile.edit') }}"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                Editar perfil
                            </a>
                        @else
                            <a href="{{ route('profile.edit') }}"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                Editar perfil
                            </a>
                        @endcan

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                    onclick="return confirm('Tem certeza que deseja sair?')"
                                    class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                Sair
                            </button>
                        </form>
                    </div>
                @endauth
            </div>
        </div>
        </div>
    </div>

    <!-- Toast global -->
    <div id="global-toast" role="status" aria-live="polite" aria-atomic="true" style="
        position:fixed; top:16px; right:16px; background:#111; color:#fff; padding:10px 14px; border-radius:8px;
        opacity:0; transform:translateY(-10px); pointer-events:none; transition:opacity .18s ease, transform .18s ease; z-index:9999;">
    </div>

    <!-- Listener JS -->
    <script>
    (function(){
      const badge = document.getElementById('calc-badge');
      const toast = document.getElementById('global-toast');

      function setBadge(count){
        const n = Number(count || 0);
        badge.textContent = n;
        badge.style.display = n > 0 ? 'inline-flex' : 'none';
      }

      async function fetchCount(){
        try {
          const resp = await fetch('{{ route('calc.count') }}', { headers: { 'Accept': 'application/json' } });
          if (!resp.ok) throw 0;
          const data = await resp.json();
          setBadge(data?.count ?? 0);
        } catch(e) {}
      }

      function showToast(msg){
        toast.textContent = msg;
        toast.style.opacity = '1';
        toast.style.transform = 'translateY(0)';
        clearTimeout(showToast._t);
        showToast._t = setTimeout(()=>{
          toast.style.opacity = '0';
          toast.style.transform = 'translateY(-10px)';
        }, 1800);
      }

      document.addEventListener('DOMContentLoaded', fetchCount);
      window.addEventListener('cart:updated', fetchCount);
      window.addEventListener('cart:added', (e)=>{
        const name = e.detail?.name ? `“${e.detail.name}”` : 'Produto';
        showToast(`${name} adicionado!`);
        fetchCount();
      });
    })();
    </script>

    @if (session('calc_added'))
<script>
  (function(){
    const payload = @json(session('calc_added'));
    window.dispatchEvent(new CustomEvent('cart:added',   { detail: { name: payload?.name }}));
    window.dispatchEvent(new CustomEvent('cart:updated', { detail: { count: payload?.count }}));
  })();
</script>
@endif

