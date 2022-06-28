<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

Route::resources([
    'users' => UsersController::class,
    'companies' => CompanyController::class,
    'payments' => PaymentController::class,
    'roles' => RolesController::class,
]);
