<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentSettingController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;



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
    return redirect('/login');
});
Auth::routes();
Route::middleware(['auth'])->group(function () {
Route::get('/home', [HomeController::class, 'index'])->name('home');
 Route::get('/myOrders', [OrderController::class, 'getOrders'])->name('my,Orders');
 Route::post('/storeOrder', [CheckoutController::class, 'store'])->name('store.Order');
});
    
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/allPayment', [PaymentSettingController::class, 'allPayment'])->name('allPayment');
    Route::get('/updatePayment/{id?}', [PaymentSettingController::class, 'updatePayment'])->name('update.payment');
    
   
});