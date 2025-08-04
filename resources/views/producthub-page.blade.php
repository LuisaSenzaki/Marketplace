    @extends('layouts.app')

    @section('title', 'Página Produto Hub')

    @section('content')

    <section class="hub-product-page">
        <h2>{{ $hub->name }}</h2>
        <img src="{{ asset('storage/'.$hub->image) }}" alt="{{ $hub->name }}">
        <div class="hr-hub-product"><hr></div>
        <div class="text-hub-product">
            <h3>Sobre a Tecnologia</h3>
            <p class="description-hub-product">{{ $hub->description }}</p>
        </div>
    </section>

    @endsection