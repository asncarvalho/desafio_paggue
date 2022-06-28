<?php

namespace App\Repositories\Interfaces;

use App\Models\Roles;
use App\Models\User;
use Illuminate\Http\Request;

interface IRolesRepository
{
    public function create(Request $request) : Roles;

    public function index();

    public function update(Request $request, string $id) : Roles;
}
