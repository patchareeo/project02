<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Post</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>

<div class="container mt-2">
  
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left mb-2">
            <h2>เพิ่มรายการสินค้า</h2>
        </div>
       
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
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>ชื่อสินค้า:</strong>
                <input type="text" name="name" class="form-control" placeholder="ชื่อสินค้า">
               @error('name')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
               @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>ราคาสินค้า:</strong>
                <input type="text" name="price" class="form-control" placeholder="ราคาสินค้า">
               @error('price')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
               @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>จำนวนสินค้า:</strong>
                <input type="text" name="amount" class="form-control" placeholder="จำนวนสินค้า">
               @error('amount')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
               @enderror
            </div>
        </div>
        {{-- Time  --}}
        <form>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <label for="party"><strong>กำหนดวันในการสั่งซื้อ:</strong>
                    <input type="date" value="2021-01-01" name="date" class="form-control">
                </label>
            </div>
        </form>

        <div class="col-xs-12 col-sm-12 col-md-3">
            <strong>กำหนดระยะเวลาในการสั่งซื้อ:</strong>
            <input type="time" id="input-limited-range" name="time" class="form-control">
            <label for="form1" class=""></label> 
        </div>

        {{-- Time  --}}
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>รายละเอียดเพิ่มเติม:</strong>
                <textarea class="form-control" style="height:150px" name="detail" placeholder="รายละเอียดเพิ่มเติม"></textarea>
                @error('detail')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>เพิ่มรูปสินค้า:</strong>
                 <input type="file" name="image" class="form-control" placeholder="Post Title">
                @error('image')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
               @enderror
            </div>
        </div>
        <div class="float-none">
            <a class="btn btn-primary" href="{{ route('index') }}"> ย้อนกลับ</a>
        </div>
        <div class="float-lg-right">
            <button type="submit" class="btn btn-warning" >โพสต์สินค้า</button>
        </div>
        
    </div>
   
</form>

</body>
</html>