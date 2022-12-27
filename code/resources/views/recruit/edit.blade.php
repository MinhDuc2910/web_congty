@extends('layout.main')
@section('css')
<link href="{{asset('assets/plugins/datatables.min.css')}}" rel="stylesheet" type="text/css">
@endsection
@section('content')
  <div id="wrapper ">
   
    <div class="container">
    
      <div class="row justify-content-around">
        <form action="{{route('editRecruit')}}" class="col-md-8 bg-light p-3 my-3 " method="POST" >
          @csrf
          <h1 class="text-center text-uppercase h3 my-3">{{$title}}</h1>
          @error('msg')
            <div class="alert  alert-danger text-center">{{$message}}</div>
            @enderror

            <!-- demo -->
            <div class="form-group row g-3 ">
            <div class="col-md-5">
            <label for="expired_date">Ngày hết hạn *</label>
            <input type="text" name ="expired_date" id="expired_date" class="form-control" required value="{{old('expired_date') ?? $recruitDetail->expired_date}}">
            @error('expired_date')
            <span style="color: red;">{{$message}}</span>
            @enderror
            </div>
          </div>

          <div class="form-group row g-3">
            <div class="col">
            <label class="visually-hidden" for="department">Nghành *</label>
            <select class=" form-control" id="department">
              <option selected value="1">Tất Cả</option>
              <option value="2">Lập Trình</option>
              <option value="3">Vận hành, kiểm thử</option>
              <option value="3">Kinh Doanh</option>
              
            </select>
            </div>
            <div class="col">
            <label class="visually-hidden" for="department">Bộ phận *</label>
            <select class=" form-control" id="department" name="department" value="{{old('department') ?? $recruitDetail->department}}">
              <option value="1">Lập Trình PHP</option>
              <option value="2">Lập Trình. NET</option>
              <option value="3">Lập Trình Javascript</option>
              <option value="4">Lập Trình Mobile</option>
              <option value="5">Lập Trình IOS</option>
              <option value="6">Lập Trình Android</option>
              <option value="7">Vận hành, kiểm thử</option>
              <option value="8">Kinh Doanh</option>
            </select>
            </div>
          </div>

          <div class="form-group ">
            <label for="title">Tiêu đề *</label>
            <input type="text" name ="title" id="title" class="form-control" placeholder="Tiêu đề Tiếng Việt" required value="{{old('title') ?? $recruitDetail->title}}">
            @error('title')
            <span style="color: red;">{{$message}}</span>
            @enderror
          </div>

          <div class="form-group ">
            <input type="text" name ="title_en" id="title_en" class="form-control" placeholder="Tiêu đề Tiếng Anh" required value="{{old('title_en') ?? $recruitDetail->title_en}}">
            @error('title_en')
            <span style="color: red;">{{$message}}</span>
            @enderror
          </div>

          <div class="form-group">
            <label for="content">Nội dung Tiếng Việt *</label>
            <textarea name ="content" id="editor" class="form-control" required >{{old('content') ?? $recruitDetail->content}}</textarea>
            @error('content')
            <span style="color: red;">{{$message}}</span>
            @enderror
          </div>

          <div class="form-group">
            <label for="content_en">Nội dung Tiếng Anh *</label>
            <textarea name ="content_en" id="editor1" class="form-control" required >{{old('content_en') ?? $recruitDetail->content_en}}</textarea>
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