@extends('templete.templete')

@section('title', 'Profile |Heawnea')

@section('content')

            <div class="container">    
                <div class="row">
					<form action="{{ route('page.profile', $profile->id )}}" method="GET">   
                      <div class="panel panel-default">
                      {{-- <div > <h2 class="title text-center">โปรไฟล์</h2></div> --}}
                       <div class="panel-body">
                      <div class="col-md-4 col-xs-12 col-sm-6 col-lg-4">
                       <img alt="User Pic" src="https://developers.google.com/web/images/contributors/no-photo.jpg" id="profile-image1" class="img-circle img-responsive"> 
                     
                 
                      </div>
                      <div class="col-md-8 col-xs-12 col-sm-6 col-lg-8" >
                          <div class="container" >
                            <h2 class="title center">โปรไฟล์ </h2>
							<br>
                            <span class="glyphicon glyphicon-user one" style="width:50px;"></span>{{$profile->profile_name}}</b></p> 
                          </div>
                           <hr>
                          <ul class="container details" >
                            <li><p><span class="glyphicon glyphicon-envelope one" style="width:50px;"></span>{{$profile->profile_email}}</p></li>
							<hr>
                            <li><p><span class="glyphicon glyphicon-phone one" style="width:50px;"></span>{{$profile->profile_phone}}</p></li>
                          </ul>
                          <hr>
                          {{-- <div class="col-sm-5 col-xs-6 tital " >รายละเอียดเพิ่มเติม</div> --}}
                      </div>
					</form>
                    {{-- <div class="col-xs-12 col-sm-12 col-md-4"> --}}
                        {{-- @if (Auth::user())
                            @if (Auth::user()->id === $profile->user_id) --}}
                        <form action="{{ route('404',$profile->id) }}" method="POST">
    
                            <a class="btn btn-warning" href="{{ route('404',$profile->id) }}">Edit</a>
           
                            @csrf
                            @method('DELETE')
              
                            <button type="submit" class="btn btn-danger" onclick="return confirm('ต้องการลบสินค้าใช่หรือไม่ ?')">Delete</button>
                        </form>
                        {{-- @endif
                        @endif --}}
                    {{-- </div> --}}
                </div>
            </div>
			@endsection