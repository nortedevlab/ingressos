<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Order;
use App\Services\PaymentService;
use App\Http\Requests\StorePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

/**
 * Controller Web para Pagamentos
 */
class PaymentController extends Controller
{
    public function __construct(
        private readonly PaymentService $paymentService
    ) {}

    public function index(): View
    {
        $payments = $this->paymentService->all();
        return view('payments.index', compact('payments'));
    }

    public function create(): View
    {
        $orders = Order::all();
        return view('payments.create', compact('orders'));
    }

    public function store(StorePaymentRequest $request): RedirectResponse
    {
        $this->paymentService->create($request->validated());
        return redirect()->route('payments.index')
            ->with('success', __('messages.payment_created'));
    }

    public function show(Payment $payment): View
    {
        return view('payments.show', compact('payment'));
    }

    public function edit(Payment $payment): View
    {
        $orders = Order::all();
        return view('payments.edit', compact('payment','orders'));
    }

    public function update(UpdatePaymentRequest $request, Payment $payment): RedirectResponse
    {
        $this->paymentService->update($payment, $request->validated());
        return redirect()->route('payments.index')
            ->with('success', __('messages.payment_updated'));
    }

    public function destroy(Payment $payment): RedirectResponse
    {
        $this->paymentService->delete($payment);
        return redirect()->route('payments.index')
            ->with('success', __('messages.payment_deleted'));
    }
}
