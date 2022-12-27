@extends('clients.layout.main')
@section('css')
<link href="{{asset('assets/plugins/datatables.min.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('assets/css/client/clients_ recruit/recruit.css')}}" rel="stylesheet">
@endsection
@section('content')
<div class="wrapper">
            <div class="container">
                <div class="title-container">
                      <h2>Tuyển dụng </h2>
                </div>
                <div class="container ">
                  <div class="row">
                    <div class="col-3">
                    <div class="title">Các vị trí</div>
                        <ul class="department-menu">
                                    <li >
                                        <a href="#">Kĩ thuật</a>
                                    </li>
                                    <li key={value.id}>
                                        <a href="#">Vận hành,kiểm thử</a>
                                    </li>
                                    <li key={value.id}>
                                        <a href="#">Kinh doanh</a>
                                    </li>
                        </ul>
                    </div>
                    <div class="col-6">
                      <div class="title">Vị trí đang tuyển</div>
                        @if (!empty($recruit))
                           @foreach ($recruit as $key => $item)
                              <div class="positions-list">
                                  <div class="box-label">
                                      <span class="label">
                                      @switch($item->department)
                                                    @case(1)
                                                        <span>PHP</span>
                                                        @break
                                                
                                                    @case(2)
                                                        <span>Lập Trình. NET</span>
                                                        @break

                                                    @case(3)
                                                        <span>Javascript</span>
                                                    @break

                                                    @case(4)
                                                         <span>Mobile</span>
                                                        @break
                                                
                                                    @case(5)
                                                        <span>Lập Trình IOS</span>
                                                        @break

                                                    @case(6)
                                                        <span>Lập Trình Android</span>
                                                    @break

                                                    @case(7)
                                                        <span>Vận hành, kiểm thử</span>
                                                        @break

                                                    @case(8)
                                                        <span>Kinh Doanh</span>
                                                    @break
                                                
                                                    @default
                                                        <span>Không có dữ liệu</span>
                                                @endswitch
                                      </span>
                                      <span class="item-date">{{$item->expired_date}}</span>
                                  </div>
                                  <div class="title-position">{{$item->title}}</div>
                                  <div class="text-position"><?php echo substr( strip_tags($item->content),  0, 200 ).'...' ?></div>

                                  <div class="item-recruit">
                                      <div class="group-btn-recruit">
                                          <div class="detail">
                                              <a href="{{route('RecruitContent',  ['id'=>$item->id])}}">
                                                  <Button class="button_submit">
                                                      Chi tiết
                                                  </Button>
                                              </a>
                                          </div>

                                          <div class="register">
                                              <Button class="button_recruitment">
                                                  Ứng tuyển
                                              </Button>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          @endforeach
                        @endif
                    </div>
                    <div class="col-3">
                        <form action="" method="POST">
                        @csrf
                            <div class="title">Đăng kí nhận tin</div>
                                <div class="subscribe-form">
                                    <input type="text" name="name" class="form-control" placeholder="Nhập tên của bạn" required  value="{{old('name')}}" />
                                    <input type="email" name="email" class="form-control" placeholder="Nhập email của bạn" required value="{{old('email')}}" />

                                    <Button type="submit" class="button_submit">
                                        Đăng Ký
                                    </Button>
                                </div>
                            </div>
                        </form>
                  </div>
                </div>

            </div>   
            @if (session('msg'))
            <script>
                alert('Cảm ơn bạn đã gửi thông tin. Chúng tôi sẽ phản hồi lại bạn trong thời gian sớm nhất.')
            </script>
            @endif
            @if (session('input_email'))
            <script>
                alert('Cảm ơn bạn đã gửi thông tin. Dưới đây là một số công việc bên GGame đang tuyển dụng...')
            </script>
            @endif
            
<!-- From ứng tuyển -->

<div class="modal-container">
        <form action="" class="modal-content" method="POST" enctype ="multipart/form-data" >
          @csrf
                <div class="modal-header">
                    <button class="button-close" onClick={onClick}>
                        <span class="mdi mdi-close"></span>
                    </button>
                    <h4 class="modal-title">Form ứng tuyển </h4>
                </div>
                <div class="modal-body">
                    <div class="input">
                        <label class="input-name">Họ tên:</label>
                        <div class="box-input">
                            <input class="input-btn" type="text" name="name" placeholder="Nhập tên của bạn" required value="{{old('name')}}"/>
                        </div>
                    </div>
                    <div class="input">
                        <label class="input-name">Email:</label>
                        <div class="box-input">
                            <input
                                class="input-btn"
                                type="email"
                                name="email"
                                placeholder="Nhập email của bạn"
                                required
                                value="{{old('email')}}"
                            />
                        </div>
                    </div>
                    <div class="input">
                        <label class="input-name">Điện thoại:</label>
                        <div class="box-input">
                            <input
                                class="input-btn"
                                type="number"
                                name="phone"
                                placeholder="Nhập số điện thoại"
                                required
                                value="{{old('phone')}}"
                            />
                        </div>
                    </div>
                    <div class="input">
                        <label class="input-name">Ngày sinh:</label>
                        <div class="box-input">
                            <input
                                class="input-btn"
                                type="date"
                                name="birthday"
                                placeholder="Nhập ngày sinh của bạn"
                                required
                                value="{{old('birthday')}}"
                            />
                        </div>
                    </div>
                    <div class="input">
                        <label for="gender" class="input-name">Giới tính:</label>
                        <div class="box-input">
                            <!-- <div class="input-btn"> -->
                            <div class="form-check form-check-inline">
                              <input type="radio" name ="gender" id="male" value="male" class="form-check-input" checked required>
                              <label for="male" class="form-check-label">Nam</label>
                              </div>
                              <div class="form-check form-check-inline">
                              <input type="radio" name ="gender" id="female" value="female" class="form-check-input" required>
                              <label for="female" class="form-check-label">Nữ</label>
                              </div>
                            <!-- </div> -->

                        </div>
                    </div>
                    <div class="input">
                        <label class="input-name">File CV:</label>
                        <div class="box-input">
                            <input type="file" class="input-btn" name="cv" required></input>
                        </div>
                    </div>
                    <div class="input-submit">
                        <Button type="submit" name="submit" class="button-btn ">
                            Ứng tuyển
                        </Button>
                    </div>
                </div>
            </div>
    </form>   
</div>
                    <!-- end row -->
@endsection
@section('js')
<script src="{{asset('assets/plugins/datatables.min.js')}}"></script>
<script>
  const recruitments= document.querySelectorAll(".button_recruitment");
  const modal = document.querySelector('.modal-container');
  const modalContent= document.querySelector(".modal-content");
  const close = document.querySelector(".button-close")

    function showModal() {
      modal.classList.add('open');
    }
    function hideModal() {
      modal.classList.remove('open');
    }

      for(recruitment of recruitments) {
        recruitment.addEventListener('click', showModal);
      }

    modal.addEventListener('click', hideModal);

    close.addEventListener('click', hideModal);
    modalContent.addEventListener('click', function(event) {
      event.stopPropagation()
    });

</script>
@endsection