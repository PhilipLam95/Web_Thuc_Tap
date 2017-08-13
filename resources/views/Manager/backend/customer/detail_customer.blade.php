@extends('Manager.manager')     
@section('content_manager')
 <div id="page-wrapper">


            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Chi tiết Khách hàng : {{$users->full_name}}</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row" style="overflow: scroll;">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                         <h7 class="page-header" style="color:red;">
                                <a style="padding-left: 400px">ID: {{$users->id}}</a><br>
                                <a style="padding-left: 400px">Tên khách hàng: {{$users->full_name}}</a><br>
                                <a style="padding-left: 400px">Email: {{ $users->email}}</a>

                        </h7>
                        <!-- /.panel-heading -->
                        <div class="panel-body">



                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                           
                                            <th>ID_Bill</th>
                                            <th>Địa chỉ giao hàng</th>
                                            <th>Số điện thoại</th>
                                            <th>Tên sản phẩm</th>
                                            <th>SỐ lượng</th>
                                            <th>Gía bạn</th>
                                            <th>Ngày lập hóa đơn</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach($customers as $customer)
                                        <tr class="odd gradeX">
                                                <td class="center">{{$customer->id}}</td>
                                                <td class="center">{{$customer->Address_shipping}}</td>
                                                <td class="center">{{$customer->phone_customer}}</td>
                                                <td class="center">{{$customer->name}}</td>
                                                <td class="center">{{$customer->quantity}}</td>
                                                <td class="center">{{$customer->unit_price}}</td>
                                                <td class="center">{{$customer->created_at}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            @include('Manager.InformLogin')
            <!-- /.row -->
           
            <!-- /.row -->
           
            <!-- /.row -->
 </div>


@endsection





  