<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use App\Repositories\RolesRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    public function __construct(private RolesRepository $repository) {}

    public function index() : Collection
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


    public function update(Request $request, string $id)
    {
        return $this->repository->update($request, $id);
    }

}
