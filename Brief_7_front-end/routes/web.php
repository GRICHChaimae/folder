<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserAuthController;

use App\Http\Controllers\LogoutController;

use App\Http\Controllers\OfferController;

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
    return view('log_in',[
        'log_in' => 'log_in'
    ]);
})->name('login');

Route::get('/',[UserAuthController::class,'login']);
Route::get('sign_up',[UserAuthController::class,'register']);
Route::post('/',[UserAuthController::class,'create'])->name('create');
Route::post('check',[UserAuthController::class,'check'])->name('check');
Route::get('offre',[UserAuthController::class,'offre']);

Route::post('logout',[LogoutController::class,'store'])->name('logout');

Route::get('offer',[OfferController::class,'index'])->name('offer');
Route::post('offer',[OfferController::class,'store'])->name('offer');

Route::get('/demande', function () {
    return view('demande',[
        'demande' => 'demande'
    ]);
});


