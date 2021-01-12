@extends('templete.templete')

@section('title', 'Home |Heawnea')

@section('content')
	
     <section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					
				</div>
			</div>
		</div>
	</section><!--/slider-->
	
	<section>
		<div class="container">
			<div class="row">
				
				
				<div class="col-sm-12 padding-right">
					<div class="features_items">
						<!-- <h2 class="title text-center">Features Items</h2> -->
                        @foreach($posts as $post)
                        <div class="col-sm-3">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<img src="{{ Storage::url($post->image) }}" alt="" />
                                            <h2>{{$post->price}}</h2>
                                            <p>{{$post->name}}</p>
											<a href="{{ route('show',$post->id) }}" class="btn btn-default add-to-cart" ></i>ดูรายละเอียดสินค้า</a>
										</div>
							
								</div>
							
							</div>
						</div> 
						
						@endforeach
						
						
							</div>
							 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>			
						</div>
					</div><!--/recommended_items-->
					<ul class="pagination">
					<li class="active"><a href="">1</a></li>
					<li><a href="">2</a></li>
					<li><a href="">3</a></li>
					<li><a href="">&raquo;</a></li>
					</ul>
				</div>
			</div>
		</div>
	</section>
	

	

  
    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>

@endsection
