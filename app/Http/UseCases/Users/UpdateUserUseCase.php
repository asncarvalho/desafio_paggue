<?php

namespace App\Http\UseCases\Users;

use App\Repositories\UsersRepository;
use Illuminate\Http\Request;

class UpdateUserUseCase {
    public function __construct(
        private UsersRepository $repository,
    ){}

    public function execute(Request $request, $id)
    {
        return $this->repository->update($request, $id);
    }
}
