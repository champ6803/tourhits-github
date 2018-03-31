<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">

        <!-- TITLE -->
        <title>@yield('page_title')</title>

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

        <!-- REVOLUTION DEMO -->
        <link rel="stylesheet" type="text/css" href="{{ asset('revslider-demo/css/settings.css') }}">


        <!-- MAIN STYLE -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/custom_style.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/demo.css') }}">

        <!-- CSS COLOR -->
        <link id="colorreplace" rel="stylesheet" type="text/css" href="css/colors/blue.css">

        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
            <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
        <![endif]-->
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


            <!-- HEADER PAGE -->
            <header id="header-page">
                <div class="header-page__inner">
                    <div class="container">
                        <!-- LOGO -->
                        <div class="logo">
                            <a href="/"><img src="../images/logo.png" alt=""></a>
                        </div>

                        <!-- END / LOGO -->

                        <!-- NAVIGATION -->
                        <nav class="navigation awe-navigation" data-responsive="1200">
                            <ul class="menu-list">
                                <li class="menu-item-has-children">
                                    <a href="index.html">แพ็คเกจทัวร์</a>
                                    <hr class="underline-link" data-selenium="underline-link" style="width: 100%; left: 0px; opacity: 1;">
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="destinations-list.html">ทัวร์มาแรง</a>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="trip.html">สถานที่ยอดนิยม</a>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="hotel.html">เกี่ยวกับเรา</a>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="flight.html">ติดต่อเรา</a>
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
                                    <div>
                                        <a href="{{ url('login')}}">เข้าสู่ระบบ</a>
                                    </div>
                                    <div>
                                        <a href="{{ url('register')}}">สมัครสมาชิก</a>
                                    </div>
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
                            <h5 style="color:#FFFFFF;">บริษัท ทัวร์เอ็กซ์เพรสเซ็นเตอร์ดอทคอม จำกัด</h5><br>


                            เลขที่ 300/76 โครงการพรีเมี่ยมเพลส 6 ถนนนวมินทร์ แขวงนวมินทร์ เขตบึงกุ่ม กทม. 10240<br>
                            300/76 PREMIUM PLACE 6 NAWAMIN RD. NAWAMIN BUENGKUM BANGKOK THAILAND 10240<br><br>
                            Tel 0-2379-1249 Fax 0-2379-1966-7<br>
                            E-mail address : tourhits@gmail.com


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
                            <h6 style="color:#FFFFFF;"><i class="fas fa-registered"></i> เลขที่ใบอนุญาต 11/06195</h6><br>

                            <div class="widget widget_categories">
                                <!--                                <h3>Categiries</h3>
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
                            <div class="contact"
                                 <h5 style="color:#FFFFFF;">ติดต่อเรา</h5><br>
                                062 914 2361<br>
                                <i class="fab fa-facebook-square"></i>
                                <i class="fab fa-line"></i>
                                <i class="fab fa-youtube-square"></i></div>

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
                        <p>2018 Tourhits All rights reserved.</p>
                    </div>
                </div>
            </footer>
            <!-- END / FOOTER PAGE -->
        </div>
        <!-- END / PAGE WRAP -->

        <!-- LOAD JQUERY -->
        <script type="text/javascript" src="{{ asset('js/lib/jquery-1.11.2.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/lib/masonry.pkgd.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/lib/jquery.parallax-1.1.3.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/lib/jquery.owl.carousel.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/lib/theia-sticky-sidebar.js') }}"></script>
        <script type='text/javascript' src="{{ asset('js/lib/jquery-ui.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/lib/bootstrap.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/scripts.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/lib/bootstrap-slider.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/filter/search-tour.js') }}"></script>

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

        @yield('footer_scripts')

    </body>
</html>