@extends('layouts.master')
@section('noidung')

<div class="cart_main">
	 <div class="container">

		<ol class="breadcrumb">
		  <li><a href="{{route('index')}}">Home</a></li>
		  <li class="active">Cart</li>
		</ol>	
		<button title="Clear Cart" value="empty_cart" class="btn" name="update_cart_action" type="button" style="float: right;">
				<span>
					<span>Xóa giỏ hàng</span>
				</span>
		</button>		
		 <div class="cart-items">
		 @if(Session::has('cart'))
			 <h2>Your Cart ({{Session('cart')->totalQty}})</h2>
			
		@else
			 <h2>Không có sản phẩm nào trong giỏ hàng</h2>
		@endif

			
			 @foreach($product_cart as $cart)
			
			
			 <div class="cart-header2 product{{$cart['item']->id}}"  value="{{$cart['item']->id}}">
				 <div class="close2 product{{$cart['item']->id}}" value="{{$cart['item']->id}}" title="Xóa sản phẩm"> </div>
				  <div class="cart-sec">
						<div class="cart-item">
							 <img src="images/{{$cart['item']->image}}"/>
						</div>
					   <div class="cart-item-info">
							 <h3>{{$cart['item']->name}}<span>ID:{{$cart['item']->id}}</span></h3>
							 @if($cart['item']->unit_price !=0)
							 	<h4><span id="price" name="price"  value="{{$cart['item']->unit_price}}">Gía tiền : </span>{{ number_format($cart['item']->unit_price)}} VND</h4>
							 @else
							 	<h5><spa>Gía liên hệ:<a style="color:red">0985668449</a></span></h5>
							 	<h4 style="color:red"> Hàng đặt</h4>
							 @endif
							 
							 <p class="qty{{$cart['item']->id}}" id="qty" value="{{$cart['qty']}}"> Số lượng:	&nbsp {{$cart['qty']}}</p>

							 		<button id="left{{$cart['item']->id}}" value=""  class="reduced_pop items-count btn-minus" type="button" dataID="{{$cart['item']->id}}" ><i class="glyphicon glyphicon-minus" ></i>
									</button>
									

										<input type="text" min="1" maxlength="12"  id="quantity{{$cart['item']->id}}" class="form"  name="quantiy{{$cart['item']->id}}}" size="4" value="{{$cart['qty']}}" disabled="" >

									<button id="right{{$cart['item']->id}}"  class="increase_pop items-count btn-plus" type="button" dataID="{{$cart['item']->id}}" ><i class="glyphicon glyphicon-plus" ></i>
									</button>
           	 			</div>        
					   <div class="clearfix" value="{{$cart['item']->id}}"></div>
						<div class="delivery">
							 <p>Service Charges:: Rs.50.00</p>							
				        </div>						
				  </div>
			  </div>
			  @endforeach		
		 </div>
		 @if(Session::has('cart'))
		 	<div class="cart-total">
			 <a class="continue" href="{{route('new_product')}}">Tiếp tục mua hàng</a>
			 <div class="price-details">
				 <h3>Chi tiết hóa đơn</h3>
				 <span>Tổng tiền</span>
				 <span class="total">{{number_format(Session('cart')->totalPrice)}} &nbsp VND</span>
				 
				 
				 <div class="clearfix"></div>				 
			 </div>	
			 <h4 class="last-price">Tổng cộng</h4>
			 <span class="total final">
			 	@php
			 		$k= 500000;
			 	@endphp
			 	{{ number_format(Session('cart')->totalPrice) }}
			 </span>
			 <div class="clearfix"></div>
			 <a class="order" href="{{route('checkout')}}">Thanh toán</a>
			 <div class="total-item">
				 <h3>OPTIONS</h3>
				 <h4>COUPONS</h4>
				 <a class="cpns" href="#">Apply Coupons</a>
				 @if(Auth::check())
				 @else
				 <p><a href="#">Log In</a> to use accounts - linked coupons</p>
				 @endif
			 </div>
			</div>
		@else
			 <h2>Không có sản phẩm nào trong giỏ hàng</h2>
		@endif
	 </div>
</div>

 <script>
		 $(document).ready(function() 
		 {	
			 	var soluong= $('#qty').attr('value');
			 	if (soluong < 2)
			 	{
			 		$('.btn-minus').attr('disabled','disabled');
			 		 $('#qty').attr('value',1);
			 		 $('#qty').html("Số lượng :" + 1);

			 	}
			   
		 	
		 		$('.btn').click(function() // xóa giỏ hàng 
		 		{
				var route ="{{route('delete-all-cart')}}";
				 $.ajax({
				        url: route,
				        type:'get',
				        data: null,
				        success:function(){
				        	window.location.replace(route);

				        }
				    });
		 		})

		 		$


		 		$('.close2').on('click', function() // xóa mặt hàng 
		 		{
		 			var id = $(this).attr('value');
		 			var route="{{route('delete-item-cart','id_sp')}}";
     				route = route.replace('id_sp',id);

     				var route1 = "{{route('cart_detail')}}";
     				var totalQty = $('#simpleCart_quantity').attr('value');
     				var qty = $('.qty'+id).attr('value');
     				totalQty = parseInt(totalQty)-parseInt(qty);

     				$.ajax({
     					url:route,
				        type:'get',
				        dataType: "json",
				        data:{id,id},
				        success:function(data)
				        {
				          	
				          	if(totalQty<=0)
				          	{
				          		window.location.replace(route1);

				          	}
				          	$('.product'+id).fadeOut('slow', function()
							{
								$('.product'+id).remove();
							});
							$('#simpleCart_quantity').attr('value',totalQty);
							$('#simpleCart_quantity').html(totalQty);
							$('.cart-items h2').html('Your Cart(' + totalQty +')');
							$('.total').html(data.totalPrice.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")+ " VND")
				        },
				        error:function()
				        {
				        	alert('lỗi xóa sản phẩm');
				        }


     				});
				
				});
				$('.btn-minus').on('click',function(e) // giám 1 sản phẩm
				{
					e.preventDefault();
					var id = $(this).attr('dataID');

					 

					var quantity=$("#quantity"+id).val();
					if(quantity == 1)
					{
						$('#left'+id).attr('disabled','disabled');
					}
					quantity = parseInt(quantity) - parseInt(1);

					
					

					var route="{{route('delete-1-item','id_sp')}}";
     				route = route.replace('id_sp',id);
     				if(quantity>=1)
     					{
		     				$.ajax({
		     					url:route,
		     					type:'get',
		     					dataType:'json',
		     					data:{id,id},
		     					success:function(data)
		     					{
		     						console.log(data.items[id]['qty']);
		     						console.log(data.totalPrice);
		     						console.log(data.totalQty);
		     						$('.qty'+id).empty();
		     						$.each(data.items,function(key,value)
		     						{
		     							$('#quantity'+id).attr('value',data.items[id]['qty']);
		     							$('.qty'+id).attr('value',data.items[id]['qty']);
		     							$('.qty'+id).html('Số lượng:&nbsp' + data.items[id]['qty']);
		     							
		     						})
		     						
		     						$('#simpleCart_quantity').attr('value',data.totalQty);
									$('#simpleCart_quantity').html(data.totalQty);
									$('.cart-items h2').html('Your Cart(' + data.totalQty +')');
									$('.total').html(data.totalPrice.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")+ " VND")
									if(data.items[id]['qty']== 1)
									{

										$('#left'+id).attr('disabled','disabled');
						
									}
		     					},
		     					error:function()
		     					{
		     						alert("loi xoa 1 san pham");
		     					}
     						});
     					}

     					
				});

				$('.btn-plus').on('click',function(e) // tăng 1 sản phẩm
				{
					e.preventDefault();
					var id = $(this).attr('dataID');
					var quantity=$("input[name*=quantiy"+id+"]").val();
					quantity = parseInt(quantity) + parseInt(1);

					if(quantity >0)
					{
						$('#left'+id).removeAttr('disabled');
					}
					var route="{{route('rise-1-item','id_sp')}}";
     				route = route.replace('id_sp',id);
     				var url_load= "{{route('cart_detail')}}";

     				//var route1="{{route('redisual','id_sp')}}";
     				//route1 = route1.replace('id_sp',id);
     				//alert(route1);

	     				$.get('countRedisualQty/'+id,function(data)
	     				{
						        $.each(data,function(key,value)
						        {

						        	  var redisual = value.redisual_quantity;

						        		if(quantity > redisual)
						        		{
						        			alert("Số lượng hàng ban mua chúng tôi không cung câp được");
						        			$('#quantity'+id).attr('value',value.redisual_quantity);
						     				$('.qty'+id).attr('value',value.redisual_quantity);
						     				$('.qty'+id).html('Số lượng:&nbsp' + value.redisual_quantity);

						        		}
						        		else
						        		{
						     				$.ajax({
						     					url:route,
						     					type:'get',
						     					dataType:'json',
						     					data:{id,id,
						     						redisual:redisual,	},
						     					success:function(data)
						     					{
						     						
						     						
						     						$('.qty'+id).empty();
						     						$.each(data.items,function(key,value)
						     						{
						     							$('#quantity'+id).attr('value',data.items[id]['qty']);
						     							$('.qty'+id).attr('value',data.items[id]['qty']);
						     							$('.qty'+id).html('Số lượng:&nbsp' + data.items[id]['qty']);
						 	
						     						})
						     						$('#simpleCart_quantity').attr('value',data.totalQty);
													$('#simpleCart_quantity').html(data.totalQty);
													$('.cart-items h2').html('Your Cart(' + data.totalQty +')');
													$('.total').html(data.totalPrice.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")+ " VND");
													
													

						     					},
						     					error:function()
						     					{
						     						alert("lỗi thêm 1 sản phẩm");
						     					}

						     				});
						     			}
	     				   		});
						       
						});

				});

		});
</script>

@endsection