<?php

namespace App\Http\UseCases\Users;

use App\Repositories\UsersRepository;

class DestroyUserUseCase
{
    public function __construct(
        private UsersRepository $repository
    ){}

    public function execute($id)
    {
        return $this->repository->delete($id);
    }
}
