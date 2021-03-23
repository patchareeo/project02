@extends('templete.templete')

@section('title', 'Post |Heawnea')

@section('content')

{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Post |Heawnea</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head> --}}
<body>

<div class="container mt-2">
  
<div class="row">
    <div class="col-lg-12 margin-tb">
            <h2 class="title text-center">เพิ่มรายการสินค้า</h2>
    </div>
</div>
   
  @if(session('status'))
    <div class="alert alert-success mb-1 mt-1">
        {{ session('status') }}
    </div>
  @endif
   
<form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
  
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <strong>ชื่อสินค้า:</strong>
                <input type="text" name="name" class="form-control" placeholder="ชื่อสินค้า" required>
               @error('name')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
               @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <strong>ราคาสินค้า:</strong>
                <input type="text" name="price" class="form-control" placeholder="ราคาสินค้า" required>
               @error('price')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
               @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <strong>จำนวนสินค้า:</strong>
                <input type="text" name="amount" class="form-control" placeholder="จำนวนสินค้า" required>
               @error('amount')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
               @enderror
            </div>
        </div>
        {{-- Time  --}}
        <form>
            <div class="col-xs-12 col-sm-12 col-md-3">
                <label for="party"><strong>กำหนดวันในการสั่งซื้อ:</strong>
                    <input type="date" value="Y-D-M" name="date" class="form-control" required>
                </label>
            </div>
        </form>

        <div class="col-xs-12 col-sm-12 col-md-3">
            <strong>กำหนดระยะเวลาในการสั่งซื้อ:</strong>
            <input type="time" id="input-limited-range" name="time" class="form-control" required>
            <label for="form1" class=""></label> 
        </div>

        {{-- Time  --}}
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>รายละเอียดเพิ่มเติม:</strong>
                <textarea class="form-control" style="height:150px" name="detail" placeholder="รายละเอียดเพิ่มเติม" required></textarea>
                @error('detail')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>เพิ่มรูปสินค้า:</strong>
                 <input type="file" name="image" class="" placeholder="Post Title" required>
                @error('image')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
               @enderror
            </div>
        </div> 
        <div class="pull-left">
            <a class="btn btn-info" href="{{ route('index') }}" class="float-none"> ย้อนกลับ</a>  
        </div>
        <div class="pull-right">
            <button type="submit" class="btn btn-warning" class="pull-right">โพสต์สินค้า</button>
        </div>
    </div>
    
   
</form>
</body>
</html>

@endsection
