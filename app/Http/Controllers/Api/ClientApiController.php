<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Services\ClientService;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use Illuminate\Http\JsonResponse;

/**
 * API Controller para Clientes
 */
class ClientApiController extends Controller
{
    public function __construct(
        private readonly ClientService $clientService
    ) {}

    public function index(): JsonResponse
    {
        return response()->json([
            'message' => __('messages.client_listed'),
            'data'    => $this->clientService->all()
        ]);
    }

    public function store(StoreClientRequest $request): JsonResponse
    {
        $client = $this->clientService->create($request->validated());
        return response()->json([
            'message' => __('messages.client_created'),
            'data'    => $client
        ], 201);
    }

    public function show(Client $client): JsonResponse
    {
        return response()->json([
            'message' => __('messages.client_fetched'),
            'data'    => $client
        ]);
    }

    public function update(UpdateClientRequest $request, Client $client): JsonResponse
    {
        $updated = $this->clientService->update($client, $request->validated());
        return response()->json([
            'message' => __('messages.client_updated'),
            'data'    => $updated
        ]);
    }

    public function destroy(Client $client): JsonResponse
    {
        $this->clientService->delete($client);
        return response()->json([
            'message' => __('messages.client_deleted'),
        ], 204);
    }
}
