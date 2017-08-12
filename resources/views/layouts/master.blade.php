<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Furnyish Store a Ecommerce Category Flat Bootstarp Responsive Website Template | Home :: w3layouts</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />

<base href="{{asset('http://localhost/Web_Thuc_Tap/public/') }}"/>


<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<!--//theme-style-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Furnyish Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href='http://fonts.googleapis.com/css?family=Montserrat|Raleway:400,200,300,500,600,700,800,900,100' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Playfair+Display:400,700,900' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Aladin' rel='stylesheet' type='text/css'>
<!-- start menu -->
<link href="css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/etalage.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/form.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/jquery-ui.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" type="text/css" href="css/mystyle.css">
<link rel="stylesheet" type="text/css" href="css/styleofme.scss">
<link rel="stylesheet" type="text/css" href="css/checkoutstyle.css" />






  
 

@include('script')


  
</head>
<body>
        
<!-- header -->
       
        @include('header')
        <!--cart-->
        @yield('noidung')
        <!--
        <!---->
        @include('footer')

        
<script type="text/javascript">
  
$('.add-to-cart').click(function()
  {
     var id = $(this).attr('data');
     var route = "{{route('buy','id_sp')}}"; 
     route = route.replace('id_sp',id);

     var route1="{{route('delete-1-item','id_sp')}}";
     route1 = route1.replace('id_sp',id);
     var qty = parseInt($('#soluong'+id).attr('value'));
     $.ajax({
      url:route,
            type: "GET",
            dataType:"json",
            data:{id,id},   
            success:function(data)
            { 
                    
                  
                    if(data.items[id]['qty']< qty)
                    {
                           
                          $('#simpleCart_quantity').html(data.totalQty);
                          $('#simpleCart_quantity').attr('value',data.totalQty);
                          $('#cart_update_info').empty();
            // /* append data/info to cart_update_info bar */
                        $("#cart_update_info").append("<div id='new_item_added'><i class='glyphicon glyphicon-ok' style='color:green;'></i> Đã thêm sản phẩm nào vào giỏ hàng</div>").fadeIn('fast').delay(1000).fadeOut('fast');
                             
                         /* If shopping cart is still open, items will appear on it at the same time of adding them */
                         
                          return;
                    }
                    
                    if(data.items[id]['qty']== qty || data.items[id]['qty']> qty)
                    {
                      alert("Mặt hàng này ban mua đã vượt quá số lượng trong kho");
                      $.ajax({
                          url:route1,
                          type: "GET",
                          dataType:"json",
                          data:{id,id},
                          success:function(data)
                          { 
                           
                            return;
                          }
                      });

                    }

                    
              
            },
            error:function()
            {
              alert("lỗi thêm sản phẩm");
            }   
     })
  });

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


<!---->
  
<!---->

<!---->
</body>
</html>
