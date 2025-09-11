<?php

namespace App\Services;

use App\Models\Payment;
use Illuminate\Database\Eloquent\Collection;

/**
 * Serviço para Pagamentos
 */
class PaymentService
{
    public function all(): Collection
    {
        return Payment::with('order')->get();
    }

    public function create(array $data): Payment
    {
        return Payment::create($data);
    }

    public function update(Payment $payment, array $data): Payment
    {
        $payment->update($data);
        return $payment;
    }

    public function delete(Payment $payment): ?bool
    {
        return $payment->delete();
    }
}
