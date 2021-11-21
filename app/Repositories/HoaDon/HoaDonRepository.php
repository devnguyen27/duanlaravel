<?php


namespace App\Repositories\HoaDon;


use App\Models\Admin\HoaDonModel;
use App\Repositories\BaseRepository;
use App\Http\Controllers\Controller;

class HoaDonRepository extends BaseRepository implements HoaDonRepositoryInterface
{
    protected $model;

    public function getModel()
    {
        return HoaDonModel::class;
    }
    public function ShowHoaDonByIdCoso($id){
        return  $this->model->select('hoadon.*', 'khachhang.name AS tenKh', 'khachhang.sdt AS sodienthoai', 'coso.name AS tencoso', 'nhanvien.name AS tenNV', 'nhanvien.email AS emailNV')
            ->join('khachhang', 'hoadon.idkhachhang', '=', 'khachhang.id')
            ->join('coso', 'hoadon.idcoso', '=', 'coso.id')
            ->join('nhanvien', 'hoadon.idnhanvien', '=', 'nhanvien.id')
            ->where('hoadon.idcoso', '=', $id)
            ->orderBy('hoadon.id', 'desc')
            ->get();
    }

    public function findHoaDonByIdLieuTrinh($id){
        return  $this->model
        ->where('idlieutrinh', '=', $id)
        ->get();
    }

    public function getTongDoanhThuHoaDon($dauNgay, $cuoiNgay, $idCoSo) {
        return $this->model
        ->whereBetween('created_at', [$dauNgay, $cuoiNgay])
        ->where('trangthai', '=', Controller::TRANGTHAI_HOADON_DA_THANH_TOAN)
        ->where('idcoso', '=', $idCoSo)
        ->sum('tongtiensaugiamgia');
    }
    public function getHoaDonIdCoSo($id){
        return $this->model->where('idcoso',"=",$id)->get();
    }
}
