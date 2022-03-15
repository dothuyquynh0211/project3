<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;

use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\User\AuthController;
use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\WarehouseController;

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
// Đường dẫn trang admin - trước mỗi đường dẫn thêm tiền tố admin để phân biết với bên khách hàng 

   
Route::get('/admin', function () {
    return redirect()->route('admin.home');
});
    //Dashboard
Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.home');

    // Login, logout admin
Route::get('/admin/login', [LoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [LoginController::class, 'login']);
Route::get('/admin/logout', [LoginController::class, 'logout'])->name('admin.logout');
    
    //Manage account staff and customer 
Route::get('/admin/account/roles', [AccountController::class, 'indexRoles']);
Route::post('/admin/account/roles', [AccountController::class, 'addRoles']);
Route::get('/admin/account/roles/edit/{id}', [AccountController::class,'editRoles']);
Route::post('/admin/account/roles/update', [AccountController::class, 'updateRoles']);
Route::get('/admin/account/roles/delete/{id}', [AccountController::class, 'deleteRoles']);
    
Route::get('/admin/account/staff', [AccountController::class, 'indexAccount']);
Route::post('/admin/account/staff', [AccountController::class, 'addAccount']);
Route::get('/admin/account/staff/edit/{id}', [AccountController::class,'editAccount']);
Route::post('/admin/account/staff/update', [AccountController::class, 'updateAccount']);
Route::get('/admin/account/staff/delete/{id}', [AccountController::class, 'deleteAccount']);
    
    //Manage Category
Route::get('/admin/category', [CategoryController::class, 'index']);
Route::post('/admin/category', [CategoryController::class, 'add']);
Route::get('/admin/category/edit/{id}', [CategoryController::class,'edit']);
Route::post('/admin/category/update', [CategoryController::class, 'update']);
Route::get('/admin/category/delete/{id}', [CategoryController::class, 'delete']);
    
    //Manage Warehouse
Route::get('/admin/warehouse', [WarehouseController::class, 'index']);
Route::post('/admin/warehouse', [WarehouseController::class, 'add']);
Route::get('/admin/warehouse/edit/{id}', [WarehouseController::class,'edit']);
Route::post('/admin/warehouse/update', [WarehouseController::class, 'update']);
Route::get('/admin/warehouse/delete/{id}', [WarehouseController::class, 'delete']);

// test color
Route::get('/', function () {
    return view('frontend.index');
});

//Đường dẫn trang khách hàng 

Route::get('/login', [AuthController::class, 'showFormLogin'])->name('user.login');
Route::post('/login', [AuthController::class, 'loginUser']);
Route::get('/register',[AuthController::class,'showFormRegister'])->name('user.register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/logoutUser', [AuthController::class, 'logoutUser'])->name('user.logout');

Route::get('/', function () {
    return view('frontend.index');
});
Route::get('/checkout', function () {
    return view('frontend.checkout');
});
Route::get('/contact', function () {
    return view('frontend.contact');
});
Route::get('/shop', function () {
    return view('frontend.shop');
});
Route::get('/cart', function () {
    return view('frontend.shop_cart');
});
Route::get('/cart', function () {
    return view('frontend.shop_cart');
});
Route::get('/product-detail', function () {
    return view('frontend.product_details');
});
Route::get('/blog', function () {
    return view('frontend.blog');
});
Route::get('/blog-detail', function () {
    return view('frontend.blog_details');
});