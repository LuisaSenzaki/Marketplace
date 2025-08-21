<!DOCTYPE html>
<html lang="en">
<head>
    @vite(['resources/css/app.css', 'resources/js/app.js','resources/css/header-style.css', 'resources/css/desktop.css'])

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cases</title>
</head>
<body>
    @extends('layouts.app')

@section('title', 'Página Cases')

@section('content')
<div class="container-hub">
    <section class="left-hub">
        <h2>Cases</h2>

        <div class="cases-products">
            @foreach ($imagens as $imagem)
                <img
                    src="{{ asset('storage/' . $imagem) }}"
                    alt="Imagem do produto {{ $loop->iteration }}"
                    class="js-lightbox-trigger"
                    data-full="{{ asset('storage/' . $imagem) }}"
                    data-index="{{ $loop->index }}"
                    style="cursor:pointer;max-width:100%;height:auto"
                >
            @endforeach
        </div>
    </section>

    <!-- Lightbox -->
    <div id="lightbox" class="hidden" role="dialog" aria-modal="true" aria-label="Visualização da imagem em tela cheia">
        <div class="lb-backdrop" style="background: rgba(0,0,0,.85)"></div>
        <div class="lb-content" role="document">
            <button class="lb-close" style="background: #D0147A" aria-label="Fechar (Esc)" type="button">✕</button>

            <!-- Setas de navegação -->
            <button class="lb-prev" type="button"  style="background: #D0147A" aria-label="Imagem anterior">‹</button>
            <button class="lb-next" type="button"  style="background: #D0147A" aria-label="Próxima imagem">›</button>

            <img id="lightbox-img" alt="">
        </div>
    </div>
</div>

<style>
  /* Lightbox base */
  #lightbox { position: fixed; inset: 0; z-index: 9999; display: flex; align-items: center; justify-content: center; }
  #lightbox.hidden { display: none; }
  .lb-backdrop { position: absolute; inset: 0; background: rgba(0,0,0,.85); }
  .lb-content { position: relative; z-index: 1; max-width: 90vw; max-height: 90vh; display: flex; align-items: center; justify-content: center; }
  /* Imagem do destaque — retângulo fixo igual pra todas */
  #lightbox-img {
    width: 90vw;        /* responsivo */
    height: 50vw;       /* ~16:9 */
    max-width: 960px;   /* limites em telas grandes */
    max-height: 540px;
    object-fit: cover;  /* preenche o retângulo (corta se precisar) */
    border-radius: 8px;
    background: #000;
    box-shadow: 0 10px 30px rgba(0,0,0,.4);
  }
  .lb-close {
    position: absolute; top: -40px; right: 0;
    background: #fff; color: #111; border: 0; border-radius: 999px;
    width: 36px; height: 36px; font-size: 18px; cursor: pointer;
  }

  /* Botões de navegação */
  .lb-prev, .lb-next {
    position: absolute; top: 50%; transform: translateY(-50%);
    width: 44px; height: 44px; border-radius: 999px; border: 0; cursor: pointer;
    background: rgba(255,255,255,0.9); color: #111; font-size: 28px; line-height: 1;
    display: flex; align-items: center; justify-content: center;
    transition: background .15s ease;
  }
  .lb-prev:hover, .lb-next:hover { background: #fff; }
  .lb-prev { left: -56px; }
  .lb-next { right: -56px; }

  /* Ajuste pra telas menores: traz as setas pra dentro */
  @media (max-width: 640px) {
    .lb-close { top: -48px; }
    .lb-prev { left: 8px; }
    .lb-next { right: 8px; }
  }

  /* Grid de miniaturas quadradas */
  .cases-products {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
    gap: 1rem;
  }
  .cases-products img {
    width: 100%;
    aspect-ratio: 1 / 1;
    object-fit: cover;
    border-radius: 8px;
    cursor: pointer;
    transition: transform 0.2s ease;
  }
  .cases-products img:hover { transform: scale(1.05); }
</style>

<script>
(function () {
  const root = document;
  const lightbox = root.getElementById('lightbox');
  const imgEl    = root.getElementById('lightbox-img');
  const closeBtn = root.querySelector('.lb-close');
  const prevBtn  = root.querySelector('.lb-prev');
  const nextBtn  = root.querySelector('.lb-next');
  const grid     = root.querySelector('.cases-products');
  const thumbs   = Array.from(root.querySelectorAll('.js-lightbox-trigger'));

  let current = 0;

  function show(index) {
    if (!thumbs.length) return;
    // loop infinito (volta do fim pro início e vice-versa)
    current = (index + thumbs.length) % thumbs.length;
    const el = thumbs[current];
    const src = el.dataset.full || el.src;
    imgEl.src = src;
    imgEl.alt = el.alt || '';
  }

  function open(index) {
    show(index);
    lightbox.classList.remove('hidden');
    document.body.style.overflow = 'hidden';
    // foco acessível: leva pro botão fechar
    closeBtn?.focus({ preventScroll: true });
  }

  function close() {
    lightbox.classList.add('hidden');
    imgEl.src = '';
    document.body.style.overflow = '';
  }

  // Click na miniatura (delegação)
  grid?.addEventListener('click', (e) => {
    const el = e.target.closest('.js-lightbox-trigger');
    if (!el) return;
    const idx = Number(el.dataset.index || thumbs.indexOf(el));
    open(idx);
  });

  // Navegação
  prevBtn?.addEventListener('click', (e) => { e.stopPropagation(); show(current - 1); });
  nextBtn?.addEventListener('click', (e) => { e.stopPropagation(); show(current + 1); });

  // Fechar no backdrop
  lightbox.addEventListener('click', (e) => {
    const isBackdrop = e.target.classList.contains('lb-backdrop') || e.target.id === 'lightbox';
    if (isBackdrop) close();
  });

  // Teclado: Esc fecha, setas navegam
  root.addEventListener('keydown', (e) => {
    if (lightbox.classList.contains('hidden')) return;
    if (e.key === 'Escape') close();
    if (e.key === 'ArrowRight') show(current + 1);
    if (e.key === 'ArrowLeft')  show(current - 1);
  });
})();
</script>
@endsection

</body>
</html>