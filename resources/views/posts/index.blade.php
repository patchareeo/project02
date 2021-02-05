<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laravel 8 CRUD Tutorial</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>

<div class="container mt-2">

<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 8 Post CRUD Tutorial</h2>
            </div>
            <div class="pull-right mb-2">
                <a class="btn btn-success" href="{{ route('posts.create') }}"> Create New Post</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>S.No</th>
            <th>ชื่อสินค้า</th>
            <th>ราคา</th>
            <th>จำนวนสินค้า</th>
            <th>วันที่ในการสั่งสินค้า</th>
            <th>เวลาในการสั่งสินค้า</th>
            <th>รายละเอียดสินค้า</th>
            <th>รูปสินค้า</th>
            <th></th>
            <!-- <th width="280px">Action</th> -->
        </tr>
        @foreach ($posts as $post)
        <tr>
            <td>{{ $post->id }}</td>
            <td>{{ $post->name }}</td>
            <td>{{ $post->price }}</td>
            <td>{{ $post->amount }}</td>
            <td>{{ $post->date }}</td>
            <td>{{ $post->time }}</td>
            <td>{{ $post->detail}}</td>
            <td><img src="{{ Storage::url($post->image) }}" height="75" width="75" alt="" /></td>
            <!-- <td>{{ $post->image}}</td> -->
            <td>
                <form action="{{ route('posts.destroy',$post->id) }}" method="POST">
    
                    <a class="btn btn-primary" href="{{ route('posts.edit',$post->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $posts->links() !!}

</body>
</html>