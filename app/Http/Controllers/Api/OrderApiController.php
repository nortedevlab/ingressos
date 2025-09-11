<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Services\OrderService;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use Illuminate\Http\JsonResponse;

/**
 * API Controller para Pedidos
 */
class OrderApiController extends Controller
{
    public function __construct(
        private readonly OrderService $orderService
    ) {}

    public function index(): JsonResponse
    {
        return response()->json([
            'message' => __('messages.order_listed'),
            'data'    => $this->orderService->all()
        ]);
    }

    public function store(StoreOrderRequest $request): JsonResponse
    {
        $order = $this->orderService->create($request->validated());
        return response()->json([
            'message' => __('messages.order_created'),
            'data'    => $order
        ], 201);
    }

    public function show(Order $order): JsonResponse
    {
        return response()->json([
            'message' => __('messages.order_fetched'),
            'data'    => $order
        ]);
    }

    public function update(UpdateOrderRequest $request, Order $order): JsonResponse
    {
        $updated = $this->orderService->update($order, $request->validated());
        return response()->json([
            'message' => __('messages.order_updated'),
            'data'    => $updated
        ]);
    }

    public function destroy(Order $order): JsonResponse
    {
        $this->orderService->delete($order);
        return response()->json([
            'message' => __('messages.order_deleted'),
        ], 204);
    }
}
