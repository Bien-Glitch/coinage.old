<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
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

Route::middleware(['auth', 'verified', 'password.confirm'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    //profile
    Route::get('/my-account', [ProfileController::class, 'profile']);
    Route::get('/profile/verify', [ProfileController::class, 'profileVerify']);
    Route::get('profile/verify/phone', [ProfileController::class, 'veriifyPhone']);
    Route::get('profile/verify/bank', [ProfileController::class, 'verifyBank']);
    Route::get('profile/verify/id', [ProfileController::class, 'verifyId']);

    Route::post('profile/verify/phone/sendOtp', [ProfileController::class, 'sendOtp']);
    Route::post('profile/verify/phone/verifyOtp', [ProfileController::class, 'verifyOtp']);
    Route::post('profile/verify/bank/process', [ProfileController::class, 'updateBank']);
    Route::post('profile/verify/id/process', [ProfileController::class, 'uploadId']);

    //Offers
    Route::get('/offers', [OfferController::class, 'index'])->name('offers.index');
    Route::get('/offers/create', [OfferController::class, 'create'])->name('offers.create');
    Route::get('/offers/show/{offer:id}', [OfferController::class, 'show'])->name('offers.show');
    /*Route::get('/offers/edit', [OfferController::class, 'edit'])->name('offers.edit');*/

    Route::post('/offers/create', [OfferController::class, 'store'])->name('offers.store');
    Route::patch('/offers/update/{offer:id}', [OfferController::class, 'update'])->name('offers.update');
    Route::delete('/offers/delete/{offer:id}', [OfferController::class, 'destroy'])->name('offers.destroy');
});
