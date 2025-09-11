<?php

namespace App\Services;

use App\Models\CompanyUser;
use Illuminate\Database\Eloquent\Collection;

/**
 * Serviço para Usuários de Empresa
 */
class CompanyUserService
{
    /**
     * Lista todos os usuários
     *
     * @return Collection<int, CompanyUser>
     */
    public function all(): Collection
    {
        return CompanyUser::with('company')->get();
    }

    /**
     * Cria usuário
     *
     * @param array $data
     * @return CompanyUser
     */
    public function create(array $data): CompanyUser
    {
        return CompanyUser::create($data);
    }

    /**
     * Atualiza usuário
     *
     * @param CompanyUser $user
     * @param array $data
     * @return CompanyUser
     */
    public function update(CompanyUser $user, array $data): CompanyUser
    {
        $user->update($data);
        return $user;
    }

    /**
     * Remove usuário
     *
     * @param CompanyUser $user
     * @return bool|null
     */
    public function delete(CompanyUser $user): ?bool
    {
        return $user->delete();
    }
}
