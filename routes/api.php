<?php

use App\Http\Controllers\Api\ListingController;
use App\Http\Controllers\Api\TransactionController;
use App\Http\Controllers\API\TransactionController as APITransactionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return response()->json([
        'message' => 'Detail logged in user',
        'data' => $request->user(),
    ]);
});

Route::resource('listing', ListingController::class)->only(['index', 'show']);
Route::post('transaction/is-available', [
    TransactionController::class,
    'isAvailable',
])->middleware(['auth:sanctum']);
Route::resource('transaction', APITransactionController::class)
    ->only(['store', 'index', 'show'])
    ->middleware(['auth:sanctum']);

require __DIR__ . '/auth.php';
