@extends('Admin.LayoutAdmin')

@section('content')
<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">


            <div class="row">
                <div class="col-12">
                    <div class="card-box">
                        <h4 class="mt-0 header-title">Sản Phẩm</h4>
                        
                        <p class="text-muted font-14 mb-3">
                        Tất cả sản phẩm có trong cửa hàng.
                        </p>
                        <div>
                            <a class="btn btn-primary waves-effect waves-light mb-3" href="quantri/sanpham/create">Thêm Sản Phẩm</a>
                       </div>
                        <div class="row">
                            <div class="col-lg-6">
                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                           
                                 @endif
                            </div>
                        </div>
                        <table id="key-table" class="table table-hover table-bordered dt-responsive nowrap">
                                <thead class="thead-light">
                                    <tr>
                                        <th width="5%">STT</th>
                                        <th width="10%">Tên Sản Phẩm</th>
                                        <th width="10%">Ảnh</th>
                                        <th width="10%">Mô Tả</th>
                                        <th width="2%">Chi Tiết</th>
                                        <th width="10%">Hành Động </th>
                                    </tr>
                                </thead>
                                <tbody>

                                @foreach ($data as $item)
                                    <tr>
                                        <td class="">{{$loop->index}}</td>
                                        <td class="" >{{substr($item->name,0,25)}} ..</td>
                                        <td><img  class="img-common" src="{{ asset($URL_IMG. json_decode($item->img)[0]) }}"></td>
                                        <td> {{substr($item->mota,0,50)}}</td>
                                        <td ><a href="{{URL::to('quantri/sanpham/detail/'.$item->id.'/edit')}}" class="d-flex justify-content-center"><div class="btn btn-success"><i class="dripicons-search"></i></div></a></td>
                                        <td class="d-flex justify-content-around">
                                            <a href="{{route('sanpham.edit',$item->id)}}"><div class="btn btn-primary mr-2"> <i class="dripicons-pencil"></i></div></a>
                                            <form action="{{route('sanpham.destroy',$item->id)}}"  method="post">
                                                @csrf
                                                {!!method_field('delete')!!}
                                                <button  onclick="return iconfirm()" type="submit"  class="btn btn-danger"><i class=" dripicons-trash"></i></button>
                                            </form>
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
