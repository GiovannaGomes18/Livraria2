<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        // Verifica se o usuário está autenticado e é um administrador
        if ($request->user() && $request->user()->is_admin) {
            return $next($request);
        }

        return redirect('/')->with('error', 'Acesso negado');
    }
}
