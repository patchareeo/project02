@extends('templete.templete')

@section('title', 'contact |Heawnea')

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
            <div class="panel panel-default" style="color:rgba(110, 96, 81, 0.849);" >
                <div class="panel-body" style="background-color:#fcecdd" >
                    <div class="col-md-4 col-xs-12 col-sm-6 col-lg-4">
                        @if ($contact->image === null)
                            <img alt="User Pic" src="{{asset('images/home/user.jpg')}}"
                                id="profile-image1" class="img-circle img-responsive">
                        @else
                            <img src="{{ Storage::url($contact->image) }}" height="350" width="350" alt="" />
                        @endif
                    </div>


                    @if (Auth::user())
                        @if (Auth::user()->role === 'admin')
                            {{-- {{ $contact->id }} --}}
                            <form action="{{ route('user.destroy', $contact->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger pull-right" type="submit" class="btn btn-danger" onclick="return confirm('ต้องการลบสินค้าใช่หรือไม่ ?')">ลบผู้ใช้งาน</button>
                                {{-- <a class="btn btn-sm btn-danger pull-right" type="submit" onclick="return confirm('ต้องการลบผู้ใช้งานใช่หรือไม่ ?')"><span class="fa fa-trash-o" aria-hidden="true"></span> ลบผู้ใช้งาน</a> --}}
                                {{-- <button type="submit" class="pull-right"
                                    onclick="return confirm('ต้องการลบผู้ใช้งานใช่หรือไม่ ?')">ลบผู้ใช้งาน</button> --}}

                            </form>
                        @endif
                    @endif
                    <div class="col-md-8 col-xs-12 col-sm-6 col-lg-8">
                        <h2 class="title center">โปรไฟล์ </h2>
                        <li>
                            <h4><span class="glyphicon glyphicon-user one"
                                    style="width:50px;"></span>{{ $contact->name }}</b></h4>
                        </li>
                        <hr>
                        <li>
                            <h4><span class="glyphicon glyphicon-envelope one"
                                    style="width:50px;"></span>{{ $contact->email }}</h4>
                        </li>
                        <hr>
                        <li>
                            <h4><span class="glyphicon glyphicon-phone one"
                                    style="width:50px;"></span>{{ $contact->phone }}</h4>
                        </li>
                        <hr>
                        {{-- <div class="col-sm-5 col-xs-6 tital ">รายละเอียดเพิ่มเติม</div> --}}
                    </div>
                </div>
            </div>
        @endsection
