<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\IUsersRepository;
use Illuminate\Http\Request;

class UsersRepository implements IUsersRepository
{
    public function create(Request $request) : User
    {
        return User::create($request->all());
    }

    public function show($id) : User
    {
        $user = User::find($id);
        if(!$user){
            abort(404);
        }

        return $user;
    }

    public function index(){
        return User::get();
    }

    public function update(Request $request, string $id) : User {
        $user = User::find($id);

        $user->name = $request->name;
        $user->cpf = $request->cpf;
        $user->email = $request->email;
        $user->password = $request->password;

        $user->save();

        return $user;
    }

    public function delete($id) : void {
        $user = User::find($id);

        if(!$user){
            abort(400);
        }

        $user->delete();
    }

    public function getRole($id)
    {
        $currentUser = User::find($id);

        return $currentUser->getRole();
    }
}
