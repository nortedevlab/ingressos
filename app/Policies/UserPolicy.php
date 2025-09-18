<?php

namespace App\Policies;

use Illuminate\Support\Facades\Auth;

class UserPolicy
{
    /**
     * Verifica se o usuário pode acessar o painel administrativo.
     */
    public function accessAdmin(): bool
    {
        $user = Auth::user();

        return $user->group?->slug === 'admin'
            || $user->hasPermission('access-admin');
    }

    /**
     * Verifica se o usuário pode acessar o painel do gerente.
     */
    public function accessManager(): bool
    {
        $user = Auth::user();

        return $user->group?->slug === 'manager'
            || $user->hasPermission('access-manager');
    }

    /**
     * Verifica se o usuário pode acessar o painel do cliente.
     */
    public function accessAccount(): bool
    {
        $user = Auth::user();

        return $user->group?->slug === 'account'
            || $user->hasPermission('access-account');
    }
}

