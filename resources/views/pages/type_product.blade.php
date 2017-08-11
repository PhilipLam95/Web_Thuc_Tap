@extends('layouts.master')
@section('noidung')

		


<div class="product-model">	 
	 <div class="container">
			<ol class="breadcrumb">
		  <li><a href="{{route('index')}}">Home</a></li>
		  <li class="active">Sản Phẩm</li>
		 </ol>

	
			<h2 style="color:#662200;text-align: center;">{{$categories->name_type}}</h2>
	
		
		<div class="col-md-9 product-model-sec">
					<a href="single.html"></a>
					@foreach($products as $product)
					<div class="product-grid love-grid">
					 	<a href="{{route('detail',$product->id_product)}}" >

							<div class="more-product">
								<span> </span>
							</div>						
							<div class="product-img b-link-stripe b-animate-go  thickbox">
								<img src="images/{{ $product->image}}"  style="height:250px;width:200px;" class="img-responsive" alt="">
								<div class="b-wrapper">
									<h4 class="b-animate b-from-left  b-delay03">							
										<button class="btns">
										<span class="glyphicon glyphicon-eye-open" aria-hidden="true" ></span>Quick Vie</button>
									</h4>
								</div>
								 	<div class="alert alert-success thanhcong{{$product->id_product}}" style="display: none;"></div>
		       						<div class="alert alert-danger thatbai{{$product->id_product}}" style="display: none;"></div>
							</div>
						</a>						
						<div class="product-info simpleCart_shelfItem">
							<div class="product-info-cust prt_name" >
								<h4 style="color: #802b00">{{ $product->name}}</h4>
								<p style="color: #802b00" >ID:{{ $product->id_product}} </p>
								@if($product->unit_price!=0)
								<span class="item_price" style="color: #802b00">{{number_format($product->unit_price)}}VND</span>
								@else
								<p >GIá liên hệ:<a style="color:red"> 0985668449</a></p>	
								@endif							
								<a type="hidden" id="soluong{{$product->id_product}}" value ="{{$product->redisual_quantity}}"> </a>
								<a>
									<div class="add-to-cart" data ="{{$product->id_product}}" >
										<input class="item_add items"  value="ADD"   type="button"> 
									</div>
								</a>
							</div>													
							<div class="clearfix"> </div>
						</div>
					</div>
					@endforeach
					
					
					<!-- <a href="single.html"></a>
					<div class="product-grid love-grid">
						<a href="single.html">
							<div class="more-product">
								<span> </span>
							</div>						
							<div class="product-img b-link-stripe b-animate-go  thickbox">
								<img src="images/p2.jpg" class="img-responsive" alt="">
									<div class="b-wrapper">
										<h4 class="b-animate b-from-left  b-delay03">							
											<button class="btns"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>Quick View</button>
										</h4>
									</div>
							</div>
						</a>					
						<div class="product-info simpleCart_shelfItem">
							<div class="product-info-cust">
								<h4>Fabric Sofa set</h4>
								<p>ID: SR4598</p>
								<span class="item_price">$187.95</span>
								<input class="item_quantity" value="1" type="text">
								<input class="item_add items" value="ADD" type="button">	
							</div>										
							<div class="clearfix"> </div>
						</div>
					</div> -->
					
			<div  class="col-md-9 product-model-sec">{{$products->links() }} </div>	
		
		</div>
		
		@include('pages.menuleft')			 
	 </div>
</div>

@endsection
