<?php

use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\RoomController;
use App\Http\Controllers\Api\GameController;
use Illuminate\Support\Facades\Route;

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

Route::resource('users', UserController::class)->only(['store', 'show']);
Route::resource('rooms', RoomController::class)->only(['index', 'store', 'show']);
Route::resource('rooms/{roomId}/games', GameController::class)->only(['index', 'store']);

