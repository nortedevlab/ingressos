<?php

namespace App\Services;

use App\Models\Company;
use Illuminate\Database\Eloquent\Collection;

/**
 * Serviço para Empresas
 */
class CompanyService
{
    /**
     * Lista todas as empresas
     *
     * @return Collection<int, Company>
     */
    public function all(): Collection
    {
        return Company::with('users')->get();
    }

    /**
     * Cria nova empresa
     *
     * @param array $data
     * @return Company
     */
    public function create(array $data): Company
    {
        return Company::create($data);
    }

    /**
     * Atualiza empresa
     *
     * @param Company $company
     * @param array $data
     * @return Company
     */
    public function update(Company $company, array $data): Company
    {
        $company->update($data);
        return $company;
    }

    /**
     * Remove empresa
     *
     * @param Company $company
     * @return bool|null
     */
    public function delete(Company $company): ?bool
    {
        return $company->delete();
    }
}
