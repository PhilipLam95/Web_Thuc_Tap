@extends('layouts.master')
@section('noidung')
<div class="container">
	  <ol class="breadcrumb">
		  <li><a href="index.html">Home  </a></li>
		  <li class="active">Account</li>
		 </ol>
	 <div class="registration">
		 <div class="registration_left">
			 <h2>new user? <span> create an account </span></h2>
			 <!-- [if IE] 
				< link rel='stylesheet' type='text/css' href='ie.css'/>  
			 [endif] -->  
			  
			 <!-- [if lt IE 7]>  
				< link rel='stylesheet' type='text/css' href='ie6.css'/>  
			 <! [endif] -->  
			
			@if(count($errors)>0)
				<div class="alert alert-danger">
					<ul>
						@foreach($errors->all() as $error)
						<li>{{$error}}</li>
						@endforeach
					</ul>
				</div>
			@endif
			@if(Session::has('thanhcong'))
				<div class="alert alert-success" id="alert">{{Session::get('thanhcong')}}</div>
			@endif
			@if(Session::has('thatbai'))
				<div class="alert alert-danger" id="alert">{{Session::get('thatbai')}}</div>
			@endif
			<div class="registration_form">
			 <!-- Form -->
				<form id="registration_form" action="{{route('register')}}" method="post">
					<input type="hidden" name="_token" value="{{csrf_token()}}">
					<h4>Đăng ký</h4>

					<div>
						<label>
							<input placeholder="full_name:" type="text" name ="full_name" id="full_name" tabindex="1" required autofocus>
						</label>
					</div>
					
					<div>
						<label>
							<input placeholder="email " type="email" name="email" id="email" tabindex="3" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}$" data-validation="email">
						</label>
					</div>
					<div>
						<label>
							<input placeholder="Mobile:" type="phone" name="phone" id="phone" tabindex="3"  pattern="[0-9]{10,11}" required required title=" nhâp số điện thoại 10 hoặc 11 chữ số">
						</label>
					</div>
					<div>
						<label>
							<input placeholder="Address:" type="address" name="address" id="address" tabindex="3" required>
						</label>
					</div>
					<!-- </div>					
						<div class="sky_form1">
							<ul>
								<li><label class="radio left"><input type="radio" name="radio" checked=""><i></i>Male</label></li>
								<li><label class="radio"><input type="radio" name="radio"><i></i>Female</label></li>
								<div class="clearfix"></div>
							</ul>
						</div>					
					<div> -->
					<div>
							<label>
								<input placeholder="password" type="password" name="password" id="password" tabindex="4" required>
							</label>
					</div>
								
					<div>
						<label>
							<input placeholder="retype password" type="password" name="re_password" id="re_password" tabindex="4" required>
						</label>
					</div>	

					<div>
						<input type="submit" value="create an account" id="register-submit">
					</div>

					<!-- <div class="sky-form">
						<label class="checkbox"><input type="checkbox" name="checkbox" ><i></i>i agree to mobilya.com &nbsp;<a class="terms" href="#"> terms of service</a> </label>
					</div> -->
				</form>
				<!-- /Form -->
			</div>
		 </div>
		 <div class="registration_left">
			 <h2>existing user</h2>
			 <div class="registration_form">
			 <!-- Form -->
			 	@if(Session::has('loitruycap'))
					<div class="alert alert-success">{{Session::get('loitruycap')}}</div>
				@endif
				<form id="registration_form" action="{{route('signin')}}" method="post">
				<input type="hidden" name="_token" value="{{csrf_token()}}">
					<div>
						<label>
							<input placeholder="email:" name="email" type="email" tabindex="3" required>
						</label>
					</div>
					<div>
						<label>
							<input placeholder="password" name="password" type="password" tabindex="4" required>
						</label>
					</div>						
					<div>
						<input type="submit" value="sign in" id="register-submit">
					</div>
					<div class="forget">
						<a href="#">forgot your password</a>
					</div>
				</form>
			 <!-- /Form -->
			 </div>
		 </div>
		 <div class="clearfix"></div>
	 </div>
</div>
@endsection