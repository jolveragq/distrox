<?php

namespace App\Application\UseCases;

use App\Domain\Repositories\CompanyRepositoryInterface;

use Illuminate\Database\Eloquent\ModelNotFoundException;

class GetCompanyUseCase
{
    public function __construct(private CompanyRepositoryInterface $repo) {}

    /**
     * Obtiene una empresa por su ID.
     *
     * @param  int  $id
     * @return object
     *
     * @throws ModelNotFoundException
     */
    public function execute(int $id): object
    {
        return $this->repo->findById($id);
    }
}
