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
                <div class="table-responsive cart_info">
                    <h2 class="title text-center">รายละเอียดสินค้า</h2>	

				<div class="col-sm-10 padding-right">
					<div class="features_items">
                        <div class="col-xs-12 col-sm-12 col-md-8">
                            <div class="form-group">
                                <div>ชื่อผู้โพสต์ : {{ $details->user_name }}</div>
                            </div>
                            <div class="form-group">
                                <img src="{{ Storage::url($details->image) }}" alt="Girl in a jacket" width="400" height="425" />
                            </div>
                        </div>
                        <br>
                        <br>
                        <br>
                        
                        <div class="col-xs-12 col-sm-12 col-md-4">
                            <div class="form-group">
                                <strong>ชื่อสินค้า :</strong>
                                {{ $details->name }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-4">
                            <div class="form-group">
                                <strong>ราคา:</strong>
                                {{ $details->price}}
                            </div>
                        </div>
                       
                        <div class="col-xs-12 col-sm-12 col-md-4">
                            <div class="form-group">
                                <strong>จำนวนสินค้า :</strong>
                                {{ $details->amount}}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-4">
                            <div class="form-group">
                                <strong>กำหนดวันในการสั่งซื้อ :</strong>
                                {{ $details->date}}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-4">
                            <div class="form-group">
                                <strong>กำหนดระยะเวลาในการสั่งซื้อ :</strong>
                                {{ $details->time}}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-4">
                            <div class="form-group">
                                <strong>รายละเอียดสินค้า :</strong>
                                {{ $details->detail }}
                            </div>
                        </div>

                    <div class="col-xs-12 col-sm-12 col-md-4">
                        @if (Auth::user())
                            @if (Auth::user()->id === $details->user_id)
                        <form action="{{ route('posts.destroy',$details->id) }}" method="POST">
    
                            <a class="btn btn-warning" href="{{ route('posts.edit',$details->id) }}">Edit</a>
           
                            @csrf
                            @method('DELETE')
              
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        @endif
                        @endif
                    </div>


                        {{-- popup --}}
                    <div class="col-xs-12 col-sm-12 col-md-4">
                        <form action="{{ route('page.showpost',$details->id) }}" method="POST">   
                         {{ csrf_field() }}
                         @if (Auth::user())
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" >สั่งสินค้า</button>
                        @endif
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">กรอกรายละเอียด</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">จำนวนสินค้า:</label>
                                    <input type="text" class="form-control" name="amount" id="recipient-name">
                                </div>
                                <div class="form-group">
                                    <label for="text" class="col-form-label">รายละเอียดเพิ่มเติม:</label>
                                    <textarea class="form-control" name="detail" id="text"></textarea>
                                </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light" data-dismiss="modal">ยกเลิก</button>
                                <button type="submit" class="btn btn-warning">สั่งสินค้า</button>
                            </div>
                            </div>
                        </div>
                        </div>
                        </form>
                    </div>
                        {{-- popup --}}

                        {{-- showordes --}}
                        
                        @foreach ($orders as $order)
                        
                        <div class="col-md-4">
                            <br>
							<div class="product-image-wrapper">
								<div class="single-products">         
										<div class="productinfo text-center">
                                            <p>จำนวน :{{ $order->amount}}</p>
                                            <br>
                                            <p>รายละเอียด :{{ $order->detail}}</p>
                                            <br>
                                            <button type="submit" class="btn btn-warning" onclick="return confirm('ยกเลิกการสั่งสินค้าใช่หรือไม่ ?')">ยกเลิกการสั่งสินค้า</button>
										</div>
							
								</div>
							
							</div>
                        </div> 

                        @endforeach
                        {{-- showordes --}}
                        <div class="card text-center">
                            <div class="card-header">
                                <ul class="nav nav-tabs card-header-tabs">
         
                                </ul>
                            </div>
                        </div>
                        {{--  --}}
                    
                      
            {{-- <div class="card border-success">
              <h5 class="card-header ">สินค้า</h5>
              <div class="card-body">
                <div class="row no-gutters">
                  <div class="col-md-4">
                    <img src="{{ Storage::url($details->image) }}" height="300" width="325">
                  </div>
                  <div class="col-md-6">
                    <div class="card-body">
                      <h5 class="card-title"><strong>ชื่อสินค้า :</strong> {{ $details->name }}</h5>
                      <h5 class="card-title"><strong>ราคา :</strong> {{ $details->price }}</h5>
                      <h5 class="card-title"><strong>จำนวนสินค้า :</strong> {{ $details->amount }}</h5>
                      <p class="card-text"><strong>รายละเอียดสินค้า :</strong> {{ $details->detail }}</p>
                      <p class="card-text"><small class="text-muted">{{ $details->date }} {{ $details->time}}</small></p>
                      <form action="{{ route('posts.destroy',$details->id) }}" method="POST">
                        <a class="btn btn-warning" href="{{ route('posts.edit',$details->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <br> --}}
            
            {{--  --}}

					</div>
							 
                </div>
                </div>
			</div>
         



                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                           <div class="card-body">
                            <h3>แสดงความคิดเห็น</h3> 
                        
                            @include('post.partials.replys', ['comments' => $details->comments, 'post_id' => $details->id])
            
                            
                        </div>
            
                        <div class="card-body">
                            {{-- <h5>Leave a comment</h5> --}}
                            <form method="post" action="{{ route('comment.add') }}">
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="comment" class="form-control" />
                                    <input type="hidden" name="post_id" value="{{ $details->id }}" />
                                    
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-warning"  value="Add Comment" />
                                </div>
                            </form>
                        </div>
            
                        </div>
                    </div>
                </div>

		</div>
    </section>
    
    
@endsection