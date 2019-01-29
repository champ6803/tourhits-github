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
        <link href="{{ asset('https://fonts.googleapis.com/css?family=Kanit|Bai+Jamjuree') }}" rel="stylesheet">


        <!-- CSS LIBRARY -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/lib/bootstrap.css') }}">
        <!--<link rel="stylesheet" type="text/css" href="{{ asset('css/fontawesome-all.css') }}">-->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/lib/awe-booking-font.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/lib/owl.carousel.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/lib/jquery-ui.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/lib/slider.css') }}">
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
        @yield('meta_tag')
    </head>

    <!--[if IE 7]> <body class="ie7 lt-ie8 lt-ie9 lt-ie10"> <![endif]-->
    <!--[if IE 8]> <body class="ie8 lt-ie9 lt-ie10"> <![endif]-->
    <!--[if IE 9]> <body class="ie9 lt-ie10"> <![endif]-->
    <!--[if (gt IE 9)|!(IE)]><!--> 
    <body> <!--<![endif]-->
        <!-- PAGE WRAP -->
        <div id="page-wrap">
            <!-- PRELOADER -->
            <!--<div class="preloader"></div>-->
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
                <div class="main-header hidden-xs hidden-sm">
                    <div class="container">
                        <div class="col-md-3">
                            <span class="cer-logo"><i class="far fa-registered"></i> เลขที่ใบอนุญาติ 11/09305</span>               
                        </div>

                        <div class="col-md-9">

                            <div class="work-time-line">
                                <a href="http://line.me/ti/p/%40tourhits" target="_blank" rel="noopener noreferrer" class="" data-line-link=""><img src="{{ asset('/images/logo-line-2.png')}}"> @Tourhits</a>        
                            </div>
                            <div class="work-time-tel">
                                <span><i class="fas fa-phone"></i> 02-379-1249</span>
                            </div>                
                            <div class="work-time2">
                                <span class="line-1">จ-ศ. เวลา 09.00-18.00 น.</span>
                                <span class="line-2">วันเสาร์ เวลา 09.00-16.00 น.</span>
                            </div>
                            <div class="work-time1">
                                <span class="main-text-time">เวลาทำการ |</span>
                            </div>
                        </div>
                    </div>
                </div>     
                <div class="header-page__inner">
                    <div class="container">
                        <!-- LOGO -->
                        <div class="logo">
                            <a href="/"><img src="{{ asset('/images/logo-old.png')}}" alt=""></a>
                        </div>

                        <!-- END / LOGO -->
                        <!-- NAVIGATION -->
                        <nav class="navigation awe-navigation" data-responsive="1200">
                            <ul class="menu-list">
                                <li class="menu-item-has-children">
                                    <a href="{{ url('/')}}">หน้าแรก</a>
                                    <hr id="home" class="underline-link" data-selenium="underline-link" style="width: 50%; left: 25%;">
                                </li>
                                <li class="menu-item-has-children">
                                    <a>แพ็คเกจทัวร์</a>
                                    <hr id="package_tour" class="underline-link" data-selenium="underline-link" style="width: 50%; left: 25%;">
                                    <ul class="col-md-12 sub-menu">
                                        <div class="col-md-4 cat-asian cat-line">
                                            <!--                                        เอเชีย-->
                                            <div class="row">
                                                <div class="pagtour-head">ทัวร์เอเชีย</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-6 col-md-6">
                                                    <div class="flag"><a class="country-link new-thai-font" href="{{ URL::to('tour/japan?country=2')}}">
                                                            <img data-src="../images/flags/Japan.png" alt="ทัวร์ญี่ปุ่น" class=" lazyloaded" src="{{ asset('/images/flags/Japan.png') }}">
                                                            <h5>ญี่ปุ่น</h5></a>
                                                    </div></div>
                                                <div class="col-xs-6 col-md-6">
                                                    <div class="flag"><a class="country-link new-thai-font" href="{{ URL::to('tour/china?country=7')}}">
                                                            <img data-src="../images/flags/China.png" alt="ทัวร์จีน" class=" lazyloaded" src="{{ asset('/images/flags/China.png')}}">
                                                            <h5>จีน</h5></a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-xs-6 col-md-6">
                                                    <div class="flag"><a class="country-link new-thai-font" href="{{ URL::to('tour/hongkong?country=0')}}">
                                                            <img data-src="../images/flags/hk.png" alt="ทัวร์ฮ่องกง" class=" lazyloaded" src="{{ asset('/images/flags/hk.png')}}">
                                                            <h5>ฮ่องกง</h5></a>
                                                    </div>
                                                </div>
                                                <div class="col-xs-6 col-md-6">
                                                    <div class="flag"><a class="country-link new-thai-font" href="{{ URL::to('tour/myanmar?country=12')}}">
                                                            <img data-src="../images/flags/Myanmar.png" alt="ทัวร์พม่า" class=" lazyloaded" src="{{ asset('/images/flags/Myanmar.png')}}">
                                                            <h5>พม่า</h5></a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-xs-6 col-md-6">
                                                    <div class="flag"><a class="country-link new-thai-font" href="{{ URL::to('tour/taiwan?country=8')}}">
                                                            <img data-src="../images/flags/Taiwan.png" alt="ทัวร์ไต้หวัน" class=" lazyloaded" src="{{ asset('/images/flags/Taiwan.png')}}">
                                                            <h5>ไต้หวัน</h5></a>
                                                    </div>
                                                </div>
                                                <div class="col-xs-6 col-md-6">
                                                    <div class="flag"><a class="country-link new-thai-font" href="{{ URL::to('tour/korea?country=3')}}">
                                                            <img data-src="../images/flags/South_Korea.png" alt="ทัวร์เกาหลี" class=" lazyloaded" src="{{ asset('/images/flags/South_Korea.png')}}">
                                                            <h5>เกาหลี</h5>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-xs-6 col-md-6">
                                                    <div class="flag"><a class="country-link new-thai-font" href="{{ URL::to('tour/vietnam?country=9')}}">
                                                            <img data-src="../images/flags/Vietnam.png" alt="ทัวร์เวียดนาม" class=" lazyloaded" src="{{ asset('/images/flags/Vietnam.png')}}">
                                                            <h5>เวียดนาม</h5>
                                                        </a>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-xs-6 col-md-6">
                                                    <div class="flag"><a class="country-link new-thai-font" href="{{ URL::to('tour/singapore?country=10')}}">
                                                            <img data-src="../images/flags/Singapore.png" alt="ทัวร์สิงคโปร์" class=" lazyloaded" src="{{ asset('/images/flags/Singapore.png')}}">
                                                            <h5>สิงคโปร์</h5>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-xs-6 col-md-6">
                                                    <div class="flag"><a class="country-link new-thai-font" href="{{ URL::to('tour/laos?country=15')}}">
                                                            <img data-src="../images/flags/Laos.png" alt="ทัวร์ลาว" class=" lazyloaded" src="{{ asset('/images/flags/Laos.png')}}">
                                                            <h5>ลาว</h5>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-xs-6 col-md-6">
                                                    <div class="flag"><a class="country-link new-thai-font" href="{{ URL::to('tour/macau?country=0')}}">
                                                            <img data-src="../images/flags/Macau.png" alt="ทัวร์มาเก๊า" class=" lazyloaded" src="{{ asset('/images/flags/Macau.png')}}">
                                                            <h5>มาเก๊า</h5>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-xs-6 col-md-6">
                                                    <div class="flag"><a class="country-link new-thai-font" href="{{ URL::to('tour/india?country=0')}}">
                                                            <img data-src="../images/flags/India.png" alt="ทัวร์อินเดีย " class=" lazyloaded" src="{{ asset('/images/flags/India.png')}}">
                                                            <h5>อินเดีย</h5>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-xs-6 col-md-6">
                                                    <div class="flag"><a class="country-link new-thai-font" href="{{ URL::to('tour/indonesia?country=0')}}">
                                                            <img data-src="../images/flags/Indonesia.png" alt="ทัวร์อินโดนีเซีย" class=" lazyloaded" src="{{ asset('/images/flags/Indonesia.png')}}">
                                                            <h5>อินโดนีเซีย</h5>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-xs-6 col-md-6">
                                                    <div class="flag"><a class="country-link new-thai-font" href="{{ URL::to('tour/malaysia?country=14')}}">
                                                            <img data-src="../images/flags/Malaysia.png" alt="ทัวร์มาเลเซีย" class=" lazyloaded" src="{{ asset('/images/flags/Malaysia.png')}}">
                                                            <h5>มาเลเซีย</h5>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-xs-6 col-md-6">
                                                    <div class="flag"><a class="country-link new-thai-font" href="{{ URL::to('tour/brunei?country=0')}}">
                                                            <img data-src="../images/flags/Brunei.png" alt="ทัวร์บรูไน" class=" lazyloaded" src="{{ asset('/images/flags/Brunei.png')}}">
                                                            <h5>บรูไน</h5>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-xs-6 col-md-6">
                                                    <div class="flag"><a class="country-link new-thai-font" href="/cambodia-tour">
                                                            <img data-src="../images/flags/Cambodia.png" alt="ทัวร์กัมพูชา" class=" lazyloaded" src="{{ asset('/images/flags/Cambodia.png')}}">
                                                            <h5>กัมพูชา</h5>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-xs-6 col-md-6">
                                                    <div class="flag"><a class="country-link new-thai-font" href="/nepal-tour">
                                                            <img data-src="../images/flags/Nepal.png" alt="ทัวร์เนปาล" class=" lazyloaded" src="{{ asset('/images/flags/Nepal.png')}}">
                                                            <h5>เนปาล</h5>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>    
                                        <!--                                        เอเชีย-->
                                        <!--                                        ยุโรป-->
                                        <div class="col-md-4 cat-asian cat-line">
                                            <div class="row">
                                                <div class="pagtour-head">ทัวร์ยุโรป</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-6 col-md-6">
                                                    <div class="flag"><a class="country-link new-thai-font" href="{{ URL::to('tour/europe?country=11')}}">
                                                            <img style="border-radius: 4px;" data-src="../images/flags/eu-flag.png" alt="ทัวร์ยุโรป" class=" lazyloaded" src="{{ asset('/images/flags/eu-flag.png')}}">
                                                            <h5>ยุโรป</h5>
                                                        </a>
                                                    </div>                                                    
                                                </div>
                                                <div class="col-xs-6 col-md-6">
                                                    <div class="flag"><a class="country-link new-thai-font" href="{{ URL::to('tour/europe-east?country=26')}}">
                                                            <img style="border-radius: 4px;" data-src="../images/flags/eu.png" alt="ทัวร์ยุโรปตะวันออก" class=" lazyloaded" src="{{ asset('/images/flags/eu.png')}}">
                                                            <h5 style="font-size: 13px;">ยุโรปตะวันออก</h5>
                                                        </a>
                                                    </div>                                                    
                                                </div>       
                                            </div>

                                            <div class="row">
                                                <div class="col-xs-6 col-md-6">
                                                    <div class="flag"><a class="country-link new-thai-font" href="{{ URL::to('tour/italy?country=0')}}">
                                                            <img data-src="../images/flags/Italy.png" alt="ทัวร์อิตาลี" class=" lazyloaded" src="{{ asset('/images/flags/Italy.png')}}">
                                                            <h5>อิตาลี</h5>
                                                        </a>
                                                    </div></div>
                                                <div class="col-xs-6 col-md-6">
                                                    <div class="flag"><a class="country-link new-thai-font" href="{{ URL::to('tour/austria?country=0')}}">
                                                            <img data-src="../images/flags/Austria.png" alt="ทัวร์ออสเตรีย" class=" lazyloaded" src="{{ asset('/images/flags/Austria.png')}}">
                                                            <h5>ออสเตรีย</h5>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-xs-6 col-md-6">
                                                    <div class="flag"><a class="country-link new-thai-font" href="{{ URL::to('tour/france?country=0')}}">
                                                            <img data-src="../images/flags/France.png" alt="ทัวร์ฝรั่งเศส" class=" lazyloaded" src="{{ asset('/images/flags/France.png')}}">
                                                            <h5>ฝรั่งเศส</h5>
                                                        </a>
                                                    </div></div>
                                                <div class="col-xs-6 col-md-6">
                                                    <div class="flag"><a class="country-link new-thai-font" href="{{ URL::to('tour/switzerland?country=0')}}">
                                                            <img data-src="../images/flags/Switzerland.png" alt="ทัวร์สวิส" class=" lazyloaded" src="{{ asset('/images/flags/Switzerland.png')}}">
                                                            <h5>สวิส</h5>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-xs-6 col-md-6">
                                                    <div class="flag"><a class="country-link new-thai-font" href="{{ URL::to('tour/germany?country=0')}}">
                                                            <img data-src="../images/flags/Germany.png" alt="ทัวร์เยอรมัน" class=" lazyloaded" src="{{ asset('/images/flags/Germany.png')}}">
                                                            <h5>เยอรมัน</h5>
                                                        </a>
                                                    </div></div>
                                                <div class="col-xs-6 col-md-6">
                                                    <div class="flag"><a class="country-link new-thai-font" href="{{ URL::to('tour/spain?country=0')}}">
                                                            <img data-src="../images/flags/Spain.png" alt="ทัวร์สเปน" class=" lazyloaded" src="{{ asset('/images/flags/Spain.png')}}">
                                                            <h5>สเปน</h5>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-xs-6 col-md-6">
                                                    <div class="flag"><a class="country-link new-thai-font" href="{{ URL::to('tour/finland?country=0')}}">
                                                            <img data-src="../images/flags/Finland.png" alt="ทัวร์ฟินแลนด์" class=" lazyloaded" src="{{ asset('/images/flags/Finland.png')}}">
                                                            <h5>ฟินแลนด์</h5>
                                                        </a>
                                                    </div></div>
                                                <div class="col-xs-6 col-md-6">
                                                    <div class="flag"><a class="country-link new-thai-font" href="{{ URL::to('tour/netherlands?country=0')}}">
                                                            <img data-src="../images/flags/Netherlands.png" alt="ทัวร์เนเธอร์แลนด์" class=" lazyloaded" src="{{ asset('/images/flags/Netherlands.png')}}">
                                                            <h5>เนเธอร์แลนด์</h5>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-xs-6 col-md-6">
                                                    <div class="flag"><a class="country-link new-thai-font" href="{{ URL::to('tour/poland?country=0')}}">
                                                            <img data-src="../images/flags/Poland.png" alt="ทัวร์โปแลนด์" class=" lazyloaded" src="{{ asset('/images/flags/Poland.png')}}">
                                                            <h5>โปแลนด์</h5>
                                                        </a>
                                                    </div></div>
                                                <div class="col-xs-6 col-md-6">
                                                    <div class="flag"><a class="country-link new-thai-font" href="{{ URL::to('tour/croatia?country=0')}}">
                                                            <img data-src="../images/flags/Croatia.png" alt="ทัวร์โครเอเชีย" class=" lazyloaded" src="{{ asset('/images/flags/Croatia.png')}}">
                                                            <h5>โครเอเชีย</h5>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-xs-6 col-md-6">
                                                    <div class="flag"><a class="country-link new-thai-font" href="{{ URL::to('tour/england?country=0')}}">
                                                            <img data-src="../images/flags/England.png" alt="ทัวร์อังกฤษ" class=" lazyloaded" src="{{ asset('/images/flags/England.png')}}">
                                                            <h5>อังกฤษ</h5>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-xs-6 col-md-6">
                                                    <div class="flag"><a class="country-link new-thai-font" href="{{ URL::to('tour/russia?country=0')}}">
                                                            <img data-src="../images/flags/Russia.png" alt="ทัวร์รัสเซีย" class=" lazyloaded" src="{{ asset('/images/flags/Russia.png')}}">
                                                            <h5>รัสเซีย</h5>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-xs-6 col-md-6">
                                                    <div class="flag"><a class="country-link new-thai-font" href="{{ URL::to('tour/scandinavia?country=27')}}">
                                                            <img style="border-radius: 4px;" data-src="../images/flags/scandinavia.png" alt="ทัวร์สแกนดิเนเวีย" class=" lazyloaded" src="{{ asset('/images/flags/scandinavia.png')}}">
                                                            <h5>สแกนดิเนเวีย</h5>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>    
                                        </div>    
                                        <!--                                        ยุโรป-->
                                        <!--                                        ทวีปอื่นๆ-->
                                        <div class="col-md-4 cat-asian">
                                            <div class="row">
                                                <div class="pagtour-head">ทัวร์ทวีปอื่นๆ</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-6 col-md-6">
                                                    <div class="flag"><a class="country-link new-thai-font" href="{{ URL::to('tour/maldives?country=0')}}">
                                                            <img data-src="../images/flags/Maldives.png" alt="ทัวร์มัลดีฟส์" class=" lazyloaded" src="{{ asset('/images/flags/Maldives.png')}}">
                                                            <h5>มัลดีฟส์</h5></a>
                                                    </div>                                                    
                                                </div>
                                                <div class="col-xs-6 col-md-6">
                                                    <div class="flag"><a class="country-link new-thai-font" href="{{ URL::to('tour/dubai?country=17')}}">
                                                            <img data-src="../images/flags/United-Arab-Emirates.png" alt="ทัวร์ดูไบ" class=" lazyloaded" src="{{ asset('/images/flags/United-Arab-Emirates.png')}}">
                                                            <h5>ดูไบ</h5></a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-xs-6 col-md-6">
                                                    <div class="flag"><a class="country-link new-thai-font" href="{{ URL::to('tour/australia?country=0')}}">
                                                            <img data-src="../images/flags/Australia.png" alt="ทัวร์ออสเตรเลีย" class=" lazyloaded" src="{{ asset('/images/flags/Australia.png')}}">
                                                            <h5>ออสเตรเลีย</h5></a>
                                                    </div>                                                    
                                                </div>
                                                <div class="col-xs-6 col-md-6">
                                                    <div class="flag"><a class="country-link new-thai-font" href="{{ URL::to('tour/egypt?country=23')}}">
                                                            <img data-src="../images/flags/Egypt.png" alt="ทัวร์อียิปต์" class=" lazyloaded" src="{{ asset('/images/flags/Egypt.png')}}">
                                                            <h5>อียิปต์</h5></a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-xs-6 col-md-6">
                                                    <div class="flag"><a class="country-link new-thai-font" href="{{ URL::to('tour/turkey?country=22')}}">
                                                            <img data-src="../images/flags/turkey.png" alt="ทัวร์ตุรกี" class=" lazyloaded" src="{{ asset('/images/flags/turkey.png')}}">
                                                            <h5>ตุรกี</h5></a>
                                                    </div>                                                    
                                                </div>
                                                <div class="col-xs-6 col-md-6">
                                                    <div class="flag"><a class="country-link new-thai-font" href="{{ URL::to('tour/south_africa?country=0')}}">
                                                            <img data-src="../images/flags/south_africa.png" alt="ทัวร์แอฟริกาใต้" class=" lazyloaded" src="{{ asset('/images/flags/south_africa.png')}}">
                                                            <h5>แอฟริกาใต้</h5></a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-xs-6 col-md-6">
                                                    <div class="flag"><a class="country-link new-thai-font" href="{{ URL::to('tour/norway?country=0')}}">
                                                            <img data-src="../images/flags/Norway.png" alt="ทัวร์นอร์เวย์" class=" lazyloaded" src="{{ asset('/images/flags/Norway.png')}}">
                                                            <h5>นอร์เวย์</h5></a>
                                                    </div>                                                    
                                                </div>
                                                <div class="col-xs-6 col-md-6">
                                                    <div class="flag"><a class="country-link new-thai-font" href="{{ URL::to('tour/new-zealand?country=0')}}">
                                                            <img data-src="../images/flags/New-Zealand.png" alt="ทัวร์นิวซีแลนด์" class=" lazyloaded" src="{{ asset('/images/flags/New-Zealand.png')}}">
                                                            <h5>นิวซีแลนด์</h5></a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-xs-6 col-md-6">
                                                    <div class="flag"><a class="country-link new-thai-font" href="{{ URL::to('tour/america?country=28')}}">
                                                            <img data-src="../images/flags/United-States-of-America.png" alt="ทัวร์สหรัฐอเมริกา" class=" lazyloaded" src="{{ asset('/images/flags/United-States-of-America.png')}}">
                                                            <h5>อเมริกา</h5></a>
                                                    </div>                                                    
                                                </div>
                                                <div class="col-xs-6 col-md-6">
                                                    <div class="flag"><a class="country-link new-thai-font" href="{{ URL::to('tour/south-america?country=0')}}">
                                                            <img data-src="../images/flags/South_America.png" alt="ทัวร์อเมริกาใต้" class=" lazyloaded" src="{{ asset('/images/flags/South_America.png')}}">
                                                            <h5>อเมริกาใต้</h5></a>
                                                    </div>                                                    
                                                </div>
                                            </div>
                                        </div>    
                                        <!--                                        ทวีปอื่นๆ-->


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
                                    <a href="{{ url('tourhit?category_id=100002') }}">ทัวร์ฮิต</a>
                                    <hr id="tourhot" class="underline-link" data-selenium="underline-link" style="width: 50%; left: 25%;">
                                </li>
                                <!--                                <li class="menu-item-has-children">
                                                                    <a><i class="fa fa-map-marker"></i>&nbsp;สถานที่ยอดฮิต</a>
                                                                    <hr id="hothits" class="underline-link" data-selenium="underline-link" style="width: 100%; left: 0px; opacity: 1;">
                                                                </li>-->
                                <li class="menu-item-has-children">
                                    <a href="{{ url('about') }}">เกี่ยวกับเรา</a>
                                    <hr id="about" class="underline-link" data-selenium="underline-link" style="width: 50%; left: 25%;">
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="{{ url('contact') }}">ติดต่อเรา</a>
                                    <hr id="contact" class="underline-link" data-selenium="underline-link" style="width: 50%; left: 25%;">
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="{{ url('article-index') }}">บทความ</a>
                                    <!--<a href="{{ url('blog') }}">บทความ</a>-->
                                    <hr id="blog" class="underline-link" data-selenium="underline-link" style="width: 50%; left: 25%;">
                                </li>
<!--                                                                <li class="menu-item-has-children">
                                                                    <a href="{{ url('login')}}">เข้าสู่ระบบ</a>
                                                                </li>-->

                            </ul>

                        </nav>
                        <!-- END / NAVIGATION -->
<!--                        <input id="search-tour-box" type="checkbox" class="d-none">
                        <label for="search-tour-box" class="search-tour-box">
                            <span class=""><i class="awe-icon awe-icon-search"></i>ค้นหาแพ็คเกจ</span>
                        </label>-->
                        <div class="search-tour-box">
                            <button onclick="toggle_div_fun('sectiontohide');">
                            <span class=""><i class="fas fa-search"></i>ค้นหาแพ็คเกจ</span> 
                            </button>
                        </div>    

                        <div id="sectiontohide">
                            <div class="search-modal-box">

                                <div class="container search-container">
                                    <div class="awe-search-tabs-2 tabs" style="transform: unset;">            
                                        <ul hidden="">
                                            <li>
                                                <a href="#awe-search-tabs-1">
                                                    ค้นหาทัวร์
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="awe-search-tabs__content tabs__content ">
                                            <div id="awe-search-tabs-1">
                                                <form>
                                                    <div class="form-group">
                                                        <div class="form-elements">
                                                            <div class="form-item" style="cursor: text;">
                                                                <i class="fas fa-search awe-icon"></i>                                                   
                                                                <input id="search_text" class="form-control" type="text" placeholder="ค้นหาชื่อแพ็คเกจทัวร์" value="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="form-elements">
                                                            <div class="form-item">
                                                                <select id="country_dropdown" class="form-control">
                                                                    <option selected value="">เลือกประเทศ</option>
                                                                    @foreach ($countryList as $country)
                                                                    <option value="{{$country->tour_country_url}}">{{$country->country_name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="form-elements">
                                                            <div class="form-item">
                                                                <input type="text" id="date_picker" placeholder="วันเดินทาง ไป - กลับ" class="form-control">
                                                                <i class="far fa-calendar-check awe-icon"></i>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="form-elements days">
                                                            <div class="form-item">
                                                                <select id="days_dropdown" class="form-control">
                                                                    <option selected value="">จำนวนวัน</option>
                                                                    <option value="1">1 วัน</option>
                                                                    <option value="2">2 วัน</option>
                                                                    <option value="3">3 วัน</option>
                                                                    <option value="4">4 วัน</option>
                                                                    <option value="5">5 วัน</option>
                                                                    <option value="6">6 วัน</option>
                                                                    <option value="7">7 วัน</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-actions">
                                                        <a id="search_tour" class="btn btn-search">ค้นหาทัวร์</a>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

<!--                                <div class="modal-body">
                                    <form>
                                        <div class="input-group mb-2">
                                            ประเทศ
                                            <input title="" id="search_input" placeholder="ประเทศ, เส้นทาง, เมือง" name="" type="text" class="form-control rounded">
                                            <input type="hidden" title="optional_input" disabled="">
                                        </div>
                                        <div class="d-flex mb-3">
                                        <div class="input-group w-50 mr-2">
                                        <div class="input-group-prepend">
                                        <img class="mr-2 d-flex align-self-center" height="20px" alt="Flag Icon" src="https://cloudfront.tourkrub.co/packs/images/icon/icon-calendar-grey-71cd3d4d135ec13759effc6dd2ff929a.png">
                                        </div>
                                        <select id="month_nav_search" title="month_period" name="month[]" class="form-control rounded">
                                        <option value="">ช่วงเดือน</option>
                                        <option value="2019-1-01">มกราคม</option>
                                        <option value="2019-2-01">กุมภาพันธ์</option>
                                        <option value="2019-3-01">มีนาคม</option>
                                        <option value="2019-4-01">เมษายน</option>
                                        <option value="2019-5-01">พฤษภาคม</option>
                                        <option value="2019-6-01">มิถุนายน</option>
                                        <option value="2019-7-01">กรกฎาคม</option>
                                        <option value="2019-8-01">สิงหาคม</option>
                                        <option value="2019-9-01">กันยายน</option>
                                        <option value="2019-10-01">ตุลาคม</option>
                                        <option value="2019-11-01">พฤศจิกายน</option>
                                        <option value="2019-12-01">ธันวาคม</option>
                                        </select>
                                        </div>
                                        <div class="input-group w-50">
                                        <div class="input-group-prepend">
                                        <img class="mr-2 d-flex align-self-center" height="20px" alt="Flag Icon" src="https://cloudfront.tourkrub.co/packs/images/icon/icon-hash-grey-4c9c0df1ffa73eb5a1a1bfed3ff6d608.png">
                                        </div>
                                        <input id="search_id" name="query" type="text" placeholder="รหัสทัวร์ (ถ้าทราบ)" class="form-control rounded">
                                        </div>
                                        </div>
                                        <button type="submit" class="btn btn-green btn-rounded px-5 d-block mx-auto">ค้นหาทัวร์</button>
                                    </form>
                                </div>-->
                            </div>
                        </div>
                            
                            
<!--                            <div class="search-modal">
                                <div class="modal-body">
                                    <form>
                                        <div class="input-group mb-2">
                                            ประเทศ
                                            <input title="" id="search_input" placeholder="ประเทศ, เส้นทาง, เมือง" name="" type="text" class="form-control rounded">
                                            <input type="hidden" title="optional_input" disabled="">
                                        </div>
                                        <div class="d-flex mb-3">
                                        <div class="input-group w-50 mr-2">
                                        <div class="input-group-prepend">
                                        <img class="mr-2 d-flex align-self-center" height="20px" alt="Flag Icon" src="https://cloudfront.tourkrub.co/packs/images/icon/icon-calendar-grey-71cd3d4d135ec13759effc6dd2ff929a.png">
                                        </div>
                                        <select id="month_nav_search" title="month_period" name="month[]" class="form-control rounded">
                                        <option value="">ช่วงเดือน</option>
                                        <option value="2019-1-01">มกราคม</option>
                                        <option value="2019-2-01">กุมภาพันธ์</option>
                                        <option value="2019-3-01">มีนาคม</option>
                                        <option value="2019-4-01">เมษายน</option>
                                        <option value="2019-5-01">พฤษภาคม</option>
                                        <option value="2019-6-01">มิถุนายน</option>
                                        <option value="2019-7-01">กรกฎาคม</option>
                                        <option value="2019-8-01">สิงหาคม</option>
                                        <option value="2019-9-01">กันยายน</option>
                                        <option value="2019-10-01">ตุลาคม</option>
                                        <option value="2019-11-01">พฤศจิกายน</option>
                                        <option value="2019-12-01">ธันวาคม</option>
                                        </select>
                                        </div>
                                        <div class="input-group w-50">
                                        <div class="input-group-prepend">
                                        <img class="mr-2 d-flex align-self-center" height="20px" alt="Flag Icon" src="https://cloudfront.tourkrub.co/packs/images/icon/icon-hash-grey-4c9c0df1ffa73eb5a1a1bfed3ff6d608.png">
                                        </div>
                                        <input id="search_id" name="query" type="text" placeholder="รหัสทัวร์ (ถ้าทราบ)" class="form-control rounded">
                                        </div>
                                        </div>
                                        <button type="submit" class="btn btn-green btn-rounded px-5 d-block mx-auto">ค้นหาทัวร์</button>
                                    </form>
                                </div>
                            </div>    -->

                        

                        <!-- SEARCH BOX -->
                        <div class="search-box">
                            <span class="searchtoggle"><i class="fas fa-user"></i></span>
                            <form class="form-search">
                                <div class="form-item">
                                    @if(!isset($_SESSION['m_user']))
                                    <input type="hidden" name="_token" id="m_user" value="">
                                    <div class="sub-item">
                                        <a href="{{ url('login')}}"><i class="fa fa-unlock-alt"></i>&nbsp;เข้าสู่ระบบ</a>
                                    </div>
                                    <div class="sub-item">
                                        <a href="{{ url('register')}}"><i class="fa fa-user-plus"></i>&nbsp;สมัครสมาชิก</a>
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
                                            ยินดีต้อนรับ <?php echo $_SESSION['customer_name'] ?>
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
                    <!-- WIDGET ซ้าย -->
                    <div class="col-md-5 col-xs-12">
                        <div class="row">
                            <div class="footer-one">
                                <div class="col-xs-4 box-border"><a href="#">หน้าหลัก</a></div>
                                <div class="col-xs-4 box-border"><a href="">เกี่ยวกับเรา</a></div>
                                <div class="col-xs-4 box-border"><a href="">ติดต่อเรา</a></div>
                            </div>
                        </div>    
                        <div class="row">
                            <div class="foot-location-head">บริษัท ทัวร์ฮิตส์ จำกัด</div>
                        </div>
                        <div class="row">
                            <div class="foot-location-detail"> 
                                <p>เลขที่ 300/76 โครงการพรีเมี่ยมเพลส
                                <p>ถนนนวมินทร์ แขวงนวมินทร์ เขตบึงกุ่ม กรุงเทพฯ 10240</p>                           
                                <p>โทร: 0-2379-1249 Fax: 0-2379-1966-7</p>
                                <p>E-mail:<a href="mailto:tourhits@gmail.com" style="color:#7F7FF5;"> tourhits@gmail.com</a></p>
                            </div> 
                        </div>
                        <div class="row">

                        </div>   
                        <div class="row">
                            <div class="fb-page" data-href="https://www.facebook.com/page.tourhits" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false"><blockquote cite="https://www.facebook.com/page.tourhits" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/page.tourhits">Tourhits</a></blockquote></div>
                        </div>
                    </div>

                    <!-- WIDGET ขวา -->
                    <div class="col-md-7 hidden-xs hidden-sm">
                        <div class="footer-two">
                            <div class="col-md-12">แพ็คเกจทัวร์ ทั้งหมด</div>
                        </div>
                        <div class="row">
                            <div class="package-country-footer">
                                <div class="col-md-12">
                                    <div class="continent-name">ทวีปเอเชีย</div>
                                    <div class="col-md-3 name-country-footer"><a href="{{ URL::to('tour/ทัวร์ญี่ปุ่น?country=ทัวร์ญี่ปุ่น')}}">ทัวร์ญี่ปุ่น</a></div>
                                    <div class="col-md-3 name-country-footer"><a href="{{ URL::to('tour/ทัวร์จีน?country=ทัวร์จีน')}}">ทัวร์จีน</a></div>
                                    <div class="col-md-3 name-country-footer"><a href="{{ URL::to('tour/ทัวร์ฮ่องกง?country=ทัวร์ฮ่องกง')}}">ทัวร์ฮ่องกง</a></div>
                                    <div class="col-md-3 name-country-footer"><a href="{{ URL::to('tour/ทัวร์พม่า?country=ทัวร์พม่า')}}">ทัวร์พม่า</a></div>
                                    <div class="col-md-3 name-country-footer"><a href="{{ URL::to('tour/ทัวร์ไต้หวัน?country=ทัวร์ไต้หวัน')}}">ทัวร์ไต้หวัน</a></div>
                                    <div class="col-md-3 name-country-footer"><a href="{{ URL::to('tour/ทัวร์เกาหลี?country=ทัวร์เกาหลี')}}">ทัวร์เกาหลี</a></div>
                                    <div class="col-md-3 name-country-footer"><a href="{{ URL::to('tour/ทัวร์เวียดนาม?country=ทัวร์เวียดนาม')}}">ทัวร์เวียดนาม</a></div>
                                    <div class="col-md-3 name-country-footer"><a href="{{ URL::to('tour/ทัวร์สิงคโปร์?country=ทัวร์สิงคโปร์')}}">ทัวร์สิงคโปร์</a></div>
                                    <div class="col-md-3 name-country-footer"><a href="{{ URL::to('tour/ทัวร์ลาว?country=ทัวร์ลาว')}}">ทัวร์ลาว</a></div>
                                    <div class="col-md-3 name-country-footer"><a href="{{ URL::to('tour/ทัวร์มาเก๊า?country=ทัวร์มาเก๊า')}}">ทัวร์มาเก๊า</a></div>
                                    <div class="col-md-3 name-country-footer"><a href="{{ URL::to('tour/ทัวร์อินเดีย?country=ทัวร์อินเดีย')}}">ทัวร์อินเดีย</a></div>
                                    <div class="col-md-3 name-country-footer"><a href="{{ URL::to('tour/ทัวร์อินโดนีเซีย?country=ทัวร์อินโดนีเซีย')}}">ทัวร์อินโดนีเซีย</a></div>
                                    <div class="col-md-3 name-country-footer"><a href="{{ URL::to('tour/ทัวร์มาเลเซีย?country=ทัวร์มาเลเซีย')}}">ทัวร์เนปาล</a></div>
                                    <div class="col-md-3 name-country-footer"><a href="{{ URL::to('tour/ทัวร์มาเลเซีย?country=ทัวร์มาเลเซีย')}}">ทัวร์มาเลเซีย</a></div>
                                    <div class="col-md-3 name-country-footer"><a href="{{ URL::to('tour/ทัวร์บรูไน?country=ทัวร์บรูไน')}}">ทัวร์บรูไน</a></div>
                                    <div class="col-md-3 name-country-footer"><a href="{{ URL::to('tour/ทัวร์กัมพูชา?country=ทัวร์กัมพูชา')}}">ทัวร์กัมพูชา</a></div>
                                </div>        
                                <div class="col-md-12" style="margin-top: 20px;">
                                    <div class="continent-name">ทวีปยุโรป</div>
                                    <div class="col-md-3 name-country-footer"><a href="{{ URL::to('tour/ทัวร์ยุโรป?country=ทัวร์ยุโรป')}}">ทัวร์ยุโรป</a></div>
                                    <div class="col-md-3 name-country-footer"><a href="{{ URL::to('tour/ทัวร์ยุโรปตะวันออก?country=ทัวร์ยุโรปตะวันออก')}}">ทัวร์ยุโรปตะวันออก</a></div>
                                    <div class="col-md-3 name-country-footer"><a href="{{ URL::to('tour/ทัวร์รัสเซีย?country=ทัวร์รัสเซีย')}}">ทัวร์รัสเซีย</a></div>
                                    <div class="col-md-3 name-country-footer"><a href="{{ URL::to('tour/ทัวร์อิตาลี?country=ทัวร์อิตาลี')}}">ทัวร์อิตาลี</a></div>   
                                    <div class="col-md-3 name-country-footer"><a href="{{ URL::to('tour/ทัวร์ออสเตรีย?country=ทัวร์ออสเตรีย')}}">ทัวร์ออสเตรีย</a></div>
                                    <div class="col-md-3 name-country-footer"><a href="{{ URL::to('tour/ทัวร์ฝรั่งเศส?country=ทัวร์ฝรั่งเศส')}}">ทัวร์ฝรั่งเศส</a></div>
                                    <div class="col-md-3 name-country-footer"><a href="{{ URL::to('tour/ทัวร์สวิส?country=ทัวร์สวิส')}}">ทัวร์สวิส</a></div>
                                    <div class="col-md-3 name-country-footer"><a href="{{ URL::to('tour/ทัวร์เยอรมัน?country=ทัวร์เยอรมัน')}}">ทัวร์เยอรมัน</a></div>
                                    <div class="col-md-3 name-country-footer"><a href="{{ URL::to('tour/ทัวร์สเปน?country=ทัวร์สเปน')}}">ทัวร์สเปน</a></div>
                                    <div class="col-md-3 name-country-footer"><a href="{{ URL::to('tour/ทัวร์ฟินแลนด์?country=ทัวร์ฟินแลนด์')}}">ทัวร์ฟินแลนด์</a></div>
                                    <div class="col-md-3 name-country-footer"><a href="{{ URL::to('tour/ทัวร์เนเธอร์แลนด์?country=ทัวร์เนเธอร์แลนด์')}}">ทัวร์เนเธอร์แลนด์</a></div>
                                    <div class="col-md-3 name-country-footer"><a href="{{ URL::to('tour/ทัวร์โปแลนด์?country=ทัวร์โปแลนด์')}}">ทัวร์โปแลนด์</a></div>
                                    <div class="col-md-3 name-country-footer"><a href="{{ URL::to('tour/ทัวร์โครเอเชีย?country=ทัวร์โครเอเชีย')}}">ทัวร์โครเอเชีย</a></div>
                                    <div class="col-md-3 name-country-footer"><a href="{{ URL::to('tour/ทัวร์อังกฤษ?country=ทัวร์อังกฤษ')}}">ทัวร์อังกฤษ</a></div>
                                    <div class="col-md-3 name-country-footer"><a href="{{ URL::to('tour/ทัวร์สแกนดิเนเวีย?country=ทัวร์สแกนดิเนเวีย')}}">ทัวร์สแกนดิเนเวีย</a></div>
                                </div>
                                <div class="col-md-12" style="margin-top: 20px;">
                                    <div class="continent-name">ทวีปอื่นๆ</div>
                                    <div class="col-md-3 name-country-footer"><a href="{{ URL::to('tour/ทัวร์มัลดีฟส์?country=ทัวร์มัลดีฟส์')}}">ทัวร์มัลดีฟส์</a></div>
                                    <div class="col-md-3 name-country-footer"><a href="{{ URL::to('tour/ทัวร์ดูไบ?country=ทัวร์ดูไบ')}}">ทัวร์ดูไบ</a></div>
                                    <div class="col-md-3 name-country-footer"><a href="{{ URL::to('tour/ออสเตรเลีย?country=ทัวร์ออสเตรเลีย')}}">ทัวร์ออสเตรเลีย</a></div>
                                    <div class="col-md-3 name-country-footer"><a href="{{ URL::to('tour/ทัวร์อียิปต์?country=ทัวร์อียิปต์')}}">ทัวร์อียิปต์</a></div>   
                                    <div class="col-md-3 name-country-footer"><a href="{{ URL::to('tour/ทัวร์ตุรกี?country=ทัวร์ตุรกี')}}">ทัวร์ตุรกี</a></div>
                                    <div class="col-md-3 name-country-footer"><a href="{{ URL::to('tour/ทัวร์แอฟริกาใต้?country=ทัวร์แอฟริกาใต้')}}">ทัวร์แอฟริกาใต้</a></div>
                                    <div class="col-md-3 name-country-footer"><a href="{{ URL::to('tour/ทัวร์นอร์เวย์?country=ทัวร์นอร์เวย์')}}">ทัวร์นอร์เวย์</a></div>
                                    <div class="col-md-3 name-country-footer"><a href="{{ URL::to('tour/ทัวร์นิวซีแลนด์?country=ทัวร์นิวซีแลนด์')}}">ทัวร์นิวซีแลนด์</a></div>
                                    <div class="col-md-3 name-country-footer"><a href="{{ URL::to('tour/ทัวร์ดูไบ?country=ทัวร์อเมริกา')}}">ทัวร์อเมริกา</a></div>
                                    <div class="col-md-3 name-country-footer"><a href="{{ URL::to('tour/ทัวร์ดูไบ?country=ทัวร์อเมริกาใต้')}}">ทัวร์อเมริกาใต้</a></div> 
                                </div>    
                            </div>
                        </div>             
                    </div>

                </div>
            </footer>
            <footer id="footer-page-bottom">
                <div class="container">
                    <div class="col-xs-12">
                        <div class="verification-footer">
                            <div class="sponsor-footer hidden-xs hidden-sm">
                                <ul>
                                    <li>
                                        <a href="http://www.atta.or.th/" target="_blank" rel="nofollow noopener" title="Association of Thai Travel Agents License No. 03593"><img class="lazy" src="https://cdn.mushroomtravel.com/assets/images/footer/footer-icon-01.jpg" alt="Association of Thai Travel Agents License No. 03593" style="display: inline-block;"></a>
                                    </li>
                                    <li><a href="http://thai.tourismthailand.org/" target="_blank" rel="nofollow noopener" title="TAT Travel License No.11/09294"><img class="lazy" src="https://cdn.mushroomtravel.com/assets/images/footer/footer-icon-02.jpg" alt="TAT Travel License No.11/09294" style="display: inline-block;"></a>
                                    </li>
                                    <li>
                                        <script type="text/javascript" src="https://lvs.truehits.in.th/datasecure/t0029848.js"></script><a href="http://truehits.net/stat.php?login=mushroomtravel" target="_blank"><img src="https://lvs.truehits.in.th/goggen.php?hc=t0029848&amp;bv=0&amp;rf=https%3A//www.google.co.th/&amp;web=NPtNfFjN0H0kP291ULgt9w%3D%3D&amp;bn=Netscape&amp;ss=1707*1067&amp;sc=24&amp;sv=1.3&amp;ck=y&amp;ja=n&amp;vt=B09A8E38.2&amp;fp=r&amp;fv=-&amp;truehitspage=&amp;truehitsurl=https%3a//www.mushroomtravel.com/" width="14" height="17" alt="Thailand Web Stat" border="0"></a><noscript><a target="_blank" href="http://truehits.net/stat.php?id=t0029848" rel="nofollow noopener"><img class="lazy" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-src="http://hits.truehits.in.th/noscript.php?id=t0029848" title="Thailand Web Stat" alt="Thailand Web Stat"border="0" width="14" height="17" al></a> <a target="_blank" href="http://truehits.net/" rel="nofollow">Truehits.net</a></noscript></li><li><a href="https://www.trustmarkthai.com/callbackData/popup.php?data=f66c4a0-22-4-23af312cf01cf2e186948793fa2caef7a8d10" rel="nofollow noopener" target="_blank" title="Department of Business Development, the Ministry of Commerce of Thailand"><img class="lazy" src="https://cdn.mushroomtravel.com/assets/images/footer/dbd-logo.jpg" alt="Department of Business Development, the Ministry of Commerce of Thailand" style="display: inline-block;"></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="row">
                                <div class="col-md-4">ใบอนุญาตประกอบธุรกิจนำเที่ยว<br>เลขที่ 11/09305</div>
                                <div class="col-md-4 hidden-xs hidden-smboxx">สมาชิกสมาคมไทยธุรกิจการท่องเที่ยว เลขที่ 012345</div>
                                <div class="col-md-4 hidden-xs hidden-sm boxx">e-Commerce No.01234567890</div>
                            </div>    
                            <p>สงวนลิขสิทธิ์ 2561 Tourhits.co | 2018 Tourhits All rights reserved.</p>  
                        </div>
                    </div>
                </div>
            </footer>
            <!-- END / FOOTER PAGE -->

            <!-- navbar only xs -->

            <div class="navbar-bot visible-xs">               
                <div class="box-line bx">
                    <a target="_blank" rel="noopener noreferrer" href="http://line.me/ti/p/%40tourhits">
                        <div class="line-img-box img-bx">
                            <img alt="" src="{{ asset('/images/icon/logo-line.png')}}" title="">
                        </div>    
                        <span>ไลน์หาเรา</span>

                    </a>
                </div>     

                <div class="box-fb bx">
                    <a href="https://m.me/PAGE.TOURHITS/">
                        <div class="tel-img-box img-bx">
                            <img alt="" src="{{ asset('/images/icon/messenger.png')}}" title="">
                        </div>    
                        <span>Messenger</span>
                    </a> 
                </div>

                <div class="box-tel bx">  
                    <a href="tel:02-379-1249">
                        <div class="tel-img-box img-bx">
                            <img alt="" src="{{ asset('/images/icon/telephone2.png')}}" title="">
                        </div>    
                        <span>โทรหาเรา</span>    
                    </a>
                </div>
            </div>

            <!--back to top-->
            <button onclick="topFunction()" id="BtnBtt" title="Go to top"><i class="fas fa-arrow-alt-circle-up"></i></button>

        </div>

        <!-- END navbar only xs -->
    </div>
    <!-- END / PAGE WRAP -->
    <div id="fb-root"></div>

    <script>(function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id))
                return;
            js = d.createElement(s);
            js.id = id;
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
    <script type="text/javascript" src="{{ asset('js/lib/jquery.gdocsviewer.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/lib/qqq.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/lib/jquery.endless-scroll.js') }}"></script>
    <script type="text/javascript">
        $(function () {
            $('.underline-link').removeClass('menu-active');
        });
    </script>

    <script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
    <!--footer scripts-->
    @yield('footer_scripts')
    <script type="text/javascript" src="{{ asset('js/scripts.js') }}"></script>
    <div id="fb-root"></div>
    <script>(function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id))
                return;
            js = d.createElement(s);
            js.id = id;
            js.src = 'https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v3.1';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
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

    <script>
        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function () {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 1000 || document.documentElement.scrollTop > 1000) {
                document.getElementById("BtnBtt").style.display = "inline-flex";
            } else {
                document.getElementById("BtnBtt").style.display = "none";
            }
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
            document.body.scrollTop = 0; // For Safari
            document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
        }
    </script>
    
    <script type="text/javascript">
    function toggle_div_fun(id) {

       var divelement = document.getElementById(id);

       if(divelement.style.display == 'block')
          divelement.style.display = 'none';
       else
          divelement.style.display = 'block';
    }
    </script>
    
    <script type="text/javascript">
    function toggle_close(id) {

       var divelement = document.getElementById(id);

       if(divelement.style.display == 'block')
          divelement.style.display = 'none';
       else
          divelement.style.display = 'block';
    }
    </script>


</body>
</html>