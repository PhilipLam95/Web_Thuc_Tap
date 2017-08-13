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


<div id="compare" style="padding-bottom: 50px;display: none">
	<div class="button_ss" style="display: block">
                    <span class="inset-button--wrapper">
                              <a id="click_sosanh" class="inset-button">So sánh </a>
                    </span>
    </div>

    <div id="wr_show_so_sanh" style="display: none;">            
    		<div class="wr_sp_show_ss">
                <img src="http://quanglong.com.vn/public/upload/thumbs_resize/iphone-6s-16gb1796832.jpg">
                <div class="ten_ss"></div>
                <div class="gia_ss">Giá bán: <a style="color: red;"></a></div>
                <div class="gia_ss">Mô tả: <a style="color: red;"></a></div>
                                
            </div>
            
	</div>
   
</div>


	
	
	<div class="new">
		   <div class="container">
		     <h3 style="color:#4d1a00">CÁC SẢN PHẨM MỚI</h3>
		     <div class="new-products">
			@foreach ($products as $product)
			     <div class="new-items">
			    
						 <div class="item{{$product->id}}">
							 <a href="{{ url('/detail/'.$product->id) }}"><img src="images/{{$product->image}}" alt=""></a>
							 <div class="item-info">
								 <h4><a href="{{ url('/detail/'.$product->id) }}">{{$product->name}}</a></h4>
								 <span>ID: {{$product->id}}</span>
								 <a href="{{ url('/detail/'.$product->id) }}" style="background: url('background/color.jpg')">Chi tiết</a>
								 <a  class="sosanh" style="background: url('background/color.jpg')" value="{{$product->id}}" >So sánh</a>
							 </div>
						 </div>
				
				 </div>
				
				

			
			     
			@endforeach
			   
			        
			     
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
		           <a href="{{route('detail',$best_view->id_product)}}"><img src="images/{{$best_view->image}}" alt=""/></a> 
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
<

<script type="text/javascript">

$('#click_sosanh').click(function()
{
	
})

$('.sosanh').click(function()
{
	$('#compare').css('display','block');
	var id = $(this).attr('value');
	var route = "{{route('findPro','id_sp')}}";
	route = route.replace('id_sp',id);
	alert(route);
	  $.ajax({
             	url:route,
                type: "get",
				dataType:"json",
				data:{id,id},
				success:function(data)
				{
					
					document.cookie = data[0].id;
					$('#compare').append('<div class="wr_sp_ss" style="float: left"> <img src="images/'+data[0].image+'"  width="70" height= "70" ><a id= "'+data[0].id+'" class="del_sosanh">X</a></div>');
				
				}
             });
	
});




$(".add-to-cart").hover(
    function () {
        
         $(this).css("cursor","pointer")
        
    }, 
);

$(".sosanh").hover(
    function () {
        $(this).css("cursor","pointer")
        
    }, 

    function () {
        $(this).find("span:last").remove();
    }
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