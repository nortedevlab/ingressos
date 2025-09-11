<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AccessLog;
use App\Models\Pda;
use App\Models\Ticket;
use App\Services\PdaService;
use App\Http\Requests\StorePdaRequest;
use App\Http\Requests\UpdatePdaRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * API Controller para PDAs
 */
class PdaApiController extends Controller
{
    public function __construct(
        private readonly PdaService $pdaService
    ) {}

    public function index(): JsonResponse
    {
        return response()->json([
            'message' => __('messages.pda_listed'),
            'data'    => $this->pdaService->all()
        ]);
    }

    public function store(StorePdaRequest $request): JsonResponse
    {
        $pda = $this->pdaService->create($request->validated());
        return response()->json([
            'message' => __('messages.pda_created'),
            'data'    => $pda
        ], 201);
    }

    public function show(Pda $pda): JsonResponse
    {
        return response()->json([
            'message' => __('messages.pda_fetched'),
            'data'    => $pda
        ]);
    }

    public function update(UpdatePdaRequest $request, Pda $pda): JsonResponse
    {
        $updated = $this->pdaService->update($pda, $request->validated());
        return response()->json([
            'message' => __('messages.pda_updated'),
            'data'    => $updated
        ]);
    }

    public function destroy(Pda $pda): JsonResponse
    {
        $this->pdaService->delete($pda);
        return response()->json([
            'message' => __('messages.pda_deleted'),
        ], 204);
    }

    /**
     * Valida e registra o uso de um ingresso no PDA.
     *
     * @param Request $request
     * @param Pda $pda
     * @return JsonResponse
     */
    public function scanTicket(Request $request, Pda $pda): JsonResponse
    {
        $request->validate([
            'ticket_id' => 'required|exists:tickets,id',
        ]);

        $ticket = Ticket::findOrFail($request->ticket_id);

        // verifica se ingresso já foi usado
        $alreadyUsed = AccessLog::where('ticket_id', $ticket->id)
            ->where('status', 'allowed')
            ->exists();

        if ($alreadyUsed) {
            $log = AccessLog::create([
                'pda_id'    => $pda->id,
                'ticket_id' => $ticket->id,
                'status'    => 'denied',
                'message'   => __('messages.ticket_already_used'),
            ]);

            return response()->json([
                'status'  => 'denied',
                'message' => __('messages.ticket_already_used'),
                'log'     => $log,
            ], 200);
        }

        // registra como permitido
        $log = AccessLog::create([
            'pda_id'    => $pda->id,
            'ticket_id' => $ticket->id,
            'status'    => 'allowed',
            'message'   => __('messages.ticket_validated'),
        ]);

        return response()->json([
            'status'  => 'allowed',
            'message' => __('messages.ticket_validated'),
            'log'     => $log,
        ], 200);
    }
}
