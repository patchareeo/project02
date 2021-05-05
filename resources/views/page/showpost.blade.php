@extends('templete.templete')

@section('title', 'Home |Heawnea')

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
                <div class="table-responsive cart_info">
                    <h2 class="title text-center">รายละเอียดสินค้า</h2>

                    <div class="col-sm-10 padding-right">
                        <div class="features_items">
                            <div class="col-xs-12 col-sm-12 col-md-8">
                                <div class="form-group">
                                    @if (Auth::user())
                                    <div>ชื่อผู้โพสต์ : <a
                                            href="{{ route('page.contact', $details->user_id) }}">{{ $details->user->name }}
                                    </a></div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <img src="{{ Storage::url($details->image) }}" alt="Girl in a jacket" width="400"
                                        height="425" />
                                </div>
                            </div>
                            <br>
                            <br>
                            <br>

                            <div class="col-xs-12 col-sm-12 col-md-4">
                                <div class="form-group" style="color:rgba(110, 96, 81, 0.849);">
                                    <h4>ชื่อสินค้า :
                                        {{ $details->name }}</h4>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-4">
                                <div class="form-group" style="color:rgba(110, 96, 81, 0.849);">
                                    <h4>ราคา:
                                        {{ $details->price }}</h4>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-4">
                                <div class="form-group" style="color:rgba(110, 96, 81, 0.849);">
                                    <h4>จำนวนสินค้า :
                                        {{ $details->amount }}</h4>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-4">
                                <div class="form-group" style="color:rgba(110, 96, 81, 0.849);">
                                    <h4>กำหนดวันในการสั่งซื้อ :
                                        {{ $details->date }}</h4>
                                </div>
                            </div>
                            {{-- <div class="col-xs-12 col-sm-12 col-md-4">
                            <div class="form-group">
                                <strong>กำหนดระยะเวลาในการสั่งซื้อ :</strong>
                                {{ $details->time}}
                            </div>
                        </div> --}}
                            <div class="col-xs-12 col-sm-12 col-md-4">
                                <div class="form-group" style="color:rgba(110, 96, 81, 0.849);">
                                    <h4>รายละเอียดสินค้า :
                                        {{ $details->detail }}</h4>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-4">
                                @if (Auth::user())
                                    @if (Auth::user()->id === $details->user_id)
                                        <form action="{{ route('posts.destroy', $details->id) }}" method="POST">

                                            <a class="btn btn-warning"
                                                href="{{ route('posts.edit', $details->id) }} "><span
                                                    class="fa fa-edit"></span> แก้ไขสินค้า</a>
                                            {{-- <a  class="btn btn-sm btn-warning" href="{{ route('posts.edit',$details->id) }}" style="padding: 8px; float: right;  color: white;" > <span class="fa fa-edit"></span> Edit</a> --}}

                                            @csrf
                                            @method('DELETE')
                                            <a class="btn btn-danger" type="submit"
                                                onclick="return confirm('ต้องการลบสินค้าใช่หรือไม่ ?')"><span
                                                    class="fa fa-trash-o" aria-hidden="true"></span> ลบสินค้า</a>
                                            {{-- <td><a class="btn btn-sm btn-danger"  href="" ><span class="fa fa-trash" ></span> ยกเลิก</a></td> --}}
                                        </form>
                                    @endif
                                @endif
                            </div>

                            @if (Auth::user())
                                @if (Auth::user()->role === 'admin')
                                    <form action="{{ route('posts.destroy', $details->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a class="btn btn-danger" type="submit"
                                            onclick="return confirm('ต้องการลบสินค้าใช่หรือไม่ ?')"><span
                                                class="fa fa-trash-o" aria-hidden="true"></span> ลบสินค้า</a>

                                    </form>
                                @endif
                            @endif


                            {{-- popup --}}
                            <div class="col-xs-12 col-sm-12 col-md-4">
                                <form action="{{ route('page.showpost', $details->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    @if (Auth::user())
                                        {{-- @if (Auth::user()->name != $details->user_name) --}}
                                        @if (Auth::user()->id != $details->user_id)
                                            @if (Auth::user()->role != 'admin')
                                                <a type="button" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#exampleModal"><span class="fa fa-shopping-cart"></span>
                                                    สั่งสินค้า</a>
                                            @endif
                                        @endif
                                    @endif
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">กรอกรายละเอียด</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form>
                                                        <div class="form-group">
                                                            <label for="recipient-name"
                                                                class="col-form-label">จำนวนสินค้า:</label>
                                                            <input type="number" class="form-control" name="amount"
                                                                id="recipient-name" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="text"
                                                                class="col-form-label">รายละเอียดเพิ่มเติม:</label>
                                                            <textarea class="form-control" name="detail" id="text"
                                                                required></textarea>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light"
                                                        data-dismiss="modal">ยกเลิก</button>
                                                    <button type="submit" class="btn btn-warning">สั่งสินค้า</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            {{-- popup --}}

                            {{-- showordes --}}

                            @foreach ($orders as $order)
                                @if (Auth::user())
                                    @if (Auth::user()->name === $order->user_name)
                                        <form action="{{ route('order.destroy', $order->id) }}" method="POST">
                                            <div class="col-md-4">
                                                <br>
                                                <div class="product-image-wrapper" style="background-color:#ffda99">
                                                    <div class="single-products">
                                                        <div class="productinfo text-center">
                                                            <p>ผู้สั่งสินค้า : {{ $order->user_name }}</p>
                                                            <p>จำนวน : {{ $order->amount }}</p>
                                                            <p>รายละเอียด : {{ $order->detail }}</p>
                                                            <br>

                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-warning"
                                                                onclick="return confirm('ต้องการยกเลิกการสั่งสินค้าใช่หรือไม่ ?')">ยกเลิกการสั่งสินค้า</button>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                        </form>
                                    @endif
                                @endif

                            @endforeach
                            {{-- showordes --}}
                            <div class="card text-center">
                                <div class="card-header">
                                    <ul class="nav nav-tabs card-header-tabs">

                                    </ul>
                                </div>
                            </div>


                        </div>

                    </div>
                </div>
            </div>




            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <h3>แสดงความคิดเห็น</h3>
                            @include('post.partials.replys', ['comments' => $details->comments, 'post_id' => $details->id])


                        </div>


                        <div class="card-body">
                            {{-- <h5>Leave a comment</h5> --}}
                            <form method="post" action="{{ route('comment.add') }}">
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="comment" class="form-control" required />
                                    <input type="hidden" name="post_id" value="{{ $details->id }}" />

                                </div>

                                <div class="form-group">
                                    <input type="submit" class="btn btn-warning" value="แสดงความคิดเห็น" />
                                </div>
                            </form>
                        </div>


                    </div>
                </div>
            </div>

        </div>
    </section>


@endsection
