<?php

namespace App\Services;

use App\Models\AuditLog;
use Illuminate\Support\Collection;

/**
 * Service para manipulação de Logs de Auditoria
 */
class AuditLogService
{
    /**
     * Retorna todos os logs de auditoria.
     */
    public function all(): Collection
    {
        return AuditLog::with('user')->latest()->get();
    }

    /**
     * Cria um novo log de auditoria.
     *
     * @param array $data
     * @return AuditLog
     */
    public function create(array $data): AuditLog
    {
        return AuditLog::create($data);
    }

    /**
     * Busca um log específico.
     *
     * @param int $id
     * @return AuditLog|null
     */
    public function find(int $id): ?AuditLog
    {
        return AuditLog::with('user')->find($id);
    }
}
