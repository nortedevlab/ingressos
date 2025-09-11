<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Request para atualização de Cliente
 */
class UpdateClientRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255|unique:clients,email,' . $this->client->id,
            'document' => 'nullable|string|max:20|unique:clients,document,' . $this->client->id,
            'phone' => 'nullable|string|max:20',
        ];
    }
}
