@extends('Manager.manager')     
@section('content_manager')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


<div id="myModal" class="modal">
<!-- Modal content -->
    <div class="modal-content">
        <div class="modal-header">
            <span class="close">&times;</span>
            <h6>Thêm sản phẩm</h6>
        </div>
        <div class="modal-body">
            <form id="new_form" enctype="multipart/form-data"  action="{!! url('dashboard/warehouse/add') !!}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <button type="submit" class="btn btn-primary">Lưu</button>
                <div style="width: 500px; padding-left: 200px">
                    <select class="selectpicker form-control" name="status" id="status"  required="">
                        <option name="" class="" value="">Chon</option>
                        <option name="" class="" value="1" required="">Hàng đặt</option>
                        <option name="" class="" value="2" required="">Hàng thành phẩm</option>
                    </select>
                </div><br>
                <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                        <label class="name">Tên Sản Phẩm</label>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="name_product" id="new_name" required="" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    
                    {{ Form::open(array('url' => '', 'files' => true)) }}
                    <label style="padding-left: 15px">Nội thất phòng</label>
                    
                    <select  name="type" id="type"  style="width: 150px ;">
                        
                        <option name="" class="" value="Chon">Chọn</option>
                        @foreach($types as $type)
                        <option name="" class="" value="{{$type->id}}">{{$type->name_type}}</option>
                        @endforeach
                        <?php /*echo fill_brand($connect);*/ ?>
                        
                    </select>
                    <label style="padding-left:10px">Loại sản phẩm</label>
                    
                    <select  name="type_child" id="show_product"  style="width: 150px;">
                        <?php /*echo fill_product($connect);*/?>
                    </select>
                    {{ Form::close() }}
                    
                </div>
                <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                        <label class="name">Mô tả</label>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                        <div class="form-group">
                            <div class="form-line">
                                 <input  name="description" id="description" required="" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row clearfix">
                    
                    <label style="padding-left: 15px">GIá bán&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    
                    
                    <input  type="text" name="sale_price" id="sale_price" required="" maxlength="10"  value="0">
                    
                    
                    <label style="padding-left:10px">Gía Nhập</label>
                    
                    <input  type="text" name="import_price" id="new_description" required=""  maxlength="10" >   
                </div>
                <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                        <label class="romotion-price">Số lượng Nhập</label>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                        <div class="form-group">
                            <div class="form-line">
                                <input type="number" name="import_quantity" id="" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                        <label class="romotion-price">Chất liệu</label>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                        <div class="form-group">
                            <div class="form-line">
                               <input  name="Materia" id="description" required="" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                        <label class="romotion-price">Kích thước</label>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                        <div class="form-group">
                            <div class="form-line">
                                <input type="number" name="size" id="size" class="form-control" value="0">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                        <label class="image">Hình Ảnh 1</label>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                        <div class="form-group">
                            <div class="form-line">
                                <input type="file" name="image" id="image" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                        <label class="image">Hình Ảnh 2</label>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                        <div class="form-group">
                            <div class="form-line">
                                <input type="file" name="image2" id="image" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                        <label class="image">Hình Ảnh 3</label>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                        <div class="form-group">
                            <div class="form-line">
                                <input type="file" name="image3" id="image" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>

               
               
                
            </form>
        </div>
    
    </div>
</div>


 <div id="page-wrapper">


            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Sản Phẩm</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row" style="overflow: scroll;">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          Danh sách Các Mặt Hàng
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">


                            <!-- Trigger/Open The Modal -->
                            
                            <a id="myBtn" style="margin: 0px 0px 10px 0px;" class="btn btn-info" style="margin-top:-8px;" >Thêm Sản Phẩm</a>
                            @if(Session::has('thanhcong'))
                                <div class="alert alert-success" id="alert">{{Session::get('thanhcong')}}</div>
                             @endif
                            <!-- The Modal -->
                           
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Ảnh</th>
                                            <th>ID</th>
                                            <th style="width:200px">Tên Sản phẩm</th>
                                             <th style="width: 100px">Số lượng Nhập</th>
                                            <th>Gía Nhập</th>
                                            <th>Gía bán</th>
                                            <th style="width:40px">Trạng thái</th>
                                            <th>Xóa</th>
                                            <th>Sửa</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach($products as $product)
                                        <tr class="odd gradeX">
                                            
                                                <td> 
                                                    <img src="images/{{ $product->image}}" class="img-responsive img-rounded" alt="Image" style="width: 70px; height: 40px;">
                                                </td>
                                                <td>{{ $product->id_product}}</td>
                                                <td>{{ $product->name}}</td>
                                                <td class="center">{{ $product->import_quantity}}</td>
                                                @if($product->unit_price !=0)
                                                    <td class="center">{{$product->unit_price}}</td>
                                                @else
                                                    <td class="center">Gía liên hệ</td>
                                                @endif
                                                <td>{{ $product->import_price}}</td>
                                                <td>
                                                    @if($product->status_pro == 0)
                                                    <a href="{!!url('/dashboard/product/'.$product->id_product.'/approve') !!}" type="button" class="btn btn-success" data-toggle="tooltip" data-placement="left" title="xác nhận bán sản phẩm"><i class="fa fa-check-square-o"></i></a>
                                                    @else
                                                     <a href="{!!url('/dashboard/product/'.$product->id_product.'/unapprove') !!}" type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="left" title="Hủy bản sán phẩm"><i class="fa fa-times-circle"></i></a>
                                                     @endif
                                                </td>
                                               
                                                    
                                                 <td>
                                                    <a href="{!! url('dashboard/product/'.$product->id_product.'/remove') !!}" onclick="return confirmDel('Bạn có chắc muốn xóa dữ liệu này?')" type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="left" title="Xóa">
                                                        <i class="fa  fa-trash-o  fa-fw"></i>
                                                    </a>            
                                                </td>
                                                <td>
                                                     <a href="" type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="left" title="Chỉnh sửa">
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

<script type="text/javascript">
$('#status').on('change',function(e)
{
    var id=e.target.value;
    if(id==1)
    {
        $('#sale_price').attr("disabled", "disabled");
        $('#size').attr("disabled","disabled");
    }
    if(id==2)
    {
        $('#sale_price').attr('disabled',false);
        $('#size').attr("disabled",false);
    }
});


$('#type').on('change',function(e)
{
    console.log(e);
    var id =  e.target.value;

    //ajax
    $.get('dashboard/select_typechild/'+id,function(data){

    $('#show_product').empty();
    $.each(data,function(key,value){

    $('#show_product').append('<option value="'+value.id+'">'+value.name_type+'</option>')
    });
    });
})
</script>
@endsection


<script type="text/javascript">
  $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
    var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
} 


</script>
  


  