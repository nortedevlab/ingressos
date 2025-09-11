<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Services\CompanyService;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

/**
 * Controller Web para Empresas
 */
class CompanyController extends Controller
{
    public function __construct(
        private readonly CompanyService $companyService
    )
    {
    }

    public function index(): View
    {
        $companies = $this->companyService->all();
        return view('companies.index', compact('companies'));
    }

    public function create(): View
    {
        return view('companies.create');
    }

    public function store(StoreCompanyRequest $request): RedirectResponse
    {
        $this->companyService->create($request->validated());
        return redirect()->route('companies.index')
            ->with('success', __('messages.company_created'));
    }

    public function show(Company $company): View
    {
        return view('companies.show', compact('company'));
    }

    public function edit(Company $company): View
    {
        return view('companies.edit', compact('company'));
    }

    public function update(UpdateCompanyRequest $request, Company $company): RedirectResponse
    {
        $this->companyService->update($company, $request->validated());
        return redirect()->route('companies.index')
            ->with('success', __('messages.company_updated'));
    }

    public function destroy(Company $company): RedirectResponse
    {
        $this->companyService->delete($company);
        return redirect()->route('companies.index')
            ->with('success', __('messages.company_deleted'));
    }
}
