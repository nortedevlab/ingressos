<?php

namespace App\Services;

use App\Models\ServiceFee;
use Illuminate\Database\Eloquent\Collection;

/**
 * Serviço para Taxas de Serviço
 */
class ServiceFeeService
{
    public function all(): Collection
    {
        return ServiceFee::with(['company','event','batch'])->get();
    }

    public function create(array $data): ServiceFee
    {
        return ServiceFee::create($data);
    }

    public function update(ServiceFee $fee, array $data): ServiceFee
    {
        $fee->update($data);
        return $fee;
    }

    public function delete(ServiceFee $fee): ?bool
    {
        return $fee->delete();
    }
}
