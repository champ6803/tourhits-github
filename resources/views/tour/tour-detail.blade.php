@extends('layout.main')
@section('page_title','Tour Detail')
@section('main-content')
        <!-- BREADCRUMB -->
        <section>
            <div class="container">
                <div class="breadcrumb">
                    <ul>
                        <li><a href="#">แพ็คเกจทัวร์</a></li>
                        <li><a href="#">ทัวร์ญี่ปุ่น</a></li>
                        <li><a href="#">ทัวร์ญี่ปุ่น โอซาก้า ทาคายาม่า นากาโน่ (6 วัน 4 คืน)</a></li>
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
                                        <h4>วันที่ 1 : สนามบินดอนเมือง</h4>
                                            <div>
                                                <div class="tour-map-wrapper">
                                                        <div class="tour-map">

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
                                        
                                                </div>

                                                <div class="trips">
                                                    <div class="item">
                                                        <h6><i class="fas fa-utensils"></i> มื้ออาหาร</h6>
                                                        <p>บริการอาหารและเครื่องดื่มบนเครื่อง</p>
                                                    </div>
                                                    <div class="item">
                                                        <h6><i class="far fa-moon"></i> โรงแรม</h6>
                                                        <p>-</p>
                                                    </div>
                                                </div>
                                                <br>
                                                <h6><i class="fas fa-spinner"></i> หมายเหตุ</h6>
                                                <p>Departs: 08:00 am - 6:00 pm (Every 25-30 minutes)</p>
                                                <p>Citysights NY Visitor Center (in lobby of Madame Tussauds) 234 W.42nd st. Times Square and 8th Avenue between 49th and 50th Streets, New York, NY 10018</p>
                                                </div>
                                                <br>
                                                <h5><span><i class="fas fa-circle-notch"></i></span>&nbsp;ช่วงดึก</h5>                                               
                                                <ul>
                                                    <li>20.00 น. พร้อมกันที่ สนามบินนานาชาติดอนเมือง ชั้น 3 อาคารผู้โดยสารระหว่างประเทศ เคาน์เตอร์ สายการบิน AIR ASIA X เจ้าหน้าที่ของบริษัทฯ คอยให้การต้อนรับ และอำนวยความสะดวกในการเช็คอิน สายการบิน AIR ASIA X ใช้เครื่อง AIRBUS A330-300 จำนวน 377 ที่นั่ง จัดที่นั่งแบบ 3-3-3 (น้ำหนักกระเป๋า 20 กก./ท่าน หากต้องการซื้อน้ำหนักเพิ่ม ต้องเสียค่าใช้จ่าย)</li>
                                                    <li>23.45 น. เหินฟ้าสู่ เมืองนาริตะ ประเทศญี่ปุ่น โดยเที่ยวบินที่ XJ600 (บริการอาหารและเครื่องดื่มบนเครื่อง)</li>                                                    
                                                </ul>
                                            </div>
                                        
                                        <h4>วันที่ 2 : สนามบินนาริตะ–วัดอาซากุสะ–ผ่านชมโตเกียวสกายทรี – ล่องเรือโจรสลัด - โกเท็มบะ เอ้าต์เลต–บุฟเฟ่ต์ขาปูยักษ์ แช่ออนเซน</h4>
                                            <div>
                                                <div class="tour-map-wrapper">
                                                        <div class="tour-map">

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
                                        
                                                </div>

                                                <div class="trips">
                                                    <div class="item">
                                                        <h6><i class="fas fa-utensils"></i> มื้ออาหาร</h6>
                                                        <p>เที่ยง & เย็น</p>
                                                    </div>
                                                    <div class="item">
                                                        <h6><i class="far fa-moon"></i> โรงแรม</h6>
                                                        <p>พักที่โรงแรม FUJISAN GARDEN HOTEL หรือระดับเดียวกัน</p>
                                                    </div>
                                                </div>
                                                <br>
                                                <h6><i class="fas fa-spinner"></i> หมายเหตุ</h6>
                                                <p>Departs: 08:00 am - 6:00 pm (Every 25-30 minutes)</p>
                                                <p>Citysights NY Visitor Center (in lobby of Madame Tussauds) 234 W.42nd st. Times Square and 8th Avenue between 49th and 50th Streets, New York, NY 10018</p>
                                </div>
                                                <br>
                                                <h5><span><i class="fas fa-circle-notch"></i></span>&nbsp;ช่วงเช้า</h5>                                               
                                                <ul>
                                                    <li>08.00 น. ถึง เมืองนาริตะ ประเทศญี่ปุ่น หลังจากผ่านขั้นตอนศุลกากรแล้วนำท่านเดินทางสู่ที่พัก (เวลาที่ญี่ปุ่น เร็วกว่าเมืองไทย 2 ชั่วโมง กรุณาปรับนาฬิกาของท่านเพื่อความสะดวกในการนัดหมายเวลา)</li>
                                                    <li>นำท่านสู่ “กรุงโตเกียว” นมัสการเจ้าแม่กวนอิม “วัดอาซากุสะ” วัดที่ได้ชื่อว่าเป็นวัดที่มีความศักดิ์สิทธิ์และได้รับความเคารพนับถือมากที่สุดแห่งหนึ่งในกรุงโตเกียว ภายในประดิษฐานองค์เจ้าแม่กวนอิมทองคำมีผู้คนนิยมมากราบไหว้ขอพรเพื่อความเป็นสิริมงคลตลอดทั้งปี วัดพุทธที่เก่าแก่ที่สุดในภูมิภาคคันโต และมีผู้คนนิยมมากราบไหว้เพื่อความเป็นสิริมงคลตลอดทั้งปี</li>
                                                    <li>ถ่ายภาพเป็นที่ระลึกกับ ประตูฟ้าคำรณ ซึ่งมีโคมไฟสีแดง ขนาดยักษ์ที่มีความสูงถึง 4.5 เมตร เป็นโคมไฟที่ใหญ่ที่สุดในโลก เลือกชมและเช่าเครื่องรางของขลังอันศักดิ์สิทธ์ของวัดแห่งนี้</li>
                                                    <li>เดินต่อไปที่ “ถนนนากามิเซะ” (Nakamise dori) ถนนช๊อปปิ้ง ขายขนม ของฝาก ของที่ระลึก ขนมที่ซื้อกลับบ้านจะใส่กล่อง ห่อสวยงาม สามารถซื้อเป็นของฝากได้อย่างสวยงาม ส่วนขนมแบบที่กินเลยเช่น Soft ice cream, มันอัดแท่ง, ซาลาเปาทอด, ข้าวพองคล้ายขนมนางเล็ด ฯลฯ</li>
                                                    <li>เดินทางผ่านชม “โตเกียวสกายทรี” (Tokyo Sky tree) เป็นหอที่เพิ่งสร้างขึ้นมาใหม่และยังเป็นเหมือนแลนด์มาร์คของโตเกียวถ่ายรูปกับหอคอย ตั้งอยู่ใจกลางของ Sumida City Ward เป็นตึกที่สูงที่สุดในญี่ปุ่น มีความสูงถึง 634 เมตร บริเวณโดยรอบๆเป็นแหล่งช็อปปิ้งขนาดใหญ่รวมทั้งมีอควอเรียมอยู่ในนั้นด้วย โตเกียวสกายทรีถูกแบ่งเป็นสองขั้นโดยชั้นแรกสูง 350 เมตร และชั้นบนสูง 450 เมตร เป็นจุดชมวิวเมืองโตเกียวที่สวยที่สุดอีกจุดหนึ่งเนื่องจากสามารถชมวิวได้รอบทิศ 360 องศา </li>
                                                </ul>
                                                <h5><span><i class="fas fa-circle-notch"></i></span>&nbsp;ช่วงบ่าย</h5>                                               
                                                <ul>
                                                    <li>เดินทางสู่ วนอุทยานแห่งชาติ ฮาโกเน่ สถานที่ท่องเที่ยวที่ได้รับความนิยม โดยเป็นส่วนหนึ่งของอุทยานแห่งชาติ ฟูจิ-ฮาโกเน่-อิสึ ที่ผู้มาเยือนสามารถชื่นชมความงามแห่งธรรมชาติ และดอกไม้นานาพันธุ์หลากสีสันที่เบ่งบานตลอดทั้งปี ทิวทัศน์ที่สวยงามหลากหลาย รวมไปถึงภูเขาไฟฟูจิ ทะเลสาบอะชิ และ โอวาคุดานิ ฮาโกเน่ยังมีชื่อเสียงในเรื่องของการเป็นแหล่งน้ำพุร้อน ที่แปลกไปกว่านั้นคือ มีจำนวนน้ำพุร้อนมากถึง 17 แห่ง</li>
                                                    <li>นำท่าน ล่องเรือโจรสลัด ที่ทะเลสาบอาชิ ทะเลสาบที่ก่อตัวจากลาวาของภูเขาไฟฟูจิ หากวันใดอากาศสดใส ท่านจะได้สัมผัสกับทัศนียภาพอันงดงามของทะเลสาบที่มีภูเขาไฟฟูจิเป็นฉากหลัง</li>
                                                    <li>นำเดินทางสู่ โกเท็มบะ แฟคทอรี่ เอ้าท์เล็ต ให้ท่านได้ช้อปปิ้งอย่างจุใจกับสินค้าแบรนด์เนมที่แหล่งรวมสินค้านำเข้าและสินค้าแบรนด์ญี่ปุ่นโกอินเตอร์มากมาย เช่น MK MICHEL KLEIN, MORGAN, ELLE, CYNTHIA ROWLEY, DIFFUSIONE TESSILE ฯลฯ เลือกซื้อกระเป๋าไฮไซ BALLY, PRADA, GUCCI, DIESEL,TUMI,GAP, ARMANY ฯลฯ </li>
                                                    <li>ได้เวลานำท่านเข้าสู่ที่พัก </li>
                                                    <li>ให้ท่านได้ผ่อนคลายกับการ แช่น้ำแร่ออนเซ็นธรรมชาติ เชื่อว่าถ้าได้แช่น้ำแร่แล้ว จะทำให้ผิวพรรณสวยงามและช่วยให้ระบบหมุนเวียนโลหิตดีขึ้น </li>
                                                </ul>
                                            </div>
                                        
                                        <h4>วันที่ 3 : ภูเขาไฟฟูจิ-หมู่บ้านโอชิโนะฮักไก-พิพิธภัณฑ์แผ่นดินไหว-ช้อปปิ้งสุดมันส์ชินจูกุ</h4>
                                            <div>
                                                <div class="tour-map-wrapper">
                                                        <div class="tour-map">

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
                                        
                                                </div>

                                                <div class="trips">
                                                    <div class="item">
                                                        <h6><i class="fas fa-utensils"></i> มื้ออาหาร</h6>
                                                        <p>เช้า & บ่าย</p>
                                                    </div>
                                                    <div class="item">
                                                        <h6><i class="far fa-moon"></i> โรงแรม</h6>
                                                        <p>พักที่โรงแรม NARITA GATEWAY HOTEL หรือเทียบเท่าระดับเดียวกัน</p>
                                                    </div>
                                                </div>
                                                <br>
                                                <h6><i class="fas fa-spinner"></i> หมายเหตุ</h6>
                                                <p>Departs: 08:00 am - 6:00 pm (Every 25-30 minutes)</p>
                                                <p>Citysights NY Visitor Center (in lobby of Madame Tussauds) 234 W.42nd st. Times Square and 8th Avenue between 49th and 50th Streets, New York, NY 10018</p>
                                </div>
                                                <br>
                                                <h5><span><i class="fas fa-circle-notch"></i></span>&nbsp;ช่วงเช้า</h5>                                               
                                                <ul>
                                                    <li></li>
                                                    <li></li>
                                                </ul>
                                                <h5><span><i class="fas fa-circle-notch"></i></span>&nbsp;ช่วงบ่าย</h5>                                               
                                                <ul>
                                                    <li></li>
                                                    <li></li>
                                                </ul>
                                            </div>                                        

                                        <h4>วันที่ 4 : อิสระในกรุงโตเกียว หรือ ซื้อทัวร์เสริมโตเกียวดิสนีย์แลนด์</h4>
                                            <div>
                                                <div class="tour-map-wrapper">
                                                        <div class="tour-map">

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
                                        
                                                </div>

                                                <div class="trips">
                                                    <div class="item">
                                                        <h6><i class="fas fa-utensils"></i> มื้ออาหาร</h6>
                                                        <p>อาหารเช้าโรงแรม</p>
                                                    </div>
                                                    <div class="item">
                                                        <h6><i class="far fa-moon"></i> โรงแรม</h6>
                                                        <p>ที่พัก NARITA GATEWAY HOTEL หรือเทียบเท่าระดับเดียวกัน</p>
                                                    </div>
                                                </div>
                                                <br>
                                                <h6><i class="fas fa-spinner"></i> หมายเหตุ</h6>
                                                <p>Departs: 08:00 am - 6:00 pm (Every 25-30 minutes)</p>
                                                <p>Citysights NY Visitor Center (in lobby of Madame Tussauds) 234 W.42nd st. Times Square and 8th Avenue between 49th and 50th Streets, New York, NY 10018</p>
                                                </div>
                                                <br>
                                                <h5><span><i class="fas fa-circle-notch"></i></span>&nbsp;ช่วงเช้า</h5>                                               
                                                <ul>
                                                    <li></li>
                                                    <li></li>
                                                </ul>
                                                <h5><span><i class="fas fa-circle-notch"></i></span>&nbsp;ช่วงบ่าย</h5>                                               
                                                <ul>
                                                    <li></li>
                                                    <li></li>
                                                </ul>
                                            </div>

                                        <h4>วันที่ 5 : สนามบินนาริตะ – สนามบินดอนเมือง</h4>
                                            <div>
                                                <div class="tour-map-wrapper">
                                                        <div class="tour-map">

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
                                        
                                                </div>

                                                <div class="trips">
                                                    <div class="item">
                                                        <h6><i class="fas fa-utensils"></i> มื้ออาหาร</h6>
                                                        <p>บริการอาหารและเครื่องดื่มบนเครื่อง</p>
                                                    </div>
                                                    <div class="item">
                                                        <h6><i class="far fa-moon"></i> โรงแรม</h6>
                                                        <p>-</p>
                                                    </div>
                                                </div>
                                                <br>
                                                <h6><i class="fas fa-spinner"></i> หมายเหตุ</h6>
                                                <p>Departs: 08:00 am - 6:00 pm (Every 25-30 minutes)</p>
                                                <p>Citysights NY Visitor Center (in lobby of Madame Tussauds) 234 W.42nd st. Times Square and 8th Avenue between 49th and 50th Streets, New York, NY 10018</p>
                                                </div>
                                                <br>
                                                <h5><span><i class="fas fa-circle-notch"></i></span>&nbsp;ช่วงเช้า</h5>                                               
                                                <ul>
                                                    <li></li>
                                                    <li></li>
                                                </ul>
                                                <h5><span><i class="fas fa-circle-notch"></i></span>&nbsp;ช่วงบ่าย</h5>                                               
                                                <ul>
                                                    <li></li>
                                                    <li></li>
                                                </ul>
                                                
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