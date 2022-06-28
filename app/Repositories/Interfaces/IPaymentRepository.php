<?php

namespace App\Repositories\Interfaces;

use App\Models\Payment;
use Illuminate\Http\Request;

interface IPaymentRepository
{
    public function create(Request $request) : Payment;

    public function index();

    public function show(string $id) : Payment;

    public function update(Request $request, string $id) : Payment;

    public function delete(string $id) : void;
}
