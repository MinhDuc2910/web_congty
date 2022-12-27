<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" type="text/css">
  <title>{{$title}}</title>
</head>

<body>
  <div id="wrapper ">
   
    <div class="container">
    
      <div class="row justify-content-around">
        <form action="" class="col-md-6 bg-light p-3 my-3" method="POST" >
          @csrf
          <h1 class="text-center text-uppercase h3 my-3">Tạo Tài Khoản</h1>
          @error('msg')
            <div class="alert  alert-danger text-center">{{$message}}</div>
            @enderror

          <div class="form-group">
            <label for="fullname">Họ Và Tên</label>
            <input type="text" name ="fullname" id="fullname" class="form-control" required value="{{old('fullname')}}">
            @error('fullname')
            <span style="color: red;">{{$message}}</span>
            @enderror
          </div>

          <div class="form-group">
            <label for="username">Tên Đăng Nhập</label>
            <input type="text" name ="username" id="username" class="form-control" required value="{{old('username')}}">
            @error('username')
            <span style="color: red;">{{$message}}</span>
            @enderror
          </div>

          <div class="form-group">
            <label for="password">Mật Khẩu</label>
            <input type="password" name ="password" id="password" class="form-control" required value="{{old('password')}}">
            @error('password')
            <span style="color: red;">{{$message}}</span>
            @enderror
          </div>

          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name ="email" id="email" class="form-control" required value="{{old('email')}}">
            @error('email')
            <span style="color: red;">{{$message}}</span>
            @enderror
          </div>

          <div class="form-group">
            <label for="gender">Giới Tính</label>
            <div>
            <div class="form-check form-check-inline">
            <input type="radio" name ="gender" id="male" value="male" class="form-check-input" checked>
            <label for="male" class="form-check-label">Nam</label>
            </div>
            <div class="form-check form-check-inline">
            <input type="radio" name ="gender" id="female" value="female" class="form-check-input">
            <label for="female" class="form-check-label">Nữ</label>
            </div>
            </div>
          </div>

          <div class="form-group">
            <label for="address">Địa Chỉ</label>
            <input type="text" name ="address" id="address" class="form-control" required value="{{old('address')}}">
            @error('address')
            <span style="color: red;">{{$message}}</span>
            @enderror
          </div>

          <button type="submit" name="submit" class="btn-primary btn mb-3">Tạo Tài Khoản</button>
          <a href="{{route('admin')}}" class="btn btn-warning mb-3 ml-3">Quay lại</a>
        </form>
      </div>
    </div>
  </div>
</body>

</html>