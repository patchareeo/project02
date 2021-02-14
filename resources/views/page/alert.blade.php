@extends('templete.templete')

@section('title', 'Alert |Heawnea')

@section('content')



<div class="container">
	<div class="row">
	    <div class="col-lg-12">
			{{-- <h2>Alerts</h2> --}}
			<h2 class="title text-center">การแจ้งเตือน</h2>
			{{-- <div class="alert alert-danger" role="alert">
				A simple primary alert with <a href="#" class="alert-link">an example link</a>. Give it a click if you like.
			  </div> --}}
			
			  @foreach ($Alerts as $alert)
			  
                        <div class="col-md-4">
							<div class="product-image-wrapper">
								<div class="alert alert-warning">
										<div class=" text-center">
											<p>ผู้สั่งสินค้า : {{ $alert->user_name}}</p>
                                            <p>สินค้า : {{ $alert->product_name}} จำนวน : {{ $alert->amount}}</p>
                                            <p>รายละเอียด :{{ $alert->detail}}</p>
                                            <br>
                                            <button type="submit" class="btn btn-warning" onclick="return confirm('ต้องการรับฝากหิ้วสินค้าใช่หรือไม่ ?')">ยืนยันสั่งสินค้า</button>
										</div>
							
								</div>
							
							</div>
						</div> 
						
						

				@endforeach
				
				{{-- @if (Auth::user())
				@if (Auth::user()->user_name !== $alert->user_name)
				<div class="col-md-4">
					<div class="product-image-wrapper">
						<div class="alert alert-warning">
								<div class=" text-center">
									<p>ไม่มีการแจ้งเตือน</p>
									
								</div>
					
						</div>
					
					</div>
				</div>
				@endif 
				@endif  --}}

		
    	
		</div>
	</div>
	<br>
</div>

@endsection