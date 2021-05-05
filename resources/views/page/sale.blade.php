@extends('templete.templete')

@section('title', 'Sale |Heawnea')

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
						<h2 class="title text-center">สินค้าที่ลงขาย</h2>
						@if($Sale ->isNotEmpty())
                        @foreach($Sale as $post)
                        <div class="col-sm-3">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<img src="{{ Storage::url($post->image) }}"alt="Girl in a jacket" width="150" height="250"/>
                                            <h2>{{$post->price}}</h2>
                                            <p>{{$post->name}}</p>
											<a href="{{ route('show',$post->id) }}" class="btn btn-default add-to-cart" ></i>ดูรายละเอียดสินค้า</a>
										</div>
								</div>
							</div>
						</div> 
						@endforeach
						@else 
                        <div class="title text-center">
                            <img src="{{ asset('images/home/11.png') }}" width="250"
                            height="250" />
                            <h1 style="color:rgba(110, 96, 81, 0.849);">ไม่พบรายการสินค้า</h1>
                        </div> 
                        

                        @endif
					
				</div>
			</div>
		</div>
	</section>

	
</body>
</html>
<ul class="pagination">
	<li class="active">{!! $Sale->links() !!}</li>
</ul>

@endsection
