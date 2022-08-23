@extends('Admin.LayoutAdmin')

@section('content')
    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">


                <div class="row">
                    <div class="col-12">
                        <div class="card-box">
                            <h4 class="mt-0 header-title">Thêm Cơ Sở</h4>
                            @if(session('thatbai'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{session('thatbai')}}
                                </div>
                            @endif
                            <form action="{{route('coso.store')}}"  enctype="multipart/form-data" method="post">
                                @csrf
                                <div class="modal-header">
                                    <h4 class="modal-title" id="myModalLabel">Thêm Cơ Sở</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                </div>
                                <div class="modal-body">
                                        <div class="form-group">
                                            <label for="">Tên Cơ Cở</label><span style="color:red;"> (*)</span>
                                            <input type="text" name="name" class="form-control @error('name') border-error @enderror name" value="{{old('name')}}"  parsley-trigger="change"
                                                placeholder="Tên Cơ Sở" >
                                            @error('name')
                                            <span class="badge badge-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="">Địa chỉ cụ thể</label><span style="color:red;"> (*)</span>
                                            <input type="text" name="diachi" class="form-control @error('diachi') border-error @enderror diachi" value="{{old('diachi')}}"  parsley-trigger="change"
                                                placeholder="Địa Chỉ Cụ Thể" >
                                                @error('diachi')
                                            <span class="badge badge-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="">  Chọn Tỉnh/Thành Phố</label><span style="color:red;"> (*)</span>
                                            <div>
                                                <select class="form-control input-sm m-bot15 choose city" name="city" id="city"  class="form-control @error('tinh') border-error @enderror tinh" value="{{old('tinh')}}">
                                                    <option value="">-----{{__('Chọn Thành Phố')}}-----</option>
                                                    @foreach($city as $key => $ci)
                                                    <option value="{{$ci->matp}}">{{$ci->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('city')
                                            <span class="badge badge-danger">{{$message}}</span>
                                            @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="">
                                                <label class="">{{__('Chọn Quận/Huyện')}} <span style="color:red;"> (*)</span></label>
                                                <div>
                                                    <select  name="province" id="province" class="form-control input-sm m-bot15 choose province"  class="form-control @error('quan') border-error @enderror quan" value="{{old('quan')}}">
                                                        <option value="">-----{{__('Chọn Quận/Huyện')}}-----</option>
                                                    </select>
                                                    @error('province')
                                                        <span class="badge badge-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="">
                                                <label class="">{{__('Chọn Xã/Phường')}} <span style="color:red;"> (*)</span></label>
                                                <div>
                                                    <select name="wards" id="wards" class=" form-control input-sm m-bot15 wards" class="form-control @error('huyen') border-error @enderror huyen" value="{{old('huyen')}}">
                                                        <option value="">-----{{__('Chọn Xã/Phường')}}-----</option>
                                                    </select>
                                                    @error('wards')
                                                        <span class="badge badge-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <a href="/quantri/coso" clas="btn btn-secondary waves-effect waves-light ">Huỷ</a>
                                    <button type="submit" name="them" class="btn btn-primary waves-effect waves-light"  id='add_product'>Thêm</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- end row -->
                <div class="row d-flex justify-content-end">
                    <div class="col-lg-5">
                        <nav>
                            <ul class="pagination pagination-split">
                                <?php
                                // echo $Pagination;
                                ?>
                            </ul>
                        </nav>

                    </div>
                </div>


            </div> <!-- container-fluid -->

        </div> <!-- content -->


    </div>



@endsection
