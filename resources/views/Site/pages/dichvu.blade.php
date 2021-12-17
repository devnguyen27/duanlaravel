@extends('Site.layout')

@section('title')
    Dịch Vụ
@endsection

@section('main')
    <div class="fa-dichvu my-5">
        <div class="box-service">
            <div class="list-service-2">
                <div class="container position-relative z-index-1 p-0">
                    <div class="container">
                        <div class="d-flex align-items-center fa-header-service">
                            <div class="head-service-item service-title">
                                <div class="w-100 text-left">
                                    <div class="title-small color-main">
                                        LỰA CHỌN DỊCH VỤ
                                    </div>
                                    <div class="title-3">
                                        Bí Quyết Khỏe Và Đẹp
                                    </div>
                                </div>
                            </div>
                            <div class="head-service-item">
                                <div class="d-flex">
                                    <div class="d-flex align-items-center text-2 mr-4 lg-hide head-service-item service-title"
                                    style="color: #000000;">Tìm kiếm theo </div>

                                </div>

                            </div>
                        </div>
                    </div>


                    <div class="w-100">
                        <div class="box-dichvu">
                            <div class="row">
                                @foreach ($listDichVuUaChuong as $dichVuUaChuong)
                                    @if ($dichVuUaChuong->dichvu != null)
                                    <div class="col-xl-4 col-12 mt-5">
                                        <div class="dichvu-item w-100">
                                            <div class="content-1">
                                                <div class="text-7 color-main-1">
                                                    {{ $dichVuUaChuong->dichvu->namedm }}
                                                </div>

                                                <div class="img-1 mt-4">
                                                    <img class=""
                                                            src="{{ asset('uploads/')}}/{{ $dichVuUaChuong->dichvu->img }}"
                                                            alt="">
                                                </div>

                                                <div class="text-1 limit-text-row-1 mt-4">
                                                    {{ $dichVuUaChuong->dichvu->name }}
                                                </div>

                                                <div class="box-gia-dichvu mt-2">
                                                    @if ($dichVuUaChuong->dichvu->giamgia > 0)
                                                        @php
                                                            $giaSauGiam = $dichVuUaChuong->dichvu->dongia - ($dichVuUaChuong->dichvu->dongia * $dichVuUaChuong->dichvu->giamgia / 100);
                                                        @endphp
                                                        <span class="giagiam">{{ number_format($dichVuUaChuong->dichvu->dongia, 0) }} đ </span>
                                                        <span class="gia left-bar">
                                                    {{ number_format($giaSauGiam, 0)}} đ
                                                </span>
                                                    @else
                                                        <span class="gia">
                                                    {{ number_format($dichVuUaChuong->dichvu->dongia, 0) }} đ
                                                </span>
                                                    @endif

                                                </div>

                                                <p class="text-2 limit-text-row-3 mt-1 mt-2">
                                                    {{ $dichVuUaChuong->dichvu->motangan }}

                                                </p>
                                            </div>

                                        </div>
                                    </div>

                                    @endif
                                @endforeach

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="background-gray-1 mt-5 py-5">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="danhmuc-listblog">
                            <div class="head-blog-item blog-title">
                                <div class="w-100 text-left d-flex align-items-center">
                                    <div class="title-3 mr-4">
                                        Đang Giảm Giá
                                    </div>
                                    <div class="line-main-color ml-auto" style="width: 55%"></div>
                                </div>
                            </div>

                            <div class="list-dichvu mt-4">
                                <div class="row">
                                    <div class="owl-carousel owl-theme slide-dichvu" id="dich-vu-giam-gia">
                                    @foreach ($listDichVuGiamGia as $dichVuGiamGia)
                                        @php
                                            $giaSauGiam = $dichVuGiamGia->dongia - ($dichVuGiamGia->dongia * $dichVuGiamGia->giamgia / 100 );
                                        @endphp
                                        <div class="w-100">
                                            <div class="item-dichvu-2 m-3 bg-none"
                                                onclick="window.location='{{ asset('dich-vu') }}/{{$dichVuGiamGia->slug}}';">
                                                <div class="dichvu-header">
                                                    <div class="box-danhmuc-small d-flex align-items-center">
                                                        <img src="{{ asset('uploads/'.$dichVuGiamGia->icon) }}"
                                                            class="img-fluid" alt="">
                                                    </div>
                                                    <div class="img-dichvu">
                                                        <a href="{{ asset('dich-vu') }}/{{$dichVuGiamGia->slug}}">
                                                            <img src="{{ asset('uploads/'.$dichVuGiamGia->img) }}" alt="">
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="content mt-5 px-4 pb-3 background-none">
                                                    <div class="box-gia">
                                                        <span
                                                            class="giagiam">{{number_format($dichVuGiamGia->dongia)}} đ </span>
                                                        <span class="gia left-bar">
                                                        {{number_format($giaSauGiam)}} đ
                                                    </span>
                                                </div>
                                                <div class="name text-1 limit-text-row-1 px-5 mt-2">
                                                    {{$dichVuGiamGia->name}}
                                                </div>

                                                <p class="mota text-2 limit-text-row-3 mt-1 mt-2 text-center">
                                                    {{$dichVuGiamGia->motangan}}
                                                </p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="danhmuc-listblog  mt-5">
                            <div class="head-blog-item blog-title">
                                <div class="w-100 text-left d-flex align-items-center">
                                    <div class="title-3 mr-4">
                                        Ưa Chuộng Trong Tháng
                                    </div>
                                    <div class="line-main-color ml-auto" style="width: 55%"></div>
                                </div>
                            </div>

                            <div class="list-dichvu mt-4">
                                <div class="row">
                                    <div class="owl-carousel owl-theme slide-dichvu" id="dich-vu-ua-chuong">
                                    @foreach ($listDichVuUaChuong as $dichVuUaChuong)
                                        @if ($dichVuUaChuong->dichvu != null)
                                            @php
                                                $giaSauGiam = $dichVuUaChuong->dichvu->dongia - ($dichVuUaChuong->dichvu->dongia * $dichVuUaChuong->dichvu->giamgia / 100 );
                                            @endphp
                                            <div class="w-100">
                                                <div class="item-dichvu-2 m-3 bg-none"
                                                    onclick="window.location='{{ asset('dich-vu') }}/{{$dichVuUaChuong->dichvu->slug}}';">
                                                    <div class="dichvu-header">
                                                        <div class="box-danhmuc-small d-flex align-items-center">
                                                            <img src="{{ asset('uploads/'.$dichVuUaChuong->dichvu->icon) }}"
                                                                class="img-fluid" alt="">
                                                        </div>
                                                        <div class="img-dichvu">
                                                            <a href="{{ asset('dich-vu') }}/{{$dichVuUaChuong->dichvu->slug}}">
                                                                <img src="{{ asset('uploads/'.$dichVuUaChuong->dichvu->img) }}" alt="">
                                                            </a>

                                                        </div>
                                                    </div>

                                                    <div class="content mt-5 px-4 pb-3 background-none">
                                                        @if ($dichVuUaChuong->dichvu->giamgia > 0)
                                                            <div class="box-gia">
                                                                <span class="giagiam">{{number_format($dichVuUaChuong->dichvu->dongia)}} đ </span>
                                                                <span class="gia left-bar"> {{number_format($giaSauGiam)}} đ </span>
                                                            </div>
                                                        @else
                                                            <div class="box-gia">
                                                                <span class="gia">{{number_format($dichVuUaChuong->dichvu->dongia)}} đ </span>
                                                            </div>
                                                        @endif
                                                        <div class="name text-1 limit-text-row-1 px-5 mt-2">
                                                            {{$dichVuUaChuong->dichvu->name}}
                                                        </div>

                                                        <p class="mota text-2 limit-text-row-3 mt-1 mt-2 text-center">
                                                            {{$dichVuUaChuong->dichvu->motangan}}

                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('Site.components.gioithieulieutrinh')

        <div class="container my-5">
            <div class="w-100 text-center mb-4">
                <div class="title-small text-center" style="margin-top: 1em !important;">
                    Danh Mục
                </div>
                <div class="text-4">
                    Thể Loại Dịch Vụ
                </div>
            </div>

            <div class="row">
                @foreach ($listDanhMucDichVu1 as $danhmuclistdichvu)

                    <div class="col-xl-4">
                        <div class="danhmuc-2-item"
                             onclick="window.location='{{ asset('danh-muc-dich-vu') }}/{{$danhmuclistdichvu->slug}}';">
                            <div class="image">
                                <img src="{{ asset('uploads/'.$danhmuclistdichvu->img) }}" class="img-fluid" alt="">
                            </div>
                            <div class="content mt-1 px-5">
                                <h5 class="title">
                                    {{$danhmuclistdichvu->name}}
                                </h5>
                                <p class="text-2">

                                </p>
                            </div>
                        </div>
                    </div>

                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('javascript')

    <script src="{{ asset('Site/js') }}/dichvu.js"></script>

@endsection
