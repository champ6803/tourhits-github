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
        /*display: -webkit-box;*/    
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


    @media screen and ( max-width: 958px ) {
        .package-hit-title h1{font-size: 23px;}
        .package-hit-title .see-more span{font-size: 14px; line-height: 33px;}
        .package-hit-title .section-descripion{font-size: 19px;}   
        .hothits-name-box .text{font-size: 14px;}
    }
    .item { width: 25%; }
    .item.w2 { width: 50%; }

    .company .thumbnail { 
        width:100% !important;
        box-shadow: none !important;
    }

    .awe-search-tabs__content .ui-tabs-panel input{
        font-size: 19px;
        font-weight: bold;
    }

</style>

<!-- HERO -->
<section class="hero-section">
    <div id="slider-revolution">
        <ul>
            <li data-slotamount="7" data-masterspeed="500" data-title="หน้าต่อไป">
                <img src="images/bg/cover1.png" data-bgposition="left center" data-duration="14000" data-bgpositionend="right center" alt="">
            </li>
            <li data-slotamount="7" data-masterspeed="500" data-title="หน้าต่อไป">
                <img src="images/bg/cover2.png" data-bgposition="left center" data-duration="14000" data-bgpositionend="right center" alt="">
            </li>
            <li data-slotamount="7" data-masterspeed="500" data-title="หน้าต่อไป">
                <img src="images/bg/cover3.png" data-bgposition="left center" data-duration="14000" data-bgpositionend="right center" alt="">
            </li>
        </ul>
    </div>
</section>
<!-- END / HERO SECTION -->

<!-- SEARCH TABS -->
<section>
    <!--    <div class="container search-container">
            <div class="awe-search-tabs-2 tabs">            
                <ul hidden="">
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
                                        <i class="fas fa-search awe-icon"></i>
                                        <i class="fas fa-search awe-icon"></i>
                                        <input id="search_text" class="form-control" type="text" placeholder="ค้นหาชื่อแพ็คเกจทัวร์" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-elements">
                                    <div class="form-item">
                                        <select id="country_dropdown" class="form-control">
                                            <option selected value="">เลือกประเทศ</option>
                                            @foreach ($countryList as $country)
                                            <option value="{{$country->tour_country_url}}">{{$country->country_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-elements">
                                    <div class="form-item">
                                        <input type="text" id="date_picker" placeholder="วันเดินทาง ไป - กลับ" class="form-control">
                                        <i class="far fa-calendar-check awe-icon"></i>
                                        <i class="awe-icon awe-icon-calendar"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-elements days">
                                    <div class="form-item">
                                        <select id="days_dropdown" class="form-control">
                                            <option selected value="">จำนวนวัน</option>
                                            <option value="1">1 วัน</option>
                                            <option value="2">2 วัน</option>
                                            <option value="3">3 วัน</option>
                                            <option value="4">4 วัน</option>
                                            <option value="5">5 วัน</option>
                                            <option value="6">6 วัน</option>
                                            <option value="7">7 วัน</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <a id="search_tour" class="btn btn-search">ค้นหาทัวร์</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>-->
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
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('tour/japan')}}">
                                                    <img data-src="../images/flags/Japan.png" alt="ทัวร์ญี่ปุ่น" class=" lazyloaded" src="../images/flags/Japan.png">
                                                    <h5>ทัวร์ญี่ปุ่น</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('tour/china')}}">
                                                    <img data-src="../images/flags/China.png" alt="ทัวร์จีน" class=" lazyloaded" src="../images/flags/China.png">
                                                    <h5>ทัวร์จีน</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('tour/europe')}}">
                                                    <img data-src="../images/flags/eu-flag.png" alt="ทัวร์ยุโรป" class=" lazyloaded" src="../images/flags/eu-flag.png" style="border-radius: 4px;">
                                                    <h5>ทัวร์ยุโรป</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('tour/europe-east')}}">
                                                    <img style="border-radius: 4px;" data-src="../images/flags/eu.png" alt="ทัวร์ยุโรปตะวันออก" class=" lazyloaded" src="../images/flags/eu.png">
                                                    <h5>ทัวร์ยุโรปตะวันออก</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('tour/hongkong')}}">
                                                    <img data-src="../images/flags/hk.png" alt="ทัวร์ฮ่องกง" class=" lazyloaded" src="../images/flags/hk.png">
                                                    <h5>ทัวร์ฮ่องกง</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('tour/myanmar')}}">
                                                    <img data-src="../images/flags/Myanmar.png" alt="ทัวร์พม่า" class=" lazyloaded" src="../images/flags/Myanmar.png">
                                                    <h5>ทัวร์พม่า</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('tour/taiwan')}}">
                                                    <img data-src="../images/flags/Taiwan.png" alt="ทัวร์ไต้หวัน" class=" lazyloaded" src="../images/flags/Taiwan.png">
                                                    <h5>ทัวร์ไต้หวัน</h5>
                                                </a>      
                                            </div>

                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('tour/maldives')}}">
                                                    <img data-src="../images/flags/Maldives.png" alt="ทัวร์มัลดีฟส์" class=" lazyloaded" src="../images/flags/Maldives.png">
                                                    <h5>ทัวร์มัลดีฟส์</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('tour/korea')}}">
                                                    <img data-src="../images/flags/South_Korea.png" alt="ทัวร์เกาหลี" class=" lazyloaded" src="../images/flags/South_Korea.png">
                                                    <h5>ทัวร์เกาหลี</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('tour/vietnam')}}">
                                                    <img data-src="../images/flags/Vietnam.png" alt="ทัวร์เวียดนาม" class=" lazyloaded" src="../images/flags/Vietnam.png">
                                                    <h5>ทัวร์เวียดนาม</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('tour/singapore')}}">
                                                    <img data-src="../images/flags/Singapore.png" alt="ทัวร์สิงคโปร์" class=" lazyloaded" src="../images/flags/Singapore.png">
                                                    <h5>ทัวร์สิงคโปร์</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('tour/russia')}}">
                                                    <img data-src="../images/flags/Russia.png" alt="ทัวร์รัสเซีย" class=" lazyloaded" src="../images/flags/Russia.png">
                                                    <h5>ทัวร์รัสเซีย</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('tour/laos')}}">
                                                    <img data-src="../images/flags/Laos.png" alt="ทัวร์ลาว" class=" lazyloaded" src="../images/flags/Laos.png">
                                                    <h5>ทัวร์ลาว</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('tour/italy')}}">
                                                    <img data-src="../images/flags/Italy.png" alt="ทัวร์อิตาลี" class=" lazyloaded" src="../images/flags/Italy.png">
                                                    <h5>ทัวร์อิตาลี</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('tour/austria')}}">
                                                    <img data-src="../images/flags/Austria.png" alt="ทัวร์ออสเตรีย" class=" lazyloaded" src="../images/flags/Austria.png">
                                                    <h5>ทัวร์ออสเตรีย</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('tour/france')}}">
                                                    <img data-src="../images/flags/France.png" alt="ทัวร์ฝรั่งเศส" class=" lazyloaded" src="../images/flags/France.png">
                                                    <h5>ทัวร์ฝรั่งเศส</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('tour/switzerland')}}">
                                                    <img data-src="../images/flags/Switzerland.png" alt="ทัวร์สวิส" class=" lazyloaded" src="../images/flags/Switzerland.png">
                                                    <h5>ทัวร์สวิส</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('tour/germany')}}">
                                                    <img data-src="../images/flags/Germany.png" alt="ทัวร์เยอรมัน" class=" lazyloaded" src="../images/flags/Germany.png">
                                                    <h5>ทัวร์เยอรมัน</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('tour/macau')}}">
                                                    <img data-src="../images/flags/Macau.png" alt="ทัวร์มาเก๊า" class=" lazyloaded" src="../images/flags/Macau.png">
                                                    <h5>ทัวร์มาเก๊า</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('tour/dubai')}}">
                                                    <img data-src="../images/flags/United-Arab-Emirates.png" alt="ทัวร์ดูไบ" class=" lazyloaded" src="../images/flags/United-Arab-Emirates.png">
                                                    <h5>ทัวร์ดูไบ</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('tour/australia')}}">
                                                    <img data-src="../images/flags/Australia.png" alt="ทัวร์ออสเตรเลีย" class=" lazyloaded" src="../images/flags/Australia.png">
                                                    <h5>ทัวร์ออสเตรเลีย</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('tour/egypt')}}">
                                                    <img data-src="../images/flags/Egypt.png" alt="ทัวร์อียิปต์" class=" lazyloaded" src="../images/flags/Egypt.png">
                                                    <h5>ทัวร์อียิปต์</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('tour/spain')}}">
                                                    <img data-src="../images/flags/Spain.png" alt="ทัวร์สเปน" class=" lazyloaded" src="../images/flags/Spain.png">
                                                    <h5>ทัวร์สเปน</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('tour/finland')}}">
                                                    <img data-src="../images/flags/Finland.png" alt="ทัวร์ฟินแลนด์" class=" lazyloaded" src="../images/flags/Finland.png">
                                                    <h5>ทัวร์ฟินแลนด์</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('tour/india')}}">
                                                    <img data-src="../images/flags/India.png" alt="ทัวร์อินเดีย " class=" lazyloaded" src="../images/flags/India.png">
                                                    <h5>ทัวร์อินเดีย </h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('tour/turkey')}}">
                                                    <img data-src="../images/flags/turkey.png" alt="ทัวร์ตุรกี" class=" lazyloaded" src="../images/flags/turkey.png">
                                                    <h5>ทัวร์ตุรกี</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('tour/indonesia')}}">
                                                    <img data-src="../images/flags/Indonesia.png" alt="ทัวร์อินโดนีเซีย" class=" lazyloaded" src="../images/flags/Indonesia.png">
                                                    <h5>ทัวร์อินโดนีเซีย</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('tour/south-africa')}}">
                                                    <img data-src="../images/flags/south_africa.png" alt="ทัวร์แอฟริกาใต้" class=" lazyloaded" src="../images/flags/south_africa.png">
                                                    <h5>ทัวร์แอฟริกาใต้</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('tour/netherlands')}}">
                                                    <img data-src="../images/flags/Netherlands.png" alt="ทัวร์เนเธอร์แลนด์" class=" lazyloaded" src="../images/flags/Netherlands.png">
                                                    <h5>ทัวร์เนเธอร์แลนด์</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('tour/norway')}}">
                                                    <img data-src="../images/flags/Norway.png" alt="ทัวร์นอร์เวย์" class=" lazyloaded" src="../images/flags/Norway.png">
                                                    <h5>ทัวร์นอร์เวย์</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('tour/poland')}}">
                                                    <img data-src="../images/flags/Poland.png" alt="ทัวร์โปแลนด์" class=" lazyloaded" src="../images/flags/Poland.png">
                                                    <h5>ทัวร์โปแลนด์</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('tour/nepal')}}">
                                                    <img data-src="../images/flags/Nepal.png" alt="ทัวร์เนปาล" class=" lazyloaded" src="../images/flags/Nepal.png">
                                                    <h5>ทัวร์เนปาล</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('tour/malaysia')}}">
                                                    <img data-src="../images/flags/Malaysia.png" alt="ทัวร์มาเลเซีย" class=" lazyloaded" src="../images/flags/Malaysia.png">
                                                    <h5>ทัวร์มาเลเซีย</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('tour/new-zealand')}}">
                                                    <img data-src="../images/flags/New-Zealand.png" alt="ทัวร์นิวซีแลนด์" class=" lazyloaded" src="../images/flags/New-Zealand.png">
                                                    <h5>ทัวร์นิวซีแลนด์</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('tour/brunei')}}">
                                                    <img data-src="../images/flags/Brunei.png" alt="ทัวร์บรูไน" class=" lazyloaded" src="../images/flags/Brunei.png">
                                                    <h5>ทัวร์บรูไน</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('tour/cambodia')}}">
                                                    <img data-src="../images/flags/Cambodia.png" alt="ทัวร์กัมพูชา" class=" lazyloaded" src="../images/flags/Cambodia.png">
                                                    <h5>ทัวร์กัมพูชา</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('tour/america')}}">
                                                    <img data-src="../images/flags/United-States-of-America.png" alt="ทัวร์สหรัฐอเมริกา" class=" lazyloaded" src="../images/flags/United-States-of-America.png">
                                                    <h5>ทัวร์อเมริกา</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('tour/south-america')}}">
                                                    <img data-src="../images/flags/South_America.png" alt="ทัวร์อเมริกาใต้" class=" lazyloaded" src="../images/flags/South_America.png">
                                                    <h5>ทัวร์อเมริกาใต้</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('tour/croatia')}}">
                                                    <img data-src="../images/flags/Croatia.png" alt="ทัวร์โครเอเชีย" class=" lazyloaded" src="../images/flags/Croatia.png">
                                                    <h5>ทัวร์โครเอเชีย</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('tour/england')}}">
                                                    <img data-src="../images/flags/England.png" alt="ทัวร์อังกฤษ" class=" lazyloaded" src="../images/flags/England.png">
                                                    <h5>ทัวร์อังกฤษ</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('tour/scandinavia')}}">
                                                    <img data-src="../images/flags/scandinavia.png" alt="ทัวร์สแกนดิเนเวีย" class=" lazyloaded" src="../images/flags/scandinavia.png" style="border-radius: 4px;">
                                                    <h5>ทัวร์สแกนดิเนเวีย</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('tour/hongkong-macau')}}">
                                                    <img data-src="../images/flags/hkm.png" alt="ทัวร์ฮ่องกง-มาเก๊า" class=" lazyloaded" src="../images/flags/hkm.png">
                                                    <h5>ทัวร์ฮ่องกง-มาเก๊า</h5>
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
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('tour/japan')}}">
                                                    <img data-src="../images/flags/Japan.png" alt="ทัวร์ญี่ปุ่น" class=" lazyloaded" src="../images/flags/Japan.png">
                                                    <h5>ทัวร์ญี่ปุ่น</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('tour/china')}}">
                                                    <img data-src="../images/flags/China.png" alt="ทัวร์จีน" class=" lazyloaded" src="../images/flags/China.png">
                                                    <h5>ทัวร์จีน</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('tour/hongkong')}}">
                                                    <img data-src="../images/flags/hk.png" alt="ทัวร์ฮ่องกง" class=" lazyloaded" src="../images/flags/hk.png">
                                                    <h5>ทัวร์ฮ่องกง</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('tour/myanmar')}}">
                                                    <img data-src="../images/flags/Myanmar.png" alt="ทัวร์พม่า" class=" lazyloaded" src="../images/flags/Myanmar.png">
                                                    <h5>ทัวร์พม่า</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('tour/taiwan')}}">
                                                    <img data-src="../images/flags/Taiwan.png" alt="ทัวร์ไต้หวัน" class=" lazyloaded" src="../images/flags/Taiwan.png">
                                                    <h5>ทัวร์ไต้หวัน</h5>
                                                </a>      
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('tour/korea')}}">
                                                    <img data-src="../images/flags/South_Korea.png" alt="ทัวร์เกาหลี" class=" lazyloaded" src="../images/flags/South_Korea.png">
                                                    <h5>ทัวร์เกาหลี</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('tour/vietnam')}}">
                                                    <img data-src="../images/flags/Vietnam.png" alt="ทัวร์เวียดนาม" class=" lazyloaded" src="../images/flags/Vietnam.png">
                                                    <h5>ทัวร์เวียดนาม</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('tour/singapore')}}">
                                                    <img data-src="../images/flags/Singapore.png" alt="ทัวร์สิงคโปร์" class=" lazyloaded" src="../images/flags/Singapore.png">
                                                    <h5>ทัวร์สิงคโปร์</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('tour/laos')}}">
                                                    <img data-src="../images/flags/Laos.png" alt="ทัวร์ลาว" class=" lazyloaded" src="../images/flags/Laos.png">
                                                    <h5>ทัวร์ลาว</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('tour/macau')}}">
                                                    <img data-src="../images/flags/Macau.png" alt="ทัวร์มาเก๊า" class=" lazyloaded" src="../images/flags/Macau.png">
                                                    <h5>ทัวร์มาเก๊า</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('tour/india')}}">
                                                    <img data-src="../images/flags/India.png" alt="ทัวร์อินเดีย " class=" lazyloaded" src="../images/flags/India.png">
                                                    <h5>ทัวร์อินเดีย </h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('tour/indonesia')}}">
                                                    <img data-src="../images/flags/Indonesia.png" alt="ทัวร์อินโดนีเซีย" class=" lazyloaded" src="../images/flags/Indonesia.png">
                                                    <h5>ทัวร์อินโดนีเซีย</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('tour/nepal')}}">
                                                    <img data-src="../images/flags/Nepal.png" alt="ทัวร์เนปาล" class=" lazyloaded" src="../images/flags/Nepal.png">
                                                    <h5>ทัวร์เนปาล</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('tour/malaysia')}}">
                                                    <img data-src="../images/flags/Malaysia.png" alt="ทัวร์มาเลเซีย" class=" lazyloaded" src="../images/flags/Malaysia.png">
                                                    <h5>ทัวร์มาเลเซีย</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('tour/brunei')}}">
                                                    <img data-src="../images/flags/Brunei.png" alt="ทัวร์บรูไน" class=" lazyloaded" src="../images/flags/Brunei.png">
                                                    <h5>ทัวร์บรูไน</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('tour/cambodia')}}">
                                                    <img data-src="../images/flags/Cambodia.png" alt="ทัวร์กัมพูชา" class=" lazyloaded" src="../images/flags/Cambodia.png">
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
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('tour/europe')}}">
                                                    <img data-src="../images/flags/eu-flag.png" alt="ทัวร์ยุโรป" class=" lazyloaded" src="../images/flags/eu-flag.png" style="border-radius: 4px;">
                                                    <h5>ทัวร์ยุโรป</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('tour/europe-east')}}">
                                                    <img style="border-radius: 4px;" data-src="../images/flags/eu.png" alt="ทัวร์ยุโรปตะวันออก" class=" lazyloaded" src="../images/flags/eu.png">
                                                    <h5>ทัวร์ยุโรปตะวันออก</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('tour/russia')}}">
                                                    <img data-src="../images/flags/Russia.png" alt="ทัวร์รัสเซีย" class=" lazyloaded" src="../images/flags/Russia.png">
                                                    <h5>ทัวร์รัสเซีย</h5>
                                                </a>    
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('tour/italy')}}">
                                                    <img data-src="../images/flags/Italy.png" alt="ทัวร์อิตาลี" class=" lazyloaded" src="../images/flags/Italy.png">
                                                    <h5>ทัวร์อิตาลี</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('tour/austria')}}">
                                                    <img data-src="../images/flags/Austria.png" alt="ทัวร์ออสเตรีย" class=" lazyloaded" src="../images/flags/Austria.png">
                                                    <h5>ทัวร์ออสเตรีย</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('tour/france')}}">
                                                    <img data-src="../images/flags/France.png" alt="ทัวร์ฝรั่งเศส" class=" lazyloaded" src="../images/flags/France.png">
                                                    <h5>ทัวร์ฝรั่งเศส</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('tour/switzerland')}}">
                                                    <img data-src="../images/flags/Switzerland.png" alt="ทัวร์สวิส" class=" lazyloaded" src="../images/flags/Switzerland.png">
                                                    <h5>ทัวร์สวิส</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('tour/germany')}}">
                                                    <img data-src="../images/flags/Germany.png" alt="ทัวร์เยอรมัน" class=" lazyloaded" src="../images/flags/Germany.png">
                                                    <h5>ทัวร์เยอรมัน</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('tour/spain')}}">
                                                    <img data-src="../images/flags/Spain.png" alt="ทัวร์สเปน" class=" lazyloaded" src="../images/flags/Spain.png">
                                                    <h5>ทัวร์สเปน</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('tour/finland')}}">
                                                    <img data-src="../images/flags/Finland.png" alt="ทัวร์ฟินแลนด์" class=" lazyloaded" src="../images/flags/Finland.png">
                                                    <h5>ทัวร์ฟินแลนด์</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('tour/netherlands')}}">
                                                    <img data-src="../images/flags/Netherlands.png" alt="ทัวร์เนเธอร์แลนด์" class=" lazyloaded" src="../images/flags/Netherlands.png">
                                                    <h5>ทัวร์เนเธอร์แลนด์</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('tour/poland')}}">
                                                    <img data-src="../images/flags/Poland.png" alt="ทัวร์โปแลนด์" class=" lazyloaded" src="../images/flags/Poland.png">
                                                    <h5>ทัวร์โปแลนด์</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('tour/croatia')}}">
                                                    <img data-src="../images/flags/Croatia.png" alt="ทัวร์โครเอเชีย" class=" lazyloaded" src="../images/flags/Croatia.png">
                                                    <h5>ทัวร์โครเอเชีย</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('tour/england')}}">
                                                    <img data-src="../images/flags/England.png" alt="ทัวร์อังกฤษ" class=" lazyloaded" src="../images/flags/England.png">
                                                    <h5>ทัวร์อังกฤษ</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('tour/scandinavia')}}">
                                                    <img data-src="../images/flags/scandinavia.png" alt="ทัวร์สแกนดิเนเวีย" class=" lazyloaded" src="../images/flags/scandinavia.png" style="border-radius: 4px;">
                                                    <h5>ทัวร์สแกนดิเนเวีย</h5>
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
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('tour/maldives')}}">
                                                    <img data-src="../images/flags/Maldives.png" alt="ทัวร์มัลดีฟส์" class=" lazyloaded" src="../images/flags/Maldives.png">
                                                    <h5>ทัวร์มัลดีฟส์</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('tour/dubai')}}">
                                                    <img data-src="../images/flags/United-Arab-Emirates.png" alt="ทัวร์ดูไบ" class=" lazyloaded" src="../images/flags/United-Arab-Emirates.png">
                                                    <h5>ทัวร์ดูไบ</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('tour/australia')}}">
                                                    <img data-src="../images/flags/Australia.png" alt="ทัวร์ออสเตรเลีย" class=" lazyloaded" src="../images/flags/Australia.png">
                                                    <h5>ทัวร์ออสเตรเลีย</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('tour/egypt')}}">
                                                    <img data-src="../images/flags/Egypt.png" alt="ทัวร์อียิปต์" class=" lazyloaded" src="../images/flags/Egypt.png">
                                                    <h5>ทัวร์อียิปต์</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('tour/turkey')}}">
                                                    <img data-src="../images/flags/turkey.png" alt="ทัวร์ตุรกี" class=" lazyloaded" src="../images/flags/turkey.png">
                                                    <h5>ทัวร์ตุรกี</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('tour/south-africa')}}">
                                                    <img data-src="../images/flags/south_africa.png" alt="ทัวร์แอฟริกาใต้" class=" lazyloaded" src="../images/flags/south_africa.png">
                                                    <h5>ทัวร์แอฟริกาใต้</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('tour/norway')}}">
                                                    <img data-src="../images/flags/Norway.png" alt="ทัวร์นอร์เวย์" class=" lazyloaded" src="../images/flags/Norway.png">
                                                    <h5>ทัวร์นอร์เวย์</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('tour/new-zealand')}}">
                                                    <img data-src="../images/flags/New-Zealand.png" alt="ทัวร์นิวซีแลนด์" class=" lazyloaded" src="../images/flags/New-Zealand.png">
                                                    <h5>ทัวร์นิวซีแลนด์</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('tour/america')}}">
                                                    <img data-src="../images/flags/United-States-of-America.png" alt="ทัวร์สหรัฐอเมริกา" class=" lazyloaded" src="../images/flags/United-States-of-America.png">
                                                    <h5>ทัวร์อเมริกา</h5>
                                                </a>
                                            </div>
                                            <div class="flag col-sm-6 col-md-3 col-lg-2"><a class="country-link new-thai-font" href="{{ URL::to('tour/south-america')}}">
                                                    <img data-src="../images/flags/South_America.png" alt="ทัวร์อเมริกาใต้" class=" lazyloaded" src="../images/flags/South_America.png">
                                                    <h5>อเมริกาใต้</h5>
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
                    <h1><i class="fas fa-map-marker" style='color: #c33132;'></i>&nbsp;แพ็คเกจยอดนิยม</h1>              
                </div>
                <div class="see-more">
                    <a href="#" ><span>ดูทั้งหมด <i class="fas fa-arrow-circle-right"></i></span></a>
                </div>
                <!--                <div class='section-descripion hidden-xs'>
                                    ทางบริษัททัวร์ฮิต ได้คัดเลือกแพ็คเกจทัวร์ต่างประเทศทั้งหมดที่มี เฉพาะส่วนที่จัดรายการโปรโมชั่นต้อนรับเทศกาลต่างๆในแต่ละเดือนมาไว้ ณ ที่นี้ ซึ่งในแต่ละแพ็คเกจจะราคาถูกต่างกัน โดยแต่ละแพ็คเกจหรือแต่ละช่วงเวลาจะมีที่นั่งจำกัด เพียงไม่กี่ที่เท่านั้น ท่านสามารถเลือกซื้อ หรือ เลือกชมได้จากหน้านี้ หรือสามารถสอบถามเพิ่มเติมได้จากเจ้าหน้าที่ เพื่อขอคำแนะนำ ทางเรายินดีให้บริการครับ
                                </div>-->
            </div>
        </div>
        <!--        หน้าจอเวอชั่น mobile/pc-->        
        <div id="card_area_hit" class="card-xs js-flickity" data-flickity='{ "freeScroll": true, "wrapAround": true, "autoPlay": true }'>

        </div>

    </div>
</section>

<!-- คัดสรรมาให้ -->
<section class="package-hit-section">
    <div class="container">
        <div class="package-hit-title">
            <div class="section-title" style="width:100%;">
                <h1><i class="" style='color: #c33132;'></i>เราคัดสรรมาให้จากกว่า 200 ทัวร์</h1>              
            </div>
        </div>    
        <!--            <div class='section-descripion hidden-xs'>
                        ทางบริษัททัวร์ฮิต ได้คัดเลือกแพ็คเกจทัวร์ต่างประเทศทั้งหมดที่มี เฉพาะส่วนที่จัดรายการโปรโมชั่นต้อนรับเทศกาลต่างๆในแต่ละเดือนมาไว้ ณ ที่นี้ ซึ่งในแต่ละแพ็คเกจจะราคาถูกต่างกัน โดยแต่ละแพ็คเกจหรือแต่ละช่วงเวลาจะมีที่นั่งจำกัด เพียงไม่กี่ที่เท่านั้น ท่านสามารถเลือกซื้อ หรือ เลือกชมได้จากหน้านี้ หรือสามารถสอบถามเพิ่มเติมได้จากเจ้าหน้าที่ เพื่อขอคำแนะนำ ทางเรายินดีให้บริการครับ
                    </div>-->
        <div class="row">
            @foreach($categoryList as $category)
            <div class="col-sm-4 col-xs-6 col-md-3">
                <div class="select-item">
                    <a href="{{url('tourhit?category_id='. $category->category_id)}}">
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

</section>

<!-- แพ๊คลดราคา -->
<section class="package-hit-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 package-hit-title">
                <div class="section-title">
                    <h1><i class="fas fa-fire" style='color: #c33132;'></i>&nbsp;แพ็คเกจลดราคา</h1>
                </div>
                <div class="see-more">
                    <a href="#" ><span>ดูทั้งหมด <i class="fas fa-arrow-circle-right"></i></span></a>
                </div>
                <!--                <div class='section-descripion hidden-xs'>
                                    ทางบริษัททัวร์ฮิต ได้คัดเลือกแพ็คเกจทัวร์ต่างประเทศทั้งหมดที่มี เฉพาะส่วนที่จัดรายการโปรโมชั่นต้อนรับเทศกาลต่างๆในแต่ละเดือนมาไว้ ณ ที่นี้ ซึ่งในแต่ละแพ็คเกจจะราคาถูกต่างกัน โดยแต่ละแพ็คเกจหรือแต่ละช่วงเวลาจะมีที่นั่งจำกัด เพียงไม่กี่ที่เท่านั้น ท่านสามารถเลือกซื้อ หรือ เลือกชมได้จากหน้านี้ หรือสามารถสอบถามเพิ่มเติมได้จากเจ้าหน้าที่ เพื่อขอคำแนะนำ ทางเรายินดีให้บริการครับ
                                </div>-->
            </div>
        </div>
        <!--        หน้าจอเวอชั่น mobile/pc-->
        <div id="card_area_sale" class="card-xs js-flickity" data-flickity='{ "freeScroll": true, "wrapAround": true, "autoPlay": true }'>

        </div>

        <div class="row">
<!--            <a href="#" class="btn btn-nextpage">แพ็คเกจทั้งหมด&nbsp;<i class="fas fa-arrow-circle-right"></i></a>-->
        </div>
    </div>
</section>
<section class="article-section">
    <div class="container">
        <div class="package-hit-title">
            <div class="section-title">
                <h1><i class="fas fa-globe-asia"></i>&nbsp;เรื่องราวที่น่าสนใจ</h1>           
            </div>
            <div class="see-more">
                <a href="{{ url("article-index")}}" ><span>ดูทั้งหมด <i class="fas fa-arrow-circle-right"></i></span></a>
            </div>
        </div>
        <div class="row">
<!--            <div class="article-button-next next"><i class="fa fa-angle-right"></i></div>
            <div class="article-button-prev swiper-button-disabled prev"><i class="fa fa-angle-left"></i></div>-->
        </div>
        <div class="row">
            <?php for ($i = 0; $i < (count($articleList) > 4 ? 4 : count($articleList)); $i++) { ?>
                <div class="col-sm-6">  
                    <div class="article-item">
                        <div class="article-item-img">
                            <a href="{{ url('article-content?id='.$articleList[$i]->article_id) }}" title="">
                                <img src="{{asset('images/article-img/'.$articleList[$i]->article_image)}}" class="" alt="" scale="0">
                            </a>
                        </div>
                        <div class="article-item-head">
                            <a href="{{ url('article-content?id='.$articleList[$i]->article_id) }}" title="">
                                {{ $articleList[$i]->article_title }}
                            </a>
                        </div>
                        <div class="article-item-detail">
                            <span><?php echo $articleList[$i]->article_short_detail ?></span>
                        </div>
                        <div class="article-item-date hidden-sm hidden-xs">
                            <span><i class="far fa-clock"></i><?php echo date('d-m-Y', strtotime($articleList[$i]->created_date)); ?></span>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

</section>
<!-- ลูกค้าที่ไว้วางใจ -->
<section class="package-hit-section">
    <div class="container">
        <div class="package-hit-title">
            <div class="section-title" style="float:none;">
                <h1><i class="fas fa-hands-helping" style='color: #c33132;'></i>&nbsp;ลูกค้าที่ไว้วางใจกับเรา</h1>
                <!--                <div class="line-gradient"></div>-->
            </div>
        </div>    
        <div class="awe-masonry item-9" style="position: relative; height: 877.5px;">
            <!-- GALLERY ITEM -->
            <div class="first-item-image awe-masonry__item" style="position: absolute; left: 0px; top: 0px;">
                <a>
                    <div class="image-wrap image-cover">
                        <img src="../images/sponsor/spon1.jpg" alt="" style="height: 100%; width: auto;">
                    </div>
                </a>      
            </div>
            <!-- END / GALLERY ITEM -->
            <!-- GALLERY ITEM -->
            <div class="awe-masonry__item" style="position: absolute; left: 292px; top: 0px;">
                <a>
                    <div class="image-wrap image-cover">
                        <img src="../images/sponsor/spon2.jpg" alt="" style="height: 100%; width: auto;">
                    </div>
                </a>                               
            </div>
            <!-- END / GALLERY ITEM -->
            <!-- GALLERY ITEM -->
            <div class="awe-masonry__item" style="position: absolute; left: 585px; top: 0px;">
                <a>
                    <div class="image-wrap image-cover">
                        <img src="../images/sponsor/spon3.jpg" alt="" style="height: 100%; width: auto;">
                    </div>
                </a>
            </div>
            <!-- END / GALLERY ITEM -->
            <!-- GALLERY ITEM -->
            <div class="awe-masonry__item" style="position: absolute; left: 0px; top: 292px;">
                <a>
                    <div class="image-wrap image-cover">
                        <img src="../images/sponsor/spon4.jpg" alt="" style="height: 100%; width: auto;">
                    </div>
                </a>                              
            </div>
            <!-- END / GALLERY ITEM -->
            <!-- GALLERY ITEM -->
            <div class="awe-masonry__item" style="position: absolute; left: 292px; top: 292px;">
                <a>
                    <div class="image-wrap image-cover">
                        <img src="../images/sponsor/spon5.jpg" alt="" style="height: 100%; width: auto;">
                    </div>
                </a>                                
            </div>
            <!-- END / GALLERY ITEM -->
            <!-- GALLERY ITEM -->
            <div class="awe-masonry__item" style="position: absolute; left: 0px; top: 585px;">
                <a>
                    <div class="image-wrap image-cover">
                        <img src="../images/sponsor/spon6.jpg" alt="" style="height: 100%; width: auto;">
                    </div>
                </a>                                
            </div>
            <!-- END / GALLERY ITEM -->
            <!-- GALLERY ITEM -->
            <div class="awe-masonry__item" style="position: absolute; left: 292px; top: 585px;">
                <a>
                    <div class="image-wrap image-cover">
                        <img src="../images/sponsor/spon7.jpg" alt="" style="height: 100%; width: auto;">
                    </div>
                </a>                               
            </div>
            <!-- END / GALLERY ITEM -->
            <!-- GALLERY ITEM -->
            <div class="awe-masonry__item" style="position: absolute; left: 585px; top: 585px;">
                <a>
                    <div class="image-wrap image-cover">
                        <img src="../images/sponsor/spon8.jpg" alt="" style="height: 100%; width: auto;">
                    </div>
                </a>                               
            </div>
            <!-- END / GALLERY ITEM -->
            <!-- GALLERY ITEM -->
            <div class="awe-masonry__item" style="position: absolute; left: 877px; top: 585px;">
                <a>
                    <div class="image-wrap image-cover">
                        <img src="../images/sponsor/spon9.jpg" alt="" style="height: 100%; width: auto;">
                    </div>
                </a>                               
            </div>
            <!-- END / GALLERY ITEM -->            

        </div>   


        <!--            <div class="openGallery-board">
                        <div class="Grid">
                            <div class="Grid-row">
                                <a class="Card" onclick="openGallery(1)" id="card-1">
                                <div class="Card-thumb">
                                  <div class="Card-shadow"></div>
                                  <div class="Card-shadow"></div>
                                  <div class="Card-shadow"></div>
                                  <div class="Card-image" style="background-image: url(https://robohash.org/1);"></div>
                                </div>
                                <div class="Card-title"><span>Super interesting card</span></div>
                                <div class="Card-explore"><span>Explore 50 more</span></div>
                                <button class="Card-button">view more</button>
                                </a>
                                
                                <a class="Card" onclick="openGallery(2)" id="card-2">
                                <div class="Card-thumb">
                                  <div class="Card-shadow"></div>
                                  <div class="Card-shadow"></div>
                                  <div class="Card-shadow"></div>
                                  <div class="Card-image" style="background-image: url(https://robohash.org/2);"></div>
                                </div>
                                <div class="Card-title"><span>Super interesting card</span></div>
                                <div class="Card-explore"><span>Explore 50 more</span></div>
                                <button class="Card-button">view more</button>
                                </a>
                                
                                <a class="Card" onclick="openGallery(3)" id="card-3">
                                <div class="Card-thumb">
                                  <div class="Card-shadow"></div>
                                  <div class="Card-shadow"></div>
                                  <div class="Card-shadow"></div>
                                  <div class="Card-image" style="background-image: url(https://robohash.org/3);"></div>
                                </div>
                                <div class="Card-title"><span>Super interesting card</span></div>
                                <div class="Card-explore"><span>Explore 50 more</span></div>
                                <button class="Card-button">view more</button>
                                </a>
                            </div>
                        </div>
                        <div class="Gallery" id="gallery-1">
                                <div class="Gallery-header"><a class="Gallery-close" onclick="closeAll()"><i class="fas fa-times-circle"></i></a></div>
                                <div class="Gallery-images">
                                  <div class="Gallery-left">
                                    <div class="Gallery-image"></div>
                                    <div class="Gallery-image"></div>
                                  </div>
                                  <div class="Gallery-image Gallery-image--primary" style="background-image: url(https://robohash.org/1);"></div>
                                </div>
                                <div class="Gallery-images">
                                  <div class="Gallery-image"></div>
                                  <div class="Gallery-image"></div>
                                  <div class="Gallery-image"></div>
                                </div>
                                <div class="Gallery-images">
                                  <div class="Gallery-image"></div>
                                  <div class="Gallery-image"></div>
                                  <div class="Gallery-image"></div>
                                </div>
                                <div class="Gallery-images">
                                  <div class="Gallery-image"></div>
                                  <div class="Gallery-image"></div>
                                  <div class="Gallery-image"></div>
                                </div>
                                <div class="Gallery-images">
                                  <div class="Gallery-image"></div>
                                  <div class="Gallery-image"></div>
                                  <div class="Gallery-image"></div>
                                </div>
                        </div>
                    </div>-->



        <!--            <div align="center">
                        <img width="200px;" src="../images/sponsor/7.jpg">
                        <img width="200px;" src="../images/sponsor/3.jpg">
                        <img width="250px;" src="../images/sponsor/benz.png">
                    </div>
                    <br>
                    <div align="center">
                        <img width="200px;" src="../images/sponsor/singha.jpg">
                        <img width="200px;" src="../images/sponsor/cp.png">
                        <img width="250px;" src="../images/sponsor/pizza.jpg">
                    </div>-->


        <!--        <div id="Carousel" class="carousel slide">
        
                    <ol class="carousel-indicators">
                        <li data-target="#Carousel" data-slide-to="0" class="active"></li>
                                                <li data-target="#Carousel" data-slide-to="1"></li>
                                                <li data-target="#Carousel" data-slide-to="2"></li>
                    </ol>
        
                     Carousel items 
                    <div class="carousel-inner">
        
                        <div class="item active" style="width:100% !important">
                            <div class="row company">
                                <div class="col-md-2 col-xs-4"><a href="http://reg.thonburi-u.ac.th/registrar/home.asp" class="thumbnail"><img src="https://tmaxtech.co.th/images/Partner/1.jpg" alt="Image" style="height:80px;"></a></div>
                                <div class="col-md-2 col-xs-4"><a href="http://www.spu.ac.th/" class="thumbnail"><img src="https://tmaxtech.co.th/images/Partner/2.jpg" alt="Image" style="height:80px;"></a></div>
                                <div class="col-md-2 col-xs-4"><a href="http://www.spu.ac.th/" class="thumbnail"><img src="https://tmaxtech.co.th/images/Partner/3.png" alt="Image" style="height:80px;"></a></div>
                                <div class="col-md-2 col-xs-4"><a href="https://www.mahidol.ac.th/th/" class="thumbnail"><img src="https://tmaxtech.co.th/images/Partner/4.jpg" alt="Image" style="height:80px;"></a></div>
                                <div class="col-md-2 col-xs-4"><a href="http://www.kkopenzoo.com/" class="thumbnail"><img src="https://tmaxtech.co.th/images/Partner/5.jpg" alt="Image" style="height:80px;"></a></div>
                                <div class="col-md-2 col-xs-4"><a href="http://www.songkhlazoo.com/" class="thumbnail"><img src="https://tmaxtech.co.th/images/Partner/6.jpg" alt="Image" style="height:80px;"></a></div>
                            </div>.row
                        </div>.item
        
                        <div class="item" style="width:100% !important">
                            <div class="row company">
                                <div class="col-md-2 col-xs-4"><a href="http://www.zoothailand.org/" class="thumbnail"><img src="https://tmaxtech.co.th/images/Partner/7.jpg" alt="Image" style="max-height:80px;"></a></div>
                                <div class="col-md-2 col-xs-4"><a href="http://www.diw.go.th/" class="thumbnail"><img src="https://tmaxtech.co.th/images/Partner/17.png" alt="Image" style="max-height:80px;"></a></div>
                                <div class="col-md-2 col-xs-4"><a href="http://www.dss.go.th/" class="thumbnail"><img src="https://tmaxtech.co.th/images/Partner/9.png" alt="Image" style="max-height:80px;"></a></div>
                                <div class="col-md-2 col-xs-4"><a href="http://www.dip.go.th/" class="thumbnail"><img src="https://tmaxtech.co.th/images/Partner/10.png" alt="Image" style="max-height:80px;"></a></div>
                                <div class="col-md-2 col-xs-4"><a href="http://www.dpim.go.th/" class="thumbnail"><img src="https://tmaxtech.co.th/images/Partner/11.png" alt="Image" style="max-height:80px;"></a></div>
                                <div class="col-md-2 col-xs-4"><a href="http://www.nstda.or.th/index.php" class="thumbnail"><img src="https://tmaxtech.co.th/images/Partner/12.jpg" alt="Image" style="max-height:80px;"></a></div>
                            </div>
                        </div>
        
                        <div class="item" style="width:100% !important">
                            <div class="row company">
                                <div class="col-md-2 col-xs-4"><a href="http://www.oaep.go.th/" class="thumbnail"><img src="https://tmaxtech.co.th/images/Partner/13.png" alt="Image" style="max-height:80px;"></a></div>
                                <div class="col-md-2 col-xs-4"><a href="http://www.ops.go.th/" class="thumbnail"><img src="https://tmaxtech.co.th/images/Partner/14.jpg" alt="Image" style="max-height:80px;"></a></div>
                                <div class="col-md-2 col-xs-4"><a href="/www.tisi.go.th" class="thumbnail"><img src="https://tmaxtech.co.th/images/Partner/15.png" alt="Image" style="max-height:80px;"></a></div>
                                <div class="col-md-2 col-xs-4"><a href="/www.oie.go.th/" class="thumbnail"><img src="https://tmaxtech.co.th/images/Partner/16.png" alt="Image" style="max-height:80px;"></a></div>
                                <div class="col-md-2 col-xs-4"><a href="http://reg.thonburi-u.ac.th/registrar/home.asp" class="thumbnail"><img src="https://tmaxtech.co.th/images/Partner/1.jpg" alt="Image" style="max-height:80px;"></a></div>
                                <div class="col-md-2 col-xs-4"><a href="http://www.spu.ac.th" class="thumbnail"><img src="https://tmaxtech.co.th/images/Partner/2.jpg" alt="Image" style="height:80px;"></a></div>
                            </div>
                        </div>
        
        
        
                    </div>
                </div>-->
    </div>

</section>
@stop
@section('footer_scripts')
<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>

<script type="text/javascript">
$(document).ready(function () {
    $('#Carousel').carousel({
        interval: 3000
    })
});
var tourHitsPackageActiveList = <?php echo json_encode($tourHitsPackageActiveList); ?>;
var tourHitPeriodActive = <?php echo json_encode($tourHitPeriodActive); ?>;
var tourSalesPackageActiveList = <?php echo json_encode($tourSalesPackageActiveList); ?>;
var tourSalesPeriodActive = <?php echo json_encode($tourSalesPeriodActive); ?>;
var rootPath = '{{asset("/images/")}}';
</script>

<script type="text/javascript" src="{{ asset('js/home/index.js') }}"></script>

@endsection