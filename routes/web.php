<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;

use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\User\AuthController;
use App\Http\Controllers\User\UserController;



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

Route::get('/admin/index', [AdminController::class, 'index'])->name('admin.home');

Route::get('/admin/login', [LoginController::class, 'showLoginForm'])->name('admin.login');

Route::post('admin/login', [LoginController::class, 'login']);


//Route::get('/register',[LoginController::class,'register'])->name('register');
Route::get('/admin/logout', [LoginController::class, 'logout'])->name('admin.logout');

//User
// Route::get('/user/index', function () {
//     return redirect()->route('user.index');
// });
 Route::get('/', [UserController::class, 'index'])->name('user.index');

Route::get('/login', [AuthController::class, 'showFormLogin'])->name('user.login');
Route::post('/login', [AuthController::class, 'loginUser']);
Route::get('/register',[AuthController::class,'showFormRegister'])->name('user.register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/logoutUser', [AuthController::class, 'logoutUser'])->name('user.logout');



// Đường dẫn trang khách hàng 
// Route::get('/', function () {
//     return view('frontend.index');
// });
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