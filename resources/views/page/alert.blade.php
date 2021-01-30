@extends('templete.templete')

@section('title', 'Alert |Heawnea')

@section('content')



<div class="container">
	<div class="row">
	    <div class="col-lg-12">
        <h2>Alerts</h2>
        
        @foreach ($Alert as $alert)
                        <div class="col-md-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
                      <p>จำนวน :{{ $alert->amount}}</p>
                      <br>
                      <p>รายละเอียด :{{ $alert->detail}}</p>
                      <br>
                      <button type="submit" class="btn btn-warning" onclick="return confirm('ต้องการสั่งสินค้าใช่หรือไม่ ?')">ยืนยันสั่งสินค้า</button>
										</div>
							
								</div>
							
							</div>
                        </div> 

                        @endforeach
    	
		</div>
	</div>
	<br>
</div>

@endsection