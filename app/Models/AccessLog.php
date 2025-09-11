<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Classe de modelo para Logs de Acesso
 *
 * @property int $id
 * @property int $event_id
 * @property int|null $pda_id
 * @property string $ticket_code
 * @property \DateTime $scanned_at
 *
 * @property-read Event $event
 * @property-read Pda|null $pda
 */
class AccessLog extends Model
{
    protected $fillable = [
        'event_id',
        'pda_id',
        'ticket_code',
        'scanned_at',
    ];

    protected $casts = [
        'scanned_at' => 'datetime',
    ];

    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }

    public function pda(): BelongsTo
    {
        return $this->belongsTo(Pda::class);
    }
}
