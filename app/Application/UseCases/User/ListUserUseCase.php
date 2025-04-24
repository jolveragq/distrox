<?php

namespace App\Application\UseCases\User;

use App\Domain\Repositories\UserRepositoryInterface;

class ListUserUseCase
{
    public function __construct(private UserRepositoryInterface $repo) {}

    public function execute()
    {
        return $this->repo->all();
    }
}
