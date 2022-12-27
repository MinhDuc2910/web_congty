@extends('clients.layout.main')
@section('css')
<link href="{{asset('assets/css/client/introduce/introduce.css')}}" rel="stylesheet">
@endsection
@section('content')


<div class="main">
        <div class="main-container">
            <div class="box-style">
                <div class="title-container">
                    <h2>{{$titleStyle}}</h2>
                </div> 

                <div class="owl-stage-outer">
                    <div class="owl-stage owl-carousel owl-theme">
                    @if (!empty($style))
                        @foreach ($style as $key => $item)
                                <div key={content.id} class="style-container">
                                    <div class="box-style">
                                        <div class="style">
                                            <div class="icon-style">
                                                <span class="icon mdi {{$item->icon}} "></span>
                                            </div>
                                            <h2 class="title-style">{{$item->title}}</h2>
                                        </div>
                                        <div>
                                            <p class="text-style"><?php echo strip_tags($item->content) ?></p>
                                        </div>
                                    </div>
                                </div>
                        @endforeach
                    @endif       
                    </div>
                </div>
            </div>
        </div>
<!-------- Giới thiệu------ -->
        <div class="introduce ">
        <div class="main-container">
                <div class="container_introduce">
                    <div class="title-container">
                        <h2>{{$titleIntroduce}}</h2>
                    </div> 
                    <div class="d-flex flex-column pl-4">
                        @if (!empty($introduce))
                            @foreach ($introduce as $key => $item)
                                <div class="box_introduce d-inline-flex">
                                        <div class="image-block">
                                            <img src="{{$item->image_path}}" alt="" />
                                        </div>
                                        <div class="content-block">
                                            <h2>{{$item->title}}</h2>
                                            <p><?php echo strip_tags($item->content) ?></p>
                                        </div>
                                </div>
                                
                            @endforeach
                        @endif
                    </div>
                        
                </div>
        </div>
        </div>

<!-- Sản phẩm -->
        <div class="product_introduce">
            <div class="container-fluid">
    
                <div class="row ">
                    <div class="col-4 pr-2">
                        <div class="title_product_introduce">
                            <div class="title_product">Sản phẩn của GGame</div>
                            <div class="content_product">Kết nối người dùng mỗi ngày</div>
                        </div>
                    </div>
                    <div class="col-8 d-flex flex-row flex-wrap p-0">
                        @if (!empty($productList))
                            @foreach ($productList as $key => $item)
                                <div class="row row-cols-2 m-0 w-50 ">
                                    <div class="col pr-0 ">
                                        <div class="box-image_product">
                                            <img src="{{$item->image_path}}" class="image_product" alt="">
                                            <div class="detail">
                                            <div class="text_detail">{{$item->name}}</div>
                                            </div>
                                            <div class="detail_hover">
                                            <div class="text_detail mb-1">{{$item->name}}</div>
                                            <p><?php echo strip_tags($item->content) ?></p>
                                            </div>
                                        </div>
                                        
                                        <!-- <div>
                                        <img src="{{asset('assets/uploads/product')}}/{{$item->image}}" class="image_product" alt="">
                                        </div> -->
                                    </div>
                                    <!-- <div class="col pr-0">
                                        <div class="box-image_product" >
                                        <img src="{{asset('assets/images/image_web/cloud-computing.jpg')}}" class="image_product" alt="">
                                        </div>
                                        <div>
                                            <img src="{{asset('assets/images/image_web/BN.png')}}" class="image_product" alt="">
                                        </div>
                                    </div> -->
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>

            <div class="container-fluid mt-5">
    
                <div class="row ">
                    <div class="col-4 pr-2">
                        <div class="title_product_introduce">
                            <div class="content_product">Kết nối hiên tại và tương lai</div>
                        </div>
                    </div>
                    <div class="col-8 d-flex flex-row flex-wrap p-0" >
                                <div class="row  m-0 w-100 ">
                                    <div class="col pr-0 w-50">
                                        <div class="box-image_product" >
                                        <img src="{{asset('assets/images/image_web/zalo-ai.png')}}" class="image_product" alt="">
                                            <div class="detail zalo">
                                            <div class="text_detail">Zalo-ai</div>
                                            </div>
                                            <div class="detail_hover zalo_hover">
                                            <div class="text_detail mb-1">Zalo-ai</div>
                                            <p>Trợ lý tiếng Việt Kiki có thể sử dụng trên ứng dụng nghe nhạc Zing MP3, tích hợp trên xe ô tô, loa thông minh.</p>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="col pr-0 w-50">
                                        <div class="box-image_product" >
                                            <img src="{{asset('assets/images/image_web/p.png')}}" class="image_product" alt="">
                                            <div class="detail zalo">
                                            <div class="text_detail">TRUEID</div>
                                            </div>
                                            <div class="detail_hover zalo_hover">
                                            <div class="text_detail mb-1">TRUEID</div>
                                            <p>Ra mắt từ tháng 6/2020, trueID là giải pháp định danh diện tử (eKYC) "Make-in-Vietnam", được xây dựng trên nền tảng công nghệ trí tuệ nhân tạo, nhận diện gương mặt và ký tự quang học.</p>
                                            </div>
                                            </div>
                                    </div>
                                </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Con người -->
        <div class="people">
            <div class="title_product_introduce">
                <div class="title_product">Con người tại GGame</div>
            </div>
            <div class="container-fluid text-center mt-3 pb-1">
                <div class="row">
                    <div class="col-8 pl-0">
                        <img src="{{asset('assets/images/image_web/people.jpg')}}" class="image_people" alt="">
                    </div>
                    <div class="col-4 pr-0">
                        <img src="{{asset('assets/images/image_web/piclic_2.jpg')}}" class="image_people mb-3" alt="">
                        <img src="{{asset('assets/images/image_web/piclic.jpg')}}" class="image_people" alt="">
                    </div>
                </div>
            </div>

            <!-- Con người tại GGame -->
            
            <div class="container-fluid mt-3">
                <div class="row ">
                    <div class="col-4 pl-0">
                    <div class="title_product_introduce ">
                        <div class="content_product">{{$titleLife}}</div>
                    </div>
                    </div>
                    <div class="col-8 pr-0 pt-3 owl-carousel owl-theme ">
                        @if (!empty($life))
                            @foreach ($life as $key => $item)
                                <div class="life">
                                    <div class="title_life">{{$item->title}}</div>
                                    <div class="content_life"><?php echo strip_tags($item->content) ?></div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>


        </div>
<!-- Email gửi tin -->
        <div>
             @include('clients.layout.input_email.indext')
        </div>
</div>
    
                    <!-- end row -->
@endsection
@section('js')
@endsection