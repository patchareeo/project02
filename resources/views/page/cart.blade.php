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
                        @if ($cart->isNotEmpty())
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
                                                <p>{{ $order->status }}</p>
                                            </td>
                                            <form action="{{ route('order.destroy', $order->id) }}" method="POST">
                                                <td class="cart_delete">
                                                    @csrf
                                                    @method('DELETE')
                                                    {{-- <a type="submit" class="fa fa-times" onclick="return confirm('ต้องการยกเลิกการสั่งสินค้าใช่หรือไม่ ?')"> ยกเลิก</a> --}}
                                                    <button class="fa fa-times"
                                                        onclick="return confirm('ต้องการยกเลิกการสั่งสินค้าใช่หรือไม่ ?')"
                                                        style="background-color:#fe980f"></button>

                                            </form>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="4">&nbsp;</td>
                                        <td colspan="2">
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        @else
                            <div class="title text-center">
                                <img src="{{ asset('images/home/question3.png') }}" width="250" height="250" />
                                <h1 style="color:rgba(110, 96, 81, 0.849);">ไม่พบรายการสินค้า</h1>
                            </div>
                        @endif
                    </div>


                </div>
            </section>
            <!--/#cart_items-->

          
        </body>

        </html>

    @endsection
