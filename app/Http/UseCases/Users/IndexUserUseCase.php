<?php

namespace App\Http\UseCases\Users;

use App\Repositories\UsersRepository;
use Illuminate\Http\Request;

class IndexUserUseCase {
    public function __construct(
        private UsersRepository $repository,
    ){}

    public function execute()
    {
        return $this->repository->index();
    }
}
