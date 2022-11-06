<?php
use App\Models\Cart;
?>
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

                        <!-- Button trigger modal -->


                        <!-- Modal -->


                    </div>
                </div>
            </div>
            <!-- End Breadcrumb-->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header"><i class="fa fa-table"></i>Đơn Người Dùng Đặt</div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="default-datatable" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Tên Người Mua</th>
                                            <th>Số Điện Thoại</th>
                                            <th>Email</th>
                                            <th>Tổng Tiền</th>
                                            <th>Ngày Đặt Đơn</th>
                                            <th>Tình Trạng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <input type="hidden" value="{{$key=1}}">
                                        @foreach ($carts as $cart)
                                            @foreach ($cart['ordered'] as $ordered)
                                                <tr>
                                                    <td>{{$key++}}</td>
                                                    <td>{{$ordered['name']}}</td>
                                                    <td>{{$ordered['mobile']}}</td>
                                                    <td>{{$ordered['email']}}</td>
                                                    <td>
                                                        {{Cart::sum_price($ordered['cart_id'])}} đ
                                                    </td>
                                                    <td>{{date('d/m/Y', strtotime($ordered['created_at']))}}</td>
                                                    <td style="font-size:25px; width:50px">
                                                        <center>
                                                            <a title="Xem đơn hàng"
                                                            style="color: blue"
                                                                href="{{ url('/admin/edit/ordered/' . $ordered['id']) }}"><i
                                                                    class="fa fa-eye"></i></a>&nbsp;&nbsp;

                                                        </center>
                                                    </td>
                                                </tr>
                                            @endforeach
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
