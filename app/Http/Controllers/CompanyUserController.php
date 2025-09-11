<?php

namespace App\Http\Controllers;

use App\Models\CompanyUser;
use App\Models\Company;
use App\Http\Requests\StoreCompanyUserRequest;
use App\Http\Requests\UpdateCompanyUserRequest;
use App\Services\CompanyUserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

/**
 * Controller Web para Usuários de Empresa (Colaboradores)
 */
class CompanyUserController extends Controller
{
    public function __construct(
        private readonly CompanyUserService $companyUserService
    ) {}

    public function index(): View
    {
        $users = $this->companyUserService->all();
        return view('company_users.index', compact('users'));
    }

    public function create(): View
    {
        $companies = Company::all();
        return view('company_users.create', compact('companies'));
    }

    public function store(StoreCompanyUserRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['password'] = bcrypt($data['password']);
        $this->companyUserService->create($data);
        return redirect()->route('company-users.index')
            ->with('success', __('messages.company_user_created'));
    }

    public function edit(CompanyUser $companyUser): View
    {
        $companies = Company::all();
        return view('company_users.edit', compact('companyUser','companies'));
    }

    public function update(UpdateCompanyUserRequest $request, CompanyUser $companyUser): RedirectResponse
    {
        $data = $request->validated();
        if (!empty($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }
        $this->companyUserService->update($companyUser, $data);
        return redirect()->route('company-users.index')
            ->with('success', __('messages.company_user_updated'));
    }

    public function destroy(CompanyUser $companyUser): RedirectResponse
    {
        $this->companyUserService->delete($companyUser);
        return redirect()->route('company-users.index')
            ->with('success', __('messages.company_user_deleted'));
    }
}
