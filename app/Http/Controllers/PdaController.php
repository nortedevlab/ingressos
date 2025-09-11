<?php

namespace App\Http\Controllers;

use App\Models\Pda;
use App\Models\Event;
use App\Services\PdaService;
use App\Http\Requests\StorePdaRequest;
use App\Http\Requests\UpdatePdaRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

/**
 * Controller Web para PDAs
 */
class PdaController extends Controller
{
    public function __construct(
        private readonly PdaService $pdaService
    ) {}

    public function index(): View
    {
        $pdas = $this->pdaService->all();
        return view('pdas.index', compact('pdas'));
    }

    public function create(): View
    {
        $events = Event::all();
        return view('pdas.create', compact('events'));
    }

    public function store(StorePdaRequest $request): RedirectResponse
    {
        $this->pdaService->create($request->validated());
        return redirect()->route('pdas.index')
            ->with('success', __('messages.pda_created'));
    }

    public function show(Pda $pda): View
    {
        return view('pdas.show', compact('pda'));
    }

    public function edit(Pda $pda): View
    {
        $events = Event::all();
        return view('pdas.edit', compact('pda','events'));
    }

    public function update(UpdatePdaRequest $request, Pda $pda): RedirectResponse
    {
        $this->pdaService->update($pda, $request->validated());
        return redirect()->route('pdas.index')
            ->with('success', __('messages.pda_updated'));
    }

    public function destroy(Pda $pda): RedirectResponse
    {
        $this->pdaService->delete($pda);
        return redirect()->route('pdas.index')
            ->with('success', __('messages.pda_deleted'));
    }
}
