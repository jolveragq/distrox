<?php

namespace App\Application\UseCases;

use App\Domain\Repositories\CompanyRepositoryInterface;

class ListCompaniesUseCase
{
    public function __construct(private CompanyRepositoryInterface $repo) {}

    /**
     * Devuelve todas las empresas del sistema.
     *
     * @return array
     */
    public function execute(): array
    {
        return $this->repo->all();
    }
}
