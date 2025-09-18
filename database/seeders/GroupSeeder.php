<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Group;

class GroupSeeder extends Seeder
{
    public function run(): void
    {
        $groups = [
            ['name' => 'Administrator', 'slug' => 'admin'],
            ['name' => 'Gerente', 'slug' => 'manager'],
            ['name' => 'Cliente', 'slug' => 'account'],
        ];

        foreach ($groups as $group) {
            Group::updateOrCreate(['slug' => $group['slug']], $group);
        }
    }
}
