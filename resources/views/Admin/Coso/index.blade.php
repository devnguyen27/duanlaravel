@extends('Admin.LayoutAdmin')

@section('content')
<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">


            <div class="row">
                <div class="col-12">
                    <div class="card-box">
                        <h4 class="mt-0 header-title"> Cơ Sở </h4>
                        <p class="text-muted font-14 mb-3">
                        Đây là Cơ Sở.
                        </p>
                        <div>
                            <a href="{{route("coso.create")}}"
                               class="btn btn-primary waves-effect waves-light mb-3">Thêm Cơ Sở
                            </a>
                        </div>
                        <div class="container">
                            @if(session('thanhcong'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{session('thanhcong')}}
                                </div>
                            @endif

                            @if(session('thatbai'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{session('thatbai')}}
                                </div>
                            @endif

                        </div>

                        <table id="key-table" class="table table-striped table-bordered dt-responsive">
                                <thead class="thead-light">
                                    <tr>
                                        <th width="7%">STT</th>
                                        <th width="10%">Tên Cơ Sở</th>
                                        <th width="18%">Địa Chỉ Cơ Sở</th>
                                        <th width="15%">Tỉnh/Thành phố</th>
                                        <th width="15%">Quận/Huyện</th>
                                        <th width="15%">Xã Phường/thị trấn</th>
                                        <th width="15%">Hành Động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $i=0; ?>
                                    @foreach ($data as $row)

                                        <tr id="row{{$row->id}}">
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td class="" >{{$row->name}}</td>
                                            <td class="" >{{$row->diachi}}</td>
                                            <td class="" >{{$row->city->name}}</td>
                                            <td class="" >{{$row->province->name}}</td>
                                            <td class="" >{{$row->wards->name}}</td>

                                            <td>
                                                <a role="button" class="btn btn-primary mr-2" href="{{route('coso.edit',$row->id)}}"><i class="fa fa-edit"></i></a>
                                                @csrf
                                                <button type="button" onclick="deleteCommon({{$row->id}})" class="btn btn-danger text-white " data-bs-toggle="tooltip" data-bs-placement="right" title="Xóa"><i class="fa fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
