@extends('Site.layout')

@section('title')
    Dịch Vụ - Tên Dịch Vụ
@endsection

@section('main')
@php
    $dongia1 = 0;
    $dongia2 = 0;

    $dongia1 = $detaildichvu->dongia - ($detaildichvu->dongia/100 * $detaildichvu->numbergg);
    $dongia2 = $detaildichvu->dongia - $detaildichvu->maxgg;

@endphp
<div class="fa-dichvu my-5" style="margin-bottom: 5em !important;">
    <div class="container">
        <div class="fa-dichvuchitiet">
            <div class="image w-100">
                <img src="{{ asset('uploads/'.$detaildichvu->img) }}" class="img-fluid" alt="">
            </div>

            <div class="dichvu-content box-shadow-1 blog-body">
                <h1 class=" font-weight-600">{{$detaildichvu->name}}</h1>
                <div class="box-gia">
                    <span class="giagiam">{{number_format($detaildichvu->dongia)}} đ </span>
                    <span class="gia left-bar">
                        @if ($detaildichvu->giamgia == 1)
                        {{number_format($dongia1)}} đ
                        @else
                        {{number_format($dongia2)}} đ
                        @endif</span>
                    <span class="name-danhmuc hover-pink left-bar"> {{$detaildichvu->namedm}}</span>
                </div>
                <div class="noidungngan mt-4">
                    <div class="border-z border-left-z"></div>
                    <p class="m-0"> {{$detaildichvu->motangan}}</p>
                    <div class="border-z border-right-z"></div>
                </div>

                <div class="mota mt-4 noidung">
                    <p>
                        <?php echo $detaildichvu->noidung;?>
                    </p>
                </div>

                <div class="d-flex justify-content-end">
                    <div class="button btn-8 btn-datlich btn-modal-main" type-modal="modal-datlich" data-show="one">
                        ĐẶT LỊCH NGAY
                    </div>
                </div>

            </div>

        </div>
    </div>
    @include('Site.components.gioithieulieutrinh')
</div>
@endsection

@section('javascript')
    <link rel="stylesheet" href="{{ asset('Site/css') }}/baiviet.css">
@endsection