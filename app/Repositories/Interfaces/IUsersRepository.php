<?php

namespace App\Repositories\Interfaces;

use App\Models\Roles;
use App\Models\User;
use Illuminate\Http\Request;

interface IUsersRepository
{
    public function create(Request $request) : User;

    public function index();

    public function show(string $id) : User;

    public function update(Request $request, string $id) : User;

    public function delete(string $id) : void;

    public function getRole($id);
}
