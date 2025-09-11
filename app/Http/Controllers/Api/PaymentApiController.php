<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Services\PaymentService;
use App\Http\Requests\StorePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;
use Illuminate\Http\JsonResponse;

/**
 * API Controller para Pagamentos
 */
class PaymentApiController extends Controller
{
    public function __construct(
        private readonly PaymentService $paymentService
    ) {}

    public function index(): JsonResponse
    {
        return response()->json([
            'message' => __('messages.payment_listed'),
            'data'    => $this->paymentService->all()
        ]);
    }

    public function store(StorePaymentRequest $request): JsonResponse
    {
        $payment = $this->paymentService->create($request->validated());
        return response()->json([
            'message' => __('messages.payment_created'),
            'data'    => $payment
        ], 201);
    }

    public function show(Payment $payment): JsonResponse
    {
        return response()->json([
            'message' => __('messages.payment_fetched'),
            'data'    => $payment
        ]);
    }

    public function update(UpdatePaymentRequest $request, Payment $payment): JsonResponse
    {
        $updated = $this->paymentService->update($payment, $request->validated());
        return response()->json([
            'message' => __('messages.payment_updated'),
            'data'    => $updated
        ]);
    }

    public function destroy(Payment $payment): JsonResponse
    {
        $this->paymentService->delete($payment);
        return response()->json([
            'message' => __('messages.payment_deleted'),
        ], 204);
    }
}
