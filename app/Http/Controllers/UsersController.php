<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repositories\UsersRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    public function __construct(private UsersRepository $repository) {}

    public function index()
    {
        return $this->repository->index();
    }

    public function store(Request $request)
    {
        try {
            return $this->repository->create($request);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }


    public function show($id)
    {
        return $this->repository->show($id);
    }

    public function update(Request $request, $id)
    {
        return $this->repository->update($request, $id);
    }

    public function destroy($id)
    {
        $this->repository->delete($id);
    }
}
