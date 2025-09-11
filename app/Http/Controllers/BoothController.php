<?php

namespace App\Http\Controllers;

use App\Models\Booth;
use App\Models\Event;
use App\Services\BoothService;
use App\Http\Requests\StoreBoothRequest;
use App\Http\Requests\UpdateBoothRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

/**
 * Controller Web para Guichês (Booths)
 */
class BoothController extends Controller
{
    public function __construct(
        private readonly BoothService $boothService
    ) {}

    public function index(): View
    {
        $booths = $this->boothService->all();
        return view('booths.index', compact('booths'));
    }

    public function create(): View
    {
        $events = Event::all();
        return view('booths.create', compact('events'));
    }

    public function store(StoreBoothRequest $request): RedirectResponse
    {
        $this->boothService->create($request->validated());
        return redirect()->route('booths.index')
            ->with('success', __('messages.booth_created'));
    }

    public function show(Booth $booth): View
    {
        return view('booths.show', compact('booth'));
    }

    public function edit(Booth $booth): View
    {
        $events = Event::all();
        return view('booths.edit', compact('booth','events'));
    }

    public function update(UpdateBoothRequest $request, Booth $booth): RedirectResponse
    {
        $this->boothService->update($booth, $request->validated());
        return redirect()->route('booths.index')
            ->with('success', __('messages.booth_updated'));
    }

    public function destroy(Booth $booth): RedirectResponse
    {
        $this->boothService->delete($booth);
        return redirect()->route('booths.index')
            ->with('success', __('messages.booth_deleted'));
    }
}
