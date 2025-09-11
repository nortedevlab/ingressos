<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Classe de modelo para Dispositivos PDA
 *
 * @property int $id
 * @property int $event_id
 * @property string $identifier
 * @property string|null $gate
 *
 * @property-read Event $event
 * @property-read \Illuminate\Database\Eloquent\Collection<int, AccessLog> $logs
 */
class Pda extends Model
{
    protected $fillable = [
        'event_id',
        'identifier',
        'gate',
    ];

    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }

    public function logs(): HasMany
    {
        return $this->hasMany(AccessLog::class);
    }
}
