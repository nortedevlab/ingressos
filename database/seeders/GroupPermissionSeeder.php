<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Group;
use App\Models\Permission;

class GroupPermissionSeeder extends Seeder
{
    public function run(): void
    {
        if (!Group::exists() || !Permission::exists()) {
            $this->command->warn('Grupos ou permissões não encontrados. Pulando seeder.');
            return;
        }

        $this->command->info('Iniciando sincronização de permissões para grupos...');

        $permissionIds = Permission::pluck('id')->toArray();

        if (empty($permissionIds)) {
            $this->command->warn('Nenhuma permissão encontrada.');
            return;
        }

        DB::transaction(function () use ($permissionIds) {
            $groupCount = 0;

            Group::chunk(100, function ($groups) use ($permissionIds, &$groupCount) {
                foreach ($groups as $group) {
                    $existingPermissions = $group->permissions()->pluck('permission_id')->toArray();
                    $missingPermissions = array_diff($permissionIds, $existingPermissions);

                    if (!empty($missingPermissions)) {
                        $group->permissions()->syncWithoutDetaching($permissionIds);
                        $this->command->line("Permissões sincronizadas para o grupo: {$group->name}");
                    } else {
                        $this->command->line("Grupo '{$group->name}' já possui todas as permissões.");
                    }

                    $groupCount++;
                }
            });

            $this->command->info("Sincronização concluída para {$groupCount} grupos.");
        });
    }
}
