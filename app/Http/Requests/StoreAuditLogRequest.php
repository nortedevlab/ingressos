<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Request para registro manual de Log de Auditoria
 * (geralmente será usado pelo sistema e não por usuários)
 */
class StoreAuditLogRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'user_type' => 'required|string|in:admin,company,client',
            'user_id'   => 'nullable|integer',
            'action'    => 'required|string|max:255',
            'ip'        => 'nullable|ip',
            'data'      => 'nullable|array',
        ];
    }
}
