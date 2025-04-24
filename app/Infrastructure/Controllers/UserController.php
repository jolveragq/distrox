<?php

namespace App\Infrastructure\Controllers;

use App\Application\UseCases\User\CreateUserUseCase;
use App\Application\UseCases\User\DeleteUserUseCase;
use App\Application\UseCases\User\GetUserUseCase;
use App\Application\UseCases\User\ListUserUseCase;
use App\Application\UseCases\User\UpdateUserUseCase;
use App\Infrastructure\Requests\User\StoreUserRequest;
use App\Infrastructure\Requests\User\UpdateUserRequest;
use App\Infrastructure\Response\DistroxResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(
        private ListUserUseCase  $listUsers,
        private CreateUserUseCase  $createUser,
        private GetUserUseCase     $getUser,
        private UpdateUserUseCase  $updateUser,
        private DeleteUserUseCase  $deleteUser,
    ) {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            return DistroxResponse::success($this->listUsers->execute());
        } catch (\Exception $e) {
            return DistroxResponse::error($e->getMessage(), null, 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        try {
            return DistroxResponse::success($this->createUser->execute($request->validated()), null, 201);
        } catch (\Exception $e) {
            return DistroxResponse::error($e->getMessage(), null, 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            return DistroxResponse::success($this->getUser->execute($id), null, 200);
        } catch (\Exception $e) {
            return DistroxResponse::error($e->getMessage(), null, 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, string $id)
    {
        try {
            return DistroxResponse::success(
                $this->updateUser->execute($id, $request->validated()),
                null,

            );
        } catch (\Exception $e) {
            return DistroxResponse::error($e->getMessage(), null, 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            return DistroxResponse::success($this->deleteUser->execute($id), null, 200);
        } catch (\Exception $e) {
            return DistroxResponse::error($e->getMessage(), null, 500);
        }
    }
}
