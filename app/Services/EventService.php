<?php

namespace App\Services;

use App\Models\Event;
use Illuminate\Database\Eloquent\Collection;

/**
 * Serviço para gerenciamento de eventos
 */
class EventService
{
    /**
     * Lista todos os eventos
     *
     * @return Collection<int, Event>
     */
    public function all(): Collection
    {
        return Event::with('company')->get();
    }

    /**
     * Cria um novo evento
     *
     * @param array $data
     * @return Event
     */
    public function create(array $data): Event
    {
        return Event::create($data);
    }

    /**
     * Atualiza um evento existente
     *
     * @param Event $event
     * @param array $data
     * @return Event
     */
    public function update(Event $event, array $data): Event
    {
        $event->update($data);
        return $event;
    }

    /**
     * Remove um evento
     *
     * @param Event $event
     * @return bool|null
     */
    public function delete(Event $event): ?bool
    {
        return $event->delete();
    }
}
