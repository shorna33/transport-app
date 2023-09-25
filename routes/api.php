<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShipmentController;
use App\Http\Controllers\TransportController;
use App\Http\Controllers\AuthenticationController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/register', [AuthenticationController::class, 'register']);
Route::post('/login', [AuthenticationController::class, 'login']);

Route::middleware('auth:api')->group(function(){
    Route::post('/create_transport', [TransportController::class, 'create_transport']);
    Route::get('/show_transport/{id}', [TransportController::class, 'show_transport']);
    Route::get('/show_transport', [TransportController::class, 'show_transport']);
    Route::post('/create_shipment', [ShipmentController::class, 'create_shipment']);
    Route::get('/show_shipment/{id}', [ShipmentController::class, 'show_shipment']);
    Route::get('/show_shipment', [ShipmentController::class, 'show_shipment']);
});




