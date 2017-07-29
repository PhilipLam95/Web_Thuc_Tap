<script type="text/javascript" src="js/jquery.easydropdown.js"></script>
<script type="text/javascript" src="js/jquery.etalage.min.js"></script>
<script type="text/javascript" src="js/jquery.flexisel.js"></script>
<script type="text/javascript" src="js/jquery.jscrollpane.min.js"></script>
<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="js/megamenu.js"></script>
<script type="text/javascript" src="js/menu_jquery.js"></script>
<script type="text/javascript" src="js/responsiveslides.min.js"></script>
<script type="text/javascript" src="js/simpleCart.min.js"></script>
<script type="text/javascript" src="js/jquery.flexisel.js"></script> 
<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
<script type="text/javascript"> // liet ke san pham
  $(document).ready(function(e)
  {
    $('.tab1').click(function(e)
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
            $('.single-bottom').css('display','none');
            $('#single-bottom'+id).css("display",'block');
            $('#single-bottom'+id).append('<a href="'+route1+'" value="'+value.id+'"><p>'+value.name_type+'</p></a> ');
            
            
          });
        }
      });


    });

  });
</script>
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


