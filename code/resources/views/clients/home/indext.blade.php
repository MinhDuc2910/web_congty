@extends('clients.layout.main')
@section('css')
<link href="{{asset('assets/css/client/home/home.css')}}" rel="stylesheet">


@endsection
@section('content')
<main>
  <section>
    <div class="home_controller">
      <div class="product container-fluid my-1 owl-carousel owl-theme">
      @if (!empty($productList))
             @foreach ($productList as $key => $item)
        <div class="row  ">
              <div class="col-4">
                <div class="title_product text-uppercase">
                  <div>{{$item->name}}</div>
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
    <div class='content'>
        <div class="main">
          <div class="service_content">
            <div class="container my-1 text-center">
              <div class="row">
                <div class="col">
                  <div class="title-container">
                      <h2>Dịch vụ của chúng tôi </h2>
                  </div> 
                      <div class="service-box">
                        @if (!empty($service))
                          @foreach ($service as $key => $item)
                                <div key={content.title} class="item-style animate__animated animate__bounceInUp">
                                  <div class="box-icon">
                                      <div class="icon-style">
                                      <span class="icon mdi {{$item->icon}} "></span>
                                      </div>
                                  </div>
                                  <div class="title-item-style"> {{$item->title}}</div>
                                  <div class="content-item-style"><?php echo strip_tags($item->content) ?></div>
                              </div>
                          @endforeach
                        @endif
                  </div>
              </div>
            </div>
          </div>
          <!-- Event -->
          <div class= "event">
            <div class= "event-container">
            <div class="title-container">
                      <h2>Tin tức-Sự kiện </h2> 
                  </div>
                <div class= "event-box">
                  @if (!empty($newsList))
                        @foreach ($newsList as $key => $item)
                            <div class= "event-item-style">
                                <a href= "{{route('NewsContent',  ['id'=>$item->id])}}">
                                    <div class= "box-image">
                                        <img src="{{$item->image_path}}" class= "image" alt="" />
                                    </div>
                                    <div class= "text-box">
                                        <div class= "title-event-item-style">{{$item->title}} </div>
                                        <div class= "content-event-item-style"><?php echo substr( strip_tags($item->content),  0, 230 ).'...' ?></div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                  @endif
                </div>
            </div>
          </div>
        </div>
    </div>
      
<!-- Email gửi tin -->
  <div class="mt-3">
    @include('clients.layout.input_email.indext')
  </div>
</section>
</main>
                    <!-- end row -->
@endsection
@section('js')

@endsection