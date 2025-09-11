<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PaymentGateway;
use App\Services\PaymentGatewayService;
use App\Http\Requests\StorePaymentGatewayRequest;
use App\Http\Requests\UpdatePaymentGatewayRequest;
use Illuminate\Http\JsonResponse;

/**
 * API Controller para Gateways de Pagamento
 */
class PaymentGatewayApiController extends Controller
{
    public function __construct(
        private readonly PaymentGatewayService $gatewayService
    ) {}

    public function index(): JsonResponse
    {
        return response()->json([
            'message' => __('messages.gateway_listed'),
            'data'    => $this->gatewayService->all()
        ]);
    }

    public function store(StorePaymentGatewayRequest $request): JsonResponse
    {
        $gateway = $this->gatewayService->create($request->validated());
        return response()->json([
            'message' => __('messages.gateway_created'),
            'data'    => $gateway
        ], 201);
    }

    public function show(PaymentGateway $paymentGateway): JsonResponse
    {
        return response()->json([
            'message' => __('messages.gateway_fetched'),
            'data'    => $paymentGateway
        ]);
    }

    public function update(UpdatePaymentGatewayRequest $request, PaymentGateway $paymentGateway): JsonResponse
    {
        $updated = $this->gatewayService->update($paymentGateway, $request->validated());
        return response()->json([
            'message' => __('messages.gateway_updated'),
            'data'    => $updated
        ]);
    }

    public function destroy(PaymentGateway $paymentGateway): JsonResponse
    {
        $this->gatewayService->delete($paymentGateway);
        return response()->json([
            'message' => __('messages.gateway_deleted'),
        ], 204);
    }
}
