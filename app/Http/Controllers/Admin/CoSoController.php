<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Province;
use App\Models\Admin\Wards;
use App\Models\Admin\CosoModel;
use App\Repositories\City\CityRepository;
use App\Repositories\CoSo\CoSoRepository;
use App\Repositories\HoaDon\HoaDonRepository;
use App\Repositories\Lich\LichRepository;
use App\Repositories\Province\ProvinceRepository;
use App\Repositories\Wards\WardsRepository;
use Illuminate\Http\Request;
use App\Http\Requests\Coso;
use App\Http\Requests\CosoEdit;

class CoSoController extends Controller
{
    private $Coso;
    private $Province;
    private $City;
    private $wards;
    private $Lich;
    private $HoaDon;

    /**
     * CosoController constructor.
     */
    public function __construct(CoSoRepository $Coso, CityRepository $City, ProvinceRepository $Province, WardsRepository $wards, LichRepository $Lich, HoaDonRepository $HoaDon)
    {
        $this->Coso = $Coso;
        $this->Province = $Province;
        $this->City = $City;
        $this->wards = $wards;
        $this->Lich = $Lich;
        $this->HoaDon = $HoaDon;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->Coso->getAll();
        $city = $this->City->getall();
        $province = $this->Province->getall();
        $wards = $this->wards->getall();

        return view('Admin.Coso.index', compact('data', 'city', 'province', 'wards'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $data = $this->Coso->getAll();
        $city = $this->City->getall();
        $province = $this->Province->getall();
        $wards = $this->wards->getall();

        return view('Admin.Coso.create', compact('data', 'city', 'province', 'wards'));
    }

    public function store(Coso $request)
    {

        $data = [
            'name' => $request->name,
            'diachi' => $request->diachi,
            'tinh' => $request->city,
            'quan' => $request->province,
            'huyen' => $request->wards
        ];

        $them = $this->Coso->create($data);
        $this->Lich->CreateLichFromCoso($them->id);
        return redirect('quantri/coso')->with('success', 'Thêm thành công');
    }

    public function select_delivery(Request $request)
    {
        $data = $request->all();
        if ($data['action']) {
            $output = '';
            if ($data['action'] == "city") {
                $select_province = Province::where('matp', $data['ma_id'])->orderby('maqh', 'ASC')->get();
                $output .= '<option>---Chọn quận huyện---</option>';
                foreach ($select_province as $province) {

                    $output .= '<option value="' . $province->maqh . '">' . $province->name . '</option>';
                }
            } else {
                $select_wards = Wards::where('maqh', $data['ma_id'])->orderby('xaid', 'ASC')->get();
                $output .= '<option>---Chọn xã phường---</option>';
                foreach ($select_wards as $ward) {
                    $output .= '<option value="' . $ward->xaid . '">' . $ward->name . '</option>';
                }
            }
            echo $output;
        }
    }


    public function changeCoSo($id){
        if($id>0){
            session()->put('coso', $id);
            return redirect()->back();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
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

        $data = $this->Coso->find($id);
        $city = $this->City->getall();
        $province = $this->Province->getall();
        $wards = $this->wards->getall();
        return view('Admin.Coso.edit', compact('data', 'city', 'province', 'wards'));

    }

    public function select_delivery1(Request $request)
    {
        $data = $request->all();
        if ($data['action']) {
            $output = '';
            if ($data['action'] == "city") {
                $select_province = Province::where('matp', $data['ma_id'])->orderby('maqh', 'ASC')->get();
                $output .= '<option>---Chọn quận huyện---</option>';
                foreach ($select_province as $province) {

                    $output .= '<option value="' . $province->maqh . '">' . $province->name . '</option>';
                }
            } else {
                $select_wards = Wards::where('maqh', $data['ma_id'])->orderby('xaid', 'ASC')->get();
                $output .= '<option>---Chọn xã phường---</option>';
                foreach ($select_wards as $ward) {
                    $output .= '<option value="' . $ward->xaid . '">' . $ward->name . '</option>';
                }
            }
            echo $output;
        }
    }
    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(CosoEdit $request, $id)
    {
        if($this == true){
        $data = [
            'name' => $request->name,
            'diachi' => $request->diachi,
            'tinh' => $request->city,
            'quan' => $request->province,
            'huyen' => $request->wards
        ];

       $this->Coso->update($id,$data);
       return redirect(route("coso.index"))->with('thanhcong', 'Cập nhật thông tin thành công');
        } else {
            return redirect(route("coso.edit"))->with('thatbai', 'cập nhật thất bại ');
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
        $hasHoaDon = $this->HoaDon->getHoaDonIdCoSo($id);
        if(count($hasHoaDon)>0){
            $message=[
                'message'=>"Cơ sở đã tồn tại dữ liệu.",
                'icon'=>'warning',
                'error_Code'=>1
            ];
            return $message;
        }else{
            $this->Lich->deleteLichByIdCoSo($id);
            $this->Coso->delete($id);
            $message=[
                'message'=>"Xóa cơ sở thành công.",
                'icon'=>'success',
                'error_Code'=>0
            ];
            return $message;
        }
    }
}
