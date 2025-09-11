<?php

namespace App\Services;

use App\Models\AccessLog;
use Illuminate\Database\Eloquent\Collection;

/**
 * Serviço para Logs de Acesso
 */
class AccessLogService
{
    public function all(): Collection
    {
        return AccessLog::with(['event','pda'])->get();
    }

    public function create(array $data): AccessLog
    {
        return AccessLog::create($data);
    }

    public function delete(AccessLog $log): ?bool
    {
        return $log->delete();
    }
}
