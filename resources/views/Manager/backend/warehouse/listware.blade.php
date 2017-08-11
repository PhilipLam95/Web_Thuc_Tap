@extends('Manager.manager')     
@section('content_manager')

<div id="page-wrapper">
 			<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Kho</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          Danh sách Các Mặt Hàng trong kho
                        </div>

                          @if(Session::has('thanhcong'))
                                <div class="alert alert-success" id="alert">{{Session::get('thanhcong')}}</div>
                             @endif
                        <!-- /.panel-heading -->
                        <div class="panel-body">


                            <!-- Trigger/Open The Modal -->
                            
                            <a id="myBtn" href="{{route('getadd_new_wareproduct')}}" style="margin: 0px 0px 10px 0px;" class="btn btn-info" style="margin-top:-8px;" >Thêm sản phẩm mới vào Kho</a>
                             
                            <!-- The Modal -->
                         
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            
                                            <th style="width:15px"t>ID_Product</th>
                                            <th style="width:auto">Tên Sản phẩm Nhập</th>
                                            <th style="width: 200px">Số lượng Nhập</th>
                                            <th style="width: 100px">Số lượng hàng còn trong kho</th>

                                            <th style="width: 200px">Gía Nhập</th>
                                            <th style="width: 200px">Nhập Kho</th>
                                            
                                           
                                        </tr>
                                    </thead>
                                    <tbody>

                                      @Foreach($imports as $import)
                                        <tr class="odd gradeX">
                                            
                                                <td class="center">{{$import->id_product}}</td>
                                                <td class="center">{{$import->Name_Product}}</td>
                                                <td class="center">{{$import->import_quantity}}</td>
                                                <td class="center">{{$import->redisual_quantity}}</td>
                                               
                                                <td class="center">{{$import->import_price}}</td>
                                                <td class="center"><a id="myBtn"  href="{!!url('/dashboard/warehouse/'.$import->id_product.'/import') !!}" style="margin: 0px 0px 10px 0px;" class="btn btn-info" style="margin-top:-8px;" >Nhập Kho</a></td>
                                                
                                                 
                                            
                                           
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