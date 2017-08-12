
<?php  
      function subMenu($data,$id)
      {
        echo "<ul>";
        foreach($data as $items)
        {
          if($items->parent_id == $id)
          {
          echo '<li  ><a style="color:#b33c00" href="/../../Web_Thuc_Tap/public/type/'.$items->id.'"> '.$items->name_type.' </a>';
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
          @if(Auth::check())
            @if(Auth::user()->group == 0)
            <li class="top_link">Thông Tin :<a href="mailto@example.com">{{Auth::user()->full_name}}</a></li>| 
            <li class="top_link"><a href="login.html">Chào bạn: {{Auth::user()->full_name}}</a></li>|
            <li class="top_link"><a href="{{route('logout')}}">Đăng xuất</a></li>
            @else 
            <li class="top_link"><a href="{{route('register')}}">Sign Up</a></li> 
            @endif
         
              
          @endif      
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
         @if(Auth::check())
         
           <a href="{{ route('logout')}}" >LOGOUT</a>
        @else
           <a href="{{route('signin')}}" >LOGIN</a>
          
        @endif 
         </div>
         <div class="cart box_1">
            
          <div class="dropdown">
              <a href="{{route('cart_detail')}}">
              @if(Session::has('cart'))
                <h3> <span class="cart" style="padding-left: 20px"></span> (<span id="simpleCart_quantity" value="{{Session('cart')->totalQty}}" >{{Session('cart')->totalQty}}</span> sản phẩm)<img src="images/bag.png" alt=""></h3>
              @else
                 <h3> <span class="cart" style="padding-left: 20px"></span> (<span id="simpleCart_quantity" >0</span> sản phẩm)<img src="images/bag.png" alt=""></h3>
                
              @endif
              </a> 
              <div class="dropdown-content">
                <p >This is cart of you. Click to view detail cart</p>
              </div>
          </div>
                 <!-- p><a href="javascript:;" class="simpleCart_empty">Empty cart</a></p> -->
    
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
         <li class="grid" style="display: inline;" "><a class="color1" href="{{route('index')}}">TRANG CHỦ</a></li>
         <li class="grid">
            <a class="color2" href="{{route('new_product')}}">TẤT CẢ SẢN PHẨM</a> 
          </li>
          <li ><a class="color4" >SẢN PHẪM GỖ PHÙ HỢP</a>
            <div class="megapanel">

              <div class="row"  >
                  <?php 
                      $type= App\TypeProduct::where('parent_id',1)->get();
                      $type_childs = App\TypeProduct::where('parent_id','>',1)->get();
                    ?>
                @foreach($type as $items)
                  <div class="col1" >
                    <div class="h_nav"  >

                         <h4 ><a  href="{!! url('type_par/'.$items->id)!!}" style="color:#802b00;font-weight: bolder;overflow: auto;">{!! $items->name_type !!} </a>
                          @foreach($type_childs as $type_child) 
                              @if($type_child->parent_id == $items->id)
                              <ul>
                                  <li>
                                      <a style="color:#b33c00" href="{!! url('type/'.$type_child->id)!!}""> {{ $type_child->name_type }} </a>
                                  </li>
                              </ul>
                              @endif
                          @endforeach

                         </h4>
                    </div>              
                  </div>
                @endforeach
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
          <li class="grid4"><a class="color5" href="#">TIN TỨCccccccs</a>
          </li>
          <li class="grid5"><a class="color6" href="{{route('introduce')}}">GIỚI THIỆU</a>
          </li>       
        
             
        
              
           </ul> 
           <div class="search" >
           <form action="{{route('search')}}" method="post">
            {!! csrf_field() !!}
            <input  type="text" value="" name="keyword" placeholder="Search...">
            <input type="submit" value="">
            </form>
         </div>
         <div class="clearfix"></div>
       </div>
      </div>
  </div>
</div>
<div id='cart_update_info'>

</div>
<style type="text/css">
  
  #cart_update_info { 
    position:fixed;    
    top: 50%;
    left: 50%;    
    z-index:1000000;
    margin-left: -8em;
    width:12em;
    height:auto;
    background-color: rgb(128, 225, 189);
    opacity: 0.9;
   border-radius: 5px;
}
.new_item_added
{
   position:fixed;
    margin:0 auto;
    padding:2px;
    max-width: 250px;
    height: auto;
    border: 1px solid #ccc;
    border-radius: 8px;
    background-color: #f3f3f3;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.32);
    color: #009900;
    text-align:center;
    text-decoration: none;
/*    font-family: Arial;*/
    font-size: 20px;
}


</style>

<script type="text/javascript">
 $(document).ready(function () {
    $('.grid1').click(function() {
       $(window).load(function() 
      {
        $('.grid2').removeClass('active');
        $('.grid3').removeClass('active');
        $('.grid4').removeClass('active');
        $('.grid5').removeClass('active');

        var $this = $(this);
        if (!$this.hasClass('active')) {
            $this.addClass('active');
        }
      });
        //e.preventDefault();
    });

    $('.grid2').click(function() {
      $(window).load(function() 
      {
        var $this = $(this);
        if (!$this.hasClass('active')) 
        {
          $this.addClass('active');
        }
        $('.grid1').removeClass('active');
        $('.grid3').removeClass('active');
        $('.grid4').removeClass('active');
        $('.grid5').removeClass('active');


      });
       
    });

    $('.grid3').click(function() {
      $(window).load(function() 
      {
        $('.grid1').removeClass('active');
        $('.grid2').removeClass('active');
        $('.grid4').removeClass('active');
        $('.grid5').removeClass('active');

        var $this = $(this);
        if (!$this.hasClass('active')) {
            $this.addClass('active');
        }
      });
        //e.preventDefault();
    });

    $('.grid4').click(function() {
      $(window).load(function() 
      {
        $('.grid1').removeClass('active');
        $('.grid2').removeClass('active');
        $('.grid3').removeClass('active');
        $('.grid5').removeClass('active');

        var $this = $(this);
        if (!$this.hasClass('active')) {
            $this.addClass('active');
        }
      });
        //e.preventDefault();
    });

    $('.grid5').click(function() {
      $(window).load(function() 
      {
        $('.grid1').removeClass('active');
        $('.grid2').removeClass('active');
        $('.grid3').removeClass('active');
        $('.grid4').removeClass('active');

        var $this = $(this);
        if (!$this.hasClass('active')) {
            $this.addClass('active');
        }
      });
        //e.preventDefault();
    });
});
</script>
<!---->


