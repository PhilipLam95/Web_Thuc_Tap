@extends('Manager.manager')     
@section('content_manager')
<div id="page-wrapper">
     @if(Session::has('thanhcong'))
                <div class="alert alert-success" id="alert">{{Session::get('thanhcong')}}</div>
    @endif
    <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Thêm Nội Thất</h1>
                </div>
                <!-- /.col-lg-12 -->
    </div>
    <form action="{{ route('add_big_types')}}" method="POST"  enctype="multipart/form-data">
    <input type="hidden" name="_token" value={!!csrf_token()!!}>
        <div class="row">
            <div class="col-lg-12 ">
                <div class="panel panel-info">
                    <div class="panel-heading" style="height:60px;">
                        <h3 >
                            <a href="{!! url('dashboard/list_bigtype') !!}" style="color:white;margin-right:10px;margin-top:-30px;" class="btn btn-primary">Quay về</a>
                        </h3>
                        <div class="navbar-right" style="margin-right:10px;margin-top:-50px;">
                            
                            <a href="{!! url('dashboard/process') !!}" ><i class="btn btn-default" >Hủy</i></a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="col-lg-12">
                               
                                <div class="form-group">
                                    <label>Tên sản phẩm</label>
                                    <input required class="form-control" name="name_product" value="" placeholder="Tên sản phẩm"  required="" />
                                    <div>
                                      
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Mô tả</label>
                                     <textarea name="description"  id="ckeditor" class="form-control" style="resize: none; height: 12.7em;outline: none;border-top: 1px solid black;" required="" >
                                        </textarea>
                                        <script>
                                        CKEDITOR.replace( 'ckeditor');
                                    </script>
                                </div>

                                <div class="form-group">
                                    <label>Hình Ảnh</label>
                                    <div class="form-line">
                                        <input type="file" name="image" id="new_image" class="form-control">
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