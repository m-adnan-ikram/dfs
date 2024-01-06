<?php

use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\PayPalController;
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

Route::post('deed-details',[CustomerController::class, 'deedDetails']);
Route::post('deed-details/customers',[CustomerController::class, 'deedDetailCustomer']);

Route::post('get-client-token',[PayPalController::class, 'getClientToken']);
Route::post('create-order',[PayPalController::class, 'createOrder']);
Route::post('complete-order',[PayPalController::class, 'completeOrder']);