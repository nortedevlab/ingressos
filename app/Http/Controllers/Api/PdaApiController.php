<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pda;
use App\Services\PdaService;
use App\Http\Requests\StorePdaRequest;
use App\Http\Requests\UpdatePdaRequest;
use Illuminate\Http\JsonResponse;

/**
 * API Controller para PDAs
 */
class PdaApiController extends Controller
{
    public function __construct(
        private readonly PdaService $pdaService
    ) {}

    public function index(): JsonResponse
    {
        return response()->json([
            'message' => __('messages.pda_listed'),
            'data'    => $this->pdaService->all()
        ]);
    }

    public function store(StorePdaRequest $request): JsonResponse
    {
        $pda = $this->pdaService->create($request->validated());
        return response()->json([
            'message' => __('messages.pda_created'),
            'data'    => $pda
        ], 201);
    }

    public function show(Pda $pda): JsonResponse
    {
        return response()->json([
            'message' => __('messages.pda_fetched'),
            'data'    => $pda
        ]);
    }

    public function update(UpdatePdaRequest $request, Pda $pda): JsonResponse
    {
        $updated = $this->pdaService->update($pda, $request->validated());
        return response()->json([
            'message' => __('messages.pda_updated'),
            'data'    => $updated
        ]);
    }

    public function destroy(Pda $pda): JsonResponse
    {
        $this->pdaService->delete($pda);
        return response()->json([
            'message' => __('messages.pda_deleted'),
        ], 204);
    }
}
