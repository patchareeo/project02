@extends('templete.templete')

@section('title', 'Alert |Heawnea')

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
                <div class="col-lg-12">
                    {{-- <h2>Alerts</h2> --}}
                    <h2 class="title text-center">การแจ้งเตือน</h2>
                    {{-- <div class="alert alert-danger" role="alert">
				A simple primary alert with <a href="#" class="alert-link">an example link</a>. Give it a click if you like.
			  </div> --}}
              @if($Alerts ->isNotEmpty())
              @foreach ($Alerts as $alert)
                        <div class="col-md-4">
                            <div class="product-image-wrapper" style="width: 35rem; height=35rem;">
                                <div class="alert alert-danger" style="background-color:#fcecdd;">
                                    <div class=" text-center">
                                                <p>ผู้สั่งสินค้า : <a href="{{ route('page.contact', $alert->user_id) }}">{{ $alert->user_name}}</a></p>
                                                <p>สินค้า : {{ $alert->product_name }} จำนวน : {{ $alert->amount }}</p>
                                                <p>ราคา :{{ $alert->product_price * $alert->amount }}</p>
                                                <p>รายละเอียด :{{ $alert->detail }}</p>
                                                <br>

                                        <form action="{{ route('alert.status', $alert->id) }}" method="post"
                                            name="status">
                                            @if ($alert->status === 'ยืนยันการสั่งสินค้า')
                                                <img class="d-flex justify-content-end" alt="User Pic"
                                                    src="{{ asset('images/home/confirm.png') }}" id="profile-image1"
                                                    class="img-circle img-responsive" height="100" width="100">
                                                {{-- <br> --}}
                                                <input name="submit" type="submit" class="btn btn-warning"
                                                    value="ยกเลิกการสั่งสินค้า"
                                                    onclick="return confirm('ต้องการยกเลิกสินค้าใช่หรือไม่ ?')">
                                            @elseif ($alert->status === 'ยกเลิกการสั่งสินค้า')
                                                <img class="d-flex justify-content-end" alt="User Pic"
                                                    src="{{ asset('images/home/cancel.png') }}" id="profile-image1"
                                                    class="img-circle img-responsive" height="100" width="100">
                                            @else
                                                <input name="submit" type="submit" class="btn btn-warning"
                                                    value="ยืนยันการสั่งสินค้า"
                                                    onclick="return confirm('ต้องการรับฝากหิ้วสินค้าใช่หรือไม่ ?')">
                                                <input name="submit" type="submit" class="btn btn-warning"
                                                    value="ยกเลิกการสั่งสินค้า"
                                                    onclick="return confirm('ต้องการยกเลิกสินค้าใช่หรือไม่ ?')">
                                            @endif

                                            <input type="hidden" id="myid" name="post_id" value="{{ $alert->post_id }}">
                                            @csrf
                                        </form>

                                    </div>

                                </div>

                            </div>
                        </div>




                    @endforeach
                    @else 
                    <div class="title text-center">
                        <img src="{{ asset('images/home/question3.png') }}" width="250"
                        height="250" />
                        <h1 style="color:rgba(110, 96, 81, 0.849);">ไม่พบรายการสินค้า</h1>
                    </div>   
                    @endif





                </div>
            </div>
            <br>
        </div>

    @endsection
