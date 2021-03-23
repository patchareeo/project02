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
                                        <p>ผู้สั่งสินค้า : {{ $alert->user_name }}</p>
                                        <p>สินค้า : {{ $alert->product_name }} จำนวน : {{ $alert->amount }}</p>
                                        <p>รายละเอียด :{{ $alert->detail }}</p>
                                        <br>

                                        <form action="{{ route('page.alert') }}" method="get">
                                        
                                            <button type="submit" class="btn btn-warning"
                                                onclick="return confirm('ต้องการรับฝากหิ้วสินค้าใช่หรือไม่ ?')">ยืนยัน</button>
    
                                                <button type="submit" class="btn btn-warning"
                                                onclick="return confirm('ต้องการยกเลิกสินค้าใช่หรือไม่ ?')">ยกเลิก</button>
                                            </form>

                                            
										{{-- <form action="{{ route('page.alert') }}" method="get">
                                            
                                        <button type="submit" class="btn btn-warning"
										    onclick="return confirm('ต้องการรับฝากหิ้วสินค้าใช่หรือไม่ ?')">ยืนยัน</button>

                                            <button type="submit" class="btn btn-warning"
                                            onclick="return confirm('ต้องการยกเลิกสินค้าใช่หรือไม่ ?')">ยกเลิก</button>
									    </form> --}}


                                        {{-- <br> --}}
                                        {{-- <form action="{{ route('page.alert') }}" method="get">
                                        <button type="submit" class="btn btn-warning"
                                            onclick="return confirm('ต้องการยกเลิกสินค้าใช่หรือไม่ ?')">ยกเลิก</button>
                                        </form> --}}
                                       
                                    </div>

                                </div>

                            </div>
                        </div>




                @endforeach

                {{-- HTML
                --------
                <button type='submit'>
                <img src="path\to\loading\gif"  id='shown' style="display:none"/ >
                <span id='hidden'>submit</span>
                <span id='shown'>loading!</span>
                </button>
                
                within the button
                
                JQuery
                -----------
                <script>
                $(document).ready(function(){
                $('#hidden').show();
                $('#shown').hide();
                $('button').click(function(){
                
                $('#hidden').hide();
                $('#shown').show();
                });});
                </script> --}}
            

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
				@endif --}}



            </div>
        </div>
        <br>
    </div>

@endsection
