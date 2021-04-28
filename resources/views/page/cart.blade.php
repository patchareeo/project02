@extends('templete.templete')

@section('title', 'Cart |Heawnea')

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


    <body>
        <section id="cart_items">
            <div class="container">
                <h2 class="title text-center">สินค้าที่สั่งซื้อ</h2>

                <div class="table-responsive cart_info">
                    <table class="table table-condensed">
                        <thead>
                            <tr class="cart_menu">
                                <td class="image">สินค้า</td>
                                <td class="description"></td>
                                <td class="date">เวลาในการสั่งซื้อ</td>
                                <td class="price">ราคา</td>
                                <td class="quantity">จำนวน</td>
                                <td class="status">สถานะสินค้า</td>
                                {{-- <td class="total">รวม</td> --}}
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cart as $order)
 
                                <tr class="" style="background-color:#fcecdd">
                                    <td class="cart_product">
                                        <img src="{{ Storage::url($order->product_image) }}" alt="" width="180"
                                            height="150" />
                                    </td>
                                    <td class="cart_description">
                                        <h4><a
                                                href="{{ route('page.showpost', $order->post_id) }}">{{ $order->product_name }}</a>
                                        </h4>
                                        {{-- <p>Web ID: 1089772</p> --}}
                                    </td>
                                    <td class="cart_date">
                                        <p>{{ $order->created_at }}</p>
                                    </td>
                                    <td class="cart_price">
                                        <p>{{ $order->product_price * $order->amount }}</p>
                                    </td>
                                    <td class="cart_quantity">
                                        <p>{{ $order->amount }}</p>
                                    </td>
                                    <td class="status">
                                        {{-- <p>รอการยืนยัน</p> --}}
                                        <p>{{ $order->status }}</p>
                                    </td>
                                    {{-- <td class="cart_quantity">
								<div class="cart_quantity_button">
									<a class="cart_quantity_up" href=""> + </a>
									<input class="cart_quantity_input" type="text" name="quantity" value="1" autocomplete="off" size="2">
									<a class="cart_quantity_down" href=""> - </a>
								</div>
							</td> --}}
                                    {{-- <td class="cart_total">
								<p class="cart_total_price">150</p>
							</td> --}}
                            <form action="{{ route('order.destroy',$order->id) }}" method="POST">
                                    <td class="cart_delete">
                                        @csrf
                                        @method('DELETE')
                                        {{-- <a type="submit" class="fa fa-times" onclick="return confirm('ต้องการยกเลิกการสั่งสินค้าใช่หรือไม่ ?')"> ยกเลิก</a> --}}
                                        <button class="fa fa-times" onclick="return confirm('ต้องการยกเลิกการสั่งสินค้าใช่หรือไม่ ?')" style="background-color:#fe980f"></button>
								
                            </form>
                                </tr>
                            @endforeach


                            {{-- @if (Auth::user())
								@if (Auth::user()->user_name !== $order->user_name)

								<td class="status">
									<p>ไม่มีสินค้า</p>
								</td>
								
								@endif 
								@endif  --}}


                                    <tr>
                                        <td colspan="4">&nbsp;</td>
                                        <td colspan="2">
                                        </td>
                                    </tr>
                        </tbody>
                    </table>
                </div>


            </div>
        </section>
        <!--/#cart_items-->

        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.scrollUp.min.js"></script>
        <script src="js/jquery.prettyPhoto.js"></script>
        <script src="js/main.js"></script>
    </body>

    </html>

@endsection
