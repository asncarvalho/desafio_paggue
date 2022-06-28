<?php

namespace App\Repositories\Interfaces;

use App\Models\Company;
use Illuminate\Http\Request;

interface ICompanyRepository
{
    public function create(Request $request) : Company;

    public function index();

    public function show(string $id) : Company;

    public function update(Request $request, string $id) : Company;

    public function delete(string $id) : void;
}
