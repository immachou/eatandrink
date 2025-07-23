<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StandController
{
    public function index()
    {
        // On suppose que le champ 'role' de l'utilisateur indique l'approbation
        $stands = \App\Models\Stand::whereHas('user', function($q) {
            $q->where('role', 'entrepreneur_approuve');
        })->get();

        return view('exposants.index', compact('stands'));
    }

    public function show($id)
    {
        $stand = \App\Models\Stand::with('user', 'products')->findOrFail($id);
        return view('exposants.show', compact('stand'));
    }
}
