<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Repositories\DonHang\DonHangRepository;
use App\Repositories\DonHangChiTiet\DonHangChiTietRepository;
use App\Repositories\KhachHang\KhachHangRepository;
use App\Repositories\SanPham\SanPhamRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DonHangchitietController extends Controller
{
    private $DonHangChiTiet;
    private $DonHang;
    private $khachHang;
    /**
     * CosoController constructor.
     */
    public function __construct(DonHangChiTietRepository $DonHangChiTiet , DonHangRepository $DonHang , SanPhamRepository $SanPham ,KhachHangRepository $khachHang)
    {
        $this->DonHangChiTiet = $DonHangChiTiet;
        $this->DonHang = $DonHang;
        $this->khachHang = $khachHang;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    function editDetailDonHang(Request $request, $id){

        $donHang = $this->DonHang->find($id);

        $khachHang = $this->DonHang->getDonHangAndKhachHangById($id);

        $sanpham = $this->DonHangChiTiet->getDonHangChiTietByIdDonHangInnerJoin($id);

        $Tong = $this->DonHangChiTiet->getIdTongthanhtoanByIdDonHangChiTtiet($id);



        return view('Admin.DonHang.detail', compact('donHang','sanpham','khachHang','Tong',));

    }


    function updateDetailDonHang(Request $request, $id){

        if(count($request->soluong)>0){
         for ($i=0; $i < count($request->id) ; $i++) {
             $data = [
                'soluong'=> $request->soluong[$i]
             ];

            $this->DonHangChiTiet->updateDetailByIdDH($request->id[$i],$data);
         }

        }

        return redirect('quantri/donhang')->with('thanhcong', 'Cập nhật đơn hàng chi tiết thành công');
    }
}
