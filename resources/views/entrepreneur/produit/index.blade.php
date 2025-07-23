{{-- resources/views/entrepreneur/produits/index.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-2xl font-bold text-gray-800">Mes Produits</h1>
        <a href="{{ route('entrepreneur.produits.create') }}" 
           class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg transition">
            Ajouter un produit
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6" role="alert">
            <p>{{ session('success') }}</p>
        </div>
    @endif

    @if($produits->isEmpty())
        <div class="bg-white rounded-lg shadow p-6 text-center">
            <p class="text-gray-600">Aucun produit enregistré pour le moment.</p>
            <a href="{{ route('entrepreneur.produits.create') }}" 
               class="inline-block mt-4 text-blue-500 hover:text-blue-600">
                Créer votre premier produit
            </a>
        </div>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($produits as $produit)
                <div class="bg-white rounded-lg shadow overflow-hidden">
                    @if($produit->image_url)
                        <img src="{{ asset('storage/' . $produit->image_url) }}" 
                             alt="{{ $produit->nom }}" 
                             class="w-full h-48 object-cover">
                    @else
                        <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                            <span class="text-gray-400">Aucune image</span>
                        </div>
                    @endif
                    
                    <div class="p-4">
                        <h3 class="font-bold text-lg text-gray-800">{{ $produit->nom }}</h3>
                        <p class="text-gray-600 mt-1">{{ Str::limit($produit->description, 100) }}</p>
                        <div class="mt-3 flex justify-between items-center">
                            <span class="text-lg font-bold text-blue-600">{{ number_format($produit->prix, 2) }} €</span>
                            <span class="px-2 py-1 text-sm rounded-full 
                                {{ $produit->est_disponible ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                {{ $produit->est_disponible ? 'Disponible' : 'Indisponible' }}
                            </span>
                        </div>
                        <div class="mt-4 flex space-x-2">
                            <a href="{{ route('entrepreneur.produits.edit', $produit) }}" 
                               class="text-blue-500 hover:text-blue-600">
                                <i class="fas fa-edit"></i> Modifier
                            </a>
                            <form action="{{ route('entrepreneur.produits.destroy', $produit) }}" 
                                  method="POST" 
                                  onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-600 ml-4">
                                    <i class="fas fa-trash"></i> Supprimer
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-6">
            {{ $produits->links() }}
        </div>
    @endif
</div>
@endsection