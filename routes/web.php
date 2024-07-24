<?php

use App\Http\Controllers\client\AuthController;
use App\Http\Controllers\client\BillController;
use App\Http\Controllers\client\CartController;
use App\Http\Controllers\client\homeController;
use App\Http\Controllers\client\listController;
use App\Http\Controllers\DanhMucController;
use App\Http\Controllers\DonHangController;
use App\Http\Controllers\SanPhamController;
use App\Http\Controllers\TaiKhoanController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

//ADMIN
Route::resource('admin/danhmuc', DanhMucController::class);
Route::resource('admin/sanpham', SanPhamController::class);
Route::resource('admin/taikhoan', TaiKhoanController::class);
Route::resource('admin/donhang', DonHangController::class);

Route::get('/' ,[homeController::class, 'index'])->name('index');
//client


// sử dụng auth của laravel để chặn khi chưa đăng nhập
Route::middleware('auth')->group(function () {
    Route::resource('/home', HomeController::class);
    Route::resource('/list', ListController::class);

    //GIỎ HÀNG
    Route::get('cart/list', [CartController::class, 'list'])->name('cart.list');
    Route::post('cart/add', [CartController::class, 'add'])->name('cart.add');
    Route::post('cart/remove', [CartController::class, 'remove'])->name('cart.remove');

    Route::get('bill', [BillController::class, 'bill'])->name('bill');
    Route::post('bill/billconfirm',[BillController::class, 'billconfirm'])->name('billconfirm');
});



//Hieenr thi form ddawng nhập
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
// Xử lý đăng nhập
Route::post('login', [AuthController::class, 'login']);

// Hiển thị form đăng ký
Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');

// Xử lý đăng ký
Route::post('register', [AuthController::class, 'register']);

// Xử lý đăng xuất
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/test', function () {
    return view('client/billConfirm');
});