<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{asset('assets/css/client/input_email/input_email.css')}}" rel="stylesheet">

</head>
<body>
@if (session('msg'))
            <script>
                alert('Cảm ơn bạn đã gửi thông tin. Chúng tôi sẽ phản hồi lại bạn trong thời gian sớm nhất.')
            </script>
            @endif
<section>
        <div class="box_receive mb-5">
        <div class="container text-center">
          <div class="row justify-content-md-center py-5">
            <div class="col-5">
              <div class="text_box_receive ">
                <h3 class="text">
                  Tạo thông báo việc làm
                </h3>
              </div>
            </div>
            <form action="" class="div_input col-7 d-inline-flex flex-wrap relative" method="POST">
              @csrf
              <div class="input ">
                <img src="{{asset('assets/images/image_web/email-gray.svg')}}" class="icon_email animate__animated animate__tada  animate__infinite	infinite" alt="">
                <input type="email" name="email" class="w-100 " placeholder="Nhập địa chỉ email" required value="{{old('email')}}" >
              </div>
              <div class="input_button ">
                <button type="submit" class="w-100 input_submit">Đăng ký</button>
              </div>
              <div>
                <p class="text-white mt-3 inline-block">Nhận thông báo việc làm mới nhất</p>
              </div>
            </form>
            <img src="{{asset('assets/images/image_web/bg-register-noti.svg')}}" class="bg_register" alt="">
          </div>
        </div>
        
      </section>
</body>
</html>