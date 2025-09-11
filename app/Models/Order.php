<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Classe de modelo para Pedidos
 *
 * @property int $id
 * @property int|null $client_id
 * @property int $event_id
 * @property float $total
 *
 * @property-read Client|null $client
 * @property-read Event $event
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Payment> $payments
 */
class Order extends Model
{
    protected $fillable = [
        'client_id',
        'event_id',
        'total',
    ];

    /**
     * Cliente que realizou o pedido
     */
    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    /**
     * Evento do pedido
     */
    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }

    /**
     * Pagamentos associados ao pedido
     */
    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class);
    }
}
