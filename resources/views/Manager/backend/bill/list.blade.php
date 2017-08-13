@extends('Manager.manager')     
@section('content_manager')                
 <div id="page-wrapper">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#all" data-toggle="tab"><b>Tất cả</b></a>
            </li>
            <li ><a href="#new" data-toggle="tab"  ><b>Chưa xác nhận</b></a>
            </li>
             <li><a href="#new1" data-toggle="tab"><b>Đã xác nhận</b></a>
            </li>
            <li><a href="#delivery" data-toggle="tab"><b>Đã giao hàng</b></a>
            </li>
             <li><a href="#new2" data-toggle="tab"><b>Đã hủy</b></a>
            </li>
        </ul>
    <div class="tab-content">
        <div class="tab-pane fade in active" id="all"> <!-- Tất cả -->
            <br>
            <div class="dataTable_wrapper">
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                
                    <tr align="center">
                        <th>ID_Bill</th>
                         <th>ID_Customer</th>
                        <th>Tên khách hàng</th>
                        <th>Thời gian đặt hàng</th>
                        <th>Tổng tiên</th>
                        <th>Tình trạng</th>
                    @if(Auth::user()->group !=0)
                        <th>Chức năng</th>
                    @endif
                 
                      
                    </tr>
                </thead>
                <tbody>
                 @if(Session::has('thanhcong'))
                    <div class="alert alert-success" id="alert">{{Session::get('thanhcong')}}</div>
                @endif
                @if(Session::has('thatbai'))
                    <div class="alert alert-danger" id="alert">{{Session::get('thatbai')}}</div>
                @endif
                    @foreach($bills as $bill)
                        <tr align="center">
                            <td>{{$bill->id}} 

                            </td>
                            <td>{{ $bill->id_customer}}</td>
                            <td>{{$bill->full_name}}</td>
                            <td>{{ $bill->created_at}}</td>
                            <td>{{ $bill->total}}</td>
                           
                            <td>
                            @php
                                switch($bill->status)
                                 {
                                   case 0:
                                        echo "Chưa xác nhận";
                                        break;
                                    case 1:
                                        echo "Đã xác nhận";
                                        break;
                                    case 2:
                                        echo "Đã thanh toán";
                                        break;
                                    case 3:
                                        echo "Đã giao hàng";
                                        break;
                                    case 4:
                                        echo "Đã hủy";
                                        break; 
                                 }
                            @endphp

                            </td>
                            @if(Auth::user()->group !=0)
                                <td class="center"   >

                               @if($bill->status == 0)
                               <a href="{{route('approve_bill',$bill->id)}}" type="button" class="btn btn-success" data-toggle="tooltip" data-placement="left" title="xác nhận hóa đơn"><i class="fa fa-check-square-o"></i></a>
                               @endif
                               <!-- cập nhật -->
                                <a 
                                href="{!! url('dashboard/bill/'.$bill->id) !!}" 
                                type="button" class="btn btn-primary" 
                                data-toggle="tooltip" data-placement="left" 
                                title="Cập nhật thông tin đơn hàng"><i class="fa fa-crosshairs"></i></a>

                                <!-- in hoa đơn -->
                                @if($bill->status >0)
                                <a  
                                href="" 
                                    type="button" class="btn btn-default" 
                                    data-toggle="tooltip" data-placement="left" 
                                    title="In hóa đơn"> <i class="fa fa-print"> In Hóa đơn</i>
                                </a>
                                @endif
                                 @if($bill->status == 4)
                                 <a href="{!! url('dashboard/bill/'.$bill->id.'/remove') !!}" type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="left" title="Hủy"><i class="fa fa-times-circle"></i></a>
                                    @endif
                                </td>
                            @endif
                           
                            
                        </tr>
                    @endforeach
                 
                
                    </tbody>

                </table>
            </div>  
        </div>


        <div class="tab-pane fade " id="new">     <!-- chưa xác nhận -->
            <br>
            <div class="dataTable_wrapper">
            <table class="table table-striped table-bordered table-hover" id="dataTables-example1">
                <thead>
                   <tr align="center">
                        <th>ID_Bill</th>
                         <th>ID_Customer</th>
                        <th>Tên khách hàng</th>
                        <th>Thời gian đặt hàng</th>
                        <th>Tổng tiên</th>
                        <th>Tình trạng</th>
                    @if(Auth::user()->group !=0)
                        <th>Chức năng</th>
                    @endif
                 
                      
                    </tr>
                </thead>
                <tbody>
                       @foreach($unapproves as $unapprove)
                        <tr align="center">
                            <td>{{$unapprove->id}} </td>
                            <td>{{ $unapprove->id_customer}}</td>
                            <td>{{$unapprove->full_name}}</td>
                            <td>{{ $unapprove->created_at}}</td>
                            <td>{{ $unapprove->total}}</td>
                           
                            <td>
                            @php
                                switch($unapprove->status)
                                 {
                                   case 0:
                                        echo "Chưa xác nhận";
                                        break;
                                 }
                            @endphp

                            </td>
                             </td>
                            @if(Auth::user()->group !=0)
                                <td class="center"   >

                               @if($unapprove->status == 0)
                               <a href="{{route('approve_bill',$unapprove->id)}}" type="button" class="btn btn-success" data-toggle="tooltip" data-placement="left" title="xác nhận hóa đơn"><i class="fa fa-check-square-o"></i></a>
                               @endif
                               <!-- cập nhật -->
                                <a 
                                href="{!! url('dashboard/bill/'.$unapprove->id) !!}" 
                                type="button" class="btn btn-primary" 
                                data-toggle="tooltip" data-placement="left" 
                                title="Cập nhật thông tin đơn hàng"><i class="fa fa-crosshairs"></i></a>

                                <!-- in hoa đơn -->
                                @if($unapprove->status >0)
                                <a  
                                href="" 
                                    type="button" class="btn btn-default" 
                                    data-toggle="tooltip" data-placement="left" 
                                    title="In hóa đơn"> <i class="fa fa-print"> In Hóa đơn</i>
                                </a>
                                @endif
                                 @if($unapprove->status == 4)
                                 <a href="{!! url('dashboard/bill/'.$unapprove->id.'/remove') !!}" type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="left" title="Hủy"><i class="fa fa-times-circle"></i></a>
                                    @endif
                                </td>
                            @endif
                           
                            
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>


        <div class="tab-pane fade" id="new1">        <!-- Đã xác nhận -->
            <br>
            <div class="dataTable_wrapper">
            <table class="table table-striped table-bordered table-hover" id="dataTables-example1">
                <thead>
                   <tr align="center">
                        <th>ID_Bill</th>
                         <th>ID_Customer</th>
                        <th>Tên khách hàng</th>
                        <th>Thời gian đặt hàng</th>
                        <th>Tổng tiên</th>
                        <th>Tình trạng</th>
                    @if(Auth::user()->group !=0)
                        <th>Chức năng</th>
                    @endif
                 
                      
                    </tr>
                </thead>
                <tbody>
                    
                       @foreach($approves as $approve)
                        <tr align="center">
                            <td>{{$approve->id}} </td>
                            <td>{{ $approve->id_customer}}</td>
                            <td>{{$approve->full_name}}</td>
                            <td>{{ $approve->created_at}}</td>
                            <td>{{ $approve->total}}</td>
                           
                            <td>
                            @php
                                switch($approve->status)
                                 {
                                
                                    case 1:
                                        echo "Đã xác nhận";
                                        break;
                                 
                                 }
                            @endphp

                            </td>
                           @if(Auth::user()->group !=0)
                                <td class="center"   >

                               @if($approve->status == 0)
                               <a href="{{route('approve_bill',$approve->id)}}" type="button" class="btn btn-success" data-toggle="tooltip" data-placement="left" title="xác nhận hóa đơn"><i class="fa fa-check-square-o"></i></a>
                               @endif
                               <!-- cập nhật -->
                                <a 
                                href="{!! url('dashboard/bill/'.$approve->id) !!}" 
                                type="button" class="btn btn-primary" 
                                data-toggle="tooltip" data-placement="left" 
                                title="Cập nhật thông tin đơn hàng"><i class="fa fa-crosshairs"></i></a>

                                <!-- in hoa đơn -->
                                @if($approve->status >0)
                                <a  
                                href="" 
                                    type="button" class="btn btn-default" 
                                    data-toggle="tooltip" data-placement="left" 
                                    title="In hóa đơn"> <i class="fa fa-print"> In Hóa đơn</i>
                                </a>
                                @endif
                                 @if($approve->status == 4)
                                 <a href="{!! url('dashboard/bill/'.$approve->id.'/remove') !!}" type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="left" title="Hủy"><i class="fa fa-times-circle"></i></a>
                                    @endif
                                </td>
                            @endif
                           
                            
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="tab-pane fade" id="delivery">    <!-- đã giao hàng -->
            <br>
            <div class="dataTable_wrapper">
            <table class="table table-striped table-bordered table-hover" id="dataTables-example2">
                <thead>
                   <tr align="center">
                        <th>ID_Bill</th>
                         <th>ID_Customer</th>
                        <th>Tên khách hàng</th>
                        <th>Thời gian đặt hàng</th>
                        <th>Tổng tiên</th>
                        <th>Tình trạng</th>
                    @if(Auth::user()->group !=0)
                        <th>Chức năng</th>
                    @endif
                 
                      
                    </tr>
                </thead>
                <tbody>
                    
                       @foreach($delivered as $delivery)
                        <tr align="center">
                            <td>{{ $delivery->id}} </td>
                            <td>{{  $delivery->id_customer}}</td>
                            <td>{{ $delivery->full_name}}</td>
                            <td>{{  $delivery->created_at}}</td>
                            <td>{{  $delivery->total}}</td>
                           
                            <td>
                            @php
                                switch( $delivery->status)
                                 {
                                
                                    case 3:
                                        echo "Đã giao hàng";
                                        break;
                                 
                                 }
                            @endphp

                            </td>
                           @if(Auth::user()->group !=0)
                                <td class="center"   >

                               @if( $delivery->status == 0)
                               <a href="{{route('approve_bill', $delivery->id)}}" type="button" class="btn btn-success" data-toggle="tooltip" data-placement="left" title="xác nhận hóa đơn"><i class="fa fa-check-square-o"></i></a>
                               @endif
                               <!-- cập nhật -->
                                <a 
                                href="{!! url('dashboard/bill/'. $delivery->id) !!}" 
                                type="button" class="btn btn-primary" 
                                data-toggle="tooltip" data-placement="left" 
                                title="Cập nhật thông tin đơn hàng"><i class="fa fa-crosshairs"></i></a>

                                <!-- in hoa đơn -->
                                @if($delivery->status >0)
                                <a  
                                href="" 
                                    type="button" class="btn btn-default" 
                                    data-toggle="tooltip" data-placement="left" 
                                    title="In hóa đơn"> <i class="fa fa-print"> In Hóa đơn</i>
                                </a>
                                @endif
                                 @if($delivery->status == 4)
                                 <a href="{!! url('dashboard/bill/'. $delivery->id.'/remove') !!}" type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="left" title="Hủy"><i class="fa fa-times-circle"></i></a>
                                    @endif
                                </td>
                            @endif
                           
                            
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="tab-pane fade" id="new2">        <!-- Đã xác nhận -->
            <br>
            <div class="dataTable_wrapper">
            <table class="table table-striped table-bordered table-hover" id="dataTables-example1">
                <thead>
                   <tr align="center">
                        <th>ID_Bill</th>
                         <th>ID_Customer</th>
                        <th>Tên khách hàng</th>
                        <th>Thời gian đặt hàng</th>
                        <th>Tổng tiên</th>
                        <th>Tình trạng</th>
                    @if(Auth::user()->group !=0)
                        <th>Chức năng</th>
                    @endif
                 
                      
                    </tr>
                </thead>
                <tbody>
                    
                       @foreach($bill_cancels as $bill_cancel)
                        <tr align="center">
                            <td>{{$bill_cancel->id}} </td>
                            <td>{{ $bill_cancel->id_customer}}</td>
                            <td>{{$bill_cancel->full_name}}</td>
                            <td>{{ $bill_cancel->created_at}}</td>
                            <td>{{ $bill_cancel->total}}</td>
                           
                            <td>
                            @php
                                switch($bill_cancel->status)
                                 {
                                
                                    case 4:
                                        echo "Đã Hủy";
                                        break;
                                 
                                 }
                            @endphp

                            </td>
                           @if(Auth::user()->group !=0)
                                <td class="center"   >

                               @if($bill_cancel->status == 0)
                               <a href="{{route('approve_bill',$bill_cancel->id)}}" type="button" class="btn btn-success" data-toggle="tooltip" data-placement="left" title="xác nhận hóa đơn"><i class="fa fa-check-square-o"></i></a>
                               @endif
                               <!-- cập nhật -->
                                <a 
                                href="{!! url('dashboard/bill/'.$bill_cancel->id) !!}" 
                                type="button" class="btn btn-primary" 
                                data-toggle="tooltip" data-placement="left" 
                                title="Cập nhật thông tin đơn hàng"><i class="fa fa-crosshairs"></i></a>

                                <!-- in hoa đơn -->
                                @if($bill_cancel->status >0)
                                <a  
                                href="" 
                                    type="button" class="btn btn-default" 
                                    data-toggle="tooltip" data-placement="left" 
                                    title="In hóa đơn"> <i class="fa fa-print"> In Hóa đơn</i>
                                </a>
                                @endif
                                 @if($bill_cancel->status == 4)
                                 <a href="{!! url('dashboard/bill/'.$bill_cancel->id.'/remove') !!}" type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="left" title="Hủy"><i class="fa fa-times-circle"></i></a>
                                    @endif
                                </td>
                            @endif
                           
                            
                        </tr>
                    @endforeach
                    </tbody>
                </table>
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
@stop
