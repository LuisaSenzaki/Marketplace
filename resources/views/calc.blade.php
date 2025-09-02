     <!DOCTYPE html>
<html lang="pt-br">
<head>
    @vite(['resources/css/app.css', 'resources/js/app.js','resources/css/header-style.css', 'resources/css/desktop.css'])

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marketplace Xlab</title>
     <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}?v=1">
     <link rel="alternate icon" type="image/x-icon" href="{{ asset('favicon.ico') }}?v=1">
</head>
<body>
     @extends('layouts.app')

    @section('title', 'Página Admin')

    @section('content')
     <div class="container py-5">
          <h2>Calculadora</h2>

          <div class="container-produtos-calc">
               <div class="header-produto-calc">
                    <h3>Produtos Selecionados</h3>
                    <h3 class="price-calc">A partir de</h3>
               </div>
               <div class="produtos-calc">
                    @foreach ($produtos as $produto)
                         <div class="produto-calc-item">
                              <div class="produto-calc-img-text">
                                   <img src="{{ asset('storage/' . $produto->image) }}" alt="{{ $produto->name }}" width="70" class="me-3">
                                   <div class="produto-calc-text">
                                        <p class="title-product-calc">{{ $produto->name }}</p>
                                        <form method="POST" action="{{ route('remover.produto', $produto->id) }}">
                                             @csrf
                                             @method('DELETE')
                                             <button id="btn-trash" type="submit" class="btn-trash-calc btn-trash" style="cursor: pointer;">
                                                  <svg xmlns="http://www.w3.org/2000/svg" width="30" height="35" fill="#595959" class="bi bi-trash" viewBox="0 0 16 16">
                                                       <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                                       <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                                  </svg>
                                             </button>
                                        </form>
                                   </div>
                              </div>
                              <span>R$ {{ number_format($produto->price, 2, ',', '.') }}</span>
                         </div>
                    @endforeach
               </div>
               <div style="display:flex;flex-direction:column;gap:30px">
                    <div class="calc-valor-total">
                         <h5>Total</h5>
                         <div class="calc-valor">
                              <span class="qnt-ativac">{{ $produtos->count() }} Ativação(s) Escolhida(s)</span>
                              <span>A partir de R$ {{ number_format($total, 2, ',', '.') }}</span>
                         </div>
                    </div>

                    <div class="info-calc" style="display:flex;flex-direction:column;gap:10px;padding:0 15px;">
                         <h3 style="padding:15px;">Informações Adicionais do Evento</h3>
                         <textarea id="descricao-calc" name="descricao" style="width: 100%; height: 150px; border-radius: 8px;" placeholder="Adicione informações sobre o evento, personalização das ativações e outras observações..."></textarea>
                    </div>

                    <div class="btns-calc">
                         <button type="submit" id="btn-limpar">Limpar</button>
                         <form id="form-limpar" method="POST" action="{{ route('calc.limpar') }}" class="btn-calc-limpar">
                              @csrf
                         </form>
                         <div class="btn-calc-contato">
                              <button id="contactButton" data-product-id="123">Enviar Pedido de Orçamento</button>
                         </div>
                         
                    </div>
               </div>
          </div>
     </div>

     <script>
     document.getElementById('btn-limpar').addEventListener('click', function () {
          if (confirm('Tem certeza que deseja limpar a calculadora?')) {
               document.getElementById('form-limpar').submit();
          }
     });
     </script>

     <script>
     document.querySelectorAll('.btn-trash').forEach(button => {
     button.addEventListener('click', function(event) {
          event.preventDefault();
          if (confirm('Tem certeza que deseja remover este produto?')) {
               this.closest('form').submit();
          }
     });
     });

     </script>

    <script>
    const webhookURL = 'https://n8n.xlab.app.br/webhook/ae3e2c54-aabb-44bb-a1d4-4cc53fa9de52';

    const contactButton = document.getElementById('contactButton');

    const descricaoTextarea = document.getElementById('descricao-calc');

    contactButton.addEventListener('click', () => {
        const productId = contactButton.getAttribute('data-product-id');
        
        const payload = {
            product_id: productId,
            user_id: '{{ auth()->id() }}',
            user_name: '{{ auth()->user()->name }}',
            user_email: '{{ auth()->user()->email }}',
            produtos: [
                @foreach ($produtos as $produto)
                { id: {{ $produto->id }}, name: "{{ $produto->name }}", price: {{ $produto->price }} },
                @endforeach
            ],
            total: {{ $total }},
            descricao: descricaoTextarea.value
        };

        fetch(webhookURL, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(payload)
        })
        .then(response => {
            if (response.ok) {
                return response.json();
            }
            throw new Error('Falha na requisição para o webhook.');
        })
        .then(data => {
            console.log('Webhook acionado com sucesso:', data);
            alert('Sua solicitação foi enviada!');
        })
        .catch(error => {
            console.error('Erro:', error);
            alert('Ocorreu um erro ao enviar sua solicitação. Tente novamente.');
        });
    });
     </script>

     <script>
        (function(){if(!window.chatbase||window.chatbase("getState")!=="initialized"){window.chatbase=(...arguments)=>{if(!window.chatbase.q){window.chatbase.q=[]}window.chatbase.q.push(arguments)};window.chatbase=new Proxy(window.chatbase,{get(target,prop){if(prop==="q"){return target.q}return(...args)=>target(prop,...args)}})}const onLoad=function(){const script=document.createElement("script");script.src="https://www.chatbase.co/embed.min.js";script.id="iEZeS178uETGfn5mK5-BS";script.domain="www.chatbase.co";document.body.appendChild(script)};if(document.readyState==="complete"){onLoad()}else{window.addEventListener("load",onLoad)}})();
    </script>

    @endsection
</body>
</html>