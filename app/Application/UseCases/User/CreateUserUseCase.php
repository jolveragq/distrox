<?php

namespace App\Application\UseCases\User;

use App\Domain\Repositories\UserRepositoryInterface;

class CreateUserUseCase
{
    public function __construct(private UserRepositoryInterface $repo) {}

    public function execute($data)
    {
        return $this->repo->create($data);
    }
}
