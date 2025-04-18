<?php

namespace App\Application\UseCases;

use App\Domain\Repositories\CompanyRepositoryInterface;

use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdateCompanyUseCase
{
    public function __construct(private CompanyRepositoryInterface $repo) {}

    /**
     * Actualiza una empresa existente.
     *
     * @param  int    $id
     * @param  array  $data
     * @return object
     *
     * @throws ModelNotFoundException
     */
    public function execute(int $id, array $data): object
    {
        return $this->repo->update($id, $data);
    }
}
