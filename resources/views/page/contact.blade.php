@extends('templete.templete')

@section('title', 'contact |Heawnea')

@section('content')

    <div class="container">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="col-md-4 col-xs-12 col-sm-6 col-lg-4">
                        @if ($contact->image === null)
                            <img alt="User Pic" src="https://developers.google.com/web/images/contributors/no-photo.jpg"
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
                                <button type="submit" class="pull-right"
                                    onclick="return confirm('ต้องการลบผู้ใช้งานใช่หรือไม่ ?')">ลบผู้ใช้งาน</button>

                            </form>
                        @endif
                    @endif
                    <div class="col-md-8 col-xs-12 col-sm-6 col-lg-8">
                        <h2 class="title center">โปรไฟล์ </h2>
                        <li>
                            <p><span class="glyphicon glyphicon-user one"
                                    style="width:50px;"></span>{{ $contact->name }}</b></p>
                        </li>
                        <hr>
                        <li>
                            <p><span class="glyphicon glyphicon-envelope one"
                                    style="width:50px;"></span>{{ $contact->email }}</p>
                        </li>
                        <hr>
                        <li>
                            <p><span class="glyphicon glyphicon-phone one"
                                    style="width:50px;"></span>{{ $contact->phone }}</p>
                        </li>
                        <hr>
                        {{-- <div class="col-sm-5 col-xs-6 tital ">รายละเอียดเพิ่มเติม</div> --}}
                    </div>
                </div>
            </div>
        @endsection
