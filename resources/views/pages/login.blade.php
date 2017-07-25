@extends('layouts.master')
@section('noidung')
<div class="login_sec">
	 <div class="container">
		 <ol class="breadcrumb">
		  <li><a href="index.html">Home</a></li>
		  <li class="active">Login</li>
		 </ol>
		 <h2 style="">Login</h2>

		 <div class="col-md-6 log">			 
				 <p>Welcome, please enter the folling to continue.</p>
				 <p>If you have previously Login with us, <span>click here</span></p>
				 @if(Session::has('loitruycap'))
					<div class="alert alert-success">{{Session::get('loitruycap')}}</div>
				@endif
				<div class="account-bottom">
					 <form action="{{route('signin')}}" method="post" class="beta-form-checkout">
					 	<input type="hidden" name="_token" value="{{csrf_token()}}" required="">
						 <h5>User Name:</h5>	
						 <input type="text" id="email" value=""  name="email" placeholder="example@gmail.com" required="">
						 <h5>Password:</h5>
						 <input type="password" value="" id="password" name="password">					
						 <input type="submit" value="Login">
						 <a href="https://www.facebook.com/search/top/?q=php%201-11">Forgot Password ?</a>

					 </form>
				</div>
				
				  <form action="{{route('provider_login','facebook')}}" method="get" class="beta-form-checkout">
				 	<input type="submit" value="Login with FaceBook">	 
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
			  	<h3>NEW REGISTRATION</h3>
				<p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
				<a class="acount-btn" href="{{route('register')}}">Create an Account</a>
		 </div>
		 <div class="clearfix"></div>
	 </div>
</div
@endsection