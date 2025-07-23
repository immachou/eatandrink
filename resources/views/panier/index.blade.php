@extends('layouts.app')

@section('content')
    <h1>Votre panier</h1>
    @if(session('success'))
        <div class="bg-green-200 text-green-800 p-2 mb-4 rounded">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="bg-red-200 text-red-800 p-2 mb-4 rounded">{{ session('error') }}</div>
    @endif
    @if(count($products) > 0)
        <ul>
            @foreach($products as $product)
                <li>
                    {{ $product->name }} ({{ $panier[$product->id] }}) - {{ $product->prix }} €
                    <form action="{{ route('panier.retirer', $product->id) }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="text-red-500">Retirer</button>
                    </form>
                </li>
            @endforeach
        </ul>
        <form action="{{ route('commande.soumettre') }}" method="POST">
            @csrf
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Passer la commande</button>
        </form>
    @else
        <p>Votre panier est vide.</p>
    @endif
@endsection 