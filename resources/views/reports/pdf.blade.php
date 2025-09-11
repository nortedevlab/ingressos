<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>{{ __('reports.title') }}</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 5px; text-align: left; }
    </style>
</head>
<body>
<h1>{{ __('reports.title') }}</h1>
<table>
    <thead>
    <tr>
        <th>{{ __('reports.order_id') }}</th>
        <th>{{ __('reports.client') }}</th>
        <th>{{ __('reports.event') }}</th>
        <th>{{ __('reports.total') }}</th>
        <th>{{ __('reports.status') }}</th>
        <th>{{ __('reports.date') }}</th>
    </tr>
    </thead>
    <tbody>
    @foreach($data as $order)
        <tr>
            <td>#{{ $order->id }}</td>
            <td>{{ $order->client->name ?? '-' }}</td>
            <td>{{ $order->event->title }}</td>
            <td>R$ {{ number_format($order->total, 2, ',', '.') }}</td>
            <td>{{ $order->payments->first()->status ?? 'N/A' }}</td>
            <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
