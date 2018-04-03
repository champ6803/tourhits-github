@extends('layout.main')
@section('page_title','Tour Detail')
@section('main-content')
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

        <!-- BREADCRUMB -->
        <section>
            <div class="container">
                <div class="breadcrumb">
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Destinations</a></li>
                        <li><a href="#">North America</a></li>
                        <li><a href="#">USA</a></li>
                        <li><span>NewYork</span></li>
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
                                <h2>ทัวร์ญี่ปุ่น โอซาก้า ทาคายาม่า นากาโน่</h2> <h2>(6 วัน 4 คืน)</h2>
                            </div>
                            <div class="product-address">
                                <span>เทศกาลแสงสี Nabana no Sato Winter Illumination ลิงแช่ออนเซ็น ตะลุยหิมะ 'เล่นสกีรีสอร์ท' บิน XJ</span>
                            </div>
                            <div class="product-email">
                                
                                <a href="#" class="btn btn-pdf" style="color: #FFFFFF; "><i class="fas fa-cloud-download-alt"></i>&nbsp;ดาวน์โหลด PDF</a>
                            </div>

                            <div class="trips">
                                <div class="item">
                                    <h6>สายการบิน</h6>
                                    <p><i class="fas fa-plane" style="padding-right: 10px"></i>AirAsia X</p>
                                </div>
                                <div class="item">
                                    <h6>ระยะเวลา</h6>
                                    <p><i class="far fa-clock" style="padding-right: 10px"></i>6 วัน 4 คืน</p>
                                </div>
                                <div class="item">
                                    <h6>ช่วงเวลา</h6>
                                    <p><i class="far fa-calendar-minus" style="padding-right: 10px"></i>เม.ย. - มิ.ย. 61</p>
                                    <p>(3ช่วงเวลา)</p>
                                </div>
                                <div class="item">
                                    <h6>รหัสทัวร์</h6>
                                    <p><i class="fas fa-barcode" style="padding-right: 10px"></i>#6315</p>
                                </div>
                                <div class="item">
                                    <h6><i class="fas fa-share-alt" style="padding-right: 10px"></i>แชร์</h6>
                                    <p></p>
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
            <div id="calendar" class="animated animated-sm bounceInUp">
            
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="calendar fc fc-ltr">
                            <table class="fc-header" style="width:100%">
                                <tbody>
                                    <tr>
                                        <td class="fc-header-left">
<!--                                             <span class="fc-button fc-button-prev fc-state-default fc-corner-left" unselectable="on"><span class="fc-text-arrow">‹</span></span> <span class="fc-button fc-button-next fc-state-default fc-corner-right" unselectable="on"><span class="fc-text-arrow">›</span></span> <span class="fc-header-space"></span><span class="fc-button fc-button-today fc-state-default fc-corner-left fc-corner-right fc-state-disabled" unselectable="on">today</span>-->

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
<!--                                            <span class="fc-button fc-button-month fc-state-default fc-corner-left fc-state-active" unselectable="on">month</span><span class="fc-button fc-button-agendaWeek fc-state-default" unselectable="on">week</span><span class="fc-button fc-button-agendaDay fc-state-default fc-corner-right" unselectable="on">day</span>-->

                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="fc-content" style="position: relative; min-height: 1px;">
                                <div class="fc-view fc-view-month fc-grid" style="position: relative; min-height: 1px;" unselectable="on">
<!--        ปุ่มกลมๆ                            <div style="position:absolute;z-index:8;top:0;left:0">
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
                                    </div> -->
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
                                                            <div style="position: relative;">120,000฿</div>
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
                                                            <div style="position: relative;">29,000฿</div>
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
            </div>                           
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
                                    <div class="item">
                                        <img src="images/img/1.jpg" alt="">
                                    </div>
                                    <div class="item">
                                        <img src="images/img/2.jpg" alt="">
                                    </div>
                                    <div class="item">
                                        <img src="images/img/3.jpg" alt="">
                                    </div>
                                    <div class="item">
                                        <img src="images/img/4.jpg" alt="">
                                    </div>
                                    <div class="item">
                                        <img src="images/img/5.jpg" alt="">
                                    </div>
                                    <div class="item">
                                        <img src="images/img/6.jpg" alt="">
                                    </div>
                                    <div class="item">
                                        <img src="images/img/7.jpg" alt="">
                                    </div>
                                    <div class="item">
                                        <img src="images/img/8.jpg" alt="">
                                    </div>
                                    <div class="item">
                                        <img src="images/img/9.jpg" alt="">
                                    </div>
                                    <div class="item">
                                        <img src="images/img/10.jpg" alt="">
                                    </div>
                                </div>
                                <div class="product-slider-thumb-row">
                                    <div class="product-slider-thumb">
                                        <div class="item">
                                            <img src="images/img/demo-thumb-1.jpg" alt="">
                                        </div>
                                        <div class="item">
                                            <img src="images/img/demo-thumb-2.jpg" alt="">
                                        </div>
                                        <div class="item">
                                            <img src="images/img/demo-thumb-3.jpg" alt="">
                                        </div>
                                        <div class="item">
                                            <img src="images/img/demo-thumb-4.jpg" alt="">
                                        </div>
                                        <div class="item">
                                            <img src="images/img/demo-thumb-5.jpg" alt="">
                                        </div>
                                        <div class="item">
                                            <img src="images/img/demo-thumb-1.jpg" alt="">
                                        </div>
                                        <div class="item">
                                            <img src="images/img/demo-thumb-2.jpg" alt="">
                                        </div>
                                        <div class="item">
                                            <img src="images/img/demo-thumb-3.jpg" alt="">
                                        </div>
                                        <div class="item">
                                            <img src="images/img/demo-thumb-4.jpg" alt="">
                                        </div>
                                        <div class="item">
                                            <img src="images/img/demo-thumb-5.jpg" alt="">
                                        </div>
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
                                    <a href="#tabs-2">สิ่งที่ต้องรู้</a>
                                </li>
                                <li>
                                    <a href="#tabs-3">Review &amp; rating</a>
                                </li>
                            </ul>
                            <div class="product-tabs__content">
                                <div id="tabs-1">
                                    <div class="trip-schedule-accordion accordion">
                                        <h3>Day 1 : Downtown Tour</h3>
                                        <div>
                                            <div class="tour-map-wrapper">
                                                <div class="tour-map">
                                                    <div data-latlong="21.036697, 105.834871"></div>
                                                </div>

                                                <div class="trips">
                                                    <div class="item">
                                                        <h6>Sights and Stops</h6>
                                                        <p><i class="awe-icon awe-icon-attraction"></i>26</p>
                                                    </div>
                                                    <div class="item">
                                                        <h6>Time length</h6>
                                                        <p><i class="fa fa-clock-o"></i>2 hours</p>
                                                    </div>
                                                </div>
                                                <br>
                                                <h6>Departure time</h6>
                                                <p>Departs: 08:00 am - 6:00 pm (Every 25-30 minutes)</p>
                                                <p>Citysights NY Visitor Center (in lobby of Madame Tussauds) 234 W.42nd st. Times Square and 8th Avenue between 49th and 50th Streets, New York, NY 10018</p>
                                            </div>
                                            <br>
                                            <p>Get on and go places! If you want to hit the most-visited spots in New York City, this is the one: CitySights NY’s Downtown Tour. You’ll get easy access to the most popular sites in town: the Statue of Liberty, the Empire State Building and “Ground Zero,” where the World Trade Center once stood and where a stunning new skyscraper soars today. Narrated by licensed NYC tour guides who know the city inside and out, this hop on/hop off excursion on a double-decker bus takes you through Greenwich Village, Little Italy, Chinatown, Wall Street and the Financial District, Battery Park City, South Street Seaport, the Lower East Side, along with Rockefeller Center, the United Nations building, Carnegie Hall, the Broadway theater district and more.</p>
                                            <p>Get on and go places! If you want to hit the most-visited spots in New York City, this is the one: CitySights NY’s Downtown Tour. You’ll get easy access to the most popular sites in town: the Statue of Liberty, the Empire State Building and “Ground Zero,” where the World Trade Center once stood and where a stunning new skyscraper soars today. Narrated by licensed NYC tour guides who know the city inside and out, this hop on/hop off excursion on a double-decker bus takes you through Greenwich Village, Little Italy, Chinatown, Wall Street and the Financial District, Battery Park City, South Street Seaport, the Lower East Side, along with Rockefeller Center, the United Nations building, Carnegie Hall, the Broadway theater district and more.</p>
                                        </div>
                                        <h3>Day 2 : Uptown Treasures &amp; Harlem Tour</h3>
                                        <div>
                                            <p>
                                            Sed non urna. Donec et ante. Phasellus eu ligula. Vestibulum sit amet
                                            purus. Vivamus hendrerit, dolor at aliquet laoreet, mauris turpis porttitor
                                            velit, faucibus interdum tellus libero ac justo. Vivamus non quam. In
                                            suscipit faucibus urna.
                                            </p>
                                        </div>
                                        <h3>Day 3 : Chinatown</h3>
                                        <div>
                                            <p>
                                            Nam enim risus, molestie et, porta ac, aliquam ac, risus. Quisque lobortis.
                                            Phasellus pellentesque purus in massa. Aenean in pede. Phasellus ac libero
                                            ac tellus pellentesque semper. Sed ac felis. Sed commodo, magna quis
                                            lacinia ornare, quam ante aliquam nisi, eu iaculis leo purus venenatis dui.
                                            </p>
                                            <ul>
                                                <li>List item one</li>
                                                <li>List item two</li>
                                                <li>List item three</li>
                                            </ul>
                                        </div>
                                        <h3>Day 4 : Parks &amp; Bridges</h3>
                                        <div>
                                            <p>
                                            Cras dictum. Pellentesque habitant morbi tristique senectus et netus
                                            et malesuada fames ac turpis egestas. Vestibulum ante ipsum primis in
                                            faucibus orci luctus et ultrices posuere cubilia Curae; Aenean lacinia
                                            mauris vel est.
                                            </p>
                                            <p>
                                            Suspendisse eu nisl. Nullam ut libero. Integer dignissim consequat lectus.
                                            Class aptent taciti sociosqu ad litora torquent per conubia nostra, per
                                            inceptos himenaeos.
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div id="tabs-2">
                                    <table class="good-to-know-table">
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
                                                    <p><img src="images/paypal2.png" alt=""></p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div id="tabs-3">
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
                                                            <img src="images/img/demo-thumb.jpg" alt="">
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
                                                            <img src="images/img/demo-thumb.jpg" alt="">
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
                                                            <img src="images/img/demo-thumb.jpg" alt="">
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
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="detail-sidebar">
                            
                            <div class="call-to-book">
                                <i class="awe-icon awe-icon-phone"></i>
                                <em style="font-size: 15px">โทรสอบถาม/จอง</em>
                                <span style="font-size: 18px">062 914 2361</span>
                            </div>
                                
                            <div class="call-to-book2">    
                                <i class="fab fa-line"></i>
                                <em style="font-size: 15px">จองผ่านไลน์</em>
                                <span style="font-size: 18px">@Tourhits</span>
                            </div> 
<!--                            <i class="awe-icon awe-icon-phone"></i>
                                <em style="font-size: 15px">จองผ่านไลน์</em>
                                <span style="font-size: 18px">@ tourhits</span>-->
                            

                            
                                                        
                            <div class="booking-info">
                                <h3>- จองทัวร์นี้ -</h3>
                                <div class="form-select-date">
                                    <div class="form-elements">
                                        <label>เลือกช่วงเวลาเดินทาง</label>
                                        <div class="form-item">
                                            <i class="awe-icon awe-icon-calendar"></i>
                                            <input type="text" class="awe-calendar" value="Date">
                                        </div>
                                        <span>* Vouchers valid for 12 months after purchase.</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-elements form-adult">
                                        <label>ผู้ใหญ่</label>
                                        <div class="form-item">
                                            <select class="awe-select">
                                                <option>0</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                            </select>
                                        </div>
                                        <span>อายุ 12 ปีขึ้นไป</span>
                                    </div>
                                    <div class="form-elements form-kids">
                                        <label>เด็ก</label>
                                        <div class="form-item">
                                            <select class="awe-select">
                                                <option>0</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                            </select>
                                        </div>
                                        <span>อายุ 11 หรือต่ำกว่า</span>
                                    </div>
                                </div>
                                <div class="price">
                                    <em>ประเมินราคา</em>
                                    <span class="amount">$5,923</span>
                                </div>
                                <div class="form-submit">
                                    <div class="add-to-cart">
                                        <button type="submit">
                                            <i class="far fa-check-circle" style="padding-right: 10px;"></i>ส่งใบจอง
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@stop