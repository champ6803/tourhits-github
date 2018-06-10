<!DOCTYPE html>
<?php
session_start();
?>
<html lang="en">
    <head>
        <meta charset="utf-8">

        <!-- TITLE -->
        <title>{{$page_title or 'Welcome To Tourhits'}}</title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="format-detection" content="telephone=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <!--CSRF Token-->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- GOOGLE FONT -->
        <link href="{{ asset('http://fonts.googleapis.com/css?family=Open+Sans:700,600,400italic,400,300') }}" rel='stylesheet' type='text/css'>
        <link href="{{ asset('http://fonts.googleapis.com/css?family=Oswald:400') }}" rel='stylesheet' type='text/css'>
        <link href="{{ asset('http://fonts.googleapis.com/css?family=Lato:400,700') }}" rel='stylesheet' type='text/css'>

        <!-- CSS LIBRARY -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/lib/bootstrap.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/fontawesome-all.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/lib/awe-booking-font.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/lib/owl.carousel.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/lib/jquery-ui.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/lib/bootstrap-slider.css') }}">
        <link rel="stylesheet" type="text/css" media="all" href="{{ asset('css/lib/daterangepicker.css') }}" />

        <!-- REVOLUTION DEMO -->
        <link rel="stylesheet" type="text/css" href="{{ asset('revslider-demo/css/settings.css') }}">


        <!-- MAIN STYLE -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/custom_style.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/demo.css') }}">

        <!-- CSS COLOR -->
        <link id="colorreplace" rel="stylesheet" type="text/css" href="{{ asset('css/colors/blue.css')}}">

        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
            <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
        <![endif]-->
        <script type="text/javascript">
            var base_path = "{{ url('/') }}";
        </script>
    </head>

    <!--[if IE 7]> <body class="ie7 lt-ie8 lt-ie9 lt-ie10"> <![endif]-->
    <!--[if IE 8]> <body class="ie8 lt-ie9 lt-ie10"> <![endif]-->
    <!--[if IE 9]> <body class="ie9 lt-ie10"> <![endif]-->
    <!--[if (gt IE 9)|!(IE)]><!--> 
    <body> <!--<![endif]-->
        <!-- PAGE WRAP -->
        <div id="page-wrap">
            <!-- PRELOADER -->
            <div class="preloader"></div>
            <!-- END / PRELOADER -->

            @if(!isset($_SESSION['role']))
            <input type="hidden" name="_token" id="role" value="">
            @else
            <input type="hidden" name="_token" id="role"
                   value="<?php echo $_SESSION['role'] ?>">
            @endif
            @if(!isset($_SESSION['customer_id']))
            <input type="hidden" name="_token" id="customer_id" value="">
            @else
            <input type="hidden" name="_token" id="customer_id"
                   value="<?php echo $_SESSION['customer_id'] ?>">
            @endif

            <!-- HEADER PAGE -->
            <header id="header-page">
                <div class="header-page__inner">
                    <div class="container">
                        <!-- LOGO -->
                        <div class="logo">
                            <a href="/"><img src="{{ asset('/images/logo.png')}}" alt=""></a>
                            <span class="cer-logo" style="font-size: 10px; color: #515050; font-weight: 900;"><i class="far fa-registered"></i> เลขที่ใบอนุญาติ 11/09305</span>
                        </div>

                        <!-- END / LOGO -->
                        <!-- NAVIGATION -->
                        <nav class="navigation awe-navigation" data-responsive="1200">
                            <ul class="menu-list">
                                <li class="menu-item-has-children">
                                    <a href="{{url('/')}}">แพ็คเกจทัวร์</a>
                                    <ul class="col-md-12 sub-menu">
                                    <div class="col-md-4 cat-asian">
<!--                                        เอเชีย-->
                                        <div class="row">
                                            <div class="pagtour-head">ทัวร์เอเชีย</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-6 col-md-6">
                                                <div class="flag"><a class="country-link new-thai-font" href="{{ URL::to('search-tour/ทัวร์ญี่ปุ่น?country=1')}}">
                                                    <img data-src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/7/Japan.png" alt="ทัวร์ญี่ปุ่น" class=" lazyloaded" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/7/Japan.png">
                                                    <h5>ญี่ปุ่น</h5></a>
                                                </div></div>
                                            <div class="col-xs-6 col-md-6">
                                                <div class="flag"><a class="country-link new-thai-font" href="{{ URL::to('search-tour/ทัวร์จีน?country=2')}}">
                                                    <img data-src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/2/China.png" alt="ทัวร์จีน" class=" lazyloaded" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/2/China.png">
                                                    <h5>จีน</h5></a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                          <div class="col-xs-6 col-md-6">
                                              <div class="flag"><a class="country-link new-thai-font" href="{{ URL::to('search-tour/ทัวร์ฮ่องกง?country=ทัวร์ฮ่องกง')}}">
                                                    <img data-src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/1/hk.png" alt="ทัวร์ฮ่องกง" class=" lazyloaded" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/1/hk.png">
                                                    <h5>ฮ่องกง</h5></a>
                                                    </div>
                                          </div>
                                          <div class="col-xs-6 col-md-6">
                                              <div class="flag"><a class="country-link new-thai-font" href="{{ URL::to('search-tour/ทัวร์พม่า?country=ทัวร์พม่า')}}">
                                                    <img data-src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/5/Myanmar.png" alt="ทัวร์พม่า" class=" lazyloaded" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/5/Myanmar.png">
                                                    <h5>พม่า</h5></a>
                                                    </div>
                                          </div>
                                          </div>
                                        
                                        <div class="row">
                                          <div class="col-xs-6 col-md-6">
                                              <div class="flag"><a class="country-link new-thai-font" href="{{ URL::to('search-tour/ทัวร์ไต้หวัน?country=ทัวร์ไต้หวัน')}}">
                                                    <img data-src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/3/Taiwan.png" alt="ทัวร์ไต้หวัน" class=" lazyloaded" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/3/Taiwan.png">
                                                    <h5>ไต้หวัน</h5></a>
                                              </div>
                                          </div>
                                          <div class="col-xs-6 col-md-6">
                                              <div class="flag"><a class="country-link new-thai-font" href="{{ URL::to('search-tour/ทัวร์เกาหลี?country=ทัวร์เกาหลี')}}">
                                                    <img data-src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/6/Korea_-South.png" alt="ทัวร์เกาหลี" class=" lazyloaded" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/6/Korea_-South.png">
                                                    <h5>เกาหลี</h5>
                                                </a>
                                              </div>
                                          </div>
                                        </div>

                                        <div class="row">
                                          <div class="col-xs-6 col-md-6">
                                              <div class="flag"><a class="country-link new-thai-font" href="{{ URL::to('search-tour/ทัวร์เวียดนาม?country=ทัวร์เวียดนาม')}}">
                                                    <img data-src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/4/Vietnam.png" alt="ทัวร์เวียดนาม" class=" lazyloaded" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/4/Vietnam.png">
                                                    <h5>เวียดนาม</h5>
                                                </a>
                                                </a>
                                              </div>
                                          </div>
                                          <div class="col-xs-6 col-md-6">
                                              <div class="flag"><a class="country-link new-thai-font" href="{{ URL::to('search-tour/ทัวร์สิงคโปร์?country=ทัวร์สิงคโปร์')}}">
                                                    <img data-src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/20/flag-8245b0bd45694a88fd7e5e7ed33d107f.png" alt="ทัวร์สิงคโปร์" class=" lazyloaded" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/20/flag-8245b0bd45694a88fd7e5e7ed33d107f.png">
                                                    <h5>สิงคโปร์</h5>
                                                </a>
                                              </div>
                                          </div>
                                        </div>

                                        <div class="row">
                                          <div class="col-xs-6 col-md-6">
                                              <div class="flag"><a class="country-link new-thai-font" href="{{ URL::to('search-tour/ทัวร์ลาว?country=ทัวร์ลาว')}}">
                                                    <img data-src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/17/flag-c7f2a38f7d72e522fcead06f80a1398a.png" alt="ทัวร์ลาว" class=" lazyloaded" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/17/flag-c7f2a38f7d72e522fcead06f80a1398a.png">
                                                    <h5>ลาว</h5>
                                                </a>
                                              </div>
                                          </div>
                                          <div class="col-xs-6 col-md-6">
                                              <div class="flag"><a class="country-link new-thai-font" href="{{ URL::to('search-tour/ทัวร์มาเก๊า?country=ทัวร์มาเก๊า')}}">
                                                    <img data-src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/19/flag-78466a7246df011b11fce95a279c3194.png" alt="ทัวร์มาเก๊า" class=" lazyloaded" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/19/flag-78466a7246df011b11fce95a279c3194.png">
                                                    <h5>มาเก๊า</h5>
                                                </a>
                                              </div>
                                          </div>
                                        </div>

                                        <div class="row">
                                          <div class="col-xs-6 col-md-6">
                                              <div class="flag"><a class="country-link new-thai-font" href="/india-tour">
                                                    <img data-src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/33/flag.png" alt="ทัวร์อินเดีย " class=" lazyloaded" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/33/flag.png">
                                                    <h5>อินเดีย</h5>
                                                </a>
                                              </div>
                                          </div>
                                          <div class="col-xs-6 col-md-6">
                                              <div class="flag"><a class="country-link new-thai-font" href="/indonesia-tour">
                                                    <img data-src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/31/flag-543fdf03ab4bebee967a4fbea54641df.png" alt="ทัวร์อินโดนีเซีย" class=" lazyloaded" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/31/flag-543fdf03ab4bebee967a4fbea54641df.png">
                                                    <h5>อินโดนีเซีย</h5>
                                                </a>
                                              </div>
                                          </div>
                                        </div>

                                        <div class="row">
                                          <div class="col-xs-6 col-md-6">
                                              <div class="flag"><a class="country-link new-thai-font" href="/malaysia-tour">
                                                    <img data-src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/24/flag-88fd654746468f70e78ecd3620d7f849.png" alt="ทัวร์มาเลเซีย" class=" lazyloaded" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/24/flag-88fd654746468f70e78ecd3620d7f849.png">
                                                    <h5>มาเลเซีย</h5>
                                                </a>
                                              </div>
                                          </div>
                                          <div class="col-xs-6 col-md-6">
                                              <div class="flag"><a class="country-link new-thai-font" href="/brunei-tour">
                                                    <img data-src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/23/flag-86cdb83634a2d29b56ea20c9a66789fa.png" alt="ทัวร์บรูไน" class=" lazyloaded" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/23/flag-86cdb83634a2d29b56ea20c9a66789fa.png">
                                                    <h5>บรูไน</h5>
                                                </a>
                                              </div>
                                          </div>
                                        </div>

                                        <div class="row">
                                          <div class="col-xs-6 col-md-6">
                                              <div class="flag"><a class="country-link new-thai-font" href="/cambodia-tour">
                                                    <img data-src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/21/flag.png" alt="ทัวร์กัมพูชา" class=" lazyloaded" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/21/flag.png">
                                                    <h5>กัมพูชา</h5>
                                                </a>
                                              </div>
                                          </div>
                                          <div class="col-xs-6 col-md-6">
                                              <div class="flag"><a class="country-link new-thai-font" href="/nepal-tour">
                                                    <img data-src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/34/flag.png" alt="ทัวร์เนปาล" class=" lazyloaded" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/34/flag.png">
                                                    <h5>เนปาล</h5>
                                                </a>
                                              </div>
                                          </div>
                                        </div>
<!--                                        เอเชีย-->





                                    </div>
                                    </ul>
<!--                                    <ul class="sub-menu">
                                        <li><a href="index.html">Home 1</a></li>
                                        <li class="current-menu-item"><a href="index2.html">Home 2</a></li>
                                        <li><a href="index3.html">Menu hamburger</a></li>
                                        <li><a href="index-dark.html">Home 1 (Dark)</a></li>
                                        <li><a href="index2-dark.html">Home 2 (Dark)</a></li>
                                        <li><a href="index3-dark.html">Menu hamburger (Dark)</a></li>
                                    </ul>
                                    <hr id="indx" class="underline-link" data-selenium="underline-link" style="width: 100%; left: 0px; opacity: 1;">-->
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="{{ url('tourhot')}}">ทัวร์มาแรง</a>
                                    <hr id="tourhot" class="underline-link" data-selenium="underline-link" style="width: 100%; left: 0px; opacity: 1;">
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="{{ url('hothits') }}">สถานที่ยอดฮิต</a>
                                    <hr id="hothits" class="underline-link" data-selenium="underline-link" style="width: 100%; left: 0px; opacity: 1;">
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="{{ url('about') }}">เกี่ยวกับเรา</a>
                                    <hr id="about" class="underline-link" data-selenium="underline-link" style="width: 100%; left: 0px; opacity: 1;">
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="{{ url('contact') }}">ติดต่อเรา</a>
                                    <hr id="contact" class="underline-link" data-selenium="underline-link" style="width: 100%; left: 0px; opacity: 1;">
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="{{ url('blog') }}">บทความ</a>
                                    <hr id="blog" class="underline-link" data-selenium="underline-link" style="width: 100%; left: 0px; opacity: 1;">
                                </li>
                                <!--                                <li class="menu-item-has-children">
                                                                    <a href="{{ url('login')}}">เข้าสู่ระบบ</a>
                                                                </li>-->

                            </ul>

                        </nav>
                        <!-- END / NAVIGATION -->

                        <!-- SEARCH BOX -->
                        <div class="search-box">
                            <span class="searchtoggle"><i class="fas fa-user"></i></span>

                            <form class="form-search">
                                <div class="form-item">
                                    @if(!isset($_SESSION['m_user']))
                                    <input type="hidden" name="_token" id="m_user" value="">
                                    <div>
                                        <a href="{{ url('login')}}">เข้าสู่ระบบ</a>
                                    </div>
                                    <div>
                                        <a href="{{ url('register')}}">สมัครสมาชิก</a>
                                    </div>
                                    @else
                                    <?php
                                    $now = time(); // Checking the time now when home page starts.
                                    if ($now > $_SESSION['expire']) {
                                        session_destroy();
                                        ?>
                                        <div>
                                            <a href="{{ url('login')}}">เข้าสู่ระบบ</a>
                                        </div>
                                        <div>
                                            <a href="{{ url('register')}}">สมัครสมาชิก</a>
                                        </div>
                                    <?php } else { //Starting this else one [else1]
                                        ?>
                                        <input type="hidden" name="_token" id="m_user" value="<?php echo $_SESSION['m_user'] ?>">
                                        <div>
                                            ยินดีต้อนรับ <?php echo $_SESSION['m_user'] ?>
                                        </div>
                                        <div>
                                            <a href="{{url('logout')}}">ออกจากระบบ</a>
                                        </div>
                                    <?php } ?>

                                    @endif
                                </div>
                            </form>
                        </div>

                        <!-- END / SEARCH BOX -->


                        <!-- TOGGLE MENU RESPONSIVE -->
                        <a class="toggle-menu-responsive" href="#">
                            <div class="hamburger">
                                <span class="item item-1"></span>
                                <span class="item item-2"></span>
                                <span class="item item-3"></span>
                            </div>
                        </a>
                        <!-- END / TOGGLE MENU RESPONSIVE -->
                    </div>
                </div>
            </header>
            <!-- END / HEADER PAGE -->

            <!-- MAIN CONTENT START -->
            <div class="main-content">
                @yield('main-content')
                <!--//-->
            </div>
            <!-- MAIN CONTENT END -->

            <!-- FOOTER PAGE -->

            <footer id="footer-page">
                <div class="container">
                    <div class="row">
                        <!-- WIDGET -->
                        <div class="col-md-3">
                             
                            <div class="foot-location-head">
                                บริษัท ทัวร์ฮิตส์ จำกัด<br>
                            
                            </div>
                            <div class="foot-location-detail"> 
                                เลขที่ 300/76 โครงการพรีเมี่ยมเพลส 6<br>
                                ถนนนวมินทร์ แขวงนวมินทร์<br> 
                                เขตบึงกุ่ม กรุงเทพฯ 10240<br>                               
                                โทร: 0-2379-1249<br>
                                Fax: 0-2379-1966-7<br>
                                E-mail:<a href="mailto:tourhits@gmail.com" style="color:#7F7FF5;"> tourhits@gmail.com</a><br>
                                
                            </div>    

                            <!--                            <div class="widget widget_contact_info">
                                                            <div class="widget_background">
                                                                <div class="widget_background__half">
                                                                    <div class="bg"></div>
                                                                </div>
                                                                <div class="widget_background__half">
                                                                    <div class="bg"></div>
                                                                </div>
                                                            </div>
                                                            <div class="logo">
                                                                <img src="images/logo.png" alt="">
                                                            </div>
                                                            <div class="widget_content">
                                                                <p>25 California Avenue, Santa Monica, California. USA</p>
                                                                <p>+1-888-8765-1234</p>
                                                                <a href="#">contact@gofar.com</a>
                                                            </div>
                                                        </div>-->
                        </div>
                        <!-- END / WIDGET -->

                        <!-- WIDGET -->
                        <div class="col-md-2">
                            <div class="widget widget_about_us">
                                <!--                                <h3>About Us</h3>
                                                                <div class="widget_content">
                                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum vel dignissim dolor. Ut risus orci, aliquam sit amet semper eget, egestas aliquam felis.</p>
                                                                </div>-->
                            </div>
                        </div>
                        <!-- END / WIDGET -->

                        <!-- WIDGET -->
                        <div class="col-md-2">
                            

                            <div class="widget widget_categories">
<!--                                                                <h3>Categiries</h3>
                                                                <ul>
                                                                    <li><a href="#">Countries</a></li>
                                                                    <li><a href="#">Regions</a></li>
                                                                    <li><a href="#">Cities</a></li>
                                                                    <li><a href="#">Districts</a></li>
                                                                    <li><a href="#">Countries</a></li>
                                                                    <li><a href="#">Airports</a></li>
                                                                    <li><a href="#">Hotels</a></li>
                                                                    <li><a href="#">Places of interest</a></li>
                                                                </ul>-->
                            </div>
                        </div>
                        <!-- END / WIDGET -->

                        <!-- WIDGET -->
                        <div class="col-md-2">
                            <div class="widget widget_recent_entries">
                                <!--                                <h3>Recent Blog</h3>
                                                                <ul>
                                                                    <li><a href="#">Countries</a></li>
                                                                    <li><a href="#">Regions</a></li>
                                                                    <li><a href="#">Cities</a></li>
                                                                    <li><a href="#">Districts</a></li>
                                                                    <li><a href="#">Countries</a></li>
                                                                    <li><a href="#">Airports</a></li>
                                                                    <li><a href="#">Hotels</a></li>
                                                                    <li><a href="#">Places of interest</a></li>
                                                                </ul>-->
                            </div>
                        </div>
                        <!-- END / WIDGET -->
                          
                        <!-- WIDGET -->
                        <div class="col-md-3">
                            <!-- facebook -->
                            <div class="row facebook">
                                <div class="fb-page" 
                                    data-href="https://www.facebook.com/page.tourhits"
                                    data-width="349" 
                                    data-hide-cover="false"
                                    data-show-facepile="false"></div>         
                            </div>
                            <div class="contact"
                                 <h3 style="color:#FFFFFF;"><ins>ติดต่อเรา</ins><br>
                                <i class="fas fa-mobile-alt"></i> 062 914 2361<br>
                                <i class="fab fa-facebook-square"></i>
                                <i class="fab fa-line"></i>
                                <i class="fab fa-youtube-square"></i>
                                
                            </div>

                            <div class="widget widget_follow_us">
                                <div class="widget_content">
        <!--                                    <p>Test</p>
                                    <span class="phone">099-099-000</span>
                                    <div class="awe-social">
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                        <a href="#"><i class="fa fa-youtube-play"></i></a>
                                    </div>-->
                                </div>
                            </div>
                        </div>
                        <!-- END / WIDGET -->
                    </div>
                    <div class="copyright">
                        <h6 style="color:#FFFFFF;"><i class="fas fa-registered"></i> เลขที่ใบอนุญาต 11/09305</h6>
                        <p>2018 Tourhits All rights reserved.</p>
                    </div>
                </div>
            </footer>
            <!-- END / FOOTER PAGE -->
        </div>
        <!-- END / PAGE WRAP -->
                                <div id="fb-root"></div>
                                    <script>(function(d, s, id) {
                                      var js, fjs = d.getElementsByTagName(s)[0];
                                      if (d.getElementById(id)) return;
                                      js = d.createElement(s); js.id = id;
                                      js.src = 'https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v3.0';
                                      fjs.parentNode.insertBefore(js, fjs);
                                      }(document, 'script', 'facebook-jssdk'));
                                    </script>
        <!-- LOAD JQUERY -->
        <script type="text/javascript" src="{{ asset('js/lib/jquery-1.11.2.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/lib/masonry.pkgd.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/lib/jquery.parallax-1.1.3.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/lib/jquery.owl.carousel.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/lib/theia-sticky-sidebar.js') }}"></script>
        <script type='text/javascript' src="{{ asset('js/lib/jquery-ui.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/lib/bootstrap.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/lib/bootstrap-slider.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/lib/pagination.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/lib/moment.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/lib/daterangepicker.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/lib/AutoNumeric.js') }}"></script>
        <script type="text/javascript">
            $(function () {
                $('.underline-link').removeClass('menu-active');
            });
        </script>

        <script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
        <!--footer scripts-->
        @yield('footer_scripts')
        <script type="text/javascript" src="{{ asset('js/scripts.js') }}"></script>
        <!-- REVOLUTION DEMO -->
        <script type="text/javascript" src="{{ asset('revslider-demo/js/jquery.themepunch.revolution.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('revslider-demo/js/jquery.themepunch.tools.min.js') }}"></script>
        <script type="text/javascript">
            if ($('#slider-revolution').length) {
                $('#slider-revolution').show().revolution({
                    ottedOverlay: "none",
                    delay: 10000,
                    startwidth: 1600,
                    startheight: 448,
                    hideThumbs: 200,

                    thumbWidth: 100,
                    thumbHeight: 50,
                    thumbAmount: 5,

                    simplifyAll: "off",

                    navigationType: "none",
                    navigationArrows: "solo",
                    navigationStyle: "preview4",

                    touchenabled: "on",
                    onHoverStop: "on",
                    nextSlideOnWindowFocus: "off",

                    swipe_threshold: 0.7,
                    swipe_min_touches: 1,
                    drag_block_vertical: false,

                    parallax: "mouse",
                    parallaxBgFreeze: "on",
                    parallaxLevels: [7, 4, 3, 2, 5, 4, 3, 2, 1, 0],

                    keyboardNavigation: "off",

                    navigationHAlign: "center",
                    navigationVAlign: "bottom",
                    navigationHOffset: 0,
                    navigationVOffset: 20,

                    soloArrowLeftHalign: "left",
                    soloArrowLeftValign: "center",
                    soloArrowLeftHOffset: 20,
                    soloArrowLeftVOffset: 0,

                    soloArrowRightHalign: "right",
                    soloArrowRightValign: "center",
                    soloArrowRightHOffset: 20,
                    soloArrowRightVOffset: 0,

                    shadow: 0,
                    fullWidth: "on",
                    fullScreen: "off",

                    spinner: "spinner2",

                    stopLoop: "off",
                    stopAfterLoops: -1,
                    stopAtSlide: -1,

                    shuffle: "off",

                    autoHeight: "off",
                    forceFullWidth: "off",

                    hideThumbsOnMobile: "off",
                    hideNavDelayOnMobile: 1500,
                    hideBulletsOnMobile: "off",
                    hideArrowsOnMobile: "off",
                    hideThumbsUnderResolution: 0,

                    hideSliderAtLimit: 0,
                    hideCaptionAtLimit: 0,
                    hideAllCaptionAtLilmit: 0,
                    startWithSlide: 0
                });
            }
        </script>
    </body>
</html>