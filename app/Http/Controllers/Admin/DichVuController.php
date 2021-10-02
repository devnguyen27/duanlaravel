<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DichVu;
use App\Repositories\DanhMuc\DanhMucRepository;
use App\Repositories\DichVu\DichVuRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DichVuController extends Controller
{
    private $DichVu;
    private $DanhMuc;

    public function __construct(DichVuRepository $DichVu, DanhMucRepository $DanhMuc)
    {
        $this->DichVu = $DichVu;
        $this->DanhMuc = $DanhMuc;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->DichVu->getDichVu();
        return view("Admin.DichVu.index", ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $DichVu = $this->DichVu->getAll();
        $DanhMuc = $this->DanhMuc->getAll();
        return view("Admin.DichVu.create", ['DichVu' => $DichVu, 'DanhMuc' => $DanhMuc]);
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'urlHinh' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($request->hasFile('urlHinh')) {
            $image = $request->file('urlHinh');
            $name = rand() . '.' . $image->getClientOriginalName();
            $image->move(public_path('img'), $name);
            $DichVu = [
                'tendv' => $request->tendv,
                'slug' => Str::slug($request->tendv),
                'img' => $name,
                'giamgia' => $request->giamgia,
                'iddm' => $request->danhmuc,
                'motangan' => $request->motangan,
                'dongia' => $request->dongia,
                'noidung' => $request->noidung,
                'trangthai' => $request->trangthai
            ];

            $this->DichVu->create($DichVu);
            return redirect('quantri/dichvu')->with('success', 'Thêm dịch vụ thành công');
        } else {
            return redirect('quantri/dichvu')->with('error', 'Thêm dịch vụ thất bại');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     * Tải ảnh khách hàng lên
     * 1 show
     * 2 up
     */
    public function show($id)
    {
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $DanhMuc = $this->DanhMuc->getAll();
        $DichVu = $this->DichVu->find($id);
        return view("Admin.DichVu.edit", ['DanhMuc' => $DanhMuc, 'DichVu' => $DichVu]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      
        $img = $request->file('urlHinh');
        $imgnew = "";

        if ($img == null) {
            $imgnew = $request->imgcu;
        }
        else {
            $imgnew = $img;
            $DichVu = [
                'tendv' => $request->tendv,
                'slug' => Str::slug($request->tendv),
                'img' => $imgnew,
                'giamgia' => $request->giamgia,
                'iddm' => $request->danhmuc,
                'motangan' => $request->motangan,
                'dongia' => $request->dongia,
                'noidung' => $request->noidung,
                'trangthai' => $request->trangthai
            ];
            $this->DichVu->update($id, $DichVu);
            return redirect('quantri/dichvu')->with('thanhcong', 'Sửa dịch vụ thành công');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->DichVu->delete($id);

        return redirect('quantri/dichvu')->with('success', 'Xoá thành công');
    }
}
