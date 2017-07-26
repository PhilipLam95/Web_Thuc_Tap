@extends('layouts.master')
@section('noidung')

<div class="product-model">	 
	 <div class="container">
			<ol class="breadcrumb">
		  <li><a href="index.html">Home</a></li>
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
										<span class="glyphicon glyphicon-eye-open" aria-hidden="true" ></span>Quick Vie</button>
									</h4>
								</div>
							</div>
						</a>						
						<div class="product-info simpleCart_shelfItem">
							<div class="product-info-cust prt_name" >
								<h4 style="color: #802b00">{{$all_pro->name}}</h4>
								<p style="color: #802b00" >ID: {{$all_pro->id_product}}</p>
								<span class="item_price" style="color: #802b00">{{number_format($all_pro->unit_price)}} VND</span>								
								<input class="item_quantity" value="1" type="text">
								<a href="single.html"><input class="item_add items" value="ADD" type="button"></a>
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
		
			<div class="rsidebar span_1_of_left">
				 <section class="sky-form">
					 <div class="product_right">
						 <h4 class="m_2"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span>Danh Muc San Pham</h4>
						  {{ Form::open(array('url' => '', 'files' => true)) }}
						  @foreach($types as $type)	
						 <div class="tab{{$type->id}}" id="click" value="{{ $type->id}}">
							 <ul class="place">
														
								 <li class="sort" value="{{$type->id}}">{{ $type->name_type}}</li>
								 <li class="by"><img src="images/do.png" alt=""></li>
							
									<div class="clearfix" value="{{$type->id}}"> </div>
							  </ul>
							 <div class="single-bottom" style="display: none;">
							 							
									
									
								
						     </div>
					      </div>
					      @endforeach


						  
						  <!--script-->
						<script>
							$(document).ready(function(){
								$(".tab1 .single-bottom").hide();
								$(".tab2 .single-bottom").hide();
								$(".tab3 .single-bottom").hide();
								$(".tab4 .single-bottom").hide();
								$(".tab5 .single-bottom").hide();
								
								$(".tab1 ul").click(function(){
									$(".tab1 .single-bottom").slideToggle(300);
									$(".tab2 .single-bottom").hide();
									$(".tab3 .single-bottom").hide();
									$(".tab4 .single-bottom").hide();
									$(".tab5 .single-bottom").hide();
								})
								$(".tab2 ul").click(function(){
									$(".tab2 .single-bottom").slideToggle(300);
									$(".tab1 .single-bottom").hide();
									$(".tab3 .single-bottom").hide();
									$(".tab4 .single-bottom").hide();
									$(".tab5 .single-bottom").hide();
								})
								$(".tab3 ul").click(function(){
									$(".tab3 .single-bottom").slideToggle(300);
									$(".tab4 .single-bottom").hide();
									$(".tab5 .single-bottom").hide();
									$(".tab2 .single-bottom").hide();
									$(".tab1 .single-bottom").hide();
								})
								$(".tab4 ul").click(function(){
									$(".tab4 .single-bottom").slideToggle(300);
									$(".tab5 .single-bottom").hide();
									$(".tab3 .single-bottom").hide();
									$(".tab2 .single-bottom").hide();
									$(".tab1 .single-bottom").hide();
								})	
								$(".tab5 ul").click(function(){
									$(".tab5 .single-bottom").slideToggle(300);
									$(".tab4 .single-bottom").hide();
									$(".tab3 .single-bottom").hide();
									$(".tab2 .single-bottom").hide();
									$(".tab1 .single-bottom").hide();
								})	
							});
						</script>
						<!-- script -->					 
				 </div></section>
				 <section class="sky-form">
					 <h4><span class="glyphicon glyphicon-minus" aria-hidden="true"></span>DISCOUNTS</h4>
					 <div class="row row1 scroll-pane">
						 <div class="col col-4">
								<label class="checkbox"><input name="checkbox" checked="" type="checkbox"><i></i>Upto - 10% (20)</label>
						 </div>
						 <div class="col col-4">
								<label class="checkbox"><input name="checkbox" type="checkbox"><i></i>40% - 50% (5)</label>
								<label class="checkbox"><input name="checkbox" type="checkbox"><i></i>30% - 20% (7)</label>
								<label class="checkbox"><input name="checkbox" type="checkbox"><i></i>10% - 5% (2)</label>
								<label class="checkbox"><input name="checkbox" type="checkbox"><i></i>Other(50)</label>
						 </div>
					 </div>
				 </section> 				 				 
				   <section class="sky-form">
						<h4><span class="glyphicon glyphicon-minus" aria-hidden="true"></span>Price</h4>
							<ul class="dropdown-menu1">
								 <li><a href="">								               
								<div id="slider-range"></div>							
								<input id="amount" style="border: 0; font-weight: NORMAL;   font-family: 'Arimo', sans-serif;" type="text">
							 </a></li>			
						  </ul>
				   </section>
				   <!---->
					 <script type="text/javascript" src="js/jquery-ui.min.js"></script>
					 <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
					<script type="text/javascript">//<![CDATA[ 
					$(window).load(function(){
					 $( "#slider-range" ).slider({
								range: true,
								min: 0,
								max: 400000,
								values: [ 8500, 350000 ],
								slide: function( event, ui ) {  $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
								}
					 });
					$( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) + " - $" + $( "#slider-range" ).slider( "values", 1 ) );

					});//]]> 
					</script>
					 <!---->
					 <section class="sky-form">
						<h4><span class="glyphicon glyphicon-minus" aria-hidden="true"></span>Type</h4>
							<div class="row row1 scroll-pane">
								<div class="col col-4">
									<label class="checkbox"><input name="checkbox" checked="" type="checkbox"><i></i>Sofa Cum Beds (30)</label>
								</div>
								<div class="col col-4">
									<label class="checkbox"><input name="checkbox" type="checkbox"><i></i>Dinner Sets   (30)</label>
									<label class="checkbox"><input name="checkbox" type="checkbox"><i></i>3+1+1 Sofa Sets (30)</label>
									<label class="checkbox"><input name="checkbox" type="checkbox"><i></i>Sofa Chairs     (30)</label>
									<label class="checkbox"><input name="checkbox" type="checkbox"><i></i>2 Seater Sofas  (30)</label>
									<label class="checkbox"><input name="checkbox" type="checkbox"><i></i>Display Units   (30)</label>
									<label class="checkbox"><input name="checkbox" type="checkbox"><i></i>L-shaped Sofas  (30)</label>
									<label class="checkbox"><input name="checkbox" type="checkbox"><i></i>3 Seater Sofas  (30)</label>
								</div>
							</div>
				   </section>
				   		<section class="sky-form">
						<h4><span class="glyphicon glyphicon-minus" aria-hidden="true"></span>Brand</h4>
							<div class="row row1 scroll-pane">
								<div class="col col-4">
									<label class="checkbox"><input name="checkbox" checked="" type="checkbox"><i></i>Roadstar</label>
								</div>
								<div class="col col-4">
									<label class="checkbox"><input name="checkbox" type="checkbox"><i></i>Tornado</label>
									<label class="checkbox"><input name="checkbox" type="checkbox"><i></i>Kissan</label>
									<label class="checkbox"><input name="checkbox" type="checkbox"><i></i>Oakley</label>
									<label class="checkbox"><input name="checkbox" type="checkbox"><i></i>Manga</label>
									<label class="checkbox"><input name="checkbox" type="checkbox"><i></i>Wega</label>
									<label class="checkbox"><input name="checkbox" type="checkbox"><i></i>Kings</label>
									<label class="checkbox"><input name="checkbox" type="checkbox"><i></i>Zumba</label>
								</div>
							</div>
				   </section>			
			 </div>				 
	      </div>
		</div>

@endsection