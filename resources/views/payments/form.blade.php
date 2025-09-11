@csrf
<div class="mb-3">
    <label class="form-label">@lang('payments.order')</label>
    <select name="order_id" class="form-select" required>
        <option value="">@lang('payments.select_order')</option>
        @foreach($orders as $order)
            <option value="{{ $order->id }}" @selected(old('order_id', $payment->order_id ?? '') == $order->id)>
                #{{ $order->id }} - {{ $order->event->title }}
            </option>
        @endforeach
    </select>
</div>
<div class="mb-3">
    <label class="form-label">@lang('payments.method')</label>
    <select name="method" class="form-select" required>
        <option value="">@lang('payments.select_method')</option>
        @foreach(['credit_card','pix','boleto','cash','courtesy'] as $method)
            <option value="{{ $method }}" @selected(old('method', $payment->method ?? '') == $method)>
                {{ __("payments.methods.$method") }}
            </option>
        @endforeach
    </select>
</div>
<div class="mb-3">
    <label class="form-label">@lang('payments.amount')</label>
    <input type="number" step="0.01" name="amount" class="form-control" value="{{ old('amount', $payment->amount ?? '') }}" required>
</div>
<div class="mb-3">
    <label class="form-label">@lang('payments.transaction_id')</label>
    <input type="text" name="transaction_id" class="form-control" value="{{ old('transaction_id', $payment->transaction_id ?? '') }}">
</div>
<button type="submit" class="btn btn-primary btn-submit">
    <span class="spinner-border spinner-border-sm d-none"></span>
    @lang('actions.save')
</button>
