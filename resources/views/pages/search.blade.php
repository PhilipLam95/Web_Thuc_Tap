@extends('layouts.master')
@section('noidung')

<div class="product-model">	 
	 <div class="container">
			<ol class="breadcrumb">
		  <li><a href="index.html">Home</a></li>
		  <li class="active">Sản Phẩm Mới</li>
		 </ol>
			<h2 style="color:#662200;text-align: center;">Có {{count($products)}} sản phầm theo từ khóa </h2>			
		<div class="col-md-9 product-model-sec">
					<a href="single.html"></a>
					@foreach($products as $product)
					<div class="product-grid love-grid">
					 	<a " href="{{route('detail',$product->id)}}">

							<div class="more-product">
								<span> </span>
							</div>						
							<div class="product-img b-link-stripe b-animate-go  thickbox">
								<img src="images/{{$product->image}}"  style="height:250px;width:200px" class="img-responsive" alt="">
								<div class="b-wrapper">
									<h4 class="b-animate b-from-left  b-delay03">							
										<button class="btns" >
										<span class="glyphicon glyphicon-eye-open" aria-hidden="true"  ></span>Quick Vie</button>
									</h4>
								</div>
							</div>
						</a>						
						<div class="product-info simpleCart_shelfItem">
							<div class="product-info-cust prt_name" >
								<h4 style="color: #802b00">{{$product->name}}</h4>
								<p style="color: #802b00" >ID:{{$product->id}} </p>
								<span class="item_price" style="color: #802b00">{{number_format($product->unit_price)}}VND</span>								
								<input class="item_quantity" value="1" type="text">
								<a href="single.html"><input class="item_add items" value="ADD" type="button"></a>
							</div>													
							<div class="clearfix"> </div>
						</div>
					</div>
					@endforeach
					
					
					

	<div  class="col-md-9 product-model-sec"> </div>		
		</div>
		
			@include('pages.menuleft')			 
	      </div>
		</div>

@endsection