<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Client;
use App\Models\Event;
use App\Services\OrderService;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

/**
 * Controller Web para Pedidos
 */
class OrderController extends Controller
{
    public function __construct(
        private readonly OrderService $orderService
    ) {}

    public function index(): View
    {
        $orders = $this->orderService->all();
        return view('orders.index', compact('orders'));
    }

    public function create(): View
    {
        $clients = Client::all();
        $events  = Event::all();
        return view('orders.create', compact('clients','events'));
    }

    public function store(StoreOrderRequest $request): RedirectResponse
    {
        $this->orderService->create($request->validated());
        return redirect()->route('orders.index')
            ->with('success', __('messages.order_created'));
    }

    public function show(Order $order): View
    {
        return view('orders.show', compact('order'));
    }

    public function edit(Order $order): View
    {
        $clients = Client::all();
        $events  = Event::all();
        return view('orders.edit', compact('order','clients','events'));
    }

    public function update(UpdateOrderRequest $request, Order $order): RedirectResponse
    {
        $this->orderService->update($order, $request->validated());
        return redirect()->route('orders.index')
            ->with('success', __('messages.order_updated'));
    }

    public function destroy(Order $order): RedirectResponse
    {
        $this->orderService->delete($order);
        return redirect()->route('orders.index')
            ->with('success', __('messages.order_deleted'));
    }
}
