<?php

namespace App\Http\Controllers;

use App\Models\Attendant;
use App\Models\Booth;
use App\Services\AttendantService;
use App\Http\Requests\StoreAttendantRequest;
use App\Http\Requests\UpdateAttendantRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

/**
 * Controller Web para Atendentes
 */
class AttendantController extends Controller
{
    public function __construct(
        private readonly AttendantService $attendantService
    ) {}

    public function index(): View
    {
        $attendants = $this->attendantService->all();
        return view('attendants.index', compact('attendants'));
    }

    public function create(): View
    {
        $booths = Booth::all();
        return view('attendants.create', compact('booths'));
    }

    public function store(StoreAttendantRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['password'] = bcrypt($data['password']);
        $this->attendantService->create($data);
        return redirect()->route('attendants.index')
            ->with('success', __('messages.attendant_created'));
    }

    public function show(Attendant $attendant): View
    {
        return view('attendants.show', compact('attendant'));
    }

    public function edit(Attendant $attendant): View
    {
        $booths = Booth::all();
        return view('attendants.edit', compact('attendant','booths'));
    }

    public function update(UpdateAttendantRequest $request, Attendant $attendant): RedirectResponse
    {
        $data = $request->validated();
        if (!empty($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }
        $this->attendantService->update($attendant, $data);
        return redirect()->route('attendants.index')
            ->with('success', __('messages.attendant_updated'));
    }

    public function destroy(Attendant $attendant): RedirectResponse
    {
        $this->attendantService->delete($attendant);
        return redirect()->route('attendants.index')
            ->with('success', __('messages.attendant_deleted'));
    }
}
