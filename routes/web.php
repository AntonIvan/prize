<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use App\Http\Controllers\SurpriseController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function (Request $request) {
    $id = resolve(UserController::class)->check($request);
    $prize = resolve(SurpriseController::class)->check($id);
    $allPrize = resolve(SurpriseController::class)->all($id);
    return view('welcome', [
        "user" => $id,
        "prize" => $prize['some'],
        "what" => $prize['what'],
        "money" => $allPrize['money'],
        "points" => $allPrize['points'],
        "things" => $allPrize['things'],
        ]);
});
