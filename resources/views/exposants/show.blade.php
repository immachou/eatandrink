@extends('layouts.app')

@section('content')
    <h1>{{ $stand->name }}</h1>
    <p>{{ $stand->description }}</p>
    <h2>Produits</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        @foreach($stand->products as $product)
            <div class="border p-4 rounded shadow">
                <h3 class="text-lg font-bold">{{ $product->name }}</h3>
                <p>{{ $product->description }}</p>
                <p>Prix : {{ $product->prix }} €</p>
                @if($product->image_url)
                    <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-32 h-32 object-cover">
                @endif
                <form action="{{ route('panier.ajouter', $product->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Ajouter au panier</button>
                </form>
            </div>
        @endforeach
    </div>
@endsection 