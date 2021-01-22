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
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                {{-- <strong>รูปภาพ:</strong> --}}
                                <img src="{{ Storage::url($details->image) }}" alt="" />
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>ชื่อสินค้า:</strong>
                                {{ $details->name }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>ราคา:</strong>
                                {{ $details->price}}
                            </div>
                        </div>
                       
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>จำนวนสินค้า:</strong>
                                {{ $details->amount}}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>รายละเอียดสินค้า:</strong>
                                {{ $details->detail }}
                            </div>
                        </div>
							</div>
							 
						</div>
					</div>
                </div>

                <div class="card-body">
                    <h5>Leave a comment</h5>
                    <form method="post" action="{{ route('404') }}">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="comment" class="form-control" />
                            {{-- <input type="hidden" name="post_id" value="{{ $post->id }}" /> --}}
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-sm btn-outline-danger py-0" style="font-size: 0.8em;" value="Add Comment" />
                        </div>
                    </form>
                   </div>

                {{-- <h4>Add comment</h4>
                    <form method="post" action="{{ route('404') }}">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="comment_body" class="form-control" />
                            
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-warning" value="Add Comment" />
                        </div>
                    </form> --}}
			</div>
		</div>
    </section>
    

@endsection
