<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RideController;

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

Route::middleware('auth:api')->group(function () {
    Route::post('/rides', [RideController::class, 'store']); // Create Ride
    Route::get('/rides', [RideController::class, 'index']);  // List Rides
    Route::get('/rides/{id}', [RideController::class, 'show']); // Show Ride
    Route::put('/rides/{id}', [RideController::class, 'update']); // Update Status
    Route::delete('/rides/{id}', [RideController::class, 'destroy']); // Delete Ride
});
