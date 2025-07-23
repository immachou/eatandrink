<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!$request->utilisateur()) {
            return redirect()->route('login');
        }

        if (!in_array($request->utilisateur()->role, $roles)) {
            abort(403, 'Accès non autorisé');
        }

        return $next($request);
    }
}