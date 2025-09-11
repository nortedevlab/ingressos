<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Request para geração de relatórios
 */
class ReportRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // acesso será controlado via middleware/roles
    }

    public function rules(): array
    {
        return [
            'event_id'  => 'nullable|exists:events,id',
            'from_date' => 'nullable|date',
            'to_date'   => 'nullable|date|after_or_equal:from_date',
            'status'    => 'nullable|string|in:paid,pending,canceled,refunded',
            'format'    => 'nullable|string|in:html,csv,pdf',
        ];
    }
}
