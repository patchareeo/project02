@extends('templete.templete')

@section('title', 'contact |Heawnea')

@section('content')

            <div class="container">    
                <div class="row">
                      <div class="panel panel-default">
                       <div class="panel-body">
                      <div class="col-md-4 col-xs-12 col-sm-6 col-lg-4">
                       <img alt="User Pic" src="https://developers.google.com/web/images/contributors/no-photo.jpg" id="contact-image1" class="img-circle img-responsive"> 
                     </div>
    

                      <div class="col-md-8 col-xs-12 col-sm-6 col-lg-8" >
                          <div class="container" >
                            <h2 class="title center">โปรไฟล์ </h2>
							<br>
                            <span class="glyphicon glyphicon-user one" style="width:50px;"></span>{{$contact->name}}</b></p> 
                          </div>
                           <hr>
                          <ul class="container details" >
                            <li><p><span class="glyphicon glyphicon-envelope one" style="width:50px;"></span>{{$contact->email}}</p></li>
							<hr>
                            <li><p><span class="glyphicon glyphicon-phone one" style="width:50px;"></span>{{$contact->phone}}</p></li>
                          </ul>
                          <hr>
                          <div class="col-sm-5 col-xs-6 tital " >รายละเอียดเพิ่มเติม</div>
                      </div>
                </div>
            </div>
			@endsection