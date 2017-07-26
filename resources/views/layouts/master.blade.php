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


@include('script')

<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
<script type="text/javascript"> // liet ke san pham
$(document).ready(function(e)
{
  $('.clearfix').click(function(e)
  {
    var id = $(this).attr('value');
    var route="{{route('select_typechild','id_sp')}}";
    route = route.replace('id_sp',id);
    $.ajax({
      url:route,
      type:'get',
      dataType: "json",
      data:{id,id},
      success:function(data)
      {
        $('.single-bottom').empty();
        $.each(data,function(key,value)
        {
          var route1 = "{{route('type','id_type')}}";
          route1 = route1.replace('id_type',value.id);
          $('.single-bottom').append('<a href="'+route1+'" value="'+value.id+'"><p>'+value.name_type+'</p></a> ')
        });
      }
    });


  });

});
</script>
<script src="js/menu_jquery.js"></script>
<script src="js/simpleCart.min.js"> </script>
<script src="js/responsiveslides.min.js"></script>
<script>
    // You can also use "$(window).load(function() {"
    $(function () {
      // Slideshow 1
      $("#slider1").responsiveSlides({
         auto: true,
     nav: true,
     speed: 500,
     namespace: "callbacks",
      });
    });
  </script>
  
</head>
<body>
        
<!-- header -->
       
        @include('header')
        <!--cart-->
        @yield('noidung')
        <!--
        <!---->
        @include('footer')
<!---->
  
<!---->

<!---->
</body>
</html>
