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
                        <button type="button" data-toggle="modal" data-target="#exampleModalCenter"
                            class="btn btn-light waves-effect waves-light"><i class="fa fa-plus"></i>Tạo</button>
                        <!-- Button trigger modal -->


                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Tạo Danh Mục Sản Phẩm</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ url('/admin/add/category') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Tên:</label>
                                                <input type="text" name="name" required class="form-control"
                                                    id="recipient-name">
                                            </div>
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Ảnh:</label>
                                                <input type="file" name="image" onchange="loadfile(event)" required class="form-control"
                                                    id="recipient-name">
                                                <div id="preview"></div>
                                            </div>
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Tình Trạng:</label>
                                                <input type="radio" name="status" value="1"  checked>Hoạt Động
                                                <input type="radio" name="status" value="0" >Không Hoạt Động
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- End Breadcrumb-->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header"><i class="fa fa-table"></i>Danh Mục Sản Phẩm</div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="default-datatable" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Ảnh</th>
                                            <th>Tên</th>
                                            <th>Trạng Thái</th>
                                            <th>Tình Trạng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $key => $category)
                                            <tr>
                                                <td>{{ ++$key }}</td>
                                                <td>
                                                    <img src="{{$category['image']}}" width="50px" height="50px">
                                                </td>
                                                <td>{{ $category['name'] }}</td>
                                                <td>
                                                    @if ($category['status'] == 1)
                                                        <span style="color: green">Hoạt động</span>
                                                    @else
                                                        <span style="color: red">Không kích hoạt</span>
                                                    @endif
                                                </td>
                                                <td style="font-size:25px; width:50px">
                                                    <center>
                                                        <a data-toggle="modal"
                                                            data-target="#exampleModalCenter{{ $category['id'] }}"
                                                            style="color: green"
                                                            href="{{ url('/admin/edit/category/' . $category['id']) }}"><i
                                                                class="fa fa-edit"></i></a>&nbsp;&nbsp;
                                                        <a style="color: red"
                                                            href="{{ url('/admin/delete/category/' . $category['id']) }}"><i
                                                                class="fa fa-trash"></i></a>
                                                    </center>
                                                </td>
                                                <div class="modal fade" id="exampleModalCenter{{ $category['id'] }}"
                                                    tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLongTitle">Tạo Danh
                                                                    Mục Sản Phẩm</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form action="{{ url('/admin/edit/category/'.$category['id']) }}" method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label for="recipient-name"
                                                                            class="col-form-label">Tên:</label>
                                                                        <input type="text" name="name" required
                                                                            class="form-control" value="{{$category['name']}}" id="recipient-name">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="recipient-name" class="col-form-label">Ảnh:</label>
                                                                        <input type="file" name="image" class="form-control"
                                                                            id="recipient-name">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="recipient-name"
                                                                            class="col-form-label">Tình Trạng:</label>
                                                                        @if($category['status']==1)
                                                                            <input type="radio" name="status" value="1"
                                                                                checked>Hoạt Động
                                                                            <input type="radio" name="status" value="0"
                                                                                >Không Hoạt Động
                                                                        @else
                                                                            <input type="radio" name="status" value="1"
                                                                            >Hoạt Động
                                                                        <input type="radio" name="status" value="0" checked
                                                                            >Không Hoạt Động
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary">Save
                                                                        changes</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
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
