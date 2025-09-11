<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\Ticket;
use App\Services\BatchService;
use App\Http\Requests\StoreBatchRequest;
use App\Http\Requests\UpdateBatchRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

/**
 * Controller Web para Lotes de Ingressos
 */
class BatchController extends Controller
{
    public function __construct(
        private readonly BatchService $batchService
    ) {}

    public function index(): View
    {
        $batches = $this->batchService->all();
        return view('batches.index', compact('batches'));
    }

    public function create(): View
    {
        $tickets = Ticket::all();
        return view('batches.create', compact('tickets'));
    }

    public function store(StoreBatchRequest $request): RedirectResponse
    {
        $this->batchService->create($request->validated());
        return redirect()->route('batches.index')
            ->with('success', __('messages.batch_created'));
    }

    public function show(Batch $batch): View
    {
        return view('batches.show', compact('batch'));
    }

    public function edit(Batch $batch): View
    {
        $tickets = Ticket::all();
        return view('batches.edit', compact('batch', 'tickets'));
    }

    public function update(UpdateBatchRequest $request, Batch $batch): RedirectResponse
    {
        $this->batchService->update($batch, $request->validated());
        return redirect()->route('batches.index')
            ->with('success', __('messages.batch_updated'));
    }

    public function destroy(Batch $batch): RedirectResponse
    {
        $this->batchService->delete($batch);
        return redirect()->route('batches.index')
            ->with('success', __('messages.batch_deleted'));
    }
}
