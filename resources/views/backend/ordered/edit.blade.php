<?php
use App\Models\Cart;
?>
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
                        <div class="card-header text-uppercase">Chi Tiết Đơn Hàng</div>
                        <div class="card-body">
                            <form action="{{url('/admin/edit/ordered/'.$ordered['id'])}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-6">
                                        <label>Tên Người Mua</label>
                                        <input type="text" name="name" value="{{ $ordered['name'] }}" required
                                            class="form-control" readonly>
                                    </div>
                                    <div class="col-6">
                                        <label>Email</label>
                                        <input type="text" name="name" value="{{ $ordered['email'] }}" required
                                            class="form-control" readonly>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-6">
                                        <label>Số Điện Thoại</label>
                                        <input type="text" name="name" value="{{ $ordered['mobile'] }}" required
                                            class="form-control" readonly>
                                    </div>
                                    <div class="col-6">
                                        <label>Địa Chỉ</label>
                                        <input type="text" name="name" value="{{ $ordered['address'] }}" required
                                            class="form-control" readonly>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-6">
                                        <label>Thành Phố</label>
                                        <input type="text" name="name" value="{{ $ordered['city'] }}" required
                                            class="form-control" readonly>
                                    </div>
                                    <div class="col-6">
                                        <label>Quận/Huyện</label>
                                        <input type="text" name="name" value="{{ $ordered['district'] }}" required
                                            class="form-control" readonly>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-6">
                                        <label>Xã/Phường</label>
                                        <input type="text" name="name" value="{{ $ordered['ward'] }}" required
                                            class="form-control" readonly>
                                    </div>
                                    <div class="col-6">
                                        <label>Ngày Đặt</label>
                                        <input type="text" name="name" value="{{date('d/m/Y', strtotime($ordered['created_at']))}}" required
                                            class="form-control" readonly>
                                    </div>
                                </div>
                                <hr>
                                <label>Ghi Chú</label>
                                <textarea id="summernoteEditor" name="description" readonly="">
                                    {{$ordered['note']}}
                                </textarea>
                                <hr>
                                @foreach ($orders as $order)
                                <div class="row">
                                    <div class="col-6">
                                        <label>Tên Sản Phẩm</label>
                                        <input type="text" name="name" value="{{ $order['name'] }}" required
                                            class="form-control" readonly>
                                    </div>
                                    <div class="col-6">
                                        <label>Số Lượng</label>
                                        <input type="text" name="name" value="{{ $order['quantity'] }}" required
                                            class="form-control" readonly>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-6">
                                        <label>Giá</label>
                                        <input type="text" name="name" value="{{ $order['price'] }}" required
                                            class="form-control" readonly>
                                    </div>
                                    <div class="col-6">
                                        <label>Ảnh</label><br>
                                        <input type="image" src="{{$order['image']}}" width="100px" height="100px">
                                    </div>
                                </div>
                                <hr>
                                @endforeach


                                {{-- <button type="reset" class="btn btn-behance">Làm Mới</button> --}}
                                <button type="submit" class="btn btn-dribbble" @if(Cart::find($ordered['cart_id'])->status==2) disabled @endif>Phê Duyệt</button>
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
