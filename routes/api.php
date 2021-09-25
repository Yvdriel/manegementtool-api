<?php

use App\Http\Controllers\ShiftController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ShiftRegistryController;
use Illuminate\Http\Request;
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

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::resource('shifts', ShiftController::class);
    Route::resource('shiftRegistries', ShiftRegistryController::class);

    Route::post('/logout', [AuthController::class, 'logout']);
});
