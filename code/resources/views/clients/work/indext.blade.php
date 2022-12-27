@extends('clients.layout.main')
@section('css')
<link href="{{asset('assets/css/client/work/work.css')}}" rel="stylesheet">
@endsection
@section('content')
<div class="work">
  <div class="home_controller">
        <div class="product container-fluid my-1 owl-carousel owl-theme">
        @if (!empty($eventList))
              @foreach ($eventList as $key => $item)
          <div class="row  ">
                <div class="col-4">
                  <div class="title_product text-uppercase">
                    <div>{{$item->title}}</div>
                    <span></span>
                  </div>
                </div>
                <div class="col-8">
                    <img src="{{$item->image_path}}" alt="">
                </div>
          </div>
          @endforeach
          @endif
        </div>
        <div class="input-search">
            <input type="email" placeholder="Bạn đang tìm kiếm công việc gì? " class="input ">
            <button class="icon_search">
            <span class="mdi mdi-search-web"></span>
            </button>
        </div>
  </div>
  <div class="event">
     <div class="container-fluid">
      <div class="row">
        <div class="col-4">
          <div class="box_email p-3">
          @if (session('smg'))
            <script>
                alert('Cảm ơn bạn đã gửi thông tin. Chúng tôi sẽ phản hồi lại bạn trong thời gian sớm nhất.')
            </script>
            @endif
            <form action="" class="content_email p-3" method="POST">
            @csrf
              <div class="title-content_email" >
                Nhận thông báo việc làm mới nhất
              </div>
              <div class="box_input">
              <img src="{{asset('assets/images/image_web/email-gray.svg')}}" class="icon_email animate__animated animate__tada  animate__infinite	infinite" alt="">
              <input type="email" name="email" class="input-content_email" placeholder="Nhập địa chỉ email " required value="{{old('email')}}">
              </div>
              <button type="submit" class="btn-submit">Đăng ký</button>
            </form>
          </div>
        </div>
        <div class="col-8">
        @if (!empty($eventList))
          @foreach ($eventList as $key => $item)
          <div class="container_event p-3">
            <div class="box_event p-3">
              <div class="header-box_event">
                <div class="content_event">
                  <div class="status_event">
                    Sắp diễn ra
                  </div>
                  <div class="title_event">{{$item->title}}</div>
                  <div class="content-title_event"><?php echo strip_tags($item->content) ?></div>
                </div>
                <div class="time_event">
                  <div class="location">
                    <span class="icon mdi mdi-periscope"></span>
                    Hà Nội
                  </div>
                  {{$item->time}}
                </div>
              </div>
            </div>
          </div>
          @endforeach
        @endif
        </div>
      </div>
    </div>
  </div>

  <div class="container-fluid my-5 pt-1">
  <div class="title_work">Vị trí</div>
    <div class="row">
      <div class="col-4">
        <div class="title_work_map">
          <div class="content_work">Google map</div>
        </div>
      </div>
      <div class="col-8">
        <div class="image_map w-100">
        <img src="{{asset('assets/images/image_web/map.png')}}" width = "100%" alt="">
        </div>
      </div>
    </div>
  
</div>
                    <!-- end row -->
@endsection
@section('js')
<script src="{{asset('assets/plugins/datatables.min.js')}}"></script>
@endsection