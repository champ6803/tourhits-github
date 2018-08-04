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
                                    <a>แพ็คเกจทัวร์</a>
                                    <hr id="indx" class="underline-link" data-selenium="underline-link" style="width: 100%; left: 0px; opacity: 1;">
                                    <ul class="col-md-12 sub-menu">
                                    <div class="col-md-4 cat-asian cat-line">
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
                                    </div>    
<!--                                        เอเชีย-->
<!--                                        ยุโรป-->
                                    <div class="col-md-4 cat-asian cat-line">
                                        <div class="row">
                                            <div class="pagtour-head">ทัวร์ยุโรป</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-6 col-md-6">
                                                <div class="flag"><a class="country-link new-thai-font" href="{{ URL::to('search-tour/ทัวร์ยุโรป?country=ทัวร์ยุโรป')}}">
                                                    <img data-src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/8/eu.png" alt="ทัวร์ยุโรป" class=" lazyloaded" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/8/eu.png">
                                                    <h5>ยุโรป</h5>
                                                </a>
                                                </div>                                                    
                                            </div>
                                            <div class="col-xs-6 col-md-6">
                                                <div class="flag"><a class="country-link new-thai-font" href="{{ URL::to('search-tour/ทัวร์รัสเซีย?country=ทัวร์รัสเซีย')}}">
                                                    <img data-src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/18/flag-aa38aeb9c762602cdebc9a5dbf308295.png" alt="ทัวร์รัสเซีย" class=" lazyloaded" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/18/flag-aa38aeb9c762602cdebc9a5dbf308295.png">
                                                    <h5>รัสเซีย</h5>
                                                </a>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-xs-6 col-md-6">
                                                <div class="flag"><a class="country-link new-thai-font" href="{{ URL::to('search-tour/ทัวร์อิตาลี?country=ทัวร์อิตาลี')}}">
                                                    <img data-src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/10/Italy.png" alt="ทัวร์อิตาลี" class=" lazyloaded" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/10/Italy.png">
                                                    <h5>อิตาลี</h5>
                                                </a>
                                                </div></div>
                                            <div class="col-xs-6 col-md-6">
                                                <div class="flag"><a class="country-link new-thai-font" href="{{ URL::to('search-tour/ทัวร์ออสเตรีย?country=ทัวร์ออสเตรีย')}}">
                                                    <img data-src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/16/Austria.png" alt="ทัวร์ออสเตรีย" class=" lazyloaded" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/16/Austria.png">
                                                    <h5>ออสเตรีย</h5>
                                                </a>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-xs-6 col-md-6">
                                                <div class="flag"><a class="country-link new-thai-font" href="{{ URL::to('search-tour/ทัวร์ฝรั่งเศส?country=ทัวร์ฝรั่งเศส')}}">
                                                    <img data-src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/9/France.png" alt="ทัวร์ฝรั่งเศส" class=" lazyloaded" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/9/France.png">
                                                    <h5>ฝรั่งเศส</h5>
                                                </a>
                                                </div></div>
                                            <div class="col-xs-6 col-md-6">
                                                <div class="flag"><a class="country-link new-thai-font" href="{{ URL::to('search-tour/ทัวร์สวิส?country=ทัวร์สวิส')}}">
                                                    <img data-src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/11/Switzerland.png" alt="ทัวร์สวิส" class=" lazyloaded" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/11/Switzerland.png">
                                                    <h5>สวิส</h5>
                                                </a>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-xs-6 col-md-6">
                                                <div class="flag"><a class="country-link new-thai-font" href="{{ URL::to('search-tour/ทัวร์เยอรมัน?country=ทัวร์เยอรมัน')}}">
                                                    <img data-src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/12/Germany.png" alt="ทัวร์เยอรมัน" class=" lazyloaded" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/12/Germany.png">
                                                    <h5>เยอรมัน</h5>
                                                </a>
                                                </div></div>
                                            <div class="col-xs-6 col-md-6">
                                                <div class="flag"><a class="country-link new-thai-font" href="/spain-tour">
                                                    <img data-src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/38/flag-00d787efb4481bfaa1fd9b08459695eb.png" alt="ทัวร์สเปน" class=" lazyloaded" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/38/flag-00d787efb4481bfaa1fd9b08459695eb.png">
                                                    <h5>สเปน</h5>
                                                </a>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-xs-6 col-md-6">
                                                <div class="flag"><a class="country-link new-thai-font" href="/finland-tour">
                                                    <img data-src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/42/flag-a5d8c288acfeab36b4391982b5be2a2a.png" alt="ทัวร์ฟินแลนด์" class=" lazyloaded" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/42/flag-a5d8c288acfeab36b4391982b5be2a2a.png">
                                                    <h5>ฟินแลนด์</h5>
                                                </a>
                                                </div></div>
                                            <div class="col-xs-6 col-md-6">
                                                <div class="flag"><a class="country-link new-thai-font" href="/netherlands-tour">
                                                    <img data-src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/25/flag-7a4a3e84eea1ef90b9d9254380831b74.png" alt="ทัวร์เนเธอร์แลนด์" class=" lazyloaded" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/25/flag-7a4a3e84eea1ef90b9d9254380831b74.png">
                                                    <h5>เนเธอร์แลนด์</h5>
                                                </a>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-xs-6 col-md-6">
                                                <div class="flag"><a class="country-link new-thai-font" href="/poland-tour">
                                                    <img data-src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/43/flag-0a47aeab902bdcea516949aea687a75a.png" alt="ทัวร์โปแลนด์" class=" lazyloaded" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/43/flag-0a47aeab902bdcea516949aea687a75a.png">
                                                    <h5>โปแลนด์</h5>
                                                </a>
                                                </div></div>
                                            <div class="col-xs-6 col-md-6">
                                                <div class="flag"><a class="country-link new-thai-font" href="/croatia-tour">
                                                    <img data-src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/39/flag-3baac14e2c7a3c84e4340a3e33fc3f04.png" alt="ทัวร์โครเอเชีย" class=" lazyloaded" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/39/flag-3baac14e2c7a3c84e4340a3e33fc3f04.png">
                                                    <h5>โครเอเชีย</h5>
                                                </a>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-xs-6 col-md-6">
                                                <div class="flag"><a class="country-link new-thai-font" href="/england-tour">
                                                    <img data-src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/40/flag-c10677d43fafe551191f0370489a3ace.png" alt="ทัวร์อังกฤษ" class=" lazyloaded" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/40/flag-c10677d43fafe551191f0370489a3ace.png">
                                                    <h5>อังกฤษ</h5>
                                                </a>
                                                </div></div>
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
                                                <div class="flag"><a class="country-link new-thai-font" href="{{ URL::to('search-tour/ทัวร์มัลดีฟส์?country=ทัวร์มัลดีฟส์')}}">
                                                    <img data-src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/35/Maldives.png" alt="ทัวร์มัลดีฟส์" class=" lazyloaded" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/35/Maldives.png">
                                                    <h5>มัลดีฟส์</h5></a>
                                                </div>                                                    
                                            </div>
                                            <div class="col-xs-6 col-md-6">
                                                <div class="flag"><a class="country-link new-thai-font" href="{{ URL::to('search-tour/ทัวร์ดูไบ?country=ทัวร์ดูไบ')}}">
                                                    <img data-src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/27/United-Arab-Emirates.png" alt="ทัวร์ดูไบ" class=" lazyloaded" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/27/United-Arab-Emirates.png">
                                                    <h5>ดูไบ</h5></a>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-xs-6 col-md-6">
                                                <div class="flag"><a class="country-link new-thai-font" href="/australia-tour">
                                                    <img data-src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/14/Australia.png" alt="ทัวร์ออสเตรเลีย" class=" lazyloaded" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/14/Australia.png">
                                                    <h5>ออสเตรเลีย</h5></a>
                                                </div>                                                    
                                            </div>
                                            <div class="col-xs-6 col-md-6">
                                                <div class="flag"><a class="country-link new-thai-font" href="/egypt-tour">
                                                    <img data-src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/30/flag-ad52e00676e16b435f78782502cdd3d3.png" alt="ทัวร์อียิปต์" class=" lazyloaded" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/30/flag-ad52e00676e16b435f78782502cdd3d3.png">
                                                    <h5>อียิปต์</h5></a>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-xs-6 col-md-6">
                                                <div class="flag"><a class="country-link new-thai-font" href="/turkey-tour">
                                                    <img data-src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/32/flag-62151bf6364345076361d9fd917f06bd.png" alt="ทัวร์ตุรกี" class=" lazyloaded" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/32/flag-62151bf6364345076361d9fd917f06bd.png">
                                                    <h5>ตุรกี</h5></a>
                                                </div>                                                    
                                            </div>
                                            <div class="col-xs-6 col-md-6">
                                                <div class="flag"><a class="country-link new-thai-font" href="/south-africa-tour">
                                                    <img data-src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/28/flag-b09ab3faf5517b872f403818f1bd72cd.png" alt="ทัวร์แอฟริกาใต้" class=" lazyloaded" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/28/flag-b09ab3faf5517b872f403818f1bd72cd.png">
                                                    <h5>แอฟริกาใต้</h5></a>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-xs-6 col-md-6">
                                                <div class="flag"><a class="country-link new-thai-font" href="/norway-tour">
                                                    <img data-src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/41/flag-1a716cb7921f3dcba366f1bcb2b74f10.png" alt="ทัวร์นอร์เวย์" class=" lazyloaded" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/41/flag-1a716cb7921f3dcba366f1bcb2b74f10.png">
                                                    <h5>นอร์เวย์</h5></a>
                                                </div>                                                    
                                            </div>
                                            <div class="col-xs-6 col-md-6">
                                                <div class="flag"><a class="country-link new-thai-font" href="/new-zealand-tour">
                                                    <img data-src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/15/New-Zealand.png" alt="ทัวร์นิวซีแลนด์" class=" lazyloaded" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/15/New-Zealand.png">
                                                    <h5>นิวซีแลนด์</h5></a>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-xs-6 col-md-6">
                                                <div class="flag"><a class="country-link new-thai-font" href="/united-states-tour">
                                                    <img data-src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/13/United-States-of-America.png" alt="ทัวร์สหรัฐอเมริกา" class=" lazyloaded" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/13/United-States-of-America.png">
                                                    <h5>อเมริกา</h5></a>
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
            
            <!-- navbar only xs -->
            
            <div class="navbar-bot visible-xs">
                <div class="box-tel"><a href="tel:02-379-1249"><i class="fas fa-mobile"></i> โทร</a></div>
                <div class="box-line"><a target="_blank" rel="noopener noreferrer" href="http://line.me/ti/p/%40tourhits"><i class="fab fa-line"></i> ไลน์</a></div>               
            </div>
            
            <!-- END navbar only xs -->
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