<?php

namespace App\Http\Controllers\Entrepreneur;

use App\Http\Controllers\Controller;
use App\Models\Stand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StandRequestController extends Controller
{
    /**
     * Afficher le formulaire de demande de stand
     */
    public function create()
    {
        // Vérifier si l'utilisateur a déjà une demande en cours
        $existingRequest = Stand::where('utilisateur_id', Auth::id())->first();
        
        if ($existingRequest) {
            return redirect()->route('entrepreneur.stand.status');
        }

        return view('entrepreneur.stands.create');
    }

    /**
     * Enregistrer une nouvelle demande de stand
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'type' => 'required|string|max:50',
            'surface' => 'required|numeric|min:1',
            'description' => 'required|string|max:1000',
            'besoins_specifiques' => 'nullable|string|max:500',
        ]);

        // Vérifier si l'utilisateur a déjà une demande
        $existingRequest = Stand::where('utilisateur_id', Auth::id())->first();
        if ($existingRequest) {
            return redirect()->route('entrepreneur.stand.status')
                ->with('error', 'Vous avez déjà une demande en cours.');
        }

        // Créer la demande
        $stand = new Stand($validated);
        $stand->utilisateur_id = Auth::id();
        $stand->statut = 'en_attente';
        $stand->save();

        return redirect()->route('entrepreneur.stand.status')
            ->with('success', 'Votre demande de stand a été soumise avec succès. Elle est en cours de traitement.');
    }

    /**
     * Afficher le statut de la demande
     */
    public function status()
    {
        $stand = Stand::where('utilisateur_id', Auth::id())->firstOrFail();
        return view('entrepreneur.stands.status', compact('stand'));
    }
}