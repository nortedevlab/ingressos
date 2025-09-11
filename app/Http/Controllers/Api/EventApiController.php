<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Services\EventService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * API Controller para Eventos
 */
class EventApiController extends Controller
{
    public function __construct(
        private readonly EventService $eventService
    )
    {
    }

    /**
     * Lista eventos
     */
    public function index(): JsonResponse
    {
        $events = $this->eventService->all();
        return response()->json([
            'message' => __('messages.event_listed'),
            'data' => $events
        ]);
    }

    /**
     * Cria evento
     */
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'company_id' => 'required|exists:companies,id',
            'title' => 'required|string|max:255',
            'type' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'location' => 'required|string|max:255',
        ]);

        $event = $this->eventService->create($validated);

        return response()->json([
            'message' => __('messages.event_created'),
            'data' => $event
        ], 201);
    }

    /**
     * Exibe evento
     */
    public function show(Event $event): JsonResponse
    {
        return response()->json([
            'message' => __('messages.event_fetched'),
            'data' => $event
        ]);
    }

    /**
     * Atualiza evento
     */
    public function update(Request $request, Event $event): JsonResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'location' => 'required|string|max:255',
        ]);

        $updated = $this->eventService->update($event, $validated);

        return response()->json([
            'message' => __('messages.event_updated'),
            'data' => $updated
        ]);
    }

    /**
     * Remove evento
     */
    public function destroy(Event $event): JsonResponse
    {
        $this->eventService->delete($event);

        return response()->json([
            'message' => __('messages.event_deleted'),
        ], 204);
    }
}
