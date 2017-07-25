@extends('Manager.manager')     
@section('content_manager')
<div id="page-wrapper">
     @if(Session::has('thanhcong'))
                <div class="alert alert-success" id="alert">{{Session::get('thanhcong')}}</div>
    @endif
    <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Thêm Sản Phẩm Mới vào kho</h1>
                </div>
                <!-- /.col-lg-12 -->
    </div>
    <form action="{!! url('dashboard/warehouse/add') !!}" method="POST"  enctype="multipart/form-data">
    <input type="hidden" name="_token" value={!!csrf_token()!!}>
        <div class="row">
            <div class="col-lg-12 ">
                <div class="panel panel-info">
                    <div class="panel-heading" style="height:60px;">
                        <h3 >
                            <a href="{!! url('dashboard/warehouse') !!}" style="color:white;margin-right:10px;margin-top:-30px;" class="btn btn-primary">Quay về</a>
                        </h3>
                        <div class="navbar-right" style="margin-right:10px;margin-top:-50px;">
                            
                            <a href="{!! url('dashboard/warehouse') !!}" ><i class="btn btn-default" >Hủy</i></a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="col-lg-12">
                                <div class="form-group">
                                

                                    <input type="hidden" required class="form-control" name="id_product" value="{{$id}}" placeholder="ID_SẢN PHẨM"   />
                                    <div>
                                      
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Tên sản phẩm</label>
                                    <input required class="form-control" name="name_product" value="" placeholder="Tên sản phẩm" />
                                    <div>
                                      
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Giá Nhập</label>
                                    <input  class="form-control" name="import_price" value="" placeholder="Gía Nhập" />
                                    <div>
                                      
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Số lượng Nhập</label>
                                    <input  class="form-control" name="import_quantity" value="" placeholder="Số lượng Nhập" />
                                    <div>
                                      
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Mô tả</label>
                                    <input  class="form-control" name="description" value="" placeholder="Mô tả " />
                                    <div>
                                      
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
                                        
                                    </select >
                                    <label style="padding-left:10px">Loại sản phẩm</label>

                                    <select  name="type_child" id="show_product"  style="width: 150px;">
                                       
                                    </select>
                                    {{ Form::close() }}
                                </div>
                                 <div class="form-group">
                                    <label>Gía bán</label>
                                    <input  class="form-control" name="sale_price" value="" placeholder="Gía bán" value="0" />
                                    <div>
                                      
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <label>Chất liệu</label>
                                    <input  class="form-control" name="Materia" value="" placeholder="Chất liệu" />
                                    <div>  
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
                                                                    <input type="file" name="image2" id="new_image" class="form-control">
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
                                                                    <input type="file" name="image3" id="new_image" class="form-control">
                                                                </div>
                                                            </div>
                                                        </div>
                                </div>
                                 <div class="row clearfix">
                                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                            <label class="image">Kích thước</label>
                                                        </div>
                                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                            <div class="form-group">
                                                                <div class="form-line">
                                                                    <input type="text" name="size" id="new_image" class="form-control">
                                                                </div>
                                                            </div>
                                                        </div>
                                </div>
                                <div class="row clearfix"><button type="submit" class="btn btn-primary">Lưu</button></div>
                                 
                        </div>
                    </div>
                </div>
            </div>
        </div>      
    </form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
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
</script>

@endsection