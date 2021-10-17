@extends('Admin.LayoutAdmin')
@section('content')



<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <div class="row d-flex justify-content-center">
                <div class="col-xl-10">
                    <div class="card-box">
                        <div class="dropdown float-right">
                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                                <i class="mdi mdi-dots-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                            </div>
                        </div>

                        <h4 class="header-title mt-0 mb-4">Thêm Sản Phẩm</h4>

                        <form data-parsley-validate action="{{route('sanpham.store')}}" novalidate method="post" enctype="multipart/form-data">
                            @csrf
                           
                            <div class="form-group">
                                <label for="">Hình ảnh</label>
                               <input type="file" name="img" >
                               @if ($errors->has('img'))
                                    <ul class="parsley-errors-list filled" id="parsley-id-7" aria-hidden="false"><li class="parsley-required">{{$errors->get('img')[0]}}</li></ul>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Tên Sản Phẩm</label>
                                        <input type="text" name="name"  parsley-trigger="change" required
                                            placeholder="Nhập tên của sản phẩm" class="form-control  @error('name') border-error @enderror" id="userName">
                                            @if ($errors->has('name'))
                                                <ul class="parsley-errors-list filled" id="parsley-id-7" aria-hidden="false"><li class="parsley-required">{{$errors->get('name')[0]}}</li></ul>
                                            @endif
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Danh Mục</label>
                                        <select class="form-control select2 @error('iddanhmuc') border-error @enderror" name="iddanhmuc">
                                            <option value="">Chọn</option>
                                            @foreach ($cate as $item)
                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('iddanhmuc'))
                                            <ul class="parsley-errors-list filled" id="parsley-id-7" aria-hidden="false"><li class="parsley-required">{{$errors->get('iddanhmuc')[0]}}</li></ul>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="">Mô Tả</label>
                                        <textarea class=" @error('mota') border-error @enderror"  style="height: 100px;width:100%; border:1px solid #ccc" name="mota" ></textarea>   
                                        @if ($errors->has('mota'))
                                            <ul class="parsley-errors-list filled" id="parsley-id-7" aria-hidden="false"><li class="parsley-required">{{$errors->get('mota')[0]}}</li></ul>
                                        @endif
                                    </div>
                                </div>
                            </div>
                           
                            <textarea class="@error('noidung') border-error @enderror" id="summernote"  name="noidung" >
                            </textarea>
                            @if ($errors->has('noidung'))
                                <ul class="parsley-errors-list filled" id="parsley-id-7" aria-hidden="false"><li class="parsley-required">{{$errors->get('noidung')[0]}}</li></ul>
                            @endif
                            <div class="row mt-3">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <div class="checkbox">
                                            <input id="remember-1" type="checkbox" name="trangthai" value="1" data-parsley-multiple="remember-1">
                                            <label for="remember-1">Trạng Thái ? </label>
                                            @if ($errors->has('trangthai'))
                                                <ul class="parsley-errors-list filled" id="parsley-id-7" aria-hidden="false"><li class="parsley-required">{{$errors->get('trangthai')[0]}}</li></ul>
                                            @endif
                                        </div>
                                    </div>            
                                </div>   
                            </div>
                          
                            <div class="form-group text-right mb-0 mt-5">
                                <a href="/quantri/sanpham" clas="btn btn-secondary waves-effect waves-light">Huỷ</a>
                                <input type="submit" name="them" class="btn btn-primary waves-effect waves-light ml-2" value="Thêm">
                            </div>
                        </form>
                    </div>
                </div><!-- end col -->
            </div>
        </div>
    </div>
</div>

@endsection