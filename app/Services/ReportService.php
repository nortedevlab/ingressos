<?php

namespace App\Services;

use App\Models\Order;
use Illuminate\Support\Collection;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;

/**
 * Service para geração de relatórios
 */
class ReportService
{
    /**
     * Retorna os dados do relatório de pedidos/vendas com filtros aplicados.
     *
     * @param array $filters
     * @return Collection
     */
    public function generate(array $filters): Collection
    {
        $query = Order::with(['client','event','payments']);

        if (!empty($filters['event_id'])) {
            $query->where('event_id', $filters['event_id']);
        }

        if (!empty($filters['from_date'])) {
            $query->whereDate('created_at', '>=', Carbon::parse($filters['from_date']));
        }

        if (!empty($filters['to_date'])) {
            $query->whereDate('created_at', '<=', Carbon::parse($filters['to_date']));
        }

        if (!empty($filters['status'])) {
            $query->whereHas('payments', function ($q) use ($filters) {
                $q->where('status', $filters['status']);
            });
        }

        return $query->get();
    }

    /**
     * Exporta relatório em CSV.
     */
    public function exportCsv(Collection $data): string
    {
        $filename = storage_path('app/reports/report_' . time() . '.csv');
        $handle = fopen($filename, 'w+');

        fputcsv($handle, ['ID Pedido', 'Cliente', 'Evento', 'Valor', 'Status', 'Data']);

        foreach ($data as $order) {
            fputcsv($handle, [
                $order->id,
                $order->client->name ?? '-',
                $order->event->title,
                number_format($order->total, 2, ',', '.'),
                $order->payments->first()->status ?? 'N/A',
                $order->created_at->format('d/m/Y H:i')
            ]);
        }

        fclose($handle);
        return $filename;
    }

    /**
     * Exporta relatório em PDF.
     */
    public function exportPdf(Collection $data): string
    {
        $pdf = Pdf::loadView('reports.pdf', compact('data'));
        $filename = storage_path('app/reports/report_' . time() . '.pdf');
        $pdf->save($filename);
        return $filename;
    }
}
