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

Route::get('user/{id}', [apiController::class, 'editUser']);
Route::get('user', [apiController::class, 'getUsers']);
Route::post('user', [apiController::class, 'storeUser']);
Route::put('user/{id}', [apiController::class, 'updateUser']);
Route::delete('user/{id}', [apiController::class, 'deleteUser']);
