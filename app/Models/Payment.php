<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Enums\PaymentMethod;

/**
 * Classe de modelo para Pagamentos
 *
 * @property int $id
 * @property int $order_id
 * @property PaymentMethod $method
 * @property float $amount
 * @property string|null $transaction_id
 *
 * @property-read Order $order
 */
class Payment extends Model
{
    protected $fillable = [
        'order_id',
        'method',
        'amount',
        'transaction_id',
    ];

    protected $casts = [
        'method' => PaymentMethod::class,
    ];

    /**
     * Pedido vinculado ao pagamento
     */
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
}
