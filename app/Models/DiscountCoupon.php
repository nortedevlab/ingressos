<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Classe de modelo para Cupons de Desconto e Cortesias
 *
 * @property int $id
 * @property int $event_id
 * @property string $code
 * @property float|null $discount_value
 * @property int|null $discount_percent
 * @property int|null $max_usage
 * @property int $used
 *
 * @property-read Event $event
 */
class DiscountCoupon extends Model
{
    protected $fillable = [
        'event_id',
        'code',
        'discount_value',
        'discount_percent',
        'max_usage',
        'used',
    ];

    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }
}
