@extends('layouts.master')
@section('noidung')

<link rel="stylesheet" type="text/css" href="css/style_inform_customer.css">


<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="css/bootstrap-3.0.0.min.css">

<!-- Optional theme -->
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap-theme.min.css"> -->

<!-- Latest compiled and minified JavaScript -->
<script src="js/bootstrap-3.3.0.min.js"></script>

<style type="text/css">
	
		body { padding-top: 50px; }

		#myCarousel .carousel-caption {
		    left:0;
			right:0;
			bottom:0;
			text-align:left;
			padding:10px;
			background:rgba(0,0,0,0.6);
			text-shadow:none;
		}

		#myCarousel .list-group {
			position:absolute;
			top:0;
			right:0;
		}
		#myCarousel .list-group-item {
			border-radius:0px;
			cursor:pointer;
		}
		#myCarousel .list-group .active {
			background-color:#eee;	
		}

		@media (min-width: 992px) { 
			#myCarousel {padding-right:33.3333%;}
			#myCarousel .carousel-controls {display:none;} 	
		}
		@media (max-width: 991px) { 
			.carousel-caption p,
			#myCarousel .list-group {display:none;} 
		}
</style>

<script type="text/javascript">
  $(document).ready(function(){
      
  	var clickEvent = false;
  	$('#myCarousel').carousel({
  		interval:   4000	
  	}).on('click', '.list-group li', function() {
  			clickEvent = true;
  			$('.list-group li').removeClass('active');
  			$(this).addClass('active');		
  	}).on('slid.bs.carousel', function(e) {
  		if(!clickEvent) {
  			var count = $('.list-group').children().length -1;
  			var current = $('.list-group li.active');
  			current.removeClass('active').next().addClass('active');
  			var id = parseInt(current.data('slide-to'));
  			if(count == id) {
  				$('.list-group li').first().addClass('active');	
  			}
  		}
  		clickEvent = false;
  	});
  })

    $(window).load(function() 
    {
        var boxheight = $('#myCarousel .carousel-inner').innerHeight();
        var itemlength = $('#myCarousel .item').length;
        var triggerheight = Math.round(boxheight/itemlength+1);
    	$('#myCarousel .list-group-item').outerHeight(triggerheight);
    });
</script>

<div class="container" style="padding-bottom: 100px">

   
    <ol class="breadcrumb">
      <li><a href="{{route('index')}}">Trang chủ</a></li>
      <li class="active">Tin tức trang Web</li>
    </ol>
                @if(Session::has('thanhcong'))
                  <div class="alert alert-success" id="alert">{{Session::get('thanhcong')}}</div>
                @endif
                @if(Session::has('thatbai'))
                  <div class="alert alert-danger" id="alert">{{Session::get('thatbai')}}</div>
                @endif
                @include('pages.changePassword')
      <div id="myCarousel" class="carousel slide" data-ride="carousel">
      
        <!-- Wrapper for slides -->
        <div class="carousel-inner">
         @for($i=0;$i< count($news);$i++)
           @if($i==0)
            <div class="item active">
              <img src="images/{{ $news[$i]->image}}" height="400" width="750">
               <div class="carousel-caption">
                <h4><a href="#">{{ $news[$i]->title}}</a></h4>
                <p>{{ $news[$i]->description}}<a class="label label-primary" href="http://sevenx.de/demo/bootstrap-carousel/" target="_blank">Free Bootstrap Carousel Collection</a></p>
              </div>
            </div><!-- End Item -->
         
            @else
                 <div class="item">
                  <img src="images/{{ $news[$i]->image}}" height="400" width="750"  >
                   <div class="carousel-caption">
                    <h4><a href="#">{{ $news[$i]->title}}</a></h4>
                    <p>{{ $news[$i]->description}}<a class="label label-primary" href="http://sevenx.de/demo/bootstrap-carousel/" target="_blank">Free Bootstrap Carousel Collection</a></p>
                  </div>
                </div><!-- End Item -->
            @endif
          @endfor
          
         
        </div><!-- End Carousel Inner -->


      <ul class="list-group col-sm-4">
      @for($i=0;$i< count($news);$i++)
           @if($i==0)
        <li data-target="#myCarousel" data-slide-to="0" class="list-group-item active"><h4>{{ $news[$i]->title}}</h4></li>
           
     
          @else
        <li data-target="#myCarousel" data-slide-to="{{$i}}" class="list-group-item"><h4>{{ $news[$i]->title}}</h4></li>
         @endif
        @endfor
       
      </ul>

        <!-- Controls -->
        <div class="carousel-controls">
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left"></span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right"></span>
            </a>
        </div>

      </div><!-- End Carousel -->
</div>
@endsection