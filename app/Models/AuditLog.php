<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * Modelo para Logs de Auditoria
 *
 * @property int $id
 * @property string $user_type
 * @property int|null $user_id
 * @property string $action
 * @property string|null $ip
 * @property array|null $data
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class AuditLog extends Model
{
    protected $table = 'audit_logs';

    protected $fillable = [
        'user_type',
        'user_id',
        'action',
        'ip',
        'data',
    ];

    protected $casts = [
        'data' => 'array',
    ];

    /**
     * Retorna o usuário relacionado dinamicamente.
     */
    public function user(): MorphTo
    {
        return $this->morphTo(__FUNCTION__, 'user_type', 'user_id');
    }
}
