@extends('layout.main')
@section('css')
<link href="{{asset('assets/plugins/datatables.min.css')}}" rel="stylesheet" type="text/css">
@endsection
@section('content')
  <div id="wrapper ">
   
    <div class="container">
    
      <div class="row justify-content-around">
        <form action="{{route('editService')}}" class="col-md-8 bg-light p-3 my-3" method="POST" >
          @csrf
          <h1 class="text-center text-uppercase h3 my-3">{{$title}}</h1>
          @error('msg')
            <div class="alert  alert-danger text-center">{{$message}}</div>
            @enderror


          <div class="form-group ">
            <label for="title">Tiêu đề *</label>
            <input type="text" name ="title" id="title" class="form-control" placeholder="Tiêu đề Tiếng Việt" required value="{{old('title') ?? $serviceDetail->title}}">
            @error('title')
            <span style="color: red;">{{$message}}</span>
            @enderror
          </div>

          <div class="form-group ">
            <input type="text" name ="title_en" id="title_en" class="form-control" placeholder="Tiêu đề Tiếng Anh" required value="{{old('title_en') ?? $serviceDetail->title_en}}">
            @error('title_en')
            <span style="color: red;">{{$message}}</span>
            @enderror
          </div>

          <div class="form-group">
            <label for="icon">Link Icon *</label>
            <input type="text" name ="icon" id="icon" class="form-control" required value="{{old('icon') ?? $serviceDetail->icon}}">
            @error('icon')
            <span style="color: red;">{{$message}}</span>
            @enderror
          </div>


          <div class="form-group">
            <label for="content">Nội dung Tiếng Việt *</label>
            <textarea name ="content" id="editor" class="form-control" required >{{old('content') ?? $serviceDetail->content}}</textarea>
            @error('content')
            <span style="color: red;">{{$message}}</span>
            @enderror
          </div>

          <div class="form-group">
            <label for="content_en">Nội dung Tiếng Anh *</label>
            <textarea name ="content_en" id="editor1" class="form-control" required >{{old('content_en') ?? $serviceDetail->content_en}}</textarea>
            @error('content_en')
            <span style="color: red;">{{$message}}</span>
            @enderror
          </div>

          <button type="submit" name="submit" class="btn-primary btn mb-3">Cập nhật</button>
        </form>
      </div>
    </div>
  </div>
  @endsection
@section('js')
<script src="{{asset('assets/plugins/datatables.min.js')}}"></script>
@endsection