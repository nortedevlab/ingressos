<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReportRequest;
use App\Services\ReportService;
use Illuminate\Http\JsonResponse;

/**
 * API Controller para Relatórios
 */
class ReportApiController extends Controller
{
    public function __construct(
        private readonly ReportService $reportService
    ) {}

    public function generate(ReportRequest $request): JsonResponse
    {
        $filters = $request->validated();
        $data = $this->reportService->generate($filters);

        return response()->json([
            'message' => __('messages.report_generated'),
            'filters' => $filters,
            'data'    => $data
        ]);
    }
}
