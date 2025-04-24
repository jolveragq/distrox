<?php

namespace App\Application\UseCases\User;

use App\Domain\Repositories\UserRepositoryInterface;

class GetUserUseCase
{
    public function __construct(private UserRepositoryInterface $repo) {}

    public function execute($data)
    {
        return $this->repo->findById($data);
    }
}
