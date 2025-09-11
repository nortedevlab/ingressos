<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Services\EventService;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use Illuminate\Http\JsonResponse;

/**
 * API Controller para Eventos
 */
class EventApiController extends Controller
{
    public function __construct(
        private readonly EventService $eventService
    ) {}

    public function index(): JsonResponse
    {
        return response()->json([
            'message' => __('messages.event_listed'),
            'data'    => $this->eventService->all()
        ]);
    }

    public function store(StoreEventRequest $request): JsonResponse
    {
        $event = $this->eventService->create($request->validated());
        return response()->json([
            'message' => __('messages.event_created'),
            'data'    => $event
        ], 201);
    }

    public function show(Event $event): JsonResponse
    {
        return response()->json([
            'message' => __('messages.event_fetched'),
            'data'    => $event
        ]);
    }

    public function update(UpdateEventRequest $request, Event $event): JsonResponse
    {
        $updated = $this->eventService->update($event, $request->validated());
        return response()->json([
            'message' => __('messages.event_updated'),
            'data'    => $updated
        ]);
    }

    public function destroy(Event $event): JsonResponse
    {
        $this->eventService->delete($event);
        return response()->json([
            'message' => __('messages.event_deleted'),
        ], 204);
    }
}
