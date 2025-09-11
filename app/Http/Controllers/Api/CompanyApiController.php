<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Services\CompanyService;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use Illuminate\Http\JsonResponse;

/**
 * API Controller para Empresas
 */
class CompanyApiController extends Controller
{
    public function __construct(
        private readonly CompanyService $companyService
    ) {}

    public function index(): JsonResponse
    {
        return response()->json([
            'message' => __('messages.company_listed'),
            'data'    => $this->companyService->all()
        ]);
    }

    public function store(StoreCompanyRequest $request): JsonResponse
    {
        $company = $this->companyService->create($request->validated());
        return response()->json([
            'message' => __('messages.company_created'),
            'data'    => $company
        ], 201);
    }

    public function show(Company $company): JsonResponse
    {
        return response()->json([
            'message' => __('messages.company_fetched'),
            'data'    => $company
        ]);
    }

    public function update(UpdateCompanyRequest $request, Company $company): JsonResponse
    {
        $updated = $this->companyService->update($company, $request->validated());
        return response()->json([
            'message' => __('messages.company_updated'),
            'data'    => $updated
        ]);
    }

    public function destroy(Company $company): JsonResponse
    {
        $this->companyService->delete($company);
        return response()->json([
            'message' => __('messages.company_deleted'),
        ], 204);
    }
}
