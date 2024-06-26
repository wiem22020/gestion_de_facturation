<?php

use Illuminate\Http\Request;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\TvaController;
use App\Http\Controllers\VilleController;
use App\Models\Tva;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('clients', ClientController::class);
Route::apiResource('tva', TvaController::class);
Route::apiResource('ville', VilleController::class);