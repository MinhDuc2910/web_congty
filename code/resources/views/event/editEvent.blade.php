@extends('layout.main')
@section('css')
<link href="{{asset('assets/plugins/datatables.min.css')}}" rel="stylesheet" type="text/css">
@endsection
@section('content')
  <div id="wrapper ">
   
    <div class="container">
    
      <div class="row justify-content-around">
        <form action="{{route('editEvent')}}" class="col-md-8 bg-light p-3 my-3" method="POST" enctype ="multipart/form-data" >
          @csrf
          <h1 class="text-center text-uppercase h3 my-3">{{$title}}</h1>
          @error('msg')
            <div class="alert  alert-danger text-center">{{$message}}</div>
            @enderror

            <!-- demo -->

          <div class="form-group ">
            <label for="title">Tên sự kiện *</label>
            <input type="text" name ="title" id="title" class="form-control" placeholder="Tiêu đề " required value="{{old('title') ?? $eventDetail->title}}">
            @error('title')
            <span style="color: red;">{{$message}}</span>
            @enderror
          </div>

          <div class="form-group">
            <label for="time">Thời gian diễn ra sự kiện *</label>
            <input type="text" name ="time" id="time" class="form-control" required value="{{old('time') ?? $eventDetail->time}}">
            @error('time')
            <span style="color: red;">{{$message}}</span>
            @enderror
          </div>

          <div class="form-group">
            <label for="image">Ảnh minh họa *</label>
            <input type="file" name ="file_upload" id="image" class="form-control" value="{{old('file_upload') ?? $eventDetail->image}}">
            @error('file_upload')
            <span style="color: red;">{{$message}}</span>
            @enderror
            <div class="col-md-12 h-20">
              <div class="row">
                <img src="{{$eventDetail->image_path}}" class="img-thumbnail" alt="">
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="content">Nội dung *</label>
            <textarea name ="content" id="editor" class="form-control" required >{{old('content') ?? $eventDetail->content}}</textarea>
            @error('content')
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