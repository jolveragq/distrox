<?php

namespace App\Domain\Repositories;

use App\Domain\Models\User;

interface UserRepositoryInterface
{
    public function all(): array;

    public function create(array $data): User;

    public function findById(int $id): User;

    public function update(int $id, array $data): User;

    public function delete(int $id): void;
}
