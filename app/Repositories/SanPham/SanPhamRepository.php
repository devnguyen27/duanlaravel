<?php


namespace App\Repositories\SanPham;

use App\Repositories\BaseRepository;
use App\Repositories\SanPham\SanPhamRepositoryInterface;
use Illuminate\Support\Facades\DB;

class SanPhamRepository extends BaseRepository implements SanPhamRepositoryInterface
{
    protected $model;
    public function getModel(){
        return \App\Models\Admin\SanPham::class;
    }

    public function getSanPhamJoinDanhMuc($soluong){
        return $this->model->select("sanpham.*", "danhmuc.name AS tendm",
            DB::raw('(select dongia from sanphamchitiet where idsanpham  =   sanpham.id   limit 1) as dongia'),
            DB::raw('(select ml from sanphamchitiet where idsanpham  =   sanpham.id   limit 1) as thetich'),
            DB::raw('(select id from sanphamchitiet where idsanpham  =   sanpham.id   limit 1) as idspct')
            )
            ->join("danhmuc", "sanpham.iddanhmuc", "=", "danhmuc.id" )
            ->where('sanpham.trangthai', '=', 1)
            ->orderBy('id', 'DESC')
            ->get();
    }

    public function DemSanPham(){
        return DB::table('sanpham')->where('sanpham.trangthai', '=', 1)->count();
    }

    public function  getSanPhamJoinDanhMucID($id){
        return $this->model->select("sanpham.*", "danhmuc.name AS tendm")
            ->join("danhmuc", "sanpham.iddanhmuc", "=", "danhmuc.id")
            ->where('sanpham.id', '=', $id)
            ->get();
    }
    public function getsanpham(){
        return $this->model->offset(1)->limit(4)
        ->where('sanpham.trangthai', '=', 1)
        ->orderBy('created_at', 'DESC')
        ->get();
    }


}
