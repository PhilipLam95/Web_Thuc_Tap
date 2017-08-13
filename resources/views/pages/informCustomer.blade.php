@extends('layouts.master')
@section('noidung')
<script type="text/javascript" src="js/easyResponsiveTabs.js"></script> 
<script type="text/javascript" src="js/jquery.min.js"></script> 
<script type="text/javascript" src="js/pretty-doughtnut.js"></script> 

<link rel="stylesheet" type="text/css" href="css/style_inform_customer.css">


<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="css/bootstrap-3.0.0.min.css">

<!-- Optional theme -->
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap-theme.min.css"> -->

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>



 <div class="contact">
	<div class="container">
	 	<ol class="breadcrumb">
		  <li><a href="{{route('index')}}">Home</a></li>
		  <li class="active">Thông tin khách hàng</li>
		 </ol>
		 	 					@if(Session::has('thanhcong'))
									<div class="alert alert-success" id="alert">{{Session::get('thanhcong')}}</div>
								@endif
								@if(Session::has('thatbai'))
									<div class="alert alert-danger" id="alert">{{Session::get('thatbai')}}</div>
								@endif
								@include('pages.changePassword')

		<ol class="breadcrumb">

					<div id="verticalTab" class="resp-vtabs w3-agile" style="display: block; width: 100%; margin: 0px;">

						<ul class="resp-tabs-list agileits-w3layouts">
							<li class="resp-tab-item"><span>Thông tin khách hàng</span></li>
							<li class="resp-tab-item"><span>Đơn hàng </span></li>
							<li class="resp-tab-item agileinfo"><span>Chức năng</span></li>
							<li class="resp-tab-item"><span>Hỗ trợ </span></li>
						</ul>

						<div class="resp-tabs-container">

							<div class="resp-tab-content">
								<div class="agileabout">
									<div class="agileabout-image w3-agileits">
										<img src="images/itachi.jpg" alt="W3layouts" height="400" width="300">
									</div>
									<div class="agileabout-info">
										<ul>
											<li><div class="li1">Họ tên</div><div class="li2">:</div><div class="li3">{{Auth::user()->full_name}}</div><div class="clearfix"></div></li>

											<li><div class="li1">Email</div><div class="li2 agileinfo">:</div><div class="li3"><a class="mail" href="mailto:mail@example.com">{{Auth::user()->email}}/a></div><div class="clearfix"></div></li>

											<li><div class="li1">Phone</div><div class="li2">:</div><div class="li3">{{Auth::user()->phone}}</div><div class="clearfix"></div></li>

											<li><div class="li1">Địa chỉ</div><div class="li2">:</div><div class="li3">{{Auth::user()->address}}</div><div class="clearfix"></div></li>

											<li><div class="li1">Gia nhập ngày</div><div class="li2">:</div><div class="li3">{{Auth::user()->created_at}}</div><div class="clearfix w3-agileits"></div></li>
											</li>
										</ul>
									</div>
									<div class="clear"></div>
								</div>
							</div>

							<div class="resp-tab-content">
								<div class="work">
									<div class="work-info agileits-w3layouts">
										<h5 style="color: #998f00;text-align: center">Lịch sủ đơn hàng</h5>
										<table  class="table table-striped table-bordered table-hover" id="dataTables-example" > 
											<div>
												<thead>
								                
								                    <tr align="center" style="color:red;text-align: center;font-weight: bolder;">
								                        <th>ID_Bill</th>
								                        <th>Tên sản phẩm</th>
								                        <th>Số lượng</th>
								                        <th>Gia bán</th>
								                        <th>Địa chỉ giao hàng</th>
								                        <th>Thời gian đặt hàng</th>
								                        
								                    
								                    </tr>
								                </thead>
								                @if(Auth::check())
								                @foreach($customers as $customer)
									                <tbody>
									                	<tr align="center" style="color:red">
									                        <th>{{$customer->id}}</th>
									                        <th>{{$customer->name}}</th>
									                        <th>{{$customer->quantity}}</th>
									                        <th>{{$customer->unit_price}}</th>
									                        <th class="center">{{$customer->Address_shipping}}</td>
									                        <th>{{$customer->created_at}}</th>
									                       
									                    
									                    </tr>
									                	
									                </tbody>
									             @endforeach
								               	@endif
								            </div>
										</table>
									</div>
									
								</div>
							</div>

							<div class="resp-tab-content">
								<div class="work w3-agileits">
									<div class="work-info agileinfo" style="color:red">
										<h4 data-toggle="modal" data-target="#myModal" >Đổi Mật Khẩu</h4>
										<h5>Tài khoản : {{Auth::user()->full_name}}</h5>
										<p>Hãy trở thành khách hàng thông minh bằng việc tạo một mật khẩu mạnh mẹ để giúp bạn bảo mật tốt hơn.</p>
									</div>
									<div class="work-info agileinfo"  style="color:red">
										<h4>Chức năng</h4>
										<h5>Chưa có</h5>
										<p>Đang trong quá trình phát triển</p>
									</div>
									<div class="work-info agileinfo"  style="color:red">
										<h4>Chức năng</h4>
										<h5>Chưa có</h5>
										<p>Đang trong quá trình phát triển</p>
									</div>
								</div>

								
							</div>

							<div class="resp-tab-content">
								<div class="agileabout">
									<div class="agileabout-image w3-agileits">
										<img src="images/erika.jpg" alt="W3layouts" height="400" width="350">
									</div>
									<div class="agileabout-info">
										<ul>
										    <a style="text-align: center">Admin Website</a>
											<li><div class="li1">Họ tên</div><div class="li2">:</div><div class="li3">Erika Sawariji</div><div class="clearfix"></div></li>

											<li><div class="li1">Email</div><div class="li2 agileinfo">:</div><div class="li3"><a class="mail" href="mailto:mail@example.com">drakaabc456@gmail.com</a></div><div class="clearfix"></div></li>

											<li><div class="li1">Phone</div><div class="li2">:</div><div class="li3">0985668449</div><div class="clearfix"></div></li>

											<li><div class="li1">Địa chỉ</div><div class="li2">:</div><div class="li3">Tphcm</div><div class="clearfix"></div></li>

											
										</ul>
									</div>
									<div class="clear"></div>
								</div>
							</div>
							<div class="clear"></div>

						</div>
						<div class="clear w3-agile"></div>

					</div>

		</ol
	</div>
</div>

<script src="js/easyResponsiveTabs.js"></script>
				<script type="text/javascript">
					$(document).ready(function () {
						$('#horizontalTab').easyResponsiveTabs({
							type: 'default',
							width: 'auto',
							fit: true,
							closed: 'accordion',
							activate: function(event) {
								var $tab = $(this);
								var $info = $('#tabInfo');
								var $name = $('span', $info);
								$name.text($tab.text());
								$info.show();
							}
						});
						$('#verticalTab').easyResponsiveTabs({
							type: 'vertical',
							width: 'auto',
							fit: true
						});
					});
</script>
@endsection