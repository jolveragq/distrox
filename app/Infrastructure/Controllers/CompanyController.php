<?php

namespace App\Infrastructure\Controllers;

use App\Application\UseCases\{
    CreateCompanyUseCase,
    ListCompaniesUseCase,
    GetCompanyUseCase,
    UpdateCompanyUseCase,
    DeleteCompanyUseCase
};
use App\Infrastructure\Requests\{StoreCompanyRequest, UpdateCompanyRequest};
use App\Infrastructure\Response\DistroxResponse;

class CompanyController extends Controller
{
    public function __construct(
        private ListCompaniesUseCase  $listCompanies,
        private CreateCompanyUseCase  $createCompany,
        private GetCompanyUseCase     $getCompany,
        private UpdateCompanyUseCase  $updateCompany,
        private DeleteCompanyUseCase  $deleteCompany,
    ) {}

    public function index()
    {
        $companies = $this->listCompanies->execute();
        return DistroxResponse::success($companies);
    }

    public function store(StoreCompanyRequest $request)
    {
        $company = $this->createCompany->execute($request->validated());
        return DistroxResponse::success($company);
    }

    public function show(int $id)
    {
        $company = $this->getCompany->execute($id);
        return DistroxResponse::success($company);
    }

    public function update(UpdateCompanyRequest $request, int $id)
    {
        $company = $this->updateCompany->execute($id, $request->validated());
        return DistroxResponse::success($company);
    }

    public function destroy(int $id)
    {
        $this->deleteCompany->execute($id);
        return DistroxResponse::success();
    }
}
