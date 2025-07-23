<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Stand;
use App\Models\Utilisateur;
use Illuminate\Http\Request;

class StandRequestController extends Controller
{
    /**
     * Afficher la liste des demandes de stand
     */
    public function index()
    {
        $demandesEnAttente = Stand::with('utilisateur')
            ->where('statut', 'en_attente')
            ->orderBy('created_at', 'desc')
            ->get();

        $demandesTraitees = Stand::with('utilisateur')
            ->whereIn('statut', ['approuve', 'rejete'])
            ->orderBy('updated_at', 'desc')
            ->paginate(10);

        return view('admin.stands.index', [
            'demandesEnAttente' => $demandesEnAttente,
            'demandesTraitees' => $demandesTraitees
        ]);
    }

    /**
     * Approuver une demande de stand
     */
    public function approuver(Stand $stand)
    {
        $stand->update(['statut' => 'approuve']);
        
        // Mettre à jour le statut de l'utilisateur
        $stand->utilisateur->update(['role' => 'entrepreneur_approuve']);
        
        return back()->with('success', 'La demande de stand a été approuvée avec succès.');
    }

    /**
     * Rejeter une demande de stand
     */
    public function rejeter(Stand $stand)
    {
        $stand->update(['statut' => 'rejete']);
        return back()->with('success', 'La demande de stand a été rejetée.');
    }

    /**
     * Afficher les détails d'une demande
     */
    public function show(Stand $stand)
    {
        return view('admin.stands.show', compact('stand'));
    }
}