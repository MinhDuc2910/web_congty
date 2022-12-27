@extends('clients.layout.main')
@section('css')
<link href="{{asset('assets/css/client/newsContent/newsContent.css')}}" rel="stylesheet">
@endsection
@section('content')
<main>
  <section>
    <div class='content'>
        <div class="main">
          <!-- Event -->
                <div class="container">
                  <div class="row">
                    <div class="col-7">
                      <div class="mb-4 mt-3 d-inline-flex div_title">
                        <a href="{{route('home')}}"><p class="text-primary text_news">Trang chủ</p></a>
                        <p class="px-1 text_news">/</p>
                        <p class="text-muted text_news">{{$newsDetail->title}}</p>
                      </div>
                      <div><?php echo htmlspecialchars_decode($newsDetail->content) ?></div>
                    </div>
                    <div class="col-5">
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
                                                  <div class= "content-event-item-style"><?php echo substr( strip_tags($item->content),  0, 150 ).'...' ?></div>
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
        </div>
    </div>
      
<!-- Email gửi tin -->
  <!-- <div class="mt-3">
    @include('clients.layout.input_email.indext')
  </div> -->
</section>
</main>
                    <!-- end row -->
@endsection
@section('js')

@endsection