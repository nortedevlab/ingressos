<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Classe de modelo para Guichês do PDV
 *
 * @property int $id
 * @property int $event_id
 * @property string $name
 *
 * @property-read Event $event
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Attendant> $attendants
 */
class Booth extends Model
{
    protected $fillable = [
        'event_id',
        'name',
    ];

    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }

    public function attendants(): HasMany
    {
        return $this->hasMany(Attendant::class);
    }
}
