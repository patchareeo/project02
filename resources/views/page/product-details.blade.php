@extends('templete.templete')

@section('title', 'Post |Heawnea')

@section('content')
<body>

	
	<section>
		<div class="container">
			<div class="row">
				
				<div class="col-sm-9 padding-right">
				
					
					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#reviews" data-toggle="tab">โพสต์ขายสินค้า</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade active in" id="reviews" >
								<div class="col-sm-12">
									<ul>
										<li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
										<li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
										<li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
									</ul>
									<!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
									<p><b>Write Your Review</b></p> -->
									
									<form action="#">
										<span>
											<input type="text" placeholder="ชื่ออสินค้า"/>
											<input type="text" placeholder="ราคา"/>
											
										</span>
										<br>
										<input type="text" placeholder="เพิ่มรูปภาพ"/>
											<!-- <textarea name="" placeholder="เพิ่มรูปภาพ"></textarea> -->
										
										<textarea name="" placeholder="รายละเอียดเพิ่มเติม"></textarea>
										<!-- <b>Rating: </b> <img src="images/product-details/rating.png" alt="" /> -->
										<button type="button" class="btn btn-default pull-right">
											Post
										</button>
									</form>
								</div>
							</div>
							
						</div>
					</div><!--/category-tab-->
					
					
					
				</div>
			</div>
		</div>
	</section>

  
    <script src="js/jquery.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>

@endsection