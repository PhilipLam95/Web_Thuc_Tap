@extends('Manager.manager')     
@section('content_manager')
<div id="page-wrapper">
            @if(Session::has('thanhcong'))
                <div class="alert alert-success" id="alert">{{Session::get('thanhcong')}}</div>
            @endif
            @if(Session::has('thatbai'))
                <div class="alert alert-danger" id="alert">{{Session::get('thatbai')}}</div>
            @endif
    <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Thêm Nhân viên</h1>
                </div>
                <!-- /.col-lg-12 -->
    </div>
    <form action="" method="POST"  enctype="multipart/form-data">
    <input type="hidden" name="_token" value={!!csrf_token()!!}>
        <div class="row">
            <div class="col-lg-12 ">
                <div class="panel panel-info">
                    <div class="panel-heading" style="height:60px;">
                        <h3 >
                            <a href="{!! url('dashboard/list_employee') !!}" style="color:white;margin-right:10px;margin-top:-30px;" class="btn btn-primary">Quay về</a>
                        </h3>
                        <div class="navbar-right" style="margin-right:10px;margin-top:-50px;">
                            
                            <a href="{!! url('dashboard/process') !!}" ><i class="btn btn-default" >Hủy</i></a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="col-lg-12">
                               
                                <div class="form-group">
                                    <label>Full_name</label>
                                    <input required class="form-control" name="full_name" value="" placeholder="Tên sản phẩm"  required="" />
                                    <div>
                                      
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Email</label>
                                    <input required class="form-control" name="email" value="" placeholder="email"  required=""  pattern="[a-z0-9._%+-]+@[gmail]+\.[com]{2,63}$" />
                                    <div>
                                      
                                    </div>
                                </div>

                                 <div class="form-group">
                                    <label>Phone</label>
                                    <input required class="form-control" name="phone" value="" placeholder="phone_number"  required=""  pattern="[0-9]{10,11}" maxlength='10' title=" nhâp số điện thoại 10 hoặc 11 chữ số" />
                                    <div>
                                      
                                    </div>
                                </div>

                                 <div class="form-group">
                                    <label>Address</label>
                                    <input required class="form-control" name="address" value="" placeholder="Address"  required="" />
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

@endsection