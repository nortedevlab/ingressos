<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Classe de modelo para Clientes (público consumidor)
 *
 * @property int $id
 * @property string $name
 * @property string|null $email
 * @property string|null $document
 * @property string|null $phone
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Order> $orders
 */
class Client extends Model
{
    protected $fillable = [
        'name',
        'email',
        'document',
        'phone',
    ];

    /**
     * Pedidos realizados pelo cliente
     */
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
