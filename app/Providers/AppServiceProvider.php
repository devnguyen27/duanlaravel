<?php

namespace App\Providers;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\CoSoController;
use App\Models\Admin\CosoModel;
use Illuminate\Support\Facades\View;
use App\Repositories\DanhMuc\DanhMucRepository;
use App\Repositories\DanhMuc\DanhmucRepositoryInterface;
use App\Repositories\DichVu\DichVuRepository;
use App\Repositories\DichVu\DichVuRepositoryInterface;
use App\Repositories\GiamGia\GiamGiaRepository;
use App\Repositories\GiamGia\GiamGiaRepositoryInterface;
use App\Repositories\HoaDon\HoaDonRepository;
use App\Repositories\HoaDon\HoaDonRepositoryInterface;
use App\Repositories\HoaDonChiTiet\HoaDonChiTietRepository;
use App\Repositories\HoaDonChiTiet\HoaDonChiTietRepositoryInterface;
use App\Repositories\Lich\LichRepository;
use App\Repositories\Lich\LichRepositoryInterface;
use App\Repositories\NhanVien\NhanVienRepository;
use App\Repositories\NhanVien\NhanVienRepositoryInterface;
use App\Repositories\SanPham\SanPhamRepository;
use App\Repositories\SanPham\SanPhamRepositoryInterface;
use App\Repositories\SanPhamChiTiet\SanPhamChiTietRepositoryInterface;
use App\Repositories\SanPhamChiTiet\SanPhamChiTietRepository;
use App\Repositories\CoSo\CoSoRepository;
use App\Repositories\CoSo\CoSoRepositoryInterface;
use App\Repositories\LieuTrinh\LieuTrinhRepository;
use App\Repositories\LieuTrinh\LieuTrinhRepositoryInterface;
use App\Repositories\LieuTrinhChiTiet\LieuTrinhChiTietRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(DanhmucRepositoryInterface::class,DanhMucRepository::class);
        $this->app->singleton(SanPhamRepositoryInterface::class,SanPhamRepository::class);
        $this->app->singleton(SanPhamChiTietRepositoryInterface::class,SanPhamChiTietRepository::class);
        $this->app->singleton(CoSoRepositoryInterface::class,CoSoRepository::class);
        $this->app->singleton(CoSoRepositoryInterface::class,CoSoRepository::class);
        $this->app->singleton(NhanVienRepositoryInterface::class,NhanVienRepository::class);
        $this->app->singleton(DichVuRepositoryInterface::class,DichVuRepository::class);
        $this->app->singleton(GiamGiaRepositoryInterface::class, GiamGiaRepository::class);
        $this->app->singleton(HoaDonRepositoryInterface::class, HoaDonRepository::class);
        $this->app->singleton(HoaDonChiTietRepositoryInterface::class, HoaDonChiTietRepository::class);
        $this->app->singleton(LichRepositoryInterface::class, LichRepository::class);
        $this->app->singleton(LieuTrinhRepositoryInterface::class,LieuTrinhRepository::class);
        $this->app->singleton(LieuTrinhChiTietRepositoryInterface::class, LieuTrinhRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
       $this->composerNavigation();
       $this->composerShareConstant();
    }



    public function composerNavigation(){
        View::composer('Admin.LayoutAdmin', function($view)
        {
            $data = CosoModel::all();

            $view->with('coSo', $data );
        }
     );
    }

    public function composerShareConstant(){

        View::composer('*', function($view )
        {
            $view->with('BASE_URL_UPLOAD_STAFF', Controller::BASE_URL_UPLOAD_STAFF);
            $view->with('BASE_URL_UPLOAD_CUSTOMER', Controller::BASE_URL_UPLOAD_CUSTOMER);
            $view->with('BASE_URL_UPLOAD', Controller::BASE_URL_UPLOAD);
            $view->with('URL_IMG', Controller::URL_IMG);
        }
        );
    }
}
