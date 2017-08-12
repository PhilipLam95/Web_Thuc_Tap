
<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/mystyle.css">
<link href="//bizweb.dktcdn.net/assets/themes_support/bootstrap.min.css?20160122" rel="stylesheet" type="text/css">
<link href="//bizweb.dktcdn.net/assets/themes_support/nprogress.css?4" rel="stylesheet" type="text/css">
<link href="//bizweb.dktcdn.net/assets/themes_support/font-awesome.min.css?19" rel="stylesheet" type="text/css">
<link href="//bizweb.dktcdn.net/assets/themes_support/checkout_new.css?33" rel="stylesheet" type="text/css">


			@if(Session::has('thanhcong'))
				<div class="alert alert-success">{{Session::get('thanhcong')}}</div>
			@endif 
<form method="post" action="{{route('checkout_post')}}" data-toggle="validator" class="content stateful-form formCheckout" novalidate="true" >
	<input type="hidden" name="_token" value="{{csrf_token()}}">

		<div class="main" role="main" style="margin-left: 30px">
				<div class="main_header">
					<div class="shop logo logo--left ">
						
						<h1 class="shop__name">
						<a href="/">
							Wood Store
						</a>
						</h1>
						
						<div class="main_content">
							<div class="row">
								<div class="col-md-6 col-lg-6">
									<div class="section" define="{billing_address: {}}">
										<div class="section__header">
											<div class="layout-flex layout-flex--wrap">
												<h2 class="section__title layout-flex__item layout-flex__item--stretch">
												<i class="fa fa-id-card-o fa-lg section__title--icon hidden-md hidden-lg" aria-hidden="true"></i>
												<label class="control-label">Thông tin mua hàng</label>
												</h2>
												@if(!Auth::check())
												<a class="layout-flex__item section__title--link" href="{{route('signin')}}">
													<i class="fa fa-user-circle-o fa-lg" aria-hidden="true"></i>
													Đăng nhập
												</a>
												@endif
												
											</div>
										</div>

										<div class="section__content">  thông tin khách hàng
										
												<div class="form-group" bind-class="{'has-error' : invalidEmail}">
													<div>
														<label class="field__input-wrapper" bind-class="{ 'js-is-filled': email }">
															
															<input name="email" bind-event-focus="handleFocus(this)" bind-event-blur=" placeholderhandleFieldBlur(this)" class="field__input form-control" id="_email" data-error="Vui lòng nhập email đúng định dạng" required="" value="{{ (Auth::check()) ? Auth::user()->email : '' }}" pattern="^([a-zA-Z0-9_\-\.\+]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$" bind="email" type="email" placeholder="Email" {!! (Auth::check()) ? "disabled" : '' !!}>
														</label>
													</div>
													<div class="help-block with-errors">
													</div>
												</div>
												
												<div class="billing">
													<div>
														<div class="form-group">
															<div class="field__input-wrapper" >
																
																<input name="full_name"  class="field__input form-control" id="_billing_address_last_name" data-error="Vui lòng nhập họ tên" required="" bind="billing_address.full_name" type="text" placeholder="Họ tên" value="{{ (Auth::check()) ? Auth::user()->full_name : '' }}" 
																{!! (Auth::check()) ? "disabled" : '' !!}  >
															</div>
															<div class="help-block with-errors"></div>
														</div>
														
														<div class="form-group">
															<div class="field__input-wrapper" bind-class="{ 'js-is-filled': billing_address.phone }">
																
																</span>
																<input name="phone"  class="field__input form-control" id="_billing_address_phone" bind="billing_address.phone" type="text" placeholder="Số điền thoại giao hàng"  value="{{ (Auth::check()) ? Auth::user()->phone : '' }}"  > 
															</div>
															<div class="help-block with-errors"></div>
														</div>

														<div class="form-group">
															<div class="field__input-wrapper" >
																
																<input name="address"  class="field__input form-control" id="_billing_address_last_name" data-error="Vui lòng nhập địa chỉ" required=""  type="text" placeholder="Địa chỉ giao hàng" value="{{ (Auth::check()) ? Auth::user()->address : '' }}">
															</div>
															<div class="help-block with-errors"></div>
														</div>
														
														
														
														
													</div>
												</div>
										</div>

									</div>
									<div class="section pt10" bind-show="otherAddress" style="display: none">
										<div class="section__header">
											<h2 class="section__title">
											<i class="fa fa-id-card-o fa-lg section__title--icon hidden-md hidden-lg" aria-hidden="true"></i>
											<label class="control-label">
												Thông tin nhận hàng
											</label>
											</h2>

										</div>
										
									</div>
									<div class="section pt10" bind-class="{ 'pt0': otherAddress, 'pt10': !otherAddress}">
										<div class="section__content">
											<div class="form-group m0">
												<textarea name="note" value="" class="field__input form-control m0" placeholder="Ghi chú"></textarea>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-6 col-lg-6">
									<div class="section shipping-method" bind-show="shippingMethods.length > 0">
										<div class="section__header">
											<h2 class="section__title">
											<i class="fa fa-truck fa-lg section__title--icon hidden-md hidden-lg" aria-hidden="false"></i>
											<label class="control-label">Vận chuyển</label>
											</h2>
										</div>
										<div class="section__content">
											<div class="content-box">
												<div class="content-box__row">
													<div class="radio-wrapper">
														<div class="radio__input">
															<input class="input-radio1" value="77611,0" name="ShippingMethod" id="shipping_method_77611" bind="shippingMethod" bind-event-change="changeShippingMethod()" fee="40000" type="radio" checked="true"> 
														</div>

														<label class="radio__label" for="shipping_method_77611"> 
															<span class="radio__label__primary">Giao hàng tận nơi</span>
															<span class="radio__label__accessory">
																<span class="content-box__emphasis">40.000₫</span>
															</span>
														</label> 

														
													</div> <!-- /radio-wrapper--> 
												</div>
											</div>
										</div>
									</div>
									<div class="section payment-methods" bind-class="{'p0--desktop': shippingMethods.length == 0}">
										<div class="section__header">
											<h2 class="section__title">
											<i class="fa fa-credit-card fa-lg section__title--icon hidden-md hidden-lg" aria-hidden="true"></i>
											<label class="control-label">Thanh toán</label>
											</h2>
										</div>

										<div class="section__content">
											<div class="content-box">
												
												<div class="content-box__row">
													<div class="radio-wrapper">
														<div class="radio__input">
															<input class="input-radio_cod"  name="PaymentMethodId" id="payment_method_71695" data-check-id="4" bind="payment_method_id" checked="" type="radio" value="cod">
														</div>
														<label class="radio__label" for="payment_method_71695">
															<span class="radio__label__primary">Thanh toán khi giao hàng (COD)</span>
															<span class="radio__label__accessory">
																<ul>
																	<li class="payment-icon-v2 payment-icon--4">
																		
																		<i class="fa fa-money payment-icon-fa" aria-hidden="true"></i>
																		
																	</li>
																</ul>
															</span>
														</label>

														<div class="radio__input">
																<input class="input-radio_bacs"  name="PaymentMethodId" id="payment_method_71695" data-check-id="4" checked="" type="radio" value="bacs"> 
															</div>
															<label class="radio__label2" for="payment_method_71695">
																<span class="radio__label__primary">Thanh toán Bằng thẻ (BACS)</span>
																<span class="radio__label__accessory">
																	<ul>
																		<li class="payment-icon-v2 payment-icon">
																			
																			<i class="fa fa-money payment-icon-fa-money" aria-hidden="true"></i>
																			
																		</li>
																	</ul>
																</span>
															</label>
														</div> <!-- /radio-wrapper-->
													</div>
												</div>
												
												
											</div>
											<div id ="check" style="display: none">
													<div class="row display-tr" >
													<h3 class="panel-title display-td" >Payment Details</h3>
													<div class="display-td" >                            
													<img class="img-responsive pull-right" src="http://i76.imgup.net/accepted_c22e0.png">
													</div>
											</div>
													
										</div>
									</div>
										

									</div>
								</div>
							</div>
							
							
						</div>
						
					</div>
					
				</div>
			</div>	
		<div class="wrap" context="checkout" >
			<div class="sidebar ">
				<div class="sidebar_header">
					<h2>
					<label class="control-label">Đơn hàng</label>
					<label class="control-label">(@if(Session::has('cart')) {{Session('cart')->totalQty}}  @endif sản phẩm)</label>
					</h2>
					<hr class="full_width">
				</div>

				<div class="sidebar__content">
					<div class="order-summary order-summary--product-list order-summary--is-collapsed">
						<div class="summary-body summary-section summary-product">
							<div class="summary-product-list">
								<table class="product-table">
									<tbody>
										@if(Session::has('cart'))
										@foreach($product_cart as $cart)
										<tr class="product product-has-image clearfix">
											<td>
												<div class="product-thumbnail">
													<div class="product-thumbnail__wrapper">
														
														<img src="images/{{$cart['item']->image}}" alt="" class="product-thumbnail__image">
														
													</div>
													<span class="product-thumbnail__quantity" aria-hidden="true">{{$cart['qty']}}</span>
												</div>
											</td>
											<td class="product-info">
												<span class="product-info-name">
													
														{{$cart['item']->name}}
												</span>
											</td>
											<td class="product-price text-right">
	                                                  {{ number_format($cart['item']->unit_price)}} VND
	                                         </td>
											
										</tr>
										@endforeach
										@endif
										
									</tbody>
								</table>
							</div>
						</div>
						<hr class="m0">
					</div>
				
					@if(Session::has('cart'))
					<div class="order-summary order-summary--total-lines">
						<div class="summary-section border-top-none--mobile">
							<div class="total-line total-line-subtotal clearfix">
								<span class="total-line-name pull-left">
									Tạm tính
								</span>
								<span bind="money(totalOrderItemPrice - discount,'₫')" class="total-line-subprice pull-right">{{number_format(Session('cart')->totalPrice)}}₫</span>
							</div>
							<div class="total-line total-line-shipping clearfix" bind-show="requiresShipping">
								<span class="total-line-name pull-left">
									Phí vận chuyển
								</span>



								<span bind="shippingFee >  0 ? : ((requiresShipping &amp;&amp; shippingMethods.length == 0) ? 'Khu vực này không hỗ trợ vận chuyển': 'Miễn phí')" class="total-line-shipping pull-right" bind-show="ShippingProvinceId || BillingProvinceId &amp;&amp; !otherAddress || (requiresShipping &amp;&amp; shippingMethods.length > 0)">40.000₫</span>
							</div>
							<div class="total-line total-line-total clearfix">
								<span class="total-line-name pull-left">
									Tổng cộng

								</span>
								<span bind="money(totalOrderItemPrice + (isNaN(shippingFee) ? 0 : shippingFee) - discount,'₫')" class="total-line-price pull-right">{{  number_format((Session('cart')->totalPrice) + 40000)   }}₫</span>
							</div>
						</div>
					</div>

					@endif
					<div class="form-group clearfix hidden-sm hidden-xs">
						<div class="field__input-btn-wrapper mt10">
							<a class="previous-link" href="{{route('cart_detail')}}">
								<i class="fa fa-angle-left fa-lg" aria-hidden="true"></i>
								<span>Quay về giỏ hàng</span>
							</a>
							@if(Session::has('cart'))
							<input class="btn btn-primary btn-checkout"  value="ĐẶT HÀNG" type="submit">
							@endif
						</div>
					</div>
					<div class="form-group has-error">
						<div class="help-block ">
							<ul class="list-unstyled">
								
							</ul>
						</div>
					</div>
				</div>
			</div>
			
		</div>
</form>
<script type="text/javascript">
	$('.input-radio_bacs').click(function()
	{
		
		$('#check').fadeIn();
		 $('.#check').fadeOut(1000);
	});

	$('.input-radio_cod').click(function()
	{
		
		$('#check').css('display','none');
	})

	
</script>
