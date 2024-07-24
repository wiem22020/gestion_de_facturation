<?php


use Illuminate\Http\Request;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\TvaController;
use App\Http\Controllers\VilleController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\FactureController;
use App\Http\Controllers\LignefactureController;
use App\Http\Controllers\ReglementController;
use App\Http\Controllers\SecteurController;
use App\Http\Controllers\AuthController;

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
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/facture/{facture_id}/lignes', 'App\Http\Controllers\LigneFactureController@getLignesByFactureId');

Route::get('/lastReglementId', [ReglementController::class, 'getLastReglementId']);
Route::apiResource('reglements', ReglementController::class);
Route::apiResource('clients', ClientController::class);
Route::apiResource('factures', FactureController::class);
Route::get('/lastFactureId', [FactureController::class, 'getLastFactureId']);
Route::apiResource('ligne_facture', LignefactureController::class);
Route::apiResource('tva', TvaController::class);
Route::apiResource('ville', VilleController::class);
Route::apiResource('article', ArticleController::class);
Route::apiResource('secteur', SecteurController::class);


