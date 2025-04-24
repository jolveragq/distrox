<?php

namespace App\Application\UseCases\Company;

use App\Domain\Repositories\CompanyRepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class DeleteCompanyUseCase
{
    public function __construct(private CompanyRepositoryInterface $repo) {}

    /**
     * Elimina una empresa por su ID.
     *
     * @param  int  $id
     * @return void
     *
     * @throws ModelNotFoundException
     */
    public function execute(int $id): void
    {
        $this->repo->delete($id);
    }
}
