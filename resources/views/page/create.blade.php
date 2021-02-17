@extends('templete.templete')

@section('title', 'Post |Heawnea')

@section('content')

    <body>


        <section>
            <div class="container">
                <div class="row">

                    <div class="col-sm-12 padding-right">


                        <div class="category-tab shop-details-tab">
                            <div class="row">
                                <!--category-tab-->
                                <div class="col-sm-12">
                                    {{-- <ul class="nav nav-tabs"> --}}
                                    {{-- <li class="active"><a href="#reviews" data-toggle="tab">โพสต์ขายสินค้า</a></li> --}}
                                    <h2 class="title text-center">เพิ่มรายการสินค้า</h2>
                                    {{-- </ul> --}}
                                </div>
                                <div class="tab-content">
                                    <div class="tab-pane fade active in" id="reviews">
                                        <div class="col-sm-12">
                                            {{-- <ul>
                                            <li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
                                            <li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
                                            <li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
                                        </ul> --}}
                                            <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                     <p><b>Write Your Review</b></p> -->

                                            {{-- <form action="{{ route('posts.store') }}" method="POST" --}}
                                                enctype="multipart/form-data">
                                                <span>
                                                    <input type="text" name="name" class="" placeholder="ชื่อสินค้า">
                                                    @error('name')
                                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                    @enderror
                                                    <input type="text" name="price" class="" placeholder="ราคาสินค้า">
                                                    @error('price')
                                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                    @enderror
                                                </span>

                                                <span>
                                                    <input type="text" name="amount" class="" placeholder="จำนวนสินค้า">
                                                    @error('amount')
                                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                    @enderror
                                                    <input type="date" value="Y-D-M" name="date" class=""
                                                        placeholder="กำหนดวันในการสั่งซื้อ" />
                                                </span>

                                                <span>
                                                    <input type="time" name="amount" class=""
                                                        placeholder="เวลาในการสั่งซื้อ">
                                                    @error('time')
                                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                    @enderror
                                                </span>


                                                <textarea name="detail" placeholder="รายละเอียดเพิ่มเติม"></textarea>
                                                @error('detail')
                                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror


                                                <span>
                                                    <input name="image" type="file" class="" placeholder="image" />
                                                    @error('image')
                                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                    @enderror
                                                </span>

                                                <!-- <b>Rating: </b> <img src="images/product-details/rating.png" alt="" /> -->
                                                <button type="submit" class="btn btn-default pull-right">
                                                    โพสต์ขายสินค้า
                                                </button>
                                            </form>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!--/category-tab-->

                    </div>
                </div>
            </div>
        </section>


        <script src="js/jquery.js"></script>
        <script src="js/price-range.js"></script>
        <script src="js/jquery.scrollUp.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.prettyPhoto.js"></script>
        <script src="js/main.js"></script>
    </body>

    </html>

@endsection
