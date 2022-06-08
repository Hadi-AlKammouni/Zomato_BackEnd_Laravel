<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RestoController;

Route::get('/restos/{id?}', [RestoController::class, 'getAllRestos']);
Route::get('/search/{category}', [RestoController::class, 'getRestoByCategory']);
Route::post('/add_resto', [RestoController::class, 'addResto']);

//---------------------

use App\Http\Controllers\UserController;

Route::get('/all_users/{id?}', [UserController::class, 'getAllUsers']);
Route::post('/register', [UserController::class, 'signUp']);
Route::post('/log_in', [UserController::class, 'logIn']);




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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
