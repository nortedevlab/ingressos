<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckPermission
{
    /**
     * Verifica se o usuário tem determinada permissão.
     *
     * @param Request $request
     * @param Closure $next
     * @param string ...$permissions Slugs das permissões permitidas
     * @return mixed
     */
    public function handle(Request $request, Closure $next, string ...$permissions): mixed
    {
        $user = Auth::user();

        if (!$user || !$user->group) {
            abort(403, 'Acesso negado.');
        }

        $hasPermission = $user->group
            ->permissions()
            ->whereIn('slug', $permissions)
            ->exists();

        if (!$hasPermission) {
            abort(403, 'Você não possui a permissão necessária.');
        }

        return $next($request);
    }
}

