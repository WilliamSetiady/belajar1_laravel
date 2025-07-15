<?php

use App\Http\Controllers\API\apiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/', function () {
    $response = ['message', 'API sudah berjalan'];
    return response()->json($response);
});

//harus login untuk dapat token
Route::middleware('auth:sanctum')->group(function () {
    Route::get('user', [apiController::class, 'getUsers']);
    Route::get('me', [apiController::class, 'getMe']);
});

Route::get('user/{id}', [apiController::class, 'editUser']);
Route::post('user', [apiController::class, 'storeUser']);
Route::put('user/{id}', [apiController::class, 'updateUser']);
Route::delete('user/{id}', [apiController::class, 'deleteUser']);
Route::post('login', [apiController::class, 'loginAction']);
