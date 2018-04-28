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
        <link rel="stylesheet" type="text/css" media="all" href="{{ asset('css/lib/daterangepicker.css') }}" />

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

        <style>

            .head-logo-login img{
                max-height: 60px;

            }


            .admin-login{
                width: 100%;
                height: 100%;      
                background: #1D4350;  /* fallback for old browsers */
                background: -webkit-linear-gradient(to right, #A43931, #1D4350);  /* Chrome 10-25, Safari 5.1-6 */
                background: linear-gradient(to right, #A43931, #1D4350); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

            }

            .panel-login-admin{
                width: 300px;
                margin-top: 50px;
                border-radius: 10px;
                background-color: #f2f2f2;
            }

            /* style inputs and link buttons */
            input, .btn-lr{
                width: 100%;
                padding: 12px;
                border: none;
                border-radius: 4px;
                margin: 5px 0;
                opacity: 0.85;
                display: inline-block;
                font-size: 17px;
                line-height: 20px;
                text-decoration: none; /* remove underline from anchors */
            }

            input:hover{}
            .btn-lr:hover {
                opacity: 1;
                color : white;
            }

            /* add appropriate colors to fb, twitter and google buttons */


            /* style the submit button */
            input[type=submit] {
                background-color: #333333;
                color: #fff;
                cursor: pointer;
                border: 1px solid #333333;
                width: 50%;
                font-size: 25px;
                margin-left: 25%;
                margin-right: 25%;
                margin-top: 20px;
                opacity: 0.85;
                box-shadow: 0px 0px 2px rgba(0, 0, 0, 0.5);
            }

            input[type=submit]:hover {
                background-color: #333333;
                color: #fff;
                cursor: pointer;
                border: 1px solid #333333;
                width: 50%;
                font-size: 25px;
                margin-left: 25%;
                margin-right: 25%;
                opacity: 1;
            }

            input[type="text"], input[type="password"] {
                background-color: #ffffff;
                border: 0px solid #7F7FF5;
                width: 100%;
                font-size: 20px;
            }

            /* Two-column layout */
            .col {
                width: 100%;
                margin: auto;
                padding: 0 20px;

            }

            .col .login-head{
                padding-bottom: 10px;
                text-align: left;
            }
            
            .admin-login .login-content{
                padding: 150px 0;
            }

        </style>
    </head>
    <body>
        <section class="admin-login">
            <div class="login-content">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12" align="center">
                            <div class="panel panel-login-admin">
                                <div class="panel-heading">
                                    <div class="head-logo-login">
                                        <a href=""><img src="../images/logo.png" alt=""></a>
        <!--                                    <span style="text-align:center; font-size: 25px;">Administration</span>-->
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <form action="/action_page.php">
                                        <div class="row">                 
                                            <div class="col">
                                                <div class="login-head"> 
                                                    <span style="font-size: 20px; font-weight: 300;"><i class="fas fa-lock"></i> เข้าสู่ระบบ</span>
                                                </div> 
                                                <input type="text" name="username" placeholder="Username" required autofocus>
                                                <input type="password" name="password" placeholder="Password" required>
                                                <input type="submit" value="เข้าสู่ระบบ">                                   
                                            </div>

                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


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
        <script type="text/javascript" src="{{ asset('js/lib/pagination.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/lib/moment.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/lib/daterangepicker.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/lib/AutoNumeric.js') }}"></script>


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




