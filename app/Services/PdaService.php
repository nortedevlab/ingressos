<?php

namespace App\Services;

use App\Models\Pda;
use Illuminate\Database\Eloquent\Collection;

/**
 * Serviço para Dispositivos PDA
 */
class PdaService
{
    public function all(): Collection
    {
        return Pda::with(['event','logs'])->get();
    }

    public function create(array $data): Pda
    {
        return Pda::create($data);
    }

    public function update(Pda $pda, array $data): Pda
    {
        $pda->update($data);
        return $pda;
    }

    public function delete(Pda $pda): ?bool
    {
        return $pda->delete();
    }
}
