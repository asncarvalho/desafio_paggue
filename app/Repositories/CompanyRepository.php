<?php

namespace App\Repositories;

use App\Models\Company;
use App\Repositories\Interfaces\ICompanyRepository;
use Illuminate\Http\Request;

class CompanyRepository implements ICompanyRepository
{
    public function create(Request $request) : Company
    {
        return Company::create($request->all());
    }

    public function show($id) : Company
    {
        $company = Company::find($id);
        if(!$company){
            abort(404);
        }

        return $company;
    }

    public function index(){
        return Company::get();
    }

    public function update(Request $request, string $id) : Company {
        $company = Company::find($id);

        $company->cnpj = $request->cnpj;
        $company->razao_social = $request->razao_social;
        $company->nome_fantasia = $request->nome_fantasia;
        $company->telefone = $request->telefone;
        $company->email = $request->email;
        $company->value = $request->value;

        return $company->save();
    }

    public function delete($id) : void {
        $company = Company::find($id);

        if(!$company){
            abort(400);
        }

        $company->destroy();
    }

    public function draw(string $id, float $value) : void
    {
        $company = Company::find($id);

        $company->value = $company->value+= $value;

        $company->save();
    }
}
