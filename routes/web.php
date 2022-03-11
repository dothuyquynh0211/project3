<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;

use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\User\AuthController;




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

Route::get('/admin', function () {
    return redirect()->route('admin.home');
});

Route::get('/home', [AdminController::class, 'index'])->name('admin.home');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/login', [LoginController::class, 'login']);
//Route::get('/register',[LoginController::class,'register'])->name('register');
Route::get('/logout', [LoginController::class, 'logout'])->name('admin.logout');





//User

Route::get('/login', [AuthController::class, 'showFormLogin'])->name('user.login');
Route::post('/login', [AuthController::class, 'loginUser']);
Route::get('/register',[AuthController::class,'showFormRegister'])->name('user.register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/logoutUser', [AuthController::class, 'logoutUser'])->name('user.logout');

