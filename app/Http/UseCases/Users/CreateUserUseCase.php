<?php

namespace App\Http\UseCases\Users;

use App\Repositories\UsersRepository;
use Illuminate\Http\Request;

class CreateUserUseCase
{
    public function __construct(
        private UsersRepository $repository
    ){}

    public function execute(Request $request)
    {
        return $this->repository->create($request);
    }
}
