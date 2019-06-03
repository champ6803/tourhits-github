@extends('layout.main')
@section('page_title','Tour Detail')
@section('main-content')
<style>
    body {
        counter-reset: count;
    }

    .product-detail{
        background-color: #F7F7F7;

    }

    .trip-schedule-accordion .days{    
        counter-increment: count;
        margin-bottom: 5px;
        padding: 0 10px 0 10px;
    }

    .trip-schedule-accordion .days::before {
        content: counter(count);
        /*    ส้ม*/
        /*    background-color: #F6A95B; */
        background-color:#EC2424;
        display: inline-block;
        width: 32px;
        height: 32px;
        line-height: 30px;
        color: #fff;
        text-align: center;
        margin-top: 5px;
        font-weight: 700;
        /*        border: 2px solid #EC2424;*/
        -webkit-border-radius: 50%;
        -moz-border-radius: 50%;
        -ms-border-radius: 50%;
        -o-border-radius: 50%;
        border-radius: 50%;
        -webkit-transition: all 0.3s ease;
        -moz-transition: all 0.3s ease;
        -ms-transition: all 0.3s ease;
        -o-transition: all 0.3s ease;
        transition: all 0.3s ease;
    }

    .trip-schedule-accordion .condi{    
        font-size: 15px;
    }
    .trip-schedule-accordion .condi {
        background-color:#EC2424;
        display: inline-block;
        width: 32px;
        height: 32px;
        line-height: 30px;
        color: #fff;
        text-align: center;
        margin-top: 5px;
        font-weight: 700;
        border: 2px solid #EC2424;
        -webkit-border-radius: 50%;
        -moz-border-radius: 50%;
        -ms-border-radius: 50%;
        -o-border-radius: 50%;
        border-radius: 50%;
        -webkit-transition: all 0.3s ease;
        -moz-transition: all 0.3s ease;
        -ms-transition: all 0.3s ease;
        -o-transition: all 0.3s ease;
        transition: all 0.3s ease;
    }

    .trip-schedule-accordion .detail-condi ul li{
        font-size: 21px;
        color: #333;
        line-height: 1.4;
    }

    .accordion .ui-state-active,
    .accordion .ui-widget-content .ui-state-active {
        color: #fff;
        box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
    }

    .tabs .ui-tabs-nav li.ui-tabs-active .ui-tabs-anchor {
        color: #EC2424;
        border-bottom-color: #EC2424;

    }

    .trip-schedule-accordion h5 {
        background-color: #F6A95B;
        width: 110px;
        padding-left: 10px;
        border-bottom-right-radius: 8px;
        border-top-right-radius: 8px;
        box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
    }

    .product-detail__info .product-title h2{
        color: #b5292e;
        display: inline;
        font-size: 23px;
    }


    .modal-content{-webkit-box-shadow:  0 4px 10px 0 rgba(0,0,0,.12);box-shadow: 0 4px 10px 0 rgba(0,0,0,.12);}
    .table{margin-top: 10px;}

    .product-detail .right{
        float: right;
    }

    .product-detail .download-pdf p a{
        display: inline-block;
        padding-right: 17px;
        color: #fff;
        font-family: 'Bai Jamjuree', sans-serif;
        font-size: 11px;
        font-weight: bold;   
        border: 1px solid #c33132;
        background-color: #c33132;
        padding: 0 14px;
        border-radius: 40px; 
        line-height: 27px;
        margin-top: 0.5rem;
        margin-bottom: 0.5rem;
        -webkit-box-shadow:  0 0px 5px 0 rgba(0,0,0,.1); 
        box-shadow: 0 0px 5px 0 rgba(0,0,0,.1);      
    }

    .product-detail .download-pdf p a:hover{
        background-color: #ed5565;
        border: 1px solid #ed5565;
        -webkit-box-shadow:  0 0px 5px 0 rgba(0,0,0,.1); 
        box-shadow: 0 0px 5px 0 rgba(0,0,0,.1);
    }

    .product-detail .facebook{padding-left: 10px; padding-right: 14px;}
    .product-detail .facebook p a{
        display: inline-block;
        padding-right: 17px;
        color: #fff;
        font-size: 11px;    
        border: 1px solid #3b5998;
        background-color: #3b5998;
        padding: 2px 13px;
        border-radius: 50%; 
        line-height: 27px;
        margin-top: 0.5rem;
        margin-bottom: 0.5rem;
        -webkit-box-shadow:  0 0px 5px 0 rgba(0,0,0,.1); 
        box-shadow: 0 0px 5px 0 rgba(0,0,0,.1); 
    }
    .product-detail .facebook p a:hover{
        background-color: #8b9dc3;
        border: 1px solid #8b9dc3;
    }

    .ui-accordion .ui-accordion-content{
        padding: 0;
    }

    .trip-schedule-accordion .detail-condi ul li{
        font-family: 'Bai Jamjuree', sans-serif;
        font-size: 14px;
        font-weight: bold;
    }

    @media (min-width: 992px) and (max-width: 1400px) {
        .product-detail__info .trips .item-width{
            width: 100%;
        }

        .product-detail__info .trips .item-width:nth-child(2){
            width: 100%;
            padding-left: 15px;
        }

        .call-to-book, .book-by-line{width: 100%;}
        .booking-info label{font-size:13px;}
    }

    @media (max-width: 425px) {
        .product-detail__info .product-title h2{font-size: 20px;}
        .Top3-detail .ex .heading span{font-size: 20px;}

        .period-table-bottom .pricename-xs{
            display: inline;
            font-size: 19px;
        }
        .period-table-bottom table tr td span{
            display: block;
        }
        .period-table-bottom table th:nth-child(2), .period-table-bottom table th:nth-child(3), .period-table-bottom table th:nth-child(4){
            display: none;
        }

        .period-table-bottom table td:nth-child(2), .period-table-bottom table td:nth-child(3), .period-table-bottom table td:nth-child(4){
            display: none;
        }

        .period-table-bottom thead th:nth-child(1),.period-table-bottom tbody td:nth-child(1) {
            width:70%;
            float: left;
        }

        .period-table-bottom thead th:nth-child(5),.period-table-bottom tbody td:nth-child(5) {
            width:30%;
            float: left;      
        }

        .period-table-bottom tbody:before{
            display:none !important;
        }

        .flexible-container {
            padding-bottom:75%!important;
        }


        .product-detail__info .product-address p{
            font-size: 13px;
        }
        .product-detail__info .trips .warp-text p{
            font-size: 14px;
            padding: 15px 14px 10px 14px;
        }

        .call-to-book a, .book-by-line a{border: none;}
        .inbox-fb {border-right: 1px solid;}
        .book-by-line span{font-size:14px!important;}
    }

    /* Flexible iFrame */

    .flexible-container {
        position: relative;
        /* This blank line was probably:
        || padding-top: 56.25%;
        */
        height: 0;
        overflow: hidden;
        padding-bottom:50%; 
        padding-top: 56.25%;
    }

    /* This ruleset says:
    || "Apply the following properties and their values to ANY `<iframe>`,
    || `<object>`, or `<embed>` THAT IS A CHILD OF any element with the 
    || class of `.flexible-container`.
    */
    .flexible-container iframe,   
    .flexible-container object, 
    .flexible-container embed {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height:100%;
        /*            max-height:800px;*/
        padding-bottom:10px;
    }

    #owl-demo .tag-item{
        display: block;
        background: #d7d7d7;
        width: auto;
        margin-right: 10px;
        border-radius: 15px;
        -webkit-border-radius: 15px;
        -moz-border-radius: 15px;
        text-align: center;
        margin: 10px;
        border: 1px solid #d7d7d7;
        -webkit-transition: all 1s ease;
        -o-transition: all 1s ease;
        transition: all 1s ease;
        /*    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);*/
    }

    #owl-demo .tag-item:hover{
        border-color: #34495e;
        background-color: #34495e;
        opacity: 0.8;

    }

    #owl-demo .tag-item:hover a{
        color : #Fff; 
    }


    #owl-demo .tag-item a{
        color : #363636;
        font-size: 15px;
        font-weight: bold;
        padding: 5px 10px;
        line-height: 2;   
    }

</style>
<style>
    iframe{
        overflow:hidden !important;
    }
    .table-style .today {background: #fd6149; color: #ffffff;}
    /*    .table-style th:nth-of-type(7),td:nth-of-type(7) {color: blue;}
        .table-style th:nth-of-type(1),td:nth-of-type(1) {color: red;}*/
    .table-style tr:first-child th{background-color: #fd6149; text-align:center; text-transform: uppercase; border-color: #fd6149; font-size: 22px; font-weight: normal;}
    .table-bordered > tbody > tr > th{font-size: 19px; background-color: white; color: #c33132;}
    .table-bordered > tbody > tr > td{font-size: 17px; font-weight: bold;}
</style>
<?php
// Set your timezone!!
date_default_timezone_set('Asia/Bangkok');

// Get prev & next month
if (isset($_GET['ym'])) {
    $ym = $_GET['ym'];
} else {
    // This month


    $ym = date('Y-m');
}

// Check format
$timestamp = strtotime($ym, "-01");
if ($timestamp === false) {
    $timestamp = time();
}

// Today
$today = date('Y-m-j', time());

// For H3 title
$year = date('Y', $timestamp);

$year = $year + 543;

$month = date('M', $timestamp);
if ($month === "Jan")
    $month = "มกราคม";
else if ($month === "Feb")
    $month = "กุมภาพันธ์";
else if ($month === "Mar")
    $month = "มีนาคม";
else if ($month === "Apr")
    $month = "เมษายน";
else if ($month === "May")
    $month = "พฤษภาคม";
else if ($month === "Jun")
    $month = "มิถุนายน";
else if ($month === "Jul")
    $month = "กรกฎาคม";
else if ($month === "Aug")
    $month = "สิงหาคม";
else if ($month === "Sep")
    $month = "กันยายน";
else if ($month === "Oct")
    $month = "ตุลาคม";
else if ($month === "Nov")
    $month = "พฤศจิกายน";
else if ($month === "Dec")
    $month = "ธันวาคม";

$html_title = $month . " - " . $year;

// Create prev & next month link     mktime(hour,minute,second,month,day,year)
$prev = date('Y-m', mktime(0, 0, 0, date('m', $timestamp) - 1, 1, date('Y', $timestamp)));
$next = date('Y-m', mktime(0, 0, 0, date('m', $timestamp) + 1, 1, date('Y', $timestamp)));

// Number of days in the month
$day_count = date('t', $timestamp);

// 0:Sun 1:Mon 2:Tue ...
$str = date('w', mktime(0, 0, 0, date('m', $timestamp), 1, date('Y', $timestamp)));


// Create Calendar!!
$weeks = array();
$week = '';

// Add empty cell
$week .= str_repeat('<td></td>', $str);

for ($day = 1; $day <= $day_count; $day++, $str++) {

    $date = $ym . '-' . $day;

    if ($today == $date) {
        $week .= '<td class="today">' . $day;
    } else {
        $week .= '<td>' . $day;
    }
    $week .= '</td>';

    // End of the week OR End of the month
    if ($str % 7 == 6 || $day == $day_count) {

        if ($day == $day_count) {
            // Add empty cell
            $week .= str_repeat('<td></td>', 6 - ($str % 7));
        }

        $weeks[] = '<tr>' . $week . '</tr>';

        // Prepare for new week
        $week = '';
    }
}
?>
<!-- BREADCRUMB -->
<section>
    <div class="container">
        <div class="breadcrumb">
            <ul>
                <li><a href="{{url('/')}}">แพ็คเกจทัวร์</a></li>
                <li><a href="{{ URL::to('tour/' .$tourPackage->tour_country_url)}}">{{$tourPackage->tour_country_name}}</a></li>
                <li><a href="{{url('tour-detail/' .$tourPackage->tour_country_url. '/' .$tourPackage->tour_package_id. '/'.$tourPackage->tour_package_code)}}">{{$tourPackage->tour_package_name}}</a></li>
            </ul>
        </div>
    </div>
</section>
<!-- BREADCRUMB -->

<section class="product-detail">
    <div class="container">

        <div class="row">   
            <div class="col-md-12 tour-local-wrapper">

                <div id="owl-demo" class="tag-container owl-carousel owl-theme">
                    @foreach ($tagList as $tag)
                    <div class="tag-item"><a href="{{url('/tour/'.$tag->tag_url)}}">{{$tag->t_name}}</a></div>
                    @endforeach
                </div>
                <div class="swiper-button-next next"><i class="fa fa-angle-right"></i></div>
                <div class="swiper-button-prev swiper-button-disabled prev"><i class="fa fa-angle-left"></i></div>
            </div>
        </div>  

        <div class="row visible-xs">         
            <div class="right facebook">
                <p><a target="_blank" href="https://www.facebook.com/PAGE.TOURHITS"><i class="fab fa-facebook-f"></i></a></p>
            </div>
            <div class="right download-pdf">
                <p><a href="{{url('download_pdf/' .$tourPackage->tour_package_id)}}"><i class="far fa-file-pdf" style="font-size:17px; line-height: 27px;"></i>&nbsp;ดาวน์โหลดไฟล์ PDF</a></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="product-detail__info"> 
                    <div class="product-tag-id">
                        <img src="{{ asset('/images/icon/barcode.png')}}">
                        <span>รหัสทัวร์ | TH</span><span id='tour_code'><img src="{{ asset('/images/icon/beating.gif')}}"></span><span> | {{ $tourPackage->tour_package_code }}</span>
                        <div class="right facebook hidden-xs">
                            <p><a target="_blank" href="https://www.facebook.com/PAGE.TOURHITS"><i class="fab fa-facebook-f"></i></a></p>
                        </div>
                        <div class="right download-pdf hidden-xs">
                            <p><a href="{{url('download_pdf/' .$tourPackage->tour_package_id)}}"><i class="far fa-file-pdf" style="font-size:20px; line-height: 27px;"></i>&nbsp;ดาวน์โหลดไฟล์ PDF</a></p>
                        </div>

                    </div>

                    <div class="product-title">
                        <h2>{{ $tourPackage->tour_package_name }}</h2>
                    </div>
                    <div class="product-address">
                        <?php echo $tourPackage->tour_package_detail ?>
                    </div>
                    <!--                    <div class="trips">
                                            <div class="item warp-text">
                                                <h6>สายการบิน</h6>
                                                <p><i class="fab fa-telegram-plane" style="padding-right: 10px"></i>{{ $tourPackage->airline_name }}</p>
                                            </div>
                                            <div class="item warp-text">
                                                <h6>ระยะเวลา</h6>
                                                <p><i class="far fa-clock" style="padding-right: 10px"></i>{{$tourPackage->tour_period_day_number}} วัน {{$tourPackage->tour_period_night_number}} คืน</p>
                                            </div>
                                            <div class="time-xs item warp-text">
                                                <h6>ช่วงเวลา</h6>
                                                <p><i class="far fa-calendar-minus" style="padding-right: 10px"></i><span id='period_month'></span></p>
                                            </div>
                                            <div class="item warp-text">
                                                <h6>รหัสทัวร์</h6>
                                                <p><i class="fas fa-barcode" style="padding-right: 10px"></i>TH<span id='tour_code'></span></p>
                                            </div>
                                        </div>-->
                    <!--  กิน เที่ยว ช๊อป-->
                    <!--                    <div class="row">
                                            <div class="col-md-12">
                                                <div class="Top3-detail">
                                                    <div class="col-md-4">
                                                        <div class="travel ex">
                                                            <div class="heading"><img src="{{ asset('/images/icon/thirteen.png')}}"><span>เที่ยว</span></div>
                                                            <div class="detail">
                                                                <p>ใกล้จะถึงช่วงเทศกาลปีใหม่แล้ว</p>
                                                                <p>อีกหนึ่งเทศกาลแห่งวันหยุดยาวที่เหมาะแก่การพักผ่อนรับลมหนาวสุดฟิน</p>
                                                                <p>วัดอาซากุสะ</p>
                                                                <p>โอชิโนะ ฮัคไค</p>
                                                                <p>ฟูจิออนเซ็น</p>
                                                                <p>ภูเขาไฟฟูจิ</p>
                                                                <p>วัดนาริตะ</p>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="eat ex">
                                                            <div class="heading"><img src="{{ asset('/images/icon/sausages.png')}}"><span>กิน</span></div>
                                                            <div class="detail">
                                                                <p>ชวนเช็คอินร้านอาหารสุดฟิน</p>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="shopping ex">
                                                            <div class="heading"><img src="{{ asset('/images/icon/shopping-bag.png')}}"><span>ช้อป</span></div>
                                                            <div class="detail">
                                                                <p>ช้อปได้ทั่วโลกในราคานักท่องเที่ยว</p>
                                                                <p>สิ้นค้า Outlet มากมาย</p>
                                                            </div>
                                                        </div> 
                                                    </div>
                    
                                                </div>
                                            </div>
                                        </div>-->
                    <!--  ทริป/ปฎิทิน-->
                    <div class="row">
                        <div class="col-md-5 col-sm-6">                           
                            <div class="trips">
                                <div class="item-width item warp-text">
                                    <h4><i class="fab fa-telegram-plane" style="padding-right: 10px"></i>สายการบิน</h4>
                                    <p>{{ $tourPackage->airline_name }}</p>
                                </div>
                                <div class="item-width item warp-text">
                                    <h4><i class="fas fa-moon" style="padding-right: 5px"></i>ระยะเวลา</h4>
                                    <p>{{$tourPackage->tour_period_day_number}} วัน {{$tourPackage->tour_period_night_number}} คืน</p>
                                </div>
                                <div class="item warp-text">
                                    <h4>ช่วงเวลาของทัวร์นี้</h4>
                                    <p><span id='period_month'></span></p>
                                </div>
                                <!--                                <div class="item warp-text">
                                                                    <h4>รหัสทัวร์</h4>
                                                                    <p><i class="fas fa-barcode" style="padding-right: 10px"></i>TH<span id='tour_code'></span></p>
                                                                </div>-->
                            </div> 
                        </div>
                        <div class="col-md-7 col-sm-6">
                            <table class="table table-bordered table-style table-responsive">
                                <tr>
                                    <th colspan="2"><a style="color: #ffffff;" href="?ym=<?php echo $prev; ?>"><i class="fa fa-chevron-left"></i></a></th>
                                    <th colspan="3" style="color:#ffffff;"> <?php echo $html_title; ?></th>
                                    <th colspan="2"><a style="color: #ffffff;" href="?ym=<?php echo $next; ?>"><i class="fa fa-chevron-right"></i></a></th>
                                </tr>
                                <tr class="hidden-xs">
                                    <th>อาทิตย์</th>
                                    <th>จันทร์</th>
                                    <th>อังคาร</th>
                                    <th>พุธ</th>
                                    <th>พฤหัส</th>
                                    <th>ศุกร์</th>
                                    <th>เสาร์</th>
                                </tr>
                                <tr class="visible-xs">
                                    <th>อา.</th>
                                    <th>จ.</th>
                                    <th>อ.</th>
                                    <th>พ.</th>
                                    <th>พฤ.</th>
                                    <th>ศ.</th>
                                    <th>ส.</th>
                                </tr>
                                <?php
                                foreach ($weeks as $week) {
                                    echo $week;
                                };
                                ?>
                            </table>
                        </div>
                    </div>


                    <!-- <div class="rating-trip-reviews">
                        <div class="item good">
                            <span class="count">7.5</span>
                            <h6>Average rating</h6>
                            <p>Good</p>
                        </div>
                        <div class="item">
                            <h6>TripAdvisor ></h6>
                            <img src="images/trips.png" alt="">
                        </div>
                        <div class="item">
                            <h6>Reviews</h6>
                            <p>No review yet</p>
                        </div>
                    </div> -->

                    <!-- End Column -->
                    <!--                    <div id="calendar" class="animated animated-sm bounceInUp">
                                            <div class="panel panel-default">
                                                <div class="panel-body">
                                                    <div class="calendar fc fc-ltr">
                                                        <table class="fc-header" style="width:100%">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="fc-header-left">
                                                                         <span class="fc-button fc-button-prev fc-state-default fc-corner-left" unselectable="on"><span class="fc-text-arrow">‹</span></span> <span class="fc-button fc-button-next fc-state-default fc-corner-right" unselectable="on"><span class="fc-text-arrow">›</span></span> <span class="fc-header-space"></span><span class="fc-button fc-button-today fc-state-default fc-corner-left fc-corner-right fc-state-disabled" unselectable="on">today</span>
                    
                                                                    </td>
                                                                    <td class="fc-header-center"> <span class="fc-header-title"><h3>เมษายน 2018</h3></span>
                    
                                                                    </td>
                                                                    <td class="fc-header-right"> 
                                                                        <div class="btn-group">
                                                                            <button type="button" class="fc-button-prev fc-corner-left btn btn-default btn-sm"> <i class="fa fa-chevron-left"></i>
                    
                                                                            </button>
                                                                            <button type="button" class="btn btn-default btn-sm"> <i class="fa fa-chevron-right"></i>
                    
                                                                            </button>
                                                                        </div>
                                                                        <span class="fc-button fc-button-month fc-state-default fc-corner-left fc-state-active" unselectable="on">month</span><span class="fc-button fc-button-agendaWeek fc-state-default" unselectable="on">week</span><span class="fc-button fc-button-agendaDay fc-state-default fc-corner-right" unselectable="on">day</span>
                    
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <div class="fc-content" style="position: relative; min-height: 1px;">
                                                            <div class="fc-view fc-view-month fc-grid" style="position: relative; min-height: 1px;" unselectable="on">
                                                                        ปุ่มกลมๆ                            <div style="position:absolute;z-index:8;top:0;left:0">
                                                                                                        <div class="fc-event fc-event-hori fc-event-draggable fc-event-start fc-event-end ui-draggable" style="position: absolute; z-index: 8; left: 495px; top: 60px;" unselectable="on">
                                                                                                            <div class="fc-event-inner"> <span class="fc-event-title" style="position:relative; left:18px; top:10px;font-size:20px;">ราคา</span>
                                                                
                                                                                                            </div>
                                                                                                            <div class="ui-resizable-handle ui-resizable-e">   </div>
                                                                                                        </div>
                                                                                                        <div class="fc-event fc-event-hori fc-event-draggable fc-event-start" style="position: absolute; z-index: 8; left: 804px; width: 304px; top: 352px;">
                                                                                                            <div class="fc-event-inner"> <span class="fc-event-title" style="position:relative; left:18px; top:10px;font-size:20px;">5</span>
                                                                
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="fc-event fc-event-hori fc-event-draggable fc-event-end" style="position: absolute; z-index: 8; left: 20px; top: 470px;">
                                                                                                            <div class="fc-event-inner"> <span class="fc-event-title" style="position:relative;left:17px;top:9px;font-size:20px;">2</span>
                                                                
                                                                                                            </div>
                                                                                                            <div class="ui-resizable-handle ui-resizable-e">   </div>
                                                                                                        </div>
                                                                                                        <div class="fc-event fc-event-hori fc-event-draggable fc-event-start fc-event-end" style="position: absolute; z-index: 8; left: 306px; top: 265px;">
                                                                                                            <div class="fc-event-inner"> <span class="fc-event-title" style="position:relative; top:11px; left:18px; font-size:20px;">2</span>
                                                                
                                                                                                            </div>
                                                                                                            <div class="ui-resizable-handle ui-resizable-e">   </div>
                                                                                                        </div>
                                                                                                    </div> 
                                                                <table class="fc-border-separate" style="width:100%" cellspacing="0">
                                                                    <thead>
                                                                        <tr class="fc-first fc-last">
                                                                            <th class="fc-day-header fc-sun fc-widget-header fc-first" style="width: 150px;">Sun</th>
                                                                            <th class="fc-day-header fc-mon fc-widget-header" style="width: 150px;">Mon</th>
                                                                            <th class="fc-day-header fc-tue fc-widget-header" style="width: 150px;">Tue</th>
                                                                            <th class="fc-day-header fc-wed fc-widget-header" style="width: 150px;">Wed</th>
                                                                            <th class="fc-day-header fc-thu fc-widget-header" style="width: 150px;">Thu</th>
                                                                            <th class="fc-day-header fc-fri fc-widget-header" style="width: 150px;">Fri</th>
                                                                            <th class="fc-day-header fc-sat fc-widget-header fc-last" style="width: 150px;">Sat</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr class="fc-week fc-first">
                                                                            <td class="fc-day fc-sun fc-widget-content fc-other-month fc-first" data-date="2013-12-29">
                                                                                <div style="min-height: 30px;">
                                                                                    <div class="fc-day-number">29</div>
                                                                                    <div class="fc-day-content">
                                                                                        <div style="position: relative;"> </div>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td class="fc-day fc-mon fc-widget-content fc-other-month" data-date="2013-12-30">
                                                                                <div>
                                                                                    <div class="fc-day-number">30</div>
                                                                                    <div class="fc-day-content">
                                                                                        <div style="position: relative;"> </div>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td class="fc-day fc-tue fc-widget-content fc-other-month" data-date="2013-12-31">
                                                                                <div>
                                                                                    <div class="fc-day-number">31</div>
                                                                                    <div class="fc-day-content">
                                                                                        <div style="position: relative;"> </div>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td class="fc-day fc-wed fc-widget-content" data-date="2014-01-01">
                                                                                <div>
                                                                                    <div class="fc-day-number">1</div>
                                                                                    <div class="fc-day-content">
                                                                                        <div style="position: relative;"> </div>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td class="fc-day fc-thu fc-widget-content" data-date="2014-01-02">
                                                                                <div>
                                                                                    <div class="fc-day-number">2</div>
                                                                                    <div class="fc-day-content">
                                                                                        <div style="position: relative;"> </div>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td class="fc-day fc-fri fc-widget-content" data-date="2014-01-03">
                                                                                <div>
                                                                                    <div class="fc-day-number">3</div>
                                                                                    <div class="fc-day-content">
                                                                                        <div style="position: relative;"> </div>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td class="fc-day fc-sat fc-widget-content fc-last" data-date="2014-01-04">
                                                                                <div>
                                                                                    <div class="fc-day-number">4</div>
                                                                                    <div class="fc-day-content">
                                                                                        <div style="position: relative;"> </div>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr class="fc-week">
                                                                            <td class="fc-day fc-sun fc-widget-content fc-first" data-date="2014-01-05">
                                                                                <div style="min-height: 30px;">
                                                                                    <div class="fc-day-number">5</div>
                                                                                    <div class="fc-day-content">
                                                                                        <div style="position: relative;"> </div>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td class="fc-day fc-mon fc-widget-content" data-date="2014-01-06">
                                                                                <div>
                                                                                    <div class="fc-day-number">6</div>
                                                                                    <div class="fc-day-content">
                                                                                        <div style="position: relative;"> </div>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td class="fc-day fc-tue fc-widget-content" data-date="2014-01-07">
                                                                                <div>
                                                                                    <div class="fc-day-number">7</div>
                                                                                    <div class="fc-day-content">
                                                                                        <div style="position: relative;"> </div>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td class="fc-day fc-wed fc-widget-content" data-date="2014-01-08">
                                                                                <div>
                                                                                    <div class="fc-day-number">8</div>
                                                                                    <div class="fc-day-content">
                                                                                        <div style="position: relative;"> </div>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td class="fc-day fc-thu fc-widget-content" data-date="2014-01-09">
                                                                                <div>
                                                                                    <div class="fc-day-number">9</div>
                                                                                    <div class="fc-day-content">
                                                                                        <div style="position: relative;"> </div>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td class="fc-day fc-fri fc-widget-content" data-date="2014-01-10">
                                                                                <div>
                                                                                    <div class="fc-day-number">10</div>
                                                                                    <div class="fc-day-content">
                                                                                        <div style="position: relative;"> </div>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td class="fc-day fc-sat fc-widget-content fc-last" data-date="2014-01-11">
                                                                                <div>
                                                                                    <div class="fc-day-number">11</div>
                                                                                    <div class="fc-day-content">
                                                                                        <div style="position: relative;"> </div>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr class="fc-week">
                                                                            <td class="fc-day fc-sun fc-widget-content fc-first" data-date="2014-01-12">
                                                                                <div style="min-height: 30px;">
                                                                                    <div class="fc-day-number">12</div>
                                                                                    <div class="fc-day-content">
                                                                                        <div style="position: relative;"> </div>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td class="fc-day fc-mon fc-widget-content" data-date="2014-01-13">
                                                                                <div>
                                                                                    <div class="fc-day-number">13</div>
                                                                                    <div class="fc-day-content">
                                                                                        <div style="position: relative;"> </div>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td class="fc-day fc-tue fc-widget-content" data-date="2014-01-14">
                                                                                <div>
                                                                                    <div class="fc-day-number">14</div>
                                                                                    <div class="fc-day-content">
                                                                                        <div style="position: relative;"> </div>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td class="fc-day fc-wed fc-widget-content" data-date="2014-01-15">
                                                                                <div>
                                                                                    <div class="fc-day-number">15</div>
                                                                                    <div class="fc-day-content">
                                                                                        <div style="position: relative;"> </div>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td class="fc-day fc-thu fc-widget-content" data-date="2014-01-16">
                                                                                <div>
                                                                                    <div class="fc-day-number">16</div>
                                                                                    <div class="fc-day-content">
                                                                                        <div style="position: relative;"> </div>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td class="fc-day fc-fri fc-widget-content" data-date="2014-01-17">
                                                                                <div>
                                                                                    <div class="fc-day-number">17</div>
                                                                                    <div class="fc-day-content">
                                                                                        <div style="position: relative;"> </div>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td class="fc-day fc-sat fc-widget-content fc-last" data-date="2014-01-18">
                                                                                <div>
                                                                                    <div class="fc-day-number">18</div>
                                                                                    <div class="fc-day-content">
                                                                                        <div style="position: relative;"> </div>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr class="fc-week">
                                                                            <td class="fc-day fc-sun fc-widget-content fc-first" data-date="2014-01-19">
                                                                                <div min-height: 30px;>
                                                                                     <div class="fc-day-number">19</div>
                                                                                    <div class="fc-day-content">
                                                                                        <div style="position: relative;"> </div>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td class="fc-day fc-mon fc-widget-content" data-date="2014-01-20">
                                                                                <div>
                                                                                    <div class="fc-day-number">20</div>
                                                                                    <div class="fc-day-content">
                                                                                        <div style="position: relative;"> </div>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td class="fc-day fc-tue fc-widget-content" data-date="2014-01-21">
                                                                                <div>
                                                                                    <div class="fc-day-number">21</div>
                                                                                    <div class="fc-day-content">
                                                                                        <div style="position: relative;"></div>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td class="fc-day fc-wed fc-widget-content fc-today fc-state-highlight" data-date="2014-01-22">
                                                                                <div>
                                                                                    <div class="fc-day-number">22</div>
                                                                                    <div class="fc-day-content">
                                                                                        <div style="position: relative;;"> </div>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td class="fc-day fc-thu fc-widget-content" data-date="2014-01-23">
                                                                                <div>
                                                                                    <div class="fc-day-number">23</div>
                                                                                    <div class="fc-day-content">
                                                                                        <div style="position: relative;"></div>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td class="fc-day fc-fri fc-widget-content" data-date="2014-01-24">
                                                                                <div>
                                                                                    <div class="fc-day-number">24</div>
                                                                                    <div class="fc-day-content">
                                                                                        <div style="position: relative;"> </div>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td class="fc-day fc-sat fc-widget-content fc-last" data-date="2014-01-25">
                                                                                <div>
                                                                                    <div class="fc-day-number">25</div>
                                                                                    <div class="fc-day-content">
                                                                                        <div style="position: relative;"> </div>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr class="fc-week">
                                                                            <td class="fc-day fc-sun fc-widget-content fc-first" data-date="2014-01-26">
                                                                                <div min-height: 30px;>
                                                                                     <div class="fc-day-number">26</div>
                                                                                    <div class="fc-day-content">
                                                                                        <div style="position: relative;"> </div>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td class="fc-day fc-mon fc-widget-content" data-date="2014-01-27">
                                                                                <div>
                                                                                    <div class="fc-day-number">27</div>
                                                                                    <div class="fc-day-content">
                                                                                        <div style="position: relative;"> </div>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td class="fc-day fc-tue fc-widget-content" data-date="2014-01-28">
                                                                                <div>
                                                                                    <div class="fc-day-number">28</div>
                                                                                    <div class="fc-day-content">
                                                                                        <div style="position: relative;"> </div>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td class="fc-day fc-wed fc-widget-content" data-date="2014-01-29">
                                                                                <div>
                                                                                    <div class="fc-day-number">29</div>
                                                                                    <div class="fc-day-content">
                                                                                        <div style="position: relative;"> </div>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td class="fc-day fc-thu fc-widget-content" data-date="2014-01-30">
                                                                                <div>
                                                                                    <div class="fc-day-number">30</div>
                                                                                    <div class="fc-day-content">
                                                                                        <div style="position: relative;"> </div>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td class="fc-day fc-fri fc-widget-content" data-date="2014-01-31">
                                                                                <div>
                                                                                    <div class="fc-day-number">31</div>
                                                                                    <div class="fc-day-content">
                                                                                        <div style="position: relative;"> </div>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td class="fc-day fc-sat fc-widget-content fc-other-month fc-last" data-date="2014-02-01">
                                                                                <div>
                                                                                    <div class="fc-day-number">1</div>
                                                                                    <div class="fc-day-content">
                                                                                        <div style="position: relative;"> </div>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr class="fc-week fc-last">
                                                                            <td class="fc-day fc-sun fc-widget-content fc-other-month fc-first" data-date="2014-02-02">
                                                                                <div style="min-height: 30px;">
                                                                                    <div class="fc-day-number">2</div>
                                                                                    <div class="fc-day-content">
                                                                                        <div style="position: relative;"> </div>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td class="fc-day fc-mon fc-widget-content fc-other-month" data-date="2014-02-03">
                                                                                <div>
                                                                                    <div class="fc-day-number">3</div>
                                                                                    <div class="fc-day-content">
                                                                                        <div style="position: relative;"> </div>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td class="fc-day fc-tue fc-widget-content fc-other-month" data-date="2014-02-04">
                                                                                <div>
                                                                                    <div class="fc-day-number">4</div>
                                                                                    <div class="fc-day-content">
                                                                                        <div style="position: relative;"> </div>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td class="fc-day fc-wed fc-widget-content fc-other-month" data-date="2014-02-05">
                                                                                <div>
                                                                                    <div class="fc-day-number">5</div>
                                                                                    <div class="fc-day-content">
                                                                                        <div style="position: relative;"> </div>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td class="fc-day fc-thu fc-widget-content fc-other-month" data-date="2014-02-06">
                                                                                <div>
                                                                                    <div class="fc-day-number">6</div>
                                                                                    <div class="fc-day-content">
                                                                                        <div style="position: relative;"> </div>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td class="fc-day fc-fri fc-widget-content fc-other-month" data-date="2014-02-07">
                                                                                <div>
                                                                                    <div class="fc-day-number">7</div>
                                                                                    <div class="fc-day-content">
                                                                                        <div style="position: relative;"> </div>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td class="fc-day fc-sat fc-widget-content fc-other-month fc-last" data-date="2014-02-08">
                                                                                <div>
                                                                                    <div class="fc-day-number">8</div>
                                                                                    <div class="fc-day-content">
                                                                                        <div style="position: relative;"> </div>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>                           -->
                    <!--ตารางราคาเด็ก/ผู้ใหญ่                           -->
                    <!--                            <table class="ticket-price">
                                                    <thead>
                                                        <tr>
                                                            <th class="ticket-price"><p>ราคา :</p></th>
                                                            <th class="adult"><span>ผู้ใหญ่</span></th>
                                                            <th class="kid"><span>เด็ก</span></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="ticket-price">
                                                                <em>* แพ็คเกจนี้ได้ให้บริการโดย บริษัท ทัวร์เอ็กซ์เพรสเซ็นเตอร์.คอม จำกัด ร่วมกับบริษัททัวร์พันธมิตรที่ผ่านการตรวจสอบคุณภาพแล้ว</em>
                                                            </td>
                                                            <td class="adult">
                                                                <ins>
                                                                    <span class="amount">$109</span>
                                                                </ins>
                                                                <del>
                                                                    <span class="amount">$119.00</span>
                                                                </del>
                                                            </td>
                                                            <td class="kid">
                                                                <ins>
                                                                    <span class="amount">$80</span>
                                                                </ins>
                                                                <del>
                                                                    <span class="amount">$119.00</span>
                                                                </del>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>-->

                </div>
            </div>

            <div class="col-md-4">
                <div class="product-detail__gallery">
                    <div class="product-slider-wrapper">
                        @if(!$tourPackage->is_quick_tour)
                        <div class="product-slider">
                            <!--                            @foreach($tourPackageImagesList as $tourPackageImage)
                                                        <div class="item">
                                                            <img src="{{ asset('images/tour-images/'.$tourPackageImage->tour_image_name)}}" alt="">
                                                        </div>
                                                        @endforeach-->
                            @foreach ($tourPackageDayList as $tourPackageDay)
                            @foreach ($tourAttractionDayList as $tourAttractionDay)
                            @if($tourAttractionDay->attraction_picture != null)
                            <div class="item">
                                <img class="img-item" src="{{ asset('images/attraction/'.$tourAttractionDay->attraction_picture)}}">
                            </div>
                            @endif
                            @endforeach
                            @endforeach
                        </div>
                        <div class="product-slider-thumb-row">
                            <div id="product_item" class="product-slider-thumb">
                                @foreach ($tourPackageDayList as $tourPackageDay)
                                @foreach ($tourAttractionDayList as $tourAttractionDay)
                                @if($tourAttractionDay->attraction_picture != null)
                                <div class="item">
                                    <img class="img-item" src="{{ asset('images/attraction/'.$tourAttractionDay->attraction_picture)}}">
                                </div>
                                @endif
                                @endforeach
                                @endforeach
                            </div>
                        </div>
                        @else
                        <div class="product-slider">
                            <div class="item">
                                <img class="img-item" src="{{ asset('images/tour/'.$tourPackage->tour_package_image)}}">
                            </div>
                        </div>
                        <div class="hide product-slider-thumb-row">
                            <div class="product-slider-thumb">
                                <div class="item">
                                    <img class="img-item" src="{{ asset('images/tour/'.$tourPackage->tour_package_image)}}">
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-9">
                <div class="product-tabs tabs">
                    <ul>
                        @if(!$tourPackage->is_quick_tour)
                        <li>
                            <a href="#tabs-1">แผนการท่องเที่ยว</a>
                        </li>
                        <li>
                            <a href="#tabs-2">เงื่อนไขโปรแกรมทัวร์</a>
                        </li>
                        @else
                        <li>
                            <a href="#tabs-1">แผนการท่องเที่ยว</a>
                        </li>
                        @endif
                        <!--                        <li>
                                                    <a href="#tabs-3">Review &amp; Rating</a>
                                                </li>-->
                    </ul>
                    <div class="product-tabs__content">
                        @if(!$tourPackage->is_quick_tour)
                        <div id="tabs-1">
                            <div class="trip-schedule-accordion accordion">
                                @foreach ($tourPackageDayList as $tourPackageDay)
                                <h4>วันที่<span class="days"></span>{{$tourPackageDay->tour_package_day_name}}</h4>
                                <div>
                                    <?php echo $tourPackageDay->tour_package_day_description ?>
                                    <br>
                                    @foreach ($tourAttractionDayList as $tourAttractionDay)
                                    @if($tourAttractionDay->tour_package_day_id == $tourPackageDay->tour_package_day_id)
                                    @if($tourAttractionDay->attraction_picture != null)
                                    <p style="font-size:24px;"><i class="fa fa-image"></i>&nbsp;{{$tourAttractionDay->attraction_name}}</p>
                                    <img src="{{ asset('images/attraction/'.$tourAttractionDay->attraction_picture)}}">
                                    <br>
                                    <br>
                                    @endif
                                    @endif
                                    @endforeach
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div id="tabs-2">
                            <div class="trip-schedule-accordion accordion">

                                @if($tourPackage->rate_include != null && $tourPackage->rate_include != "")
                                <h4><span class="condi"><i class="fas fa-plus"></i></span> อัตราค่าบริการนี้รวม</h4>
                                <div class="detail-condi">
                                    <?php echo $tourPackage->rate_include ?>
                                </div>
                                @endif

                                @if($tourPackage->rate_not_include != null && $tourPackage->rate_not_include != "")
                                <h4><span class="condi"><i class="fas fa-times"></i></span> อัตราค่าบริการนี้ไม่รวม</h4>
                                <div class="detail-condi">
                                    <?php echo $tourPackage->rate_not_include ?>
                                </div>
                                @endif

                                @if($tourPackage->payment_condition != null && $tourPackage->payment_condition != "")
                                <h4><span class="condi"><i class="far fa-credit-card"></i></span> เงื่อนไขการชำระเงิน</h4>
                                <div class="detail-condi">
                                    <?php echo $tourPackage->payment_condition ?>   
                                </div>
                                @endif

                                @if($tourPackage->cancel_change != null && $tourPackage->cancel_change != "")
                                <h4><span class="condi"><i class="fas fa-ban"></i></span> การยกเลิกและการเปลี่ยนแปลง</h4>
                                <div class="detail-condi">
                                    <?php echo $tourPackage->cancel_change ?>
                                </div>
                                @endif

                                @if($tourPackage->other_condition != null && $tourPackage->other_condition != "")
                                <h4><span class="condi"><i class="fas fa-align-justify"></i></span> เงื่อนไขและข้อกำหนดอื่นๆ</h4>
                                <div class="detail-condi">
                                    <?php echo $tourPackage->other_condition ?>
                                </div>
                                @endif

                                @if($tourPackage->beyond_respon != null && $tourPackage->beyond_respon != "")
                                <h4><span class="condi"><i class="fas fa-exchange-alt"></i></span> เงื่อนไขนอกเหนือความรับผิดชอบ</h4>
                                <div class="detail-condi">
                                    <?php echo $tourPackage->beyond_respon ?>
                                </div>
                                @endif

                                @if($tourPackage->suggest_warning != null && $tourPackage->suggest_warning != "")
                                <h4><span class="condi"><i class="fas fa-heart"></i></span> คำแนะนำและข้อควรระวังในการเดินทาง</h4>
                                <div class="detail-condi">
                                    <?php echo $tourPackage->suggest_warning ?>
                                </div>
                                @endif

                                @if($tourPackage->visa_detail != null && $tourPackage->visa_detail != "")
                                <h4><span class="condi"><i class="far fa-id-card"></i></span> ข้อมูลเกี่ยวกับการยื่นวีซ่า</h4>
                                <div class="detail-condi">
                                    <?php echo $tourPackage->visa_detail ?>
                                </div>
                                @endif

                                @if($tourPackage->agreement != null && $tourPackage->agreement != "")
                                <h4><span class="condi"><i class="fas fa-exclamation-circle"></i></span> ข้อตกลงสำคัญ โปรดตรวจสอบก่อนสำรองที่นั่ง</h4>
                                <div class="detail-condi">
                                    <?php echo $tourPackage->agreement ?>
                                </div>
                                @endif
                            </div>
<!--                            <table class="good-to-know-table">
                                <tbody>
                                    <tr>
                                        <th>
                                            <p>Check in</p>
                                        </th>
                                        <td>
                                            <p>From 15:00 hours</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            <p>Check out</p>
                                        </th>
                                        <td>
                                            <p>Until 11:00 hours</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            <p>Cancellation / prepayment</p>
                                        </th>
                                        <td>
                                            <p>Cancellation and prepayment policies vary according to room type. Please check the room conditions when selecting your room above.</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            <p>Children and extra beds</p>
                                        </th>
                                        <td>
                                            <p>The maximum number of children’s cots/cribs in a room is 1.</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            <p>Internet</p>
                                        </th>
                                        <td>
                                            <p>free! WiFi is available in all areas and is free of charge.</p>
                                            <p><span class="light">Free</span>children under 2 years stay free of charge when using existing beds.</p>
                                            <p><span class="light">Free</span>children under 2 years stay free of charge when using existing beds.</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            <p>Pets</p>
                                        </th>
                                        <td>
                                            <p>Pets are allowed. Charges may be applicable.</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            <p>Groups</p>
                                        </th>
                                        <td>
                                            <p>When booking for more than 11 persons, different policies and additional supplements may apply.</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            <p>Accepted cards for payment</p>
                                        </th>
                                        <td>
                                            <p><img src="{{ asset('images/paypal2.png')}}" alt=""></p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>-->
                        </div>
                        <!--                        <div id="tabs-3">
                                                                                <div id="reviews">
                                                                                    <div class="rating-info">
                                                                                        <div class="average-rating-review good">
                                                                                            <span class="count">7.5</span>
                                                                                            <em>Average rating</em>
                                                                                            <span>Good</span>
                                                                                        </div>
                                                                                        <ul class="rating-review">
                                                                                            <li>
                                                                                                <em>Facility</em>
                                                                                                <span>7.5</span>
                                                                                            </li>
                                                                                            <li>
                                                                                                <em>Human</em>
                                                                                                <span>9.0</span>
                                                                                            </li>
                                                                                            <li>
                                                                                                <em>Service</em>
                                                                                                <span>9.5</span>
                                                                                            </li>
                                                                                            <li>
                                                                                                <em>Interesting</em>
                                                                                                <span>8.7</span>
                                                                                            </li>
                                                                                        </ul>
                                                                                        <a href="#" class="write-review">Write a review</a>
                                                                                    </div>
                                                                                    <div id="add_review">
                                                                                        <h3 class="comment-reply-title">Add a review</h3>
                                                                                        <form>
                                                                                            <div class="comment-form-author">
                                                                                                <label for="author">Name <span class="required">*</span></label>
                                                                                                <input id="author" type="text">
                                                                                            </div>
                                                                                            <div class="comment-form-email">
                                                                                                <label for="email">Email <span class="required">*</span></label>
                                                                                                <input id="email" type="text">
                                                                                            </div>
                                                                                            <div class="comment-form-rating">
                                                                                                <h4>Your Rating</h4>
                                                                                                <div class="comment-form-rating__content">
                                                                                                    <div class="item facility">
                                                                                                        <label>Facility</label>
                                                                                                        <select class="awe-select">
                                                                                                            <option>5.0</option>
                                                                                                            <option>6.5</option>
                                                                                                            <option>7.5</option>
                                                                                                            <option>8.5</option>
                                                                                                            <option>9.0</option>
                                                                                                            <option>10</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="item human">
                                                                                                        <label>Human</label>
                                                                                                        <select class="awe-select">
                                                                                                            <option>5.0</option>
                                                                                                            <option>6.5</option>
                                                                                                            <option>7.5</option>
                                                                                                            <option>8.5</option>
                                                                                                            <option>9.0</option>
                                                                                                            <option>10</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="item service">
                                                                                                        <label>Service</label>
                                                                                                        <select class="awe-select">
                                                                                                            <option>5.0</option>
                                                                                                            <option>6.5</option>
                                                                                                            <option>7.5</option>
                                                                                                            <option>8.5</option>
                                                                                                            <option>9.0</option>
                                                                                                            <option>10</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="item interesting">
                                                                                                        <label>Interesting</label>
                                                                                                        <select class="awe-select">
                                                                                                            <option>5.0</option>
                                                                                                            <option>6.5</option>
                                                                                                            <option>7.5</option>
                                                                                                            <option>8.5</option>
                                                                                                            <option>9.0</option>
                                                                                                            <option>10</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="comment-form-comment">
                                                                                                <label for="comment">Your Review</label>
                                                                                                <textarea id="comment"></textarea>
                                                                                            </div>
                                                                                            <div class="form-submit">
                                                                                                <input type="submit" class="submit" value="Submit">
                                                                                            </div>
                                                                                        </form>
                                                                                    </div>
                                                                                    <div id="comments">
                                                                                        <ol class="commentlist">
                                                                                            <li>
                                                                                                <div class="comment-box">
                                                                                                    <div class="avatar">
                                                                                                        <img src="{{ asset('images/img/demo-thumb.jpg')}}" alt="">
                                                                                                    </div>
                                                                                                    <div class="comment-body">
                                                                                                        <p class="meta">
                                                                                                            <strong>Nguyen Gallahendahry</strong>
                                                                                                            <span class="time">December 10, 2012</span>
                                                                                                        </p>
                                                                                                        <div class="description">
                                                                                                            <p>Takes me back to my youth. I love the design of this soda machine. A bit pricy though..!</p>
                                                                                                        </div>
                                                    
                                                                                                        <div class="rating-info">
                                                                                                            <div class="average-rating-review good">
                                                                                                                <span class="count">7.5</span>
                                                                                                                <em>Average rating</em>
                                                                                                                <span>Good</span>
                                                                                                            </div>
                                                                                                            <ul class="rating-review">
                                                                                                                <li>
                                                                                                                    <em>Facility</em>
                                                                                                                    <span>7.5</span>
                                                                                                                </li>
                                                                                                                <li>
                                                                                                                    <em>Human</em>
                                                                                                                    <span>9.0</span>
                                                                                                                </li>
                                                                                                                <li>
                                                                                                                    <em>Service</em>
                                                                                                                    <span>9.5</span>
                                                                                                                </li>
                                                                                                                <li>
                                                                                                                    <em>Interesting</em>
                                                                                                                    <span>8.7</span>
                                                                                                                </li>
                                                                                                            </ul>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </li>
                                                                                            <li>
                                                                                                <div class="comment-box">
                                                                                                    <div class="avatar">
                                                                                                        <img src="{{ asset('images/img/demo-thumb.jpg')}}" alt="">
                                                                                                    </div>
                                                                                                    <div class="comment-body">
                                                                                                        <p class="meta">
                                                                                                            <strong>James Bond not 007</strong>
                                                                                                            <span class="time">December 10, 2012</span>
                                                                                                        </p>
                                                                                                        <div class="description">
                                                                                                            <p>Takes me back to my youth. I love the design of this soda machine. A bit pricy though..!</p>
                                                                                                        </div>
                                                    
                                                                                                        <div class="rating-info">
                                                                                                            <div class="average-rating-review good">
                                                                                                                <span class="count">7.5</span>
                                                                                                                <em>Average rating</em>
                                                                                                                <span>Good</span>
                                                                                                            </div>
                                                                                                            <ul class="rating-review">
                                                                                                                <li>
                                                                                                                    <em>Facility</em>
                                                                                                                    <span>7.5</span>
                                                                                                                </li>
                                                                                                                <li>
                                                                                                                    <em>Human</em>
                                                                                                                    <span>9.0</span>
                                                                                                                </li>
                                                                                                                <li>
                                                                                                                    <em>Service</em>
                                                                                                                    <span>9.5</span>
                                                                                                                </li>
                                                                                                                <li>
                                                                                                                    <em>Interesting</em>
                                                                                                                    <span>8.7</span>
                                                                                                                </li>
                                                                                                            </ul>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </li>
                                                                                            <li>
                                                                                                <div class="comment-box">
                                                                                                    <div class="avatar">
                                                                                                        <img src="{{ asset('images/img/demo-thumb.jpg') }}" alt="">
                                                                                                    </div>
                                                                                                    <div class="comment-body">
                                                                                                        <p class="meta">
                                                                                                            <strong>Bratt not Pitt</strong>
                                                                                                            <span class="time">December 10, 2012</span>
                                                                                                        </p>
                                                                                                        <div class="description">
                                                                                                            <p>Takes me back to my youth. I love the design of this soda machine. A bit pricy though..!</p>
                                                                                                        </div>
                                                    
                                                                                                        <div class="rating-info">
                                                                                                            <div class="average-rating-review fine">
                                                                                                                <span class="count">5.0</span>
                                                                                                                <em>Average rating</em>
                                                                                                                <span>Fine</span>
                                                                                                            </div>
                                                                                                            <ul class="rating-review">
                                                                                                                <li>
                                                                                                                    <em>Facility</em>
                                                                                                                    <span>7.5</span>
                                                                                                                </li>
                                                                                                                <li>
                                                                                                                    <em>Human</em>
                                                                                                                    <span>9.0</span>
                                                                                                                </li>
                                                                                                                <li>
                                                                                                                    <em>Service</em>
                                                                                                                    <span>9.5</span>
                                                                                                                </li>
                                                                                                                <li>
                                                                                                                    <em>Interesting</em>
                                                                                                                    <span>8.7</span>
                                                                                                                </li>
                                                                                                            </ul>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </li>
                                                                                        </ol>
                                                                                    </div>
                                                                                </div>
                                                </div>-->
                        @else
                        <div id="tabs-1">
                            <div class="flexible-container">
                                <a class="embed" href="{{ asset('/images/pdf/'.$tourPackage->tour_package_pdf)}}"></a>
                                <!--                                <a class="embed" href="{{ asset('http://www.tourhitsthai.com/images/pdf/208-1534835452.pdf')}}"></a>
                                                                    <a class="embed" href="http://www.tourhitsthai.com/images/pdf/208-1534835452.pdf"></a>-->
                            </div>     
                            <!-- https://docs.google.com/viewerng/viewer?url=http://www.tourhitsthai.com/images/pdf/208-1534835452.pdf  -->
                            <!--                                 <a class="embed" src="{{ asset('/images/pdf/'.$tourPackage->tour_package_pdf)}}"></a>-->





                            <!--                            <div id="Iframe-Cicis-Menu-To-Go" class="set-margin-cicis-menu-to-go set-padding-cicis-menu-to-go set-border-cicis-menu-to-go set-box-shadow-cicis-menu-to-go center-block-horiz">
                                                            <div class="responsive-wrapper 
                                                               responsive-wrapper-padding-bottom-90pct"
                                                               style="-webkit-overflow-scrolling: touch; overflow: auto;">
                                                               <iframe src="https://drive.google.com/file/d/0BxrMaW3xINrsR3h2cWx0OUlwRms/preview">
                                                                <p style="font-size: 110%;"><em><strong>ERROR: </strong>  
                                                                An &#105;frame should be displayed here but your browser version does not support &#105;frames.</em> Please update your browser to its most recent version and try again, or access the file <a href="https://drive.google.com/file/d/0BxrMaW3xINrsR3h2cWx0OUlwRms/preview"with this link.</a></p>
                                                              </iframe>
                                                            </div>
                                                          </div>-->
                            <!--                            <div class="embed-responsive embed-responsive-16by9">
                                                            <iframe class="embed-responsive-item" src='{{ asset('/images/pdf/'.$tourPackage->tour_package_pdf)}}' allowfullscreen></iframe>
                                                          </div>-->
                            <!--                            <div class="embed-responsive embed-responsive-16by9" style="padding-bottom: 141.42%;">
                                                            <object class="embed-responsive-item" data='{{ asset('/images/pdf/'.$tourPackage->tour_package_pdf)}}' type="application/pdf" internalinstanceid="9" title="">
                                                                <p>Your browser isn't supporting embedded pdf files. You can download the file
                                                                    <a href="/media/post/bootstrap-responsive-embed-aspect-ratio/example.pdf">here</a>.</p>
                                                            </object>
                                                        </div>-->

                            <!--                            <div class="embed-responsive" style='padding-bottom:150%'>
                                                            <object data='{{ asset('/images/pdf/'.$tourPackage->tour_package_pdf)}}' type='application/pdf' width='100%' height='100%'></object>
                                                        </div>-->

                            <!--                            <a class="embed" href="{{ asset('/images/pdf/'.$tourPackage->tour_package_pdf)}}"></a>-->
                        </div>
                        <div class="row">
                            <div class="pdf-download btn btn-rounded">
                                <a id="" href="{{url('download_pdf/' .$tourPackage->tour_package_id)}}">ดาวน์โหลดเอกสารทัวร์นี้ (PDF)</a>
                            </div>
                        </div>
                        @endif

                    </div>
                </div>

                <!-- ตารางราคา nwe design-->                
                <!--                <div class="bottom-table">
                                   <h3><i class="far fa-calendar"></i> ข้อมูลราคา</h3>
                                   <div class="period-table">
                                       <table id="" class="">
                                          <tr>
                                            <th colspan="2" class="align-middle py-4">เลือกวันเดินทางและกดจอง</th>
                                            <th class="align-middle py-4">
                                                <span class="d-inline d-sm-none">พักคู่</span>
                                                <span class="d-none d-sm-inline">ผู้ใหญ่ (พักคู่)</span>
                                                <span class="each">ท่านละ</span>
                                            </th>
                                                <th class="align-middle py-4">
                                                        <span class="d-inline d-sm-none">เด็ก</span>
                                                        <span class="d-none d-sm-inline">เด็ก (ไม่เพิ่มเตียง)</span>
                                                        <span class="each">ท่านละ</span>
                                                    </th>
                                                    <th class="align-middle py-4">
                                                        <span class="d-inline d-sm-none">ราคาพิเศษ</span>
                                                        <span class="d-none d-sm-inline">ราคาพิเศษ</span>    
                                                    </th>
                                                    <th class="align-middle py-4">
                                                        <span class="pricename-xs">ราคา</span>
                                                    </th>
                                                        
                                                    <th class="align-middle d-none d-sm-table-cell py-4">เด็กไม่เพิ่มเตียง<br> ท่านละ</th>
                                                    <th class="align-middle d-none d-sm-table-cell py-4">ราคาพิเศษ<br> ท่านละ</th>
                                                    <th class="align-middle d-none d-sm-table-cell py-4"></th>
                                                </tr> 
                                       </table>
                                   </div>
                                </div>-->

                <!--ตารางราคา  -->
                <div class="period-table-bottom" style="padding-top: 25px;">
                    @if($tourPackage->tour_package_remark != null && $tourPackage->tour_package_remark != "")
                    <div class="row">
                        <div class="col-md-12">
                            <p style="font-family: 'Bai Jamjuree', sans-serif;font-size: 18px; font-weight: bold; "><i class="fa fa-info-circle"></i> {{ $tourPackage->tour_package_remark }}</p>       
                        </div>
                    </div>
                    @endif
                    <h3 style="font-size: 24px;"><i class="fas fa-calculator"></i> ข้อมูลราคา</h3>
                    <div class="tabledate-form-to periods-table-detail">
                        <table id="periods_table" class="table table-sm table-bordered text-center js-periods-table">
                            <thead class="thead-light">
                                <tr>
                                    <th class="align-middle">เลือกวันเดินทางและกดจอง</th>
                                    <th class="py-4">
                                        <span class="d-inline d-sm-none">พักคู่</span>
                                        <span class="d-none d-sm-inline">ผู้ใหญ่</span>
                                        <span class="each">พักคู่</span>
                                    </th>
                                    <th class="py-4">
                                        <span class="d-inline d-sm-none">(ไม่เพิ่มเตียง)</span>
                                        <span class="d-none d-sm-inline">เด็ก</span>
                                        <span class="each">(ไม่เพิ่มเตียง)</span>
                                    </th>
                                    <th class="py-4">
                                        <span class="d-inline d-sm-none">ราคาพิเศษ</span>
                                        <span class="d-none d-sm-inline">ผู้ใหญ่</span>
                                        <span class="each">ราคาพิเศษ</span>
                                    </th>
<!--                                    <th class="align-middle py-4">
                                        <span class="d-inline d-sm-none">ราคาพิเศษ</span>
                                        <span class="d-none d-sm-inline">ราคาพิเศษ</span>    
                                    </th>-->
                                    <th class="py-4">
                                        <span class="pricename-xs">ราคา</span>
                                    </th>

<!--                                <th class="align-middle d-none d-sm-table-cell py-4">เด็กไม่เพิ่มเตียง<br> ท่านละ</th>
<th class="align-middle d-none d-sm-table-cell py-4">ราคาพิเศษ<br> ท่านละ</th>
<th class="align-middle d-none d-sm-table-cell py-4"></th>-->
                                </tr>
                            </thead>

                            <tbody class="tbody-space">
                                @foreach ($tourPackageList as $tourPackageObj)
                                <tr class="period-row-header">
<!--                                    <td class="img-airline">
                                        <i class="far fa-calendar-check d-none"></i>
                                    </td>-->
                                    <td class="days-from text-sm-center days-end-discout">
                                        {{$tourPackageObj->tour_period_start}} - {{$tourPackageObj->tour_period_end}}
                                    </td>

                                    <td class="days-from text-sm-center price-color">
                                        @if($tourPackageObj->tour_period_adult_special_price != 0)
                                        <div class="old-price">{{number_format($tourPackageObj->tour_period_adult_special_price)}} บาท</div>
                                        @endif
                                        {{number_format($tourPackageObj->tour_period_adult_price)}}<div class="baht-price">บาท</div>
                                    </td>
                                    <td class="days-from text-sm-center price-color">
                                        @if($tourPackageObj->tour_period_adult_special_price != 0)
                                        <div class="old-price">{{number_format($tourPackageObj->tour_period_adult_special_price)}} บาท</div>
                                        @endif
                                        {{number_format($tourPackageObj->tour_period_child_price)}}<div class="baht-price">บาท</div>
                                    </td>
                                    <td class="days-from text-sm-center price-color">
                                        @if($tourPackageObj->tour_period_adult_special_price != 0)
                                        <!--<div class="old-price">{{number_format($tourPackageObj->tour_period_adult_special_price)}} บาท</div>-->
                                        {{number_format($tourPackageObj->tour_period_adult_special_price)}}<div class="baht-price">บาท</div>
                                        @else
                                        -
                                        @endif

                                    </td>                                 
                                    <td class="days-from text-sm-center">
                                        <!--ราคาที่โชว์หน้ามือถือมีอันเดียว เอาเป็นราคาผู้ใหญ่พักคู่ ฝากเชคเงื่อนไขที-->
                                        <span class="price-color">
                                            {{number_format($tourPackageObj->tour_period_adult_price)}}<div class="baht-price">บาท</div>
                                        </span>
                                        <!--ราคาที่โชว์หน้ามือถือมีอันเดียว เอาเป็นราคาผู้ใหญ่พักคู่ ฝากเชคเงื่อนไขที-->    

                                        @if($tourPackageObj->tour_period_status == 'Y')
                                        <a type="button" target="_blank" href="{{ url('/tour-confirm/'.$tourPackageObj->tour_package_id.'/'.$tourPackageObj->tour_period_id) }}" class="btn btn-outline-orange  btn-table-cell py-0 btn-confirm-periods"  data-target=".period_7001273_table" aria-expanded="false" aria-controls="periods">จอง</a>
                                        @else
                                        <a type="button" href="{{ url('/tour-confirm/'.$tourPackageObj->tour_package_id.'/'.$tourPackageObj->tour_period_id) }}" class="btn btn-outline-secondary  btn-table-cell btn-confirm-periods disabled" disabled="">SOLD OUT</a>
                                        @endif
                                    </td> 
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <p class="text-center" style="font-family: 'Bai Jamjuree', sans-serif;font-size: 13px; font-weight: bold; color: #746666;">* ราคาดั่งกล่าวอาจมีการปรับเปลี่ยนหากสายการบินมีการเรียกเก็บภาษีน้ำมันเเละภาษีสนามบินเพิ่ม</p>       
                    </div>

                </div>
            </div>



            <!-- กล่องจอง -->
            <div class="col-md-3">
                <div class="detail-sidebar">                    
                    <div class="booking-info">
                        <h3><img alt="" src="{{ asset('/images/icon/maps-and-flags.png')}}" title=""> จองทัวร์นี้</h3>
                        <div class="form-select-date">
                            <div class="form-elements">
                                <label>เลือกช่วงเวลาเดินทาง</label>
                                <div class="form-item">
                                    <i class="awe-icon awe-icon-calendar"></i>
<!--                                    <input type="text" class="awe-calendar" value="Date">-->
                                    <select id="tour_period" class="form-control">
                                        <option value="0">
                                            กรุณาเลือกวันเดินทาง
                                        </option>
                                        @foreach ($tourPackageList as $tourPackageObj)
                                        <option value="{{ $tourPackageObj->tour_period_id}}">
                                            {{$tourPackageObj->tour_period_start}} - {{$tourPackageObj->tour_period_end}} @if($tourPackageObj->tour_period_status == 'Y')
                                            (ว่าง)
                                            @else
                                            (เต็ม)
                                            @endif
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <span></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-elements form-adult">
                                <label>ผู้ใหญ่ (พักคู่)</label>
                                <div class="form-item">
                                    <select id="adult_price" class="awe-select" disabled="">
                                        <option selected val="0">0</option>
                                        <option val="2">2</option>
                                        <option val="4">4</option>
                                        <option val="6">6</option>
                                        <option val="8">8</option>
                                        <option val="10">10</option>
                                        <option val="12">12</option>
                                        <option val="14">14</option>
                                        <option val="16">16</option>
                                        <option val="18">18</option>
                                        <option val="20">20</option>
                                    </select>
                                </div>
                                <!--<span>อายุ 12 ปีขึ้นไป</span>-->
                            </div>
                            <div class="form-elements form-kids">
                                <label>เด็ก (ไม่เพิ่มเตียง)</label>
                                <div class="form-item">
                                    <select id="child_price" class="awe-select" disabled="">
                                        <option selected val="0">0</option>
                                        <option val="1">1</option>
                                        <option val="2">2</option>
                                        <option val="3">3</option>
                                        <option val="4">4</option>
                                        <option val="5">5</option>
                                        <option val="6">6</option>
                                        <option val="7">7</option>
                                        <option val="8">8</option>
                                        <option val="9">9</option>
                                        <option val="10">10</option>
                                    </select>
                                </div>
                                <!--<span>อายุ 11 หรือต่ำกว่า</span>-->
                            </div>
                            <div class="form-elements form-adult">
                                <label>ผู้ใหญ่ (พักเดี่ยว)</label>
                                <div class="form-item">
                                    <select id="alone_price" class="awe-select" disabled="">
                                        <option selected val="0">0</option>
                                        <option val="1">1</option>
                                        <option val="2">2</option>
                                        <option val="3">3</option>
                                        <option val="4">4</option>
                                        <option val="5">5</option>
                                        <option val="6">6</option>
                                        <option val="7">7</option>
                                        <option val="8">8</option>
                                        <option val="9">9</option>
                                        <option val="10">10</option>
                                    </select>
                                </div>
                                <!--<span>อายุ 12 ปีขึ้นไป</span>-->
                            </div>
                            <!--                            <div class="form-elements form-kids">
                                                            <label>เด็ก (ไม่เพิ่มเตียง)</label>
                                                            <div class="form-item">
                                                                <select id="child_nb_price" class="awe-select" disabled="">
                                                                    <option selected val="0">0</option>
                                                                    <option val="1">1</option>
                                                                    <option val="2">2</option>
                                                                    <option val="3">3</option>
                                                                    <option val="4">4</option>
                                                                    <option val="5">5</option>
                                                                    <option val="6">6</option>
                                                                    <option val="7">7</option>
                                                                    <option val="8">8</option>
                                                                    <option val="9">9</option>
                                                                    <option val="10">10</option>
                                                                </select>
                                                            </div>
                                                            <span>อายุ 11 หรือต่ำกว่า</span>
                                                        </div>-->
                        </div>
                        <div class="price">
                            <em>ประเมินราคา</em>
                            <span id="appraise" class="amount">฿0</span>
                        </div>
                        <div class="form-submit">
                            <div class="add-to-cart">
                                <button onclick='redirect()'>
                                    <i class="far fa-check-circle" style="padding-right: 10px;"></i>จอง
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- Trigger the modal with a button -->
                    <div class="call-and-line">
                        <div class="call-or-line">- จองผ่านช่องทางอื่น -</div>
                        <div class="call-to-book" style="width:100%;">
                            <a href="tel:02-379-1249" type="button" class="btn btn-call-book">
                                <span><i class="fas fa-phone"></i> โทรจอง</span>                       
                            </a>
                            <!--                            <button type="button" class="btn btn-call-book" data-toggle="modal" data-target="#myModal">
                                                            <i class="awe-icon awe-icon-phone"></i>
                                                            <span>โทรจอง</span>                       
                                                        </button>-->
                        </div>
                        <div class="inbox-fb call-to-book">
                            <a target="_blank" href="http://m.me/PAGE.TOURHITS" type="button" class="btn btn-call-book">
                                <span><img alt="" src="{{ asset('/images/icon/messenger.png')}}" title=""> Inbox page</span>                       
                            </a>
                            <!--                            <button type="button" class="btn btn-call-book" data-toggle="modal" data-target="#myModal">
                                                            <i class="awe-icon awe-icon-phone"></i>
                                                            <span>โทรจอง</span>                       
                                                        </button>-->
                        </div>
                        <!-- Modal -->
                        <div id="myModal" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"><i class="fas fa-times-circle"></i></button>
                                        <div class="modal-title">จองผ่านโทรศัพท์</div>
                                    </div>
                                    <div class="modal-body">
                                        <div class="title">กรุณาแจ้งรหัสทัวร์นี้กับพนักงานของเรา</div>
                                        <div class="title">ถ้าต้องการจะจองทัวร์นี้</div>
                                        <div class="tag">TH000001</div>
                                        <div class="program">ชื่อโปรแกรมทัวร์</div>
                                        <div class="trip-item">
                                            <div class="item-media">
                                                <div class="image-cover">
                                                    <img src="https://images.unsplash.com/photo-1515569125-d5bfe76b8efc?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=16576be7bfdd968382c6db561f1db63d&auto=format&fit=crop&w=500&q=60" alt="">
                                                </div>
                                                <!--                                        <div class="trip-icon">
                                                                                            <img src="images/trip.jpg" alt="">
                                                                                        </div>-->
                                            </div>
                                            <div class="item-body">
                                                <div class="hilight">
                                                    <i class="far fa-flag"></i>
                                                    <div class="detail">
                                                        ล่องเรือมังกร | ยอดเขาบานาฮิลล์ | Ba Na Hills | หมู่บ้านแกะสลักหินอ่อน | วัดหลินอึ้ง | สวนดอกไม้เมืองหนาว | กระเช้าไฟฟ้าเคเบิลคาร์ | รถรางเวียดนาม | ทดสอบบรรทัดที่ 4 | ทดสอบบรรทัดที่ 4 | ทดสอบบรรทัดที่ 4 | ทดสอบบรรทัดที่ 4
                                                    </div>
                                                </div>
                                                <div class="item-list">
                                                    <ul>
                                                        <li><i class="far fa-clock"></i> 2 วัน 1 คืน</li>
                                                        <li><i class="far fa-calendar"></i> ช่วงเวลา เม.ย. - ส.ค.</li>
                                                    </ul>
                                                </div>                                  
                                            </div>
                                            <div class="item-price-more">
                                                <div class="price">
                                                    ราคา
                                                    <ins>
                                                        <span class="amount">฿12,000</span>
                                                    </ins>
                                                    <!--<del>
                                                            <span class="amount">$200</span>
                                                    </del>-->

                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                    <div class="modal-footer" style="text-align:center;">
                                        <button type="button" class="awe-btn cancel" data-dismiss="modal">ยกเลิก</button>
                                        <a href="tel:02-379-1249" class="awe-btn call"><i class="awe-icon awe-icon-phone"></i> โทรหาเรา</a> 
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Trigger the modal with a button -->
                        <div class="book-by-line">
                            <a target="_blank" href="http://line.me/ti/p/%40tourhits" type="button" class="btn btn-call-book">    
                                <span><img alt="" src="{{ asset('/images/icon/logo-line-2.png')}}" title=""> จองผ่านไลน์</span>
                            </a>
                            <!--                            <button type="button" class="btn btn-call-book" data-toggle="modal" data-target="#myModal2">    
                                                            <i class="fab fa-line"></i>                            
                                                            <span>จองผ่านไลน์</span>
                                                        </button>-->
                        </div>
                        <!-- Modal -->
                        <div id="myModal2" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header header-line">
                                        <button type="button" class="close" data-dismiss="modal"><i class="fas fa-times-circle"></i></button>
                                        <div class="modal-title">จองผ่านทางไลน์</div>
                                    </div>
                                    <div class="modal-body">
                                        <div class="title">กรุณาแจ้งรหัสทัวร์นี้กับพนักงานของเรา</div>
                                        <div class="title">ถ้าต้องการจะจองทัวร์นี้</div>
                                        <div class="tag">TH000001</div>
                                        <div class="program">ชื่อโปรแกรมทัวร์</div>
                                        <div class="trip-item">
                                            <div class="item-media">
                                                <div class="image-cover">
                                                    <img src="https://images.unsplash.com/photo-1515569125-d5bfe76b8efc?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=16576be7bfdd968382c6db561f1db63d&auto=format&fit=crop&w=500&q=60" alt="">
                                                </div>
                                                <!--                                        <div class="trip-icon">
                                                                                            <img src="images/trip.jpg" alt="">
                                                                                        </div>-->
                                            </div>
                                            <div class="item-body">
                                                <div class="hilight">
                                                    <i class="far fa-flag"></i>
                                                    <div class="detail">
                                                        ล่องเรือมังกร | ยอดเขาบานาฮิลล์ | Ba Na Hills | หมู่บ้านแกะสลักหินอ่อน | วัดหลินอึ้ง | สวนดอกไม้เมืองหนาว | กระเช้าไฟฟ้าเคเบิลคาร์ | รถรางเวียดนาม | ทดสอบบรรทัดที่ 4 | ทดสอบบรรทัดที่ 4 | ทดสอบบรรทัดที่ 4 | ทดสอบบรรทัดที่ 4
                                                    </div>
                                                </div>
                                                <div class="item-list">
                                                    <ul>
                                                        <li><i class="far fa-clock"></i> 2 วัน 1 คืน</li>
                                                        <li><i class="far fa-calendar"></i> ช่วงเวลา เม.ย. - ส.ค.</li>
                                                    </ul>
                                                </div>                                  
                                            </div>
                                            <div class="item-price-more">
                                                <div class="price">
                                                    ราคา
                                                    <ins>
                                                        <span class="amount">฿12,000</span>
                                                    </ins>
                                                    <!--<del>
                                                            <span class="amount">$200</span>
                                                    </del>-->

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer" style="text-align:center;">
                                        <button type="button" class="awe-btn cancel" data-dismiss="modal">ยกเลิก</button>
                                        <a target="_blank" rel="noopener noreferrer" href="http://line.me/ti/p/%40tourhits" class="awe-btn line"><i class="fab fa-line"></i> คุยไลน์</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--End Trigger the modal with a button -->                 
                    </div>
                </div>
            </div>
        </div>
    </div>    
</section>

<!--period-table    -->
<div class="container">

</div>        
<!--end period-table--> 
@stop

@section('footer_scripts')
<script type="text/javascript">
    $(document).ready(function () {

        var owl = $("#owl-demo");

        owl.owlCarousel({
            items: 6, //5 items above 1000px browser width
            autoWidth: true,
            loop: true,
            autoPlay: 6000,
            stopOnHover: true,
            pagination: false,
            margin: 5,
            transitionStyle: "fade",
            itemsDesktop: [1199, 4],
            itemsTablet: [768, 3],
            itemsMobile: [479, 2]

        });

        // Custom Navigation Events
        $(".next").click(function () {
            owl.trigger('owl.next');
        })
        $(".prev").click(function () {
            owl.trigger('owl.prev');
        })
        $(".play").click(function () {
            owl.trigger('owl.play', 1000); //owl.play event accept autoPlay speed as second parameter
        })
        $(".stop").click(function () {
            owl.trigger('owl.stop');
        })
    });

    var tour_package_id = <?php echo json_encode($tourPackage->tour_package_id); ?>;
    var tour_period = 0;
    var sum_appraise_adult = 0;
    var sum_appraise_child = 0;
    var sum_appraise_alone = 0;
    var sum_appraise_child_nb = 0;
    var tour_package_period_start = <?php echo json_encode($tourPackage->tour_package_period_start); ?>;
    var tour_package_period_end = <?php echo json_encode($tourPackage->tour_package_period_end); ?>;
    var tourPackageList = <?php echo json_encode($tourPackageList); ?>;
    var tour_code = <?php echo json_encode($tourPackage->tour_package_id); ?>;
    var tour_package_code = <?php echo json_encode($tourPackage->tour_package_code); ?>;
    var two_qty = 0;
    var one_qty = 0;
    var child_one_qty = 0;
    var child_nb_qty = 0;
</script>
<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
<script type="text/javascript" src="{{ asset('js/tour/tour-detail.js') }}"></script>

@endsection
@section('meta')
<meta name="title" content="{{ $tourPackage->meta_title }}">
<meta name="description" content="{{ $tourPackage->meta_description }}">
<meta name="keywords" content="{{ $tourPackage->meta_keywords }}">
@endsection


<!--กดแล้วถ่าง                        -->
<!--                         กดแล้วถ่าง 
                        <tr id="period_7083164_header" class="period-row-header ">

                            <td class="align-middle days-from text-sm-center" data-holidays-count="ติด 2 วันหยุด">
                                <span class="date">
                                    พ  6 มิ.ย.
                                </span>
                                <span class="year d-none d-sm-inline">
                                    18
                                </span>
                            </td>
                            <td class="align-middle days-to text-sm-center">
                                <span class="date">
                                    อา 10 มิ.ย.
                                </span>
                                <span class="d-none year d-sm-inline">
                                    18
                                </span>
                            </td>
                            <td class="align-middle d-none d-sm-table-cell py-3 text-center">
                                ฿29,991
                            </td>
                            <td class="align-middle d-none d-sm-table-cell py-3 text-center">
                                ฿28,991
                            </td>
                            <td class="d-none d-sm-table-cell align-middle">
                                <button type="button" class="btn btn-outline-orange btn-sm btn-table-cell" data-toggle="collapse" data-target=".period_7083164_table" aria-expanded="false" aria-controls="periods>">เลือก</button>
                            </td>
                            <td width="100" class="d-sm-none d-table-cell align-middle">
                                ฿29,991
                                <br>
                                <button type="button" class="btn btn-outline-orange btn-sm btn-table-cell py-0" data-toggle="collapse" data-target=".period_7083164_table" aria-expanded="false" aria-controls="periods>">เลือก</button>
                            </td>
                        </tr>

                        <tr class="period_7083164_table period_hidden holiday_period collapse" aria-labelledby="period_7083164_header" data-parent="#periods_table" data-period-id="7083164" style="">
                            <td colspan="5" class="holidays-date text-left text-muted px-2">
                                วันหยุด : ส. / อา.
                            </td>
                        </tr>
                        <tr class="period_7083164_table period-row-table period_hidden collapse " aria-labelledby="period_7083164_header" data-parent="#periods_table" data-period-id="7083164" style="">
                            <td colspan="8" class="p-0">
                                <div class="p-8">
                                    <table class="table table-border-0 mb-0">
                                        <thead>
                                            <tr>
                                                <th colspan="2" class="p-2 text-left">ราคา2</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="p-2 text-left">ผู้ใหญ่ (พัก 2 - 3 คน)</td>
                                                <td class="p-2 text-right">
                                                    ฿29,991
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-2 text-left">ผู้ใหญ่ (พักเดี่ยว)</td>
                                                <td class="p-2 text-right">
                                                    ฿37,891
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-2 text-left">เด็ก (เพิ่มเตียง)</td>
                                                <td class="p-2 text-right">
                                                    ฿29,991
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-2 text-left">เด็ก (ไม่เพิ่มเตียง)</td>
                                                <td class="p-2 text-right">
                                                    ฿28,991
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <a class="btn btn-orange btn-block btn-lg rounded-0" href="/orders/new?period_id=7083164&amp;start=2018-06-06&amp;tour_id=8034">จองทัวร์ช่วงเวลานี้</a>
                            </td>
                        </tr>         -->