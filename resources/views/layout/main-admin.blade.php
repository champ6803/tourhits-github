<?php
session_start();
if (!isset($_SESSION['a_user'])) {
    header("location: /admin");
    exit(0);
}
?>
<!DOCTYPE html>
<html lang="en" style="zoom: 80%">
    <head>
        <style>
            fieldset 
            {
                border: 1px solid #ddd !important;
                margin: 0;
                xmin-width: 0;
                padding: 10px;       
                position: relative;
                border-radius:4px;
                background-color:#f5f5f5;
                padding-left:10px!important;
            }	
        </style>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <!--CSRF Token-->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!--        
                <link rel="icon" href="../images/favicon.ico">-->

        <title>@yield('page_title')</title>

        <!-- Bootstrap 4.0-->
        <link rel="stylesheet" href="../assets/vendor_components/bootstrap/dist/css/bootstrap.css">

        <!-- Bootstrap-extend -->
        <link rel="stylesheet" href="css/bootstrap-extend.css">

        <!-- Morris charts -->
        <link rel="stylesheet" href="../assets/vendor_components/morris.js/morris.css">

        <!-- weather weather -->
        <link rel="stylesheet" href="../assets/vendor_components/weather-icons/weather-icons.css">

        <!-- date picker -->
        <link rel="stylesheet" href="../assets/vendor_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.css">

        <!-- daterange picker -->
        <link rel="stylesheet" href="../assets/vendor_components/bootstrap-daterangepicker/daterangepicker.css">

        <!-- bootstrap wysihtml5 - text editor -->
        <link rel="stylesheet" href="../assets/vendor_plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.css">

        <link rel="stylesheet" href="{{ asset('css/lib/bootstrap-table.css')}}">

        <link rel="stylesheet" href="../assets/select2/dist/css/select2.css" >

        <!-- theme style -->
        <link rel="stylesheet" href="css/master_style.css">

        <!-- Lion_admin skins -->
        <link rel="stylesheet" href="{{ asset('css/skins/_all-skins.css') }}">

        <!-- CSS LIBRARY -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/lib/datatables.css') }}">


        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->


    </head>

    <body class="hold-transition skin-blue-light sidebar-mini">
        <div class="wrapper">
            <header class="main-header">
                <!-- Logo -->
                <a href="index.html" class="logo">

                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <b class="logo-mini">
                        <span class="light-logo"><img src="../images/logo-light.png" alt="logo"></span>
                        <span class="dark-logo"><img src="../images/logo-dark.png" alt="logo"></span>
                    </b>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg">
                        <img src="../images/logo-light-text.png" alt="logo" class="light-logo">
                        <img src="../images/logo-dark-text.png" alt="logo" class="dark-logo">
                    </span>
                </a>
                <!-- Header Navbar -->
                <nav class="navbar navbar-static-top">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>

                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">

                            <!-- <li class="search-box">
                                 <a class="nav-link hidden-sm-down" href="javascript:void(0)"><i class="mdi mdi-magnify"></i></a>
                                 <form class="app-search" style="display: none;">
                                     <input type="text" class="form-control" placeholder="Search &amp; enter"> <a class="srh-btn"><i class="ti-close"></i></a>
                                 </form>
                             </li>			
                            -->
                            <!-- Messages -->
                            <li class="dropdown messages-menu">
                                <!-- <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                     <i class="mdi mdi-email"></i>
                                 </a>-->
                                <ul class="dropdown-menu scale-up">
                                    <li class="header">You have 5 messages</li>
                                    <li>
                                        <ul class="menu inner-content-div">
                                            <li><!-- start message -->
                                                <a href="#">
                                                    <div class="pull-left">
                                                        <img src="../images/user2-160x160.jpg" class="rounded-circle" alt="User Image">
                                                    </div>
                                                    <div class="mail-contnet">
                                                        <h4>
                                                            Lorem Ipsum
                                                            <small><i class="fa fa-clock-o"></i> 15 mins</small>
                                                        </h4>
                                                        <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <!-- end message -->
                                            <li>
                                                <a href="#">
                                                    <div class="pull-left">
                                                        <img src="../images/user3-128x128.jpg" class="rounded-circle" alt="User Image">
                                                    </div>
                                                    <div class="mail-contnet">
                                                        <h4>
                                                            Nullam tempor
                                                            <small><i class="fa fa-clock-o"></i> 4 hours</small>
                                                        </h4>
                                                        <span>Curabitur facilisis erat quis metus congue viverra.</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <div class="pull-left">
                                                        <img src="../images/user4-128x128.jpg" class="rounded-circle" alt="User Image">
                                                    </div>
                                                    <div class="mail-contnet">
                                                        <h4>
                                                            Proin venenatis
                                                            <small><i class="fa fa-clock-o"></i> Today</small>
                                                        </h4>
                                                        <span>Vestibulum nec ligula nec quam sodales rutrum sed luctus.</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <div class="pull-left">
                                                        <img src="../images/user3-128x128.jpg" class="rounded-circle" alt="User Image">
                                                    </div>
                                                    <div class="mail-contnet">
                                                        <h4>
                                                            Praesent suscipit
                                                            <small><i class="fa fa-clock-o"></i> Yesterday</small>
                                                        </h4>
                                                        <span>Curabitur quis risus aliquet, luctus arcu nec, venenatis neque.</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <div class="pull-left">
                                                        <img src="../images/user4-128x128.jpg" class="rounded-circle" alt="User Image">
                                                    </div>
                                                    <div class="mail-contnet">
                                                        <h4>
                                                            Donec tempor
                                                            <small><i class="fa fa-clock-o"></i> 2 days</small>
                                                        </h4>
                                                        <span>Praesent vitae tellus eget nibh lacinia pretium.</span>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="footer"><a href="#">See all e-Mails</a></li>
                                </ul>
                            </li>
                            <!-- Notifications -->
                            <li class="dropdown notifications-menu">
                                <!--
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="mdi mdi-bell"></i>
                                </a>-->
                                <ul class="dropdown-menu scale-up">
                                    <li class="header">You have 7 notifications</li>
                                    <li>
                                        <!-- inner menu: contains the actual data -->
                                        <ul class="menu inner-content-div">
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-users text-aqua"></i> Curabitur id eros quis nunc suscipit blandit.
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-warning text-yellow"></i> Duis malesuada justo eu sapien elementum, in semper diam posuere.
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-users text-red"></i> Donec at nisi sit amet tortor commodo porttitor pretium a erat.
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-shopping-cart text-green"></i> In gravida mauris et nisi
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-user text-red"></i> Praesent eu lacus in libero dictum fermentum.
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-user text-red"></i> Nunc fringilla lorem 
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-user text-red"></i> Nullam euismod dolor ut quam interdum, at scelerisque ipsum imperdiet.
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="footer"><a href="#">View all</a></li>
                                </ul>
                            </li>
                            <!-- Tasks -->
                            <li class="dropdown tasks-menu">
                                <!-- 
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="mdi mdi-message"></i>
                                </a>-->
                                <ul class="dropdown-menu scale-up">
                                    <li class="header">You have 6 tasks</li>
                                    <li>
                                        <!-- inner menu: contains the actual data -->
                                        <ul class="menu inner-content-div">
                                            <li><!-- Task item -->
                                                <a href="#">
                                                    <h3>
                                                        Lorem ipsum dolor sit amet
                                                        <small class="pull-right">30%</small>
                                                    </h3>
                                                    <div class="progress xs">
                                                        <div class="progress-bar progress-bar-aqua" style="width: 30%" role="progressbar"
                                                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                            <span class="sr-only">30% Complete</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <!-- end task item -->
                                            <li><!-- Task item -->
                                                <a href="#">
                                                    <h3>
                                                        Vestibulum nec ligula
                                                        <small class="pull-right">20%</small>
                                                    </h3>
                                                    <div class="progress xs">
                                                        <div class="progress-bar progress-bar-danger" style="width: 20%" role="progressbar"
                                                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                            <span class="sr-only">20% Complete</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <!-- end task item -->
                                            <li><!-- Task item -->
                                                <a href="#">
                                                    <h3>
                                                        Donec id leo ut ipsum
                                                        <small class="pull-right">70%</small>
                                                    </h3>
                                                    <div class="progress xs">
                                                        <div class="progress-bar progress-bar-light-blue" style="width: 70%" role="progressbar"
                                                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                            <span class="sr-only">70% Complete</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <!-- end task item -->
                                            <li><!-- Task item -->
                                                <a href="#">
                                                    <h3>
                                                        Praesent vitae tellus
                                                        <small class="pull-right">40%</small>
                                                    </h3>
                                                    <div class="progress xs">
                                                        <div class="progress-bar progress-bar-yellow" style="width: 40%" role="progressbar"
                                                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                            <span class="sr-only">40% Complete</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <!-- end task item -->
                                            <li><!-- Task item -->
                                                <a href="#">
                                                    <h3>
                                                        Nam varius sapien
                                                        <small class="pull-right">80%</small>
                                                    </h3>
                                                    <div class="progress xs">
                                                        <div class="progress-bar progress-bar-red" style="width: 80%" role="progressbar"
                                                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                            <span class="sr-only">80% Complete</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <!-- end task item -->
                                            <li><!-- Task item -->
                                                <a href="#">
                                                    <h3>
                                                        Nunc fringilla
                                                        <small class="pull-right">90%</small>
                                                    </h3>
                                                    <div class="progress xs">
                                                        <div class="progress-bar progress-bar-primary" style="width: 90%" role="progressbar"
                                                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                            <span class="sr-only">90% Complete</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <!-- end task item -->
                                        </ul>
                                    </li>
                                    <li class="footer">
                                        <a href="#">View all tasks</a>
                                    </li>
                                </ul>
                            </li>
                            <!-- User Account -->
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="../images/logo.png" style="background-color: #fff" class="user-image rounded-circle" alt="User Image">
                                </a>
                                <ul class="dropdown-menu scale-up">
                                    <!-- User image -->
                                    <!-- Menu Body -->
                                    <li class="user-body">
                                        <div class="row no-gutters">
                                            <div class="col-12 text-left">
                                                <a href="{{url('logout')}}"><i class="fa fa-power-off"></i> Logout</a>
                                            </div>				
                                        </div>
                                        <!-- /.row -->
                                    </li>
                                </ul>
                            </li>
                            <!-- Control Sidebar Toggle Button -->
                            <li>
                              <!--   <a href="#" data-toggle="control-sidebar"><i class="fa fa-cog fa-spin"></i></a>-->
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>

            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="ulogo">
                            <a href="index.html">
                                <!-- logo for regular state and mobile devices -->
                                <span><b>Tourhits </b>Admin</span>
                            </a>
                        </div>
                        <div class="image">
                            <img src="../images/logo.png" class="rounded-circle" alt="User Image">
                        </div>
                        <div class="info">
                            <p>Tour Management</p>
                        </div>
                    </div>
                    <!-- sidebar menu -->
                    <ul class="sidebar-menu" data-widget="tree">
                        <li class="nav-devider"></li>
                        <li class="header nav-small-cap">MENU</li>
                        <li id="dashboard_main" class="treeview">
                            <a href="#">
                                <i class="fa fa-clipboard"></i> <span>Dashboard</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-right pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="{{ url('/order-list')}}">Dashboard</a></li>
                                <li id="order_list"><a href="{{ url('/order-list')}}">รายการการจอง</a></li>
                            </ul>
                        </li>
                        <li id="manage_front" class="treeview">
                            <a href="#">
                                <i class="fa fa-pencil-square"></i>
                                <span>จัดการหน้าเว็บ</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-right pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="pages/app/app-chat.html">จัดการแบนเนอร์</a></li>
                                <li id="manage_front_country"><a href="{{ url('manage-front-country')}}">จัดการประเทศ</a></li>
                                <li id="manage_front_category"><a href="{{ url('manage-front-category') }}">จัดการหมวดหมู่หน้าบ้าน</a></li>
                                <li><a href="pages/app/app-ticket.html">จัดการสปอนเซอร์</a></li>
                                <li id="manage_front_review"><a href="{{ url('manage-front-review') }}">จัดการรีวิว</a></li>
                                <li><a href="{{ url('profile')}}">จัดการการติดต่อ</a></li>
                            </ul>
                        </li>
                        <li id="managetour" class="treeview">
                            <a href="#">
                                <i class="fa fa-database"></i> <span>จัดการรายการทัวร์</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-right pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li id="manage_tourlist"><a href="{{ url('manage-tourlist')}}">เพิ่มรายการทัวร์</a></li>
                                <li id="tour_package_list"><a href="{{ url('tour-package-list')}}">รายการทัวร์ทั้งหมด</a></li>
                                <!--<li id="showTourCountryMenu"><a href="{{ url('show-country-tourlist')}}">รายการทัวร์แต่ละประเทศ</a></li>-->
                                <li id="status_package"><a href="{{ url('status-package')}}">สถานะแพ็คเกจทัวร์</a></li>
                            </ul>
                        </li>
                        <li id="managemaster" class="treeview">
                            <a href="#">
                                <i class="fa fa-database"></i> <span>ข้อมูลมาสเตอร์</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-right pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li id="categoryMenu"><a href="{{ url('manage-category')}}">จัดการหมวดหมู่</a></li>
                                <!--<li id="conditionsMenu"><a href="{{ url('manage-conditions')}}">จัดการเงื่อนไข</a></li>-->
                                <li id="tagMenu"><a href="{{ url('manage-tag')}}">จัดการ Tags</a></li>
                                <li id="otherMenu"><a href="{{ url('manage-othertag')}}">จัดการ Tags อื่นๆ</a></li>
                                <li id="attractionMenu"><a href="{{ url('manage-attraction')}}">จัดการสถานที่ท่องเที่ยว</a></li>
                                <li id="airlineMenu"><a href="{{ url('manage-airline')}}">จัดการสายการบิน</a></li>
                                <li id="routeMenu"><a href="{{ url('manage-route')}}">จัดการเส้นทาง</a></li>
                                <li id="holidayMenu"><a href="{{ url('manage-holiday')}}">จัดการวันหยุด</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-id-card"></i>
                                <span>ลูกค้า</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-right pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="pages/UI/badges.html">รายชื่อลูกค้า</a></li>
                                <li><a href="pages/UI/border-utilities.html">ประวัติการจอง</a></li>		  
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-book"></i>
                                <span>จัดการการจองทัวร์</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-right pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="pages/widgets/blog.html">รายการจองทั้งหมด</a></li>
                                <li><a href="pages/widgets/chart.html">สถานะการจอง</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-credit-card"></i>
                                <span>การขาย</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-right pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="pages/layout/boxed.html">ใบเสนอราคา</a></li>
                                <li><a href="pages/layout/fixed.html">ใบวางบิล / ใบแจ้งหนี้</a></li>
                                <li><a href="pages/layout/collapsed-sidebar.html">ใบเสร็จ</a></li>
                            </ul>
                        </li>		
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-square-o"></i>
                                <span>ผู้ดูแล</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-right pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="pages/box/advanced.html">จัดการผู้ดูแล</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-pie-chart"></i>
                                <span>การแจ้งเตือน</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-right pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="pages/charts/chart/chartjs.html">จัดการ Template</a></li>
                            </ul>
                        </li>
                        <li id="blog_manage" class="treeview">
                            <a href="#">
                                <i class="fa fa-edit"></i> <span>Blog</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-right pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li id="article_manage"><a href="{{ url('article-manage') }}">จัดการบทความ</a></li>
                            </ul>
                        </li>      

                    </ul>
                </section>
            </aside>

            <!-- Content Wrapper. Contains page content -->
            @yield('main-content')
            <!-- /.content-wrapper -->
            <footer class="main-footer">
                <!--
                <div class="pull-right d-none d-sm-inline-block">
                    <ul class="nav nav-primary nav-dotted nav-dot-separated justify-content-center justify-content-md-end">
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0)">FAQ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://themeforest.net/item/lion-responsive-bootstrap-4-admin-dashboard-template-and-webapp-template/21335238">Purchase Now</a>
                        </li>
                    </ul>
                </div>
                &copy; 2018 <a href="https://www.multipurposethemes.com/">Tourhits</a>. All Rights Reserved.
                -->
            </footer>
            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Create the tabs -->
                <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
                    <li class="nav-item"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
                    <li class="nav-item"><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-cog fa-spin"></i></a></li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <!-- Home tab content -->
                    <div class="tab-pane" id="control-sidebar-home-tab">
                        <h3 class="control-sidebar-heading">Recent Activity</h3>
                        <ul class="control-sidebar-menu">
                            <li>
                                <a href="javascript:void(0)">
                                    <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                                    <div class="menu-info">
                                        <h4 class="control-sidebar-subheading">Admin Birthday</h4>

                                        <p>Will be July 24th</p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <i class="menu-icon fa fa-user bg-yellow"></i>

                                    <div class="menu-info">
                                        <h4 class="control-sidebar-subheading">Jhone Updated His Profile</h4>

                                        <p>New Email : jhone_doe@demo.com</p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

                                    <div class="menu-info">
                                        <h4 class="control-sidebar-subheading">Disha Joined Mailing List</h4>

                                        <p>disha@demo.com</p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <i class="menu-icon fa fa-file-code-o bg-green"></i>

                                    <div class="menu-info">
                                        <h4 class="control-sidebar-subheading">Code Change</h4>

                                        <p>Execution time 15 Days</p>
                                    </div>
                                </a>
                            </li>
                        </ul>
                        <!-- /.control-sidebar-menu -->

                        <h3 class="control-sidebar-heading">Tasks Progress</h3>
                        <ul class="control-sidebar-menu">
                            <li>
                                <a href="javascript:void(0)">
                                    <h4 class="control-sidebar-subheading">
                                        Web Design
                                        <span class="label label-danger pull-right">40%</span>
                                    </h4>

                                    <div class="progress progress-xxs">
                                        <div class="progress-bar progress-bar-danger" style="width: 40%"></div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <h4 class="control-sidebar-subheading">
                                        Update Data
                                        <span class="label label-success pull-right">75%</span>
                                    </h4>

                                    <div class="progress progress-xxs">
                                        <div class="progress-bar progress-bar-success" style="width: 75%"></div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <h4 class="control-sidebar-subheading">
                                        Order Process
                                        <span class="label label-warning pull-right">89%</span>
                                    </h4>

                                    <div class="progress progress-xxs">
                                        <div class="progress-bar progress-bar-warning" style="width: 89%"></div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <h4 class="control-sidebar-subheading">
                                        Development 
                                        <span class="label label-primary pull-right">72%</span>
                                    </h4>

                                    <div class="progress progress-xxs">
                                        <div class="progress-bar progress-bar-primary" style="width: 72%"></div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                        <!-- /.control-sidebar-menu -->

                    </div>
                    <!-- /.tab-pane -->
                    <!-- Stats tab content -->
                    <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
                    <!-- /.tab-pane -->
                    <!-- Settings tab content -->
                    <div class="tab-pane" id="control-sidebar-settings-tab">
                        <form method="post">
                            <h3 class="control-sidebar-heading">General Settings</h3>

                            <div class="form-group">
                                <input type="checkbox" id="report_panel" class="chk-col-grey" >
                                <label for="report_panel" class="control-sidebar-subheading ">Report panel usage</label>

                                <p>
                                    general settings information
                                </p>
                            </div>
                            <!-- /.form-group -->

                            <div class="form-group">
                                <input type="checkbox" id="allow_mail" class="chk-col-grey" >
                                <label for="allow_mail" class="control-sidebar-subheading ">Mail redirect</label>

                                <p>
                                    Other sets of options are available
                                </p>
                            </div>
                            <!-- /.form-group -->

                            <div class="form-group">
                                <input type="checkbox" id="expose_author" class="chk-col-grey" >
                                <label for="expose_author" class="control-sidebar-subheading ">Expose author name</label>

                                <p>
                                    Allow the user to show his name in blog posts
                                </p>
                            </div>
                            <!-- /.form-group -->

                            <h3 class="control-sidebar-heading">Chat Settings</h3>

                            <div class="form-group">
                                <input type="checkbox" id="show_me_online" class="chk-col-grey" >
                                <label for="show_me_online" class="control-sidebar-subheading ">Show me as online</label>
                            </div>
                            <!-- /.form-group -->

                            <div class="form-group">
                                <input type="checkbox" id="off_notifications" class="chk-col-grey" >
                                <label for="off_notifications" class="control-sidebar-subheading ">Turn off notifications</label>
                            </div>
                            <!-- /.form-group -->

                            <div class="form-group">
                                <label class="control-sidebar-subheading">              
                                    <a href="javascript:void(0)" class="text-red margin-r-5"><i class="fa fa-trash-o"></i></a>
                                    Delete chat history
                                </label>
                            </div>
                            <!-- /.form-group -->
                        </form>
                    </div>
                    <!-- /.tab-pane -->
                </div>
            </aside>
            <!-- /.control-sidebar -->

            <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
            <div class="control-sidebar-bg"></div>

        </div>
        <!-- ./wrapper -->



        <!-- jQuery 3 -->
        <script src="../assets/vendor_components/jquery/dist/jquery.js"></script>

        <!-- popper -->
        <!--<script src="../assets/vendor_components/popper/dist/popper.min.js"></script>-->

        <!-- Bootstrap 4.0-->
        <script src="../assets/vendor_components/bootstrap/dist/js/bootstrap.js"></script>

        <!-- Morris.js charts -->
        <script src="../assets/vendor_components/raphael/raphael.min.js"></script>
        <script src="../assets/vendor_components/morris.js/morris.min.js"></script>	

        <!-- weather for demo purposes -->
        <script src="../assets/vendor_plugins/weather-icons/WeatherIcon.js"></script>

        <!-- Sparkline -->
        <script src="../assets/vendor_components/jquery-sparkline/dist/jquery.sparkline.js"></script>

        <!-- daterangepicker -->
        <script src="../assets/vendor_components/moment/min/moment.min.js"></script>
        <script src="../assets/vendor_components/bootstrap-daterangepicker/daterangepicker.js"></script>

        <!-- datepicker -->
        <script src="../assets/vendor_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.js"></script>

        <!-- CK Editor -->
        <script src="../../../assets/vendor_components/ckeditor/ckeditor.js"></script>

        <!-- Bootstrap WYSIHTML5 -->
        <script src="../assets/vendor_plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.js"></script>

        <!-- Slimscroll -->
        <script src="../assets/vendor_components/jquery-slimscroll/jquery.slimscroll.js"></script>

        <!-- FastClick -->
        <script src="../assets/vendor_components/fastclick/lib/fastclick.js"></script>

        <!-- peity -->
        <script src="../assets/vendor_components/jquery.peity/jquery.peity.js"></script>

        <script src="{{ asset('js/lib/datatables.js')}}"></script>

        <script src="{{ asset('js/lib/angular.js')}}"></script>

        <script src="{{ asset('js/lib/bootstrap-table.js')}}"></script>

        <script src="{{ asset('js/lib/bootstrap-table-editable.js')}}"></script>
        
        <script type="text/javascript" src="{{ asset('js/lib/AutoNumeric.js') }}"></script>

        <script type="text/javascript" src="../assets/select2/dist/js/select2.min.js"></script>

        <!-- Lion_admin App -->
        <script src="js/template.js"></script>
        
        <script type="text/javascript">
            var base_path = "{{ url('/') }}";
        </script>

        <!-- Lion_admin for demo purposes -->
        <script src="js/demo.js"></script>
        <script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
        @yield('footer_scripts')
    </body>
</html>