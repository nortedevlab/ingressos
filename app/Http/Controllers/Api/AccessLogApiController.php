<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AccessLog;
use App\Services\AccessLogService;
use App\Http\Requests\StoreAccessLogRequest;
use Illuminate\Http\JsonResponse;

/**
 * API Controller para Logs de Acesso
 */
class AccessLogApiController extends Controller
{
    public function __construct(
        private readonly AccessLogService $logService
    ) {}

    public function index(): JsonResponse
    {
        return response()->json([
            'message' => __('messages.log_listed'),
            'data'    => $this->logService->all()
        ]);
    }

    public function store(StoreAccessLogRequest $request): JsonResponse
    {
        $log = $this->logService->create($request->validated());
        return response()->json([
            'message' => __('messages.log_created'),
            'data'    => $log
        ], 201);
    }

    public function show(AccessLog $accessLog): JsonResponse
    {
        return response()->json([
            'message' => __('messages.log_fetched'),
            'data'    => $accessLog
        ]);
    }
}
