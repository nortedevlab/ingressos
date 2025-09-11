<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Request para criação de Usuário de Empresa
 */
class StoreCompanyUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'company_id' => 'required|exists:companies,id',
            'name'       => 'required|string|max:255',
            'email'      => 'required|email|max:255|unique:company_users,email',
            'password'   => 'required|string|min:6|confirmed',
        ];
    }
}
