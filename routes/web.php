<?php

use App\Http\Controllers\Admin\CoSoController;
use App\Http\Controllers\Admin\DangNhapAdminController;
use App\Http\Controllers\Admin\DanhMucController;
use App\Http\Controllers\Admin\DonHangController;

use App\Http\Controllers\Admin\DichVuController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\DonHangchitietController;
use App\Http\Controllers\Admin\HoaDonChiTietController;
use App\Http\Controllers\Admin\HoaDonController;
use App\Http\Controllers\Admin\KhachHangController;
use App\Http\Controllers\Admin\LichController;
use App\Http\Controllers\Admin\LieuTrinhController;
use App\Http\Controllers\Admin\SanPhamController;
use App\Http\Controllers\Admin\NhanVienController;
use App\Http\Controllers\Admin\SanPhamChiTietController;
use App\Http\Controllers\Admin\ThongkeController;

use App\Http\Controllers\Site\HomeController;
use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
//    return view('welcome');
//});
/**
 * Backend
 *
 */
Route::get('/quantri/login', [DangNhapAdminController::class, 'index']);
Route::post('/quantri/login', [DangNhapAdminController::class, 'checkin']);
Route::get('/quantri/logout', [DangNhapAdminController::class, 'logout']);
Route::group(['prefix' => 'quantri', 'middleware' => 'phanquyen'], function (){
    Route::get('/', [ThongkeController::class, "index"]);
    Route::resource('danhmuc', DanhMucController::class);
    Route::resource('sanpham', SanPhamController::class);

    Route::resource('dichvu', DichVuController::class);
    Route::resource('khachhang', KhachHangController::class);
    Route::resource('blog', BlogController::class);

    Route::get('/sanpham/detail/{id}', [SanPhamChiTietController::class,'createDetailProduct']);
    Route::post('/sanpham/detail/{id}', [SanPhamChiTietController::class,'postDetailProduct']);
    Route::get('/sanpham/detail/{id}/edit', [SanPhamChiTietController::class,'editDetailProduct']);
    Route::post('/sanpham/detail/{id}/edit', [SanPhamChiTietController::class,'updateDetailProduct']);

    Route::resource('nhanvien', NhanVienController::class);
    Route::post('nhanvien/uploadKH/{id}', [NhanVienController::class, 'upImgKhachHang']);
    Route::get('nhanvien/kiemtraemail/{name}',[NhanVienController::class, "CheckEmailTonTai"]);
    Route::get('nhanvien/kiemtrasdt/{name}',[NhanVienController::class, "CheckSdtTonTai"]);
    Route::get("nhanvien/xoaImgKH/{id}/phantu/{idAnh}", [NhanVienController::class, "XoaImgKH"]);
    Route::get("nhanvien/imgcustomer/pictures", [NhanVienController::class, "AllImgKH"]);

    Route::resource('hoadon', HoaDonController::class);
    Route::resource('hoadonchitiet', HoaDonChiTietController::class);

    Route::resource('lich', LichController::class);
    Route::get('lich/{id}/thungay/{idthu}', [LichController::class, 'showlich']);
    Route::get('lich/uplich/{id}', [LichController::class, 'UpLich']);
    Route::get('lich/uplichAll/{id}', [LichController::class, 'uplichAll']);
    Route::post('lich/updateTime/{id}', [LichController::class, 'updateTime']);
    // quản lý cơ sở
    Route::resource('coso', CoSoController::class);
   Route::post('coso/select-delivery', [CoSoController::class,'select_delivery']);

    Route::resource('donhang', DonHangController::class);
    Route::resource('donhangchitiet', DonHangController::class);

    Route::get('/donhangchitiet/detail/{id}/edit', [DonHangchitietController::class,'editDetailDonHang']);
    Route::post('/donhangchitiet/detail/{id}/edit', [DonHangchitietController::class,'updateDetailDonHang']);

<<<<<<< HEAD
=======
    Route::resource('lieutrinh', LieuTrinhController::class);

    Route::put('editnamedv', [LieuTrinhController::class,'editNameDv']);
    Route::post('editimglieutrinh', [LieuTrinhController::class,'editImgLieuTrinh']);
    // Route::post('lieutrinh/edittrangthailieutrinh/', [LieuTrinhController::class,'editTrangThaiLieuTrinh']);

    Route::get('khachhang/detail/{id}', [KhachHangController::class,'detailKhachHang']);

>>>>>>> fcf734c2cbf9cbec408027da4761dc3e54f0ad38
});

Route::group(['prefix' => '/'], function (){
    Route::get('trang-chu', [HomeController::class, "index"]);
    Route::get('san-pham', [HomeController::class, "sanpham"]);
    Route::get('san-pham/chi-tiet', [HomeController::class, "sanphamchitiet"]);
    Route::get('gio-hang', [HomeController::class, "giohang"]);
    Route::get('thanh-toan', [HomeController::class, "thanhtoan"]);
    Route::get('bai-viet', [HomeController::class, "baiviet"]);
    Route::get('bai-viet/ten-bai-viet', [HomeController::class, "baivietchitiet"]);
    Route::get('nhanviencuacoso/{id}', [HomeController::class, "getNhanVienByIdCoSo"]);
    Route::get('getDataKhungGio', [HomeController::class, "getDataKhungGio"]);
    Route::post('datLich', [HomeController::class, "datLich"]);
});

