<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentCallbackController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    $events = \App\Models\Event::all();
    return view('pages.home', [
        'events' => $events,
        'type' => 'dark'
    ]);
});

Route::get('/events/{id}', function ($id){
    $event = \App\Models\Event::findOrFail($id);

    return view('pages.event-details', [
        'event' => $event,
        'type' => 'dark'
    ]);
});

Route::get('/tickets/{id}/order', function($id){
    $ticket = \App\Models\Ticket::findOrFail($id);

    return view('pages.order', [
       'ticket' => $ticket,
    ]);
});
Route::post('/tickets/{id}/order', [OrderController::class, 'store']);
Route::get('/orders/{bookingCode}/pdf', [OrderController::class, 'pdf']);
Route::get('/orders/{bookingCode}', [OrderController::class, 'show']);
//Route::post('payments/midtrans-notification', [PaymentCallbackController::class, 'receive']);
