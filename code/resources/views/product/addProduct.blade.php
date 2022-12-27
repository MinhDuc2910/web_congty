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
            <label for="name">Tên game</label>
            <input type="text" name ="name" id="name" class="form-control" required value="{{old('name')}}">
            @error('name')
            <span style="color: red;">{{$message}}</span>
            @enderror
          </div>

          <div class="form-group">
            <label for="file_upload">Ảnh sản phẩm</label>
            <input type="file" name ="file_upload" id="file_upload" class="form-control" required value="{{old('file_upload')}}">
            @error('file_upload')
            <span style="color: red;">{{$message}}</span>
            @enderror
          </div>

          <div class="form-group">
            <label for="link_ios">Link IOS</label>
            <input type="link_ios" name ="link_ios" id="link_ios" class="form-control" required value="{{old('link_ios')}}">
            @error('link_ios')
            <span style="color: red;">{{$message}}</span>
            @enderror
          </div>

          <div class="form-group">
            <label for="link_android">Link Android</label>
            <input type="link_android" name ="link_android" id="link_android" class="form-control" required value="{{old('link_android')}}">
            @error('link_android')
            <span style="color: red;">{{$message}}</span>
            @enderror
          </div>

          <div class="form-group">
            <label for="link_window">Link Window</label>
            <input type="link_window" name ="link_window" id="link_window" class="form-control" required value="{{old('link_window')}}">
            @error('link_window')
            <span style="color: red;">{{$message}}</span>
            @enderror
          </div>

          <div class="form-group">
            <label for="describe">Mô tả</label>
            <textarea name ="describe" id="editor" class="form-control" required value="{{old('describe')}}"></textarea>
            @error('describe')
            <span style="color: red;">{{$message}}</span>
            @enderror
          </div>

          <button type="submit" name="submit" class="btn-primary btn mb-3">Thêm sản phẩm</button>
        </form>
      </div>
    </div>
  </div>
  @endsection
@section('js')
<script src="{{asset('assets/plugins/datatables.min.js')}}"></script>
@endsection