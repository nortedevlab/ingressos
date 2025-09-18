<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->command->info('🌱 Iniciando seed do banco de dados...');

        // Desabilita verificações de chave estrangeira temporariamente
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        try {
            // Seed de grupos e permissões primeiro (dependências)
            $this->command->info('📋 Criando grupos e permissões...');
            $this->call([
                GroupSeeder::class,
                PermissionSeeder::class,
                GroupPermissionSeeder::class,
            ]);

            // Criação do usuário administrador
            $this->command->info('👤 Criando usuário administrador...');
            $adminUser = User::firstOrCreate(
                ['email' => 'alessandro.souza@norte.dev.br'],
                [
                    'name' => 'Alessandro Souza',
                    'email' => 'alessandro.souza@norte.dev.br',
                    'password' => Hash::make('password'), // Senha padrão
                    'email_verified_at' => now(),
                ]
            );

            if ($adminUser->wasRecentlyCreated) {
                $this->command->line("✅ Usuário administrador criado: {$adminUser->email}");
            } else {
                $this->command->line("ℹ️  Usuário administrador já existe: {$adminUser->email}");
            }

            // Criação de usuários de teste apenas em ambiente de desenvolvimento
            if (app()->environment(['local', 'testing'])) {
                $this->command->info('🧪 Criando usuários de teste...');

                $existingUsersCount = User::count();
                $usersToCreate = max(0, 11 - $existingUsersCount); // Total desejado: 11 (1 admin + 10 teste)

                if ($usersToCreate > 0) {
                    User::factory($usersToCreate)->create();
                    $this->command->line("✅ {$usersToCreate} usuários de teste criados");
                } else {
                    $this->command->line("ℹ️  Usuários de teste já existem");
                }
            }

            $totalUsers = User::count();
            $this->command->info("🎉 Seed concluído! Total de usuários: {$totalUsers}");

        } catch (\Exception $e) {
            $this->command->error("❌ Erro durante o seed: " . $e->getMessage());
            throw $e;
        } finally {
            // Reabilita verificações de chave estrangeira
            \DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        }
    }
}
