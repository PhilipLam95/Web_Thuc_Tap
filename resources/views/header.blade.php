
<?php  
			function subMenu($data,$id)
			{
				echo "<ul>";
				foreach($data as $items)
				{
					if($items->parent_id == $id)
					{
					echo "<li  ><a style='color:#b33c00' href=''> ".$items->name." </a>";
					subMenu($data,$items->id);
					echo "</li>";
						
					}

				}

				echo "</ul>";

			}
?>
<div  >
  <div class="top_bg"  style=" background-image: url('background/color.jpg'); " >
    <div class="container">
      <div class="header_top-sec">
        <div class="top_right">
          <ul>
            <li><a href="#">help</a></li>|
            <li><a href="{{route('contact')}}">Contact</a></li>|
            <li><a href="login.html">Track Order</a></li>
          </ul>
        </div>
        <div class="top_left">
          <ul>
            <li class="top_link">Email:<a href="mailto@example.com">info(at)Mobilya.com</a></li>|
            <li class="top_link"><a href="login.html">My Account</a></li>|          
          </ul>
          <div class="social">
            <ul>
              <li><a href="#"><i class="facebook"></i></a></li>
              <li><a href="#"><i class="twitter"></i></a></li>
              <li><a href="#"><i class="dribble"></i></a></li>  
              <li><a href="#"><i class="google"></i></a></li>                   
            </ul>
          </div>
        </div>
          <div class="clearfix"> </div>
      </div>
    </div>
  </div>
  <div class="header_top">
     <div class="container">
       <div class="logo">
        <a href="index.html"><img src="images/logo.png" alt=""/></a>       
       </div>
       <div class="header_right"> 
         <div class="login">
           <a href="login.html">LOGIN</a>
         </div>
         <div class="cart box_1">
          <a href="cart.html">
            <h3> <span class="simpleCart_total">$0.00</span> (<span id="simpleCart_quantity" class="simpleCart_quantity">0</span> items)<img src="images/bag.png" alt=""></h3>
          </a>  
          <p><a href="javascript:;" class="simpleCart_empty">Empty cart</a></p>
          <div class="clearfix"> </div>
         </div>        
       </div>
        <div class="clearfix"></div>  
     </div>
  </div>
  <div class="mega_nav">
     <div class="container">
       <div class="menu_sec">
       <!-- start header menu -->
       <ul class="megamenu skyblue" >
         <li class="active grid"><a class="color1" href="{{route('index')}}">TRANG CHỦ</a></li>
         <li class="grid"><a class="color2" href="{{route('new_product')}}">TẤT CẢ SẢN PHẨM</a>
          </li>
        	<li><a class="color4" href="#">SẢN PHẪM GỖ PHÙ HỢP</a>
          <div class="megapanel">

            <div class="row" style="text-align: center">
          <?php $type= App\TypeProduct::getTypeProDuct()->get()->toArray(); ?>
          
          	@foreach($type as $items)
              <div class="col1">
                <div class="h_nav">
                 
  	             @if($items->parent_id == 1)
  	                <h4 href="{{route('index')}}" style="color:#993300"> {!! $items->name !!} 
  	                	<?php 
  	                	    subMenu($type,$items->id);
  	
  	                	 ?>
  	                </h4>
  	             @endif
  	     
  	               


  			             
                </div>              
              </div>
               @endforeach
         
            
              <!-- <div class="col1">
                <div class="h_nav">
                  <h4>Tables</h4>
                  <ul>
                    <li><a href="products.html">Coffee Tables</a></li>
                    <li><a href="products.html">Dinning Tables</a></li>
                    <li><a href="products.html">Study Tables</a></li>
                    <li><a href="products.html">Wooden Tables</a></li>
                    <li><a href="products.html">Study Tables</a></li>
                    <li><a href="products.html">Bar & Unit Stools</a></li>
                  </ul> 
                </div>              
              </div>-->
         
            </div>
            <div class="row">
              <div class="col2"></div>
              <div class="col1"></div>
              <div class="col1"></div>
              <div class="col1"></div>
              <div class="col1"></div>
            </div>
              </div>
          </li>       
          <li><a class="color5" href="#">TIN TỨC</a>
          </li>
          <li><a class="color6" href="{{route('introduce')}}">GIỚI THIỆU</a>
          </li>       
        
             
        
              
           </ul> 
           <div class="search" >
           <form>
            <input  type="text" value="" placeholder="Search...">
            <input type="submit" value="">
            </form>
         </div>
         <div class="clearfix"></div>
       </div>
      </div>
  </div>
</div>


<!---->


