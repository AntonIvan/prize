<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SurpriseController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [UserController::class, 'register']);
Route::post('/auth', [UserController::class, 'auth']);
Route::post('/logout', [UserController::class, 'logout']);
Route::post('/prize', [SurpriseController::class, 'get']);
Route::post('/deleteprize', [SurpriseController::class, 'delete']);
Route::post('/getprize', [SurpriseController::class, 'receive']);
Route::post('/transfer', [SurpriseController::class, 'transfer']);
Route::post('/transfermoney', [SurpriseController::class, 'transferMoney']);
