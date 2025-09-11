<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Classe de modelo para Tipos de Ingressos
 *
 * @property int $id
 * @property int $event_id
 * @property string $name
 * @property float $price
 *
 * @property-read Event $event
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Batch> $batches
 */
class Ticket extends Model
{
    protected $fillable = [
        'event_id',
        'name',
        'price',
    ];

    /**
     * Evento ao qual o ingresso pertence
     */
    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }

    /**
     * Lotes vinculados ao ingresso
     */
    public function batches(): HasMany
    {
        return $this->hasMany(Batch::class);
    }
}
