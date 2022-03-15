<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;

use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\User\AuthController;

use App\Http\Controllers\User\UserController;

use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\BrandController;






// Đường dẫn trang admin - trước mỗi đường dẫn thêm tiền tố admin để phân biết với bên khách hàng 

   
Route::get('/admin', function () {
    return redirect()->route('admin.home');
});
    //Dashboard
Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.home');


Route::get('/admin/index', [AdminController::class, 'index'])->name('admin.home');

Route::get('/admin/login', [LoginController::class, 'showLoginForm'])->name('admin.login');

Route::post('admin/login', [LoginController::class, 'login']);

Route::get('/admin/logout', [LoginController::class, 'logout'])->name('admin.logout');
    
    //Manage account staff and customer 
Route::get('/admin/account/roles', [AccountController::class, 'indexRoles']);
Route::post('/admin/account/roles', [AccountController::class, 'addRoles']);
Route::get('/admin/account/roles/edit/{id}', [AccountController::class,'editRoles']);
Route::post('/admin/account/roles/update', [AccountController::class, 'updateRoles']);
Route::get('/admin/account/roles/delete/{id}', [AccountController::class, 'deleteRoles']);
    
Route::get('/admin/account/staff', [AccountController::class, 'indexAccount']);
Route::post('/admin/account/staff', [AccountController::class, 'addAccount']);





//User
// Route::get('/user/index', function () {
//     return redirect()->route('user.index');
// });
 Route::get('/', [UserController::class, 'index'])->name('user.index');

//Đường dẫn trang khách hàng 

Route::get('/login', [AuthController::class, 'showFormLogin'])->name('user.login');
Route::post('/login', [AuthController::class, 'loginUser']);
Route::get('/register',[AuthController::class,'showFormRegister'])->name('user.register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/logoutUser', [AuthController::class, 'logoutUser'])->name('user.logout');


////////SIZES
Route::get('/backend/sizes/index', [SizeController::class, 'indexSizes']);
Route::post('/backend/sizes/index', [SizeController::class, 'addSizes']);
Route::get('/backend/sizes/edit/{id}', [SizeController::class,'editSizes']);
Route::post('/backend/sizes/index/update', [SizeController::class, 'updateSizes']);
Route::get('/backend/sizes/index/delete/{id}', [SizeController::class, 'deleteSizes']);





//////COLORS
Route::get('/backend/colors/index', [ColorController::class, 'indexColors']);
Route::post('/backend/colors/index', [ColorController::class, 'addColors']);
Route::get('/backend/colors/edit/{id}', [ColorController::class,'editColors']);
Route::post('/backend/colors/index/update', [ColorController::class, 'updateColors']);
Route::get('/backend/colors/index/delete/{id}', [ColorController::class, 'deleteColors']);




///////BRANDS
Route::get('/backend/brands/index', [BrandController::class, 'indexBrands']);
Route::post('/backend/brands/index', [BrandController::class, 'addBrands']);
Route::get('/backend/brands/edit/{id}', [BrandController::class,'editBrands']);
Route::post('/backend/brands/index/update', [BrandController::class, 'updateBrands']);
Route::get('/backend/brands/index/delete/{id}', [BrandController::class, 'deleteBrands']);




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
