<?php

namespace App\Services;

use App\Models\Client;
use Illuminate\Database\Eloquent\Collection;

/**
 * Serviço para Clientes (consumidores)
 */
class ClientService
{
    /**
     * Lista todos os clientes
     *
     * @return Collection<int, Client>
     */
    public function all(): Collection
    {
        return Client::with('orders')->get();
    }

    /**
     * Cria cliente
     *
     * @param array $data
     * @return Client
     */
    public function create(array $data): Client
    {
        return Client::create($data);
    }

    /**
     * Atualiza cliente
     *
     * @param Client $client
     * @param array $data
     * @return Client
     */
    public function update(Client $client, array $data): Client
    {
        $client->update($data);
        return $client;
    }

    /**
     * Remove cliente
     *
     * @param Client $client
     * @return bool|null
     */
    public function delete(Client $client): ?bool
    {
        return $client->delete();
    }
}
