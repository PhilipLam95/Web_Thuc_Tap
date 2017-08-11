@extends('Manager.manager')     
@section('content_manager')
 <div id="page-wrapper">


            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">DANH SÁCH NHÂN VIÊN</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row" style="overflow: scroll;">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          Danh sách các nhân viên
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">


                            <!-- Trigger/Open The Modal -->
                            
                            <a id="myBtn"  href="{{route('add_employ')}}" style="margin: 0px 0px 10px 0px;" class="btn btn-info" style="margin-top:-8px;" >Thêm nhân viên</a>
                            @if(Session::has('thanhcong'))
                                <div class="alert alert-success" id="alert">{{Session::get('thanhcong')}}</div>
                             @endif
                            <!-- The Modal -->
                           
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            @if(Auth::user()->group == 2)
                                            <th>ID</th>
                                            @endif
                                            <th style="width:200px">Email</th>
                                             <th style="width: 100px">Họ và tên</th>
                                            <th style="width: 100px">Số điện thoai</th>
                                            <th style="width: 100px">Địa chỉ</th>

                                            <th>@if(Auth::check())
                                                         @if(Auth::user()->group == 1)
                                                            Sửa
                                                         @endif
                                                @endif

                                                @if(Auth::check())
                                                         @if(Auth::user()->group == 2)
                                                            Nâng Cấp Tài Khoản Nhân Viên
                                                         @endif
                                                @endif
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach($employees as $employ)
                                        <tr class="odd gradeX">
                                                @if(Auth::user()->group == 2)
                                                <td>{{ $employ->id }}</td>
                                                @endif
                                                <td>{{ $employ->email }}</td>
                                                <td class="center">{{ $employ->full_name }}</td>
                                                <td class="center">{{$employ->phone}}</td>
                                                <td class="center">{{$employ->address}}</td>
                                                <td>
                                                @if(Auth::check())
                                                         @if(Auth::user()->id == $employ->id)
                                                            <a href="{!!url('/dashboard/employee/update/'.$employ->id.'') !!}" type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="left" title="Chỉnh sửa">
                                                                <i class="fa fa-pencil fa-fw"></i>
                                                            </a>
                                                        @endif
                                                @endif
                                                @if(Auth::check())
                                                         @if(Auth::user()->group == 2)
                                                            <a href="{!!url('/dashboard/employee/update/'.$employ->id.'') !!}" type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="left" title="Nâng Cấp">
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





  