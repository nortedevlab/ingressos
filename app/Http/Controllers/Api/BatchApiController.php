<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Batch;
use App\Services\BatchService;
use App\Http\Requests\StoreBatchRequest;
use App\Http\Requests\UpdateBatchRequest;
use Illuminate\Http\JsonResponse;

/**
 * API Controller para Lotes de Ingressos
 */
class BatchApiController extends Controller
{
    public function __construct(
        private readonly BatchService $batchService
    ) {}

    public function index(): JsonResponse
    {
        return response()->json([
            'message' => __('messages.batch_listed'),
            'data'    => $this->batchService->all()
        ]);
    }

    public function store(StoreBatchRequest $request): JsonResponse
    {
        $batch = $this->batchService->create($request->validated());
        return response()->json([
            'message' => __('messages.batch_created'),
            'data'    => $batch
        ], 201);
    }

    public function show(Batch $batch): JsonResponse
    {
        return response()->json([
            'message' => __('messages.batch_fetched'),
            'data'    => $batch
        ]);
    }

    public function update(UpdateBatchRequest $request, Batch $batch): JsonResponse
    {
        $updated = $this->batchService->update($batch, $request->validated());
        return response()->json([
            'message' => __('messages.batch_updated'),
            'data'    => $updated
        ]);
    }

    public function destroy(Batch $batch): JsonResponse
    {
        $this->batchService->delete($batch);
        return response()->json([
            'message' => __('messages.batch_deleted'),
        ], 204);
    }
}
