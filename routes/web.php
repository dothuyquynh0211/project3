<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;

use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Customer\CustomerLoginController;
use App\Http\Controllers\Customer\CustomerController;




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
    return redirect()->route('admin.home');
});

Route::get('/home', [AdminController::class, 'index'])->name('admin.home');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/login', [LoginController::class, 'login']);
//Route::get('/register',[LoginController::class,'register'])->name('register');
Route::get('/logout', [LoginController::class, 'logout'])->name('admin.logout');





/////Customer
Route::get('/home', [CustomerController::class, 'index'])->name('customer.home');

Route::get('/login', [CustomerLoginController::class, 'showLoginForm'])->name('customer.login');
Route::post('/login', [CustomerLoginController::class, 'login']);
Route::get('/register',[CustomerLoginController::class,'register'])->name('register');
Route::get('/logout', [CustomerLoginController::class, 'logout'])->name('admin.logout');

