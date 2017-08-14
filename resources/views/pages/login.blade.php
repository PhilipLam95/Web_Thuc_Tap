@extends('layouts.master')
@section('noidung')
<div class="login_sec">
	 <div class="container">
		 <ol class="breadcrumb">
		  <li><a href="{{route('index')}}">Trang chủ</a></li>
		  <li class="active">Đăng nhập</li>
		 </ol>
		 <h2 style="">ĐĂNG NHẬP</h2>

		 <div class="col-md-6 log">			 
				 <p> XIN CHÀO BẠN ĐÃ TỚI VỚI STUDI0 CỦA CHÚNG TÔI.</p>
				<!--  <p>If you have previously Login with us, <span>click here</span></p> -->
				 @if(Session::has('loitruycap'))
					<div class="alert alert-success">{{Session::get('loitruycap')}}</div>
				@endif
				<div class="account-bottom">
					 <form action="{{route('signin')}}" method="post" class="beta-form-checkout">
					 	<input type="hidden" name="_token" value="{{csrf_token()}}" required="">
						 <h5>Tên đăng nhập:</h5>	
						 <input type="text" id="email" value=""  name="email" placeholder="example@gmail.com" required="">
						 <h5>Mật khẩu:</h5>
						 <input type="password" value="" id="password" name="password">					
						 <input type="submit" value="Đăng nhập">
						 <a href="https://www.facebook.com/search/top/?q=php%201-11">Quên mật khẩu ?</a>

					 </form>
				</div>
				
				  <form action="{{route('provider_login','facebook')}}" method="get" class="beta-form-checkout">
				 	<input type="submit" value="Đăng nhập bằng facebook">	 
				 </form>
<!-- 				 <button type="button">
							<a  href="{{route('provider_login','facebook')}}">
								<i class="fa fa-google-plus" aria-hidden="true" style="font-size: 20px;">
								Login with Google
								</i>
								
							</a>
					</button> -->
				  <div class="clearfix"></div>
		 </div>
		  <div class="col-md-6 login-right">
			  	<h3>Đăng ký tài khoản mới</h3>
				<p>Bằng việc tạo ra một tải khoản với cửa hàng của chúng tôi.bạn sẽ thanh toán được nhanh hơn</p>
				<a class="acount-btn" href="{{route('register')}}">Tạo một tài khoản</a>
		 </div>
		 <div class="clearfix"></div>
	 </div>
</div
@endsection