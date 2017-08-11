@extends('Manager.manager')     
@section('content_manager')

<style type="text/css">
	
	hr { 
    display: block;
    margin-top: 0.5em;
    margin-bottom: 0.5em;
    margin-left: auto;
    margin-right: auto;
    border-style: inset;
    border-width: 1px;
} 

</style>
<div id="page-wrapper">
     @if(Session::has('thanhcong'))
                <div class="alert alert-success" id="alert">{{Session::get('thanhcong')}}</div>
    @endif
    <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Sửa thông tin nội thất</h1>
                </div>
                <!-- /.col-lg-12 -->
    </div>
    
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
					<form action="{!!url('/dashboard/big_type/update/'.$big_types->id.'') !!}" method="POST"  enctype="multipart/form-data">
						    <input type="hidden" name="_token" value={!!csrf_token()!!}>
						        <div class="row">
						            <div class="col-lg-12 ">
						                <div class="panel panel-info">
						                    <div class="panel-body">
						                        <div class="col-lg-12">
						                             
							                                <div class="form-group">
							                                    <label>Tên nội thất</label>
							                                    <input required class="form-control" name="name_type" value="{!! $big_types->name_type !!}" placeholder="Tên sản phẩm"  />
							                                    
							                                </div>

							                                <div class="form-group">
							                                    <label>Mô tả</label>
							                                    <input  class="form-control" name="description" value="{!! $big_types->description !!}"  required="" />
							                                    
							                                </div>

							                                <div class="row clearfix">
                                					
		                                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">

		                                                            <label class="image" style="padding-bottom: 60px">Hình Ảnh </label>	

		                                                            <label class="image"> Hình  muốn đổi </label>

		                                                        </div>
	                                                        
	                                                       
		                                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
		                                                            <div class="form-group">

		                                                                <div class="form-line" style=" padding-bottom:20px;">
		                                                                 
		                                                                   <a>
		                                                                   	<input type="text" name="currentImage" id="new_image" class="form-control" required="" value="{!! $big_types->image_type!!}" disabled="">

		                                                                   	 <img src="images/{!! $big_types->image_type!!}" class="img-responsive img-rounded" alt="Image" style="width: 70px; height: 40px;">
		                                                                   	<input type="file" name="image_type" id="new_image" class="form-control" >
		                                                                    
		                                                                   </a>

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
            </div>
       	</div>      
 
</div>




@endsection