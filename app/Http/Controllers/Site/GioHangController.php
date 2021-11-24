<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\ThanhToan;
use App\Models\Admin\SanPhamChiTiet;
use App\Repositories\DonHang\DonHangRepository;
use App\Repositories\DonHangChiTiet\DonHangChiTietRepository;
use App\Repositories\GioHang\GioHangRepository;
use App\Repositories\GioHangChiTiet\GioHangChiTietRepository;
use App\Repositories\KhachHang\KhachHangRepository;
use App\Repositories\SanPham\SanPhamRepository;
use App\Repositories\SanPhamChiTiet\SanPhamChiTietRepository;
use Faker\Core\Number;
use Illuminate\Http\Request;

class GioHangController extends Controller
{
    private $SanPham;
    private $SanPhamChiTiet;
    private $GioHang;
    private $GioHangChiTiet;
    private $KhachHang;
    private $DonHang;
    private $DonHangChiTiet;
    private $vnp_TmnCode = "8EZMZPIJ";
    private $vnp_HashSecret = "OKBCLDCSTLJIAUGMZKPJCRITTTBJAITY";
    private $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
    private $vnp_Returnurl = "http://127.0.0.1:8000/thanh-toan-hoa-don";

    public function __construct(
        GioHangRepository $GioHang,
        GioHangChiTietRepository $GioHangChiTiet,
        SanPhamRepository $SanPham,
        SanPhamChiTietRepository $SanPhamChiTiet,
        KhachHangRepository $KhachHang,
        DonHangRepository $DonHang,
        DonHangChiTietRepository $DonHangChiTiet
    )
    {
        $this->GioHang = $GioHang;
        $this->GioHangChiTiet = $GioHangChiTiet;
        $this->SanPham = $SanPham;
        $this->SanPhamChiTiet = $SanPhamChiTiet;
        $this->KhachHang = $KhachHang;
        $this->DonHang = $DonHang;
        $this->DonHangChiTiet = $DonHangChiTiet;
    }

    public function ShowGioHang()
    {
        if (session()->has('khachHang') && session('khachHang') != '') {
            $checkgiohangByidKH = $this->GioHang->CheckKhachHangInGioHang(session('khachHang')->id);
            if ($checkgiohangByidKH == false) {
                $giohangDB = $this->GioHang->GioHangDB(session('khachHang')->id);
                $giohangchitietDB = $this->GioHangChiTiet->GioHangChiTiet($giohangDB[0]->id);
                return $giohangchitietDB;
            } else {
                return 0;
            }
        } else {
            if (session()->has('giohang') && session('giohang') != "") {
                return session('giohang');
            } else {
                return 0;
            }

        }
    }

    /**
     *return 0: Sản phẩm đã hết hàng
     *
     */
    public function ThemGioHang($id)
    {
        $getspct = $this->SanPhamChiTiet->find($id);
        $product = $this->SanPhamChiTiet->getSanPhamChiTiet($id);
        if ($product != null) {
            if (session()->has('khachHang') && session('khachHang') != '') {
                $checkgiohangByidKH = $this->GioHang->CheckKhachHangInGioHang(session('khachHang')->id);
//           check khách hàng trong DB giỏ hàng có tồn tại
                $giohangDB = $this->GioHang->GioHangDB(session('khachHang')->id);
                if ($checkgiohangByidKH == false) {
                    $checkgiohangCt = $this->GioHangChiTiet->CheckGioHangCt($giohangDB[0]->id, $id);
//                check xem giỏ hàng đả có sản phẩm hay chưa
                    if ($checkgiohangCt == false) {
                        $getgiohangCt = $this->GioHangChiTiet->GetGioHangCt($giohangDB[0]->id, $id);
                        if (($getgiohangCt[0]->soluong + 1) <= $getspct->tonkho) {
                            $gh = [
                                'soluong' => $getgiohangCt[0]->soluong + 1
                            ];
                            $this->GioHangChiTiet->update($getgiohangCt[0]->id, $gh);
                            $thongbao = [
                                'thongbao' => 'Đã thêm sản phẩm'
                            ];
                            return $thongbao;
                        } else {
                            return 0;
                        }
                    } else {
                        if ($getspct->tonkho > 0) {
                            $newGHCT1 = [
                                'idgiohang' => $giohangDB[0]->id,
                                'idsanphamchitiet' => $id,
                                'soluong' => 1
                            ];
                            $this->GioHangChiTiet->create($newGHCT1);
                            $thongbao = [
                                'thongbao' => 'Đã thêm sản phẩm'
                            ];
                            return $thongbao;

                        } else {
                            return 0;
                        }
                    }
                } else {
                    if ($getspct->tonkho >= 1) {
                        $newGH = [
                            'idkhachhang' => session('khachHang')->id
                        ];
                        $ThemGH = $this->GioHang->create($newGH);
                        $newGHCT = [
                            'idgiohang' => $ThemGH->id,
                            'idsanphamchitiet' => $id,
                            'soluong' => 1
                        ];
                        $this->GioHangChiTiet->create($newGHCT);
                        $thongbao = [
                            'thongbao' => 'Đã thêm sản phẩm'
                        ];
                        return $thongbao;
                    } else {
                        return 0;
                    }
                }
            } else {
                //Thêm sản phẩm vào lưu seession
                if (session()->has('giohang') && count(session()->get('giohang')) != 0) {
                    $giohang = session()->get('giohang');
                    for ($i = 0; $i < count($giohang); $i++) {
                        if ($giohang[$i]["id"] == $id) {
                            $giohang[$i]["soluong"]++;
                            session()->put('giohang', $giohang);
                            $check = true;
                            break;
                        } else {
                            $check = false;
                        }
                    }
                    if ($check == false) {
                        $giohang[count($giohang)] = [
                            "id" => $id,
                            "name" => $product[0]->name,
                            "ml" => $product[0]->ml,
                            "soluong" => 1,
                            "dongia" => $product[0]->dongia,
                            "img" => $product[0]->img,
                            "giamgia" => $product[0]->giamgia,
                            "tonkho" => $product[0]->tonkho
                        ];
                    }
                    session()->put('giohang', $giohang);
                    return session()->get('giohang');
                } else {
                    $giohang = session()->get('giohang', []);
                    $giohang[0] = [
                        "id" => $id,
                        "name" => $product[0]->name,
                        "ml" => $product[0]->ml,
                        "soluong" => 1,
                        "dongia" => $product[0]->dongia,
                        "img" => $product[0]->img,
                        "giamgia" => $product[0]->giamgia,
                        "tonkho" => $product[0]->tonkho
                    ];
                    session()->put('giohang', $giohang);
                    return session()->get('giohang');
                }
            }
        } else {
            return 0;
        }
    }

    public function ThemGioHangChiTiet($id, $soluong)
    {
        $getspct = $this->SanPhamChiTiet->find($id);
        $product = $this->SanPhamChiTiet->getSanPhamChiTiet($id);
        if ($product != null) {
            if (session()->has('khachHang') && session('khachHang') != '') {
                $checkgiohangByidKH = $this->GioHang->CheckKhachHangInGioHang(session('khachHang')->id);
//           check khách hàng trong DB giỏ hàng có tồn tại
                $giohangDB = $this->GioHang->GioHangDB(session('khachHang')->id);
                if ($checkgiohangByidKH == false) {
                    $checkgiohangCt = $this->GioHangChiTiet->CheckGioHangCt($giohangDB[0]->id, $id);
//                check xem giỏ hàng đả có sản phẩm hay chưa
                    if ($checkgiohangCt == false) {
                        $getgiohangCt = $this->GioHangChiTiet->GetGioHangCt($giohangDB[0]->id, $id);
                        if (($getgiohangCt[0]->soluong + $soluong) <= $getspct->tonkho) {
                            $gh = [
                                'soluong' => $getgiohangCt[0]->soluong + $soluong
                            ];
                            $this->GioHangChiTiet->update($getgiohangCt[0]->id, $gh);
                            $thongbao = [
                                'thongbao' => 'Đã thêm sản phẩm'
                            ];
                            return $thongbao;
                        } else {
                            return 0;
                        }
                    } else {
                        if ($getspct->tonkho > 0) {
                            $newGHCT1 = [
                                'idgiohang' => $giohangDB[0]->id,
                                'idsanphamchitiet' => $id,
                                'soluong' => $soluong
                            ];
                            $this->GioHangChiTiet->create($newGHCT1);
                            $thongbao = [
                                'thongbao' => 'Đã thêm sản phẩm'
                            ];
                            return $thongbao;

                        } else {
                            return 0;
                        }
                    }
                } else {
                    if ($getspct->tonkho >= 1) {
                        $newGH = [
                            'idkhachhang' => session('khachHang')->id
                        ];
                        $ThemGH = $this->GioHang->create($newGH);
                        $newGHCT = [
                            'idgiohang' => $ThemGH->id,
                            'idsanphamchitiet' => $id,
                            'soluong' => $soluong
                        ];
                        $this->GioHangChiTiet->create($newGHCT);
                        $thongbao = [
                            'thongbao' => 'Đã thêm sản phẩm'
                        ];
                        return $thongbao;
                    } else {
                        return 0;
                    }
                }
            } else {
                //Thêm sản phẩm vào lưu seession
                if (session()->has('giohang') && count(session()->get('giohang')) != 0) {
                    $giohang = session()->get('giohang');
                    for ($i = 0; $i < count($giohang); $i++) {
                        if ($giohang[$i]["id"] == $id) {
                            $giohang[$i]["soluong"] += $soluong;
                            session()->put('giohang', $giohang);
                            $check = true;
                            break;
                        } else {
                            $check = false;
                        }
                    }
                    if ($check == false) {
                        $giohang[count($giohang)] = [
                            "id" => $id,
                            "name" => $product[0]->name,
                            "ml" => $product[0]->ml,
                            "soluong" => $soluong,
                            "dongia" => $product[0]->dongia,
                            "img" => $product[0]->img,
                            "giamgia" => $product[0]->giamgia,
                            "tonkho" => $product[0]->tonkho
                        ];
                    }
                    session()->put('giohang', $giohang);
                    return session()->get('giohang');
                } else {
                    $giohang = session()->get('giohang', []);
                    $giohang[0] = [
                        "id" => $id,
                        "name" => $product[0]->name,
                        "ml" => $product[0]->ml,
                        "soluong" => $soluong,
                        "dongia" => $product[0]->dongia,
                        "img" => $product[0]->img,
                        "giamgia" => $product[0]->giamgia,
                        "tonkho" => $product[0]->tonkho
                    ];
                    session()->put('giohang', $giohang);
                    return session()->get('giohang');
                }
            }
        } else {
            return 0;
        }
    }

    public function XoaSanPhamGioHang($id)
    {
        if (session()->has('khachHang') && session('khachHang') != '') {
            $giohangDB = $this->GioHang->GioHangDB(session('khachHang')->id);
            $this->GioHangChiTiet->XoaSanPhamGioHang($giohangDB[0]->id, $id);
            return 1;
        } else {
            $giohang = session()->get("giohang");
            $mang = [];
            for ($i = 0; $i < count($giohang); $i++) {
                if ($giohang[$i]["id"] != $id) {
                    array_push($mang, $giohang[$i]);
                }
            }
            session()->forget('giohang');
            session()->get('giohang', []);
            session()->put('giohang', $mang);
            return 1;
        }
    }

    public function TangSoLuong($id)
    {
        if (session()->has('khachHang') && session('khachHang') != '') {
            $giohangDB = $this->GioHang->GioHangDB(session('khachHang')->id);
            $giohangCTDB = $this->GioHangChiTiet->GetGioHangCt($giohangDB[0]->id, $id);
            $soluong = [
                'soluong' => ($giohangCTDB[0]->soluong + 1)
            ];
            $this->GioHangChiTiet->update($giohangCTDB[0]->id, $soluong);
            return 1;
        } else {
            $giohang = session()->get('giohang');
            for ($i = 0; $i < count($giohang); $i++) {
                if ($giohang[$i]["id"] == $id) {
                    $giohang[$i]["soluong"]++;
                    session()->put('giohang', $giohang);
                }
            }
            return 1;
        }
    }

    public function GiamSoLuong($id)
    {
        if (session()->has('khachHang') && session('khachHang') != '') {
            $giohangDB = $this->GioHang->GioHangDB(session('khachHang')->id);
            $giohangCTDB = $this->GioHangChiTiet->GetGioHangCt($giohangDB[0]->id, $id);
            $soluong = [
                'soluong' => ($giohangCTDB[0]->soluong - 1)
            ];
            $this->GioHangChiTiet->update($giohangCTDB[0]->id, $soluong);
            return 1;
        } else {
            $giohang = session()->get('giohang');
            for ($i = 0; $i < count($giohang); $i++) {
                if ($giohang[$i]["id"] == $id) {
                    $giohang[$i]["soluong"]--;
                    session()->put('giohang', $giohang);
                }
            }
            return 1;
        }
    }

    public function CapNhatSoLuong($id, $soluongsanpham)
    {
        if (session()->has('khachHang') && session('khachHang') != '') {
            $giohangDB = $this->GioHang->GioHangDB(session('khachHang')->id);
            $giohangCTDB = $this->GioHangChiTiet->GetGioHangCt($giohangDB[0]->id, $id);
            $soluong = [
                'soluong' => $soluongsanpham
            ];
            $this->GioHangChiTiet->update($giohangCTDB[0]->id, $soluong);
            return 1;
        } else {
            $giohang = session()->get('giohang');
            for ($i = 0; $i < count($giohang); $i++) {
                if ($giohang[$i]["id"] == $id) {
                    $giohang[$i]["soluong"] = $soluongsanpham;
                    session()->put('giohang', $giohang);
                }
            }
            return 1;
        }
    }

    public function xoatatcasanpham()
    {
        if (session()->has('khachHang') && session('khachHang') != '') {
            $giohangDB = $this->GioHang->GioHangDB(session('khachHang')->id);
            $this->GioHangChiTiet->XoaAllSanPhamGioHang($giohangDB[0]->id);
            return 1;
        } else {

            session()->forget('giohang');
            return 1;
        }
    }

    public function InserGioHangDataSession()
    {
        if (session()->has('giohang') && count(session()->get('giohang')) != 0) {
            if (session()->has('khachHang') && session('khachHang') != '') {
                $checkgiohangByidKH = $this->GioHang->CheckKhachHangInGioHang(session('khachHang')->id);
                if ($checkgiohangByidKH == false) {
                    $giohangDB = $this->GioHang->GioHangDB(session('khachHang')->id);
                    $giohang = session()->get('giohang');
                    for ($i = 0; $i < count($giohang); $i++) {
                        $checkgiohangCt = $this->GioHangChiTiet->CheckGioHangCt($giohangDB[0]->id, $giohang[$i]["id"]);
                        if ($checkgiohangCt == false) {
                            $idchitiet = $this->GioHangChiTiet->GetGioHangCt($giohangDB[0]->id, $giohang[$i]["id"]);
                            $sl = [
                                'soluong' => $giohang[$i]["soluong"]
                            ];
                            $this->GioHangChiTiet->update($idchitiet[0]->id, $sl);
                        } else {
                            $giohangnew = [
                                'idgiohang' => $giohangDB[0]->id,
                                'idsanphamchitiet' => $giohang[$i]["id"],
                                'soluong' => $giohang[$i]["soluong"]
                            ];
                            $this->GioHangChiTiet->create($giohangnew);
                        }
                    }
                    return 1;
                } else {
                    $kh = [
                        'idkhachhang' => session('khachHang')->id
                    ];
                    $this->GioHang->create($kh);
                    $giohangDB = $this->GioHang->GioHangDB(session('khachHang')->id);
                    $giohang = session()->get('giohang');
                    for ($i = 0; $i < count($giohang); $i++) {
                        $giohangnew = [
                            'idgiohang' => $giohangDB[0]->id,
                            'idsanphamchitiet' => $giohang[$i]["id"],
                            'soluong' => $giohang[$i]["soluong"]
                        ];
                        $this->GioHangChiTiet->create($giohangnew);
                    }
                    return 1;
                }
            } else {
                return 0;
            }
        } else {
            return 0;
        }
    }

    public function capnhatgiasession($gia)
    {
        session()->get("tongdonhang");
        if ($gia < 0) {
            session()->forget("tongdonhang");
        } else {
            session()->put("tongdonhang", $gia);
        }
        return session()->get("tongdonhang");
    }

    public function CheckSoDienThoaiTonTai($sdt)
    {
        return $this->KhachHang->CheckSdt($sdt);
    }

    public function thanhtoandonhang(ThanhToan $request)
    {
        $sdt = $request->phonenumber;
//        dd($request->all());
        if ($this->CheckSoDienThoaiTonTai($sdt) == false) {
            $idkhach = $this->KhachHang->getBySdt($sdt);
        } else {
            $customernew = [
                'sdt' => $sdt,
                'password' => bcrypt("123456"),
                'active' => 1
            ];
            $idkhach = $this->KhachHang->create($customernew);
        }
        if (session()->has("tiengiam") && session()->get("tiengiam") != 0) {
            $tongtiensaugiam = session()->get("tongdonhang") - session()->get("tiengiam");
        } else {
            $tongtiensaugiam = session()->get("tongdonhang");
        }
        if (session()->has('khachHang') && session('khachHang') != '') {
            $checkgiohangByidKH = $this->GioHang->CheckKhachHangInGioHang($idkhach->id);
            if ($checkgiohangByidKH == false) {
                $giohangDB = $this->GioHang->GioHangDB($idkhach->id);
                $donhang = [
                    'idkhachhang' => $idkhach->id,
                    'idgiamgia' => $request->giamgia,
                    'tennguoinhan' => $request->username,
                    'diachikhachhang' => $request->diachi,
                    'sdtnguoinhan' => $sdt,
                    'tongtientruocgiamgia' => session()->get("tongdonhang"),
                    'tongtiensaugiamgia' => $tongtiensaugiam,
                    'ghichucuakhachhang' => $request->note,
                    'phuongthucthanhtoan' => $request->ptth,
                    'phuongthucgiaohang' => $request->ptgh,
                    'trangthai' => 0,
                    'trangthaithanhtoan' => 0
                ];
                $donhangnew = $this->DonHang->create($donhang);
                if ($donhangnew){
                    $giohangchitiet = $this->GioHangChiTiet->GioHangChiTiet($giohangDB[0]->id);
                    for ($i = 0; $i < count($giohangchitiet); $i++) {
                        $anh = json_decode($giohangchitiet[$i]->img)[0];
                        if ($giohangchitiet[$i]->giamgia != null) {
                            $dongiasaugiam = ($giohangchitiet[$i]->dongia - ((($giohangchitiet[$i]->dongia * $giohangchitiet[$i]->giamgia)) / 100));
                        } else {
                            $dongiasaugiam = $giohangchitiet[$i]->dongia;
                        }
                        $donhangchitiet = [
                            'iddonhang' => $donhangnew->id,
                            'idsanphamchitiet' => $giohangchitiet[$i]->idsanphamchitiet,
                            'img' => $anh,
                            'soluong' => $giohangchitiet[$i]->soluong,
                            'dongiatruocgiamgia' => $giohangchitiet[$i]->dongia,
                            'dongiasaugiamgia' => $dongiasaugiam
                        ];
                        $this->DonHangChiTiet->create($donhangchitiet);
                    }
                }
                $this->GioHangChiTiet->XoaAllSanPhamGioHang($giohangDB[0]->id);
            }
        } else if (session()->has('giohang') && count(session()->get('giohang')) != 0) {
            $donhang = [
                'idkhachhang' => $idkhach->id,
                'idgiamgia' => $request->giamgia,
                'tennguoinhan' => $request->username,
                'diachikhachhang' => $request->diachi,
                'sdtnguoinhan' => $sdt,
                'tongtientruocgiamgia' => session()->get("tongdonhang"),
                'tongtiensaugiamgia' => $tongtiensaugiam,
                'ghichucuakhachhang' => $request->note,
                'phuongthucthanhtoan' => $request->ptth,
                'phuongthucgiaohang' => $request->ptgh,
                'trangthai' => 0,
                'trangthaithanhtoan' => 0
            ];
            $donhangnew = $this->DonHang->create($donhang);
//            dd($donhangnew);
            if ($donhangnew) {
                $iddonhang = $donhangnew->id;
                $giohangSession = session()->get('giohang');
                for ($i = 0; $i < count($giohangSession); $i++) {
                    $anh = json_decode($giohangSession[$i]["img"])[0];
                    if ($giohangSession[$i]["giamgia"] != null) {
                        $dongiasaugiam = ($giohangSession[$i]["dongia"] - ((($giohangSession[$i]["dongia"] * $giohangSession[$i]["giamgia"])) / 100));
                    } else {
                        $dongiasaugiam = $giohangSession[$i]["dongia"];
                    }
                    $donhangchitietnew = [
                        'iddonhang' => $iddonhang,
                        'idsanphamchitiet' => (int)$giohangSession[$i]["id"],
                        'img' => $anh,
                        'soluong' => $giohangSession[$i]["soluong"],
                        'dongiatruocgiamgia' => $giohangSession[$i]["dongia"],
                        'dongiasaugiamgia' => $dongiasaugiam
                    ];
                    $this->DonHangChiTiet->create($donhangchitietnew);
//                    dd($donhangchitietnew);
                }
            }
            session()->forget('giohang');
        }
        session()->forget("tongdonhang");
        if (session()->has("tiengiam") && session()->get("tiengiam") != 0){
            session()->forget("tiengiam");
        }
        return redirect('/')->with('thanhtoanthanhcong', "Đặt hàng thành công");
    }

    public function vnpayments(ThanhToan $request)
    {

        session()->get("requestAll", []);
        session()->put("requestAll", $request->all());
        $vnp_TxnRef = date('YmdHis'); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        if (session()->has("tiengiam") && session()->get("tiengiam") != 0) {
            $vnp_Amount = session()->get("tongdonhang") - session()->get("tiengiam");
        } else {
            $vnp_Amount = session()->get("tongdonhang");
        }

        error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
        $inputData = array(
            "vnp_Amount" => $vnp_Amount * 100,
            "vnp_BankCode" => $request->bank_code,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $_SERVER["REMOTE_ADDR"],
            "vnp_Locale" => "vn",//ngon ngu
            "vnp_OrderInfo" => $request->vnpay_note,//noidungthanhtoan
            "vnp_OrderType" => $request->order_type,//loaithanhtoan
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $this->vnp_TmnCode,
            "vnp_ReturnUrl" => $this->vnp_Returnurl,//link trả về
            "vnp_TxnRef" => $vnp_TxnRef//mã đơn hàng
        );

//        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
//            $inputData['vnp_BankCode'] = $request->bank_code;
//        }
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url1 = $this->vnp_Url . "?" . $query;
        if (isset($this->vnp_HashSecret)) {
            $vnpSecureHash = hash_hmac('sha512', $hashdata, $this->vnp_HashSecret);//
            $vnp_Url1 .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
//        dd($vnp_Url1);
        $returnData = array(
            'code' => '00'
        , 'message' => 'success'
        , 'data' => $vnp_Url1);

        return redirect()->to($returnData["data"]);
    }

    public function returnPay(){
        if ($_GET["vnp_TransactionStatus"]==00){
            $sdt = session("requestAll")["phonenumber"];
//        dd($request->all());
            if ($this->CheckSoDienThoaiTonTai($sdt) == false) {
                $idkhach = $this->KhachHang->getBySdt($sdt);
            } else {
                $customernew = [
                    'sdt' => $sdt,
                    'password' => bcrypt("123456"),
                    'active' => 1
                ];
                $idkhach = $this->KhachHang->create($customernew);
            }
            if (session()->has("tiengiam") && session()->get("tiengiam") != 0) {
                $tongtiensaugiam = session()->get("tongdonhang") - session()->get("tiengiam");
            } else {
                $tongtiensaugiam = session()->get("tongdonhang");
            }
            if (session()->has('khachHang') && session('khachHang') != '') {
                $checkgiohangByidKH = $this->GioHang->CheckKhachHangInGioHang($idkhach->id);
                if ($checkgiohangByidKH == false) {
                    $giohangDB = $this->GioHang->GioHangDB($idkhach->id);
                    $donhang = [
                        'idkhachhang' => $idkhach->id,
                        'idgiamgia' => session("requestAll")["giamgia"],
                        'tennguoinhan' => session("requestAll")["username"],
                        'diachikhachhang' => session("requestAll")["diachi"],
                        'sdtnguoinhan' => $sdt,
                        'tongtientruocgiamgia' => session()->get("tongdonhang"),
                        'tongtiensaugiamgia' => $tongtiensaugiam,
                        'ghichucuakhachhang' => session("requestAll")["note"],
                        'phuongthucthanhtoan' => session("requestAll")["ptth"],
                        'phuongthucgiaohang' => session("requestAll")["ptgh"],
                        'trangthai' => 0,
                        'trangthaithanhtoan' => 1
                    ];
                    $donhangnew = $this->DonHang->create($donhang);
                    if ($donhangnew){
                        $giohangchitiet = $this->GioHangChiTiet->GioHangChiTiet($giohangDB[0]->id);
                        for ($i = 0; $i < count($giohangchitiet); $i++) {
                            $anh = json_decode($giohangchitiet[$i]->img)[0];
                            if ($giohangchitiet[$i]->giamgia != null) {
                                $dongiasaugiam = ($giohangchitiet[$i]->dongia - ((($giohangchitiet[$i]->dongia * $giohangchitiet[$i]->giamgia)) / 100));
                            } else {
                                $dongiasaugiam = $giohangchitiet[$i]->dongia;
                            }
                            $donhangchitiet = [
                                'iddonhang' => $donhangnew->id,
                                'idsanphamchitiet' => $giohangchitiet[$i]->idsanphamchitiet,
                                'img' => $anh,
                                'soluong' => $giohangchitiet[$i]->soluong,
                                'dongiatruocgiamgia' => $giohangchitiet[$i]->dongia,
                                'dongiasaugiamgia' => $dongiasaugiam
                            ];
                            $this->DonHangChiTiet->create($donhangchitiet);
                        }
                    }
                    $this->GioHangChiTiet->XoaAllSanPhamGioHang($giohangDB[0]->id);
                }
            } else if (session()->has('giohang') && count(session()->get('giohang')) != 0) {
                $donhang = [
                    'idkhachhang' => $idkhach->id,
                    'idgiamgia' => session("requestAll")["giamgia"],
                    'tennguoinhan' => session("requestAll")["username"],
                    'diachikhachhang' => session("requestAll")["diachi"],
                    'sdtnguoinhan' => $sdt,
                    'tongtientruocgiamgia' => session()->get("tongdonhang"),
                    'tongtiensaugiamgia' => $tongtiensaugiam,
                    'ghichucuakhachhang' => session("requestAll")["note"],
                    'phuongthucthanhtoan' => session("requestAll")["ptth"],
                    'phuongthucgiaohang' => session("requestAll")["ptgh"],
                    'trangthai' => 0,
                    'trangthaithanhtoan' => 1
                ];
                $donhangnew = $this->DonHang->create($donhang);
                if ($donhangnew) {
                    $iddonhang = $donhangnew->id;
                    $giohangSession = session()->get('giohang');
                    for ($i = 0; $i < count($giohangSession); $i++) {
                        $anh = json_decode($giohangSession[$i]["img"])[0];
                        if ($giohangSession[$i]["giamgia"] != null) {
                            $dongiasaugiam = ($giohangSession[$i]["dongia"] - ((($giohangSession[$i]["dongia"] * $giohangSession[$i]["giamgia"])) / 100));
                        } else {
                            $dongiasaugiam = $giohangSession[$i]["dongia"];
                        }
                        $donhangchitietnew = [
                            'iddonhang' => $iddonhang,
                            'idsanphamchitiet' => (int)$giohangSession[$i]["id"],
                            'img' => $anh,
                            'soluong' => $giohangSession[$i]["soluong"],
                            'dongiatruocgiamgia' => $giohangSession[$i]["dongia"],
                            'dongiasaugiamgia' => $dongiasaugiam
                        ];
                        $this->DonHangChiTiet->create($donhangchitietnew);
                    }
                }
                session()->forget('giohang');
            }
            session()->forget("tongdonhang");
            if (session()->has("tiengiam") && session()->get("tiengiam") != 0){
                session()->forget("tiengiam");
            }
            session()->forget("requestAll");
            return redirect('/')->with('thanhtoanvnpaythanhcong', "Thanh toán đơn hàng thành công !");
        }else{
            return redirect('/thanh-toan')->with('thanhtoanthatbai', "Đặt hàng thất bại");
        }
    }

}
