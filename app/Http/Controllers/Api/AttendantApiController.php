<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Attendant;
use App\Services\AttendantService;
use App\Http\Requests\StoreAttendantRequest;
use App\Http\Requests\UpdateAttendantRequest;
use Illuminate\Http\JsonResponse;

/**
 * API Controller para Atendentes
 */
class AttendantApiController extends Controller
{
    public function __construct(
        private readonly AttendantService $attendantService
    ) {}

    public function index(): JsonResponse
    {
        return response()->json([
            'message' => __('messages.attendant_listed'),
            'data'    => $this->attendantService->all()
        ]);
    }

    public function store(StoreAttendantRequest $request): JsonResponse
    {
        $data = $request->validated();
        $data['password'] = bcrypt($data['password']);
        $attendant = $this->attendantService->create($data);
        return response()->json([
            'message' => __('messages.attendant_created'),
            'data'    => $attendant
        ], 201);
    }

    public function show(Attendant $attendant): JsonResponse
    {
        return response()->json([
            'message' => __('messages.attendant_fetched'),
            'data'    => $attendant
        ]);
    }

    public function update(UpdateAttendantRequest $request, Attendant $attendant): JsonResponse
    {
        $data = $request->validated();
        if (!empty($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }
        $updated = $this->attendantService->update($attendant, $data);
        return response()->json([
            'message' => __('messages.attendant_updated'),
            'data'    => $updated
        ]);
    }

    public function destroy(Attendant $attendant): JsonResponse
    {
        $this->attendantService->delete($attendant);
        return response()->json([
            'message' => __('messages.attendant_deleted'),
        ], 204);
    }
}
