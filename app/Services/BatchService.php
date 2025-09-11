<?php

namespace App\Services;

use App\Models\Batch;
use Illuminate\Database\Eloquent\Collection;

/**
 * Serviço para Lotes de Ingressos
 */
class BatchService
{
    public function all(): Collection
    {
        return Batch::with('ticket')->get();
    }

    public function create(array $data): Batch
    {
        return Batch::create($data);
    }

    public function update(Batch $batch, array $data): Batch
    {
        $batch->update($data);
        return $batch;
    }

    public function delete(Batch $batch): ?bool
    {
        return $batch->delete();
    }
}
