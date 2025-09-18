<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        /**
         * Diretiva Blade para grupos
         */
        Blade::if('group', function (string ...$groups) {
            $user = Auth::user();
            if (!$user || !$user->group) {
                return false;
            }
            return in_array($user->group->slug, $groups);
        });

        /**
         * Diretiva Blade para permissões
         */
        Blade::if('permission', function (string ...$permissions) {
            $user = Auth::user();
            if (!$user || !$user->group) {
                return false;
            }

            foreach ($permissions as $permission) {
                if ($user->hasPermission($permission)) {
                    return true;
                }
            }

            return false;
        });
    }
}
