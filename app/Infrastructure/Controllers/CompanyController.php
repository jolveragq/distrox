<?php

namespace App\Infrastructure\Controllers;

use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Application\UseCases\CreateCompanyUseCase;
use App\Application\UseCases\ListCompaniesUseCase;
use App\Application\UseCases\GetCompanyUseCase;
use App\Application\UseCases\UpdateCompanyUseCase;
use App\Application\UseCases\DeleteCompanyUseCase;
use App\Infrastructure\Response\DistroxResponse;
use Illuminate\Http\JsonResponse;

class CompanyController extends Controller
{
    public function __construct(
        private ListCompaniesUseCase  $listCompanies,
        private CreateCompanyUseCase  $createCompany,
        private GetCompanyUseCase     $getCompany,
        private UpdateCompanyUseCase  $updateCompany,
        private DeleteCompanyUseCase  $deleteCompany,
    ) {}

    public function index(): JsonResponse
    {
        $companies = $this->listCompanies->execute();
        return DistroxResponse::success($companies);
    }

    public function store(StoreCompanyRequest $request): JsonResponse
    {
        $company = $this->createCompany->execute($request->validated());
        return DistroxResponse::success($company);
    }

    public function show(int $id): JsonResponse
    {
        $company = $this->getCompany->execute($id);
        return DistroxResponse::success($company);
    }

    public function update(UpdateCompanyRequest $request, int $id): JsonResponse
    {
        $company = $this->updateCompany->execute($id, $request->validated());
        return DistroxResponse::success($company);
    }

    public function destroy(int $id): JsonResponse
    {
        $this->deleteCompany->execute($id);
        return DistroxResponse::success();
    }
}
