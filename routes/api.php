<?php

use App\Http\Controllers\OperationController;
use App\Http\Controllers\OrganizationController;
use Illuminate\Support\Facades\Route;


Route::get('/organizations', [OrganizationController::class, 'index']);
Route::get('/operations', [OperationController::class, 'index']);
Route::get('/statistics/{organization?}', [OperationController::class, 'statistics']);

