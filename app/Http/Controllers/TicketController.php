<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Event;
use App\Services\TicketService;
use App\Http\Requests\StoreTicketRequest;
use App\Http\Requests\UpdateTicketRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

/**
 * Controller Web para Ingressos
 */
class TicketController extends Controller
{
    public function __construct(
        private readonly TicketService $ticketService
    ) {}

    public function index(): View
    {
        $tickets = $this->ticketService->all();
        return view('tickets.index', compact('tickets'));
    }

    public function create(): View
    {
        $events = Event::all();
        return view('tickets.create', compact('events'));
    }

    public function store(StoreTicketRequest $request): RedirectResponse
    {
        $this->ticketService->create($request->validated());
        return redirect()->route('tickets.index')
            ->with('success', __('messages.ticket_created'));
    }

    public function show(Ticket $ticket): View
    {
        return view('tickets.show', compact('ticket'));
    }

    public function edit(Ticket $ticket): View
    {
        $events = Event::all();
        return view('tickets.edit', compact('ticket','events'));
    }

    public function update(UpdateTicketRequest $request, Ticket $ticket): RedirectResponse
    {
        $this->ticketService->update($ticket, $request->validated());
        return redirect()->route('tickets.index')
            ->with('success', __('messages.ticket_updated'));
    }

    public function destroy(Ticket $ticket): RedirectResponse
    {
        $this->ticketService->delete($ticket);
        return redirect()->route('tickets.index')
            ->with('success', __('messages.ticket_deleted'));
    }
}
