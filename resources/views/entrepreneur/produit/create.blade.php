{{-- resources/views/entrepreneur/produits/create.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8 max-w-3xl">
    <h1 class="text-2xl font-bold text-gray-800 mb-8">Ajouter un nouveau produit</h1>

    <form action="{{ route('entrepreneur.produits.store') }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-lg shadow p-6">
        @csrf
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Colonne de gauche -->
            <div class="space-y-6">
                <!-- Nom du produit -->
                <div>
                    <label for="nom" class="block text-sm font-medium text-gray-700">Nom du produit *</label>
                    <input type="text" name="nom" id="nom" required
                           value="{{ old('nom') }}"
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
                        <option value="boisson" {{ old('categorie') == 'boisson' ? 'selected' : '' }}>Boisson</option>
                        <option value="nourriture" {{ old('categorie') == 'nourriture' ? 'selected' : '' }}>Nourriture</option>
                        <option value="dessert" {{ old('categorie') == 'dessert' ? 'selected' : '' }}>Dessert</option>
                    </select>
                    @error('categorie')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Prix -->
                <div>
                    <label for="prix" class="block text-sm font-medium text-gray-700">Prix (€) *</label>
                    <input type="number" name="prix" id="prix" min="0" step="0.01" required
                           value="{{ old('prix') }}"
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    @error('prix')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Disponibilité -->
                <div class="flex items-center">
                    <input type="checkbox" name="est_disponible" id="est_disponible" 
                           {{ old('est_disponible', true) ? 'checked' : '' }}
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
                    <label for="image" class="block text-sm font-medium text-gray-700">Image du produit</label>
                    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                        <div class="space-y-1 text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div class="flex text-sm text-gray-600">
                                <label for="image" class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none">
                                    <span>Téléverser un fichier</span>
                                    <input id="image" name="image" type="file" class="sr-only">
                                </label>
                                <p class="pl-1">ou glisser-déposer</p>
                            </div>
                            <p class="text-xs text-gray-500">PNG, JPG, GIF jusqu'à 2MB</p>
                        </div>
                    </div>
                    @error('image')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Description -->
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea name="description" id="description" rows="4"
                              class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('description') }}</textarea>
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
                Enregistrer le produit
            </button>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
    // Aperçu de l'image avant téléversement
    document.getElementById('image').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const preview = document.createElement('img');
                preview.src = e.target.result;
                preview.className = 'mt-2 max-h-48 mx-auto';
                
                const container = document.querySelector('.border-dashed');
                const existingPreview = container.querySelector('img');
                if (existingPreview) {
                    container.replaceChild(preview, existingPreview);
                } else {
                    const svg = container.querySelector('svg');
                    if (svg) svg.remove();
                    const textElements = container.querySelectorAll('.text-sm, .text-xs');
                    textElements.forEach(el => el.remove());
                    container.appendChild(preview);
                }
            }
            reader.readAsDataURL(file);
        }
    });
</script>
@endpush