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
			@if(Session::has('thatbai'))
				<div class="alert alert-danger" id="alert">{{Session::get('thatbai')}}</div>
			@endif
    <div class="row">
                <div class="col-lg-12">	
                    <h1 class="page-header">Sửa tài khoản : &nbsp{{$users->full_name}}

                    </h1>
                </div>
                <!-- /.col-lg-12 -->
    </div>
    
        <div class="row">
            <div class="col-lg-12 ">
                <div class="panel panel-info">
                    <div class="panel-heading" style="height:60px;">
                        <h3 >
                            <a href="{{route('admin')}}" style="color:white;margin-right:10px;margin-top:-30px;" class="btn btn-primary">Quay về </a>
                        </h3>
                        <div class="navbar-right" style="margin-right:10px;margin-top:-50px;">
                            
                            <a href="{!! url('dashboard/process') !!}" ><i class="btn btn-default" >Hủy</i></a>
                        </div>
                    </div>
					<form action="{!!url('/dashboard/admin/update/'.$users->id.'') !!}" method="POST"  enctype="multipart/form-data">
						    <input type="hidden" name="_token" value={!!csrf_token()!!}>
						        <div class="row">
						            <div class="col-lg-12 ">
						                <div class="panel panel-info">
						                    <div class="panel-body">
						                    @if(Auth::check())
						                    	@if(Auth::user()->group == 2 && Auth::user()->id == $users->id)
							                        <div class="col-lg-12">
							                             
								                                <div class="form-group">
								                                    <label>Tên tài khoản</label>
								                                    <input required class="form-control" name="full_name" value="{{$users->full_name}}" placeholder="Tên sản phẩm" 
								                                     />
								                                    
								                                </div>

								                                <div class="form-group">
								                                    <label>Email</label>
								                                    <input  class="form-control" name="email" 
								                                    value="{{$users->email}}"  required=""  pattern="[a-z0-9._%+-]+@[gmail]+\.[com]{2,63}$"/>
								                                    
								                                </div>

								                                <div class="form-group">
								                                    <label>	Old_Password</label>
								                                    <input  class="form-control" id="old_password"  type="password" name="old_password"  maxlength='20'
								                                    value=""  required="" />
								                                    @if(Session::has('error_password'))
																		<div class="alert alert-danger" id="alert">{{Session::get('error_password')}}</div>
																	@endif
								                                </div>

								                                <div class="form-group">
								                                    <label>	Password</label>
								                                    <input  class="form-control" id="password" type="password" name="password"  maxlength='20'
								                                    value=""  required="" />
								                                    
								                                </div>

								                                 <div class="form-group">
								                                    <label>Phone</label>
								                                    <input required class="form-control" name="phone" value="{{$users->phone}}" placeholder="phone_number"  required=""  pattern="[0-9]{10,11}" maxlength='10' title=" nhâp số điện thoại 10 hoặc 11 chữ số" />
								                                    <div>
								                                      
								                                    </div>
								                                </div>

								                                 <div class="form-group">
								                                    <label>Address</label>
								                                    <input required class="form-control" name="address" value="{{$users->address}}" placeholder="Address"  required="" />
								                                    <div>
								                                      
								                                    </div>
								                                </div>
							                                <div class="row clearfix"><button type="submit" class="btn btn-primary">Lưu</button></div>
							                                 
							                        </div>
							                    @endif
						                     @endif
						                    </div>
						                </div>
						            </div>
						        </div>      
						</form>
                </div>
            </div>
       	</div>      
 
</div>
<script type="text/javascript">
	
	$('#modal3').click(function () {
        ssi_modal.confirm({
            content: 'Xác nhận nâng cấp tài khoản',
            okBtn: {
                className:'btn btn-primary'
            },
            cancelBtn:{
                className:'btn btn-danger'
            }
             },function (result) {
                if(result)
                		var id = $(this).attr('value');
                		var route ="{{route('update_employ','id_user')}}";
                		route.replace('id_user',$id)
                			$.ajax({
                            url:route,
                            type:'post',
                            data:{
                                id:id,
                            },
                            success:function() {  
                                ssi_modal.notify('success', {content: 'Result: ' + result});
                            }
                            });
                    		
                else
                    ssi_modal.notify('error', {content: 'Result: ' + result});
            }
        );
    });

    $('#modal3b').click(function () {
        ssi_modal.dialog({content: 'Hello World', okBtn:{className:'btn btn-primary'}});
    })
</script>



@endsection