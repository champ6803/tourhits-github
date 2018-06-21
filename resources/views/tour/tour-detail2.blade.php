@extends('layout.main')
@section('page_title','หน้าเสริจออกแบบใหม่')
@section('main-content')

<style>
    .page-sidebar .sidebar-title{
        border-top-color: #ea1c24;
    }
    
</style>

<!-- PAGE WRAP -->
    <div id="page-wrap">
        <!-- PRELOADER -->
        <div class="preloader"></div>
        <!-- END / PRELOADER -->
         
                    
        <!-- HEADING PAGE -->
        <section class="awe-parallax category-heading-section-demo">
            <div class="awe-overlay"></div>
            <div class="container">
                <div class="category-heading-content category-heading-content__2 text-uppercase">
                    <!-- BREADCRUMB -->
                    <div class="breadcrumb">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><span>Trips</span></li>
                        </ul>
                    </div>
                    <!-- BREADCRUMB -->
                    
                </div>
            </div>
        </section>
        <!-- END / HEADING PAGE -->
                    
                    
        <section class="filter-page">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-top">
                            <select class="awe-select">
                                <option>Best Match</option>
                                <option>Best Rate</option>
                            </select>
                        </div>
                    </div>
                       
                    
                    
                    <div class="col-md-6 col-md-push-3">                       
                        <div class="row">
                            <div class="col-md-12">
                                <div class="swiper-container tour-local-wrapper local-nav swiper-container-horizontal swiper-container-free-mode">
                                    <div class="swiper-wrapper tour-local-nav" style="transform: translate3d(0px, 0px, 0px);">
                                        <div class="swiper-slide local-nav-item swiper-slide-active" style="margin-right: 10px;">
                                            <a href="" title="" class="">ทัวร์ญี่ปุ่นราคาถูก</a>
                                        </div>
                                        <div class="swiper-slide local-nav-item swiper-slide-next" style="margin-right: 10px;">
                                            <a href="" title="" class="">ทัวร์โตเกียว</a>
                                        </div>
                                        <div class="swiper-slide local-nav-item" style="margin-right: 10px;">
                                            <a href="" title="" class="">ทัวร์ญี่ปุ่นฟุกุโอกะ</a>
                                        </div>
                                        <div class="swiper-slide local-nav-item" style="margin-right: 10px;">
                                            <a href="" title="" class="">ทัวร์วันปีใหม่ญี่ปุ่น</a>
                                        </div>
                                        <div class="swiper-slide local-nav-item" style="margin-right: 10px;">
                                            <a href="" title="" class="">ทัวร์ญุ่ปุ่น ตุลาคม</a>
                                        </div>
                                        <div class="swiper-slide local-nav-item" style="margin-right: 10px;">
                                            <a href="" title="" class="">ทัวร์ญี่ปุ่น การบินไทย</a>
                                        </div>
                                        <div class="swiper-slide local-nav-item" style="margin-right: 10px;">
                                            <a href="" title="" class="">ทัวร์ญี่ปุ่น ฤดูใบไม้ผลิ</a>
                                        </div>
                                        <div class="swiper-slide local-nav-item" style="margin-right: 10px;">
                                            <a href="" title="" class="">ทัวร์วันปีใหม่ญี่ปุ่น</a>
                                        </div>
                                        <div class="swiper-slide local-nav-item" style="margin-right: 10px;">
                                            <a href="" title="" class="">ทัวร์ญุ่ปุ่น ตุลาคม</a>
                                        </div>
                                        <div class="swiper-slide local-nav-item" style="margin-right: 10px;">
                                            <a href="" title="" class="">ทัวร์ญี่ปุ่น การบินไทย</a>
                                        </div>
                                        <div class="swiper-slide local-nav-item" style="margin-right: 10px;">
                                            <a href="" title="" class="">ทัวร์ญี่ปุ่น ฤดูใบไม้ผลิ</a>
                                        </div>                                   
                                    </div>
                                    <div class="swiper-button-next"><i class="fa fa-angle-right"></i></div>
                                    <div class="swiper-button-prev swiper-button-disabled"><i class="fa fa-angle-left"></i></div>
                                </div>
                            </div>                           
                        </div>
                        
                        <div class="filter-page__content">
                            <div class="filter-item-wrapper">
                                <!-- ITEM -->
                                <div class="trip-item">
                                    <div class="item-media">
                                        <div class="image-cover">
                                            <img src="images/trip/1.jpg" alt="">
                                        </div>
                                        <div class="trip-icon">
                                            <img src="images/trip.jpg" alt="">
                                        </div>
                                    </div>
                                    <div class="item-body">
                                        <div class="item-title">
                                            <h2>
                                                <a href="#">All Around Town Tour by City Sights</a>
                                            </h2>
                                        </div>
                                        <div class="item-list">
                                            <ul>
                                                <li>4 Attractions</li>
                                                <li>2 days, 1 night</li>
                                            </ul>
                                        </div>
                                        <div class="item-footer">
                                            <div class="item-rate">
                                                <span>7.5 Good</span>
                                            </div>
                                            <div class="item-icon">
                                                <i class="awe-icon awe-icon-gym"></i>
                                                <i class="awe-icon awe-icon-car"></i>
                                                <i class="awe-icon awe-icon-food"></i>
                                                <i class="awe-icon awe-icon-level"></i>
                                                <i class="awe-icon awe-icon-wifi"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item-price-more">
                                        <div class="price">
                                            Adult ticket
                                            <ins>
                                                <span class="amount">$200</span>
                                            </ins>
                                            <del>
                                                <span class="amount">$200</span>
                                            </del>
                                    
                                        </div>
                                        <a href="#" class="awe-btn">Book now</a>
                                    </div>
                                </div>
                                <!-- END / ITEM -->
                                <!-- ITEM -->
                                <div class="trip-item">
                                    <div class="item-media">
                                        <div class="image-cover">
                                            <img src="images/trip/2.jpg" alt="">
                                        </div>
                                        <div class="trip-icon">
                                            <img src="images/trip.jpg" alt="">
                                        </div>
                                    </div>
                                    <div class="item-body">
                                        <div class="item-title">
                                            <h2>
                                                <a href="#">Spectacular City Views</a>
                                            </h2>
                                        </div>
                                        <div class="item-list">
                                            <ul>
                                                <li>4 Attractions</li>
                                                <li>2 days, 1 night</li>
                                            </ul>
                                        </div>
                                        <div class="item-footer">
                                            <div class="item-rate">
                                                <span>7.5 Good</span>
                                            </div>
                                            <div class="item-icon">
                                                <i class="awe-icon awe-icon-gym"></i>
                                                <i class="awe-icon awe-icon-car"></i>
                                                <i class="awe-icon awe-icon-food"></i>
                                                <i class="awe-icon awe-icon-level"></i>
                                                <i class="awe-icon awe-icon-wifi"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item-price-more">
                                        <div class="price">
                                            Adult ticket
                                            <ins>
                                                <span class="amount">$200</span>
                                            </ins>
                                            <del>
                                                <span class="amount">$200</span>
                                            </del>
                                    
                                        </div>
                                        <a href="#" class="awe-btn">Book now</a>
                                    </div>
                                </div>
                                <!-- END / ITEM -->
                                <!-- ITEM -->
                                <div class="trip-item">
                                    <div class="item-media">
                                        <div class="image-cover">
                                            <img src="images/trip/3.jpg" alt="">
                                        </div>
                                        <div class="trip-icon">
                                            <img src="images/trip.jpg" alt="">
                                        </div>
                                    </div>
                                    <div class="item-body">
                                        <div class="item-title">
                                            <h2>
                                                <a href="#">Romantic New York</a>
                                            </h2>
                                        </div>
                                        <div class="item-list">
                                            <ul>
                                                <li>4 Attractions</li>
                                                <li>2 days, 1 night</li>
                                            </ul>
                                        </div>
                                        <div class="item-footer">
                                            <div class="item-rate">
                                                <span>7.5 Good</span>
                                            </div>
                                            <div class="item-icon">
                                                <i class="awe-icon awe-icon-gym"></i>
                                                <i class="awe-icon awe-icon-car"></i>
                                                <i class="awe-icon awe-icon-food"></i>
                                                <i class="awe-icon awe-icon-level"></i>
                                                <i class="awe-icon awe-icon-wifi"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item-price-more">
                                        <div class="price">
                                            Adult ticket
                                            <ins>
                                                <span class="amount">$200</span>
                                            </ins>
                                            <del>
                                                <span class="amount">$200</span>
                                            </del>
                                    
                                        </div>
                                        <a href="#" class="awe-btn">Book now</a>
                                    </div>
                                </div>
                                <!-- END / ITEM -->
                                <!-- ITEM -->
                                <div class="trip-item">
                                    <div class="item-media">
                                        <div class="image-cover">
                                            <img src="images/trip/4.jpg" alt="">
                                        </div>
                                        <div class="trip-icon">
                                            <img src="images/trip.jpg" alt="">
                                        </div>
                                    </div>
                                    <div class="item-body">
                                        <div class="item-title">
                                            <h2>
                                                <a href="#">NYC Family Fun Pass - Winter</a>
                                            </h2>
                                        </div>
                                        <div class="item-list">
                                            <ul>
                                                <li>4 Attractions</li>
                                                <li>2 days, 1 night</li>
                                            </ul>
                                        </div>
                                        <div class="item-footer">
                                            <div class="item-rate">
                                                <span>7.5 Good</span>
                                            </div>
                                            <div class="item-icon">
                                                <i class="awe-icon awe-icon-gym"></i>
                                                <i class="awe-icon awe-icon-car"></i>
                                                <i class="awe-icon awe-icon-food"></i>
                                                <i class="awe-icon awe-icon-level"></i>
                                                <i class="awe-icon awe-icon-wifi"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item-price-more">
                                        <div class="price">
                                            Adult ticket
                                            <ins>
                                                <span class="amount">$200</span>
                                            </ins>
                                            <del>
                                                <span class="amount">$200</span>
                                            </del>
                                    
                                        </div>
                                        <a href="#" class="awe-btn">Book now</a>
                                    </div>
                                </div>
                                <!-- END / ITEM -->
                                <!-- ITEM -->
                                <div class="trip-item">
                                    <div class="item-media">
                                        <div class="image-cover">
                                            <img src="images/trip/5.jpg" alt="">
                                        </div>
                                        <div class="trip-icon">
                                            <img src="images/trip.jpg" alt="">
                                        </div>
                                    </div>
                                    <div class="item-body">
                                        <div class="item-title">
                                            <h2>
                                                <a href="#">NYC Land &amp; Sea</a>
                                            </h2>
                                        </div>
                                        <div class="item-list">
                                            <ul>
                                                <li>4 Attractions</li>
                                                <li>2 days, 1 night</li>
                                            </ul>
                                        </div>
                                        <div class="item-footer">
                                            <div class="item-rate">
                                                <span>7.5 Good</span>
                                            </div>
                                            <div class="item-icon">
                                                <i class="awe-icon awe-icon-gym"></i>
                                                <i class="awe-icon awe-icon-car"></i>
                                                <i class="awe-icon awe-icon-food"></i>
                                                <i class="awe-icon awe-icon-level"></i>
                                                <i class="awe-icon awe-icon-wifi"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item-price-more">
                                        <div class="price">
                                            Adult ticket
                                            <ins>
                                                <span class="amount">$200</span>
                                            </ins>
                                            <del>
                                                <span class="amount">$200</span>
                                            </del>
                                    
                                        </div>
                                        <a href="#" class="awe-btn">Book now</a>
                                    </div>
                                </div>
                                <!-- END / ITEM -->
                                <!-- ITEM -->
                                <div class="trip-item">
                                    <div class="item-media">
                                        <div class="image-cover">
                                            <img src="images/trip/1.jpg" alt="">
                                        </div>
                                        <div class="trip-icon">
                                            <img src="images/trip.jpg" alt="">
                                        </div>
                                    </div>
                                    <div class="item-body">
                                        <div class="item-title">
                                            <h2>
                                                <a href="#">Spectacular City Views</a>
                                            </h2>
                                        </div>
                                        <div class="item-list">
                                            <ul>
                                                <li>4 Attractions</li>
                                                <li>2 days, 1 night</li>
                                            </ul>
                                        </div>
                                        <div class="item-footer">
                                            <div class="item-rate">
                                                <span>7.5 Good</span>
                                            </div>
                                            <div class="item-icon">
                                                <i class="awe-icon awe-icon-gym"></i>
                                                <i class="awe-icon awe-icon-car"></i>
                                                <i class="awe-icon awe-icon-food"></i>
                                                <i class="awe-icon awe-icon-level"></i>
                                                <i class="awe-icon awe-icon-wifi"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item-price-more">
                                        <div class="price">
                                            Adult ticket
                                            <ins>
                                                <span class="amount">$200</span>
                                            </ins>
                                            <del>
                                                <span class="amount">$200</span>
                                            </del>
                                    
                                        </div>
                                        <a href="#" class="awe-btn">Book now</a>
                                    </div>
                                </div>
                                <!-- END / ITEM -->
                            </div>


                            <!-- PAGINATION -->
                            <div class="page__pagination">
                                <span class="pagination-prev"><i class="fa fa-caret-left"></i></span>
                                <span class="current">1</span>
                                <a href="#">2</a>
                                <a href="#">3</a>
                                <a href="#">4</a>
                                <a href="#" class="pagination-next"><i class="fa fa-caret-right"></i></a>
                            </div>
                            <!-- END / PAGINATION -->
                        </div>
                    </div>
                    
<!--                    bar ซ้าย-->
                    <div class="col-md-3 col-md-pull-6">
                        <div class="page-sidebar">
                            <div class="sidebar-title hidden-xs">
                                <h3>ทัวร์ขายดี :</h3>
<!--                                <div class="clear-filter">
                                    <a href="#">Clear all</a>
                                </div>-->
                            </div>
                            <div class="left-bar1">
                                <div class="box-content hidden-xs">
                                    <div class="tour-left-bar-item">
                                        <div class="media">
                                            <div class="media-left">
                                                <a href="" title="">
                                                    <img class="media-object lazy" src="https://images.unsplash.com/photo-1519882189396-71f93cb4714b?ixlib=rb-0.3.5&s=0b977d67f187eec17eb555555ef59a6d&auto=format&fit=crop&w=500&q=60" 
                                                         alt="ทัวร์ญี่ปุ่น โอไดบะ ขึ้นภูเขาไฟฟูจิ ชมทุ่งดอกลาเวนเดอร์ นมัสการและขอพรวัดนาริตะและวัดอาซากุสะ" style="display: inline-block;">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="media-heading">
                                                    <a href="" title="">ทัวร์ญี่ปุ่น โอไดบะ ขึ้นภูเขาไฟฟูจิ ชมทุ่งดอกลาเวนเดอร์ นมัสการ...</a>
                                                </h6>
                                                <div class="peroid">เริ่มเดินทาง 21 มิ.ย. 61</div>
                                                <div class="price"><span>14,900</span> บาท</div>
                                            </div>                                        
                                        </div>
                                    </div>
                                    
                                    <div class="tour-left-bar-item">
                                        <div class="media">
                                            <div class="media-left">
                                                <a href="" title="">
                                                    <img class="media-object lazy" src="https://images.unsplash.com/photo-1519882189396-71f93cb4714b?ixlib=rb-0.3.5&s=0b977d67f187eec17eb555555ef59a6d&auto=format&fit=crop&w=500&q=60" 
                                                        alt="ทัวร์ญี่ปุ่น โอไดบะ ขึ้นภูเขาไฟฟูจิ ชมทุ่งดอกลาเวนเดอร์ นมัสการและขอพรวัดนาริตะและวัดอาซากุสะ" style="display: inline-block;">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="media-heading">
                                                    <a href="" title="">ทัวร์ญี่ปุ่น โอไดบะ ขึ้นภูเขาไฟฟูจิ ชมทุ่งดอกลาเวนเดอร์ นมัสการ...</a>
                                                </h6>
                                                <div class="peroid">เริ่มเดินทาง 21 มิ.ย. 61</div>
                                                <div class="price"><span>14,900</span> บาท</div>
                                            </div>                                        
                                        </div>
                                    </div>
                                    
                                    <div class="tour-left-bar-item">
                                        <div class="media">
                                            <div class="media-left">
                                                <a href="" title="">
                                                    <img class="media-object lazy" src="https://images.unsplash.com/photo-1519882189396-71f93cb4714b?ixlib=rb-0.3.5&s=0b977d67f187eec17eb555555ef59a6d&auto=format&fit=crop&w=500&q=60" 
                                                         alt="ทัวร์ญี่ปุ่น โอไดบะ ขึ้นภูเขาไฟฟูจิ ชมทุ่งดอกลาเวนเดอร์ นมัสการและขอพรวัดนาริตะและวัดอาซากุสะ" style="display: inline-block;">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="media-heading">
                                                    <a href="" title="">ทัวร์ญี่ปุ่น โอไดบะ ขึ้นภูเขาไฟฟูจิ ชมทุ่งดอกลาเวนเดอร์ นมัสการ...</a>
                                                </h6>
                                                <div class="peroid">เริ่มเดินทาง 21 มิ.ย. 61</div>
                                                <div class="price"><span>14,900</span> บาท</div>
                                            </div>                                        
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            
                            <div class="sidebar-title hidden-xs">
                                <h3>ทัวร์แนะนำ :</h3>         
                            </div>
                            <div class="left-bar2">
                                <div class="box-content hidden-xs">
                                   <div class="swiper-wrapper tour-local-nav" style="transform: translate3d(0px, 0px, 0px);">
                                        <div class="swiper-slide local-nav-item" style="margin-right: 10px;">
                                            <a href="" title="" class="">ทัวร์ญี่ปุ่นราคาถูก</a>
                                        </div>
                                        <div class="swiper-slide local-nav-item" style="margin-right: 10px;">
                                            <a href="" title="" class="">ทัวร์โตเกียว</a>
                                        </div>
                                        <div class="swiper-slide local-nav-item" style="margin-right: 10px;">
                                            <a href="" title="" class="">ทัวร์ญี่ปุ่นฟุกุโอกะ</a>
                                        </div>
                                        <div class="swiper-slide local-nav-item" style="margin-right: 10px;">
                                            <a href="" title="" class="">ทัวร์วันปีใหม่ญี่ปุ่น</a>
                                        </div>
                                        <div class="swiper-slide local-nav-item" style="margin-right: 10px;">
                                            <a href="" title="" class="">ทัวร์ญุ่ปุ่น ตุลาคม</a>
                                        </div>
                                        <div class="swiper-slide local-nav-item" style="margin-right: 10px;">
                                            <a href="" title="" class="">ทัวร์ญี่ปุ่น การบินไทย</a>
                                        </div>
                                        <div class="swiper-slide local-nav-item" style="margin-right: 10px;">
                                            <a href="" title="" class="">ทัวร์ญี่ปุ่น ฤดูใบไม้ผลิ</a>
                                        </div>
                                        <div class="swiper-slide local-nav-item" style="margin-right: 10px;">
                                            <a href="" title="" class="">ทัวร์วันปีใหม่ญี่ปุ่น</a>
                                        </div>
                                        <div class="swiper-slide local-nav-item" style="margin-right: 10px;">
                                            <a href="" title="" class="">ทัวร์ญุ่ปุ่น ตุลาคม</a>
                                        </div>
                                        <div class="swiper-slide local-nav-item" style="margin-right: 10px;">
                                            <a href="" title="" class="">ทัวร์ญี่ปุ่น การบินไทย</a>
                                        </div>
                                        <div class="swiper-slide local-nav-item" style="margin-right: 10px;">
                                            <a href="" title="" class="">ทัวร์ญี่ปุ่น ฤดูใบไม้ผลิ</a>
                                        </div>                                   
                                    </div> 
                                </div>
                                
                            <div class="sidebar-title hidden-xs">
                                <h3><i class="fas fa-filter"></i> คัดกรอง :</h3>         
                            </div>    
                            <!-- WIDGET -->
                            <div class="widget widget_has_radio_checkbox">
                                <h3>Trip Type</h3>
                                <ul>
                                    <li>
                                        <label>
                                            <input type="checkbox">
                                            <i class="awe-icon awe-icon-check"></i>
                                            Amusement park
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type="checkbox">
                                            <i class="awe-icon awe-icon-check"></i>
                                            Natural sight-seeing
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type="checkbox">
                                            <i class="awe-icon awe-icon-check"></i>
                                            Pool &amp; Waterpark
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type="checkbox">
                                            <i class="awe-icon awe-icon-check"></i>
                                            Museum
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type="checkbox">
                                            <i class="awe-icon awe-icon-check"></i>
                                            Religious and Cultural place
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type="checkbox">
                                            <i class="awe-icon awe-icon-check"></i>
                                            Shoping mall &amp; Market
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type="checkbox">
                                            <i class="awe-icon awe-icon-check"></i>
                                            Others
                                        </label>
                                    </li>
                                </ul>
                            </div>
                            <!-- END / WIDGET -->

                            <!-- WIDGET -->
                            <div class="widget widget_price_filter">
                                <h3>Price Level</h3>
                                <div class="price-slider-wrapper">
                                    <div class="price-slider"></div>
                                    <div class="price_slider_amount">
                                        <div class="price_label">
                                            <span class="from"></span> - <span class="to"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END / WIDGET -->

                            <!-- WIDGET -->
                            <div class="widget widget_has_radio_checkbox">
                                <h3>Star Rating</h3>
                                <ul>
                                    <li>
                                        <label>
                                            <input type="checkbox">
                                            <i class="awe-icon awe-icon-check"></i>
                                            <span class="rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </span>
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type="checkbox">
                                            <i class="awe-icon awe-icon-check"></i>
                                            <span class="rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </span>
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type="checkbox">
                                            <i class="awe-icon awe-icon-check"></i>
                                            <span class="rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </span>
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type="checkbox">
                                            <i class="awe-icon awe-icon-check"></i>
                                            <span class="rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </span>
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type="checkbox">
                                            <i class="awe-icon awe-icon-check"></i>
                                            <span class="rating">
                                                <i class="fa fa-star"></i>
                                            </span>
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type="checkbox">
                                            <i class="awe-icon awe-icon-check"></i>
                                            <span class="rating">
                                                Unrated
                                            </span>
                                        </label>
                                    </li>
                                </ul>
                            </div>
                            <!-- END / WIDGET -->

                            <!-- WIDGET -->
                            <div class="widget widget_has_radio_checkbox">
                                <h3>Distance</h3>
                                <ul>
                                    <li>
                                        <label>
                                            <input type="checkbox">
                                            <i class="awe-icon awe-icon-check"></i>
                                            Near Airport
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type="checkbox">
                                            <i class="awe-icon awe-icon-check"></i>
                                            Near Shopping District
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type="checkbox">
                                            <i class="awe-icon awe-icon-check"></i>
                                            Near Attractions
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type="checkbox">
                                            <i class="awe-icon awe-icon-check"></i>
                                            Near Traffic station
                                        </label>
                                    </li>
                                </ul>
                            </div>
                            <!-- END / WIDGET -->

                            <!-- WIDGET -->
                            <div class="widget widget_has_radio_checkbox">
                                <h3>Service Include</h3>
                                <ul>
                                    <li>
                                        <label>
                                            <input type="checkbox">
                                            <i class="awe-icon awe-icon-check"></i>
                                            Room service
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type="checkbox">
                                            <i class="awe-icon awe-icon-check"></i>
                                            Laundry
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type="checkbox">
                                            <i class="awe-icon awe-icon-check"></i>
                                            Meal at room
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type="checkbox">
                                            <i class="awe-icon awe-icon-check"></i>
                                            Wifi &amp; internet
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type="checkbox">
                                            <i class="awe-icon awe-icon-check"></i>
                                            Parking lot
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type="checkbox">
                                            <i class="awe-icon awe-icon-check"></i>
                                            TV and appliances
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type="checkbox">
                                            <i class="awe-icon awe-icon-check"></i>
                                            Pool
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type="checkbox">
                                            <i class="awe-icon awe-icon-check"></i>
                                            Gym and Spa
                                        </label>
                                    </li>
                                </ul>
                            </div>
                            <!-- END / WIDGET -->

                            <!-- WIDGET -->
                            <div class="widget widget_product_tag_cloud">
                                <h3>Tags</h3>
                                <div class="tagcloud">
                                    <a href="#">Hotel</a>
                                    <a href="#">Motel</a>
                                    <a href="#">Hostel</a>
                                    <a href="#">Homestay</a>
                                </div>
                            </div>
                            <!-- END / WIDGET -->

                        </div>
                    </div>
                    
                    <div class="col-md-3 col-md-push-9">
                        
                    </div>
                </div>
            </div>
        </section>

    </div>
    <!-- END / PAGE WRAP -->







@stop