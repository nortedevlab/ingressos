<?php

namespace App\Services;

use App\Models\Ticket;
use Illuminate\Database\Eloquent\Collection;

/**
 * Serviço para Tipos de Ingressos
 */
class TicketService
{
    /**
     * Lista ingressos
     *
     * @return Collection<int, Ticket>
     */
    public function all(): Collection
    {
        return Ticket::with('event')->get();
    }

    public function create(array $data): Ticket
    {
        return Ticket::create($data);
    }

    public function update(Ticket $ticket, array $data): Ticket
    {
        $ticket->update($data);
        return $ticket;
    }

    public function delete(Ticket $ticket): ?bool
    {
        return $ticket->delete();
    }
}
