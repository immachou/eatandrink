{{-- resources/views/entrepreneur/produits/show.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8 max-w-4xl">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">{{ $produit->nom }}</h1>
            <p class="text-gray-600">{{ $produit->categorie }}</p>
        </div>
        <div class="flex space-x-3">
            <a href="{{ route('entrepreneur.produits.edit', $produit) }}" 
               class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                <i class="fas fa-edit mr-2"></i> Modifier
            </a>
            <form action="{{ route('entrepreneur.produits.destroy', $produit) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" 
                        onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?')"
                        class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                    <i class="fas fa-trash mr-2"></i> Supprimer
                </button>
            </form>
        </div>
    </div>

    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
        <div class="px-4 py-5 sm:px-6 flex items-center justify-between">
            <div>
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                    Détails du produit
                </h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">
                    Informations complètes sur le produit.
                </p>
            </div>
            <span class="px-3 py-1 rounded-full text-sm font-medium 
                {{ $produit->est_disponible ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                {{ $produit->est_disponible ? 'Disponible' : 'Indisponible' }}
            </span>
        </div>
        <div class="border-t border-gray-200">
            <dl>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Image</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        @if($produit->image_url)
                            <img src="{{ asset('storage/' . $produit->image_url) }}" 
                                 alt="{{ $produit->nom }}" 
                                 class="h-32 w-auto rounded">
                        @else
                            <span class="text-gray-400">Aucune image</span>
                        @endif
                    </dd>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Prix</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        {{ number_format($produit->prix, 2) }} €
                    </dd>
                </div>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Description</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 whitespace-pre-line">
                        {{ $produit->description ?? 'Aucune description fournie' }}
                    </dd>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Date de création</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        {{ $produit->created_at->format('d/m/Y H:i') }}
                    </dd>
                </div>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Dernière mise à jour</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        {{ $produit->updated_at->format('d/m/Y H:i') }}
                    </dd>
                </div>
            </dl>
        </div>
    </div>

    <div class="mt-6">
        <a href="{{ route('entrepreneur.produits.index') }}" 
           class="inline-flex items-center text-blue-600 hover:text-blue-800">
            <i class="fas fa-arrow-left mr-2"></i> Retour à la liste des produits
        </a>
    </div>
</div>
@endsection