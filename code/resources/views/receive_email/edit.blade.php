@extends('layout.main')
@section('css')
<link href="{{asset('assets/plugins/datatables.min.css')}}" rel="stylesheet" type="text/css">
@endsection
@section('content')
  <div id="wrapper ">
   
    <div class="container">
    
      <div class="row justify-content-around">
        <form action="{{route('editReceiveEmail')}}" class="col-md-8 bg-light p-3 my-3" method="POST" >
          @csrf
          <h1 class="text-center text-uppercase h3 my-3">{{$title}}</h1>
          @error('msg')
            <div class="alert  alert-danger text-center">{{$message}}</div>
            @enderror

            <!-- demo -->

          <div class="form-group ">
            <label for="name">Tên *</label>
            <input type="text" name ="name" id="name" class="form-control" required value="{{old('name') ?? $receiveEmailDetail->name}}">
            @error('name')
            <span style="color: red;">{{$message}}</span>
            @enderror
          </div>

          <div class="form-group">
            <label for="email">Email *</label>
            <input type="text" name ="email" id="email" class="form-control" required value="{{old('email') ?? $receiveEmailDetail->email}}">
            @error('email')
            <span style="color: red;">{{$message}}</span>
            @enderror
          </div>

          <div class="form-group">
            <label for="status">Trạng thái *</label>
            <input type="number" name ="status" id="status" class="form-control" required value="{{old('status') ?? $receiveEmailDetail->status}}">
            @error('status')
            <span style="color: red;">{{$message}}</span>
            @enderror
          </div>

          <button type="submit" name="submit" class="btn-primary btn mb-3">Thêm email</button>
        </form>
      </div>
    </div>
  </div>
  @endsection
@section('js')
<script src="{{asset('assets/plugins/datatables.min.js')}}"></script>
@endsection