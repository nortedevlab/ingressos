<?php

namespace App\Policies;

use Illuminate\Support\Facades\Auth;

class AccessPolicy
{
    /**
     * Valida se o usuário tem determinada permissão.
     *
     * @param  string $permission
     * @return bool
     */
    public function access(string $permission): bool
    {
        $user = Auth::user();

        return $user->hasPermission($permission);
    }
}

