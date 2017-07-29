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
     var id = $(this).attr('value');
     var route = "{{route('buy','id_sp')}}"; 
     route = route.replace('id_sp',id);

     $.ajax({
      url:route,
            type: "GET",
            dataType:"json",
            data:{id,id},   
            success:function(data)
            { 
              
              $('#simpleCart_quantity').html(data.totalQty);
              $('#simpleCart_quantity').attr('value',data.totalQty);
               /* If shopping cart is still open, items will appear on it at the same time of adding them */
                if($(".shopping_cart_holder").css("display") == "block"){ // Check if shopping cart is open 
                    $(".shopping_cart_info").trigger( "click" );  // update cart on event
                }
            }   
     })
  });
</script>
<!---->
  
<!---->

<!---->
</body>
</html>
