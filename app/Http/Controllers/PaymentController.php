<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Repositories\PaymentRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class PaymentController extends Controller
{

    public function __construct(private PaymentRepository $repository) {}

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
