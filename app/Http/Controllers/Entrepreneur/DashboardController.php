<?php

namespace App\Http\Controllers\Entrepreneur;

use App\Http\Controllers\Controller;
use App\Models\Stand;
use App\Models\Produit;
use App\Models\Utilisateur;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Afficher le tableau de bord de l'entrepreneur
     */
    public function index()
    {
        $stand = null;
        $produits = collect();
        $demandeEnAttente = false;

        // Récupérer les informations du stand si l'utilisateur est approuvé
        if (auth()->user()->isEntrepreneurApprouve()) {
            $stand = Stand::where('utilisateur_id', auth()->id())
                        ->where('statut', 'approuve')
                        ->first();
            
            // Récupérer les produits de l'entrepreneur
            $produits = Produit::where('utilisateur_id', auth()->id())
                             ->orderBy('created_at', 'desc')
                             ->take(5)
                             ->get();
        } 
        // Vérifier si une demande est en attente
        elseif (auth()->user()->isEnAttente()) {
            $stand = Stand::where('utilisateur_id', auth()->id())
                        ->where('statut', 'en_attente')
                        ->first();
            $demandeEnAttente = true;
        }

        return view('entrepreneur.dashboard', [
            'stand' => $stand,
            'produits' => $produits,
            'demandeEnAttente' => $demandeEnAttente,
            'statutCompte' => auth()->user()->getAttribute('role'),
        ]);
    }

    /**
     * Afficher le profil de l'entrepreneur
     */
    public function profil()
    {
        return view('entrepreneur.profil');
    }

    /**
     * Mettre à jour le profil de l'entrepreneur
     */
    public function updateProfil(Request $request)
    {
        $validated = $request->validate([
            'nom_entreprise' => 'required|string|max:100',
            'nom_contact' => 'required|string|max:100',
            'email' => 'required|string|email|max:100|unique:utilisateurs,email,' . auth()->id(),
            'telephone' => 'required|string|max:20',
            'adresse' => 'required|string|max:255',
            'siret' => 'required|string|max:14|unique:utilisateurs,siret,' . auth()->id(),
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        // Mise à jour du mot de passe si fourni
        if (!empty($validated['password'])) {
            $validated['password'] = bcrypt($validated['password']);
        } else {
            unset($validated['password']);
        }

        Utilisateur::where('id', auth()->id())->update($validated);

        return redirect()->route('entrepreneur.dashboard')
            ->with('success', 'Votre profil a été mis à jour avec succès.');
    }
}