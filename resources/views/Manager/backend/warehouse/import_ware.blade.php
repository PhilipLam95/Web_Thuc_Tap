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
                    <h1 class="page-header">Nhập kho</h1>
                </div>
                <!-- /.col-lg-12 -->
    </div>
    
        <div class="row">
            <div class="col-lg-12 ">
                <div class="panel panel-info">
                    <div class="panel-heading" style="height:60px;">
                        <h3 >
                            <a href="{!! url('dashboard/warehouse') !!}" style="color:white;margin-right:10px;margin-top:-30px;" class="btn btn-primary">Quay về</a>
                        </h3>
                        <div class="navbar-right" style="margin-right:10px;margin-top:-50px;">
                            
                            <a href="{!! url('dashboard/process') !!}" ><i class="btn btn-default" >Hủy</i></a>
                        </div>
                    </div>
					<form action="{!!url('/dashboard/warehouse/'.$products->id_product.'/import') !!}" method="POST"  enctype="multipart/form-data">
						    <input type="hidden" name="_token" value={!!csrf_token()!!}>
						        <div class="row">
						            <div class="col-lg-12 ">
						                <div class="panel panel-info">
						                    <div class="panel-body">
						                        <div class="col-lg-12">
						                             
						                                <div class="form-group">
						                                    <label>Tên sản phẩm</label>
						                                    <input required class="form-control" name="name_product" value="{!! $products->name !!}" placeholder="Tên sản phẩm" disabled="" />
						                                    <div>
						                                      
						                                    </div>
						                                </div>

						                                <div class="form-group">
						                                    <label>Giá Nhập</label>
						                                    <input  class="form-control" name="import_price" value="{!! $products->import_price !!} " placeholder="Gía Nhập" />
						                                    <div>
						                                      
						                                    </div>
						                                </div>

						                                <div class="form-group">
						                                    <label>Số lượng Nhập</label>
						                                    <input  class="form-control" name="import_quantity" value="{!! $products->import_quantity !!}" placeholder="Số lượng Nhập" />
						                                    <div>
						                                      
						                                    </div>
						                                </div>

						                              


						                                <div class="form-group">
						                                    <label>Loai sản phẩm</label>
						                                    <input  class="form-control" name="type" value="{!! $products->name_type !!}" placeholder="Số lượng Nhập" disabled="" />
						                                    <div>
						                                      
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>



@endsection