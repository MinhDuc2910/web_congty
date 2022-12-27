<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('assets/css/style_login.css')}}" rel="stylesheet" type="text/css">
  <title>{{$title}}</title>
</head>

<body>
  <div id="wrapper ">  
    <div class="container ">
      <div class="row justify-content-around " id="form_login">
        <form action="{{route('login')}}" class="col-md-6 bg-light p-3 my-3 from" method="POST" >
          <h1 class="text-center text-uppercase h3 my-3">Đăng Nhập</h1>
          @if (session('msg'))
             <div class="alert alert-danger text-center">{{session('msg')}}</div>
           @endif
          <div class="form-group">
            <label for="username">Tên Đăng Nhập</label>
            <input type="text" name ="username" id="username" class="form-control" value="{{old('username')}}" >
            @error('username')
            <span style="color: red;">{{$message}}</span>
            @enderror
          </div>

          <div class="form-group">
            <label for="password">Mật Khẩu</label>
            <input type="password" name ="password" id="password" class="form-control" >
            @error('password')
            <span style="color: red;">{{$message}}</span>
            @enderror
          </div>

          @csrf

          <button type="submit" name="submit" class="btn-primary btn btn-block mb-4">Đăng Nhập</button>
          <div class="help"><a href="">Quên mật khẩu</a></div>

          
        </form>
      </div>
    </div>
  </div>
</body>

</html>