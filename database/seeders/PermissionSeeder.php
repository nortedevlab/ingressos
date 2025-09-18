<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [
            ['name' => 'Painel administrativo', 'slug' => 'admin.dashboard'],
            ['name' => 'Painel gestor', 'slug' => 'manager.dashboard'],
            ['name' => 'Painel do cliente', 'slug' => 'account.dashboard'],
        ];

        foreach ($permissions as $permission) {
            Permission::updateOrCreate(['slug' => $permission['slug']], $permission);
        }
    }
}
