@extends('layout.main')
@section('page_title','Tour Detail')
@section('main-content')
<style>
    body {
        counter-reset: count;
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
        color: #EC2424;
        display: inline;}




</style>
<style>
    .table-style .today {background: #2A3F54; color: #ffffff;}
    /*    .table-style th:nth-of-type(7),td:nth-of-type(7) {color: blue;}
        .table-style th:nth-of-type(1),td:nth-of-type(1) {color: red;}*/
    .table-style tr:first-child th{background-color:#d30000; text-align:center; text-transform: uppercase; border-color:#d30000;}
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
                <li><a href="{{ URL::to('search-tour/' .$tourPackage->tour_country_name. '?country='. $tourPackage->tour_country_id)}}">{{$tourPackage->tour_country_name}}</a></li>
                <li><a href="{{url('tour-detail/' .$tourPackage->tour_package_id. '/'.$tourPackage->tour_package_name)}}">{{$tourPackage->tour_package_name}}</a></li>
            </ul>
        </div>
    </div>
</section>
<!-- BREADCRUMB -->

<section class="product-detail">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="product-detail__info">
                    <div class="product-title">
                        <h2>{{ $tourPackage->tour_package_name }}</h2>
                    </div>
                    <div class="product-address">
                        <?php echo $tourPackage->tour_package_detail ?>
                    </div>
                    <div class="trips">
                        <div class="item">
                            <h6>สายการบิน</h6>
                            <p><i class="fas fa-plane" style="padding-right: 10px"></i>{{ $tourPackage->airline_name }}</p>
                        </div>
                        <div class="item">
                            <h6>ระยะเวลา</h6>
                            <p><i class="far fa-clock" style="padding-right: 10px"></i>{{$tourPackage->tour_period_day_number}} วัน {{$tourPackage->tour_period_night_number}} คืน</p>
                        </div>
                        <div class="item">
                            <h6>ช่วงเวลา</h6>
                            <p><i class="far fa-calendar-minus" style="padding-right: 10px"></i><span id='period_month'></span></p>
                        </div>
                        <div class="item">
                            <h6>รหัสทัวร์</h6>
                            <p><i class="fas fa-barcode" style="padding-right: 10px"></i>#<span id='tour_code'></span></p>
                        </div>
                        <div class="item">
                            <h6><i class="fas fa-share-alt" style="padding-right: 10px"></i>แชร์</h6>
                            <p><a href="#"><i class="fab fa-facebook"></i> Facebook</a></p>
                        </div>
                        <div class="item">
                            <h6><i class="fas fa-download" style="padding-right: 10px"></i>ดาวน์โหลด</h6>
                            <p><a href="#"><i class="fas fa-file-pdf"></i>&nbsp;PDF</a></p>

                        </div>
                    </div>
                    <br>
                    <br>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered table-style table-responsive">
                                <tr>
                                    <th colspan="2"><a style="color: #ffffff;" href="?ym=<?php echo $prev; ?>"><i class="fa fa-chevron-left"></i></a></th>
                                    <th colspan="3" style="color:#ffffff;"> <?php echo $html_title; ?></th>
                                    <th colspan="2"><a style="color: #ffffff;" href="?ym=<?php echo $next; ?>"><i class="fa fa-chevron-right"></i></a></th>
                                </tr>
                                <tr>
                                    <th>อา</th>
                                    <th>จ</th>
                                    <th>อ</th>
                                    <th>พ</th>
                                    <th>พฤ</th>
                                    <th>ศ</th>
                                    <th>ส</th>
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

            <div class="col-md-6">
                <div class="product-detail__gallery">
                    <div class="product-slider-wrapper">
                        <div class="product-slider">
                            @foreach($tourPackageImagesList as $tourPackageImage)
                            <div class="item">
                                <img src="{{ asset('images/tour-images/'.$tourPackageImage->tour_image_name)}}" alt="">
                            </div>
                            @endforeach
                        </div>
                        <div class="product-slider-thumb-row">
                            <div class="product-slider-thumb">
                                @foreach($tourPackageImagesList as $tourPackageImage)
                                <div class="item">
                                    <img src="{{ asset('images/tour-images/'.$tourPackageImage->tour_image_name)}}" alt="">
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-9">
                <div class="product-tabs tabs">
                    <ul>
                        <li>
                            <a href="#tabs-1">แผนการท่องเที่ยว</a>
                        </li>
                        <li>
                            <a href="#tabs-2">เงื่อนไขโปรแกรมทัวร์</a>
                        </li>
                        <li>
                            <a href="#tabs-3">Review &amp; Rating</a>
                        </li>
                    </ul>
                    <div class="product-tabs__content">
                        <div id="tabs-1">
                            <div class="trip-schedule-accordion accordion">
                                @foreach ($tourPackageDayList as $tourPackageDay)
                                <h4>วันที่<span class="days"></span>{{$tourPackageDay->tour_package_day_name}}</h4>
                                <div>
                                    <?php echo $tourPackageDay->tour_package_day_description ?>
                                    <br>
                                    @foreach ($tourAttractionDayList as $tourAttractionDay)
                                    @if($tourAttractionDay->tour_package_day_id == $tourPackageDay->tour_package_day_id)
                                    <p style="font-size:24px;"><i class="fa fa-image"></i>&nbsp;{{$tourAttractionDay->attraction_name}}</p>
                                        <img src="{{ asset('images/attraction/'.$tourAttractionDay->attraction_picture)}}">
                                    <br>
                                    <br>
                                    @endif
                                    @endforeach

                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div id="tabs-2">
                            <div class="trip-schedule-accordion accordion">
                                <h4><span class="condi"><i class="fas fa-plus"></i></span> อัตราค่าบริการนี้รวม</h4>
                                <div class="detail-condi">
                                    <ul>
                                        <li>ค่าตั๋วเครื่องบินสายการบินนกสกู๊ต (XW) เดินทางไป-กลับพร้อมคณะ</li>
                                        <li>ค่าตั๋วเครื่องบิน ค่าอาหาร ค่าที่พัก ค่าธรรมเนียมเข้าชมสถานที่ต่างๆ และค่ายานพาหนะทุกชนิดสำหรับนำเที่ยว ตามที่ระบุไว้ในรายการ</li>
                                        <li>ค่ารถรับส่งระหว่างสนามบิน-โรงแรมที่พัก</li>
                                        <li>ค่ามัคคุเทศก์ผู้ชำนาญเส้นทางดูแลตลอดการเดินทาง</li>
                                        <li>ค่าธรรมเนียมน้ำมันและค่าประกันภัยการเดินทางที่มีการเรียกเก็บจากสายการบิน ซึ่งเป็นอัตราเรียกเก็บ ณ วันที่ทำการจอง</li>
                                        <li>ค่าธรรมเนียมการยื่นขอวีซ่า แบบท่องเที่ยว สำหรับผู้ถือหนังสือเดินทางไทย (กรณีท่านถูกปฏิเสธการขอวีซ่า ทางสถานทูตจะไม่คืนค่าธรรมเนียมให้ท่าน)</li>                                   
                                    </ul>  
                                </div>

                                <h4><span class="condi"><i class="fas fa-times"></i></span> อัตราค่าบริการนี้ไม่รวม</h4>
                                <div class="detail-condi">
                                    <ul>
                                        <li>ภาษีมูลค่าเพิ่ม 7 % และค่าภาษีหัก ณ ที่จ่าย 3%</li>
                                        <li>ค่าใช้จ่ายส่วนตัวนอกเหนือจากรายการที่ระบุ เช่น ค่าเครื่องดื่มและค่าอาหารที่สั่งเพิ่มเอง, ค่าโทรศัพท์, ค่าซักรีด ค่าอาหารและเครื่องดื่มสั่งพิเศษนอกรายการ ค่าซักรีด, ค่าโทรศัพท์ทางไกล, ค่าอินเตอร์เน็ต ฯลฯ</li>
                                        <li>ค่าทำหนังสือเดินทาง, ค่าทำใบอนุญาตกลับเข้าประเทศของคนต่างชาติ หรือ คนต่างด้าว (เป็นหน้าที่ของผู้เดินทางในการจัดทำเอง)</li>
                                        <li>ค่าทิปสำหรับ มัคคุเทศก์ พนักงานขับรถ พนักงานยกกระเป๋าที่โรงแรม</li>
                                        <li>ค่าปรับ สำหรับน้ำหนักกระเป๋าเดินทางที่เกินจากที่ทางสายการบินกำหนดไว้</li>
                                        <li>ค่าธรรมเนียมการยื่นขอวีซ่าเข้าประเทศญี่ปุ่น สำหรับผู้ถือหนังสือเดินทางไทย</li>
                                        <li>ค่าทิปคนขับรถ หัวหน้าทัวร์ และมัคคุเทศก์ท้องถิ่น ท่านละ 1500 บาท /ทริป/ต่อท่าน</li>
                                    </ul>  
                                </div>

                                <h4><span class="condi"><i class="far fa-credit-card"></i></span> เงื่อนไขการชำระเงิน</h4>
                                <div class="detail-condi">
                                    <ul>
                                        <li>กรุณาทำการจองก่อนการเดินทาง อย่างน้อย 21 วันทำการหรือก่อนหน้านั้น โดยแฟกซ์หรืออีเมลล์หน้าพาสปอร์ตผู้เดินทาง เพื่อยินยันการจองที่นั่ง</li>
                                        <li>กรุณาชำระเงินมัดจำ ทันทีหลังจากทำการจอง</li>
                                        <li>สำหรับการเดินทางช่วงเทศกาล หรือวันหยุดต่อเนื่อง (ค่ามัดจำจะมากกว่าการเดินทางในวันปกติ)</li>
                                        <li>ค่าทัวร์ส่วนที่เหลือ บริษัทฯ จะขอเก็บค่าทัวร์ทั้งหมดก่อนการเดินทาง อย่างน้อย 15 วันทำการ มิเช่นนั้นบริษัทฯ ขอสงวนสิทธิ์ในการยกเลิกการเดินทางของท่าน และการคืนเงินทั้งหมดหรือบางส่วนตามค่าใช้จ่ายที่เกิดขึ้นจริง</li>
                                    </ul>  
                                </div>

                                <h4><span class="condi"><i class="fas fa-ban"></i></span> การยกเลิกและการเปลี่ยนแปลง</h4>
                                <div class="detail-condi">
                                    <ul>
                                        <li>หากมีการยกเลิกจะต้องแจ้งทางบริษัทก่อนเดินทางอย่างน้อย 30 วันทำการ หรือก่อนหน้านั้น</li>
                                        <li>หากเป็นช่วงเทศกาลหรือวันหยุดต่อเนื่อง ต้องแจ้งยกเลิกก่อนเดินทางอย่างน้อย 45 วันทำการ หรือก่อนหน้านั้น</li>
                                        <li>หากยกเลิกก่อนออกเดินทางน้อยกว่าวันดังกล่าว ทางบริษัท ฯ ขอสงวนสิทธิ์ในการหักเงินทั้งหมด หรือ บางส่วนตามที่เกิดค่าใช้จ่ายขึ้นจริง เนื่องจากทางบริษัท ฯ มีค่าใช้จ่ายที่ได้ชำระล่วงหน้าไปแล้ว</li>
                                        <li>ในกรณีที่กองตรวจคนเข้าเมืองทั้งที่กรุงเทพฯและในต่างประเทศปฏิเสธมิให้เดินทางออกหรือเข้าประเทศที่ระบุในรายการบริษัทฯ ขอสงวนสิทธิ์ที่จะไม่คืนค่าบริการไม่ว่ากรณีใดๆ ทั้งสิ้น</li>
                                    </ul>  
                                </div>

                                <h4><span class="condi"><i class="fas fa-align-justify"></i></span> เงื่อนไขและข้อกำหนดอื่นๆ</h4>
                                <div class="detail-condi">
                                    <ul>
                                        <li>รายการทัวร์นี้เป็นการท่องเที่ยวแบบหมู่คณะ (Join Tour) จัดทำและดำเนินการโดยบริษัทคู่ค้า (Partner)</li>
                                        <li>อัตราค่าบริการคิดคำนวณจากอัตราแลกเปลี่ยน และราคาตั๋วเครื่องบินในปัจจุบัน บริษัทฯ ขอสงวนสิทธิ์ในการปรับเปลี่ยนราคาค่าบริการในกรณีที่มีการขึ้นราคาค่าตั๋วเครื่องบิน ค่าประกันภัยสายการบิน ค่าธรรมเนียมน้ำมัน หรือมีการประกาศลดค่าเงินบาท หรืออัตราแลกเปลี่ยนได้ปรับขึ้นในช่วงใกล้วันที่คณะจะเดินทาง</li>
                                        <li>ในระหว่างการท่องเที่ยวนี้ หากท่านไม่ใช้บริการใดๆ ไม่ว่าทั้งหมดหรือบางส่วน ถือว่าท่านสละสิทธิ์ ไม่สามารถเรียกร้องขอคืนค่าบริการได้</li>
                                        <li>หากท่านไม่เดินทางกลับพร้อมคณะทัวร์ ตั๋วเครื่องบินขากลับซึ่งยังไม่ได้ใช้ ไม่สามารถนำมาขอคืนเงินได้</li>
                                        <li>ทางบริษัทฯ ขอสงวนสิทธิ์ในการยกเลิก หรือเปลี่ยนกำหนดการเดินทาง หากมีผู้ร่วมเดินทางในคณะทัวร์ ไม่ครบตามที่กำหนดไว้</li>
                                        <li>ค่าบริการที่ท่านชำระกับทางบริษัทฯ เป็นการชำระแบบเหมาขาด และทางบริษัทฯ ได้ชำระให้กับบริษัทฯ ตัวแทนแต่ละแห่งแบบเหมาขาดเช่นกัน ดังนั้นหากท่านมีเหตุอันใดที่ทำให้ท่านไม่ได้ท่องเที่ยวพร้อมคณะตามรายการที่ระบุไว้ ท่านจะขอคืนค่าบริการไม่ได้</li>
                                        <li>กรณีเกิดความผิดพลาดจากตัวแทน หรือ หน่วยงานที่เกี่ยวข้อง จนมีการยกเลิก ล่าช้า เปลี่ยนแปลง การบริการจากสายการบิน บริษัทขนส่ง หรือ หน่วยงานที่ให้บริการ บริษัทฯ จะดำเนินโดยสุดความสามารถที่จะจัดบริการทัวร์อื่นทดแทนให้ แต่จะไม่คืนเงินให้สำหรับค่าบริการนั้นๆ</li>
                                        <li>มัคคุเทศก์ พนักงาน และตัวแทนของบริษัทฯ ไม่มีสิทธิ์ในการให้คำสัญญาใดๆ ทั้งสิ้นแทนบริษัทฯ นอกจากมีเอกสารลงนามโดยผู้มีอำนาจของบริษัทฯ กำกับเท่านั้น</li>
                                        <li>บริษัทฯ และตัวแทนของบริษัทขอสงวนสิทธิ์ที่จะเปลี่ยนแปลงรายการทัวร์ตามความเหมาะสม ให้สอดคล้องกับสถานการณ์ ข้อจำกัดด้านภูมิอากาศ และเวลา ณ วันที่เดินทางจริง ทั้งนี้ทางบริษัทฯ จะยึดถือและคำนึงถึงความปลอดภัย รวมถึงประโยชน์สูงสุดของลูกค้าส่วนมากเป็นสำคัญ</li>
                                        <li>บริษัทฯ ขอสงวนสิทธิ์ในการเปลี่ยนแปลงราคาและเงื่อนไขต่างๆ โดยไม่ต้องแจ้งให้ทราบล่วงหน้า ทั้งนี้ให้ขึ้นอยู่กับดุลยพินิจของบริษัทฯ เท่านั้น อีกทั้งข้อสรุปและข้อตัดสินใดๆ ของบริษัทฯ ให้ถือเป็นข้อยุติสิ้นสุดสมบูรณ์</li>
                                        <li>โปรแกรมทัวร์นี้จะสามารถออกเดินทางได้ต้องมีจำนวนผู้เดินทางขั้นต่ำรวมในคณะตามที่กำหนดไว้เท่านั้น หากมีจำนวนผู้เดินทางรวมแล้วน้อยกว่าที่กำหนดไว้ บริษัทฯ ขอสงวนสิทธิ์ในการยกเลิกหรือปรับเปลี่ยนการเดินทางได้</li>
                                    </ul>  
                                </div>

                                <h4><span class="condi"><i class="fas fa-exchange-alt"></i></span> เงื่อนไขนอกเหนือความรับผิดชอบ</h4>
                                <div class="detail-condi">
                                    <ul>
                                        <li>บริษัทฯ รับเฉพาะผู้มีวัตถุประสงค์เดินทางเพื่อท่องเที่ยวเท่านั้น การเดินทางของผู้เดินทางด้วยวัตถุประสงค์แอบแฝงอื่น ๆ เช่น การไปค้าแรงงาน การค้าประเวณี การค้ามนุษย์ การขนส่งสินค้าหนีภาษี การขนยาเสพติด การโจรกรรม การขนอาวุธสงคราม การก่อการร้าย และ อื่น ๆ ที่เข้าข่ายผิดกฏหมาย ผิดศีลธรรมอันดี บริษัทฯ มิได้มีส่วนรู้เห็น เกี่ยวข้อง หรือ มีส่วนต้องรับผิดชอบใด ๆ กับการกระทำดังกล่าวทั้งสิ้น</li>
                                        <li>หากผู้เดินทางถูกเจ้าหน้าที่ตรวจคนเข้าเมืองของประเทศนั้นๆ ปฏิเสธการเข้า - ออกเมือง ด้วยเหตุผลใดๆ ก็ตาม ถือเป็นเหตุผลซึ่งอยู่นอกเหนืออำนาจ และความรับผิดชอบของบริษัทฯ ทางบริษัทฯ ขอสงวนสิทธิ์ที่จะไม่รับผิดชอบคืนเงินทั้งหมด</li>
                                        <li>บริษัทฯ จะไม่รับผิดชอบในกรณีที่กองตรวจคนเข้าเมืองของประเทศไทยงดออกเอกสารเข้าเมืองให้กับชาวต่างชาติ หรือ คนต่างด้าวที่พำนักอยู่ในประเทศไทย แต่จะทำหน้าที่ช่วยเหลือเจรจา แต่อำนาจสิทธิ์ขาดเป็นของทางกองตรวจคนเข้าเมือง</li>
                                        <li>ผู้เดินทางต้องใช้วิจารณญาณส่วนตัวและรับผิดชอบต่อการตัดสินใจในการเลือกซื้อสินค้าต่าง ๆ ในระหว่างการเดินทางท่องเที่ยวด้วยตัวท่านเอง บริษัทฯ จะไม่สามารถรับผิดชอบใด ๆ หากเกิดความไม่พึงพอใจในสินค้าที่ผู้เดินทางได้ซื้อระหว่างการเดินทางท่องเที่ยวนี้</li>
                                        <li>ผู้เดินทางต้องรับผิดชอบต่อการจัดเก็บ และ ดูแลทรัพย์สินส่วนตัว ของมีค่าต่าง ๆ อย่างระมัดระวัง บริษัทฯ จะไม่สามารถรับผิดชอบใด ๆ หากเกิดการสูญหายของ ทรัพย์สินส่วนตัว ของมีค่าต่าง ๆ ระหว่างการเดินทางท่องเที่ยว อันมีสาเหตุมาจากผู้เดินทาง</li>
                                        <li>บริษัทฯ จะไม่รับผิดชอบต่อการสูญหายของทรัพย์สิน และ สัมภาระระหว่างการเดินทางอันมีสาเหตุมาจากสนามบิน สายการบิน บริษัทขนส่ง โรงแรม หรือ การโจรกรรม แต่จะทำหน้าที่เป็นตัวแทนในการเรียกร้องค่าชดใช้ให้กับผู้เดินทาง</li>
                                        <li>บริษัทฯ ขอสงวนสิทธิ์ที่จะไม่รับผิดชอบค่าเสียหายในเหตุการณ์ที่เกิดจากการยกเลิกหรือความล่าช้าของสายการบิน ภัยธรรมชาติ การนัดหยุดงาน การจลาจล การปฏิวัติ รัฐประหาร ที่อยู่นอกเหนือการควบคุมของทางบริษัทฯ หรือ ค่าใช้จ่ายเพิ่มเติมที่เกิดขึ้นทางตรง หรือทางอ้อม เช่น การเจ็บป่วย การถูกทำร้าย การสูญหาย ความล่าช้า หรือ จากอุบัติเหตุต่างๆ</li>
                                        <li>บริษัทฯ ขอสงวนสิทธิ์ที่จะไม่รับผิดชอบใด ๆ ต่อการไม่เป็นไปตามความคาดหวัง และความไม่พึงพอใจของผู้เดินทาง ที่เกี่ยวข้องกับ สภาพธรรมชาติ ภูมิอากาศ ฤดูกาล ทัศนียภาพ วัฒนธรรม วิถีและพฤติกรรมของประชาชนในประเทศที่เดินทางไป</li>
                                    </ul>  
                                </div>

                                <h4><span class="condi"><i class="fas fa-heart"></i></span> คำแนะนำและข้อควรระวังในการเดินทาง</h4>
                                <div class="detail-condi">
                                    <ul>
                                        <li>ทุกประเทศมีมิจฉาชีพ โดยเฉพาะแหล่งท่องเที่ยวสำคัญ ผู้เดินทางควรมีความระมัดระวังตัวเองอยู่เสมอระหว่างการเดินทางท่องเที่ยว จากเหตุร้ายต่าง ๆ</li>
                                        <li>ผู้เดินทางควรเก็บหนังสือเดินทาง และ ทรัพย์สินมีค่าไว้ในที่ปลอดภัย โดยหมั่นตรวจสอบดูอยู่เสมอ ตลอดระยะเวลาการเดินทาง ตลอดจนระมัดระวังต่อการสูญหาย หรือ ถูกขโมยจากผู้ไม่หวังดี</li>
                                        <li>อุบัติเหตุเป็นสิ่งที่ไม่ทราบล่วงหน้า และ สามารถเกิดขึ้นได้ทุกวินาทีระหว่างการเดินทางท่องเที่ยว ผู้เดินทางควรใส่ใจต่อคำเตือนของไกด์ หัวหน้าทัวร์ ท่องเที่ยวอย่างระมัดระวัง และ ไม่ประมาท</li>
                                        <li>การเลือกซื้อสินค้าระหว่างการเดินทาง ผู้เดินทางควรใช้วิจารณญาณในการพิจารณาเลือกซื้อสินค้า จากคุณภาพ ราคา และความพึงพอใจ อย่างถี่ถ้วน สินค้าในทุกประเทศมีทั้งที่มีคุณภาพดี ปานกลาง หรือ คุณภาพต่ำ แตกต่างกันไป สิทธิ์ในการจะซื้อหรือไม่ซื้อเป็นของผู้เดินทาง</li>
                                        <li>ผู้เดินทางควรจดบันทึกเบอร์โทรของมัคคุเทศก์ หัวหน้าทัวร์ หรือ ผู้ร่วมเดินทางท่านอื่น เผื่อกรณีมีเหตุฉุกเฉินจะสามารถติดต่อกันได้</li>
                                        <li>ผู้เดินทางควรเลือกซื้อประกันภัยการเดินทางเพิ่มเติม เพื่อการคุ้มครองในแง่มุมต่าง ๆ ได้อย่างครอบคลุมและเหมาะสมหากเกิดกรณีฉุกเฉิน</li>
                                    </ul>  
                                </div>

                                <h4><span class="condi"><i class="far fa-id-card"></i></span> ข้อมูลเกี่ยวกับการยื่นวีซ่า</h4>
                                <div class="detail-condi">
                                    <ul>
                                        <li>คนไทยถือหนังสือเดินทางประเทศไทย ไม่ต้องยื่นขอวีซ่าก่อนออกเดินทาง</li>
                                        <li>เอกสารที่ต้องใช้ในการตรวจเข้าเมือง เพื่อยืนยันการมีคุณสมบัติการเข้าประเทศญี่ปุ่น (หากผู้ยื่นประสงค์จะพำนักในประเทศญี่ปุ่นเกิน 15 วัน หรือไปทำงาน หรือมีวัตถุประสงค์อื่นๆ จะต้องยื่นขอวีซ่าตามปกติ) มีดังต่อไปนี้<br> 
                                            1. ตั๋วเครื่องบินขาออกจากประเทศญี่ปุ่น<br> 
                                            2. สิ่งที่ยืนยันว่าท่านสามารถรับผิดชอบค่าใช้จ่ายที่อาจเกิดขึ้นในระหว่างที่พำนักในประเทศญี่ปุ่นได้ (เช่น เงินสด บัตรเครดิต เป็นต้น)<br>
                                            3. ชื่อ ที่อยู่ และหมายเลขติดต่อในระหว่างที่พำนักในประเทศญี่ปุ่น (เช่น คนรู้จัก โรงแรมและอื่นๆ)<br>
                                            4. กำหนดการเดินทางระหว่างที่พำนักในประเทศญี่ปุ่น
                                        </li>
                                        <li>คุณสมบัติการเข้าประเทศญี่ปุ่น (สำหรับกรณีการเข้าประเทศญี่ปุ่นด้วยมาตรการยกเว้นวีซ่า)
                                            1. หนังสือเดินทางต้องมีอายุการใช้งานเหลืออยู่<br> 
                                            2. กิจกรรมใดๆ ที่จะกระทาในประเทศญี่ปุ่นจะต้องไม่เป็นสิ่งที่ขัดต่อกฎหมาย และเข้าข่ายคุณสมบัติการพำนักระยะสั้น<br>
                                            3. ในขั้นตอนการขอเข้าประเทศ จะต้องระบุระยะเวลาการพำนักไม่เกิน 15 วัน<br>
                                            4. เป็นผู้ที่ไม่มีประวัติการถูกส่งตัวกลับจากประเทศญี่ปุ่น มิได้อยู่ในระยะเวลาของการถูกปฏิเสธไม่ให้เข้าประเทศ และไม่เข้าข่ายคุณสมบัติที่จะถูกปฏิเสธไม่ให้เข้าประเทศ
                                        </li>
                                    </ul>  
                                </div>

                                <h4><span class="condi"><i class="fas fa-exclamation-circle"></i></span> ข้อตกลงสำคัญ โปรดตรวจสอบก่อนสำรองที่นั่ง</h4>
                                <div class="detail-condi">
                                    <ul>
                                        <li>เพื่อให้การสั่งซื้อ และตกลงซื้อขาย สินค้า บริการ จากบริษัท ฯ เป็นไปโดยสมบูรณ์ กรุณาดำเนินการดังต่อไปนี้ </li>
                                        <li>1.ท่านต้องตรวจสอบการสะกดเป็นภาษาอังกฤษต่าง ๆ ให้ตรงกับ หนังสือเดินทาง ( Passport )
                                            <ul>
                                                <li>1.1 ชื่อ + นามสกุล ของผู้โดยสารทุกคน</li>
                                                <li>1.2 คำนำหน้า ชื่อ เช่น Mr. / Mrs. / Miss.</li>
                                                <li>1.3 ชื่อ / ชั้นยศ / ทางตำรวจ / ทหารเป็นต้น (ถ้ามีและต้องการระบุ)</li>
                                                <li>1.4 เบอร์สะสมไมล์ของสายการบินต่าง ๆ (ในกรณีที่สามารถสะสมไมล์ได้)</li>
                                                <li>1.5 กรณีมีเด็กร่วมเดินทาง โปรดตรวจสอบว่าอายุเด็กนั้น ๆ อยู่ในเกณฑ์ที่จะต้องใช้ราคาบัตรโดยสารประเภทใด  ตรงตามอายุของเด็กหรือไม่</li>
                                                <li>1.6 โปรดตรวจสอบ อายุ ของหนังสือเดินทาง ( Passport ) ของผู้โดยสาร และผู้ร่วมเดินทางทุกท่าน ว่าจะต้องคงมีอายุเหลือ ณ วันเดินทาง มากกว่า 6 เดือน ขึ้นไป</li>
                                            </ul>
                                        </li>
                                        <li>2. ความผิดพลาดในข้อ 1.1 – 1.5 อาจสามารถแก้ไขเปลี่ยนแปลงได้ หากยังไม่ได้มีการ ออกบัตรโดยสาร ทั้งนี้หากมีตรวจพบความผิดพลาดภายหลังการออกบัตรโดยสารแล้ว การแก้ไขเปลี่ยนแปลงใดๆ ผู้โดยสารจะต้องชำระค่าใช้จ่าย ในการแก้ไขเปลี่ยนแปลงดังกล่าว  โดยผู้โดยสารต้องเป็นผู้รับภาระค่าใช้จ่ายทั้งหมดที่เกิดขึ้นเอง ส่วนในกรณี 1.6 ผู้ซื้อ จะต้องเป็นผู้ตรวจสอบ และเตรียมความพร้อมของเอกสารด้วยตัวท่านเอง บริษัทฯ ไม่สามารถ ดำเนินการใดๆ แทนท่านได้ทั้งสิ้น</li>
                                        <li>3. กรณีที่ ท่านไม่ได้ทำการทักท้วงใดๆ แบบเป็นลายลักษณ์อักษร บริษัทฯ ถือว่าท่านได้ตกลงรับทราบเงื่อนไข และข้อกำหนดทั้งหมด ของบริษัทฯ เป็นที่เรียบร้อยแล้ว โดยหากเกิดความเสียหายใดๆ ขึ้น บริษัทฯ ไม่ต้องรับผิดชอบ ใดๆ ทั้งสิ้น</li>
                                        <li>4. หากท่านมีข้อสงสัยใด ๆ กรุณาสอบถามเจ้าหน้าที่ฝ่ายช่วยเหลือและสำรองที่นั่ง ที่ท่านติดต่อได้ตลอดเวลาทำการของบริษัทฯ ระหว่างเวลา 07.30 - 22.00 น ในวันจันทร์ - ศุกร์ และในวันเสาร์-อาทิตย์ ระหว่างเวลา 07.30.00-22.00 น. ได้ทางโทรศัพท์ หมายเลข 0-2379-1249 Hotlines : 062 914 2361</li>
                                    </ul>  
                                </div>
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
                        <div id="tabs-3">
<!--                            <div id="reviews">
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
                            </div>-->
                        </div>
                    </div>
                </div>
                <div class="period-table-bottom">
                    <h3><i class="far fa-calendar"></i> ข้อมูลราคา</h3>
                    <div class="tabledate-form-to periods-table-detail">
                        <table id="periods_table" class="table table-sm table-bordered text-center js-periods-table">
                            <thead class="thead-light">
                                <tr>
                                    <th colspan="2" class="align-middle py-4">กำหนดการดินทาง</th>
                                    <th class="align-middle py-4">
                                        <span class="d-inline d-sm-none">ราคา</span>
                                        <span class="d-none d-sm-inline">ผู้ใหญ่พักคู่<br> ท่านละ</span>
                                    </th>
                                    <th class="align-middle d-none d-sm-table-cell py-4">เด็กไม่เพิ่มเตียง<br> ท่านละ</th>
                                    <th class="align-middle d-none d-sm-table-cell py-4"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tourPackageList as $tourPackageObj)
                                <tr class="period-row-header">
                                    <td class="align-middle days-from text-sm-center">
                                        {{$tourPackageObj->tour_period_start}}
                                    </td>
                                    <td class="align-middle days-from text-sm-center">
                                        {{$tourPackageObj->tour_period_end}}
                                    </td>
                                    <td class="align-middle days-from text-sm-center">
                                        ฿{{number_format($tourPackageObj->tour_period_adult_price)}}
                                    </td>
                                    <td class="align-middle days-from text-sm-center">
                                        ฿{{number_format($tourPackageObj->tour_period_child_price)}}
                                    </td>
                                    <td class="align-middle days-from text-sm-center">
                                        @if($tourPackageObj->tour_period_status == 'Y')
                                        <a type="button" target="_blank" href="{{ url('/tour-confirm/'.$tourPackageObj->tour_package_id.'/'.$tourPackageObj->tour_period_id) }}" class="btn btn-outline-orange  btn-table-cell py-0 btn-confirm-periods"  data-target=".period_7001273_table" aria-expanded="false" aria-controls="periods">จอง</a>
                                        @else
                                        <a type="button" href="{{ url('/tour-confirm/'.$tourPackageObj->tour_package_id.'/'.$tourPackageObj->tour_period_id) }}" class="btn btn-outline-secondary  btn-table-cell btn-confirm-periods disabled" disabled="">เต็ม</a>
                                        @endif
                                    </td> 
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <p class="text-center">*** ราคาดั่งกล่าวอาจมีการปรับเปลี่ยนหากสายการบินมีการเรียกเก็บภาษีน้ำมันเเละภาษีสนามบินเพิ่ม ***</p>       
                    </div>
                    <div class="row">
                        <div class="pdf-download btn btn-rounded">
                            <a id="" href="">ดาวน์โหลดเอกสารทัวร์นี้ (PDF)</a>
                        </div>
                    </div> 
                </div>
            </div>
            <!-- กล่องจอง -->
            <div class="col-md-3">
                <div class="detail-sidebar">                    
                    <div class="booking-info">
                        <h3>- จองทัวร์นี้ -</h3>
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
<!--                            <div class="form-elements form-adult">
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
                                <span>อายุ 12 ปีขึ้นไป</span>
                            </div>
                            <div class="form-elements form-kids">
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
                                    <i class="far fa-check-circle" style="padding-right: 10px;"></i>ส่งใบจอง
                                </button>
                            </div>
                        </div>
                    </div>
                <!-- Trigger the modal with a button -->
                <div class="call-and-line">
                    <div class="call-to-book">
                        <button type="button" class="btn btn-call-book" data-toggle="modal" data-target="#myModal">
                                <i class="awe-icon awe-icon-phone"></i>
                                <span style="font-size: 25px">โทรจอง</span>                       
                        </button>
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
                    <div class="call-to-book2">
                        <button type="button" class="btn btn-call-book" data-toggle="modal" data-target="#myModal2">    
                            <i class="fab fa-line"></i>                            
                            <span style="font-size: 25px">จองผ่านไลน์</span>
                        </button>
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
</section>

<!--period-table    -->
<div class="container">

</div>        
<!--end period-table--> 
@stop

@section('footer_scripts')
<script type="text/javascript">
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
    var two_qty = 0;
    var one_qty = 0;
    var child_one_qty = 0;
    var child_nb_qty = 0;
</script>
<script type="text/javascript" src="{{ asset('js/tour/tour-detail.js') }}"></script>
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