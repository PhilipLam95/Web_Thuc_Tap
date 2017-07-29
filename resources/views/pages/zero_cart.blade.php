@extends('layouts.master')
@section('noidung')
<div class="cart_main" style="padding-bottom: 500px">
	 <div class="container">
			 <ol class="breadcrumb">
		  <li><a href="men.html">Home</a></li>
		  <li class="active">Cart</li>
		 </ol>			
		 <div class="cart-items">
			<h6>Không có sản phẩm nào trong giỏ hàng. Quay lai <a href="{{route('new_product')}}" style="color:blue">cửa hàng </a>để tiếp tục mua sắm. </h6>
		 </div>


	
		 
	</div>	 
</div >
@endsection