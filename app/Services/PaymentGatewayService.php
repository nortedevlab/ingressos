<?php

namespace App\Services;

use App\Models\PaymentGateway;
use Illuminate\Database\Eloquent\Collection;

/**
 * Serviço para Gateways de Pagamento
 */
class PaymentGatewayService
{
    public function all(): Collection
    {
        return PaymentGateway::with('company')->get();
    }

    public function create(array $data): PaymentGateway
    {
        return PaymentGateway::create($data);
    }

    public function update(PaymentGateway $gateway, array $data): PaymentGateway
    {
        $gateway->update($data);
        return $gateway;
    }

    public function delete(PaymentGateway $gateway): ?bool
    {
        return $gateway->delete();
    }
}
