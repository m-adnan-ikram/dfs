<?php

use App\Http\Controllers\FrontPageController;
use App\Http\Controllers\TierController;
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
Route::get('/', [FrontPageController::class, 'index'])->name('main');

Route::get('/sub_ledger', [TierController::class, 'sub_ledger'])->name('tier.sub_ledger');
Route::get('/create/sub_ledger', [TierController::class, 'create_sub_ledger'])->name('create.sub_ledger');
Route::post('/store/sub_ledger', [TierController::class, 'store_sub_ledger'])->name('store.sub_ledger');

Route::get('/getTier2Options/{tier1Id}', [TierController::class, 'getTier2Options'])->name('getTier2Options');





