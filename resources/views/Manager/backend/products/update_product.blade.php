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
                    <h1 class="page-header">Sửa sản phẩm</h1>
                </div>
                <!-- /.col-lg-12 -->
    </div>
    <form action="{!!url('/dashboard/product/update/'.$products->id_product.'') !!}" method="POST"  enctype="multipart/form-data">
    <input type="hidden" name="_token" value={!!csrf_token()!!}>
        <div class="row">
            <div class="col-lg-12 ">
                <div class="panel panel-info">
                    <div class="panel-heading" style="height:60px;">
                        <h3 >
                            <a href="{!! url('dashboard/list_products') !!}" style="color:white;margin-right:10px;margin-top:-30px;" class="btn btn-primary">Quay về</a>
                        </h3>
                        <div class="navbar-right" style="margin-right:10px;margin-top:-50px;">
                            
                            <a href="{!! url('dashboard/process') !!}" ><i class="btn btn-default" >Hủy</i></a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="col-lg-12">

                                <div class="form-group">
                                    <label>Tên sản phẩm</label>
                                    <input required class="form-control" name="name" value="{!! $products->name !!}" placeholder="Tên sản phẩm" />
                                    <div>
                                      
                                    </div>
                                </div>


                               <div class="form-group">
                                    <label>Mô tả </label>
                                    <input  class="form-control" name="description" value="{!! $products->description !!}" placeholder="Mô tả" readonly="" required="" />
                                    <div>
                                      
                                    </div>
                                </div>


                                 <div class="row clearfix">
                    
				                    {{ Form::open(array('url' => '', 'files' => true)) }}
				                    <label style="padding-left: 15px">Nội thất phòng</label>
				                    
				                    <select  name="type" id="type"  style="width: 150px ;">

				                         @foreach($types as $type)
				                        	@if($type->id == $type_cha)
				                         	<option value="{{$type->id}}" selected ="true">{{ $type->name_type }}</option>
				                       		@else
				                        	<option  class="" value="{{$type->id}}">{{$type->name_type}}</option>
				                        	@endif
				                        @endforeach
				                      
				                        
				                    </select>
				                    <label style="padding-left:10px">Loại sản phẩm</label>
				                    
				                    <select  name="type_child" id="show_product"  style="width: 150px;">
				                     	<option value="{{$products->id_type}}">{{ $products->name_type}}</option>
				                    </select>
				                    {{ Form::close() }}
				                    
				                </div>
                                 <div class="form-group">
                                    <label>Gía bán</label>
                                    <input  class="form-control" name="sale_price" value="{!! $products->unit_price !!}" placeholder="Gía bán" value="0"  pattern="[0-9]" maxlength='' />
                                    <div>
                                      
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <label>Chất liệu</label>
                                    <input  class="form-control" name="Materia" value="{!! $products->Materia !!}" placeholder="Chất liệu" />
                                    <div>  
                                    </div>
                                </div><hr>
                                <div class="row clearfix">
                                					
	                                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">

	                                                            <label class="image" style="padding-bottom: 60px">Hình Ảnh 1</label>	

	                                                            <label class="image"> Hình 1 muốn đổi </label>

	                                                        </div>
                                                        
                                                       
	                                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
	                                                            <div class="form-group">

	                                                                <div class="form-line" style=" padding-bottom:20px;">
	                                                                 
	                                                                   <a>
	                                                                   	<input type="text" name="currentImage" id="new_image" class="form-control" required="" value="{!! $products->image !!}" disabled="">

	                                                                   	 <img src="images/{{ $products->image}}" class="img-responsive img-rounded" alt="Image" style="width: 70px; height: 40px;">
	                                                                   <input type="file" name="image" id="new_image" class="form-control" >
	                                                                    
	                                                                   </a>

	                                                                </div>
	                                                            </div>
	                                                        </div>
                                                       
                                </div>
                                <div><hr>
	                                <div class="row clearfix">
	                                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
	                                                             <label class="image" style="padding-bottom: 60px">Hình Ảnh 2</label>	

		                                                           <label class="image"> Hình 2 muốn đổi </label>
	                                                        </div>
	                                                        	<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
		                                                            <div class="form-group">

		                                                                <div class="form-line" style=" padding-bottom:20px;">
		                                                                 
		                                                                   <a>
		                                                                   	<input type="text" name="currentImage2" id="new_image" class="form-control" required="" value="{!! $products->image2 !!}" disabled="">

		                                                                  	 <img src="images/{{ $products->image2}}" class="img-responsive img-rounded" alt="Image" style="width: 70px; height: 40px;">
		                                                                   <input type="file" name="image2" id="new_image" class="form-control" >
		                                                                    
		                                                                   </a>

		                                                                </div>
		                                                            </div>
		                                                        </div>
	                               </div>
	                             </div>
                                 <div><hr>           
	                                <div class="row clearfix">
	                                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
	                                                             <label class="image" style="padding-bottom: 60px">Hình Ảnh 3</label>	

		                                                           <label class="image"> Hình 3 muốn đổi </label>
	                                                        </div>
	                                                        <d<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
		                                                            <div class="form-group">

		                                                                <div class="form-line" style=" padding-bottom:20px;">
		                                                                 
		                                                                   <a>
		                                                                   	<input type="text" name="icurrentImage3" id="new_image" class="form-control" required="" value="{{$products->image3}}" disabled="">

		                                                                   	 <img src="images/{!!  $products->image3 !!}" class="img-responsive img-rounded" alt="Image" style="width: 70px; height: 40px;">
		                                                                   <input type="file" name="image3" id="new_image" class="form-control" >
		                                                                    
		                                                                   </a>

		                                                                </div>
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
                                                                    <input type="text" name="size" id="new_image" class="form-control" value="{!! $products->size !!}">
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



@endsection