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
    <form action="{{route('add_small_types')}}" method="POST"  enctype="multipart/form-data">
    <input type="hidden" name="_token" value={!!csrf_token()!!}>
        <div class="row">
            <div class="col-lg-12 ">
                <div class="panel panel-info">
                    <div class="panel-heading" style="height:60px;">
                        <h3 >
                            <a href="{!! url('dashboard/list_smalltype') !!}" style="color:white;margin-right:10px;margin-top:-30px;" class="btn btn-primary">Quay về</a>
                        </h3>
                        <div class="navbar-right" style="margin-right:10px;margin-top:-50px;">
                            
                            <a href="{!! url('dashboard/process') !!}" ><i class="btn btn-default" >Hủy</i></a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="col-lg-12">
                               
                                <div class="form-group">
                                    <label>Tên loai  sản phẩm</label>
                                    <input required class="form-control" name="name_type" value="" placeholder="Tên sản phẩm"  required="" />
                                    <div>
                                      
                                    </div>
                                </div>


                                 <div class="form-group">
                                    <label>Nội thất phòng</label>

                                        <select  name="type" id="type"  style="width: 300px ; " required="">
                                            
                                            <option name="" class="" value="Chon">Chọn</option>
                                           
                                             @foreach($big_types as $big_type)
                                            <option name="" class="" value="{{$big_type->id}}">{{$big_type->name_type}}</option>
                                             @endforeach
                                            
                                        </select >
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
                                        <input type="file" name="image_type" id="new_image" class="form-control" required="">
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

@endsection