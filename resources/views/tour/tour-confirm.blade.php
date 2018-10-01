@extends('layout.main')
@section('page_title','รายละเอียดการจอง')
@section('main-content')
<style>

    .product-detail{
        padding-bottom: 0px;
        padding-top: 15px;
        background-color: #F7F7F7;

    }

    .product-detail .trips {
        overflow: hidden;
        margin-top: 10px;
        margin-left: -15px;
        margin-right: -15px;

    }
    .product-detail .trips .item {
        padding: 0px 15px;
        float: left;
        /*    width: 25%;*/
    }

    .product-detail .trips .item p{
        font-size: 19px;
        color: #fff;
        margin-bottom: 0;
        text-overflow: ellipsis;
        overflow: hidden;
        white-space: nowrap;
    }

    .cart-footer .cart-subtotal .subtotal-title h5 {color: #EC2424;   }
    .cart-footer .cart-subtotal .subtotal {color: #EC2424;}

    .checkout-page__content #payment .place-order input {background-color: #EC2424; }
    .checkout-page__sidebar ul li a {background-color: #333333; }
    .checkout-page__sidebar ul li:hover a {color: #F6A95B;}
    .checkout-page__sidebar ul li a p {margin-left: 100px; }
    .checkout-page__sidebar ul li a h5 {font-weight: 300;}
    .fix-img { width: 60px; height:60px;  padding-right: 20px;}

    .form-control{padding: 0px 12px;}
    .checkout-page__content .contact-form{
        margin-left: 0px;
        margin-right: 0px;}
    .checkout-page__content .contact-form .form-item { padding: 5px;}

    .panel {
        border: 0;
    }
    .panel-title{
        font-size: 20px;
        color: #ec2424;
    }
    .table > thead > tr > th, .table > thead > tr > td {
        border: 0;
    }
    
    .product-detail__info .product-title h2 {
    color: #c33132;
    display: inline;
    font-size:19px;
    }
</style>
<!-- BREADCRUMB -->
<section>
    <div class="container">
        <div class="breadcrumb">
            <ul>
                <li><a href="{{url('/')}}">แพ็คเกจทัวร์</a></li>
                <li><a href="{{ URL::to('search-tour/' .$tourPackage->tour_country_name. '?country='. $tourPackage->tour_country_id)}}">{{$tourPackage->tour_country_name}}</a></li>
                <li><a href="{{url('tour-detail/' .$tourPackage->tour_package_id. '/'.$tourPackage->tour_package_name)}}">{{$tourPackage->tour_package_name}}</a></li>
                <li><span>ใบจอง</span></li>
            </ul>
        </div>
    </div>
</section>
<!-- BREADCRUMB -->

<section class="product-detail">
    <div class="container">
        <div class="row center">
            <div class="col-md-2"></div>
            <div class="col-md-3">
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
            <div class="col-md-6">
                <div class="product-detail__info">
                    <div class="product-title">
                        <h2>{{ $tourPackage->tour_package_name }}</h2>
                    </div>
                    <div class="product-address">
                        <span><?php echo $tourPackage->tour_package_detail ?></span>
                    </div>
                    <div class="trips">
                        <div class="item warp-text">
                            <h6>สายการบิน</h6>
                            <p><i class="fas fa-plane" style="padding-right: 10px"></i>{{ $tourPackage->airline_name }}</p>
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
                    </div>

                </div>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>
</section>

<section class="checkout-section-demo">
    <!--            <div class="container-detail-confirm">-->
    <div class="container">     
        <div class="line-gradient"></div>
        <div class="row">
            <div class="col-sm-12">
                <div class="checkout-page__top">
                    <div class="title">
                        <h1 class="text-uppercase" style="color:#333333; padding-top:20px;"><i class="fas fa-suitcase"></i> ข้อมูลการจอง</h1>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-12">
                <div class="checkout-page__sidebar">
                    <ul>
<!--                        <li><a style="background-color: #EC2424;">
                                <div class="fix-img" style="float:left;"><img src="{{asset('images/ticket.png')}}" alt=""></div>
                                วันเดินทางที่เลือก
                            </a>
                        </li>
                        <select id='sel_tour_package_period' class="form-control form-control-sm option-confirm-tour">
                            <option val='0'>วันเดินทางที่เลือก</option>
                        </select>
                        <hr>-->
                        <li>
                            <a>
                                <div class="fix-img" style="float:left;"><img src="{{asset('images/airplane.png')}}" alt=""></div>
                                <h5 style="color:#C1BDBD;">วันเดินทางไป</h5>
                                <p id='txt_tour_period_start'></p>
                            </a>
                        </li>
                        <li>
                            <a>
                                <div class="fix-img" style="float:left;"><img src="{{asset('images/luggage.png')}}" alt=""></div>
                                <h5 style="color:#C1BDBD">วันเดินทางกลับ</h5>
                                <p id='txt_tour_period_end'></p>
                            </a>
                        </li>
                    </ul>
                    <hr>
<!--                            <span class="phone"><i class="awe-icon awe-icon-phone"></i> ติดต่อเรา : 062 914 2361 <br> <i class="fab fa-line"></i> จองผ่านไลน์ : @Tourhits</span>-->
                </div>
            </div>
            <div class="col-md-9 col-sm-12">
                <div class="checkout-page__content">
                    <!--<div class="yourcart-content">-->
                    <div class="content-title">
                        <h2><i class="fas fa-male"></i> <i class="fas fa-female"></i> <i class="fas fa-child"></i>&nbspจำนวนผู้โดยสาร</h2>
                    </div>
                    <div class="cart-content">
                        <!--ผู้ใหญ่-->
                        <table class="cart-table">
                            <thead>
                                <tr>
<!--                                                <th class="product-remove"></th>-->
                                    <th class="product-name" colspan="3" style="color: #EC2424"><i class="fas fa-male"></i> <i class="fas fa-female"></i> ผู้ใหญ่ (บาท/ท่าน)</th>
<!--                                            <th class="product-price"></th>
                                    <th class="product-quantity"></th>-->
                                    <th class="product-subtotal" style="color: #EC2424"><span id='adult_total_amount' class='adult_total_amount'></span> ฿</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>                                                
                                    <td class="product-name">
                                        <span>พักคู่</span>
                                    </td>
                                    <td class="product-price">
                                        <span id="two_price"></span> ฿
                                    </td>
                                    <td class="product-quantity">
                                        <div class="quantity buttons_added">
                                            <button type="button" class="minus two_minus">
                                                <i class="fa fa-caret-up"></i>
                                            </button>
                                            <input type="number" id='two_qty' class="qty" value="0">
                                            <button type="button" class="plus two_plus">
                                                <i class="fa fa-caret-down"></i>
                                            </button>
                                        </div>
                                    </td>
                                    <td class="product-subtotal">
                                        <span class="adult-subtotal" id="two_amount"></span> ฿
                                    </td>
                                </tr>
                                <tr>
                                    <td class="product-name">
                                        <span>พักเดี่ยว</span>
                                    </td>
                                    <td class="product-price">
                                        <span id="one_price"></span> ฿
                                    </td>
                                    <td class="product-quantity">
                                        <div class="quantity buttons_added">
                                            <button type="button" class="minus one_minus">
                                                <i class="fa fa-caret-up"></i>
                                            </button>
                                            <input type="number" id='one_qty' class="qty" value="0">
                                            <button type="button" class="plus one_plus">
                                                <i class="fa fa-caret-down"></i>
                                            </button>
                                        </div>
                                    </td>
                                    <td class="product-subtotal">
                                        <span class="adult-subtotal" id="one_amount"></span> ฿
                                    </td>
                                </tr>
                                <tr>

                                    <td class="product-name">
                                        <span>พักสาม</span>
                                    </td>
                                    <td class="product-price">
                                        <span id="three_price"></span> ฿
                                    </td>
                                    <td class="product-quantity">
                                        <div class="quantity buttons_added">
                                            <button type="button" class="minus three_minus">
                                                <i class="fa fa-caret-up"></i>
                                            </button>
                                            <input type="number" id='three_qty' class="qty" value="0">
                                            <button type="button" class="plus three_plus">
                                                <i class="fa fa-caret-down"></i>
                                            </button>
                                        </div>
                                    </td>
                                    <td class="product-subtotal">
                                        <span class="adult-subtotal" id="three_amount"></span> ฿
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <!--เด็ก -->
                        <table class="cart-table">
                            <thead>
                                <tr>
<!--                                                <th class="product-remove"></th>-->
                                    <th class="product-name" colspan="3" style="color: #EC2424"><i class="fas fa-child"></i> เด็ก (บาท/ท่าน)</th>
<!--                                                <th class="product-price"></th>
                                    <th class="product-quantity"></th>-->
                                    <th class="product-subtotal" style="color: #EC2424"><span id='child_total_amount' class='child_total_amount'></span> ฿</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>

                                    <td class="product-name">
                                        <span>พักคู่</span>
                                    </td>
                                    <td class="product-price">
                                        <span id='child_two_price' class="amount"></span> ฿
                                    </td>
                                    <td class="product-quantity">
                                        <div class="quantity buttons_added">
                                            <button id='child_two_minus' type="button" class="minus">
                                                <i class="fa fa-caret-up"></i>
                                            </button>
                                            <input type="number" id='child_two_qty' class="qty" value="0">
                                            <button id='child_two_plus' type="button" class="plus">
                                                <i class="fa fa-caret-down"></i>
                                            </button>
                                        </div>
                                    </td>
                                    <td class="product-subtotal">
                                        <span id='child_two_amount' class="child-subtotal"></span> ฿
                                    </td>
                                </tr>
                                <tr>

                                    <td class="product-name">
                                        <span>มีเตียง</span>
                                    </td>
                                    <td class="product-price">
                                        <span id='child_one_price' class="amount"></span> ฿
                                    </td>
                                    <td class="product-quantity">
                                        <div class="quantity buttons_added">
                                            <button id='child_one_minus' type="button" class="minus">
                                                <i class="fa fa-caret-up"></i>
                                            </button>
                                            <input type="number" id='child_one_qty' class="qty" value="0">
                                            <button id='child_one_plus' type="button" class="plus">
                                                <i class="fa fa-caret-down"></i>
                                            </button>
                                        </div>
                                    </td>
                                    <td class="product-subtotal">
                                        <span id='child_one_amount' class="child-subtotal"></span> ฿
                                    </td>
                                </tr>
                                <tr>
                                    <td class="product-name">
                                        <span>ไม่มีเตียง</span>
                                    </td>
                                    <td class="product-price">
                                        <span id='child_nb_price' class="amount"></span> ฿
                                    </td>
                                    <td class="product-quantity">
                                        <div class="quantity buttons_added">
                                            <button id='child_nb_minus' type="button" class="minus">
                                                <i class="fa fa-caret-up"></i>
                                            </button>
                                            <input type="number" id='child_nb_qty' class="qty" value="0">
                                            <button id='child_nb_plus' type="button" class="plus">
                                                <i class="fa fa-caret-down"></i>
                                            </button>
                                        </div>
                                    </td>
                                    <td class="product-subtotal">
                                        <span id='child_nb_amount' class="child-subtotal"></span> ฿
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="content-title">
                            <h2><i class="fas fa-calculator"></i>&nbspราคาโดยประมาณ</h2>
                        </div>        
                        <table class="cart-table">                                      
                            <tbody>
                            <thead>
                                <tr>
<!--                                                <th class="product-remove"></th>-->
                                    <th class="product-name" colspan="3" style="color: #EC2424">ราคารวมทั้งหมด</th>
                                    <th class="product-subtotal" style="color: #EC2424"><span id='all_total_amount'></span> ฿</th>
                                </tr>
                            </thead>
                            <tr>                                               
                                <td class="product-name" colspan="3">
                            <li><span>ผู้ใหญ่</span> <span id="adult_qty"></span></li>                                                   
                            </td>                                                                                              
                            <td class="product-subtotal">
                                <span class='adult_total_amount'></span> ฿
                            </td>
                            </tr>
                            <tr>
                                <td class="product-name" colspan="3">
                            <li><span>เด็ก</span> <span id="child_qty"></span></li>
                            </td>
                            <td class="product-subtotal">
                                <span class='child_total_amount'></span> ฿
                            </td>
                            </tr>
<!--                            <tr>

                                <td class="product-name" colspan="3">
                            <li><span>ส่วนลด</span></li>  
                            </td>                                                                                           
                            <td class="product-subtotal">
                                <span class="amount">-1000</span>
                            </td>
                            </tr>-->
                            </tbody>
                        </table>

                        <!--                                    <div class="cart-footer">
                                                                <div class="cart-subtotal">
                                                                    <div class="subtotal-title">
                                                                        <h5>ราคารวมทั้งหมด</h5>
                                                                    </div>
                                                                    <div class="subtotal">
                                                                        <span class="amount">$ 467.909</span>
                                                                        
                                                                    </div>                                            
                                                                </div>                                                                                
                                                            </div>-->
                    </div>
                    <div id='login_panel' class="content-title text-center">
                        <h2 style="color:#EC2424"><i class="fas fa-lock"></i>&nbsp;<a href="/login">เข้าสู่ระบบ</a></h2>
                    </div>
                    <div class="panel-group">
                        <div class="panel panel-default">
                            <div id="collapse1" class="panel-collapse">
                                <div class="contact-form">
                                    <span><h4 style="color:#ec2424; display: inline; line-height: 1.6;"> ข้อมูลผู้จองสำหรับติดต่อกลับ (ที่อยู่อื่น)</h4></span><br>
                                    <em>กรุณากรอกข้อมูลที่ถูกต้องและครบถ้วน เพื่อการตอบกลับที่รวดเร็ว</em><br>
                                    <div class="confirm-form">
                                        <div class="form-item">
                                            <input id='cus_name' type="text" value="" name="name" placeholder=" ชื่อของคุณ *">
                                        </div>
                                        <div class="form-item">
                                            <input id='cus_email' type="email" value="" name="email" placeholder="อีเมล์ของคุณ">
                                        </div>
                                        <div class="form-item">
                                            <input id='line_id' type="text" value="" name="line_id" placeholder=" Line *">
                                        </div>
                                        <div class="form-item">
                                            <input id='phone' type="number" value="" name="phone" maxlength="10" placeholder="เบอร์โทรศัพท์ *">
                                        </div>
                                        <div class="form-textarea-wrapper">
                                            <textarea id='remark' name="message">หมายเหตุ</textarea>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="payment">
                        <div class="form-row place-order">
                            <div class="form-row place-order">
                                <input onclick="sendTourOrders()" type="submit" class="button alt" id="place_order" value="ส่งใบจอง" </i>
                            </div>
                        </div>
                    </div>
                </div> <!-- พท การ์ดทางขวา -->  
            </div> <!-- end lg9   -->
        </div> <!-- end row   -->
        
    </div>
</section>
@stop
@section('footer_scripts')
<script type="text/javascript">
    var tour_package_period_start = <?php echo json_encode($tourPackage->tour_package_period_start); ?>;
    var tour_package_period_end = <?php echo json_encode($tourPackage->tour_package_period_end); ?>;
    var tourPackageList = <?php echo json_encode($tourPackageList); ?>;
    var tourPackagePeriod = <?php echo json_encode($tourPackagePeriod); ?>;
    var tourPackage = <?php echo json_encode($tourPackage); ?>;
    var tour_code = <?php echo json_encode($tourPackage->tour_package_id); ?>;
</script>
<script type="text/javascript" src="{{ asset('js/tour/tour-confirm.js') }}"></script>
@endsection