<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\OfferController;
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
    return view('welcome');
});
Route::get('/about', function () {
    return view('about');
});

Auth::routes(['verify' => true]);

Route::middleware('auth', 'verified', 'password.confirm')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    //Offers
    Route::get('/offers', [OfferController::class, 'index']);
    Route::get('/offers/create', [OfferController::class, 'create']);
    Route::post('/offers/create', [OfferController::class, 'store']);
    Route::get('/offers/show', [OfferController::class, 'show']);
    Route::get('/offers/edit', [OfferController::class, 'edit']);
    Route::post('/offers/update', [OfferController::class, 'update']);
});
