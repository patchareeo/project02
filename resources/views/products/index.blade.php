@extends('products.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>HEAWNEA</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('products.create') }}"> เพิ่มสินค้า</a>
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
            <!-- <th>No</th> -->
            <th>ชื่อสินค้า</th>
            <th>ราคา</th>
            <th>รูปภาพ</th>
            <th>จำนวนสินค้า</th>
            <th>รายละเอียดสินค้า</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($products as $product)
        <tr>
            <!-- <td>{{ ++$i }}</td> -->
            <td>{{ $product->name }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->image }}</td>
            <td>{{ $product->amount }}</td>
            <td>{{ $product->detail }}</td>
            <td>
                <form action="{{ route('products.destroy',$product->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">สั่งซื้อสินค้า</a>
    
                    <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">แก้ไข</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">ลบ</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $products->links() !!}
      
@endsection