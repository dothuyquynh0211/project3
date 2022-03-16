<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;

use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\User\AuthController;

use App\Http\Controllers\User\UserController;

use App\Http\Controllers\Admin\AccountController;

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\WarehouseController;
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

    //Manage Size
Route::get('/admin/size', [SizeController::class, 'indexSizes']);
Route::post('/admin/size', [SizeController::class, 'addSizes']);
Route::get('/admin/size/edit/{id}', [SizeController::class,'editSizes']);
Route::post('/admin/size/index/update', [SizeController::class, 'updateSizes']);
Route::get('/admin/size/index/delete/{id}', [SizeController::class, 'deleteSizes']);

    //Manage Color
Route::get('/admin/color', [ColorController::class, 'indexColors']);
Route::post('/admin/color', [ColorController::class, 'addColors']);
Route::get('/admin/color/edit/{id}', [ColorController::class,'editColors']);
Route::post('/admin/color/update', [ColorController::class, 'updateColors']);
Route::get('/admin/color/delete/{id}', [ColorController::class, 'deleteColors']);

    //Manage Brands
Route::get('/admin/brand', [BrandController::class, 'indexBrands']);
Route::post('/admin/brand', [BrandController::class, 'addBrands']);
Route::get('/admin/brand/edit/{id}', [BrandController::class,'editBrands']);
Route::post('/admin/brand/update', [BrandController::class, 'updateBrands']);
Route::get('/admin/brand/delete/{id}', [BrandController::class, 'deleteBrands']);
    
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
  
Route::get('/admin/account/customer', [AccountController::class, 'indexCustomer'])->name('customer.index');
Route::get('/admin/account/customer/add', [AccountController::class, 'add']);
Route::post('/admin/account/customer/add', [AccountController::class, 'addCustomer']);
Route::get('/admin/account/customer/edit/{id}', [AccountController::class,'editCustomer']);
Route::post('/admin/account/customer/update', [AccountController::class, 'updateCustomer']);
Route::get('/admin/account/customer/delete/{id}', [AccountController::class, 'deleteCustomer']);
  
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

    //Manage product
    Route::get('/admin/product', function () {
        return view('backend.coupons.add_coupons');
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