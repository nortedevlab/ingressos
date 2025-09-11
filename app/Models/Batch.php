<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Classe de modelo para Lotes de Ingressos
 *
 * @property int $id
 * @property int $ticket_id
 * @property string $name
 * @property int|null $quantity
 * @property float $price
 * @property \DateTime $start_date
 * @property \DateTime $end_date
 *
 * @property-read Ticket $ticket
 */
class Batch extends Model
{
    protected $fillable = [
        'ticket_id',
        'name',
        'quantity',
        'price',
        'start_date',
        'end_date',
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];

    /**
     * Ingresso associado ao lote
     */
    public function ticket(): BelongsTo
    {
        return $this->belongsTo(Ticket::class);
    }
}
