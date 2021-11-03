
@extends('Admin.layoutadmin')
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

                            <h4 class="header-title mt-0 mb-3">Sửa Giảm Giá</h4>

                            <form data-parsley-validate action="{{route('giamgia.update',$data->id)}}" id="formadd" novalidate onsubmit="return submitForm()" method="post" enctype="multipart/form-data">
                                @csrf
                                {!! method_field('patch') !!}


                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="">Tên Giảm Giá</label><span style="color:red;"> (*)</span>
                                                <input type="text" name="name" class="form-control @error('name') border-error @enderror name" value="{{$data->name}}"  parsley-trigger="change" required
                                                    placeholder="Tên Giảm Giá" >
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="">Mã Giảm Giá</label><span style="color:red;"> (*)</span>
                                                <input type="text" name="ma" class="form-control @error('diachi') border-error @enderror diachi" value="{{$data->ma}}"  parsley-trigger="change" required
                                                    placeholder="Mã Giảm Giá" >
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label for="">Khoảng Giá Từ </label><span style="color:red;"> (*)</span>
                                                <input type="number" name="number" class="form-control @error('name') border-error @enderror name" value="{{$data->number}}"  parsley-trigger="change" required
                                                    placeholder="Khoảng Giá Từ " >
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="">Khoảng Giá Tối Đa</label><span style="color:red;"> (*)</span>
                                                <input type="number" name="max" class="form-control @error('diachi') border-error @enderror diachi" value="{{$data->max}}"  parsley-trigger="change" required
                                                    placeholder="Khoảng Giá Tối Đa" >
                                            </div>

                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label for="">Loại Giảm Giá </label><span style="color:red;"> (*)</span>
                                                <select name="loai" id="inputState" class="form-control"  placeholder="Phương Thức Giao Hàng" class="form-control @error('name') border-error @enderror name" value="{{$data->trangthai}}" parsley-trigger="change">
                                                    <option {{$data->loai == '0'? 'selected':''}} value="0">Giảm Theo Giá</option>
                                                    <option {{$data->loai == '1'? 'selected':''}} value="1">Giảm Theo %</option>
                                                </select>
                                                </div>
                                            <div class="form-group col-md-4">
                                                <label for="">Ngày Tạo</label><span style="color:red;"> (*)</span>
                                                <input type="date" name="ngaytao" class="form-control @error('diachi') border-error @enderror diachi" value="{{date('d-m-Y',$data->ngaytao)}}"  parsley-trigger="change" required
                                                    placeholder="Khoảng Giá Tối Đa" >
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="">Ngày Hết Hạn</label><span style="color:red;"> (*)</span>
                                                <input type="date" name="ngayhethan" class="form-control @error('diachi') border-error @enderror diachi" value="{{date('d-m-Y',$data
                                                ->ngayhethan)}}"  parsley-trigger="change" required
                                                    placeholder="Khoảng Giá Tối Đa" >
                                            </div>
                                        </div>

                                    </div>

                                </div>

                                <div class="form-group text-right mb-0 mt-5">
                                    <input type="submit" class="btn btn-primary waves-effect waves-light mr-1 update"  id='add_product'>
                                    <a href="/quantri/coso" clas="btn btn-secondary waves-effect waves-light">Hủy</a>
                                </div>

                            </form>
                        </div>
                    </div><!-- end col -->
                </div>
            </div>
        </div>
    </div>
@endsection
