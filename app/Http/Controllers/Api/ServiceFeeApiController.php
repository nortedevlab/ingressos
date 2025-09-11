<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ServiceFee;
use App\Services\ServiceFeeService;
use App\Http\Requests\StoreServiceFeeRequest;
use App\Http\Requests\UpdateServiceFeeRequest;
use Illuminate\Http\JsonResponse;

/**
 * API Controller para Taxas de Serviço
 */
class ServiceFeeApiController extends Controller
{
    public function __construct(
        private readonly ServiceFeeService $feeService
    ) {}

    public function index(): JsonResponse
    {
        return response()->json([
            'message' => __('messages.fee_listed'),
            'data'    => $this->feeService->all()
        ]);
    }

    public function store(StoreServiceFeeRequest $request): JsonResponse
    {
        $fee = $this->feeService->create($request->validated());
        return response()->json([
            'message' => __('messages.fee_created'),
            'data'    => $fee
        ], 201);
    }

    public function show(ServiceFee $serviceFee): JsonResponse
    {
        return response()->json([
            'message' => __('messages.fee_fetched'),
            'data'    => $serviceFee
        ]);
    }

    public function update(UpdateServiceFeeRequest $request, ServiceFee $serviceFee): JsonResponse
    {
        $updated = $this->feeService->update($serviceFee, $request->validated());
        return response()->json([
            'message' => __('messages.fee_updated'),
            'data'    => $updated
        ]);
    }

    public function destroy(ServiceFee $serviceFee): JsonResponse
    {
        $this->feeService->delete($serviceFee);
        return response()->json([
            'message' => __('messages.fee_deleted'),
        ], 204);
    }
}
