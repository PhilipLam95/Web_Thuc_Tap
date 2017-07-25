@extends('layouts.master')
@section('noidung')

		


<div class="product-model">	 
	 <div class="container">
			<ol class="breadcrumb">
		  <li><a href="index.html">Home</a></li>
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
								<img src="images/{{ $product->image}}"  style="height:250px;width:200px" class="img-responsive" alt="">
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
								<h4 style="color: #802b00">{{ $product->name}}</h4>
								<p style="color: #802b00" >ID:{{ $product->id}} </p>
								@if($product->unit_price!=0)
								<span class="item_price" style="color: #802b00">{{number_format($product->unit_price)}}VND</span>
								@else
								<p >GIá liên hệ:<a style="color:red"> 0985668449</a></p>	
								@endif							
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
					
			<div  class="col-md-9 product-model-sec">{{$products->links() }} </div>	
		<?php  

								 	function subMen($data,$id)
									{
											echo "<div class='single-bottom' style='display: none;'";
											foreach($data as $items)
											{
												if($items->parent_id == $id)
												{
												echo '<a ><p style="left:0px;" href="aasdsadsa">'.$items->name_type.'</p>';
							         			subMen($data,$items->id);
							          			echo "</a>";
													
												}

											}

											echo "</div>";

									}

		?>	
		</div>
		
			<div class="rsidebar span_1_of_left">
				 <section class="sky-form">
					 <div class="product_right">
						 <h4 class="m_2"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span>DANH MỤC ĐỒ GỖ</h4>
						 <?php $type= App\TypeProduct::getTypeProDuct()->get()->toArray();?>
						 @foreach($type as $items)
						 @if($items->parent_id == 1)
						 <div class="tab{{$items->id}}">
							 <ul class="place">								
								 <li class="sort">{{ $items->name_type}}</li>
								 <li class="by"><img src="images/do.png" alt=""></li>
								 
									<div class="clearfix"> </div>
									<?php 
								 	 	subMen($type,$items->id);
									?>

							  </ul>
							  
							  
							 <!-- <div class="single-bottom" style="display: none;">						
									<a href="#"><p>Sofas</p></a>
									<a href="#"><p>Fabric Sofas</p></a>
									<a href="#"><p>Love Seats</p></a>
									<a href="#"><p>Dinning Sets</p></a>
						     </div> -->
					      </div>
					      @endif
					      @endforeach
					     				  
						 <!--  <div class="tab2">
							 <ul class="place">								
								 <li class="sort">Decor</li>
								 <li class="by"><img src="images/do.png" alt=""></li>
									<div class="clearfix"> </div>
							  </ul>
							 <div class="single-bottom" style="display: none;">						
									<a href="#"><p>Shelves</p></a>
									<a href="#"><p>Wall Racks</p></a>
									<a href="#"><p>Curios</p></a>
									<a href="#"><p>Ash Trays</p></a>
						     </div>
					      </div> -->
						<!--   <div class="tab3">
							 <ul class="place">								
								 <li class="sort">Lighting</li>
								 <li class="by"><img src="images/do.png" alt=""></li>
									<div class="clearfix"> </div>
							  </ul>
							 <div class="single-bottom" style="display: none;">						
									<a href="#"><p>Table Lamps</p></a>
									<a href="#"><p>Tube Lights</p></a>
									<a href="#"><p>Study Lamps</p></a>
									<a href="#"><p>Usb Lamps</p></a>
						     </div>
					      </div>
						  <div class="tab4">
							 <ul class="place">								
								 <li class="sort">Bed &amp; Bath</li>
								 <li class="by"><img src="images/do.png" alt=""></li>
									<div class="clearfix"> </div>
							  </ul>
							 <div class="single-bottom" style="display: none;">						
									<a href="#"><p>Towels</p></a>
									<a href="#"><p>Bath Roles</p></a>
									<a href="#"><p>Mirrors</p></a>
									<a href="#"><p>Soap Stands</p></a>
						     </div>
					      </div>
						  <div class="tab5">
							 <ul class="place">								
								 <li class="sort">Fabric</li>
								 <li class="by"><img src="images/do.png" alt=""></li>
									<div class="clearfix"> </div>
							  </ul>
							 <div class="single-bottom" style="display: none;">						
									<a href="#"><p>Sofas</p></a>
									<a href="#"><p>Fabric Sofas</p></a>
									<a href="#"><p>Beds</p></a>
									<a href="#"><p>Relax Chairs</p></a>
						     </div>
					      </div> -->
						  
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
