@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-8">
            <h1>{{ $stand->name }}</h1>
            <p>{{ $stand->description }}</p>

            <div class="card mt-4">
                <div class="card-body">
                    <h5 class="card-title">Nos Produits</h5>
                    
                    @if($products->isEmpty())
                        <p class="text-muted">Aucun produit disponible pour le moment.</p>
                    @else
                        <div class="row">
                            @foreach($products as $product)
                                <div class="col-md-6 mb-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $product->name }}</h5>
                                            <p class="card-text">{{ Str::limit($product->description, 100) }}</p>
                                            <p class="card-text">
                                                <strong>{{ number_format($product->price, 2, ',', ' ') }} €</strong>
                                            </p>
                                            <form action="{{ route('participant.shop.addToCart', $product) }}" method="POST" class="d-flex gap-2">
                                                @csrf
                                                <button type="submit" class="btn btn-primary w-100">
                                                    <i class="fas fa-shopping-cart"></i> Ajouter au panier
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Informations du Stand</h5>
                    <p><strong>Entreprise :</strong> {{ $stand->user->entreprise_name }}</p>
                    <p><strong>Propriétaire :</strong> {{ $stand->user->name }}</p>
                    @if($stand->user->phone)
                        <p><strong>Téléphone :</strong> {{ $stand->user->phone }}</p>
                    @endif
                    @if($stand->user->address)
                        <p><strong>Adresse :</strong> {{ $stand->user->address }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
