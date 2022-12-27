@extends('layout.main')
@section('css')
<link href="{{asset('assets/plugins/datatables.min.css')}}" rel="stylesheet" type="text/css">
@endsection
@section('content')
  <div id="wrapper ">
   
    <div class="container">
    
      <div class="row justify-content-around">
        <form action="" class="col-md-8 bg-light p-3 my-3" method="POST" enctype ="multipart/form-data" >
          @csrf
          <h1 class="text-center text-uppercase h3 my-3">{{$title}}</h1>
          @error('msg')
            <div class="alert  alert-danger text-center">{{$message}}</div>
            @enderror

            <!-- demo -->

          <div class="form-group ">
            <label for="name_vn">Tên sự kiện *</label>
            <input type="text" name ="name_vn" id="name_vn" class="form-control" placeholder="Tiêu đề Tiếng Việt" required value="{{old('name_vn')}}">
            @error('name_vn')
            <span style="color: red;">{{$message}}</span>
            @enderror
          </div>

          <div class="form-group ">
            <input type="text" name ="name_en" id="name_en" class="form-control" placeholder="Tiêu đề Tiếng Anh" required value="{{old('name_en')}}">
            @error('name_en')
            <span style="color: red;">{{$message}}</span>
            @enderror
          </div>

          <div class="form-group">
            <label for="image">Ảnh minh họa *</label>
            <input type="file" name ="file_upload" id="image" class="form-control" required value="{{old('file_upload')}}">
            @error('file_upload')
            <span style="color: red;">{{$message}}</span>
            @enderror
          </div>


          <div class="form-group">
            <label for="content_vn">Nội dung Tiếng Việt *</label>
            <textarea name ="content_vn" id="editor" class="form-control" required >{{old('content_vn')}}</textarea>
            @error('content_vn')
            <span style="color: red;">{{$message}}</span>
            @enderror
          </div>

          <div class="form-group">
            <label for="content_en">Nội dung Tiếng Anh *</label>
            <textarea name ="content_en" id="editor1" class="form-control" required >{{old('content_en')}}</textarea>
            @error('content_en')
            <span style="color: red;">{{$message}}</span>
            @enderror
          </div>

          <button type="submit" name="submit" class="btn-primary btn mb-3">Thêm dữ liệu</button>
        </form>
      </div>
    </div>
  </div>
  @endsection
@section('js')
<script src="{{asset('assets/plugins/datatables.min.js')}}"></script>
@endsection