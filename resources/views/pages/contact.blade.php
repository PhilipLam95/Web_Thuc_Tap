@extends('layouts.master')
@section('noidung')


<div class="contact">
	 <div class="container">
		 <ol class="breadcrumb">
		  <li><a href="{{route('index')}}">Trang chủ</a></li>
		  <li class="active">Liên hệ</li>
		 </ol>
		 <div class="contact-head">
		 	 <h2>Liên hệ</h2>
		 	  <tbody>
                	@if (Session::has('flash_message'))
                        <div class="alert alert-{!! Session::get('flash_level') !!}">
                            {!! Session::get('flash_message') !!}
                        </div>
          			@endif  
			  <form action="{{route('postContact')}}" method="post">
			  {!! csrf_field() !!}
				  <div class="col-md-6 contact-left">
						<input placeholder="Name"  name ="full_name" required="" type="text" required value="{{ Auth::check() ? 'Auth::user()->full_name' :''}}">
						<input placeholder="E-mail" name="email" type="text"  pattern="[a-z0-9._%+-]+@[gmail]+\.[com]{2,63}$" required value="{{ Auth::check() ? 'Auth::user()->email' :''}}">
						<input placeholder="Phone" name ="phone" required="" type="text" pattern="[0-9]{10,11}" maxlength='10' title=" nhâp số điện thoại 10 hoặc 11 chữ số" required="" value="{{ Auth::check() ? 'Auth::user()->phone' :''}}">
				 </div>
				 <div class="col-md-6 contact-right">
						 <textarea placeholder="Message" name="message" ></textarea>
						 <input value="SEND" type="submit">
				 </div>
				 <div class="clearfix"></div>
			 </form>
		 </div>
		 <div class="address">
			 <h3>Chi nhánh của chúng tôi</h3>
			 <div class="locations">				 
				  <ul>
					 <li><span></span></li>					 					
					 <li>
						 <div class="address-info">	
							 <h4>Việt Nam, TP.HCM</h4>
							 <p>A75/6D/20 BẠCH ĐẰNG</p>
							 <p>Phone: 0985668449</p>
							 <p>Mail: <a href="mailto:info@example.com">drakaabc456@gmail.com</a></p>
							 <h5><a href=""> Vị trí: google map &gt;&gt;</a></h5>	
						 </div>
					 </li>				
				  </ul>	
				  <ul>
					 <li><span></span></li>					 					
					 <li>
						 <div class="address-info">	
							 <h4>Việt Nam, TP.HCM</h4>
							 <p>A75/6D/20 BẠCH ĐẰNG</p>
							 <p>Phone: 0985668449</p>
							 <p>Mail: <a href="mailto:info@example.com">drakaabc456@gmail.com</a></p>
							 <h5><a href="">Vị trí: google map  &gt;&gt;</a></h5>	
						 </div>
					 </li>				
				  </ul>	
			 </div>			 
		 </div>
		 <div class="contact-map">
				 <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1578265.0941403757!2d-98.9828708842255!3d39.41170802696131!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54eab584e432360b%3A0x1c3bb99243deb742!2sUnited+States!5e0!3m2!1sen!2sin!4v1407515822047"> </iframe>
	     </div>
	 </div>
</div>
@endsection