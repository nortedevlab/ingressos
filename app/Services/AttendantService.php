<?php

namespace App\Services;

use App\Models\Attendant;
use Illuminate\Database\Eloquent\Collection;

/**
 * Serviço para Atendentes de Guichê
 */
class AttendantService
{
    public function all(): Collection
    {
        return Attendant::with('booth')->get();
    }

    public function create(array $data): Attendant
    {
        return Attendant::create($data);
    }

    public function update(Attendant $attendant, array $data): Attendant
    {
        $attendant->update($data);
        return $attendant;
    }

    public function delete(Attendant $attendant): ?bool
    {
        return $attendant->delete();
    }
}
