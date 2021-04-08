@extends('templete.templete')

@section('title', 'Edit-Profile |Heawnea')

@section('content')

<div class="container mt-2">

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="">
                <h2 class="title text-center">แก้ไขโปรไฟล์ของฉัน</h2>
            </div>
            
        </div>
    </div>
    
    <form action="{{ route('page.updateprofile',$profile->id )}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
   
         <div class="row">
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>ชื่อ:</strong>
                <input type="text" name="name" class="form-control" value="{{ $profile->name }}" placeholder={{ $profile->name}}>
               @error('name')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
               @enderror
            </div>
        </div>   
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>อีเมล:</strong>
                <input type="text" name="email" class="form-control" value="{{ $profile->email }}" placeholder={{ $profile->email }}>
               @error('email')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
               @enderror
            </div>
        </div>  
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>เบอร์โทรศัพท์:</strong>
                <input type="text" name="phone" class="form-control" value="{{ $profile->phone}}" placeholder={{ $profile->phone }}>
               @error('phone')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
               @enderror
            </div>
        </div>   
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>รูปภาพ:</strong>
            </div>
            <div class="form-group">
                <input type="file" name="image" class="" value="" placeholder={{$profile->image}}>
                @error('image')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
               @enderror
            </div>
            <div class="form-group">
              <img src="{{ Storage::url($profile->image) }}" height="200" width="200" alt="" />


            </div>
        
        </div>
        <div class="pull-left">
            <a class="btn btn-info" href="{{ route('page.profile') }}" class="float-none"> ย้อนกลับ</a>  
        </div>
        <div class="pull-right">
            <button type="submit" class="btn btn-warning" class="pull-right">อัปเดต</button>
        </div>
            
              
          
        </div>
   
    </form>

@endsection