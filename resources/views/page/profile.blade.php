@extends('templete.templete')

@section('title', 'Profile |Heawnea')

@section('content')

<section id="slider">
    <!--slider-->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">

            </div>
        </div>
    </div>
</section>
<!--/slider-->

<section>

    <div class="container">
        <div class="row">
            <form action="{{ route('page.profile', $profile->id) }}" method="GET">
                <div class="panel panel-default" style="color:rgba(110, 96, 81, 0.849);">
                    
                    <div class="panel-body" style="background-color:#fcecdd">
                        <div class="col-md-4 col-xs-12 col-sm-6 col-lg-4">
                            @if ($profile->image === null)
                                <img alt="User Pic" src="{{asset('images/home/user.jpg')}}"
                                    id="profile-image1" class="img-circle img-responsive" height="350" width="350" >
                            @else
                                <img src="{{ Storage::url($profile->image) }}" height="350" width="350" alt="" />
                            @endif
                        </div>

                        {{-- <a type="submit" class="pull-right" --}}
                            {{-- href="{{ route('page.edit-profile', Auth::user()->id) }}">Edit</a> --}}
                            <a  class="btn btn-sm btn-warning" href="{{ route('page.edit-profile', Auth::user()->id) }}" style="padding: 8px; float: right;  color: white;" > <span class="fa fa-edit"></span> Edit</a>
                        
                        <div class="col-md-8 col-xs-12 col-sm-6 col-lg-6">

                            <h2 class="title center">โปรไฟล์ของฉัน </h2>
                            <br>
                            <h4><span class="glyphicon glyphicon-user one"
                                    style="width:50px;"></span>{{ $profile->profile_name }}</b></h4>
                            <hr>
                            <br>

                            <h4><span class="glyphicon glyphicon-envelope one"
                                    style="width:50px;"></span>{{ $profile->profile_email }}</h4>
                            <hr>
                            <br>
                            <h4><span class="glyphicon glyphicon-phone one"
                                    style="width:50px;"></span>{{ $profile->profile_phone }}</h4>
                            <hr>
                            {{-- <div class="col-sm-5 col-xs-6 tital " >รายละเอียดเพิ่มเติม</div> --}}
                        </div>
            </form>

        </div>
    </div>
@endsection
