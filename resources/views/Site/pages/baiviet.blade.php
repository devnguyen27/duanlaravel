@extends('site.layout')

@section('title')
    Bài viết
@endsection

@section('main')
<div class="fa-baiviet mt-5">
    <div class="container">
        <div class="row">
            <div class="col-xl-9">
                <div class="box-blog">
                    <div class="list-blog p-0">
                        <div class="mb-4">
                            <div class="d-flex align-items-center">
                                    <div class="head-blog-item blog-title">
                                        <div class="w-100 text-left d-flex align-items-center">
                                            <div class="title-3 mr-4">
                                                Tin tức mới
                                            </div>
                                            <div class="line-main-color"></div>
                                        </div>
                                    </div>

                                    <div class="head-blog-item">
                                        <div class="d-flex">
                                            <div class="d-flex align-items-center text-2 mr-4">Tìm kiếm theo</div>
                                            <ul class="nav nav-tabs" id="myTab-1" role="tablist">
                                                <li class="nav-item" role="presentation">
                                                    <a class="nav-link btn-3 active" id="new-tab" data-toggle="tab" href="#new" role="tab" aria-controls="new" aria-selected="true">Mới nhất</a>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <a class="nav-link btn-3" id="lastweek-tab" data-toggle="tab" href="#lastweek" role="tab" aria-controls="lastweek" aria-selected="false">Tuần trước</a>
                                                </li>
                                            </ul>
                                        </div>

                                    </div>

                            </div>
                        </div>
                        <div class="list-tabs">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="new" role="tabpanel" aria-labelledby="new-tab">
                                    <div class="row">
                                        <div class="col-xl-6 pr-0">
                                            <div class="blog-bigsize">
                                                <div class="box-danhmuc">
                                                    {{$blog[0]->danhmuc}}"
                                                </div>

                                                <div class="img-1 w-100">
                                                    <img class="img-fluid"
                                                        src="{{ asset('uploads') }}/{{$blog[0]->img}}" alt="">
                                                </div>

                                                <div class="blog-content-bigsize">
                                                    <div class="blog-text-1 limit-text-row-2">
                                                        <a href="bai-viet/{{$blog[0]->slug}}">{{$blog[0]->name}}</a>
                                                    </div>
                                                    <div class="blog-text-2 mt-2">
                                                        <?php
                                                            $timestamp = strtotime($blog[0]->created_at);  
                                                            print date('d-m-y', $timestamp );
                                                            ?></span>
                                                    </div>
                                                    <div class="blog-text-3 text-2 mt-2 limit-text-row-3">
                                                        {{$blog[0]->motangan}}
                                                    </div>

                                                    <div class="mt-3">
                                                        <a href=""
                                                            class="">
                                                            <button class="
                                                            btn-line px-0 color-gray-2">
                                                            Đọc ngay
                                                            </button>
                                                        </a>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>

                                        <div class="col-xl-6 pl-0">
                                            <div class="list-blog-small pl-5">
                                                @foreach ($getBlog2 as $item)
                                                    <div class="small-blog-item box-tin-hv pt-0">
                                                        <div class="row">
                                                            <div class="col-xl-5">
                                                                <div class="img-1 image-tin-1">
                                                                    <img class="img-fluid"
                                                                        src="{{ asset('uploads') }}/{{$item->img}}"
                                                                        alt="">
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-7 pl-0 align-self-center">
                                                                <div class="row">
                                                                    <div class="col-xl-12 d-flex align-items-center color-gray-2 hover-color-black text-small-1">
                                                                        <div class="mr-3">
                                                                            <a href="" class="box-danhmuc-1">
                                                                               {{$item->danhmuc}} </a>
                                                                        </div>
                                                                        <span><?php
                                                                            $timestamp = strtotime($item->created_at);  
                                                                            print date('d-m-y', $timestamp );
                                                                            ?></span>
                                                                    </div>
                                                                </div>
                                                                <div class="text-bl-1 limit-text-row-2 mb-2 mt-1">
                                                                    <a href="bai-viet/{{$item->slug}}" class="hover-pink">{{$item->name}}</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="lastweek" role="tabpanel" aria-labelledby="lastweek-tab">
                                    <div class="row">
                                        <div class="col-xl-7 pr-0">
                                            <div class="blog-bigsize">
                                                <div class="box-danhmuc">
                                                    {{$blog3[0]->danhmuc}}"
                                                </div>

                                                <div class="img-1 w-100">
                                                    <img class="img-fluid"
                                                        src="{{ asset('uploads') }}/{{$blog3[0]->img}}" alt="">
                                                </div>

                                                <div class="blog-content-bigsize">
                                                    <div class="blog-text-1 limit-text-row-2">
                                                        <a href="bai-viet/{{$item->slug}}">{{$blog3[0]->name}}</a>
                                                    </div>
                                                    <div class="blog-text-2 mt-2">
                                                        <?php
                                                            $timestamp = strtotime($blog3[0]->created_at);  
                                                            print date('d-m-y', $timestamp );
                                                            ?>
                                                    </div>
                                                    <div class="blog-text-3 text-2 mt-2 limit-text-row-3">
                                                        {{$blog3[0]->motangan}}
                                                    </div>

                                                    <div class="mt-3">
                                                        <a href=""
                                                            class="">
                                                            <button class="
                                                            btn-line px-0 color-gray-2">
                                                            Đọc ngay
                                                            </button>
                                                        </a>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>

                                        <div class="col-xl-5 pl-0">
                                            <div class="list-blog-small pl-5">
                                                @foreach ($blog4 as $item)
                                                    <div class="small-blog-item box-tin-hv pt-0">
                                                        <div class="row">
                                                            <div class="col-xl-5">
                                                                <div class="img-1 image-tin-1">
                                                                    <img class="img-fluid"
                                                                        src="{{ asset('uploads') }}/{{$item->img}}"
                                                                        alt="">
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-7 pl-0 align-self-center">
                                                                <div class="row">
                                                                    <div class="col-xl-12 d-flex align-items-center color-gray-2 hover-color-black text-small-1">
                                                                        <div class="mr-3">
                                                                            <a href="" class="box-danhmuc-1">
                                                                            {{$item->danhmuc}} </a>
                                                                        </div>
                                                                        <span><?php
                                                                            $timestamp = strtotime($item->created_at);  
                                                                            print date('d-m-y', $timestamp );
                                                                            ?></span>
                                                                    </div>
                                                                </div>
                                                                <div class="text-bl-1 limit-text-row-2 mb-2 mt-1">
                                                                    <a href="bai-viet/{{$item->slug}}" class="hover-pink">{{$item->name}}</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3">
                @include('Site.components.danhmuc-baiviet')
            </div>
        </div>

        <div class="">
            <div class="box-tin-1">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4">
                            <div class="d-flex align-items-center mb-4">
                                <div class="head-blog-item blog-title">
                                    <div class="w-100 text-left d-flex align-items-center">
                                        <div class="title-3 mr-4">
                                            Tin tức mới
                                        </div>
                                        <div class="line-main-color"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="slide-tin-1">
                                <div class="tin-item-1">
                                    <div class="image-tin-1">
                                        <img class="img-fluid" src="{{ asset('uploads') }}/{{$blog[0]->img}}" alt="">
                                    </div>
                                    <div class="content-tin background-white">
                                        <div class="row">
                                            <div class="col-xl-12 d-flex align-items-center color-gray-2 hover-color-black text-small-1">
                                                <div class="mr-3">
                                                    <a href="" class="box-danhmuc-1">
                                                        {{$blog[0]->danhmuc}}</a>
                                                </div>
                                                <span>{{$blog[0]->created_at}}</span>
                                            </div>
                                        </div>
                                        <div class="text-bl-1 limit-text-row-2 mb-2 mt-3">
                                            <a href="bai-viet/{{$item->slug}}" class="hover-pink">
                                                {{$blog[0]->name}}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-5">
                            <div class="box-tin-2 d-flex flex-column h-100">
                                @foreach ($blognew as $item)
                                    <div class="child-box-tin-2 d-flex align-items-end" style="background: url('{{ asset('uploads') }}/{{$item->img}}')">
                                        <div class="content-tin background-white">
                                            <div class="row">
                                                <div class="col-xl-12 d-flex align-items-center color-gray-2 hover-color-black text-small-1">
                                                    <div class="mr-3">
                                                        <a href="" class="box-danhmuc-1 maincolor">
                                                        {{$item->danhmuc}}</a>
                                                    </div>
                                                    <span class="color-gray-5 fz-1em2">{{$item->created_at}}</span>
                                                </div>
                                            </div>
                                            <div class="text-bl-1 limit-text-row-2 mb-2 mt-3">
                                                <a href="bai-viet/{{$item->slug}}"  class="color-white hover-pink fz-1em2 font-weight-600">
                                                    {{$item->name}}</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                

                                {{-- <div class="child-box-tin-2 d-flex align-items-end" style="background: url('{{ asset('Site/images') }}/toa-heftiba-a9pFSC8dTlo-unsplash.jpg')">
                                    <div class="content-tin background-white">
                                        <div class="row">
                                            <div class="col-xl-12 d-flex align-items-center color-gray-2 hover-color-black text-small-1">
                                                <div class="mr-3">
                                                    <a href="" class="box-danhmuc-1 maincolor">
                                                    Sức khỏe</a>
                                                </div>
                                                <span class="color-gray-5 fz-1em2">Thứ ba, 26/10/2021, 21:00 (GMT+7)</span>
                                            </div>
                                        </div>
                                        <div class="text-bl-1 limit-text-row-2 mb-2 mt-3">
                                            <a href="" class="color-white hover-pink fz-1em2 font-weight-600">Review Noir. Spa, Trải Nghiệm Thư Giãn Trong Bóng Đêm Siêu Độc Ở</a>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                        <div class="col-xl-3">
                            @include('Site.components.list-social')
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="all-blog mt-5 mb-5">
            <div class="container">
                <div class="row">
                    <div class="col-xl-9">
                        <div class="danhmuc-listblog">
                            <div class="head-blog-item blog-title">
                                <div class="w-100 text-left d-flex align-items-center">
                                    <div class="title-3 mr-4">
                                        Danh Mục
                                    </div>
                                    <div class="line-main-color ml-auto" style="width: 75%"></div>
                                </div>
                            </div>

                            <div class="list-blog-1 mt-4">
                                <div class="row mb-30px">
                                    <div class="col-xl-4">
                                        <div class="tin-item-1 box-tin-hv">
                                            <div class="image-tin-1" style="height: 220px">
                                                <img class="img-fluid" src="{{ asset('Site/images') }}/toa-heftiba-a9pFSC8dTlo-unsplash.jpg" alt="">
                                            </div>
                                            <div class="content-tin-3 background-white">
                                                <div class="row">
                                                    <div class="col-xl-12 d-flex align-items-center color-gray-2 hover-color-black text-small-1">
                                                        <div class="mr-3">
                                                            <a href="" class="box-danhmuc-1">
                                                            Sức khỏe</a>
                                                        </div>
                                                        <span>Thứ ba, 26/10/2021, 21:00</span>
                                                    </div>
                                                </div>
                                                <div class="text-bl-1 limit-text-row-2 mb-1 mt-3">
                                                    <a href="" class="hover-pink">Review Noir. Spa, Trải Nghiệm Thư Giãn Trong Bóng Đêm Siêu Độc Ở</a>
                                                </div>
                                                <p class="blog-mota mb-0">
                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor in cididunt ut labore et dolore
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-4">
                                        <div class="tin-item-1 box-tin-hv">
                                            <div class="image-tin-1" style="height: 220px">
                                                <img class="img-fluid" src="{{ asset('Site/images') }}/toa-heftiba-a9pFSC8dTlo-unsplash.jpg" alt="">
                                            </div>
                                            <div class="content-tin-3 background-white">
                                                <div class="row">
                                                    <div class="col-xl-12 d-flex align-items-center color-gray-2 hover-color-black text-small-1">
                                                        <div class="mr-3">
                                                            <a href="" class="box-danhmuc-1">
                                                            Sức khỏe</a>
                                                        </div>
                                                        <span>Thứ ba, 26/10/2021, 21:00</span>
                                                    </div>
                                                </div>
                                                <div class="text-bl-1 limit-text-row-2 mb-1 mt-3">
                                                    <a href="" class="hover-pink">Review Noir. Spa, Trải Nghiệm Thư Giãn Trong Bóng Đêm Siêu Độc Ở</a>
                                                </div>
                                                <p class="blog-mota mb-0">
                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor in cididunt ut labore et dolore
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-4 ">
                                        <div class="tin-item-1 box-tin-hv">
                                            <div class="image-tin-1" style="height: 220px">
                                                <img class="img-fluid" src="{{ asset('Site/images') }}/toa-heftiba-a9pFSC8dTlo-unsplash.jpg" alt="">
                                            </div>
                                            <div class="content-tin-3 background-white">
                                                <div class="row">
                                                    <div class="col-xl-12 d-flex align-items-center color-gray-2 hover-color-black text-small-1">
                                                        <div class="mr-3">
                                                            <a href="" class="box-danhmuc-1">
                                                            Sức khỏe</a>
                                                        </div>
                                                        <span>Thứ ba, 26/10/2021, 21:00</span>
                                                    </div>
                                                </div>
                                                <div class="text-bl-1 limit-text-row-2 mb-1 mt-3">
                                                    <a href="" class="hover-pink">Review Noir. Spa, Trải Nghiệm Thư Giãn Trong Bóng Đêm Siêu Độc Ở</a>
                                                </div>
                                                <p class="blog-mota mb-0">
                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor in cididunt ut labore et dolore
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3">
                        @include('Site.components.baivietmoi')
                    </div>
                </div>
            </div>
        </div>

        <div class="list-blog-quantam">
            <div class="background-overlay">
                <div class="container">
                    <div class="blog-quantam">
                        <div class="head-blog-item blog-title">
                            <div class="w-100 text-left d-flex align-items-center">
                                <div class="title-3 mr-4 color-white">
                                    Xu hướng tìm kiếm
                                </div>
                                <div class="line-main-color ml-auto" style="width: 75%"></div>
                            </div>
                        </div>
                        <div class="body mt-4">
                            <div class="row">
                                <div class="col-xl-3">
                                    <div class="tin-item-1">
                                        <div class="image-tin-1 " style="height: 180px;">
                                            <img class="img-fluid " src="http://127.0.0.1:8000/Site/images/toa-heftiba-a9pFSC8dTlo-unsplash.jpg" alt="">
                                        </div>
                                        <div class="content-tin background-none pt-4 p-0">
                                            <div class="row">
                                                <div class="col-xl-12 d-flex align-items-center color-gray-2 hover-color-black text-small-1">
                                                    <div class="mr-3">
                                                        <a href="" class="box-danhmuc-1 maincolor">
                                                        Sức khỏe</a>
                                                    </div>
                                                    <span class="color-gray-6">Thứ ba, 26/10/2021, 21:00</span>
                                                </div>
                                            </div>
                                            <div class="text-bl-1 limit-text-row-2 mb-2 mt-3">
                                                <a href="" class="hover-pink color-white fz-1em font-weight-600">Review Noir. Spa, Trải Nghiệm Thư Giãn Trong Bóng Đêm Siêu Độc Ở</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-3">
                                    <div class="tin-item-1">
                                        <div class="image-tin-1 " style="height: 180px;">
                                            <img class="img-fluid " src="http://127.0.0.1:8000/Site/images/toa-heftiba-a9pFSC8dTlo-unsplash.jpg" alt="">
                                        </div>
                                        <div class="content-tin background-none pt-4 p-0">
                                            <div class="row">
                                                <div class="col-xl-12 d-flex align-items-center color-gray-2 hover-color-black text-small-1">
                                                    <div class="mr-3">
                                                        <a href="" class="box-danhmuc-1 maincolor">
                                                        Sức khỏe</a>
                                                    </div>
                                                    <span class="color-gray-6">Thứ ba, 26/10/2021, 21:00</span>
                                                </div>
                                            </div>
                                            <div class="text-bl-1 limit-text-row-2 mb-2 mt-3">
                                                <a href="" class="hover-pink color-white fz-1em font-weight-600">Review Noir. Spa, Trải Nghiệm Thư Giãn Trong Bóng Đêm Siêu Độc Ở</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-3">
                                    <div class="tin-item-1">
                                        <div class="image-tin-1 " style="height: 180px;">
                                            <img class="img-fluid " src="http://127.0.0.1:8000/Site/images/toa-heftiba-a9pFSC8dTlo-unsplash.jpg" alt="">
                                        </div>
                                        <div class="content-tin background-none pt-4 p-0">
                                            <div class="row">
                                                <div class="col-xl-12 d-flex align-items-center color-gray-2 hover-color-black text-small-1">
                                                    <div class="mr-3">
                                                        <a href="" class="box-danhmuc-1 maincolor">
                                                        Sức khỏe</a>
                                                    </div>
                                                    <span class="color-gray-6">Thứ ba, 26/10/2021, 21:00</span>
                                                </div>
                                            </div>
                                            <div class="text-bl-1 limit-text-row-2 mb-2 mt-3">
                                                <a href="" class="hover-pink color-white fz-1em font-weight-600">Review Noir. Spa, Trải Nghiệm Thư Giãn Trong Bóng Đêm Siêu Độc Ở</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-3">
                                    <div class="tin-item-1">
                                        <div class="image-tin-1 " style="height: 180px;">
                                            <img class="img-fluid " src="http://127.0.0.1:8000/Site/images/toa-heftiba-a9pFSC8dTlo-unsplash.jpg" alt="">
                                        </div>
                                        <div class="content-tin background-none pt-4 p-0">
                                            <div class="row">
                                                <div class="col-xl-12 d-flex align-items-center color-gray-2 hover-color-black text-small-1">
                                                    <div class="mr-3">
                                                        <a href="" class="box-danhmuc-1 maincolor">
                                                        Sức khỏe</a>
                                                    </div>
                                                    <span class="color-gray-6">Thứ ba, 26/10/2021, 21:00</span>
                                                </div>
                                            </div>
                                            <div class="text-bl-1 limit-text-row-2 mb-2 mt-3">
                                                <a href="" class="hover-pink color-white fz-1em font-weight-600">Review Noir. Spa, Trải Nghiệm Thư Giãn Trong Bóng Đêm Siêu Độc Ở</a>
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

        <div class="all-blog mt-5 mb-5">
            <div class="container">
                <div class="row">
                    <div class="col-xl-9">
                        @foreach ($danhmuc as $item)
                            <div class="danhmuc-listblog">
                                <div class="head-blog-item blog-title">
                                    <div class="w-100 text-left d-flex align-items-center">
                                        <div class="title-3 mr-4">
                                            {{$item->name}}
                                        </div>
                                        <div class="line-main-color ml-auto" style="width: 75%"></div>
                                    </div>
                                </div>

                                <div class="list-blog-1 mt-4">
                                    <div class="row mb-30px">
                                        <div class="col-xl-4">
                                            <div class="tin-item-1 box-tin-hv">
                                                <div class="image-tin-1" style="height: 220px">
                                                    <img class="img-fluid" src="{{ asset('Site/images') }}/toa-heftiba-a9pFSC8dTlo-unsplash.jpg" alt="">
                                                </div>
                                                <div class="content-tin-3 background-white">
                                                    <div class="row">
                                                        <div class="col-xl-12 d-flex align-items-center color-gray-2 hover-color-black text-small-1">
                                                            <div class="mr-3">
                                                                <a href="" class="box-danhmuc-1">
                                                                Sức khỏe</a>
                                                            </div>
                                                            <span>Thứ ba, 26/10/2021, 21:00</span>
                                                        </div>
                                                    </div>
                                                    <div class="text-bl-1 limit-text-row-2 mb-1 mt-3">
                                                        <a href="" class="hover-pink">Review Noir. Spa, Trải Nghiệm Thư Giãn Trong Bóng Đêm Siêu Độc Ở</a>
                                                    </div>
                                                    <p class="blog-mota mb-0">
                                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor in cididunt ut labore et dolore
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-4">
                                            <div class="tin-item-1 box-tin-hv">
                                                <div class="image-tin-1" style="height: 220px">
                                                    <img class="img-fluid" src="{{ asset('Site/images') }}/toa-heftiba-a9pFSC8dTlo-unsplash.jpg" alt="">
                                                </div>
                                                <div class="content-tin-3 background-white">
                                                    <div class="row">
                                                        <div class="col-xl-12 d-flex align-items-center color-gray-2 hover-color-black text-small-1">
                                                            <div class="mr-3">
                                                                <a href="" class="box-danhmuc-1">
                                                                Sức khỏe</a>
                                                            </div>
                                                            <span>Thứ ba, 26/10/2021, 21:00</span>
                                                        </div>
                                                    </div>
                                                    <div class="text-bl-1 limit-text-row-2 mb-1 mt-3">
                                                        <a href="" class="hover-pink">Review Noir. Spa, Trải Nghiệm Thư Giãn Trong Bóng Đêm Siêu Độc Ở</a>
                                                    </div>
                                                    <p class="blog-mota mb-0">
                                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor in cididunt ut labore et dolore
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-4 ">
                                            <div class="tin-item-1 box-tin-hv">
                                                <div class="image-tin-1" style="height: 220px">
                                                    <img class="img-fluid" src="{{ asset('Site/images') }}/toa-heftiba-a9pFSC8dTlo-unsplash.jpg" alt="">
                                                </div>
                                                <div class="content-tin-3 background-white">
                                                    <div class="row">
                                                        <div class="col-xl-12 d-flex align-items-center color-gray-2 hover-color-black text-small-1">
                                                            <div class="mr-3">
                                                                <a href="" class="box-danhmuc-1">
                                                                Sức khỏe</a>
                                                            </div>
                                                            <span>Thứ ba, 26/10/2021, 21:00</span>
                                                        </div>
                                                    </div>
                                                    <div class="text-bl-1 limit-text-row-2 mb-1 mt-3">
                                                        <a href="" class="hover-pink">Review Noir. Spa, Trải Nghiệm Thư Giãn Trong Bóng Đêm Siêu Độc Ở</a>
                                                    </div>
                                                    <p class="blog-mota mb-0">
                                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor in cididunt ut labore et dolore
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-30px">
                                        <div class="col-xl-4">
                                            <div class="tin-item-1 box-tin-hv">
                                                <div class="image-tin-1" style="height: 220px">
                                                    <img class="img-fluid" src="{{ asset('Site/images') }}/toa-heftiba-a9pFSC8dTlo-unsplash.jpg" alt="">
                                                </div>
                                                <div class="content-tin-3 background-white">
                                                    <div class="row">
                                                        <div class="col-xl-12 d-flex align-items-center color-gray-2 hover-color-black text-small-1">
                                                            <div class="mr-3">
                                                                <a href="" class="box-danhmuc-1">
                                                                Sức khỏe</a>
                                                            </div>
                                                            <span>Thứ ba, 26/10/2021, 21:00</span>
                                                        </div>
                                                    </div>
                                                    <div class="text-bl-1 limit-text-row-2 mb-1 mt-3">
                                                        <a href="" class="hover-pink">Review Noir. Spa, Trải Nghiệm Thư Giãn Trong Bóng Đêm Siêu Độc Ở</a>
                                                    </div>
                                                    <p class="blog-mota mb-0">
                                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor in cididunt ut labore et dolore
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-4">
                                            <div class="tin-item-1 box-tin-hv">
                                                <div class="image-tin-1" style="height: 220px">
                                                    <img class="img-fluid" src="{{ asset('Site/images') }}/toa-heftiba-a9pFSC8dTlo-unsplash.jpg" alt="">
                                                </div>
                                                <div class="content-tin-3 background-white">
                                                    <div class="row">
                                                        <div class="col-xl-12 d-flex align-items-center color-gray-2 hover-color-black text-small-1">
                                                            <div class="mr-3">
                                                                <a href="" class="box-danhmuc-1">
                                                                Sức khỏe</a>
                                                            </div>
                                                            <span>Thứ ba, 26/10/2021, 21:00</span>
                                                        </div>
                                                    </div>
                                                    <div class="text-bl-1 limit-text-row-2 mb-1 mt-3">
                                                        <a href="" class="hover-pink">Review Noir. Spa, Trải Nghiệm Thư Giãn Trong Bóng Đêm Siêu Độc Ở</a>
                                                    </div>
                                                    <p class="blog-mota mb-0">
                                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor in cididunt ut labore et dolore
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-4 ">
                                            <div class="tin-item-1 box-tin-hv">
                                                <div class="image-tin-1" style="height: 220px">
                                                    <img class="img-fluid" src="{{ asset('Site/images') }}/toa-heftiba-a9pFSC8dTlo-unsplash.jpg" alt="">
                                                </div>
                                                <div class="content-tin-3 background-white">
                                                    <div class="row">
                                                        <div class="col-xl-12 d-flex align-items-center color-gray-2 hover-color-black text-small-1">
                                                            <div class="mr-3">
                                                                <a href="" class="box-danhmuc-1">
                                                                Sức khỏe</a>
                                                            </div>
                                                            <span>Thứ ba, 26/10/2021, 21:00</span>
                                                        </div>
                                                    </div>
                                                    <div class="text-bl-1 limit-text-row-2 mb-1 mt-3">
                                                        <a href="" class="hover-pink">Review Noir. Spa, Trải Nghiệm Thư Giãn Trong Bóng Đêm Siêu Độc Ở</a>
                                                    </div>
                                                    <p class="blog-mota mb-0">
                                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor in cididunt ut labore et dolore
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        @endforeach
                        {{-- <div class="danhmuc-listblog">
                            <div class="head-blog-item blog-title">
                                <div class="w-100 text-left d-flex align-items-center">
                                    <div class="title-3 mr-4">
                                        Danh Mục
                                    </div>
                                    <div class="line-main-color ml-auto" style="width: 75%"></div>
                                </div>
                            </div>

                            <div class="list-blog-1 mt-4">
                                <div class="row mb-30px">
                                    <div class="col-xl-4">
                                        <div class="tin-item-1 box-tin-hv">
                                            <div class="image-tin-1" style="height: 220px">
                                                <img class="img-fluid" src="{{ asset('Site/images') }}/toa-heftiba-a9pFSC8dTlo-unsplash.jpg" alt="">
                                            </div>
                                            <div class="content-tin-3 background-white">
                                                <div class="row">
                                                    <div class="col-xl-12 d-flex align-items-center color-gray-2 hover-color-black text-small-1">
                                                        <div class="mr-3">
                                                            <a href="" class="box-danhmuc-1">
                                                            Sức khỏe</a>
                                                        </div>
                                                        <span>Thứ ba, 26/10/2021, 21:00</span>
                                                    </div>
                                                </div>
                                                <div class="text-bl-1 limit-text-row-2 mb-1 mt-3">
                                                    <a href="" class="hover-pink">Review Noir. Spa, Trải Nghiệm Thư Giãn Trong Bóng Đêm Siêu Độc Ở</a>
                                                </div>
                                                <p class="blog-mota mb-0">
                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor in cididunt ut labore et dolore
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-4">
                                        <div class="tin-item-1 box-tin-hv">
                                            <div class="image-tin-1" style="height: 220px">
                                                <img class="img-fluid" src="{{ asset('Site/images') }}/toa-heftiba-a9pFSC8dTlo-unsplash.jpg" alt="">
                                            </div>
                                            <div class="content-tin-3 background-white">
                                                <div class="row">
                                                    <div class="col-xl-12 d-flex align-items-center color-gray-2 hover-color-black text-small-1">
                                                        <div class="mr-3">
                                                            <a href="" class="box-danhmuc-1">
                                                            Sức khỏe</a>
                                                        </div>
                                                        <span>Thứ ba, 26/10/2021, 21:00</span>
                                                    </div>
                                                </div>
                                                <div class="text-bl-1 limit-text-row-2 mb-1 mt-3">
                                                    <a href="" class="hover-pink">Review Noir. Spa, Trải Nghiệm Thư Giãn Trong Bóng Đêm Siêu Độc Ở</a>
                                                </div>
                                                <p class="blog-mota mb-0">
                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor in cididunt ut labore et dolore
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-4 ">
                                        <div class="tin-item-1 box-tin-hv">
                                            <div class="image-tin-1" style="height: 220px">
                                                <img class="img-fluid" src="{{ asset('Site/images') }}/toa-heftiba-a9pFSC8dTlo-unsplash.jpg" alt="">
                                            </div>
                                            <div class="content-tin-3 background-white">
                                                <div class="row">
                                                    <div class="col-xl-12 d-flex align-items-center color-gray-2 hover-color-black text-small-1">
                                                        <div class="mr-3">
                                                            <a href="" class="box-danhmuc-1">
                                                            Sức khỏe</a>
                                                        </div>
                                                        <span>Thứ ba, 26/10/2021, 21:00</span>
                                                    </div>
                                                </div>
                                                <div class="text-bl-1 limit-text-row-2 mb-1 mt-3">
                                                    <a href="" class="hover-pink">Review Noir. Spa, Trải Nghiệm Thư Giãn Trong Bóng Đêm Siêu Độc Ở</a>
                                                </div>
                                                <p class="blog-mota mb-0">
                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor in cididunt ut labore et dolore
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-30px">
                                    <div class="col-xl-4">
                                        <div class="tin-item-1 box-tin-hv">
                                            <div class="image-tin-1" style="height: 220px">
                                                <img class="img-fluid" src="{{ asset('Site/images') }}/toa-heftiba-a9pFSC8dTlo-unsplash.jpg" alt="">
                                            </div>
                                            <div class="content-tin-3 background-white">
                                                <div class="row">
                                                    <div class="col-xl-12 d-flex align-items-center color-gray-2 hover-color-black text-small-1">
                                                        <div class="mr-3">
                                                            <a href="" class="box-danhmuc-1">
                                                            Sức khỏe</a>
                                                        </div>
                                                        <span>Thứ ba, 26/10/2021, 21:00</span>
                                                    </div>
                                                </div>
                                                <div class="text-bl-1 limit-text-row-2 mb-1 mt-3">
                                                    <a href="" class="hover-pink">Review Noir. Spa, Trải Nghiệm Thư Giãn Trong Bóng Đêm Siêu Độc Ở</a>
                                                </div>
                                                <p class="blog-mota mb-0">
                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor in cididunt ut labore et dolore
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-4">
                                        <div class="tin-item-1 box-tin-hv">
                                            <div class="image-tin-1" style="height: 220px">
                                                <img class="img-fluid" src="{{ asset('Site/images') }}/toa-heftiba-a9pFSC8dTlo-unsplash.jpg" alt="">
                                            </div>
                                            <div class="content-tin-3 background-white">
                                                <div class="row">
                                                    <div class="col-xl-12 d-flex align-items-center color-gray-2 hover-color-black text-small-1">
                                                        <div class="mr-3">
                                                            <a href="" class="box-danhmuc-1">
                                                            Sức khỏe</a>
                                                        </div>
                                                        <span>Thứ ba, 26/10/2021, 21:00</span>
                                                    </div>
                                                </div>
                                                <div class="text-bl-1 limit-text-row-2 mb-1 mt-3">
                                                    <a href="" class="hover-pink">Review Noir. Spa, Trải Nghiệm Thư Giãn Trong Bóng Đêm Siêu Độc Ở</a>
                                                </div>
                                                <p class="blog-mota mb-0">
                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor in cididunt ut labore et dolore
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-4 ">
                                        <div class="tin-item-1 box-tin-hv">
                                            <div class="image-tin-1" style="height: 220px">
                                                <img class="img-fluid" src="{{ asset('Site/images') }}/toa-heftiba-a9pFSC8dTlo-unsplash.jpg" alt="">
                                            </div>
                                            <div class="content-tin-3 background-white">
                                                <div class="row">
                                                    <div class="col-xl-12 d-flex align-items-center color-gray-2 hover-color-black text-small-1">
                                                        <div class="mr-3">
                                                            <a href="" class="box-danhmuc-1">
                                                            Sức khỏe</a>
                                                        </div>
                                                        <span>Thứ ba, 26/10/2021, 21:00</span>
                                                    </div>
                                                </div>
                                                <div class="text-bl-1 limit-text-row-2 mb-1 mt-3">
                                                    <a href="" class="hover-pink">Review Noir. Spa, Trải Nghiệm Thư Giãn Trong Bóng Đêm Siêu Độc Ở</a>
                                                </div>
                                                <p class="blog-mota mb-0">
                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor in cididunt ut labore et dolore
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="danhmuc-listblog">
                            <div class="head-blog-item blog-title">
                                <div class="w-100 text-left d-flex align-items-center">
                                    <div class="title-3 mr-4">
                                        Danh Mục
                                    </div>
                                    <div class="line-main-color ml-auto" style="width: 75%"></div>
                                </div>
                            </div>

                            <div class="list-blog-1 mt-4">
                                <div class="row mb-30px">
                                    <div class="col-xl-4">
                                        <div class="tin-item-1 box-tin-hv">
                                            <div class="image-tin-1" style="height: 220px">
                                                <img class="img-fluid" src="{{ asset('Site/images') }}/toa-heftiba-a9pFSC8dTlo-unsplash.jpg" alt="">
                                            </div>
                                            <div class="content-tin-3 background-white">
                                                <div class="row">
                                                    <div class="col-xl-12 d-flex align-items-center color-gray-2 hover-color-black text-small-1">
                                                        <div class="mr-3">
                                                            <a href="" class="box-danhmuc-1">
                                                            Sức khỏe</a>
                                                        </div>
                                                        <span>Thứ ba, 26/10/2021, 21:00</span>
                                                    </div>
                                                </div>
                                                <div class="text-bl-1 limit-text-row-2 mb-1 mt-3">
                                                    <a href="" class="hover-pink">Review Noir. Spa, Trải Nghiệm Thư Giãn Trong Bóng Đêm Siêu Độc Ở</a>
                                                </div>
                                                <p class="blog-mota mb-0">
                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor in cididunt ut labore et dolore
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-4">
                                        <div class="tin-item-1 box-tin-hv">
                                            <div class="image-tin-1" style="height: 220px">
                                                <img class="img-fluid" src="{{ asset('Site/images') }}/toa-heftiba-a9pFSC8dTlo-unsplash.jpg" alt="">
                                            </div>
                                            <div class="content-tin-3 background-white">
                                                <div class="row">
                                                    <div class="col-xl-12 d-flex align-items-center color-gray-2 hover-color-black text-small-1">
                                                        <div class="mr-3">
                                                            <a href="" class="box-danhmuc-1">
                                                            Sức khỏe</a>
                                                        </div>
                                                        <span>Thứ ba, 26/10/2021, 21:00</span>
                                                    </div>
                                                </div>
                                                <div class="text-bl-1 limit-text-row-2 mb-1 mt-3">
                                                    <a href="" class="hover-pink">Review Noir. Spa, Trải Nghiệm Thư Giãn Trong Bóng Đêm Siêu Độc Ở</a>
                                                </div>
                                                <p class="blog-mota mb-0">
                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor in cididunt ut labore et dolore
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-4 ">
                                        <div class="tin-item-1 box-tin-hv">
                                            <div class="image-tin-1" style="height: 220px">
                                                <img class="img-fluid" src="{{ asset('Site/images') }}/toa-heftiba-a9pFSC8dTlo-unsplash.jpg" alt="">
                                            </div>
                                            <div class="content-tin-3 background-white">
                                                <div class="row">
                                                    <div class="col-xl-12 d-flex align-items-center color-gray-2 hover-color-black text-small-1">
                                                        <div class="mr-3">
                                                            <a href="" class="box-danhmuc-1">
                                                            Sức khỏe</a>
                                                        </div>
                                                        <span>Thứ ba, 26/10/2021, 21:00</span>
                                                    </div>
                                                </div>
                                                <div class="text-bl-1 limit-text-row-2 mb-1 mt-3">
                                                    <a href="" class="hover-pink">Review Noir. Spa, Trải Nghiệm Thư Giãn Trong Bóng Đêm Siêu Độc Ở</a>
                                                </div>
                                                <p class="blog-mota mb-0">
                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor in cididunt ut labore et dolore
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-30px">
                                    <div class="col-xl-4">
                                        <div class="tin-item-1 box-tin-hv">
                                            <div class="image-tin-1" style="height: 220px">
                                                <img class="img-fluid" src="{{ asset('Site/images') }}/toa-heftiba-a9pFSC8dTlo-unsplash.jpg" alt="">
                                            </div>
                                            <div class="content-tin-3 background-white">
                                                <div class="row">
                                                    <div class="col-xl-12 d-flex align-items-center color-gray-2 hover-color-black text-small-1">
                                                        <div class="mr-3">
                                                            <a href="" class="box-danhmuc-1">
                                                            Sức khỏe</a>
                                                        </div>
                                                        <span>Thứ ba, 26/10/2021, 21:00</span>
                                                    </div>
                                                </div>
                                                <div class="text-bl-1 limit-text-row-2 mb-1 mt-3">
                                                    <a href="" class="hover-pink">Review Noir. Spa, Trải Nghiệm Thư Giãn Trong Bóng Đêm Siêu Độc Ở</a>
                                                </div>
                                                <p class="blog-mota mb-0">
                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor in cididunt ut labore et dolore
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-4">
                                        <div class="tin-item-1 box-tin-hv">
                                            <div class="image-tin-1" style="height: 220px">
                                                <img class="img-fluid" src="{{ asset('Site/images') }}/toa-heftiba-a9pFSC8dTlo-unsplash.jpg" alt="">
                                            </div>
                                            <div class="content-tin-3 background-white">
                                                <div class="row">
                                                    <div class="col-xl-12 d-flex align-items-center color-gray-2 hover-color-black text-small-1">
                                                        <div class="mr-3">
                                                            <a href="" class="box-danhmuc-1">
                                                            Sức khỏe</a>
                                                        </div>
                                                        <span>Thứ ba, 26/10/2021, 21:00</span>
                                                    </div>
                                                </div>
                                                <div class="text-bl-1 limit-text-row-2 mb-1 mt-3">
                                                    <a href="" class="hover-pink">Review Noir. Spa, Trải Nghiệm Thư Giãn Trong Bóng Đêm Siêu Độc Ở</a>
                                                </div>
                                                <p class="blog-mota mb-0">
                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor in cididunt ut labore et dolore
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-4 ">
                                        <div class="tin-item-1 box-tin-hv">
                                            <div class="image-tin-1" style="height: 220px">
                                                <img class="img-fluid" src="{{ asset('Site/images') }}/toa-heftiba-a9pFSC8dTlo-unsplash.jpg" alt="">
                                            </div>
                                            <div class="content-tin-3 background-white">
                                                <div class="row">
                                                    <div class="col-xl-12 d-flex align-items-center color-gray-2 hover-color-black text-small-1">
                                                        <div class="mr-3">
                                                            <a href="" class="box-danhmuc-1">
                                                            Sức khỏe</a>
                                                        </div>
                                                        <span>Thứ ba, 26/10/2021, 21:00</span>
                                                    </div>
                                                </div>
                                                <div class="text-bl-1 limit-text-row-2 mb-1 mt-3">
                                                    <a href="" class="hover-pink">Review Noir. Spa, Trải Nghiệm Thư Giãn Trong Bóng Đêm Siêu Độc Ở</a>
                                                </div>
                                                <p class="blog-mota mb-0">
                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor in cididunt ut labore et dolore
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="danhmuc-listblog">
                            <div class="head-blog-item blog-title">
                                <div class="w-100 text-left d-flex align-items-center">
                                    <div class="title-3 mr-4">
                                        Danh Mục
                                    </div>
                                    <div class="line-main-color ml-auto" style="width: 75%"></div>
                                </div>
                            </div>

                            <div class="list-blog-1 mt-4">
                                <div class="row mb-30px">
                                    <div class="col-xl-4">
                                        <div class="tin-item-1 box-tin-hv">
                                            <div class="image-tin-1" style="height: 220px">
                                                <img class="img-fluid" src="{{ asset('Site/images') }}/toa-heftiba-a9pFSC8dTlo-unsplash.jpg" alt="">
                                            </div>
                                            <div class="content-tin-3 background-white">
                                                <div class="row">
                                                    <div class="col-xl-12 d-flex align-items-center color-gray-2 hover-color-black text-small-1">
                                                        <div class="mr-3">
                                                            <a href="" class="box-danhmuc-1">
                                                            Sức khỏe</a>
                                                        </div>
                                                        <span>Thứ ba, 26/10/2021, 21:00</span>
                                                    </div>
                                                </div>
                                                <div class="text-bl-1 limit-text-row-2 mb-1 mt-3">
                                                    <a href="" class="hover-pink">Review Noir. Spa, Trải Nghiệm Thư Giãn Trong Bóng Đêm Siêu Độc Ở</a>
                                                </div>
                                                <p class="blog-mota mb-0">
                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor in cididunt ut labore et dolore
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-4">
                                        <div class="tin-item-1 box-tin-hv">
                                            <div class="image-tin-1" style="height: 220px">
                                                <img class="img-fluid" src="{{ asset('Site/images') }}/toa-heftiba-a9pFSC8dTlo-unsplash.jpg" alt="">
                                            </div>
                                            <div class="content-tin-3 background-white">
                                                <div class="row">
                                                    <div class="col-xl-12 d-flex align-items-center color-gray-2 hover-color-black text-small-1">
                                                        <div class="mr-3">
                                                            <a href="" class="box-danhmuc-1">
                                                            Sức khỏe</a>
                                                        </div>
                                                        <span>Thứ ba, 26/10/2021, 21:00</span>
                                                    </div>
                                                </div>
                                                <div class="text-bl-1 limit-text-row-2 mb-1 mt-3">
                                                    <a href="" class="hover-pink">Review Noir. Spa, Trải Nghiệm Thư Giãn Trong Bóng Đêm Siêu Độc Ở</a>
                                                </div>
                                                <p class="blog-mota mb-0">
                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor in cididunt ut labore et dolore
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-4 ">
                                        <div class="tin-item-1 box-tin-hv">
                                            <div class="image-tin-1" style="height: 220px">
                                                <img class="img-fluid" src="{{ asset('Site/images') }}/toa-heftiba-a9pFSC8dTlo-unsplash.jpg" alt="">
                                            </div>
                                            <div class="content-tin-3 background-white">
                                                <div class="row">
                                                    <div class="col-xl-12 d-flex align-items-center color-gray-2 hover-color-black text-small-1">
                                                        <div class="mr-3">
                                                            <a href="" class="box-danhmuc-1">
                                                            Sức khỏe</a>
                                                        </div>
                                                        <span>Thứ ba, 26/10/2021, 21:00</span>
                                                    </div>
                                                </div>
                                                <div class="text-bl-1 limit-text-row-2 mb-1 mt-3">
                                                    <a href="" class="hover-pink">Review Noir. Spa, Trải Nghiệm Thư Giãn Trong Bóng Đêm Siêu Độc Ở</a>
                                                </div>
                                                <p class="blog-mota mb-0">
                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor in cididunt ut labore et dolore
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-30px">
                                    <div class="col-xl-4">
                                        <div class="tin-item-1 box-tin-hv">
                                            <div class="image-tin-1" style="height: 220px">
                                                <img class="img-fluid" src="{{ asset('Site/images') }}/toa-heftiba-a9pFSC8dTlo-unsplash.jpg" alt="">
                                            </div>
                                            <div class="content-tin-3 background-white">
                                                <div class="row">
                                                    <div class="col-xl-12 d-flex align-items-center color-gray-2 hover-color-black text-small-1">
                                                        <div class="mr-3">
                                                            <a href="" class="box-danhmuc-1">
                                                            Sức khỏe</a>
                                                        </div>
                                                        <span>Thứ ba, 26/10/2021, 21:00</span>
                                                    </div>
                                                </div>
                                                <div class="text-bl-1 limit-text-row-2 mb-1 mt-3">
                                                    <a href="" class="hover-pink">Review Noir. Spa, Trải Nghiệm Thư Giãn Trong Bóng Đêm Siêu Độc Ở</a>
                                                </div>
                                                <p class="blog-mota mb-0">
                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor in cididunt ut labore et dolore
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-4">
                                        <div class="tin-item-1 box-tin-hv">
                                            <div class="image-tin-1" style="height: 220px">
                                                <img class="img-fluid" src="{{ asset('Site/images') }}/toa-heftiba-a9pFSC8dTlo-unsplash.jpg" alt="">
                                            </div>
                                            <div class="content-tin-3 background-white">
                                                <div class="row">
                                                    <div class="col-xl-12 d-flex align-items-center color-gray-2 hover-color-black text-small-1">
                                                        <div class="mr-3">
                                                            <a href="" class="box-danhmuc-1">
                                                            Sức khỏe</a>
                                                        </div>
                                                        <span>Thứ ba, 26/10/2021, 21:00</span>
                                                    </div>
                                                </div>
                                                <div class="text-bl-1 limit-text-row-2 mb-1 mt-3">
                                                    <a href="" class="hover-pink">Review Noir. Spa, Trải Nghiệm Thư Giãn Trong Bóng Đêm Siêu Độc Ở</a>
                                                </div>
                                                <p class="blog-mota mb-0">
                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor in cididunt ut labore et dolore
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-4 ">
                                        <div class="tin-item-1 box-tin-hv">
                                            <div class="image-tin-1" style="height: 220px">
                                                <img class="img-fluid" src="{{ asset('Site/images') }}/toa-heftiba-a9pFSC8dTlo-unsplash.jpg" alt="">
                                            </div>
                                            <div class="content-tin-3 background-white">
                                                <div class="row">
                                                    <div class="col-xl-12 d-flex align-items-center color-gray-2 hover-color-black text-small-1">
                                                        <div class="mr-3">
                                                            <a href="" class="box-danhmuc-1">
                                                            Sức khỏe</a>
                                                        </div>
                                                        <span>Thứ ba, 26/10/2021, 21:00</span>
                                                    </div>
                                                </div>
                                                <div class="text-bl-1 limit-text-row-2 mb-1 mt-3">
                                                    <a href="" class="hover-pink">Review Noir. Spa, Trải Nghiệm Thư Giãn Trong Bóng Đêm Siêu Độc Ở</a>
                                                </div>
                                                <p class="blog-mota mb-0">
                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor in cididunt ut labore et dolore
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div> --}}
                    </div>
                    <div class="col-xl-3">
                        <div class="box-lienhe  text-center mt-4">
                            <div class="child-box-tin-2 d-flex align-items-center box-small" style="background: url('{{ asset('Site/images') }}/beauty-spa.jpg');">
                                <div class="content-tin background-white">
                                    <div class="box-logo">
                                        <a class="" href="#">Logo Fbeauty</a>
                                    </div>
                                    <p class="text-small-2">Để được trực tiếp giải đáp mọi thắc mắc về dịch vụ mà Agribank cung cấp và được hướng dẫn xử lý</p>
                                    <div class="w-100 text-center mt-3">
                                        <a href="">
                                            <button class="btn-full">Liên hệ</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="list-blog-small p-0">
                            <div class="title-box-1">
                                <span>Top lượt xem</span>
                            </div>

                            <div class="small-blog-item box-tin-hv">
                                <div class="row">
                                    <div class="col-xl-5">
                                        <div class="img-1">
                                            <img class="img-fluid "
                                                src="{{ asset('Site/images') }}/toa-heftiba-a9pFSC8dTlo-unsplash.jpg"
                                                alt="">
                                        </div>
                                    </div>
                                    <div class="col-xl-7 pl-0 align-self-center">
                                        <div class="row">
                                            <div class="col-xl-12 d-flex align-items-center color-gray-2 hover-color-black text-small-1">
                                                <span>Thứ ba, 26/10/2021, 21:00</span>
                                            </div>
                                        </div>
                                        <div class="text-bl-1 limit-text-row-2 mb-2 mt-1">
                                            <a href="" class="hover-pink">Review Noir. Spa, Trải Nghiệm Thư Giãn Trong Bóng Đêm Siêu Độc Ở</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="small-blog-item box-tin-hv">
                                <div class="row">
                                    <div class="col-xl-5">
                                        <div class="img-1">
                                            <img class="img-fluid "
                                                src="{{ asset('Site/images') }}/toa-heftiba-a9pFSC8dTlo-unsplash.jpg"
                                                alt="">
                                        </div>
                                    </div>
                                    <div class="col-xl-7 pl-0 align-self-center">
                                        <div class="row">
                                            <div class="col-xl-12 d-flex align-items-center color-gray-2 hover-color-black text-small-1">
                                                <span>Thứ ba, 26/10/2021, 21:00</span>
                                            </div>
                                        </div>
                                        <div class="text-bl-1 limit-text-row-2 mb-2 mt-1">
                                            <a href="" class="hover-pink">Review Noir. Spa, Trải Nghiệm Thư Giãn Trong Bóng Đêm Siêu Độc Ở</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="small-blog-item box-tin-hv">
                                <div class="row">
                                    <div class="col-xl-5">
                                        <div class="img-1">
                                            <img class="img-fluid "
                                                src="{{ asset('Site/images') }}/toa-heftiba-a9pFSC8dTlo-unsplash.jpg"
                                                alt="">
                                        </div>
                                    </div>
                                    <div class="col-xl-7 pl-0 align-self-center">
                                        <div class="row">
                                            <div class="col-xl-12 d-flex align-items-center color-gray-2 hover-color-black text-small-1">
                                                <span>Thứ ba, 26/10/2021, 21:00</span>
                                            </div>
                                        </div>
                                        <div class="text-bl-1 limit-text-row-2 mb-2 mt-1">
                                            <a href="" class="hover-pink">Review Noir. Spa, Trải Nghiệm Thư Giãn Trong Bóng Đêm Siêu Độc Ở</a>
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
@endsection

@section('javascript')
    <script src="{{ asset('Site/js') }}/sanpham.js"></script>
@endsection
