@extends('layout.main')
@section('page_title','Welcome to Tourhits')
@section('main-content')

<style>
    ::-webkit-scrollbar {
        display: none;
    }
    .tabs .ui-tabs-nav{
        overflow-y: hidden;
        overflow-x: scroll;
        display: -webkit-box;    
    }

    .tabs .ui-tabs-nav li.ui-tabs-active .ui-tabs-anchor {    
        color: #EC2424;
        border-bottom-color: #EC2424;
    }
    .container-country .index-tab-flag{
        margin-top: 40px;
    }

    .hothits-item{
        width: 100% !important;
    }
</style>

<!-- HERO -->
<section class="hero-section">
    <div id="slider-revolution">
        <ul>
            <li data-slotamount="7" data-masterspeed="500" data-title="Slide title 1">
                <img src="images/bg/indexbanner1.png" data-bgposition="left center" data-duration="14000" data-bgpositionend="right center" alt="">


                <!--                <div class="tp-caption sfb fadeout slider-caption slider-caption-2" data-x="center" data-y="100" data-speed="700" data-start="1500" data-easing="easeOutBack">
                                    แหล่งรวมทัวร์ทั่วโลก
                                </div>-->


                <!--                <div class="tp-caption sfb fadeout slider-caption slider-caption-1" data-x="center" data-y="280" data-speed="700" data-easing="easeOutBack"  data-start="2000">Top discount Paris Hotels</div>
                
                                <a href="#" class="tp-caption sfb fadeout awe-btn awe-btn-style3 awe-btn-slider" data-x="center" data-y="380" data-easing="easeOutBack" data-speed="700" data-start="2200">Book now</a>-->
            </li> 

            <li data-slotamount="7" data-masterspeed="500" data-title="Slide title 2">
                <img src="images/bg/indexbanner2.png" data-bgposition="left center" data-duration="14000" data-bgpositionend="right center" alt="">

                <!--                <div class="tp-caption  sft fadeout slider-caption-sub slider-caption-sub-2" data-x="center" data-y="220" data-speed="700" data-start="1500" data-easing="easeOutBack">
                                    Check out the top weekly destination
                                </div>
                
                                <div class="tp-caption sft fadeout slider-caption slider-caption-2" data-x="center" data-y="260" data-speed="700" data-easing="easeOutBack"  data-start="2000">
                                    Travel with us
                                </div>
                
                                <a href="#" class="tp-caption sft fadeout awe-btn awe-btn-style3 awe-btn-slider" data-x="center" data-y="370" data-easing="easeOutBack" data-speed="700" data-start="2200">Book now</a>-->
            </li>

            <!--            <li data-slotamount="7" data-masterspeed="500" data-title="Slide title 3">
                            <img src="images/img/2.jpg" data-bgposition="left center" data-duration="14000" data-bgpositionend="right center" alt="">
            
                                            <div class="tp-caption lfl fadeout slider-caption slider-caption-3" data-x="center" data-y="260" data-speed="700" data-easing="easeOutBack"  data-start="1500">
                                                Gofar
                                            </div>
                            
                                            <div href="#" class="tp-caption lfr fadeout slider-caption-sub slider-caption-sub-3" data-x="center" data-y="365" data-easing="easeOutBack" data-speed="700" data-start="2000">Take you to every corner of the world</div>
                        </li> -->

            <li data-slotamount="7" data-masterspeed="500" data-title="Slide title 2">
                <img src="images/bg/indexbanner3.png" data-bgposition="left center" data-duration="14000" data-bgpositionend="right center" alt="">
            </li>
            <li data-slotamount="7" data-masterspeed="500" data-title="Slide title 2">
                <img src="images/bg/indexbanner4.png" data-bgposition="left center" data-duration="14000" data-bgpositionend="right center" alt="">
            </li>

        </ul>
    </div>
</section>
<!-- END / HERO SECTION -->

<!-- SEARCH TABS -->
<section>
    <div class="container search-container">
        <div class="awe-search-tabs-2 tabs">
            <ul>
                <li>
                    <a href="#awe-search-tabs-1">
                        ค้นหาทัวร์
                    </a>
                </li>
            </ul>
            <div class="awe-search-tabs__content tabs__content">
                <div id="awe-search-tabs-1">
                    <form>
                        <div class="form-group">
                            <div class="form-elements">
                                <div class="form-item">
                                    <i class="awe-icon awe-icon-marker-1"></i>
                                    <input type="text" value="สถานที่ท่องเที่ยว , ประเทศ ที่ต้องการค้นหา">
                                </div>
                            </div>
                            <!--                            <div class="form-elements">
                                                            <div class="form-item">
                                                                <i class="awe-icon awe-icon-marker-1"></i>
                                                                <input type="text" value="Ankara, Turkey">
                                                            </div>
                                                        </div>-->
                        </div>
                        <div class="form-group">
                            <div class="form-elements">
                                <div class="form-item">
                                    <i class="awe-icon awe-icon-calendar"></i>
                                    <input type="text" class="awe-calendar" value="เริ่มต้น">
                                </div>
                            </div>
                            <div class="form-elements">
                                <div class="form-item">
                                    <i class="awe-icon awe-icon-calendar"></i>
                                    <input type="text" class="awe-calendar" value="สิ้นสุด">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-elements">
                                <div class="form-item">
                                    <select>
                                        <option val="0">จำนวนวัน</option>
                                        <option val="1">1</option>
                                        <option val="2">2</option>
                                        <option val="3">3</option>
                                        <option val="4">4</option>
                                        <option val="5">5</option>
                                        <option val="6">6</option>
                                        <option val="7">7</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <input type="submit" value="ค้นหา">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END / SEARCH TABS -->

<!-- MASONRY -->
<section class="masonry-section-demo">
    <div class="container-country">
        <div class="destination-grid-content">
            <div class="section-title" margin-top: 30px;>
                 <h1>Tourhits.co (ทัวร์ฮิต) ศูนย์รวมทัวร์คุณภาพทั่วโลก</h1>
            </div>
            <div class="row">
                <div class="col-md-10 col-md-offset-1 tabs-flagall">                                                  
                    <div class="product-tabs tabs">
                        <ul>
                            <li>
                                <a href="#tabs-1">ทัวร์ทั้งหมด</a>
                            </li>
                            <li>
                                <a href="#tabs-2">ทัวร์เอเชีย</a>
                            </li>
                            <li>
                                <a href="#tabs-3">ทัวร์ยุโรป</a>
                            </li>
                            <li>
                                <a href="#tabs-4">ทัวร์ทวีปอื่นๆ</a>
                            </li>
                        </ul>
                        <div class="all-flag-content">
                            <div id="tabs-1">
                                <div class="flag-tab1">                                        
                                    <div class=”flag-all”>
                                        <div class="row">
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('search-tour/ทัวร์ญี่ปุ่น?country=ทัวร์ญี่ปุ่น')}}">
                                                    <img data-src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/7/Japan.png" alt="ทัวร์ญี่ปุ่น" class=" lazyloaded" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/7/Japan.png">
                                                    <h5>ทัวร์ญี่ปุ่น</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('search-tour/ทัวร์จีน?country=ทัวร์จีน')}}">
                                                    <img data-src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/2/China.png" alt="ทัวร์จีน" class=" lazyloaded" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/2/China.png">
                                                    <h5>ทัวร์จีน</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('search-tour/ทัวร์ยุโรป?country=ทัวร์ยุโรป')}}">
                                                    <img data-src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/8/eu.png" alt="ทัวร์ยุโรป" class=" lazyloaded" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/8/eu.png">
                                                    <h5>ทัวร์ยุโรป</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('search-tour/ทัวร์ฮ่องกง?country=ทัวร์ฮ่องกง')}}">
                                                    <img data-src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/1/hk.png" alt="ทัวร์ฮ่องกง" class=" lazyloaded" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/1/hk.png">
                                                    <h5>ทัวร์ฮ่องกง</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('search-tour/ทัวร์พม่า?country=ทัวร์พม่า')}}">
                                                    <img data-src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/5/Myanmar.png" alt="ทัวร์พม่า" class=" lazyloaded" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/5/Myanmar.png">
                                                    <h5>ทัวร์พม่า</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('search-tour/ทัวร์ไต้หวัน?country=ทัวร์ไต้หวัน')}}">
                                                    <img data-src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/3/Taiwan.png" alt="ทัวร์ไต้หวัน" class=" lazyloaded" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/3/Taiwan.png">
                                                    <h5>ทัวร์ไต้หวัน</h5>
                                                </a>      
                                            </div>

                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('search-tour/ทัวร์มัลดีฟส์?country=ทัวร์มัลดีฟส์')}}">
                                                    <img data-src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/35/Maldives.png" alt="ทัวร์มัลดีฟส์" class=" lazyloaded" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/35/Maldives.png">
                                                    <h5>ทัวร์มัลดีฟส์</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('search-tour/ทัวร์เกาหลี?country=ทัวร์เกาหลี')}}">
                                                    <img data-src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/6/Korea_-South.png" alt="ทัวร์เกาหลี" class=" lazyloaded" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/6/Korea_-South.png">
                                                    <h5>ทัวร์เกาหลี</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('search-tour/ทัวร์เวียดนาม?country=ทัวร์เวียดนาม')}}">
                                                    <img data-src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/4/Vietnam.png" alt="ทัวร์เวียดนาม" class=" lazyloaded" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/4/Vietnam.png">
                                                    <h5>ทัวร์เวียดนาม</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('search-tour/ทัวร์สิงคโปร์?country=ทัวร์สิงคโปร์')}}">
                                                    <img data-src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/20/flag-8245b0bd45694a88fd7e5e7ed33d107f.png" alt="ทัวร์สิงคโปร์" class=" lazyloaded" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/20/flag-8245b0bd45694a88fd7e5e7ed33d107f.png">
                                                    <h5>ทัวร์สิงคโปร์</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('search-tour/ทัวร์รัสเซีย?country=ทัวร์รัสเซีย')}}">
                                                    <img data-src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/18/flag-aa38aeb9c762602cdebc9a5dbf308295.png" alt="ทัวร์รัสเซีย" class=" lazyloaded" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/18/flag-aa38aeb9c762602cdebc9a5dbf308295.png">
                                                    <h5>ทัวร์รัสเซีย</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('search-tour/ทัวร์ลาว?country=ทัวร์ลาว')}}">
                                                    <img data-src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/17/flag-c7f2a38f7d72e522fcead06f80a1398a.png" alt="ทัวร์ลาว" class=" lazyloaded" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/17/flag-c7f2a38f7d72e522fcead06f80a1398a.png">
                                                    <h5>ทัวร์ลาว</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('search-tour/ทัวร์อิตาลี?country=ทัวร์อิตาลี')}}">
                                                    <img data-src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/10/Italy.png" alt="ทัวร์อิตาลี" class=" lazyloaded" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/10/Italy.png">
                                                    <h5>ทัวร์อิตาลี</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('search-tour/ทัวร์ออสเตรีย?country=ทัวร์ออสเตรีย')}}">
                                                    <img data-src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/16/Austria.png" alt="ทัวร์ออสเตรีย" class=" lazyloaded" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/16/Austria.png">
                                                    <h5>ทัวร์ออสเตรีย</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('search-tour/ทัวร์ฝรั่งเศส?country=ทัวร์ฝรั่งเศส')}}">
                                                    <img data-src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/9/France.png" alt="ทัวร์ฝรั่งเศส" class=" lazyloaded" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/9/France.png">
                                                    <h5>ทัวร์ฝรั่งเศส</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('search-tour/ทัวร์สวิส?country=ทัวร์สวิส')}}">
                                                    <img data-src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/11/Switzerland.png" alt="ทัวร์สวิส" class=" lazyloaded" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/11/Switzerland.png">
                                                    <h5>ทัวร์สวิส</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('search-tour/ทัวร์เยอรมัน?country=ทัวร์เยอรมัน')}}">
                                                    <img data-src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/12/Germany.png" alt="ทัวร์เยอรมัน" class=" lazyloaded" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/12/Germany.png">
                                                    <h5>ทัวร์เยอรมัน</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('search-tour/ทัวร์มาเก๊า?country=ทัวร์มาเก๊า')}}">
                                                    <img data-src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/19/flag-78466a7246df011b11fce95a279c3194.png" alt="ทัวร์มาเก๊า" class=" lazyloaded" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/19/flag-78466a7246df011b11fce95a279c3194.png">
                                                    <h5>ทัวร์มาเก๊า</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('search-tour/ทัวร์ดูไบ?country=ทัวร์ดูไบ')}}">
                                                    <img data-src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/27/United-Arab-Emirates.png" alt="ทัวร์ดูไบ" class=" lazyloaded" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/27/United-Arab-Emirates.png">
                                                    <h5>ทัวร์ดูไบ</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('search-tour/ทัวร์ดูไบ?country=ทัวร์ออสเตรเลีย')}}">
                                                    <img data-src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/14/Australia.png" alt="ทัวร์ออสเตรเลีย" class=" lazyloaded" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/14/Australia.png">
                                                    <h5>ทัวร์ออสเตรเลีย</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('search-tour/ทัวร์ดูไบ?country=ทัวร์อียิปต์')}}">
                                                    <img data-src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/30/flag-ad52e00676e16b435f78782502cdd3d3.png" alt="ทัวร์อียิปต์" class=" lazyloaded" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/30/flag-ad52e00676e16b435f78782502cdd3d3.png">
                                                    <h5>ทัวร์อียิปต์</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('search-tour/ทัวร์ดูไบ?country=ทัวร์สเปน')}}">
                                                    <img data-src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/38/flag-00d787efb4481bfaa1fd9b08459695eb.png" alt="ทัวร์สเปน" class=" lazyloaded" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/38/flag-00d787efb4481bfaa1fd9b08459695eb.png">
                                                    <h5>ทัวร์สเปน</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('search-tour/ทัวร์ดูไบ?country=ทัวร์ฟินแลนด์')}}">
                                                    <img data-src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/42/flag-a5d8c288acfeab36b4391982b5be2a2a.png" alt="ทัวร์ฟินแลนด์" class=" lazyloaded" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/42/flag-a5d8c288acfeab36b4391982b5be2a2a.png">
                                                    <h5>ทัวร์ฟินแลนด์</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('search-tour/ทัวร์ดูไบ?country=ทัวร์อินเดีย')}}">
                                                    <img data-src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/33/flag.png" alt="ทัวร์อินเดีย " class=" lazyloaded" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/33/flag.png">
                                                    <h5>ทัวร์อินเดีย </h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('search-tour/ทัวร์ดูไบ?country=ทัวร์ตุรกี')}}">
                                                    <img data-src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/32/flag-62151bf6364345076361d9fd917f06bd.png" alt="ทัวร์ตุรกี" class=" lazyloaded" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/32/flag-62151bf6364345076361d9fd917f06bd.png">
                                                    <h5>ทัวร์ตุรกี</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('search-tour/ทัวร์ดูไบ?country=ทัวร์อินโดนีเซีย')}}">
                                                    <img data-src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/31/flag-543fdf03ab4bebee967a4fbea54641df.png" alt="ทัวร์อินโดนีเซีย" class=" lazyloaded" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/31/flag-543fdf03ab4bebee967a4fbea54641df.png">
                                                    <h5>ทัวร์อินโดนีเซีย</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('search-tour/ทัวร์ดูไบ?country=ทัวร์แอฟริกาใต้')}}">
                                                    <img data-src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/28/flag-b09ab3faf5517b872f403818f1bd72cd.png" alt="ทัวร์แอฟริกาใต้" class=" lazyloaded" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/28/flag-b09ab3faf5517b872f403818f1bd72cd.png">
                                                    <h5>ทัวร์แอฟริกาใต้</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('search-tour/ทัวร์ดูไบ?country=ทัวร์เนเธอร์แลนด์')}}">
                                                    <img data-src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/25/flag-7a4a3e84eea1ef90b9d9254380831b74.png" alt="ทัวร์เนเธอร์แลนด์" class=" lazyloaded" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/25/flag-7a4a3e84eea1ef90b9d9254380831b74.png">
                                                    <h5>ทัวร์เนเธอร์แลนด์</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('search-tour/ทัวร์ดูไบ?country=ทัวร์นอร์เวย์')}}">
                                                    <img data-src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/41/flag-1a716cb7921f3dcba366f1bcb2b74f10.png" alt="ทัวร์นอร์เวย์" class=" lazyloaded" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/41/flag-1a716cb7921f3dcba366f1bcb2b74f10.png">
                                                    <h5>ทัวร์นอร์เวย์</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('search-tour/ทัวร์ดูไบ?country=ทัวร์โปแลนด์')}}">
                                                    <img data-src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/43/flag-0a47aeab902bdcea516949aea687a75a.png" alt="ทัวร์โปแลนด์" class=" lazyloaded" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/43/flag-0a47aeab902bdcea516949aea687a75a.png">
                                                    <h5>ทัวร์โปแลนด์</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('search-tour/ทัวร์ดูไบ?country=ทัวร์เนปาล')}}">
                                                    <img data-src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/34/flag.png" alt="ทัวร์เนปาล" class=" lazyloaded" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/34/flag.png">
                                                    <h5>ทัวร์เนปาล</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('search-tour/ทัวร์ดูไบ?country=ทัวร์มาเลเซีย')}}">
                                                    <img data-src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/24/flag-88fd654746468f70e78ecd3620d7f849.png" alt="ทัวร์มาเลเซีย" class=" lazyloaded" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/24/flag-88fd654746468f70e78ecd3620d7f849.png">
                                                    <h5>ทัวร์มาเลเซีย</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('search-tour/ทัวร์ดูไบ?country=ทัวร์ฟินแลนด์')}}">
                                                    <img data-src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/15/New-Zealand.png" alt="ทัวร์นิวซีแลนด์" class=" lazyloaded" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/15/New-Zealand.png">
                                                    <h5>ทัวร์นิวซีแลนด์</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('search-tour/ทัวร์ดูไบ?country=ทัวร์บรูไน')}}">
                                                    <img data-src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/23/flag-86cdb83634a2d29b56ea20c9a66789fa.png" alt="ทัวร์บรูไน" class=" lazyloaded" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/23/flag-86cdb83634a2d29b56ea20c9a66789fa.png">
                                                    <h5>ทัวร์บรูไน</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('search-tour/ทัวร์ดูไบ?country=ทัวร์กัมพูชา')}}">
                                                    <img data-src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/21/flag.png" alt="ทัวร์กัมพูชา" class=" lazyloaded" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/21/flag.png">
                                                    <h5>ทัวร์กัมพูชา</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('search-tour/ทัวร์ดูไบ?country=ทัวร์อเมริกา')}}">
                                                    <img data-src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/13/United-States-of-America.png" alt="ทัวร์สหรัฐอเมริกา" class=" lazyloaded" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/13/United-States-of-America.png">
                                                    <h5>ทัวร์อเมริกา</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('search-tour/ทัวร์ดูไบ?country=ทัวร์โครเอเชีย')}}">
                                                    <img data-src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/39/flag-3baac14e2c7a3c84e4340a3e33fc3f04.png" alt="ทัวร์โครเอเชีย" class=" lazyloaded" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/39/flag-3baac14e2c7a3c84e4340a3e33fc3f04.png">
                                                    <h5>ทัวร์โครเอเชีย</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('search-tour/ทัวร์ดูไบ?country=ทัวร์อังกฤษ')}}">
                                                    <img data-src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/40/flag-c10677d43fafe551191f0370489a3ace.png" alt="ทัวร์อังกฤษ" class=" lazyloaded" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/40/flag-c10677d43fafe551191f0370489a3ace.png">
                                                    <h5>ทัวร์อังกฤษ</h5>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="tabs-2">
                                <div class="flag-tab2">
                                    <div class="row">
                                        <div class=”flag-all”>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('search-tour/ทัวร์ญี่ปุ่น?country=ทัวร์ญี่ปุ่น')}}">
                                                    <img data-src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/7/Japan.png" alt="ทัวร์ญี่ปุ่น" class=" lazyloaded" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/7/Japan.png">
                                                    <h5>ทัวร์ญี่ปุ่น</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('search-tour/ทัวร์จีน?country=ทัวร์จีน')}}">
                                                    <img data-src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/2/China.png" alt="ทัวร์จีน" class=" lazyloaded" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/2/China.png">
                                                    <h5>ทัวร์จีน</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('search-tour/ทัวร์ฮ่องกง?country=ทัวร์ฮ่องกง')}}">
                                                    <img data-src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/1/hk.png" alt="ทัวร์ฮ่องกง" class=" lazyloaded" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/1/hk.png">
                                                    <h5>ทัวร์ฮ่องกง</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('search-tour/ทัวร์พม่า?country=ทัวร์พม่า')}}">
                                                    <img data-src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/5/Myanmar.png" alt="ทัวร์พม่า" class=" lazyloaded" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/5/Myanmar.png">
                                                    <h5>ทัวร์พม่า</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('search-tour/ทัวร์ไต้หวัน?country=ทัวร์ไต้หวัน')}}">
                                                    <img data-src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/3/Taiwan.png" alt="ทัวร์ไต้หวัน" class=" lazyloaded" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/3/Taiwan.png">
                                                    <h5>ทัวร์ไต้หวัน</h5>
                                                </a>      
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('search-tour/ทัวร์เกาหลี?country=ทัวร์เกาหลี')}}">
                                                    <img data-src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/6/Korea_-South.png" alt="ทัวร์เกาหลี" class=" lazyloaded" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/6/Korea_-South.png">
                                                    <h5>ทัวร์เกาหลี</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('search-tour/ทัวร์เวียดนาม?country=ทัวร์เวียดนาม')}}">
                                                    <img data-src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/4/Vietnam.png" alt="ทัวร์เวียดนาม" class=" lazyloaded" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/4/Vietnam.png">
                                                    <h5>ทัวร์เวียดนาม</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('search-tour/ทัวร์สิงคโปร์?country=ทัวร์สิงคโปร์')}}">
                                                    <img data-src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/20/flag-8245b0bd45694a88fd7e5e7ed33d107f.png" alt="ทัวร์สิงคโปร์" class=" lazyloaded" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/20/flag-8245b0bd45694a88fd7e5e7ed33d107f.png">
                                                    <h5>ทัวร์สิงคโปร์</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('search-tour/ทัวร์ลาว?country=ทัวร์ลาว')}}">
                                                    <img data-src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/17/flag-c7f2a38f7d72e522fcead06f80a1398a.png" alt="ทัวร์ลาว" class=" lazyloaded" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/17/flag-c7f2a38f7d72e522fcead06f80a1398a.png">
                                                    <h5>ทัวร์ลาว</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('search-tour/ทัวร์มาเก๊า?country=ทัวร์มาเก๊า')}}">
                                                    <img data-src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/19/flag-78466a7246df011b11fce95a279c3194.png" alt="ทัวร์มาเก๊า" class=" lazyloaded" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/19/flag-78466a7246df011b11fce95a279c3194.png">
                                                    <h5>ทัวร์มาเก๊า</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('search-tour/ทัวร์มาเก๊า?country=ทัวร์อินเดีย')}}">
                                                    <img data-src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/33/flag.png" alt="ทัวร์อินเดีย " class=" lazyloaded" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/33/flag.png">
                                                    <h5>ทัวร์อินเดีย </h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('search-tour/ทัวร์มาเก๊า?country=ทัวร์อินโดนีเซีย')}}">
                                                    <img data-src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/31/flag-543fdf03ab4bebee967a4fbea54641df.png" alt="ทัวร์อินโดนีเซีย" class=" lazyloaded" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/31/flag-543fdf03ab4bebee967a4fbea54641df.png">
                                                    <h5>ทัวร์อินโดนีเซีย</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('search-tour/ทัวร์มาเก๊า?country=ทัวร์เนปาล')}}">
                                                    <img data-src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/34/flag.png" alt="ทัวร์เนปาล" class=" lazyloaded" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/34/flag.png">
                                                    <h5>ทัวร์เนปาล</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('search-tour/ทัวร์มาเก๊า?country=ทัวร์มาเลเซีย')}}">
                                                    <img data-src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/24/flag-88fd654746468f70e78ecd3620d7f849.png" alt="ทัวร์มาเลเซีย" class=" lazyloaded" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/24/flag-88fd654746468f70e78ecd3620d7f849.png">
                                                    <h5>ทัวร์มาเลเซีย</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('search-tour/ทัวร์มาเก๊า?country=ทัวร์บรูไน')}}">
                                                    <img data-src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/23/flag-86cdb83634a2d29b56ea20c9a66789fa.png" alt="ทัวร์บรูไน" class=" lazyloaded" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/23/flag-86cdb83634a2d29b56ea20c9a66789fa.png">
                                                    <h5>ทัวร์บรูไน</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('search-tour/ทัวร์มาเก๊า?country=ทัวร์กัมพูชา')}}">
                                                    <img data-src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/21/flag.png" alt="ทัวร์กัมพูชา" class=" lazyloaded" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/21/flag.png">
                                                    <h5>ทัวร์กัมพูชา</h5>
                                                </a>
                                            </div>                                                          
                                        </div> 
                                    </div>
                                </div>
                            </div>

                            <div id="tabs-3">
                                <div class="flag-tab3">
                                    <div class="row">
                                        <div class=”flag-all”>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('search-tour/ทัวร์ยุโรป?country=ทัวร์ยุโรป')}}">
                                                    <img data-src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/8/eu.png" alt="ทัวร์ยุโรป" class=" lazyloaded" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/8/eu.png">
                                                    <h5>ทัวร์ยุโรป</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('search-tour/ทัวร์รัสเซีย?country=ทัวร์รัสเซีย')}}">
                                                    <img data-src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/18/flag-aa38aeb9c762602cdebc9a5dbf308295.png" alt="ทัวร์รัสเซีย" class=" lazyloaded" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/18/flag-aa38aeb9c762602cdebc9a5dbf308295.png">
                                                    <h5>ทัวร์รัสเซีย</h5>
                                                </a>    
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('search-tour/ทัวร์อิตาลี?country=ทัวร์อิตาลี')}}">
                                                    <img data-src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/10/Italy.png" alt="ทัวร์อิตาลี" class=" lazyloaded" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/10/Italy.png">
                                                    <h5>ทัวร์อิตาลี</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('search-tour/ทัวร์ออสเตรีย?country=ทัวร์ออสเตรีย')}}">
                                                    <img data-src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/16/Austria.png" alt="ทัวร์ออสเตรีย" class=" lazyloaded" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/16/Austria.png">
                                                    <h5>ทัวร์ออสเตรีย</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('search-tour/ทัวร์ฝรั่งเศส?country=ทัวร์ฝรั่งเศส')}}">
                                                    <img data-src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/9/France.png" alt="ทัวร์ฝรั่งเศส" class=" lazyloaded" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/9/France.png">
                                                    <h5>ทัวร์ฝรั่งเศส</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('search-tour/ทัวร์สวิส?country=ทัวร์สวิส')}}">
                                                    <img data-src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/11/Switzerland.png" alt="ทัวร์สวิส" class=" lazyloaded" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/11/Switzerland.png">
                                                    <h5>ทัวร์สวิส</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('search-tour/ทัวร์เยอรมัน?country=ทัวร์เยอรมัน')}}">
                                                    <img data-src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/12/Germany.png" alt="ทัวร์เยอรมัน" class=" lazyloaded" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/12/Germany.png">
                                                    <h5>ทัวร์เยอรมัน</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('search-tour/ทัวร์เยอรมัน?country=ทัวร์สเปน')}}">
                                                    <img data-src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/38/flag-00d787efb4481bfaa1fd9b08459695eb.png" alt="ทัวร์สเปน" class=" lazyloaded" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/38/flag-00d787efb4481bfaa1fd9b08459695eb.png">
                                                    <h5>ทัวร์สเปน</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('search-tour/ทัวร์เยอรมัน?country=ทัวร์ฟินแลนด์')}}">
                                                    <img data-src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/42/flag-a5d8c288acfeab36b4391982b5be2a2a.png" alt="ทัวร์ฟินแลนด์" class=" lazyloaded" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/42/flag-a5d8c288acfeab36b4391982b5be2a2a.png">
                                                    <h5>ทัวร์ฟินแลนด์</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('search-tour/ทัวร์เยอรมัน?country=ทัวร์เนเธอร์แลนด์')}}">
                                                    <img data-src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/25/flag-7a4a3e84eea1ef90b9d9254380831b74.png" alt="ทัวร์เนเธอร์แลนด์" class=" lazyloaded" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/25/flag-7a4a3e84eea1ef90b9d9254380831b74.png">
                                                    <h5>ทัวร์เนเธอร์แลนด์</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('search-tour/ทัวร์เยอรมัน?country=ทัวร์โปแลนด์')}}">
                                                    <img data-src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/43/flag-0a47aeab902bdcea516949aea687a75a.png" alt="ทัวร์โปแลนด์" class=" lazyloaded" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/43/flag-0a47aeab902bdcea516949aea687a75a.png">
                                                    <h5>ทัวร์โปแลนด์</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('search-tour/ทัวร์เยอรมัน?country=ทัวร์โครเอเชีย')}}">
                                                    <img data-src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/39/flag-3baac14e2c7a3c84e4340a3e33fc3f04.png" alt="ทัวร์โครเอเชีย" class=" lazyloaded" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/39/flag-3baac14e2c7a3c84e4340a3e33fc3f04.png">
                                                    <h5>ทัวร์โครเอเชีย</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('search-tour/ทัวร์เยอรมัน?country=ทัวร์อังกฤษ')}}">
                                                    <img data-src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/40/flag-c10677d43fafe551191f0370489a3ace.png" alt="ทัวร์อังกฤษ" class=" lazyloaded" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/40/flag-c10677d43fafe551191f0370489a3ace.png">
                                                    <h5>ทัวร์อังกฤษ</h5>
                                                </a>
                                            </div>
                                        </div> 
                                    </div>
                                </div>    
                            </div> 

                            <div id="tabs-4">
                                <div class="flag-tab4">
                                    <div class="row">
                                        <div class=”flag-all”>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('search-tour/ทัวร์มัลดีฟส์?country=ทัวร์มัลดีฟส์')}}">
                                                    <img data-src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/35/Maldives.png" alt="ทัวร์มัลดีฟส์" class=" lazyloaded" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/35/Maldives.png">
                                                    <h5>ทัวร์มัลดีฟส์</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('search-tour/ทัวร์ดูไบ?country=ทัวร์ดูไบ')}}">
                                                    <img data-src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/27/United-Arab-Emirates.png" alt="ทัวร์ดูไบ" class=" lazyloaded" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/27/United-Arab-Emirates.png">
                                                    <h5>ทัวร์ดูไบ</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('search-tour/ทัวร์ดูไบ?country=ทัวร์ออสเตรเลีย')}}">
                                                    <img data-src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/14/Australia.png" alt="ทัวร์ออสเตรเลีย" class=" lazyloaded" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/14/Australia.png">
                                                    <h5>ทัวร์ออสเตรเลีย</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('search-tour/ทัวร์ดูไบ?country=ทัวร์อียิปต์')}}">
                                                    <img data-src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/30/flag-ad52e00676e16b435f78782502cdd3d3.png" alt="ทัวร์อียิปต์" class=" lazyloaded" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/30/flag-ad52e00676e16b435f78782502cdd3d3.png">
                                                    <h5>ทัวร์อียิปต์</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('search-tour/ทัวร์ดูไบ?country=ทัวร์ตุรกี')}}">
                                                    <img data-src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/32/flag-62151bf6364345076361d9fd917f06bd.png" alt="ทัวร์ตุรกี" class=" lazyloaded" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/32/flag-62151bf6364345076361d9fd917f06bd.png">
                                                    <h5>ทัวร์ตุรกี</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('search-tour/ทัวร์ดูไบ?country=ทัวร์แอฟริกาใต้')}}">
                                                    <img data-src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/28/flag-b09ab3faf5517b872f403818f1bd72cd.png" alt="ทัวร์แอฟริกาใต้" class=" lazyloaded" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/28/flag-b09ab3faf5517b872f403818f1bd72cd.png">
                                                    <h5>ทัวร์แอฟริกาใต้</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('search-tour/ทัวร์ดูไบ?country=ทัวร์นอร์เวย์')}}">
                                                    <img data-src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/41/flag-1a716cb7921f3dcba366f1bcb2b74f10.png" alt="ทัวร์นอร์เวย์" class=" lazyloaded" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/41/flag-1a716cb7921f3dcba366f1bcb2b74f10.png">
                                                    <h5>ทัวร์นอร์เวย์</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('search-tour/ทัวร์ดูไบ?country=ทัวร์นิวซีแลนด์')}}">
                                                    <img data-src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/15/New-Zealand.png" alt="ทัวร์นิวซีแลนด์" class=" lazyloaded" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/15/New-Zealand.png">
                                                    <h5>ทัวร์นิวซีแลนด์</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('search-tour/ทัวร์ดูไบ?country=ทัวร์อเมริกา')}}">
                                                    <img data-src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/13/United-States-of-America.png" alt="ทัวร์สหรัฐอเมริกา" class=" lazyloaded" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/13/United-States-of-America.png">
                                                    <h5>ทัวร์อเมริกา</h5>
                                                </a>
                                            </div>
                                        </div> 
                                    </div>
                                </div>

                            </div>                               
                        </div>                                                         
                    </div>
                </div>    
            </div>

        </div>
    </div>
</div>    
</section>
<!-- END / MASONRY -->

<!-- แพ๊คยอดนิยม -->
<section class="package-hit-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 package-hit-title">
                <div class="section-title">
                    <h1><i class="fas fa-fire" style='color: #EC2424;'></i>&nbsp;แพ็คเกจยอดนิยม</h1>
                    <div class="line-gradient"></div>
                </div>
                <div class='section-descripion hidden-xs'>
                    ทางบริษัททัวร์ฮิต ได้คัดเลือกแพ็คเกจทัวร์ต่างประเทศทั้งหมดที่มี เฉพาะส่วนที่จัดรายการโปรโมชั่นต้อนรับเทศกาลต่างๆในแต่ละเดือนมาไว้ ณ ที่นี้ ซึ่งในแต่ละแพ็คเกจจะราคาถูกต่างกัน โดยแต่ละแพ็คเกจหรือแต่ละช่วงเวลาจะมีที่นั่งจำกัด เพียงไม่กี่ที่เท่านั้น ท่านสามารถเลือกซื้อ หรือ เลือกชมได้จากหน้านี้ หรือสามารถสอบถามเพิ่มเติมได้จากเจ้าหน้าที่ เพื่อขอคำแนะนำ ทางเรายินดีให้บริการครับ
                </div>
            </div>
        </div>
        <!--        หน้าจอเวอชั่น mobile/pc-->        
        <div id="card_area_hit" class="card-xs js-flickity" data-flickity='{ "freeScroll": true, "wrapAround": true, "autoPlay": true }'>
            <div class="thumbnail card--content">
                <a href="{{ url('tour-detail') }}">
                    <div class="tour-cover lazyloaded" data-bg="../images/card/tour1.jpg" style="background-image: url(https://images.unsplash.com/photo-1509715367195-b9a491f63d58?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=748af9c34a5ed35a9c2c7ec49fea677c&auto=format&fit=crop&w=500&q=60);">
                        <div class="tour-footer">
                            <div class="pull-left">
                                <span class="flag">
                                    <img width="60%" alt="รูปธงประเทศ" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/2/China.png">
                                </span>
                            </div>
                        </div>
                        <div class="tour-header">
                            <div class="pull-right">
                                <span class="days">
                                    3 วัน 2 คืน
                                </span>
                            </div>
                            <span class="clear"></span>
                        </div>
                        <div class="tour-bottom-right">
                            <div>
                                <span class="tag">
                                    TH000001
                                </span>
                            </div>
                            <span class="clear"></span>                               
                        </div>
                    </div>
                </a>
                <div class="caption">
                    <div class="tabbable">
                        <div class="tab-content">
                            <div id="tab1" class="tab-pane active">
                                <div class="card-detail">
                                    <div class='country-name'>
                                        ทัวร์ญี่ปุ่น
                                    </div>
                                    <div class="city">
                                        โตเกียว ฮอกไกโด โอซาก้า
                                    </div>
                                    <div class="hilight">
                                        <i class="far fa-flag"></i>
                                        <div class="detail">
                                            ล่องเรือมังกร | ยอดเขาบานาฮิลล์ | Ba Na Hills | หมู่บ้านแกะสลักหินอ่อน | วัดหลินอึ้ง | สวนดอกไม้เมืองหนาว | กระเช้าไฟฟ้าเคเบิลคาร์ | รถรางเวียดนาม | 
                                        </div>    
                                    </div>                                                    
                                </div>

                                <hr>
                                <div class="card-time"><i class="fas fa-calendar-alt"></i>&nbsp;ช่วงเวลา มิ.ย. - ส.ค.</div>
                                <hr>
                                <div class="bar-bottom-card">
                                    <div class="card-airline"><img alt="การบินไทย" src="../images/airline/thai_airway.png" title="Air Asia X"></div>                                         
                                    <div class="card-price-dis"><strike>฿74,900</strike></div>
                                    <div class="card-price">฿49,900</div>
                                </div>
                            </div>                                          
                            <div id="tab2" class="tab-pane">ตารางช่วงเวลา content</div>
                        </div>
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab1" data-toggle="tab" class="active">ข้อมูลแพ็คเกจ</a></li>                                           
                            <li><a href="#tab2" data-toggle="tab">ช่วงเวลา</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="thumbnail card--content">
                <a href="{{ url('tour-detail') }}">
                    <div class="tour-cover lazyloaded" data-bg="../images/card/tour1.jpg" style="background-image: url(https://images.unsplash.com/photo-1509715367195-b9a491f63d58?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=748af9c34a5ed35a9c2c7ec49fea677c&auto=format&fit=crop&w=500&q=60);">
                        <div class="tour-footer">
                            <div class="pull-left">
                                <span class="flag">
                                    <img width="60%" alt="รูปธงประเทศ" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/2/China.png">
                                </span>
                            </div>
                        </div>
                        <div class="tour-header">
                            <div class="pull-right">
                                <span class="days">
                                    3 วัน 2 คืน
                                </span>
                            </div>
                            <span class="clear"></span>
                        </div>
                        <div class="tour-bottom-right">
                            <div>
                                <span class="tag">
                                    TH000001
                                </span>
                            </div>
                            <span class="clear"></span>                               
                        </div>
                    </div>
                </a>
                <div class="caption">
                    <div class="tabbable">
                        <div class="tab-content">
                            <div id="tab1" class="tab-pane active">
                                <div class="card-detail">
                                    <div class='country-name'>
                                        ทัวร์ญี่ปุ่น
                                    </div>
                                    <div class="city">
                                        โตเกียว ฮอกไกโด โอซาก้า
                                    </div>
                                    <div class="hilight">
                                        <i class="far fa-flag"></i>
                                        <div class="detail">
                                            ล่องเรือมังกร | ยอดเขาบานาฮิลล์ | Ba Na Hills | หมู่บ้านแกะสลักหินอ่อน | วัดหลินอึ้ง | สวนดอกไม้เมืองหนาว | กระเช้าไฟฟ้าเคเบิลคาร์ | รถรางเวียดนาม | 
                                        </div>    
                                    </div>                                                    
                                </div>

                                <hr>
                                <div class="card-time"><i class="fas fa-calendar-alt"></i>&nbsp;ช่วงเวลา มิ.ย. - ส.ค.</div>
                                <hr>
                                <div class="bar-bottom-card">
                                    <div class="card-airline"><img alt="การบินไทย" src="../images/airline/thai_airway.png" title="Air Asia X"></div>                                         
                                    <div class="card-price-dis"><strike></strike></div>
                                    <div class="card-price">฿49,900</div>
                                </div>
                            </div>                                          
                            <div id="tab2" class="tab-pane">ตารางช่วงเวลา content</div>
                        </div>
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab1" data-toggle="tab" class="active">ข้อมูลแพ็คเกจ</a></li>                                           
                            <li><a href="#tab2" data-toggle="tab">ช่วงเวลา</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="thumbnail card--content">
                <a href="{{ url('tour-detail') }}">
                    <div class="tour-cover lazyloaded" data-bg="../images/card/tour1.jpg" style="background-image: url(https://images.unsplash.com/photo-1509715367195-b9a491f63d58?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=748af9c34a5ed35a9c2c7ec49fea677c&auto=format&fit=crop&w=500&q=60);">
                        <div class="tour-footer">
                            <div class="pull-left">
                                <span class="flag">
                                    <img width="60%" alt="รูปธงประเทศ" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/2/China.png">
                                </span>
                            </div>
                        </div>
                        <div class="tour-header">
                            <div class="pull-right">
                                <span class="days">
                                    3 วัน 2 คืน
                                </span>
                            </div>
                            <span class="clear"></span>
                        </div>
                        <div class="tour-bottom-right">
                            <div>
                                <span class="tag">
                                    TH000001
                                </span>
                            </div>
                            <span class="clear"></span>                               
                        </div>
                    </div>
                </a>
                <div class="caption">
                    <div class="tabbable">
                        <div class="tab-content">
                            <div id="tab1" class="tab-pane active">
                                <div class="card-detail">
                                    <div class='country-name'>
                                        ทัวร์ญี่ปุ่น
                                    </div>
                                    <div class="city">
                                        โตเกียว ฮอกไกโด โอซาก้า
                                    </div>
                                    <div class="hilight">
                                        <i class="far fa-flag"></i>
                                        <div class="detail">
                                            ล่องเรือมังกร | ยอดเขาบานาฮิลล์ | Ba Na Hills | หมู่บ้านแกะสลักหินอ่อน | วัดหลินอึ้ง | สวนดอกไม้เมืองหนาว | กระเช้าไฟฟ้าเคเบิลคาร์ | รถรางเวียดนาม | 
                                        </div>    
                                    </div>                                                    
                                </div>

                                <hr>
                                <div class="card-time"><i class="fas fa-calendar-alt"></i>&nbsp;ช่วงเวลา มิ.ย. - ส.ค.</div>
                                <hr>
                                <div class="bar-bottom-card">
                                    <div class="card-airline"><img alt="การบินไทย" src="../images/airline/thai_airway.png" title="Air Asia X"></div>                                         
                                    <div class="card-price-dis"><strike></strike></div>
                                    <div class="card-price">฿49,900</div>
                                </div>
                            </div>                                          
                            <div id="tab2" class="tab-pane">ตารางช่วงเวลา content</div>
                        </div>
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab1" data-toggle="tab" class="active">ข้อมูลแพ็คเกจ</a></li>                                           
                            <li><a href="#tab2" data-toggle="tab">ช่วงเวลา</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="thumbnail card--content">
                <a href="{{ url('tour-detail') }}">
                    <div class="tour-cover lazyloaded" data-bg="../images/card/tour1.jpg" style="background-image: url(https://images.unsplash.com/photo-1509715367195-b9a491f63d58?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=748af9c34a5ed35a9c2c7ec49fea677c&auto=format&fit=crop&w=500&q=60);">
                        <div class="tour-footer">
                            <div class="pull-left">
                                <span class="flag">
                                    <img width="60%" alt="รูปธงประเทศ" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/2/China.png">
                                </span>
                            </div>
                        </div>
                        <div class="tour-header">
                            <div class="pull-right">
                                <span class="days">
                                    3 วัน 2 คืน
                                </span>
                            </div>
                            <span class="clear"></span>
                        </div>
                        <div class="tour-bottom-right">
                            <div>
                                <span class="tag">
                                    TH000001
                                </span>
                            </div>
                            <span class="clear"></span>                               
                        </div>
                    </div>
                </a>
                <div class="caption">
                    <div class="tabbable">
                        <div class="tab-content">
                            <div id="tab1" class="tab-pane active">
                                <div class="card-detail">
                                    <div class='country-name'>
                                        ทัวร์ญี่ปุ่น
                                    </div>
                                    <div class="city">
                                        โตเกียว ฮอกไกโด โอซาก้า
                                    </div>
                                    <div class="hilight">
                                        <i class="far fa-flag"></i>
                                        <div class="detail">
                                            ล่องเรือมังกร | ยอดเขาบานาฮิลล์ | Ba Na Hills | หมู่บ้านแกะสลักหินอ่อน | วัดหลินอึ้ง | สวนดอกไม้เมืองหนาว | กระเช้าไฟฟ้าเคเบิลคาร์ | รถรางเวียดนาม | 
                                        </div>    
                                    </div>                                                    
                                </div>

                                <hr>
                                <div class="card-time"><i class="fas fa-calendar-alt"></i>&nbsp;ช่วงเวลา มิ.ย. - ส.ค.</div>
                                <hr>
                                <div class="bar-bottom-card">
                                    <div class="card-airline"><img alt="การบินไทย" src="../images/airline/thai_airway.png" title="Air Asia X"></div>                                         
                                    <div class="card-price-dis"><strike></strike></div>
                                    <div class="card-price">฿49,900</div>
                                </div>
                            </div>                                          
                            <div id="tab2" class="tab-pane">ตารางช่วงเวลา content</div>
                        </div>
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab1" data-toggle="tab" class="active">ข้อมูลแพ็คเกจ</a></li>                                           
                            <li><a href="#tab2" data-toggle="tab">ช่วงเวลา</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="thumbnail card--content">
                <a href="{{ url('tour-detail') }}">
                    <div class="tour-cover lazyloaded" data-bg="../images/card/tour1.jpg" style="background-image: url(https://images.unsplash.com/photo-1509715367195-b9a491f63d58?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=748af9c34a5ed35a9c2c7ec49fea677c&auto=format&fit=crop&w=500&q=60);">
                        <div class="tour-footer">
                            <div class="pull-left">
                                <span class="flag">
                                    <img width="60%" alt="รูปธงประเทศ" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/2/China.png">
                                </span>
                            </div>
                        </div>
                        <div class="tour-header">
                            <div class="pull-right">
                                <span class="days">
                                    3 วัน 2 คืน
                                </span>
                            </div>
                            <span class="clear"></span>
                        </div>
                        <div class="tour-bottom-right">
                            <div>
                                <span class="tag">
                                    TH000001
                                </span>
                            </div>
                            <span class="clear"></span>                               
                        </div>
                    </div>
                </a>
                <div class="caption">
                    <div class="tabbable">
                        <div class="tab-content">
                            <div id="tab1" class="tab-pane active">
                                <div class="card-detail">
                                    <div class='country-name'>
                                        ทัวร์ญี่ปุ่น
                                    </div>
                                    <div class="city">
                                        โตเกียว ฮอกไกโด โอซาก้า
                                    </div>
                                    <div class="hilight">
                                        <i class="far fa-flag"></i>
                                        <div class="detail">
                                            ล่องเรือมังกร | ยอดเขาบานาฮิลล์ | Ba Na Hills | หมู่บ้านแกะสลักหินอ่อน | วัดหลินอึ้ง | สวนดอกไม้เมืองหนาว | กระเช้าไฟฟ้าเคเบิลคาร์ | รถรางเวียดนาม | 
                                        </div>    
                                    </div>                                                    
                                </div>

                                <hr>
                                <div class="card-time"><i class="fas fa-calendar-alt"></i>&nbsp;ช่วงเวลา มิ.ย. - ส.ค.</div>
                                <hr>
                                <div class="bar-bottom-card">
                                    <div class="card-airline"><img alt="การบินไทย" src="../images/airline/thai_airway.png" title="Air Asia X"></div>                                         
                                    <div class="card-price-dis"><strike></strike></div>
                                    <div class="card-price">฿49,900</div>
                                </div>
                            </div>                                          
                            <div id="tab2" class="tab-pane">ตารางช่วงเวลา content</div>
                        </div>
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab1" data-toggle="tab" class="active">ข้อมูลแพ็คเกจ</a></li>                                           
                            <li><a href="#tab2" data-toggle="tab">ช่วงเวลา</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <a href="#" class="btn btn-nextpage">แพ็คเกจทั้งหมด&nbsp;<i class="fas fa-arrow-circle-right"></i></a> 
    </div>
</section>

<!-- คัดสรรมาให้ -->
<section class="package-hit-section">
    <div class="container">
        <div class="package-hit-title">
            <div class="section-title">
                <h1><i class="fas fa-align-justify" style='color: #EC2424;'></i>&nbsp;เราคัดสรรมาให้จากกว่า 200 ทัวร์</h1>
                <div class="line-gradient"></div>
            </div>
            <div class='section-descripion hidden-xs'>
                ทางบริษัททัวร์ฮิต ได้คัดเลือกแพ็คเกจทัวร์ต่างประเทศทั้งหมดที่มี เฉพาะส่วนที่จัดรายการโปรโมชั่นต้อนรับเทศกาลต่างๆในแต่ละเดือนมาไว้ ณ ที่นี้ ซึ่งในแต่ละแพ็คเกจจะราคาถูกต่างกัน โดยแต่ละแพ็คเกจหรือแต่ละช่วงเวลาจะมีที่นั่งจำกัด เพียงไม่กี่ที่เท่านั้น ท่านสามารถเลือกซื้อ หรือ เลือกชมได้จากหน้านี้ หรือสามารถสอบถามเพิ่มเติมได้จากเจ้าหน้าที่ เพื่อขอคำแนะนำ ทางเรายินดีให้บริการครับ
            </div>
            <div class="row">
                @foreach($categoryList as $category)
                <div class="col-sm-4 col-xs-6 col-md-3">
                    <div class="select-item">
                        <a href="{{url('tourCategory?tour_cate='. $category->category_id)}}">
                            <div class="select-img lazyloaded">
                                <div class="center-crop"> 
                                    <img src="images/category/{{ $category->category_img }}" alt="">
                                </div> 
                            </div> 
                            <div class="hothits-name-box">
                                <div class="text ">แนะนำ</div>
                            </div>
                        </a>
                    </div>   
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<!-- แพ๊คลดราคา -->
<section class="package-hit-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 package-hit-title">
                <div class="section-title">
                    <h1><i class="fas fa-fire" style='color: #EC2424;'></i>&nbsp;แพ็คเกจลดราคา</h1>
                    <div class="line-gradient"></div>
                </div>
                <div class='section-descripion hidden-xs'>
                    ทางบริษัททัวร์ฮิต ได้คัดเลือกแพ็คเกจทัวร์ต่างประเทศทั้งหมดที่มี เฉพาะส่วนที่จัดรายการโปรโมชั่นต้อนรับเทศกาลต่างๆในแต่ละเดือนมาไว้ ณ ที่นี้ ซึ่งในแต่ละแพ็คเกจจะราคาถูกต่างกัน โดยแต่ละแพ็คเกจหรือแต่ละช่วงเวลาจะมีที่นั่งจำกัด เพียงไม่กี่ที่เท่านั้น ท่านสามารถเลือกซื้อ หรือ เลือกชมได้จากหน้านี้ หรือสามารถสอบถามเพิ่มเติมได้จากเจ้าหน้าที่ เพื่อขอคำแนะนำ ทางเรายินดีให้บริการครับ
                </div>
            </div>
        </div>
        <!--        หน้าจอเวอชั่น mobile/pc-->
        <div id="card_area_sale" class="card-xs js-flickity" data-flickity='{ "freeScroll": true, "wrapAround": true, "autoPlay": true }'>
            <div class="thumbnail card--content">
                <a href="{{ url('tour-detail') }}">
                    <div class="tour-cover lazyloaded" data-bg="../images/card/tour1.jpg" style="background-image: url(https://images.unsplash.com/photo-1509715367195-b9a491f63d58?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=748af9c34a5ed35a9c2c7ec49fea677c&auto=format&fit=crop&w=500&q=60);">
                        <div class="tour-footer">
                            <div class="pull-left">
                                <span class="flag">
                                    <img width="60%" alt="รูปธงประเทศ" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/2/China.png">
                                </span>
                            </div>
                        </div>
                        <div class="tour-header">
                            <div class="pull-right">
                                <span class="days">
                                    3 วัน 2 คืน
                                </span>
                            </div>
                            <span class="clear"></span>
                        </div>
                        <div class="tour-bottom-right">
                            <div>
                                <span class="tag">
                                    TH000001
                                </span>
                            </div>
                            <span class="clear"></span>                               
                        </div>
                    </div>
                </a>
                <div class="caption">
                    <div class="tabbable">
                        <div class="tab-content">
                            <div id="tab1" class="tab-pane active">
                                <div class="card-detail">
                                    <div class='country-name'>
                                        ทัวร์ญี่ปุ่น
                                    </div>
                                    <div class="city">
                                        โตเกียว ฮอกไกโด โอซาก้า
                                    </div>
                                    <div class="hilight">
                                        <i class="far fa-flag"></i>
                                        <div class="detail">
                                            ล่องเรือมังกร | ยอดเขาบานาฮิลล์ | Ba Na Hills | หมู่บ้านแกะสลักหินอ่อน | วัดหลินอึ้ง | สวนดอกไม้เมืองหนาว | กระเช้าไฟฟ้าเคเบิลคาร์ | รถรางเวียดนาม | 
                                        </div>    
                                    </div>                                                    
                                </div>

                                <hr>
                                <div class="card-time"><i class="fas fa-calendar-alt"></i>&nbsp;ช่วงเวลา มิ.ย. - ส.ค.</div>
                                <hr>
                                <div class="bar-bottom-card">
                                    <div class="card-airline"><img alt="การบินไทย" src="../images/airline/thai_airway.png" title="Air Asia X"></div>                                         
                                    <div class="card-price-dis"><strike>฿74,900</strike></div>
                                    <div class="card-price">฿49,900</div>
                                </div>
                            </div>                                          
                            <div id="tab2" class="tab-pane">ตารางช่วงเวลา content</div>
                        </div>
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab1" data-toggle="tab" class="active">ข้อมูลแพ็คเกจ</a></li>                                           
                            <li><a href="#tab2" data-toggle="tab">ช่วงเวลา</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="thumbnail card--content">
                <a href="{{ url('tour-detail') }}">
                    <div class="tour-cover lazyloaded" data-bg="../images/card/tour1.jpg" style="background-image: url(https://images.unsplash.com/photo-1509715367195-b9a491f63d58?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=748af9c34a5ed35a9c2c7ec49fea677c&auto=format&fit=crop&w=500&q=60);">
                        <div class="tour-footer">
                            <div class="pull-left">
                                <span class="flag">
                                    <img width="60%" alt="รูปธงประเทศ" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/2/China.png">
                                </span>
                            </div>
                        </div>
                        <div class="tour-header">
                            <div class="pull-right">
                                <span class="days">
                                    3 วัน 2 คืน
                                </span>
                            </div>
                            <span class="clear"></span>
                        </div>
                        <div class="tour-bottom-right">
                            <div>
                                <span class="tag">
                                    TH000001
                                </span>
                            </div>
                            <span class="clear"></span>                               
                        </div>
                    </div>
                </a>
                <div class="caption">
                    <div class="tabbable">
                        <div class="tab-content">
                            <div id="tab1" class="tab-pane active">
                                <div class="card-detail">
                                    <div class='country-name'>
                                        ทัวร์ญี่ปุ่น
                                    </div>
                                    <div class="city">
                                        โตเกียว ฮอกไกโด โอซาก้า
                                    </div>
                                    <div class="hilight">
                                        <i class="far fa-flag"></i>
                                        <div class="detail">
                                            ล่องเรือมังกร | ยอดเขาบานาฮิลล์ | Ba Na Hills | หมู่บ้านแกะสลักหินอ่อน | วัดหลินอึ้ง | สวนดอกไม้เมืองหนาว | กระเช้าไฟฟ้าเคเบิลคาร์ | รถรางเวียดนาม | 
                                        </div>    
                                    </div>                                                    
                                </div>

                                <hr>
                                <div class="card-time"><i class="fas fa-calendar-alt"></i>&nbsp;ช่วงเวลา มิ.ย. - ส.ค.</div>
                                <hr>
                                <div class="bar-bottom-card">
                                    <div class="card-airline"><img alt="การบินไทย" src="../images/airline/thai_airway.png" title="Air Asia X"></div>                                         
                                    <div class="card-price-dis"><strike>฿74,900</strike></div>
                                    <div class="card-price">฿49,900</div>
                                </div>
                            </div>                                          
                            <div id="tab2" class="tab-pane">ตารางช่วงเวลา content</div>
                        </div>
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab1" data-toggle="tab" class="active">ข้อมูลแพ็คเกจ</a></li>                                           
                            <li><a href="#tab2" data-toggle="tab">ช่วงเวลา</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="thumbnail card--content">
                <a href="{{ url('tour-detail') }}">
                    <div class="tour-cover lazyloaded" data-bg="../images/card/tour1.jpg" style="background-image: url(https://images.unsplash.com/photo-1509715367195-b9a491f63d58?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=748af9c34a5ed35a9c2c7ec49fea677c&auto=format&fit=crop&w=500&q=60);">
                        <div class="tour-footer">
                            <div class="pull-left">
                                <span class="flag">
                                    <img width="60%" alt="รูปธงประเทศ" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/2/China.png">
                                </span>
                            </div>
                        </div>
                        <div class="tour-header">
                            <div class="pull-right">
                                <span class="days">
                                    3 วัน 2 คืน
                                </span>
                            </div>
                            <span class="clear"></span>
                        </div>
                        <div class="tour-bottom-right">
                            <div>
                                <span class="tag">
                                    TH000001
                                </span>
                            </div>
                            <span class="clear"></span>                               
                        </div>
                    </div>
                </a>
                <div class="caption">
                    <div class="tabbable">
                        <div class="tab-content">
                            <div id="tab1" class="tab-pane active">
                                <div class="card-detail">
                                    <div class='country-name'>
                                        ทัวร์ญี่ปุ่น
                                    </div>
                                    <div class="city">
                                        โตเกียว ฮอกไกโด โอซาก้า
                                    </div>
                                    <div class="hilight">
                                        <i class="far fa-flag"></i>
                                        <div class="detail">
                                            ล่องเรือมังกร | ยอดเขาบานาฮิลล์ | Ba Na Hills | หมู่บ้านแกะสลักหินอ่อน | วัดหลินอึ้ง | สวนดอกไม้เมืองหนาว | กระเช้าไฟฟ้าเคเบิลคาร์ | รถรางเวียดนาม | 
                                        </div>    
                                    </div>                                                    
                                </div>

                                <hr>
                                <div class="card-time"><i class="fas fa-calendar-alt"></i>&nbsp;ช่วงเวลา มิ.ย. - ส.ค.</div>
                                <hr>
                                <div class="bar-bottom-card">
                                    <div class="card-airline"><img alt="การบินไทย" src="../images/airline/thai_airway.png" title="Air Asia X"></div>                                         
                                    <div class="card-price-dis"><strike>฿74,900</strike></div>
                                    <div class="card-price">฿49,900</div>
                                </div>
                            </div>                                          
                            <div id="tab2" class="tab-pane">ตารางช่วงเวลา content</div>
                        </div>
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab1" data-toggle="tab" class="active">ข้อมูลแพ็คเกจ</a></li>                                           
                            <li><a href="#tab2" data-toggle="tab">ช่วงเวลา</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="thumbnail card--content">
                <a href="{{ url('tour-detail') }}">
                    <div class="tour-cover lazyloaded" data-bg="../images/card/tour1.jpg" style="background-image: url(https://images.unsplash.com/photo-1509715367195-b9a491f63d58?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=748af9c34a5ed35a9c2c7ec49fea677c&auto=format&fit=crop&w=500&q=60);">
                        <div class="tour-footer">
                            <div class="pull-left">
                                <span class="flag">
                                    <img width="60%" alt="รูปธงประเทศ" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/2/China.png">
                                </span>
                            </div>
                        </div>
                        <div class="tour-header">
                            <div class="pull-right">
                                <span class="days">
                                    3 วัน 2 คืน
                                </span>
                            </div>
                            <span class="clear"></span>
                        </div>
                        <div class="tour-bottom-right">
                            <div>
                                <span class="tag">
                                    TH000001
                                </span>
                            </div>
                            <span class="clear"></span>                               
                        </div>
                    </div>
                </a>
                <div class="caption">
                    <div class="tabbable">
                        <div class="tab-content">
                            <div id="tab1" class="tab-pane active">
                                <div class="card-detail">
                                    <div class='country-name'>
                                        ทัวร์ญี่ปุ่น
                                    </div>
                                    <div class="city">
                                        โตเกียว ฮอกไกโด โอซาก้า
                                    </div>
                                    <div class="hilight">
                                        <i class="far fa-flag"></i>
                                        <div class="detail">
                                            ล่องเรือมังกร | ยอดเขาบานาฮิลล์ | Ba Na Hills | หมู่บ้านแกะสลักหินอ่อน | วัดหลินอึ้ง | สวนดอกไม้เมืองหนาว | กระเช้าไฟฟ้าเคเบิลคาร์ | รถรางเวียดนาม | 
                                        </div>    
                                    </div>                                                    
                                </div>

                                <hr>
                                <div class="card-time"><i class="fas fa-calendar-alt"></i>&nbsp;ช่วงเวลา มิ.ย. - ส.ค.</div>
                                <hr>
                                <div class="bar-bottom-card">
                                    <div class="card-airline"><img alt="การบินไทย" src="../images/airline/thai_airway.png" title="Air Asia X"></div>                                         
                                    <div class="card-price-dis"><strike>฿74,900</strike></div>
                                    <div class="card-price">฿49,900</div>
                                </div>
                            </div>                                          
                            <div id="tab2" class="tab-pane">ตารางช่วงเวลา content</div>
                        </div>
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab1" data-toggle="tab" class="active">ข้อมูลแพ็คเกจ</a></li>                                           
                            <li><a href="#tab2" data-toggle="tab">ช่วงเวลา</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="thumbnail card--content">
                <a href="{{ url('tour-detail') }}">
                    <div class="tour-cover lazyloaded" data-bg="../images/card/tour1.jpg" style="background-image: url(https://images.unsplash.com/photo-1509715367195-b9a491f63d58?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=748af9c34a5ed35a9c2c7ec49fea677c&auto=format&fit=crop&w=500&q=60);">
                        <div class="tour-footer">
                            <div class="pull-left">
                                <span class="flag">
                                    <img width="60%" alt="รูปธงประเทศ" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/2/China.png">
                                </span>
                            </div>
                        </div>
                        <div class="tour-header">
                            <div class="pull-right">
                                <span class="days">
                                    3 วัน 2 คืน
                                </span>
                            </div>
                            <span class="clear"></span>
                        </div>
                        <div class="tour-bottom-right">
                            <div>
                                <span class="tag">
                                    TH000001
                                </span>
                            </div>
                            <span class="clear"></span>                               
                        </div>
                    </div>
                </a>
                <div class="caption">
                    <div class="tabbable">
                        <div class="tab-content">
                            <div id="tab1" class="tab-pane active">
                                <div class="card-detail">
                                    <div class='country-name'>
                                        ทัวร์ญี่ปุ่น
                                    </div>
                                    <div class="city">
                                        โตเกียว ฮอกไกโด โอซาก้า
                                    </div>
                                    <div class="hilight">
                                        <i class="far fa-flag"></i>
                                        <div class="detail">
                                            ล่องเรือมังกร | ยอดเขาบานาฮิลล์ | Ba Na Hills | หมู่บ้านแกะสลักหินอ่อน | วัดหลินอึ้ง | สวนดอกไม้เมืองหนาว | กระเช้าไฟฟ้าเคเบิลคาร์ | รถรางเวียดนาม | 
                                        </div>    
                                    </div>                                                    
                                </div>

                                <hr>
                                <div class="card-time"><i class="fas fa-calendar-alt"></i>&nbsp;ช่วงเวลา มิ.ย. - ส.ค.</div>
                                <hr>
                                <div class="bar-bottom-card">
                                    <div class="card-airline"><img alt="การบินไทย" src="../images/airline/thai_airway.png" title="Air Asia X"></div>                                         
                                    <div class="card-price-dis"><strike>฿74,900</strike></div>
                                    <div class="card-price">฿49,900</div>
                                </div>
                            </div>                                          
                            <div id="tab2" class="tab-pane">ตารางช่วงเวลา content</div>
                        </div>
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab1" data-toggle="tab" class="active">ข้อมูลแพ็คเกจ</a></li>                                           
                            <li><a href="#tab2" data-toggle="tab">ช่วงเวลา</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <a href="#" class="btn btn-nextpage">แพ็คเกจทั้งหมด&nbsp;<i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
</section>

<!-- ลูกค้าที่ไว้วางใจ -->
<section class="package-hit-section">
    <div class="container">
        <div class="package-hit-title">
            <div class="section-title">
                <h1><i class="fas fa-heart" style='color: #EC2424;'></i>&nbsp;ลูกค้าที่ไว้วางใจกับเรา</h1>
                <div class="line-gradient"></div>
            </div>

            <div align="center">
                <img width="200px;" src="../images/sponsor/7.jpg">
                <img width="200px;" src="../images/sponsor/3.jpg">
                <img width="250px;" src="../images/sponsor/benz.png">
            </div>
            <br>
            <div align="center">
                <img width="200px;" src="../images/sponsor/singha.jpg">
                <img width="200px;" src="../images/sponsor/cp.png">
                <img width="250px;" src="../images/sponsor/pizza.jpg">
            </div>

        </div>
    </div>
</section>

@stop
@section('footer_scripts')
<script type="text/javascript">
    var tourHitsPackageActiveList = <?php echo json_encode($tourHitsPackageActiveList); ?>;
    var tourHitPeriodActive = <?php echo json_encode($tourHitPeriodActive); ?>;
    var tourSalesPackageActiveList = <?php echo json_encode($tourSalesPackageActiveList); ?>;
    var tourSalesPeriodActive = <?php echo json_encode($tourSalesPeriodActive); ?>;
    $(function () {
        $('#indx').addClass('menu-active');
    });

</script>
<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
<script type="text/javascript" src="{{ asset('js/home/index.js') }}"></script>
@endsection