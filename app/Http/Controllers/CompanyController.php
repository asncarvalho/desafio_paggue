<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Repositories\CompanyRepository;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function __construct(private CompanyRepository $repository){}

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

    public function show(string $id)
    {
        return $this->repository->show($id);
    }

    public function update(Request $request, string $id)
    {
        return $this->repository->update($request, $id);
    }

    public function destroy(string $id)
    {
        return $this->repository->delete($id);
    }
}
