<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Request para criação de Cliente
 */
class StoreClientRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'     => 'required|string|max:255',
            'email'    => 'nullable|email|max:255|unique:clients,email',
            'document' => 'nullable|string|max:20|unique:clients,document',
            'phone'    => 'nullable|string|max:20',
        ];
    }
}
