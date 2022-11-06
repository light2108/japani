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
                        <div class="card-header text-uppercase">Chỉnh Sửa Sản Phẩm</div>
                        <div class="card-body">
                            <form action="{{ url('/admin/edit/product/' . $product['id']) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-6">
                                        <label>Tên</label>
                                        <input type="text" name="name" value="{{ $product['name'] }}" required
                                            class="form-control">
                                    </div>
                                    <div class="col-6">
                                        <label>Danh Mục Sản Phẩm</label>
                                        <select class="form-control single-select change-category" name="category_id"
                                            required>
                                            @foreach ($categories as $category)
                                                @if ($category['id']==$product['category_id'])
                                                <option value="{{ $category['id'] }}" selected>{{ $category['name'] }}</option>
                                                @else
                                                <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                                                @endif

                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div id="appendcategorieslevel" class="col-6">
                                        <label>Loại Sản Phẩm</label>
                                        <select class="form-control single-select" name="typeproduct_id" required>
                                            @if ($product['typeproduct_id']==0)
                                                <option value="0" selected></option>
                                            @else
                                                @foreach ($typeproducts as $typeproduct)
                                                    @if ($typeproduct['id']==$product['typeproduct_id'])
                                                        <option selected value="{{$typeproduct['id']}}">{{$typeproduct['name']}}</option>
                                                    @else
                                                        <option value="{{$typeproduct['id']}}">{{$typeproduct['name']}}</option>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <label>Giá</label>
                                        <input type="number" name="price" value="{{ $product['price'] }}" required
                                            class="form-control">
                                    </div>

                                </div>
                                <hr>
                                <label>Ảnh</label>
                                        <input type="file" name="image[]" multiple onchange="loadfile(event)" class="form-control">
                                        <div id="preview">
                                            @foreach (explode(',', $product['image']) as $image)
                                                <img src="{{ $image }}" width="100px" height="100px">
                                            @endforeach
                                        </div>
                                        <hr>
                                <div class="row">

                                    <div class="col-6">
                                        <label>Kg</label>
                                        <input type="number" value="{{$product['kg']}}" name="kg" min=1 required class="form-control">

                                    </div>
                                    <div class="col-6">
                                        <label>SKU</label>
                                        <input type="text" value="{{$product['sku']}}" name="sku" required class="form-control">

                                    </div>
                                </div>
                                <hr>
                                <div class="row">

                                    <div class="col-6">
                                        <label>GTIN</label>
                                        <input type="number" value="{{$product['gtin']}}" value="0" name="gtin" min="0" class="form-control">

                                    </div>
                                    <div class="col-6">
                                        <label>Thương Hiệu</label>
                                        <input type="text" name="trademark" value="{{$product['trademark']}}" required class="form-control">

                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-6">
                                        <label>Quy Cách</label>
                                        <input type="text" required class="form-control" value="{{$product['specification']}}" name="specification">
                                    </div>
                                    <div class="col-6">
                                        <label>Xuất Xứ</label>
                                        <input type="text" name="origin" value="{{$product['origin']}}" required class="form-control">
                                    </div>
                                </div>
                                <hr>

                                <label>Mô Tả</label>
                                <textarea id="summernoteEditor" name="description">
                                    {{$product['description']}}
                                </textarea>
                                <hr>
                                <div class="row">
                                    <div class="col-6">
                                        <label>Đánh Giá</label>
                                        <input id="input-id" type="hidden" value="{{ $product['rating'] }}" name="rating"
                                            class="rating" data-size="lg">
                                    </div>
                                    <div class="col-6">
                                        <label>Tình Trạng</label><br>
                                        @if ($product['status'] == 1)
                                            <input type="radio" name="status" checked value="1" checked>Hoạt Động
                                            <input type="radio" name="status" value="0">Không Hoạt Động
                                        @else
                                            <input type="radio" name="status" value="1" checked>Hoạt Động
                                            <input type="radio" name="status" checked value="0">Không Hoạt Động
                                        @endif
                                    </div>
                                </div>
                                <hr>
                                <button type="reset" class="btn btn-behance">Làm Mới</button>
                                <button type="submit" class="btn btn-dribbble">Chỉnh Sửa</button>

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
