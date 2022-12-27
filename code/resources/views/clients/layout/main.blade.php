<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <title>Công Ty GGame</title>
  <meta content="Responsive admin theme build on top of Bootstrap 4" name="description" />
  <meta content="Themesdesign" name="author" />
  <!----Link hiệu ứng Animate------>
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"
  />
 <!-- -Morris Chart CSS -->
 <link href="{{asset('assets/css/icons.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('assets/css/icons.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('assets/css/client/header.css')}}" rel="stylesheet">
  <link href="{{asset('assets/fontawesome/css/fontawesome.min.css')}}" rel="stylesheet">

  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <!--Owl carousel -->
  <link rel="stylesheet" href="{{asset('assets/OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/OwlCarousel2-2.3.4/dist/assets//owl.theme.default.min.css')}}"> 

  @yield('css')

</head>

<body>

    <!-- Begin page -->
    <div id="wrapper">
      <!-- <header id="header" class = " shadow-sm bg-body rounded" >
        <div id="container" class = "d-flex align-items-center justify-content-around " >
          <a href="{{route('home')}}" class="h-100">
          <img class ="logo animate__animated animate__backInLeft  " src="{{asset('assets/images/image_web/logocty.png')}} " alt="">
          </a>
           </div>
          <ul class="ul_header h-100 d-flex text-uppercase align-items-center  animate__animated animate__backInDown ">
            <li class="tab "><a href= "{{route('home')}}" class="link_tab tab_home "> Trang Chủ</a></li>
            <li class="tab "><a href= "{{route('introduce')}}" class="link_tab tab_introduce ">Giới Thiệu</a></li>
            <li class="tab "><a href= "{{route('clientsRecruit')}}" class="link_tab tab_recruit <?php echo isset($tab_recruit) ? 'menu-active' : ''?>">Tuyển Dụng</a></li>
            <li class="tab "><a href= "{{route('work')}}" class="link_tab tab_work <?php echo isset($tab_work) ? 'menu-active' : ''?>">Hoạt Động</a></li>
            <li class="tab tab_image">
              <div class ="h-100">
                <img class ="img" src="https://sgcmedia.net.vn/public/images/flag_vn.png" alt="">

              </div>
            </li>
          </ul>
        </div>
      </header>  -->
  <!-- <header id="header"> -->
        <nav class="navbar navbar-expand-lg fixed-top shadow-sm bg-white p-0">
          <div class="container-fluid mx-xl-5 " style="
            height: var(--height)">
            <button class="navbar-toggler ml-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="mdi mdi-format-list-bulleted-type"></span>
            </button>
            <a class="navbar-brand h-100" href="{{route('home')}}">
              <img class ="logo animate__animated animate__backInLeft " src="{{asset('assets/images/image_web/logocty.png')}} " alt="">
            </a>
            <div class="collapse navbar-collapse justify-content-lg-end bg-white " id="navbarNav">
              <ul class="navbar-nav animate__animated animate__backInDown align-items-lg-center">
                <li class="nav-item ">
                  <a class="nav-link {{ request()->is('/') ? "menu-active" : "" }}"  href="{{route('home')}}">Trang chủ</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link {{ request()->is('Gioi-thieu') ? "menu-active" : "" }}" href="{{route('introduce')}}">Giới thiệu</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link {{ request()->is('Tuyen-dung') ? "menu-active" : "" }}" href="{{route('clientsRecruit')}}">Tuyển dụng</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link {{ request()->is('Hoat-dong') ? "menu-active" : "" }}" href="{{route('work')}}"> Hoạt động</a>
                </li>
              </ul>
            </div>
            <a herf="" class ="img_vn">
                <img class ="h-50" src="https://sgcmedia.net.vn/public/images/flag_vn.png" alt="">
            </a>
          </div>
        </nav>
  <!-- </header> -->
        
        <img class = "banner shadow bg-body rounded img-fluid" src="{{asset('assets/images/image_web/ggame.png')}}" alt="">
        <div class="image_fixed">
            <a href=""><img src="{{asset('assets/images/image_web/zalo-logo.jpg')}}" class=" animate__animated animate__headShake animate__infinite	infinite " alt=""></a>
          </div>
      <div class="content" id="content">
        
        @yield('content')
        <!-- container-fluid -->

      </div>

      <footer>
        <div class="footer">
        <div class="container pt-5">
            <div class="row">
              <div class="col-4">
                <h4 class="contact">
                  Thông tin liên hệ
                </h4>
                <div class="contact pt-2">
                <div class="icon d-inline-flex mb-2">
                 <div class="pr-2 w-100 "> 
                      <a href=""><img src="{{asset('assets/images/image_web/email.svg')}}" class="img_email " alt=""></a>
                  </div>
                  <div class="pr-2 w-100 "> 
                    <a href="https://www.facebook.com/profile.php?id=100011339335820"><img src="{{asset('assets/images/image_web/facebook.svg')}}" class="img_facebook " alt=""></a>
                  </div>
                  <div class="pr-2 w-100 "> 
                    <a href="http://"><img src="{{asset('assets/images/image_web/linkin.svg')}}" class="img_linkin " alt=""></a>
                  </div>
                  <div class="pr-2 w-100 "> 
                    <a href="http://"><img src="{{asset('assets/images/image_web/youtube.svg')}}" class="img_youtube " alt=""></a>
                  </div>
                  <div class="pr-2 w-100 "> 
                      <a href="http://"><img src="{{asset('assets/images/image_web/icon1.svg')}}" class="img_tiktok " alt=""></a>
                  </div>
                </div>
                <div class="line"></div>
              <div class="name_company text-uppercase">{{$contactList->company}}</div>

                <div class="address pt-2">
                  <div class="title_name d-inline-flex">Địa chỉ:</div>
                  <span class="">{{$contactList->address}}</span>
                </div>
                <div class="number pt-2 ">
                  <span class="title_name">Số điện thoại:</span>
                  <span class="">{{$contactList->phone}}</span>
                </div>
                <div class="email pt-2">
                  <span class="title_name">Email:</span>
                  <span class="">{{$contactList->email}}</span>
                </div>
              </div>
                  
            </div>       
              <div class="col">
              <div class ="introduce">
                <h4 class="title_introduce">
                  Về Chúng Tôi
                </h4>
                <ul class = "ul_footer">
                  <li class = "li_footer pt-2">
                    <a href= "{{route('introduce')}}" >Phong cách GGame</a>
                  </li>
                  <li class = "li_footer pt-2">
                    <a href= "{{route('introduce')}}">Giới thiệu</a>
                  </li>
                  <li class = "li_footer pt-2">
                    <a href= "{{route('introduce')}}">Sản phẩm</a>
                  </li>
                  <li class = "li_footer pt-2">
                    <a href= "{{route('home')}}">Dịch Vụ</a>
                  </li>
                </ul>
              </div>
                
              </div>
              <div class="col">
              <h4 class="recruit">
                  Tuyển Dụng
                </h4>
                <ul class = "ul_footer">
                  <li class = "li_footer pt-2">
                    <a href= "{{route('clientsRecruit')}}" >Các vị trí</a>
                  </li>
                  <li class = "li_footer pt-2">
                    <a href= "{{route('clientsRecruit')}}">Vị trí đang tuyển dụng</a>
                  </li>
                  <li class = "li_footer pt-2">
                    <a href= "{{route('clientsRecruit')}}">Đăng kí</a>
                  </li>
                  
                </ul>
              </div>
              <div class="col">
                <h4 class="work">
                  Hoạt Động
                </h4>
                <ul class = "ul_footer">
                  <li class = "li_footer pt-2">
                    <a href= "{{route('work')}}" >Hoạt động ngoại khóa</a>
                  </li>
                  <li class = "li_footer pt-2">
                    <a href= "{{route('work')}}">Hoạt động picnic</a>
                  </li>
                  <li class = "li_footer pt-2">
                    <a href= "{{route('work')}}">Bản đồ</a>
                  </li>
                  
                </ul>
              </div>
            </div>
        </div>
        <div class= "notification">
          © 2022 Ggame <span class=""> - Programmed <i class="mdi mdi-heart text-danger"></i> by Minh Duc</span>.
          </div>
      </div>

    </footer>


    </div>
</body>

@yield('js')
  <script>
    const tabs = document.querySelectorAll(".tab");
  console.log(tabs);
    tabs.forEach((tab, index) => {
      tab.onclick = function() {
        console.log(this);
        this.classList.add("menu-active");
      }
    })

  </script>
  <!--Owl carousel -->

  
  <!----------------------------------->
  <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
<!-- owl -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="{{asset('assets/OwlCarousel2-2.3.4/dist/owl.carousel.min.js')}}"></script>
<script>
  $(document).ready(function(){
  $(".owl-carousel").owlCarousel();
});
    $('.owl-carousel').owlCarousel({
      loop:true,
      margin:10,
      nav:true,
      autoplay:true,
      autoplayTimeout:3500,
      smartSpeed:1000,
      responsive:{
          0:{
              items:1
          },
          600:{
              items:1
          },
          1000:{
              items:1
          }
      }
    })
</script>

</html>