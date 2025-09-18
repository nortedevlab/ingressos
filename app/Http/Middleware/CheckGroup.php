<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckGroup
{
    /**
     * Verifica se o usuário pertence a um dos grupos permitidos.
     *
     * @param Request $request
     * @param Closure $next
     * @param string ...$groups Slugs dos grupos permitidos (ex: admin, manager, account)
     * @return mixed
     */
    public function handle(Request $request, Closure $next, string ...$groups): mixed
    {
        $user = Auth::user();

        if (!$user || !$user->group) {
            abort(403, 'Acesso negado.');
        }

        if (!in_array($user->group->slug, $groups)) {
            abort(403, 'Você não tem permissão para acessar esta área.');
        }

        return $next($request);
    }
}

