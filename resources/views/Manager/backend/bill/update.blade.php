@extends('Manager.manager')     
@section('content_manager')
<div id="page-wrapper">
  <form action="{!! url('dashboard/bill/'.$bill->id) !!}" method="POST">
      {!! csrf_field() !!}
      <div class="row">
          <div class="col-lg-12 ">
          <div class="panel panel-info">
              <div class="panel-heading" style="height:60px;">
                <h3 >
                  <a href="{!! url('dashboard/list_bill') !!}" style="color:white;margin-right:10px;margin-top:-40px;" class="btn btn-primary" >Quay về</a>
                  Chi tiết đơn hàng số {{ $bill->id}}
                </h3>
              <div class="navbar-right" style="margin-right:10px;margin-top:-60px;">
                  @if($bill->status > 0)
                  <button type="submit" class="btn btn-primary"  id="save" style="float:right" disabled="" >Lưu</button>
                  @else
                  <button type="submit" class="btn btn-primary" id="save" style="float:right" >Lưu</button>
                  @endif

                  <a href="{!! url('dashboard/process') !!}" ><i class="btn btn-default" style="float:right;" >Hủy</i></a>
              </div>
              </div>
              <div class="panel-body">

      <div class="row">
          <div class="col-lg-6">
              <div class="table-responsive">
                <table class="table table-hover">
                    <tbody>
                         <tr>
                            <td><b>Tên khách hàng</b></td>
                            <td>{{ $customer->full_name }}</td>
                        </tr>
                        <tr>
                            <td><b>Số điện thoại giao hàng</b></td>
                            <td>{{ $bill->phone_customer}}</td>
                        </tr>
                        <tr>
                            <td><b>Email</b></td>
                            <td>{{ $customer->email}}</td>
                        </tr>
                        <tr>
                            <td><b>Địa chỉ giao hàng</b></td>
                            <td>{{ $bill->Address_shipping}}</td>
                        </tr>
                    </tbody>
                </table>
              </div>    
              <div class="form-group">
                  <label for="input" >Tình trạng đơn hàng</label>
                  <div>
                      <select id="input" name="status"  data= "{{$bill->status}}" class="form-control"  {{ $bill->status > 1 ? "disabled" : ''}} >
                          @if($bill->status == 0)
                          <option value='0' {{ $bill->status == 0 ? 'selected' :''}} >Chưa xác nhận</option>";
                       
                          <option value='1'  {{ $bill->status == 1 ? 'selected' :''}} >Đã xác nhận</option>";
                     
                          <option value='3'  {{ $bill->status == 3 ? 'selected' :''}}>Đã hủy</option>";
                          @endif

                          @if($bill->status ==1)
                          <option value='1'  {{ $bill->status == 1 ? 'selected' :''}} >Đã xác nhận</option>";

                          <option value='3'  {{ $bill->status == 3 ? 'selected' :''}}>Đã Giao hàng</option>";
                          @endif

                          @if($bill->status ==2)
                          <option value='2'  {{ $bill->status == 2 ? 'selected' :''}}>Đã thanh toán</option>";

                          <option value='3'  {{ $bill->status == 3 ? 'selected' :''}}>Đã Giao hàng</option>";
                          @endif

                           @if($bill->status ==3)

                          <option value='3'  {{ $bill->status == 3 ? 'selected' :''}}>Đã Giao hàng</option>";
                          @endif

                          @if($bill->status ==4)
                          <option value='4'  {{ $bill->status == 4 ? 'selected' :''}}>Đã hủy</option>";


                          @endif                  
                      </select>
                  </div>
              </div>
          </div>
    
          <div class="col-lg-6">
          
  			 
              <div class="form-group">
  				
                  <label>Người nhận hàng</label>
                  @if($bill->name_reciepe == null)
                  <input required class="form-control" name="name_reciepe" value="{{ $customer->full_name }}" placeholder="Họ và tên..."  />
                  @else
                  <input required class="form-control" name="name_reciepe" value="{{ $bill->name_reciepe }}" placeholder="Họ và tên..."
                  /> 
                  @endif
                      <span class="help-block">
                          <strong></strong>
                      </span>
             
              </div>
              <div class="form-group">
                  <label>Số điện thoại người nhận</label>
                  @if($bill->phone_reciepe == null)
                  <input required class="form-control" name="phone_reciepe" value="{{ $bill->phone_customer}}"  pattern="[0-9]{10,11}" maxlength='10' title=" nhâp số điện thoại 10 hoặc 11 chữ số" />
                  @else
                  <input required class="form-control" name="phone_reciepe" value="{{$bill->phone_reciepe}}"  pattern="[0-9]{10,11}" maxlength='10' title=" nhâp số điện thoại 10 hoặc 11 chữ số" />
                  @endif
                 
                      <span class="help-block">
                          <strong></strong>
                      </span>
                 
              </div>
              <div class="form-group">
                  <label>Email người nhận</label>
                   @if($bill->email_reciepe == null)
                  <input required class="form-control" name="email_reciepe" value="{{$customer->email}}" 
                    pattern="[a-z0-9._%+-]+@[gmail]+\.[com]{2,63}$"  />
                    @else
                     <input required class="form-control" name="email_reciepe" value="{{$bill->email_reciepe}}" 
                    pattern="[a-z0-9._%+-]+@[gmail]+\.[com]{2,63}$"  />
                    @endif
                 
                      <span class="help-block">
                          <strong></strong>
                      </span>
                 
              </div>      
          </div>
        
      </div>
      <div class="row">
          <div class="col-lg-12" >
              <div class="table-responsive">
                  <table class="table table-hovered" >
                      <thead>
                          <tr>
                              <th>STT</th>
                              <th>Sản phẩm</th>
                              <th>Đơn giá</th>
                              <th>Số lượng</th>
                              <th>Thành tiền</th>
                          </tr>
                      </thead>
                      <tbody>
                      @php $count = count($bill_details);  @endphp
                        @for($i=0;$i<$count;$i++)
                              <tr>
                                  <td>{!! $i + 1 !!}</td>
                                  <td name="name">{{ $bill_details[$i]->name }}</td>
                                  <td name="price">
                                    {!! $bill_details[$i]->unit_price !!}
                                  <input type="hidden" name="price" value=""/>
                                  </td>
                                  <td >
                                    {{ $bill_details[$i]->quantity }}
                                  </td>
                                  <td name = >
                                  {!! number_format($bill_details[$i]->sales_price)!!} vnđ 
                                  </td>
                              </tr>
                        @endfor
                             
                        
                          <tr>
                          <td colspan="5">
                              <b >Tổng tiền : {!! number_format("$bill->total",0,",",".") !!} vnđ </b>
                              
                          </td>
                              
                          </tr>

                      </tbody>
                  </table>
                  </div>
              </div>
            </div>
          </div>
      </div>
  </form>
</div>
<script type="text/javascript">
 $(document).ready(function(e)
  {
        $a = $('#input').attr('data');
        
        if($a == 0)
        {

        }
        else
        {
          $('#input').on('change',function(e)
          {
              var value =  e.target.value;
              if(value ==1 )
              {
                $('#save').attr("disabled","disabled");
              }
             else
             {
               $('#save').removeAttr("disabled");
                
             }
          })
        }

        
       
  });
</script>
@stop