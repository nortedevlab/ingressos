<?php

namespace App\Http\Controllers;

use App\Models\ServiceFee;
use App\Models\Company;
use App\Models\Event;
use App\Models\Batch;
use App\Services\ServiceFeeService;
use App\Http\Requests\StoreServiceFeeRequest;
use App\Http\Requests\UpdateServiceFeeRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

/**
 * Controller Web para Taxas de Serviço
 */
class ServiceFeeController extends Controller
{
    public function __construct(
        private readonly ServiceFeeService $feeService
    ) {}

    public function index(): View
    {
        $fees = $this->feeService->all();
        return view('service_fees.index', compact('fees'));
    }

    public function create(): View
    {
        $companies = Company::all();
        $events    = Event::all();
        $batches   = Batch::all();
        return view('service_fees.create', compact('companies','events','batches'));
    }

    public function store(StoreServiceFeeRequest $request): RedirectResponse
    {
        $this->feeService->create($request->validated());
        return redirect()->route('service-fees.index')
            ->with('success', __('messages.fee_created'));
    }

    public function show(ServiceFee $serviceFee): View
    {
        return view('service_fees.show', compact('serviceFee'));
    }

    public function edit(ServiceFee $serviceFee): View
    {
        $companies = Company::all();
        $events    = Event::all();
        $batches   = Batch::all();
        return view('service_fees.edit', compact('serviceFee','companies','events','batches'));
    }

    public function update(UpdateServiceFeeRequest $request, ServiceFee $serviceFee): RedirectResponse
    {
        $this->feeService->update($serviceFee, $request->validated());
        return redirect()->route('service-fees.index')
            ->with('success', __('messages.fee_updated'));
    }

    public function destroy(ServiceFee $serviceFee): RedirectResponse
    {
        $this->feeService->delete($serviceFee);
        return redirect()->route('service-fees.index')
            ->with('success', __('messages.fee_deleted'));
    }
}
