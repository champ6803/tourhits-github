@extends('layout.main')
@section('page_title','Tour Detail')
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
    font-size: 20px;
    color: #515050;
    margin-bottom: 0;
    text-overflow: ellipsis;
    overflow: hidden;
    white-space: nowrap;
}

.cart-footer .cart-subtotal .subtotal-title h5 {color: #EC2424;   }
.cart-footer .cart-subtotal .subtotal {color: #EC2424;}

.checkout-page__content #payment .place-order input {
   
    background-color: #EC2424; }

    
</style>
    
    <!-- BREADCRUMB -->
        <section>
            <div class="container">
                <div class="breadcrumb">
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Destinations</a></li>
                        <li><a href="#">North America</a></li>
                        <li><a href="#">Japan</a></li>
                        <li><a href="#">รหัสทัวร์ #6315</a></li>
                        <li><span>ใบจอง</span></li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- BREADCRUMB -->
        
    <!-- PAGE WRAP -->
    <div id="page-wrap">
        <!-- PRELOADER -->
        <div class="preloader"></div>
        <!-- END / PRELOADER -->
        
        <section class="product-detail">
            <div class="container">
                <div class="row center">
                    <div class="col-md-2"></div>
                    <div class="col-md-3">
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
                    
                    <div class="col-md-6">
                        <div class="product-detail__info">
                            <div class="product-title">
                                <h2 style="color:#EC2424">ทัวร์ญี่ปุ่น โอซาก้า ทาคายาม่า นากาโน่</h2> <h2 style="color:#EC2424">(6 วัน 4 คืน)</h2>
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
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                </div>
            
        </section>
        
        <section class="checkout-section-demo">
            <div class="container-detail-confirm">

                
                
                <div class="row">
                    <div class="col-lg-12">
                        <div class="checkout-page__top">
                            <div class="title">
                                <h1 class="text-uppercase" style="color:#333333; "><i class="fas fa-suitcase"></i> กรอกรายละเอียดการจอง</h1>
                            </div>
                            <span class="phone"><i class="awe-icon awe-icon-phone"></i> ติดต่อเรา : 062 914 2361 <br> <i class="fab fa-line"></i> จองผ่านไลน์ : @Tourhits </span>
                            
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="checkout-page__sidebar">
                            <ul>
                                <li class="current"><a href="checkout-yourcart.html">Your Cart</a></li>
                                <li><a href="checkout-customer.html">Customer information</a></li>
                                <li><a href="checkout-complete.html">Complete order</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="checkout-page__content">
                            <div class="yourcart-content">
                                <div class="content-title">
                                    <h2><i class="fas fa-male"></i> <i class="fas fa-female"></i> <i class="fas fa-child"></i>&nbspจำนวนผู้โดยสาร</h2>
                                </div>
                                <div class="cart-content">
<!--ผู้ใหญ่                                        -->
                                    <table class="cart-table">
                                        <thead>
                                            <tr>
<!--                                                <th class="product-remove"></th>-->
                                                <th class="product-name" style="color: #EC2424"><i class="fas fa-male"></i> <i class="fas fa-female"></i> ผู้ใหญ่ (บาท/ท่าน)</th>
                                                <th class="product-price"></th>
                                                <th class="product-quantity"></th>
                                                <th class="product-subtotal" style="color: #EC2424">$ 67.909</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                
                                                <td class="product-name">
                                                    <span>พักคู่</span>
                                                </td>
                                                <td class="product-price">
                                                    <span class="amount">$ 748&nbspx</span>
                                                </td>
                                                <td class="product-quantity">
                                                    <div class="quantity buttons_added">
                                                        <button type="button" class="minus">
                                                            <i class="fa fa-caret-up"></i>
                                                        </button>
                                                        <input type="number" class="qty" value="0">
                                                        <button type="button" class="plus">
                                                            <i class="fa fa-caret-down"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                                <td class="product-subtotal">
                                                    <span class="amount">$ 253</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                
                                                <td class="product-name">
                                                    <span>พักเดี่ยว</span>
                                                </td>
                                                <td class="product-price">
                                                    <span class="amount">$ 748&nbspx</span>
                                                </td>
                                                <td class="product-quantity">
                                                    <div class="quantity buttons_added">
                                                        <button type="button" class="minus">
                                                            <i class="fa fa-caret-up"></i>
                                                        </button>
                                                        <input type="number" class="qty" value="0">
                                                        <button type="button" class="plus">
                                                            <i class="fa fa-caret-down"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                                <td class="product-subtotal">
                                                    <span class="amount">$ 253</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                
                                                <td class="product-name">
                                                    <span>พักสาม</span>
                                                </td>
                                                <td class="product-price">
                                                    <span class="amount">$ 748&nbspx</span>
                                                </td>
                                                <td class="product-quantity">
                                                    <div class="quantity buttons_added">
                                                        <button type="button" class="minus">
                                                            <i class="fa fa-caret-up"></i>
                                                        </button>
                                                        <input type="number" class="qty" value="0">
                                                        <button type="button" class="plus">
                                                            <i class="fa fa-caret-down"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                                <td class="product-subtotal">
                                                    <span class="amount">$ 253</span>
                                                </td>
                                            </tr>
<!--                                            <tr>
                                                <td class="product-remove">
                                                    <a href="#"><i class="awe-icon awe-icon-close-o"></i></a>
                                                </td>
                                                <td class="product-name">
                                                    <span>Room type 4</span>
                                                </td>
                                                <td class="product-price">
                                                    <span class="amount">$ 748/night</span>
                                                </td>
                                                <td class="product-quantity">
                                                    <div class="quantity buttons_added">
                                                        <button type="button" class="minus">
                                                            <i class="fa fa-caret-up"></i>
                                                        </button>
                                                        <input type="number" class="qty" value="2">
                                                        <button type="button" class="plus">
                                                            <i class="fa fa-caret-down"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                                <td class="product-subtotal">
                                                    <span class="amount">$ 253</span>
                                                </td>
                                            </tr>-->
                                        </tbody>
                                    </table>
<!--เด็ก                                       -->
                                    <table class="cart-table">
                                        <thead>
                                            <tr>
<!--                                                <th class="product-remove"></th>-->
                                                <th class="product-name" style="color: #EC2424"><i class="fas fa-child"></i> เด็ก (บาท/ท่าน)</th>
                                                <th class="product-price"></th>
                                                <th class="product-quantity"></th>
                                                <th class="product-subtotal" style="color: #EC2424">$ 67.909</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                
                                                <td class="product-name">
                                                    <span>พักคู่</span>
                                                </td>
                                                <td class="product-price">
                                                    <span class="amount">$ 748&nbspx</span>
                                                </td>
                                                <td class="product-quantity">
                                                    <div class="quantity buttons_added">
                                                        <button type="button" class="minus">
                                                            <i class="fa fa-caret-up"></i>
                                                        </button>
                                                        <input type="number" class="qty" value="0">
                                                        <button type="button" class="plus">
                                                            <i class="fa fa-caret-down"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                                <td class="product-subtotal">
                                                    <span class="amount">$ 253</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                
                                                <td class="product-name">
                                                    <span>มีเตียง</span>
                                                </td>
                                                <td class="product-price">
                                                    <span class="amount">$ 748&nbspx</span>
                                                </td>
                                                <td class="product-quantity">
                                                    <div class="quantity buttons_added">
                                                        <button type="button" class="minus">
                                                            <i class="fa fa-caret-up"></i>
                                                        </button>
                                                        <input type="number" class="qty" value="0">
                                                        <button type="button" class="plus">
                                                            <i class="fa fa-caret-down"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                                <td class="product-subtotal">
                                                    <span class="amount">$ 253</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                
                                                <td class="product-name">
                                                    <span>ไม่มีเตียง</span>
                                                </td>
                                                <td class="product-price">
                                                    <span class="amount">$ 748&nbspx</span>
                                                </td>
                                                <td class="product-quantity">
                                                    <div class="quantity buttons_added">
                                                        <button type="button" class="minus">
                                                            <i class="fa fa-caret-up"></i>
                                                        </button>
                                                        <input type="number" class="qty" value="0">
                                                        <button type="button" class="plus">
                                                            <i class="fa fa-caret-down"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                                <td class="product-subtotal">
                                                    <span class="amount">$ 253</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                <div class="content-title">
                                    <h2><i class="fas fa-calculator"></i>&nbspราคาโดยประมาณ</h2>
                                </div>        
                                    <table class="cart-table">                                      
                                        <tbody>
                                            <tr>
                                                
                                                <td class="product-name">
                                                    <span>ผู้ใหญ่</span>
                                                </td>
                                                <td class="product-price">
                                                    <span class="amount">2&nbspท่าน</span>
                                                </td>
                                                
                                                <td class="product-subtotal">
                                                    <span class="amount">$ 253</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                
                                                <td class="product-name">
                                                    <span>เด็ก</span>
                                                </td>
                                                <td class="product-price">
                                                    <span class="amount">0&nbspท่าน</span>
                                                </td>
                                                
                                                <td class="product-subtotal">
                                                    <span class="amount">0</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                
                                                <td class="product-name">
                                                    <span>ส่วนลด</span>
                                                </td>
                                                <td class="product-price">
                                                    <span class="amount">500&nbspบาท x 2 ท่าน</span>
                                                </td>
                                                
                                                <td class="product-subtotal">
                                                    <span class="amount">-1000</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <div class="cart-footer">
                                        <div class="cart-subtotal">
                                            <div class="subtotal-title">
                                                <h5>ราคารวมทั้งหมด</h5>
                                            </div>
                                            <div class="subtotal">
                                                <span class="amount">$ 467.909</span>
                                                
                                            </div>                                            
                                        </div>                                                                                
                                    </div>
                                </div>
<!-- รายละเอียดคนจอง -->                                 
                                <div class="woocommerce-billing-fields">
                                    <h3><i class="far fa-handshake"></i> ข้อมูลผู้จองสำหรับติดต่อกลับ</h3><em>กรุณากรอกข้อมูลที่ถูกต้องและครบถ้วน เพื่อการตอบกลับที่รวดเร็ว</em><br>
                                    
                                    <div class="form-row" id="billing_first_name_field">
                                        <label>ชื่อ *</label>
                                        <input type="text">
                                    </div>
                                    <div class="form-row" id="billing_last_name_field">
                                        <label>นามสกุล *</label>
                                        <input type="text">
                                    </div>
                                    <div class="form-row" id="billing_email">
                                        <label>อีเมล</label>
                                        <input type="text">
                                    </div>
                                    <div class="form-row" id="billing_phone_field">
                                        <label>หมายเลขโทรศัพท์ *</label>
                                        <input type="text">
                                    </div>
                                    <div class="form-row" id="order_comments_field">
                                            <label>ข้อมูลเพิ่มเติม</label>
                                            <textarea></textarea>
                                    </div>
                                    <div class="form-row form-row-wide create-account">
                                        <input id="createaccount" type="checkbox"> <label for="createaccount">สมัครสมาชิก ?</label>
                                    </div>              
                                </div>
                                
                                <div id="payment">
                                    
                                    <div class="form-row place-order">
                                        <div class="form-row place-order">
                                            <input type="submit" class="button alt" id="place_order" value="ส่งใบจอง" </i>
                                        </div>
                                        
                                    </div>
                                </div>
                                
                            </div> <!-- พท การ์ดทางขวา -->  
                          
                            
                        </div>
                        
                        
                        
                    </div> <!-- end lg9   -->
                    
                 </div> <!-- end row   -->
            </div>
            

        
            
        </section>





    </div>
    <!-- END / PAGE WRAP -->

@stop