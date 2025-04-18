<?php

namespace App\Application\UseCases;

use App\Domain\Repositories\CompanyRepositoryInterface;

class CreateCompanyUseCase
{
    public function __construct(private CompanyRepositoryInterface $repo) {}

    /**
     * Crea una empresa con los datos validados.
     *
     * @param  array  $data
     * @return object
     */
    public function execute(array $data): object
    {
        return $this->repo->create($data);
    }
}
