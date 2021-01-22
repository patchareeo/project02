<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>

    <link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{ asset('css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{ asset('css/price-range.css')}}" rel="stylesheet">
    <link href="{{ asset('css/animate.css')}}" rel="stylesheet">
	<link href="{{ asset('css/main.css')}}" rel="stylesheet">
	<link href="{{ asset('css/responsive.css')}}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="{{ asset('images/ico/favicon.ico')}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	<header id="header"><!--header-->		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-md-4 clearfix">
						<div class="logo pull-left">
						<!-- <a href="index.html"><img src="images/home/nea3.png" alt="" width="50" height="50"/></a> -->
						</div>
					</div>
					<div class="col-md-8 clearfix">
						<div class="shop-menu clearfix pull-right">
							<ul class="nav navbar-nav">
								<!-- <li><a href="{{route('checkout')}}"><i class="fa fa-shopping-cart"></i> Cart</a></li> -->
								<!-- <li><a href="{{route('profile')}}"><i class="fa fa-user"></i> Profile</a></li> -->
								<li><a href="{{route('login')}}"><i class="fa fa-lock"></i> Login</a></li>
								<li><a href="{{route('register')}}"><i class="fa fa-user"></i> Register</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
					
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="{{route('index')}}"><i class="fa fa-home" style="font-size:23px;"></i> Home</a></li>
								{{-- <li class="dropdown"><a href="{{route('chat')}}"><i class="fa fa-comments"style="font-size:25px;color:pink;" ></i> Chat</a></li>  --}}
								<li><a href="{{route('alert')}}"><i class="	fa fa-bell" style="font-size:22px;" ></i> Alert</a></li>
								<li><a href="{{route('posts.create')}}"><i class="fa fa-plus-circle" style="font-size:22px;" ></i> Post</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="search_box pull-right">
							<input type="text" placeholder="Search"/>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	
	<!-- <section id="slider">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					
				</div>
			</div>
		</div>
	</section> -->
	
	<section>
		<div class="container">
			<div class="row">
				
            @yield('content')
				<!--  -->
			</div>
		</div>
	</section>
	
	
	

  
    <script src="{{ asset('js/jquery.js')}}"></script>
	<script src="{{ asset('js/bootstrap.min.js')}}"></script>
	<script src="{{ asset('js/jquery.scrollUp.min.js')}}"></script>
	<script src="{{ asset('js/price-range.js')}}"></script>
    <script src="{{ asset('js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{ asset('js/main.js')}}"></script>
</body>
</html>