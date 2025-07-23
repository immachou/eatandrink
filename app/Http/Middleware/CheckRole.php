<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Utilisateur;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $user = $request->user();
        
        if (!$user || !$user instanceof Utilisateur) {
            return redirect()->route('login');
        }

        // Vérification explicite du rôle via getAttribute et avec une valeur par défaut
        $userRole = method_exists($user, 'getAttribute') ? $user->getAttribute('role') : null;
        
        if (!$userRole || !in_array($userRole, $roles)) {
            abort(403, 'Accès non autorisé');
        }

        return $next($request);
    }
}