<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReportRequest;
use App\Services\ReportService;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

/**
 * Controller Web para Relatórios
 */
class ReportController extends Controller
{
    public function __construct(
        private readonly ReportService $reportService
    ) {}

    public function index(): View
    {
        return view('reports.index');
    }

    public function generate(ReportRequest $request): View|BinaryFileResponse
    {
        $filters = $request->validated();
        $data = $this->reportService->generate($filters);

        if ($filters['format'] ?? null === 'csv') {
            $file = $this->reportService->exportCsv($data);
            return response()->download($file);
        }

        if ($filters['format'] ?? null === 'pdf') {
            $file = $this->reportService->exportPdf($data);
            return response()->download($file);
        }

        return view('reports.index', compact('data'));
    }
}
