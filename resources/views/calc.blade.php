     @extends('layouts.app')

    @section('title', 'Página Admin')

    @section('content')
     <div class="container py-5">
          <h2>Calculadora</h2>

          <div class="container-produtos-calc">
               <div class="header-produto-calc">
                    <h3>Produtos Selecionados</h3>
                    <h3>A partir de</h3>
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

               <div class="calc-valor-total">
                    <h5>Total</h5>
                    <div class="calc-valor">
                         <span>{{ $produtos->count() }} Ativação(s) Escolhida(s)</span>
                         <span>A partir de R$ {{ number_format($total, 2, ',', '.') }}</span>
                    </div>
               </div>

               <div class="btns-calc">
                    <button type="submit" id="btn-limpar">Limpar</button>
                    <form id="form-limpar" method="POST" action="{{ route('calc.limpar') }}" class="btn-calc-limpar">
                         @csrf
                    </form>
                    <div class="btn-calc-contato">
                         <a href="#" class="btn-contato">Entre em Contato</a>
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

    @endsection