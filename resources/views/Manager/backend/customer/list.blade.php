@extends('Manager.manager')     
@section('content_manager')
 <div id="page-wrapper">


            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">DANH SÁCH KHÁCH HÀNG</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row" style="overflow: scroll;">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          Danh sách Khách hàng
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">


                            <!-- Trigger/Open The Modal -->
                            @if(Session::has('thanhcong'))
                                <div class="alert alert-success" id="alert">{{Session::get('thanhcong')}}</div>
                             @endif
                            <!-- The Modal -->
                           
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th style="width:20px" > ID</th>
                                            <th style="width:200px">Email</th>
                                             <th style="width: 100px">Họ và tên</th>
                                            <th style="width: 100px">Số điện thoai</th>
                                            <th style="width: 100px">Địa chỉ</th>
                                            <th style="width: 100px">Chi tiết Khách hang</th>

                                            
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach($customers as $customer)
                                        <tr class="odd gradeX">
                                                <td>{{ $customer->id }}</td>
                                                <td>{{ $customer->email }}</td>
                                                <td class="center">{{ $customer->full_name }}</td>
                                                <td class="center">{{$customer->phone}}</td>
                                                <td class="center">{{$customer->address}}</td>
                                                <td class="center">
	                                                <a href="{!!url('/dashboard/customer/detail/'.$customer->id.'') !!}" type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="left" title="Chi tiết">
	                                                                <i class="fa fa-pencil fa-fw"></i>
	                                                </a>
	                                            </td>
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





  