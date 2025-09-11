<?php

namespace App\Services;

use App\Models\Booth;
use Illuminate\Database\Eloquent\Collection;

/**
 * Serviço para Guichês do PDV
 */
class BoothService
{
    public function all(): Collection
    {
        return Booth::with(['event','attendants'])->get();
    }

    public function create(array $data): Booth
    {
        return Booth::create($data);
    }

    public function update(Booth $booth, array $data): Booth
    {
        $booth->update($data);
        return $booth;
    }

    public function delete(Booth $booth): ?bool
    {
        return $booth->delete();
    }
}
