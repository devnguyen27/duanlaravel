<div class="modal-container" id="modal-datlich">
    <div class="modal-background">
        <div class="close-modal background-close" type-modal="modal-datlich"></div>
        <div class="modal modal-main" style="width: 50%;height: auto;max-height: 90%;">
            <div class="noidung-modal h-100 w-100">
                <div class="row h-100">
                    <div class="col-xl-12 p-0">
                        <div class="box-content-datlich h-100">
                            <div class="modal-content-1 h-100">
                                <div class="box-spinner">
                                    <div class="spinner-border" role="status">
                                        <span class="sr-only">Loading...</span>
                                      </div>
                                </div>
                                <div class="datlich-step h-100 active" data-step="0">
                                    <div class="title-3 color-main uppercase">Nhập SĐT & Chọn cơ sở</div>
                                    <div class="text-10">Nếu bạn chưa biết chọn dịch vụ nào hãy chọn ‘’Tôi muốn tư vấn’’ </div>
                                    <div class="list-select position-relative">

                                        <form action="" class="fa-custom form-phone-number">
                                            <div class="div-phone-number">
                                                <input type="text" id="phoneNumber" placeholder="Nhập số điện thoại của bạn">
                                            </div>
                                            <div class="custom-error d-flex align-items-center" icon-error-of="phone">
                                                <div class="custom-1">
                                                    <div class="box-icon">
                                                        <i class="fas fa-times"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="fa-custom-error-text d-flex align-items-center">
                                                <div class="custom-error-text phone-error-text" error-of="phone">
                                                    Không được bỏ trống
                                                </div>
                                            </div>

                                        </form>

                                        <div class="select-custom fa-custom select-coso">
                                            <div class="select-fa">
                                                <div class="name-select d-flex align-items-center" data-mov="13">
                                                    <div class="tendanhmuc value-coso limit-text-row-1" data-coso="0">
                                                        Chọn cơ sở
                                                    </div>
                                                    <div class="icon-1">
                                                        <i class="fas fa-caret-down"></i>
                                                    </div>
                                                </div>

                                                <div class="list-option coso-fa" slide-mov="13">
                                                    @foreach ($listCoSo as $coSo)
                                                        <div class="option-item coso-fa date-bg pickcoso d-block">
                                                            <div class="position-relative z-index-999 pickcoso-children d-flex" data-option-coso="{{ $coSo->id }}">
                                                                <div class="d-inline-block" style="width: 11%;">
                                                                    {{ $coSo->name }}:
                                                                </div>
                                                                <div class="d-inline-block">
                                                                    {{ $coSo->diachi }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach

                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="control-slide-datlich d-flex justify-content-end">
                                        <button type="button" class="button-href-basic check-next-step">Tiếp theo <i class="fas fa-angle-right"></i>

                                        </button>
                                    </div>
                                </div>

                                <div class="datlich-step h-100" data-step="1">
                                    <div class="title-3 uppercase color-main">Chọn dịch vụ</div>
                                    <div class="text-10">Nếu bạn chưa biết chọn dịch vụ nào hãy chọn ‘’Tôi muốn tư vấn’’ </div>
                                    <div class="list-select">
                                        @foreach ($listDanhMucDichVu as $row)
                                        <div class="select-custom select-dichvu fa-custom">
                                            <div class="select-fa">
                                                <div class="name-select d-flex align-items-center" data-mov="{{ $row->id }}">
                                                    <div class="tendanhmuc">
                                                        {{ $row->name }}
                                                    </div>
                                                    <div class="icon-1">
                                                        <i class="fas fa-caret-down"></i>
                                                    </div>
                                                </div>

                                                <div class="list-option dichvu-checkbox" slide-mov="{{ $row->id }}">
                                                    @foreach ($row->listDichVu as $dichVu)
                                                    @php
                                                        $id = 'optionDichVu'.$dichVu->id;
                                                        if ($dichVu->giamgia > 0)
                                                        {
                                                            $gia = $dichVu->dongia - ($dichVu->dongia * $dichVu->giamgia / 100);
                                                        } else {
                                                            $gia = $dichVu->dongia;
                                                        }
                                                    @endphp
                                                        <label class="option-item" for="{{ $id }}" onclick="calTotal()">
                                                            <div class="row align-items-center">
                                                                <div class="col-xl-8">
                                                                    <div class="form-check d-flex align-items-center">
                                                                        <input type="checkbox" class="form-check-input checkbox-dichvu" data-name="{{ $dichVu->name }}" data-id="{{ $dichVu->id }}" name="dichvu" value="{{ $gia }}" id="{{ $id }}">
                                                                        <div class="mid-content">
                                                                            <div class="d-flex align-items-center">
                                                                                <div class="ml-2">
                                                                                    <a class="name-dichvu" href="javascript:void(0)">{{ $dichVu->name }}</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-xl-4 text-right">
                                                                    @if ($dichVu->giamgia > 0)
                                                                        <div class="gia-dichvu giagoc d-inline-block">{{ number_format($dichVu->dongia, 0) }}đ</div>
                                                                        <div class="gia-dichvu d-inline-block">{{ number_format($gia, 0) }}đ</div>
                                                                    @else
                                                                        <div class="gia-dichvu d-inline-block">{{ number_format($dichVu->dongia, 0) }}đ</div>
                                                                    @endif

                                                                </div>
                                                            </div>
                                                        </label>
                                                    @endforeach

                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>

                                    <div class="row mt-2">
                                        <div class="col-xl-6">
                                            <div class="form-group form-check mr-auto mb-0">
                                                <label class="form-check-label button-href-basic" for="em" onclick="uncheckDichVu()">
                                                    <input type="checkbox" class="form-check-input checkbox-tuvan" name="tuvan" id="em" data-id="0" value="0">
                                                Tôi muốn tư vấn</label>
                                            </div>
                                        </div>

                                        <div class="col-xl-6 text-right">
                                            <div class="">
                                                Tổng : <span data-tongtien='' class="tongtiendichvu"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="control-slide-datlich d-flex align-items-center">
                                        <button type="button" class="button-href-basic prev-step mr-auto">Quay lại</button>
                                        <button type="button" class="button-href-basic next-step">Tiếp theo <i class="fas fa-angle-right"></i>

                                        </button>
                                    </div>
                                </div>

                                <div class="datlich-step h-100" data-step="2">
                                    <div class="title-3 uppercase color-main">Thời gian bạn đến</div>
                                    <div class="text-10">Để tiết kiệm thời gian cho bạn hãy đặt trước khi đến spa</div>
                                    <div class="list-select position-relative">
                                        <div class="select-custom">
                                            <div class="select-fa">
                                                <div class="name-select d-flex align-items-center" data-mov="9">
                                                    <div class="tendanhmuc value-date">
                                                        Hôm nay, T2 (27/9)
                                                    </div data-date="27/9/2001">
                                                    <div class="icon-1">
                                                        <i class="fas fa-caret-down"></i>
                                                    </div>
                                                </div>

                                                <div class="list-option list-option-lich" slide-mov="9">
                                                    {{-- <div class="option-item date-bg">
                                                        <div class="pickdate" data-option-date="27/9/2001">Hôm nay, T2 (27/9)</div>
                                                        <div class="card-custom-small normal">Ngày thường</div>
                                                    </div>

                                                    <div class="option-item date-bg">
                                                        <div class="pickdate" data-option-date="28/9/2001">Ngày mai, T3 (28/9)</div>
                                                        <div class="card-custom-small special">Cuối tuần</div>
                                                    </div> --}}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="select-custom select-nhanvien">
                                            <div class="select-fa">
                                                <div class="name-select d-flex align-items-center" data-mov="11">
                                                    <div class="tendanhmuc value-nhanvien">
                                                        Spa chọn chuyên viên giúp bạn
                                                    </div data-nhanvien="0">
                                                    <div class="icon-1">
                                                        <i class="fas fa-caret-down"></i>
                                                    </div>
                                                </div>

                                                <div class="list-option list-nhanvien" slide-mov="11">
                                                    <div class="option-item option-nhanvien date-bg clicked">
                                                        <div class="picknhanvien position-relative z-index-999" data-name-nhanvien="Spa chọn chuyên viên giúp bạn" data-option-nhanvien="0" data-option-nhanvien="0">
                                                            <div class="img-1 border-image">
                                                                <img src="{{ asset('Site/images') }}/image8.png" class="cycle-img-1" alt="">
                                                            </div>

                                                            <div class="name-nhanvien">Spa chọn chuyên viên giúp bạn</div>
                                                        </div>
                                                    </div>

                                                    <div class="option-item option-nhanvien date-bg option-dong">
                                                        <div class="picknhanvien position-relative z-index-999" data-option-nhanvien="2">
                                                            <div class="img-1 border-image">
                                                                <img src="{{ asset('Site/images') }}/image8.png" class="cycle-img-1" alt="">
                                                            </div>

                                                            <div class="name-nhanvien">
                                                                Hằng Nguyễn Thị
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="select-custom fa-custom select-time">
                                            <div class="select-fa">
                                                <div class="name-select d-flex align-items-center" data-mov="10">
                                                    <div class="tendanhmuc value-time">
                                                        Chọn thời gian
                                                    </div data-time="0">
                                                    <div class="icon-1">
                                                        <i class="fas fa-caret-down"></i>
                                                    </div>
                                                </div>

                                                <div class="list-option mb-3 list-option-khunggio" slide-mov="10">
                                                    <div class="option-item time-bg">
                                                        <div class="picktime" data-option-time="8:00">8h00</div>
                                                    </div>

                                                    <div class="option-item time-bg">
                                                        <div class="picktime" data-option-time="8:30">8h30</div>
                                                    </div>

                                                    <div class="option-item time-bg time-close">
                                                        <div class="picktime" data-option-time="10:00">10h00</div>
                                                    </div>

                                                    <div class="option-item time-bg time-close">
                                                        <div class="picktime" data-option-time="10:30">10h30</div>
                                                    </div>

                                                    <div class="option-item time-bg">
                                                        <div class="picktime" data-option-time="11:00">11h00</div>
                                                    </div>

                                                    <div class="option-item time-bg">
                                                        <div class="picktime" data-option-time="11:30">11h30</div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>


                                    </div>

                                    <div class="control-slide-datlich d-flex">
                                        <button type="button" class="button-href-basic prev-step mr-auto">Quay lại</button>
                                        <button type="button" class="button-href-basic next-step">Tiếp theo <i class="fas fa-angle-right"></i>

                                        </button>
                                    </div>
                                </div>

                                <div class="datlich-step h-100" data-step="3">
                                    <div class="title-3 uppercase color-main text-center">KIỂM TRA THÔNG TIN</div>
                                    <div class="w-100 list-select box-checkthongtin mt-3">
                                        <div class="row">
                                            <div class="col-xl-4 check-info-user">
                                                <div class="upper">
                                                    <i class="fas fa-phone-alt"></i>
                                                    <span class="">Số điện thoại</span>
                                                </div>
                                                <div class="under check-phone">
                                                    0965286066
                                                </div>
                                            </div>
                                            <div class="col-xl-4 check-info-user">
                                                <div class="upper">
                                                    <i class="far fa-calendar-alt"></i>
                                                    <span>Ngày</span>
                                                </div>
                                                <div class="under check-ngay">
                                                    27-09-2021
                                                </div>
                                            </div>
                                            <div class="col-xl-4 check-info-user">
                                                <div class="upper">
                                                    <i class="fas fa-clock"></i>
                                                    <span>Giờ</span>
                                                </div>
                                                <div class="under check-gio">
                                                    8h30
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row mt-4">

                                            <div class="col-xl-6 check-info-user">
                                                <div class="upper">
                                                    <i class="fas fa-hand-holding-usd"></i>
                                                    <span>Phương thức thanh toán</span>
                                                </div>
                                                <div class="under">
                                                    Thanh toán tại quầy
                                                    <div class="img-1">
                                                        <img src="{{ asset('Site/images') }}/visa.png" alt="">
                                                        <img src="{{ asset('Site/images') }}/momo.png" alt="">
                                                        <img src="{{ asset('Site/images') }}/cash.png" alt="">
                                                        <img src="{{ asset('Site/images') }}/vnpay.png" alt="">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xl-6 check-info-user">
                                                <div class="upper">
                                                    <i class="fas fa-user-tie"></i>
                                                    <span>Chuyên viên Spa</span>
                                                </div>
                                                <div class="under check-nhanvien align-items-center">

                                                </div>
                                            </div>

                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-xl-12 check-info-user">
                                                <div class="upper">
                                                    <i class="fas fa-map-marker-alt"></i>
                                                    <span>Địa chỉ Spa</span>
                                                </div>
                                                <div class="under check-coso">
                                                    Toà nhà Innovation lô 24, Quang Trung, Quận 12, Thành phố Hồ Chí Minh
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mt-4">
                                            <div class="col-xl-12 check-info-user">
                                                <div class="upper">
                                                    <i class="fas fa-spa"></i>
                                                    <span>Dịch vụ đã chọn</span>
                                                </div>
                                                <div class="under">
                                                    <div class="table-custom mt-2">
                                                        <div class="head-title">
                                                            <div class="bg-table-custom">
                                                                <div class="row">
                                                                    <div class="col-xl-9 title-table">
                                                                        Tên dịch vụ
                                                                    </div>
                                                                    <div class="col-xl-3 title-table">
                                                                        Giá dịch vụ
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="body-table-custom">
                                                            <div class="bg-table-custom">
                                                                <div class="list-dichvu-selected">
                                                                    <div class="row align-items-center">
                                                                        <div class="col-xl-9 body-table-item">
                                                                            <div class="name-dichvu">
                                                                                Làm đẹp công nghệ cao
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-xl-3 body-table-item">
                                                                            <div class="gia-dichvu">
                                                                                300.000đ
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>


                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>

                                    <div class="control-slide-datlich d-flex">
                                        <button type="button" class="button-href-basic prev-step mr-auto">Quay lại</button>
                                        <button type="button" class="button-href-basic next-step dat-lich">Đặt lịch</button>
                                    </div>
                                </div>


                            </div>

                            <div class="control-short">
                                <div class="control-item active" data-step="0">
                                    <i class="fas fa-check icon-check"></i>
                                </div>
                                <div class="control-item" data-step="1">
                                    <i class="fas fa-check icon-check"></i>
                                </div>
                                <div class="control-item" data-step="2">
                                    <i class="fas fa-check icon-check"></i>
                                </div>
                                <div class="control-item final" data-step="3">
                                    <i class="fas fa-check icon-check"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-xl-6 pl-0 position-relative z-index-999">
                        <div class="bg-modal-1">

                        </div>
                    </div> --}}
                </div>

                <div class="close close-modal button-close-modal" type-modal="modal-datlich">
                    x
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    window.laravel_echo_port='{{env("LARAVEL_ECHO_PORT")}}';
</script>
<script src="//{{ Request::getHost() }}:{{env('LARAVEL_ECHO_PORT')}}/socket.io/socket.io.js"></script>
<script src="{{ url('/js/laravel-echo-setup.js') }}" type="text/javascript"></script>

<script type="text/javascript">
window.Echo.channel('laravel_database_datlich-channel')
    .listen('.DatLichEvent', (data) => {
        checkKhungGio(data.respon);
});
</script>
