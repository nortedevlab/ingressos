<?php

namespace App\Http\Controllers;

use App\Models\AuditLog;
use App\Services\AuditLogService;
use Illuminate\View\View;

/**
 * Controller Web para Logs de Auditoria
 */
class AuditLogController extends Controller
{
    public function __construct(
        private readonly AuditLogService $auditService
    ) {}

    public function index(): View
    {
        $logs = $this->auditService->all();
        return view('audit_logs.index', compact('logs'));
    }

    public function show(AuditLog $auditLog): View
    {
        return view('audit_logs.show', compact('auditLog'));
    }
}
