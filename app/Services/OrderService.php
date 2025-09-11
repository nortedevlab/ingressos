<?php

namespace App\Services;

use App\Models\Order;
use Illuminate\Database\Eloquent\Collection;

/**
 * Serviço para Pedidos
 */
class OrderService
{
    public function all(): Collection
    {
        return Order::with(['client','event','payments'])->get();
    }

    public function create(array $data): Order
    {
        return Order::create($data);
    }

    public function update(Order $order, array $data): Order
    {
        $order->update($data);
        return $order;
    }

    public function delete(Order $order): ?bool
    {
        return $order->delete();
    }
}
