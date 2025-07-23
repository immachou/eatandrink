<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommandeController
{
    public function soumettre()
    {
        $panier = session()->get('panier', []);
        if(empty($panier)) {
            return redirect()->route('panier.index')->with('error', 'Votre panier est vide.');
        }

        $products = \App\Models\Product::whereIn('id', array_keys($panier))->get();
        $standId = $products->first()->stand_id ?? null;

        \App\Models\Order::create([
            'stand_id' => $standId,
            'details_commande' => json_encode($panier),
            'date_commande' => now(),
        ]);

        session()->forget('panier');
        return redirect()->route('stands.index')->with('success', 'Commande passée avec succès !');
    }
}
