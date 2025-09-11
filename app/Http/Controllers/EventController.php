<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Services\EventService;
use App\Http\Requests\StoreEventRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

/**
 * Controller Web para Eventos (Blade)
 */
class EventController extends Controller
{
    public function __construct(
        private readonly EventService $eventService
    ) {}

    public function index(): View
    {
        $events = $this->eventService->all();
        return view('events.index', compact('events'));
    }

    public function create(): View
    {
        return view('events.create');
    }

    public function store(StoreEventRequest $request): RedirectResponse
    {
        $this->eventService->create($request->validated());
        return redirect()->route('events.index')
            ->with('success', __('messages.event_created'));
    }

    public function show(Event $event): View
    {
        return view('events.show', compact('event'));
    }

    public function edit(Event $event): View
    {
        return view('events.edit', compact('event'));
    }

    public function update(StoreEventRequest $request, Event $event): RedirectResponse
    {
        $this->eventService->update($event, $request->validated());
        return redirect()->route('events.index')
            ->with('success', __('messages.event_updated'));
    }

    public function destroy(Event $event): RedirectResponse
    {
        $this->eventService->delete($event);
        return redirect()->route('events.index')
            ->with('success', __('messages.event_deleted'));
    }
}
