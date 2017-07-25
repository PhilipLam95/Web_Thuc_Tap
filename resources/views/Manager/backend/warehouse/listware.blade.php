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
                        <!-- /.panel-heading -->
                        <div class="panel-body">


                            <!-- Trigger/Open The Modal -->
                            
                            <a id="myBtn" href="{{route('getadd_new_wareproduct')}}" style="margin: 0px 0px 10px 0px;" class="btn btn-info" style="margin-top:-8px;" >Thêm sản phẩm mới vào Kho</a>
                             <a id="myBtn" style="margin: 0px 0px 10px 0px;" class="btn btn-info" style="margin-top:-8px;" >Nhập Kho</a>
                            <!-- The Modal -->
                         
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            
                                            <th style="width:15px"t>ID_Product</th>
                                            <th style="width:auto">Tên Sản phẩm Nhập</th>
                                            <th style="width: 200px">Số lượng Nhập</th>
                                            <th style="width: 200px">Gía Nhập</th>
                                            
                                           
                                        </tr>
                                    </thead>
                                    <tbody>

                                      @Foreach($imports as $import)
                                        <tr class="odd gradeX">
                                            
                                                <td class="center">{{$import->id_product}}</td>
                                                <td class="center">{{$import->Name_Product}}</td>
                                                <td class="center">{{$import->import_quantity}}</td>
                                               
                                                <td class="center">{{$import->import_price}}</td>
                                                
                                                 
                                            
                                           
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
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Kitchen Sink
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div id="dataTables-example" >
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Username</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Mark</td>
                                                <td>Otto</td>
                                                <td>@mdo</td>
                                            </tr>
                                           
                                        </tbody>
                                    </table>
                                </div>
                            <!-- /.table-responsive -->
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
               
                <!-- /.col-lg-6 -->
            </div>
            <!-- /.row -->
           
            <!-- /.row -->
           
            <!-- /.row -->
 </div>
 @endsection