{{-- resources/views/entrepreneur/produits/edit.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8 max-w-3xl">
    <h1 class="text-2xl font-bold text-gray-800 mb-8">Modifier le produit</h1>

    <form action="{{ route('entrepreneur.produits.update', $produit) }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-lg shadow p-6">
        @csrf
        @method('PUT')
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Colonne de gauche -->
            <div class="space-y-6">
                <!-- Nom du produit -->
                <div>
                    <label for="nom" class="block text-sm font-medium text-gray-700">Nom du produit *</label>
                    <input type="text" name="nom" id="nom" required
                           value="{{ old('nom', $produit->nom) }}"
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    @error('nom')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Catégorie -->
                <div>
                    <label for="categorie" class="block text-sm font-medium text-gray-700">Catégorie *</label>
                    <select name="categorie" id="categorie" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        <option value="">Sélectionnez une catégorie</option>
                        <option value="boisson" {{ old('categorie', $produit->categorie) == 'boisson' ? 'selected' : '' }}>Boisson</option>
                        <option value="nourriture" {{ old('categorie', $produit->categorie) == 'nourriture' ? 'selected' : '' }}>Nourriture</option>
                        <option value="dessert" {{ old('categorie', $produit->categorie) == 'dessert' ? 'selected' : '' }}>Dessert</option>
                    </select>
                    @error('categorie')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Prix -->
                <div>
                    <label for="prix" class="block text-sm font-medium text-gray-700">Prix (€) *</label>
                    <input type="number" name="prix" id="prix" min="0" step="0.01" required
                           value="{{ old('prix', $produit->prix) }}"
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    @error('prix')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Disponibilité -->
                <div class="flex items-center">
                    <input type="checkbox" name="est_disponible" id="est_disponible" 
                           {{ old('est_disponible', $produit->est_disponible) ? 'checked' : '' }}
                           class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                    <label for="est_disponible" class="ml-2 block text-sm text-gray-700">
                        Produit disponible à la vente
                    </label>
                </div>
            </div>

            <!-- Colonne de droite -->
            <div class="space-y-6">
                <!-- Image -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Image actuelle</label>
                    @if($produit->image_url)
                        <div class="mt-2">
                            <img src="{{ asset('storage/' . $produit->image_url) }}" 
                                 alt="{{ $produit->nom }}" 
                                 class="h-40 w-auto rounded">
                            <div class="mt-2 flex items-center">
                                <input type="checkbox" name="supprimer_image" id="supprimer_image" 
                                       class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                <label for="supprimer_image" class="ml-2 block text-sm text-gray-700">
                                    Supprimer cette image
                                </label>
                            </div>
                        </div>
                    @else
                        <p class="mt-1 text-sm text-gray-500">Aucune image</p>
                    @endif

                    <label for="image" class="mt-4 block text-sm font-medium text-gray-700">
                        {{ $produit->image_url ? 'Remplacer l\'image' : 'Ajouter une image' }}
                    </label>
                    <input type="file" name="image" id="image" 
                           class="mt-1 block w-full text-sm text-gray-500
                                  file:mr-4 file:py-2 file:px-4
                                  file:rounded-md file:border-0
                                  file:text-sm file:font-semibold
                                  file:bg-blue-50 file:text-blue-700
                                  hover:file:bg-blue-100">
                    @error('image')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Description -->
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea name="description" id="description" rows="4"
                              class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('description', $produit->description) }}</textarea>
                    @error('description')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <div class="mt-8 flex justify-end space-x-4">
            <a href="{{ route('entrepreneur.produits.index') }}"
               class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Annuler
            </a>
            <button type="submit"
                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Mettre à jour le produit
            </button>
        </div>
    </form>
</div>
@endsection