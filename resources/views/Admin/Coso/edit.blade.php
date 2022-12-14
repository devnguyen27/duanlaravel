
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

                            <h4 class="header-title mt-0 mb-3">Sửa Cơ Sở</h4>
                            <div class="container">
                                @if(session('thatbai'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{session('thatbai')}}
                                </div>
                                @endif

                            </div>

                            <form data-parsley-validate action="{{route('coso.update',$data->id)}}" id="formadd" novalidate onsubmit="return submitForm()" method="post" enctype="multipart/form-data">
                                @csrf
                                {!! method_field('patch') !!}


                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="">Tên Cơ Sở</label><span style="color:red;"> (*)</span>
                                            <input type="text" name="name" class="form-control @error('name') border-error @enderror name" value="{{$data->name}}"  parsley-trigger="change" required
                                                   placeholder="Tên Cơ Sở" >
                                                   @error('name')
                                            <span class="badge badge-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="">Địa chỉ cụ thể</label><span style="color:red;"> (*)</span>
                                            <input type="text" name="diachi" class="form-control @error('diachi') border-error @enderror diachi" value="{{$data->diachi}}"  parsley-trigger="change" required
                                                   placeholder="Tên Địa Chỉ Cụ Thể" >
                                                   @error('diachi')
                                            <span class="badge badge-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="">  Chọn Tỉnh/Thành Phố</label><span style="color:red;"> (*)</span>
                                            <div>
                                              <select class="form-control input-sm m-bot15 choose city" name="city" id="city"  >
                                                <option value="">-----{{__('Chọn Thành Phố')}}-----</option>
                                                @foreach($city as $key => $ci)
                                                @if($data->tinh == $ci->matp)
                                                <option value="{{$ci->matp}}" selected >{{$ci->name}}</option>
                                                @else
                                                <option value="{{$ci->matp}}" >{{$ci->name}}</option>
                                                @endif
                                                @endforeach
                                                @error('tinh')
                                            <span class="badge badge-danger">{{$message}}</span>
                                            @enderror
                                              </select>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                        <div class="">
                                        <label class="">{{__('Chọn Quận/Huyện')}} <span style="color:red;"> (*)</span></label>
                                            <div>
                                              <select  name="province" id="province" class="form-control input-sm m-bot15 choose province"  >
                                              <option value="" selected>-----{{__('Chọn Quận/Huyện')}}-----</option>
                                              @foreach($province as $key => $cii)
                                              @if($data->quan == $cii->maqh)
                                              <option value="{{$cii->maqh}}" selected>{{$cii->name}}</option>
                                                @else
                                                <option value="{{$cii->maqh}}">{{$cii->name}}</option>
                                                @endif
                                                @endforeach
                                              </select>
                                          </div>
                                      </div>
                                        </div>
                                        <div class="form-group">
                                        <div class="">
                                        <label class="">{{__('Chọn Xã/Phường')}} <span style="color:red;"> (*)</span></label>
                                            <div>
                                              <select name="wards" id="wards" class=" form-control input-sm m-bot15 wards" >
                                                <option value="">-----{{__('Chọn Xã/Phường')}}-----</option>
                                                @foreach($wards as $key => $ciii)
                                              @if($data->huyen == $ciii->xaid)
                                              <option value="{{$ciii->xaid}}" selected>{{$ciii->name}}</option>
                                                @else
                                                <option value="{{$ciii->xaid}}">{{$ciii->name}}</option>
                                                @endif
                                                @endforeach
                                              </select>
                                          </div>
                                      </div>
                                        </div>

                                    </div>

                                </div>

                                <div class="form-group text-right mb-0 mt-5">
                                    <a href="/quantri/coso" clas="btn btn-secondary waves-effect waves-light" title="Hủy" >Hủy</a>
                                    <input type="submit" class="btn btn-primary waves-effect waves-light mr-1 update"  id='add_product' value="sửa cơ sở">
                                </div>

                            </form>
                        </div>
                    </div><!-- end col -->
                </div>
            </div>
        </div>
    </div>
@endsection
@section('custom-javascript')
    <script src="{{ asset('Admin/assets') }}/js/pages/coso1.js"></script>
@endsection
