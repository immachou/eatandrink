<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PanierController
{
    public function ajouter($productId)
    {
        $panier = session()->get('panier', []);
        $panier[$productId] = ($panier[$productId] ?? 0) + 1;
        session(['panier' => $panier]);
        return redirect()->back()->with('success', 'Produit ajouté au panier !');
    }

    public function index()
    {
        $panier = session()->get('panier', []);
        $products = \App\Models\Produit::whereIn('id', array_keys($panier))->get();
        return view('panier.index', compact('products', 'panier'));
    }

    public function retirer($productId)
    {
        $panier = session()->get('panier', []);
        if(isset($panier[$productId])) {
            unset($panier[$productId]);
            session(['panier' => $panier]);
        }
        return redirect()->route('panier.index');
    }
}
