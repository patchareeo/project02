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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home |Heawnea</title>
</head>
<body>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 padding-right">
                    <div class="features_items">
                        <h2 class="title text-center">รายการค้นหา</h2>
                        
                        @if($products->isNotEmpty())
                        @foreach ($products as $product)
                        <div class="col-sm-3">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="{{ Storage::url($product->image) }}" alt="Girl in a jacket"
                                            width="150" height="250" />
                                        <h2>{{ $product->price }}</h2>
                                        <p>{{ $product->name }}</p>
                                        <a href="{{ route('show', $product->id) }}"
                                            class="btn btn-default add-to-cart"></i>ดูรายละเอียดสินค้า</a>
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
            </div>
        </div>
    </section>



</body>
</html>

@endsection
