<?php

namespace App\Infrastructure\Persistence;

use App\Domain\Repositories\CompanyRepositoryInterface;
use App\Domain\Models\Company;

class EloquentCompanyRepository implements CompanyRepositoryInterface
{
    public function all(): array
    {
        return Company::all()->toArray();
    }

    public function create(array $data): Company
    {
        $model = Company::create($data);
        return $model;
    }

    public function findById(int $id): Company
    {
        return  Company::findOrFail($id);
    }

    public function update(int $id, array $data): Company
    {
        $model = Company::findOrFail($id);
        $model->update($data);
        return $model;
    }

    public function delete(int $id): void
    {
        Company::findOrFail($id)->delete();
    }
}
