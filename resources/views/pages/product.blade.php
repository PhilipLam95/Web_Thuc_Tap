@extends('layouts.master')
@section('noidung')

<div class="product-model">	 
	 <div class="container">
			<ol class="breadcrumb">
		  <li><a href="{{route('index')}}">Home</a></li>
		  <li class="active">Sản Phẩm Mới</li>
		 </ol>
			<h2 style="color:#662200;text-align: center;">SẢN PHẨM CỦA CHÚNG TÔI</h2>			
		<div class="col-md-9 product-model-sec">
					<a href="single.html"></a>
					@foreach ($all_pros as $all_pro)
					<div class="product-grid love-grid">
					 	<a href="{{route('detail',$all_pro->id_product)}}">

							<div class="more-product">
								<span> </span>
							</div>						
							<div class="product-img b-link-stripe b-animate-go  thickbox">
								<img src="images/{{$all_pro->image}}"  style="height:250px;width:200px" class="img-responsive" alt="">
								<div class="b-wrapper">
									<h4 class="b-animate b-from-left  b-delay03">							
										<button class="btns">
										<span class="glyphicon glyphicon-eye-open" aria-hidden="true" ></span>Quick View</button>
									</h4>
								</div>
								<div class="alert alert-success thanhcong{{$all_pro->id_product}}" style="display: none;"></div>
		       					<div class="alert alert-danger thatbai{{$all_pro->id_product}}" style="display: none;"></div>
							</div>
						</a>						
						<div class="product-info simpleCart_shelfItem">
							<div class="product-info-cust prt_name" >
								<h4 style="color: #802b00">{{$all_pro->name}}</h4>
								<p style="color: #802b00" >ID: {{$all_pro->id_product}}</p>
								<span class="item_price" style="color: #802b00">{{number_format($all_pro->unit_price)}} VND</span>		
								 <a type="hidden" id="soluong{{$all_pro->id_product}}" value ="{{$all_pro->redisual_quantity}}"> </a>	
								<div class="add-to-cart" data ="{{$all_pro->id_product}}" >
										<input class="item_add items"  value="ADD"   type="button"> 
								</div>
	
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
					
			<div  class="col-md-9 product-model-sec">{{$all_pros->links() }} </div>		
		</div>
		
			@include('pages.menuleft')			 
	</div>
</div>

@endsection