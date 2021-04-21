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
		<div class="header-middle" style="background-color:#FCCFC5"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-md-4 clearfix">
						<div class="logo pull-left">
						<a href="{{route('index')}}"><img src="{{asset('images/home/nealogo.png')}}" alt="" width="170" height="75"/></a> 
						 
						 
						</div>
					</div>
					<div class="col-md-8 clearfix" >
						<div class="shop-menu clearfix pull-right">
							<ul class="nav navbar-nav">
								<nav class="navbar navbar-light bg-light">
									<div class="container-fluid">
										<div class="collapse navbar-collapse" id="navbarSupportedContent">
											<ul>
												{{-- @if (Auth::user() == true)
												<li><div><a href="{{route('page.profile')}}"><div>{{ Auth::user()->name }}</a></div></li>
												<li>
													<form method="POST" action="{{ route('logout') }}">
														@csrf
														<x-jet-responsive-nav-link href="{{ route('logout') }}"
																		onclick="event.preventDefault();
																					this.closest('form').submit();">
															{{ __('Logout') }}
														</x-jet-responsive-nav-link>
													</form>
												</li>
													@else
														<li><a href="{{route('login')}}"><i class="fa fa-lock"></i> Login</a></li>
														<li><a href="{{route('register')}}"><i class="fa fa-user"></i> Register</a></li>
													@endif --}}

													{{-- test --}}
													@if (Route::has('login'))
													@auth
														@if (Auth::user()->role === 'admin')
														<li>
															<li class="menu-item menu-item-has-children parent">
															@if (Auth::user()->image === null)
																<img alt="" src="{{asset('images/home/user2.png')}}" height="30" width="30">
															@else
																<img src="{{ Storage::url(Auth::user()->image) }}" height="23" width="23" alt="" />
															@endif
																<a title="My Account" href="{{route('page.profile')}}" style="background-color:#FCCFC5">My Account: {{Auth::user()->name}}<i class="" aria-hidden="true"></i></a>
																{{-- {{-- <ul class="submenu curency"> --}}
																	<li class="menu-item"> 
																	<a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="background-color:#FCCFC5">Logout</a>
																	</li>
																	<form id="logout-form" method="POST" action="{{route('logout')}}">
																		@csrf
																	</form>
																</ul>
															</li>
														</li>
														@else 
														<li>
															<li class="menu-item menu-item-has-children parent" >
															@if (Auth::user()->image === null)
																<img alt="" src="{{asset('images/home/user2.png')}}" style="background-color:#FCCFC5" height="30" width="30" >
															@else
																<img src="{{ Storage::url(Auth::user()->image) }}" height="23" width="23" alt="" />
															@endif
																<a title="My Account" href="{{route('page.profile')}}" style="background-color:#FCCFC5"> {{Auth::user()->name}}<i class="" aria-hidden="true"></i></a>
																{{-- <ul class="submenu curency"> --}}
																	<li class="menu-item">
																	<a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="background-color:#FCCFC5">Logout</a>
																	</li>
																	<form id="logout-form" method="POST" action="{{route('logout')}}">
																		@csrf
																	</form>
																</ul>
															</li>
														</li>
														@endif  

													@else
													<li class="fa fa-lock"><a title="Register or Login" href="{{route('login')}}" style="background-color:#FCCFC5"> Login</a></li>
													<li class="fa fa-user"><a title="Register or Login" href="{{route('register')}}" style="background-color:#FCCFC5"> Register</a></li>
													@endif
											@endif 

									

													
											</ul>
											
										</div>
										
									
									</div>
								</nav>
								
								

								
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom" style="background-color:#FCCFC5"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="{{route('index')}}"><i class="fa fa-home" style="font-size:23px;color:rgba(78, 76, 76, 0.849);"></i> Home</a></li>
								{{-- <li class="dropdown"><a href="{{route('chat')}}"><i class="fa fa-comments"style="font-size:25px;color:pink;" ></i> Chat</a></li> {{$countAlert}} --}}  
							@if(Auth::user())	
								<li><a href="{{route('page.sale')}}"><i class="fa fa-usd" style="font-size:22px;color:rgba(78, 76, 76, 0.849);"></i> Sale</a></li>
								<li><a href="{{route('page.cart')}}"><i class="fa fa-shopping-cart" style="font-size:22px;color:rgba(78, 76, 76, 0.849);"></i> Cart</a></li>
								<li><a href="{{route('page.alert')}}"><i class="fa fa-bell" style="font-size:22px;color:rgba(78, 76, 76, 0.849);" ><span class="badge bg-primary" style="background-color:#fa5329">{{$countAlert}}</span></i> Alert</a></li>
								<li><a href="{{route('posts.create')}}"><i class="fa fa-plus-circle" style="font-size:23px;color:rgba(78, 76, 76, 0.849);" ></i> Post</a></li>
							
							{{-- @else
								<li><a href="{{route('page.sale')}}"><i class="fa fa-usd" style="font-size:22px;color:rgba(214, 127, 14, 0.849);"></i> Sale</a></li>
								<li><a href="{{route('page.cart')}}"><i class="fa fa-shopping-cart" style="font-size:22px;color:rgba(214, 127, 14, 0.849);"></i> Cart</a></li>
								<li><a href="{{route('page.alert')}}"><i class="fa fa-bell" style="font-size:22px;color:rgba(214, 127, 14, 0.849);" ><span class="badge bg-primary" style="color:rgba(201, 70, 9, 0.849);"></span></i> Alert</a></li>
								<li><a href="{{route('posts.create')}}"><i class="fa fa-plus-circle" style="font-size:23px;color:rgba(214, 127, 14, 0.849);" ></i> Post</a></li>
								 --}}
							@endif
							</ul>
						</div>
					</div>
					<form action="{{ route('search') }}" method="POST">
                        @csrf

                        <div class="col-sm-3">
                            <div class="search_box pull-right">
                                <input type="text" class="form-cootrol typeahead" name="search"
                                    placeholder="ค้นหาสินค้า..." />
                            </div>
                        </div>
                    </form>
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