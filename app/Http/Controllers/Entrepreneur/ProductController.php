<?php

namespace App\Http\Controllers\Entrepreneur;

use App\Http\Controllers\Controller;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    /**
     * Affiche la liste des produits de l'utilisateur
     */
    public function index()
    {
        $produits = Produit::where('utilisateur_id', Auth::id())
            ->latest()
            ->paginate(10);

        return view('entrepreneur.produit.index', compact('produits'));
    }

    /**
     * Affiche le formulaire de création d'un produit
     */
    public function create()
    {
        return view('entrepreneur.produit.create');
    }

    /**
     * Enregistre un nouveau produit
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:100',
            'description' => 'nullable|string',
            'prix' => 'required|numeric|min:0.01',
            'categorie' => 'required|string|max:50',
            'est_disponible' => 'boolean',
            'image' => 'nullable|image|max:2048' // 2MB max
        ]);

        $produit = new Produit($validated);
        $produit->utilisateur_id = Auth::id();
        
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('produits', 'public');
            $produit->image_url = $path;
        }

        $produit->save();

        return redirect()
            ->route('entrepreneur.produits.index')
            ->with('success', 'Produit créé avec succès.');
    }

    /**
     * Affiche les détails d'un produit
     */
    public function show(Produit $produit)
    {
        $this->authorize('view', $produit);
return view('entrepreneur.produit.show', compact('produit'));
    }

    /**
     * Affiche le formulaire d'édition d'un produit
     */
    public function edit(Produit $produit)
    {
        $this->authorize('update', $produit);
return view('entrepreneur.produit.edit', compact('produit'));
    }

    /**
     * Met à jour un produit existant
     */
    public function update(Request $request, Produit $produit)
    {
        $this->authorize('update', $produit);

        $validated = $request->validate([
            'nom' => 'required|string|max:100',
            'description' => 'nullable|string',
            'prix' => 'required|numeric|min:0.01',
            'categorie' => 'required|string|max:50',
            'est_disponible' => 'boolean',
            'image' => 'nullable|image|max:2048',
            'supprimer_image' => 'boolean'
        ]);

        // Gestion de la suppression de l'image
        if ($request->boolean('supprimer_image') && $produit->image_url) {
            Storage::disk('public')->delete($produit->image_url);
            $produit->image_url = null;
        }

        // Mise à jour de l'image si fournie
        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image si elle existe
            if ($produit->image_url) {
                Storage::disk('public')->delete($produit->image_url);
            }
            $path = $request->file('image')->store('produits', 'public');
            $produit->image_url = $path;
        }

        $produit->update($validated);

        return redirect()
            ->route('entrepreneur.produits.index')
            ->with('success', 'Produit mis à jour avec succès.');
    }

    /**
     * Supprime un produit
     */
    public function destroy(Produit $produit)
    {
        $this->authorize('delete', $produit);

        // Supprimer l'image associée si elle existe
        if ($produit->image_url) {
            Storage::disk('public')->delete($produit->image_url);
        }

        $produit->delete();

        return redirect()
            ->route('entrepreneur.produits.index')
            ->with('success', 'Produit supprimé avec succès.');
    }
}