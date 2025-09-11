<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Booth;
use App\Services\BoothService;
use App\Http\Requests\StoreBoothRequest;
use App\Http\Requests\UpdateBoothRequest;
use Illuminate\Http\JsonResponse;

/**
 * API Controller para Guichês (Booths)
 */
class BoothApiController extends Controller
{
    public function __construct(
        private readonly BoothService $boothService
    ) {}

    public function index(): JsonResponse
    {
        return response()->json([
            'message' => __('messages.booth_listed'),
            'data'    => $this->boothService->all()
        ]);
    }

    public function store(StoreBoothRequest $request): JsonResponse
    {
        $booth = $this->boothService->create($request->validated());
        return response()->json([
            'message' => __('messages.booth_created'),
            'data'    => $booth
        ], 201);
    }

    public function show(Booth $booth): JsonResponse
    {
        return response()->json([
            'message' => __('messages.booth_fetched'),
            'data'    => $booth
        ]);
    }

    public function update(UpdateBoothRequest $request, Booth $booth): JsonResponse
    {
        $updated = $this->boothService->update($booth, $request->validated());
        return response()->json([
            'message' => __('messages.booth_updated'),
            'data'    => $updated
        ]);
    }

    public function destroy(Booth $booth): JsonResponse
    {
        $this->boothService->delete($booth);
        return response()->json([
            'message' => __('messages.booth_deleted'),
        ], 204);
    }
}
