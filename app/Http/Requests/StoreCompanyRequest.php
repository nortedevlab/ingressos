<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Request para criação de Empresa
 */
class StoreCompanyRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'     => 'required|string|max:255',
            'document' => 'nullable|string|max:20|unique:companies,document',
            'email'    => 'nullable|email|max:255',
            'phone'    => 'nullable|string|max:20',
        ];
    }
}
