{{-- resources/views/entrepreneur/produits/show.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8">
        <div class="mb-4 md:mb-0">
            <h1 class="text-2xl font-bold">{{ $produit->nom }}</h1>
            <p class="text-gray-600">{{ $produit->categorie }}</p>
        </div>
        <div class="flex flex-wrap gap-2">
            <a href="{{ route('entrepreneur.produits.edit', $produit) }}"
               class="btn-primary">
                <i class="fas fa-edit mr-2"></i> Modifier
            </a>
            <form action="{{ route('entrepreneur.produits.destroy', $produit) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit"
                        onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?')"
                        class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg transition flex items-center">
                    <i class="fas fa-trash mr-2"></i> Supprimer
                </button>
            </form>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow overflow-hidden mb-8">
        <div class="p-6 border-b border-gray-200">
            <div class="flex justify-between items-center">
                <div>
                    <h2 class="text-xl font-semibold">Détails du produit</h2>
                    <p class="text-gray-600 text-sm">Informations complètes sur le produit</p>
                </div>
                <span class="px-3 py-1 rounded-full text-sm font-medium
                    {{ $produit->est_disponible ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                    {{ $produit->est_disponible ? 'Disponible' : 'Indisponible' }}
                </span>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 p-6">
            <div class="md:col-span-1">
                @if($produit->image_url)
                    <img src="{{ asset('storage/' . $produit->image_url) }}"
                         alt="{{ $produit->nom }}"
                         class="w-full h-auto rounded-lg shadow">
                @else
                    <div class="w-full h-64 bg-gray-100 rounded-lg flex items-center justify-center">
                        <span class="text-gray-400">Aucune image disponible</span>
                    </div>
                @endif

                <div class="mt-4 p-4 bg-gray-50 rounded-lg">
                    <h3 class="font-semibold mb-2">Prix</h3>
                    <p class="text-2xl font-bold text-blue-600">{{ number_format($produit->prix, 2) }} €</p>
                </div>
            </div>

            <div class="md:col-span-2">
                <div class="mb-6">
                    <h3 class="text-lg font-semibold mb-2">Description</h3>
                    <div class="bg-gray-50 p-4 rounded-lg">
                        @if($produit->description)
                            <p class="whitespace-pre-line">{{ $produit->description }}</p>
                        @else
                            <p class="text-gray-500 italic">Aucune description fournie</p>
                        @endif
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <h4 class="font-medium text-gray-700 mb-1">Date de création</h4>
                        <p class="text-gray-900">{{ $produit->created_at->format('d/m/Y H:i') }}</p>
                    </div>
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <h4 class="font-medium text-gray-700 mb-1">Dernière mise à jour</h4>
                        <p class="text-gray-900">{{ $produit->updated_at->format('d/m/Y H:i') }}</p>
                    </div>
                </div>

                @if($produit->stand)
                <div class="mt-6 p-4 bg-blue-50 rounded-lg border border-blue-100">
                    <h4 class="font-semibold text-blue-800 mb-2">Stand associé</h4>
                    <div class="flex items-center">
                        @if($produit->stand->image_url)
                            <img src="{{ asset('storage/' . $produit->stand->image_url) }}"
                                 alt="{{ $produit->stand->nom }}"
                                 class="w-12 h-12 rounded-full object-cover mr-3">
                        @endif
                        <div>
                            <p class="font-medium">{{ $produit->stand->nom }}</p>
                            <p class="text-sm text-gray-600">{{ $produit->stand->description }}</p>
                        </div>
                    </div>
                </div>
                @endif
            </div>
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
