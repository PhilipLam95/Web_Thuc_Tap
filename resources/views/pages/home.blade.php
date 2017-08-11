@extends('layouts.master')
@section('noidung')

	<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> -->
	@for($i=0;$i<count($slides);$i++)
		@if($i==0)
			<div class="content">
			   <div class="container">
			     <div class="slider">
			        <ul class="rslides" id="slider1">
				          <li><img src="images/{{$slides[$i]->hinh}}" alt=""></li> 
				          @php $i++ @endphp
				          <li><img src="images/{{$slides[$i]->hinh}}" alt=""></li>
				          @php $i++ @endphp
				          <li><img src="images/{{$slides[$i]->hinh}}" alt=""></li>
			        </ul>
			     </div>
			   </div>
			</div>
		@endif
		@if($i==3)
			<div class="bottom_content">
				 <div class="container">
					 <div class="sofas">

						 <div class="col-md-6 sofa-grid">
							 <img src="images/{{$slides[$i]->hinh}}" alt="">
							 <h3>CÁC MẪU SẢN PHẪM</h3>
							 <h4><a href="products.html">SPECIAL ACCENTS OFFER</a></h4>
						 </div>
						 @php $i++ @endphp
						 <div class="col-md-6 sofa-grid sofs">
							 <img src="images/{{$slides[$i]->hinh}}" alt="">
							 <h3>CÁC MẪU SẢN PHẪM</h3>
							 <h4><a href="products.html">FABFURNISHING MELA</a></h4>
						 </div>
						 <div class="clearfix"></div>
					 </div>
				 </div>
			</div>
		@endif
	
	@endfor
	<div class="new">
		   <div class="container">
		     <h3 style="color:#4d1a00">CÁC SẢN PHẨM MỚI</h3>
		     <div class="new-products">
			@for($j=0;$j<count($products);$j++)
				@if($j==0)
			     <div class="new-items">
			    
						 <div class="item{{$products[$j]->id}}">
							 <a href="{{ url('/detail/'.$products[$j]->id) }}"><img src="images/{{$products[$j]->image}}" alt=""></a>
							 <div class="item-info">
								 <h4><a href="{{ url('/detail/'.$products[$j]->id) }}">{{$products[$j]->name}}</a></h4>
								 <span>ID: {{$products[$j]->id}}</span>
								 <a href="{{ url('/detail/'.$products[$j]->id) }}" style="background: url('background/color.jpg')">Chi tiết</a>
							 </div>
						 </div>
					@php $j++ @endphp	
						 <div class="item{{$products[$j]->id}}">
							 <a href="{{ url('/detail/'.$products[$j]->id) }}"><img src="images/{{$products[$j]->image}}" alt=""></a>
							 <div class="item-info">
								 <h4><a href="{{ url('/detail/'.$products[$j]->id) }}">{{$products[$j]->name}}</a></h4>
								 <span>ID: {{$products[$j]->id}}</span>
								 <a  style="background: url('background/color.jpg')" href="{{ url('/detail/'.$products[$j]->id) }}">Chi tiết</a>
							 </div>
						 </div>					
				 </div>
				@endif
				@if($j==2)
				<div class="new-items new_middle">
					 <div class="item{{$products[$j]->id}}">			 
						 <div class="item-info2">
							 <h4><a href="{{ url('/detail/'.$products[$j]->id) }}">{{$products[$j]->name}}</a></h4>
							 <span>ID: {{$products[$j]->id}}</span>
							<a href="{{ url('/detail/'.$products[$j]->id) }}" style="background: url('background/color.jpg')">Chi tiết</a>
						 </div>
						 <a href="{{ url('/detail/'.$products[$j]->id) }}" ><img src="images/{{$products[$j]->image}}" alt=""></a>
					 </div>
					 @php $j++ @endphp
					 <div class="item{{$products[$j]->id}}">	
						 <a href="{{ url('/detail/'.$products[$j]->id) }}"><img src="images/{{$products[$j]->image}}" alt=""></a>
						 <div class="item-info5">
							 <h4><a href="{{ url('/detail/'.$products[$j]->id) }}">{{$products[$j]->name}}</a></h4>
							 <span>ID: {{$products[$j]->id}}</span>
							 <a href="{{ url('/detail/'.$products[$j]->id) }}" style="background: url('background/color.jpg')">Chi tiết</a>
						 </div>	
					 </div>
		 		</div>
		 		@endif
		 		@if($j==4)
		 		<div class="new-items new_last">
					 <div class="item{{$products[$j]->id}}">	
						 <a href="{{ url('/detail/'.$products[$j]->id) }}"><img src="images/{{$products[$j]->image}}" alt=""></a>
						 <div class="item-info3">
							 <h4><a href="{{ url('/detail/'.$products[$j]->id) }}">{{$products[$j]->name}}</a></h4>
							 <span>ID: {{$products[$j]->id}}</span>
							 <a href="{{ url('/detail/'.$products[$j]->id) }}" style="background: url('background/color.jpg')">Chi tiết</a>
						 </div>			 
					 </div>
					  @php $j++ @endphp
					 <div class="item{{$products[$j]->id}}">	
						 <a href="{{ url('/detail/'.$products[$j]->id) }}"><img src="images/{{$products[$j]->image}}" alt=""></a>
						 <div class="item-info6">
							 <h4><a href="{{ url('/detail/'.$products[$j]->id) }}">{{$products[$j]->name}}</a></h4>
							 <span>ID: {{$products[$j]->id}}</span>
							 <a href="{{ url('/detail/'.$products[$j]->id) }}" style="background: url('background/color.jpg')">Chi tiết</a>
						 </div>
						 				 
					 </div>
		 		</div>
				@endif

			
			     
			@endfor	
			   
			        
			     
		     <div class="clearfix"></div> 
		     </div>
		   </div>    
		</div>
		<style type="text/css">
		</style>
		<!---->
		<div class="top-sellers"> 
		   <div class="container">
		     <h3 style="color:#4d1a00">SẢN PHẨM BÁN NHIỀU NHẤT</h3>
		     <div class="seller-grids">
		     @foreach($best_pros as $best_pro)
		       <div class="col-md-3 seller-grid" style="padding-bottom: 30px">
		       	<div class="alert alert-success thanhcong{{$best_pro->id_product}}" style="display: none;"></div>
		       	<div class="alert alert-danger thatbai{{$best_pro->id_product}}" style="display: none;"></div>
		         <a href="{{route('detail',$best_pro->id_product)}}"><img  style="height:150px;width: 150px" src="images/{{$best_pro->image}}" alt=""/></a>
		         	<div style="color:#4d1a00;">
				         <h4><a   href="products.html">{{$best_pro->name}}</a></h4>
				         <span>ID: {{$best_pro->id_product}}</span>
				         @if($best_pro->unit_price == 0)
				         <p >GIá liên hệ:<a style="color:red"> 0985668449</a></p>
				         @else
				         <p name="unit_price">{{number_format($best_pro->unit_price)}} VND</p>
				         @endif
				         <a type="hidden" id="soluong{{$best_pro->id_product}}" value ="{{$best_pro->redisual_quantity}}"> </a>
				         <p id="muahang" class="add-to-cart"   value="{{ $best_pro->id_product}}" data="{{ $best_pro->id_product}}">Mua Ngay</>
				          
			        </div>
		       </div>
		     @endforeach
		       
		       <div class="clearfix"></div>
		     </div>
		   </div>
		</div>
		<!---->
		<div class="recommendation">
		   <div class="container">
		     <div class="recmnd-head">
		       <h3 style="color:#4d1a00" >SẢN PHẨM KHUYẾN NGHỊ CHO BẠN</h3>
		     </div>	
		     <div class="bikes-grids">       
		       <ul id="flexiselDemo1">
		       @foreach( $best_views as $best_view)
		         <li>
		           <a href="products.html"><img src="images/{{$best_view->image}}" alt=""/></a> 
		           <h4><a href="products.html">{{ $best_view->name}}</a></h4> 
		           <p>ID: {{$best_view->id_product}}</p>
		           	@if($best_view->unit_price != 0)
		           	
		           		<p>{{number_format($best_view->unit_price)}}VND</p>
		           	@else
		           		<p> GIá liên hệ:<a style="color: red">0985668449 </a></p>
		           	@endif
		           	<p id="muahang{{$best_view->id_product}}" class="add-to-cart" data="{{ $best_view->id_product}}" value ="{{ $best_view->id_product}}" style="color:red">Mua Ngay</p>
		           	<div class="alert alert-success thanhcong{{$best_view->id_product}}" style="display: none;"></div

		         </li>
		       @endforeach
		        </ul>
		     <script type="text/javascript" src="js/jquery.flexisel.js"></script>
		     <script type="text/javascript">
		       $(window).load(function() {      
		        $("#flexiselDemo1").flexisel({
		        visibleItems: 5,
		        animationSpeed: 1000,
		        autoPlay: true,
		        autoPlaySpeed: 3000,        
		        pauseOnHover:true,
		        enableResponsiveBreakpoints: true,
		        responsiveBreakpoints: { 
		          portrait: { 
		            changePoint:480,
		            visibleItems: 1
		          }, 
		          landscape: { 
		            changePoint:640,
		            visibleItems: 2
		          },
		          tablet: { 
		            changePoint:768,
		            visibleItems: 3
		          }
		        }
		      });
		      });
		      </script>
       
		   </div>
		   </div>
		</div>
<form></form>

<script type="text/javascript">
$(".add-to-cart").hover(
    function () {
        
         $(this).css("cursor","pointer")
        
    }, 
);



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
</script>
		
@endsection