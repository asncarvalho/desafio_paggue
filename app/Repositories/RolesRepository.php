<?php

namespace App\Repositories;

use App\Models\Roles;
use App\Repositories\Interfaces\IRolesRepository;
use Illuminate\Http\Request;

class RolesRepository implements IRolesRepository
{
    public function create(Request $request) : Roles
    {
        return Roles::create($request->all());
    }

    public function index()
    {
        return Roles::get();
    }


    public function update(Request $request, string $id) : Roles
    {
        $roles = Roles::find($id);

        $roles->description = $request->description;

        return $roles->save();

    }
}
