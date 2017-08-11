@extends('Manager.manager')     
@section('content_manager')
 <div id="page-wrapper">


            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"> DANH SÁCH ADMIN TRANG WEB</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row" style="overflow: scroll;">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          Danh sách các admin
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">


                            <!-- Trigger/Open The Modal -->
                            @if(Auth::user()->group == 2)
                            <a id="myBtn"  href="{{route('add_admin')}}" style="margin: 0px 0px 10px 0px;" class="btn btn-info" style="margin-top:-8px;" >Thêm Admin</a>
                           	@endif
                            @if(Session::has('thanhcong'))
                                <div class="alert alert-success" id="alert">{{Session::get('thanhcong')}}</div>
                            @endif
                            <!-- The Modal -->
                           
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th style="width:200px">Email</th>
                                             <th style="width: 100px">Họ và tên</th>
                                            <th style="width: 100px">Số điện thoai</th>
                                            <th style="width: 100px">Địa chỉ</th>
                                             	@if(Auth::check())
                                                         @if(Auth::user()->group == 2)
                                                             <th> Sửa</th>
                                                         @endif
                                                @endif

                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach($admins as $admin)
                                        <tr class="odd gradeX">
                                                <td>{{ $admin->email }}</td>
                                                <td class="center">{{ $admin->full_name }}</td>
                                                <td class="center">{{$admin->phone}}</td>
                                                <td class="center">{{$admin->address}}</td>
                                                <td class="center"> 
	                                                @if(Auth::check())
	                                                         @if(Auth::user()->id == $admin->id)
	                                                            <a href="{!!url('/dashboard/admin/update/'.$admin->id.'') !!}" type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="left" title="Chỉnh sửa">
	                                                                <i class="fa fa-pencil fa-fw"></i>
	                                                            </a>
	                                                        @endif
	                                                @endif
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





  