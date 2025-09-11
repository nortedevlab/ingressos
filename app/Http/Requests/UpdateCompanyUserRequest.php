<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Request para atualização de Usuário de Empresa
 */
class UpdateCompanyUserRequest extends FormRequest
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
            'email'      => 'required|email|max:255|unique:company_users,email,' . $this->company_user->id,
            'password'   => 'nullable|string|min:6|confirmed',
        ];
    }
}
