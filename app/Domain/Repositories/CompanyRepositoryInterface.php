<?php

namespace App\Domain\Repositories;

use App\Domain\Models\Company;

interface CompanyRepositoryInterface
{
    /**
     * Retrieve all Company records.
     *
     * @return Company[]|array
     */
    public function all(): array;

    /**
     * Create a new Company.
     *
     * @param  array  $data
     * @return Company
     */
    public function create(array $data): Company;

    /**
     * Find a Company by its primary key.
     *
     * @param  int  $id
     * @return Company
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function findById(int $id): Company;

    /**
     * Update an existing Company.
     *
     * @param  int    $id
     * @param  array  $data
     * @return Company
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function update(int $id, array $data): Company;

    /**
     * Delete a Company by its primary key.
     *
     * @param  int  $id
     * @return void
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function delete(int $id): void;
}
