<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AuditLog;
use App\Services\AuditLogService;
use App\Http\Requests\StoreAuditLogRequest;
use Illuminate\Http\JsonResponse;

/**
 * API Controller para Logs de Auditoria
 */
class AuditLogApiController extends Controller
{
    public function __construct(
        private readonly AuditLogService $auditService
    ) {}

    public function index(): JsonResponse
    {
        return response()->json([
            'message' => __('messages.audit_listed'),
            'data'    => $this->auditService->all()
        ]);
    }

    public function store(StoreAuditLogRequest $request): JsonResponse
    {
        $log = $this->auditService->create($request->validated());
        return response()->json([
            'message' => __('messages.audit_created'),
            'data'    => $log
        ], 201);
    }

    public function show(AuditLog $auditLog): JsonResponse
    {
        return response()->json([
            'message' => __('messages.audit_fetched'),
            'data'    => $auditLog
        ]);
    }
}
