<?php

namespace App\Infrastructure\Persistence;

use App\Domain\Models\User;
use App\Domain\Repositories\UserRepositoryInterface;

class EloquentUserRepository implements UserRepositoryInterface
{
    public function all(): array
    {
        return User::all()->toArray();
    }

    public function create(array $data): User
    {
        return User::create($data);
    }

    public function findById(int $id): User
    {
        return User::findOrFail($id);
    }

    public function update(int $id, array $data): User
    {
        return User::findOrFail($id)->update($data);
    }

    public function delete(int $id): void
    {
        User::findOrFail($id)->delete();
    }
}
