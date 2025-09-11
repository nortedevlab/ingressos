<?php

namespace App\Http\Controllers;

use App\Models\AccessLog;
use App\Services\AccessLogService;
use Illuminate\View\View;

/**
 * Controller Web para Logs de Acesso
 */
class AccessLogController extends Controller
{
    public function __construct(
        private readonly AccessLogService $logService
    ) {}

    public function index(): View
    {
        $logs = $this->logService->all();
        return view('access_logs.index', compact('logs'));
    }

    public function show(AccessLog $accessLog): View
    {
        return view('access_logs.show', compact('accessLog'));
    }
}
