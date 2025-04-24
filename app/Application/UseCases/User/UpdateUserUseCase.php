<?php

namespace App\Application\UseCases\User;

use App\Domain\Repositories\UserRepositoryInterface;

class UpdateUserUseCase
{
    public function __construct(private UserRepositoryInterface $repo) {}

    public function execute($id, $data)
    {
        return $this->repo->update($id, $data);
    }
}
