<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Services\TicketService;
use App\Http\Requests\StoreTicketRequest;
use App\Http\Requests\UpdateTicketRequest;
use Illuminate\Http\JsonResponse;

/**
 * API Controller para Ingressos
 */
class TicketApiController extends Controller
{
    public function __construct(
        private readonly TicketService $ticketService
    )
    {
    }

    public function index(): JsonResponse
    {
        return response()->json([
            'message' => __('messages.ticket_listed'),
            'data' => $this->ticketService->all()
        ]);
    }

    public function store(StoreTicketRequest $request): JsonResponse
    {
        $ticket = $this->ticketService->create($request->validated());
        return response()->json([
            'message' => __('messages.ticket_created'),
            'data' => $ticket
        ], 201);
    }

    public function show(Ticket $ticket): JsonResponse
    {
        return response()->json([
            'message' => __('messages.ticket_fetched'),
            'data' => $ticket
        ]);
    }

    public function update(UpdateTicketRequest $request, Ticket $ticket): JsonResponse
    {
        $updated = $this->ticketService->update($ticket, $request->validated());
        return response()->json([
            'message' => __('messages.ticket_updated'),
            'data' => $updated
        ]);
    }

    public function destroy(Ticket $ticket): JsonResponse
    {
        $this->ticketService->delete($ticket);
        return response()->json([
            'message' => __('messages.ticket_deleted'),
        ], 204);
    }
}
