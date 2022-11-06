@extends('backend.layout.table')
@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumb-->
            <div class="row pt-2 pb-2">
                <div class="col-sm-9">
                    <h4 class="page-title">Data Tables</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javaScript:void();">Dashtreme</a></li>
                        <li class="breadcrumb-item"><a href="javaScript:void();">Tables</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Tables</li>
                    </ol>
                </div>
                <div class="col-sm-3">
                    <div class="btn-group float-sm-right">
                        <a role="button" href="{{url('/admin/add/product')}}"
                            class="btn btn-light waves-effect waves-light"><i class="fa fa-plus"></i>Tạo</a>
                        <!-- Button trigger modal -->


                        <!-- Modal -->


                    </div>
                </div>
            </div>
            <!-- End Breadcrumb-->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header"><i class="fa fa-table"></i>Sản Phẩm</div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="default-datatable" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            
                                            <th>Tên</th>
                                            <th>Ảnh</th>
                                            <th>Danh Mục/Loại Sản Phẩm</th>
                                            <th>Trạng Thái</th>
                                            <th>Tình Trạng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $key => $product)
                                            <tr>
                                                <td>{{ ++$key }}</td>
                                                <td>{{ $product['name'] }}</td>
                                                <td><img src="{{explode(",",$product['image'])[0]}}" width="50px" height="50px"></td>
                                                <td>
                                                    @foreach ($categories as $category)
                                                        @if ($category['id']==$product['category_id'])
                                                            {{$category['name']}}
                                                        @endif
                                                    @endforeach
                                                    /<br>
                                                    @foreach ($typeproducts as $typeproduct)
                                                        @if ($typeproduct['id']==$product['typeproduct_id'])
                                                            {{$typeproduct['name']}}
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @if ($product['status'] == 1)
                                                        <span style="color: green">Hoạt động</span>
                                                    @else
                                                        <span style="color: red">Không kích hoạt</span>
                                                    @endif
                                                </td>
                                                <td style="font-size:25px; width:50px">
                                                    <center>
                                                        <a
                                                            style="color: green"
                                                            href="{{ url('/admin/edit/product/' . $product['id']) }}"><i
                                                                class="fa fa-edit"></i></a>&nbsp;&nbsp;
                                                        <a style="color: red"
                                                            href="{{ url('/admin/delete/product/' . $product['id']) }}"><i
                                                                class="fa fa-trash"></i></a>
                                                    </center>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- End Row-->


            <!-- End Row-->
            <!--start overlay-->
            <div class="overlay"></div>
            <!--end overlay-->
        </div>
        <!-- End container-fluid-->

    </div>
@endsection
