<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Classe de modelo para Atendentes do Guichê
 *
 * @property int $id
 * @property int $booth_id
 * @property string $name
 * @property string|null $document
 *
 * @property-read Booth $booth
 */
class Attendant extends Model
{
    protected $fillable = [
        'booth_id',
        'name',
        'document',
    ];

    public function booth(): BelongsTo
    {
        return $this->belongsTo(Booth::class);
    }
}
