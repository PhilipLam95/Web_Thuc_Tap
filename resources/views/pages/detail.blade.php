@extends('layouts.master')
@section('noidung')
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

<!--etalage-->

<script src="js/jquery.etalage.min.js"></script>
<script>
			jQuery(document).ready(function($){

				$('#etalage').etalage({
					thumb_image_width: 300,
					thumb_image_height: 400,
					source_image_width: 900,
					source_image_height: 1200,
					show_hint: true,
					click_callback: function(image_anchor, instance_id){
						alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
					}
				});

			});
</script>

<div class="single-sec">
	 <div class="container">
		 <ol class="breadcrumb">
			 <li><a href="{{route('index')}}">Home</a></li>
			 <li class="active">Products</li>
		 </ol>
		 <!-- start content -->	
			<div class="col-md-9 det">
				  <div class="single_left">
					 <div class="grid images_3_of_2">
						 <ul id="etalage">
							<li>
								<a href="optionallink.html">
									<img class="etalage_thumb_image" src="images/{{$products->image}}" class="img-responsive" />
									<img class="etalage_source_image" src="images/{{$products->image}}" class="img-responsive" title="" />
								</a>
							</li>
							<li>
								<img class="etalage_thumb_image" src="images/{{$products->image2}}" class="img-responsive" />
								<img class="etalage_source_image" src="images/{{$products->image2}}" class="img-responsive" title="" />
							</li>							
						    <li>
								<img class="etalage_thumb_image" src="images/{{$products->image3}}" class="img-responsive"  />
								<img class="etalage_source_image" src="images/{{$products->image3}}" class="img-responsive"  />
							</li>
						 </ul>
						 <div class="clearfix"></div>		
				      </div>
				  </div>
				  <div class="single-right">
					 <h3>{{ $products->name}}</h3>
					 <div class="id"><h4>ID: {{$products->id_product}}</h4></div>
					  <form action="" class="sky-form">
						     <fieldset>					
							   <section>
							     <div class="rating">
									<input type="radio" name="stars-rating" id="stars-rating-5">
									<label for="stars-rating-5"><i class="icon-star"></i></label>
									<input type="radio" name="stars-rating" id="stars-rating-4">
									<label for="stars-rating-4"><i class="icon-star"></i></label>
									<input type="radio" name="stars-rating" id="stars-rating-3">
									<label for="stars-rating-3"><i class="icon-star"></i></label>
									<input type="radio" name="stars-rating" id="stars-rating-2">
									<label for="stars-rating-2"><i class="icon-star"></i></label>
									<input type="radio" name="stars-rating" id="stars-rating-1">
									<label for="stars-rating-1"><i class="icon-star"></i></label>
									<div class="clearfix"></div>
								 </div>
							  </section>
						    </fieldset>
					  </form>
					  <div class="cost">
						 <div class="prdt-cost">
							 <ul>
								 <li>Chất liệu: <a1>{{$products->Materia}}</a1></li>								 
								 <li>Sellling Price:</li>
								 @if($products->unit_price !=0)
								 <li class="active">{{number_format($products->unit_price)}} VND</li>
								 @else 
								  <h3> 
								  	Gía liên hệ :<li class="active"><a1 style="color: red">0985668449</a1></li>
								  </h3>
								 @endif
								 <a id="muahang" class="add-to-cart" value ="{{ $products->id_product}}"  data="{{ $products->id_product}}" style="color:red">BUY NOW</a>
							 </ul>
						 </div>
						 <div class="check">
						 	@if($products->unit_price!=0)
							 <p>
							 	<span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
							 	<a id="soluong{{$products->id_product}}" value ="{{$products->redisual_quantity}}"> Số lượng còn: {{$products->import_quantity}} </a>
							 </p>
							@endif
							 
						 </div>
						 <div class="clearfix"></div>
					  </div>


					  <div class="item-list">
						 <ul>
							 <li>Material: Solid Wood</li>
							 <li>Color: Brown</li>
							 <li>Style: Solid Wood</li>
							 <li>Brand: Corelle</li>
							 <li><a href="#">Click here for more details</a></li>
						 </ul>
					  </div>
					  <div class="single-bottom1">
						<h6>Details</h6>
						<p class="prod-desc">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat.</p>
					 </div>					 
				  </div>
				  <div class="clearfix"></div>
				  <div class="sofaset-info">
						 <h4>Product Summary SPENCER 3+1+1 SOFA SET WITH 5 BIG CUSHIONS & WOODEN HANDLE</h4>
						 <ul>
							 <li>Dimensions: 3 Seater: Length 208 x Width 81 x Height 91.5 cm and 1 Seater: Length 99 x Width 81 x Height 91.5 cm</li>
							 <li>Assembly Type: Pre Assembled</li>
							 <li>Material: Wooden Structure, Chemical Treated And Seasoned Wood, 19 mm and 12 mm Commercial Ply and Mdf Used On Visible Parts</li>
							 <li>Looks amazing in a contemporary setting</li>
							 <li>Colour: Brown Jute, Sheron Brown</li>
							 <li>Type: Spencer 3 plus 1 plus 1 Sofa Set With 5 Big Cushions and 6 Small Cushions, Wooden Handle</li>
							 <li>Long lasting, durable and easy to use product</li>
							 <li>Contents: 3 Pc</li>
							 <li>Delivery Time: 7 to 10 days from the Day of Dispatch</li>
							 <li>Very classy and contemporary design</li>
							 <li>SUPC: SHG21458689652</li>
							 <li>Material: High Density Foam and Fabric</li>
						 </ul>
				  </div>				  					
		    </div>
			@include('pages.menuleft')     				
		     <div class="clearfix"></div>
	  </div>	 
</div>
<script type="text/javascript">
$("#muahang").hover(
    function () {
        $(this).removeClass("add-to-cart");
        $(this).css("cursor","pointer")
        
    }, 

    function () {
        $(this).find("span:last").remove();
    }
);

$("#muahang").mouseout(function(){
  $(this).addClass("add-to-cart");



});
//li with fade class
$("li.fade").hover(function(){$(this).fadeOut(100);$(this).fadeIn(500);});
</script>
@endsection
