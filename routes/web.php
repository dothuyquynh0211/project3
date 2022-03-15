<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;

use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\User\AuthController;

use App\Http\Controllers\User\UserController;

use App\Http\Controllers\Admin\AccountController;
<<<<<<< HEAD
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\WarehouseController;
=======
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\ColorController;





>>>>>>> 8309175c7f6beb824897f01e2997cbb747b994f2

// Đường dẫn trang admin - trước mỗi đường dẫn thêm tiền tố admin để phân biết với bên khách hàng 

   
Route::get('/admin', function () {
    return redirect()->route('admin.home');
});
    //Dashboard
Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.home');


Route::get('/admin/index', [AdminController::class, 'index'])->name('admin.home');

Route::get('/admin/login', [LoginController::class, 'showLoginForm'])->name('admin.login');

Route::post('admin/login', [LoginController::class, 'login']);


//Route::get('/register',[LoginController::class,'register'])->name('register');

    // Login, logout admin
// Route::get('/admin/login', [LoginController::class, 'showLoginForm'])->name('admin.login');
// Route::post('/admin/login', [LoginController::class, 'login']);

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
Route::get('backend/sizes/index', [SizeController::class, 'index'])->name('/index');
//view insert
Route::get('/backend/sizes/insert', [SizeController::class, 'insert']);
//xử li lưu trữ
Route::post('/create', [SizeController::class, 'store']);
//view edit
Route::get('/edit/{id}', [SizeController::class, 'edit']);
//xử lí cập nhật
Route::post('/edit/{id}', [SizeController::class, 'update']);
//Xóa
Route::get('/delete/{id}', [TypeController::class, 'destroy']);




//////COLORS
Route::get('backend/colors/index', [ColorController::class, 'indexColor'])->name('/indexColor');
//view insert
Route::get('/backend/color/insert', [ColorController::class, 'insert']);
//xử li lưu trữ
Route::post('/create', [ColorController::class, 'store']);
//view edit
Route::get('/edit/{id}', [ColorController::class, 'edit']);
//xử lí cập nhật
Route::post('/edit/{id}', [ColorController::class, 'update']);
//Xóa
Route::get('/delete/{id}', [ColorController::class, 'destroy']);
// Đường dẫn trang khách hàng 
// Route::get('/', function () {
//     return view('frontend.index');
// });

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
