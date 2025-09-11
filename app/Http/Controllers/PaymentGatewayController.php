<?php

namespace App\Http\Controllers;

use App\Models\PaymentGateway;
use App\Models\Company;
use App\Services\PaymentGatewayService;
use App\Http\Requests\StorePaymentGatewayRequest;
use App\Http\Requests\UpdatePaymentGatewayRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

/**
 * Controller Web para Gateways de Pagamento
 */
class PaymentGatewayController extends Controller
{
    public function __construct(
        private readonly PaymentGatewayService $gatewayService
    ) {}

    public function index(): View
    {
        $gateways = $this->gatewayService->all();
        return view('payment_gateways.index', compact('gateways'));
    }

    public function create(): View
    {
        $companies = Company::all();
        return view('payment_gateways.create', compact('companies'));
    }

    public function store(StorePaymentGatewayRequest $request): RedirectResponse
    {
        $this->gatewayService->create($request->validated());
        return redirect()->route('payment-gateways.index')
            ->with('success', __('messages.gateway_created'));
    }

    public function show(PaymentGateway $paymentGateway): View
    {
        return view('payment_gateways.show', compact('paymentGateway'));
    }

    public function edit(PaymentGateway $paymentGateway): View
    {
        $companies = Company::all();
        return view('payment_gateways.edit', compact('paymentGateway','companies'));
    }

    public function update(UpdatePaymentGatewayRequest $request, PaymentGateway $paymentGateway): RedirectResponse
    {
        $this->gatewayService->update($paymentGateway, $request->validated());
        return redirect()->route('payment-gateways.index')
            ->with('success', __('messages.gateway_updated'));
    }

    public function destroy(PaymentGateway $paymentGateway): RedirectResponse
    {
        $this->gatewayService->delete($paymentGateway);
        return redirect()->route('payment-gateways.index')
            ->with('success', __('messages.gateway_deleted'));
    }
}
