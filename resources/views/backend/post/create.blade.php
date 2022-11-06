@extends('backend.layout.create_edit')
@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumb-->
        <div class="row pt-2 pb-2">
            <div class="col-sm-9">
                <h4 class="page-title">Form Advanced</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javaScript:void();">Dashtreme</a></li>
                    <li class="breadcrumb-item"><a href="javaScript:void();">Forms</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Form Advanced</li>
                </ol>
            </div>
        </div>
        <!-- End Breadcrumb-->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header text-uppercase">Tạo Bài Viết</div>
                    <div class="card-body">
                        <form action="{{url('/admin/add/post')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <label>Tiêu đề</label>
                                    <input type="text" name="title" required class="form-control">
                                </div>
                            </div>
                            <hr>

                            <label>Ảnh</label>
                            <input type="file" name="image" onchange="loadfile(event)" class="form-control" required>
                            <div id="preview">

                            </div>
                            <hr>

                            <label>Mô Tả Tóm Tắt</label>
                            <textarea id="summernoteEditor" name="description_brief">

                                </textarea>
                            <hr>
                            <label>Mô Tả Đầy Đủ</label>
                            <textarea id="summernoteEditor1" name="description_full">

                                </textarea>
                            <hr>
                            <div class="row">

                                <div class="col-12">
                                    <label>Tình Trạng</label>
                                    <input type="radio" name="status" checked value="1" checked>Hoạt Động
                                    <input type="radio" name="status" value="0">Không Hoạt Động
                                </div>
                            </div>
                            <hr>
                            <button type="reset" class="btn btn-behance">Làm Mới</button>
                            <button type="submit" class="btn btn-dribbble">Tạo</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--End Row-->


        <!--End Row-->


        <!--End Row-->





        <!--End Row-->



        <!--End Row-->


        <!--End Row-->
        <!--start overlay-->
        <div class="overlay"></div>
        <!--end overlay-->
    </div>
    <!-- End container-fluid-->

</div>
@endsection