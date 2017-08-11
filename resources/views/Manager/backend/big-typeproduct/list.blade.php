@extends('Manager.manager')     
@section('content_manager')

<div id="page-wrapper" style="min-height: 335px;">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Các loại nội thất</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

             <a id="myBtn" href="{{route('add_big_types')}}" style="margin: 0px 0px 10px 0px;" class="btn btn-info" style="margin-top:-8px;" >Thêm loại nội thất</a>
            <!-- /.row -->
            <div class="row">

            @foreach( $big_types as $big_type)
                <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-heading" style="font-weight: bolder;color:#b33c00">
                            {{$big_type->name_type}}

                                     <a id="myBtn" href="{!!url('/dashboard/big_type/update/'.$big_type->id.'') !!}" style="" class="btn btn-info" >Sửa</a>
                         
                                          
                        </div>
                        <div class="panel-body">
                            <h1 style="font-weight: bolder;color:#b33c00;text-align: center;"> {{$big_type->name_type}}
                                <small>
                                    <img src="images/{{ $big_type->image_type}}" class="img-responsive img-rounded" alt="Image" 
                                        style="width: 300px;height: 300px">

                                </small>
                            </h1>
                            
                            
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
            @endforeach
                <!-- /.col-lg-4 -->
               
              
            </div>
            <!-- /.row -->
            
            <!-- /.row -->
        </div>
 @endsection