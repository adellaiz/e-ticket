<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\OrderController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//
//Route::get('/events', [EventController::class, 'index']);
//Route::get('/events/{id}', [EventController::class, 'show']);
//Route::post('/tickets/book', [OrderController::class, 'store']);

Route::get('/orders/check/{bookingCode}', [OrderController::class, 'check']);
