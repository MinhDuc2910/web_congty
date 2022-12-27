@extends('clients.layout.main')
@section('css')
<link href="{{asset('assets/plugins/datatables.min.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('assets/css/client/clients_ recruit/recruit.css')}}" rel="stylesheet">
<link href="{{asset('assets/css/client/newsContent/newsContent.css')}}" rel="stylesheet">
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
                        <div class="mb-4 d-inline-flex div_title">
                            <a href="{{route('clientsRecruit')}}"><p class="text-primary text_news">Tuyển dụng</p></a>
                            <p class="px-1 text_news">/</p>
                            <p class="text-muted text_news">{{$recruitDetail->title}}</p>
                        </div>
                        <div><?php echo htmlspecialchars_decode($recruitDetail->content) ?></div>
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
                    <!-- end row -->
@endsection
@section('js')
<script src="{{asset('assets/plugins/datatables.min.js')}}"></script>
@endsection