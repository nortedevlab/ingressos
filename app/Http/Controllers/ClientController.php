<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Services\ClientService;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

/**
 * Controller Web para Clientes (consumidores)
 */
class ClientController extends Controller
{
    public function __construct(
        private readonly ClientService $clientService
    )
    {
    }

    public function index(): View
    {
        $clients = $this->clientService->all();
        return view('clients.index', compact('clients'));
    }

    public function create(): View
    {
        return view('clients.create');
    }

    public function store(StoreClientRequest $request): RedirectResponse
    {
        $this->clientService->create($request->validated());
        return redirect()->route('clients.index')
            ->with('success', __('messages.client_created'));
    }

    public function show(Client $client): View
    {
        return view('clients.show', compact('client'));
    }

    public function edit(Client $client): View
    {
        return view('clients.edit', compact('client'));
    }

    public function update(UpdateClientRequest $request, Client $client): RedirectResponse
    {
        $this->clientService->update($client, $request->validated());
        return redirect()->route('clients.index')
            ->with('success', __('messages.client_updated'));
    }

    public function destroy(Client $client): RedirectResponse
    {
        $this->clientService->delete($client);
        return redirect()->route('clients.index')
            ->with('success', __('messages.client_deleted'));
    }
}
