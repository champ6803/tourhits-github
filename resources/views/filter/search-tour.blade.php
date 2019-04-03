@extends('layout.main')
@section('page_title','Search Tour')
@section('main-content')

<style type="text/css">
    .filter-tabcard .nav-tabs {  width: 50%; margin-left:auto; margin-right: auto; } 
    .filter-tabcard .nav-tabs > li.active > a, .filter-tabcard .nav-tabs > li.active > a:focus, .filter-tabcard .nav-tabs > li.active > a:hover {color: #fff; background: #EC2424; border: none; box-shadow: 0 0px 5px rgba(112, 112, 112, 0.3); transform: scale(1.005); } <!--กด-->
    .filter-tabcard .nav-tabs > li > a { border: none; color: #515050; background: #fff;  } <!--ยังไม่ได้กด--> 
    .filter-tabcard .nav-tabs > li.active > a,.filter-tabcard .nav-tabs > li > a:hover { border: none;  color: #fff !important; background: #EC2424; }
    .filter-tabcard .nav-tabs > li > a::after { content: ""; background: #F58A1F; height: 3px; position: absolute; width: 100%; left: 0px; bottom: -8px; transition: all 250ms ease 0s; transform: scale(0); }
    .filter-tabcard .nav-tabs > li.active > a::after, .nav-tabs > li:hover > a::after { transform: scale(1); }
    .filter-tabcard .tab-nav > li > a::after { background: #5a4080 none repeat scroll 0% 0%; color: #fff; }
    .filter-tabcard .tab-pane { padding: 15px 0; }
    .filter-tabcard .tab-content {
        padding:10px; 
        height: auto; 
        /*width: 880px;*/ 
        border-radius: 10px;         
        border: 2px solid #F58A1F;
        margin-left: 50px;
        margin-right: 50px;
        margin-top:  25px;
        margin-bottom: 25px;
    }
    .filter-tabcard .nav-tabs > l   i  {width:20%; text-align:center;  }
    .filter-tabcard .card {background: #FFF none repeat scroll 0% 0%; box-shadow: 2px 0px 3px rgba(0, 0, 0, 0.3); margin-bottom: 30px; }

    .filter-tabcard .nav-tabs > li > a {
        color: #515050;
        border-left: 1px solid #fff;        
    }

    @media all and (max-width:724px){
        /*        .filter-tabcard .nav-tabs{
                    width: 300px;
                }*/
        .nav-tabs > li > a > span {display:none;}	
        .nav-tabs > li > a {padding: 0px 0px;}
    }

    .filter-tabcard{
        margin-top: 40px;
    }

    .btn-ratepreice{
        border-radius: 8px;
        width: auto;
        margin: 0 5px 0 5px;
        color: #fff;
        background-color: #F58A1F;
        border-color: #F58A1F;
        font-size: 20px;
    }

    .pull-right{
        margin-left: 10px;
        line-height: 1;
        font-size: 20px;
    }

    .price{
        font-size: 20px;
        font-weight: 600;
        color: #1D1D1D;
        padding-right: 10px;
    }

    .dropdown-pos .dropdown-menu{
        width: 100%;
        text-align: center;
    }

    .dropdown-pos{
        /*    text-align: center;
            display: inline-block;
            margin-left: auto;
            margin-right: auto;
            width: 100%;*/
    }

    .alert-danger{ background-color: rgba(248,115,0,0.6); }
    .alert { border: 0px solid transparent; }

    .filter-pickdate{
        padding-top: 10px;
        position: relative; 
    }

    .filter-pickdate i {
        position: absolute; 
        bottom: 12px; 
        right: 12px; 
        top: auto; 
        cursor: pointer;
        color: black;
    }

    .slider.slider-horizontal .slider-selection {
        background: #5e758c;
    }
</style>

<style>
    .slider .slider-horizontal .slider-handle{background-color: #fff!important;}
    .category-heading-content.category-heading-content__2{padding-top: 180px;}
    .filter-page{ background-color: #f6f6f6; margin-bottom: 0px;}
    .filter-item-wrapper{list-style-type: none;}
    .page-sidebar{background-color: #fff; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); margin-top: 0px;}
    .page-sidebar .sidebar-title{
        /*        border-top-color: #d7d7d7;*/
        border-top-color: #ea6a78;
        text-align: center;
    }

    .trip-item .item-price-more{
        padding: 0 20px;
    }

    .trip-item .item-price-more .price .amount{color: #c33132;}

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
    .filter-page__content .trip-item .item-body .item-title h2 a:hove{color: #c33132;}
    .filter-box {display: none;}
    .filter-box .searchtoggle {display: none;}
    .trip-item:hover .item-body .item-title h2 a{color: #c33132;}
    .filter-page__content .country img{height: 55px;} 

    .filter-page__content .trip-item:hover .price .amount{color:#c33132;}
    .filter-page__content .trip-item:hover .price{color:black;}
    .head-all-card .card_show{background-color: #f6f6f6; padding-bottom: 10px;}

    @media screen and ( max-width: 768px ) {
        #owl-demo .tag-item>a {font-size: 12px;}
        .owl-theme .owl-controls .owl-page{zoom:0.5;}
        .filter-page__content .country h6{font-size: 15px; line-height: 34px;}
        .filter-page__content .country span{font-size: 22px; line-height: 34px;}
        .filter-page__content .country img{height: 34px;} 
        .tour-local-wrapper .swiper-button-next{font-size: 17px;height: 46px;line-height: 46px;width: 40px;}
        .tour-local-wrapper .swiper-button-prev{font-size: 17px;height: 46px;line-height: 46px;width: 40px;}
        .filter-page__content .country{}

        .filter-page{ background-color: #fff;}
        .filter-page .filter-page-mid{margin-top: 0px; background-color: black;}
        .category-heading-content .category-heading-content__2{padding-top: 50px;}
        .filter-box {bottom:85px!important;}
    }

    @media screen and ( max-width: 767px ) {
        .filter-page__content .page-top{padding-top: 0px;}
        .filter-box {bottom:114px!important;}
    }

    @media (min-width: 1024px) and (max-width: 1399px) {
        .container {width: 100%;}
    }
    @media (min-width: 700px) and (max-width: 1024px){.trip-item{height: 525px;}}
    @media (min-width: 992px) and (max-width: 1024px){
        .container {width: 100%;}

        .sidebar-3{display: none;} 
        .sort-name{display: none;}

        .filter-page-left .col-md-pull-6{right: 70%;} 
        .filter-page-left .col-md-3{width: 30%;}
        .filter-page-mid .col-md-push-3 {left: 30%;}
        .filter-page-mid .col-md-6 {width: 70%;}

    }
    @media screen and ( max-width: 1199px ) {

        .filter-page__content .trip-item .item-body .item-title h2 a{padding-left: 0px;}
        .filter-page__content .trip-item .item-body .hilight i{display: none;}
        .trip-item{margin-bottom: 0px;}
        .trip-item .item-price-more .awe-btn{margin-right: 10px;}          
    }

    @media screen and ( max-width: 991px ) {

        .category-heading-content.category-heading-content__2{
            padding-top:60px;

        }

        .trip-item .item-media .bot-img-detail{
            margin-top: -40px;
            background-color: rgba(58,53,53,0.8);
        }

        .trip-item .item-media{
            width: 100%;
            border-radius: 0px;
        }

        .filter-page .filter-page-mid .page-mid-bg{
            background-color: #f6f6f6;
        }

        .filter-page__content .trip-item{
            padding: 0;
            border-radius: 0;
            margin-top: 20px;
        }

        .filter-page__content .trip-item:first-child{
            margin-top: 0px;
        }

        .head-all-card .card_show{
            background: none;
        }

        .filter-page__content .trip-item .item-body .hilight{
            padding-top: 5px;
        }

        .filter-page__content .trip-item .hilight .detail{
            font-size: 15px;
            overflow: hidden;
        }

        .filter-page__content .trip-item .item-body .item-title h2 a{
            font-size: 16px;
        }

        .filter-box {
            position: absolute;
            bottom: 60px;
            right: 0;
            white-space: nowrap;
            display: inline-block;
            padding: 7px 15px 0px 0px;

        }
        .filter-box .searchtoggle {
            display: inline;
            padding: 0px 6px;
            /*            width: 60px;
                        height: 78px;*/
            font-size: 19px;
            font-weight: bold;
            color: #363636;
            text-align: center;
            border-left: 1px solid #D4D4D4;
            border-right: 1px solid #D4D4D4;
            cursor: pointer;
            -webkit-transition: all 0.3s ease;
            -moz-transition: all 0.3s ease;
            -ms-transition: all 0.3s ease;
            -o-transition: all 0.3s ease;
            transition: all 0.3s ease;
        }
        .page-sidebar .filter-tittle  {display: none;}
        .page-sidebar .left-bar3    {display: none;}

        .filterModal .modal-body .filter-bar .option{font-size: 17px; line-height: 2.3;}
        .filterModal .modal-body .filter-bar .slider.slider-horizontal{width: 100%;}
        .filterModal .modal-header .close{margin-top: 4px;}
        .filterModal .modal-body .filter-bar .filter-header-text{font-size: 19px;}
        .filterModal .modal-body .filter-bar .filter-route{padding: 3px 0 13px 0;}
        .filterModal .filter-bar{padding-bottom:0px;}
        .modal-footer .cancel{
            font-size: 21px;
            color: #fff;
            width: 50%;
            border-radius: 50px;
            background-color: #c33132;
            border: 1px solid #c33132;
            opacity: 0.8;
        }
    }
    .modal.in .modal-dialog{margin-top: 100px;}


    .filter-page .filter-page-left .search-box-new{
        position: relative;
        display: inline-block;

        /*        top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);*/
        background: #34495e;
        border-radius: 40px;
        height: 60px;
        padding: 10px;
    }

    .filter-page .filter-page-left .search-btn-new {    
        font-size: 18px;
        color: #fff;
        float: right;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: #34495e;
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
    }

    .filter-page .filter-page-left .search-box-new .search-text-new {
        font-family: 'Kanit', sans-serif;
        border: none;
        background: none;
        outline: none;
        color: #fff;
        font-size: 18px;
        text-align: center;
        transition: 0.4s;
        line-height: 40px;
        width: 0px;
        padding: 0!important;
    }

    .filter-page .filter-page-left .sidebar-title span{
        font-size: 20px;
        font-weight: bold;
        padding-left: 5px;
        transition: 0.1s;
        color: #ed5565;
    }

    .filter-page .filter-page-left .search-box-new:hover > .search-text-new {
        width: 200px;
        transition: 0.8s;
    }

    .filter-page .filter-page-left .search-box-new:hover > .search-btn-new {
        color: #ed5565;
        background: white;
    }

    .filter-page .filter-page-left .search-box-new:hover > span{
        display: none;
        transition: 10s;
    }

    .awe-btn:focus{background-color: transparent;}



</style>

<!-- HEADING PAGE -->
<section class="awe-parallax category-heading-section-demo">
    <div class="awe-overlay"></div>
    <div class="container">
        <div class="category-heading-content category-heading-content__2 text-uppercase">
        </div>
    </div>
</section>
<!-- END / HEADING PAGE -->

<section class="filter-page">
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


        <!--กลาง-->
        <div class="filter-page-mid">
            <div class="col-md-6 col-md-push-3 page-mid-bg">
                <div id="loading" class="row">
                    <div class="col-md-12 text-center">
                        <img style="padding:100px 0" src="../images/search-loading.gif">
                    </div>
                </div>
                <div hidden class="filter-page__content card_show">
                    <div class="head-all-card">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="country">
                                    <img id="package_country_image" style="float: left; margin-right: 10px; border:#d7d7d7 solid 1px; border-radius: 8px; box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);" class="lazyloaded">
                                    <span id="package_country2"></span>
                                    <h6 id="package_country"></h6>

                                </div>
                            </div>
                            <div id="sorting" class="row card_show">
                                <div class="col-sm-6">
                                    <div class="page-top">
                                        <select onchange="sortPackage()" id="sort_package" class="awe-select">
                                            <option value="lowest_price">ราคาต่ำที่สุด</option>
                                            <option value="most_price">ราคาสูงที่สุด</option>
                                            <option value="hot_tour">นิยมมากที่สุด</option>
                                        </select>
                                        <div class="sort-name hidden-xs hidden-sm"><span>เรียงตาม :</span></div>                           
                                    </div>
                                </div>
                            </div>                    
                        </div>
                    </div>

                    <!--                เทส Card-->
                    <div class="row">
                        <div id="card_area" class="card_show filter-item-wrapper">
                            <li class="trip-item">
                                <div class="item-media">
                                    <div class="image-cover"><img src="../images/tour/206-Fuji Mountain.jpg" alt=""></div>
                                    <div class="bot-img-detail visible-xs visible-sm">
                                        <div class="tag-day-and-period">
                                            <span>5 </span>
                                            <span>วัน</span>
                                            <span> 3 </span>
                                            <span>คืน</span>
                                            <span>ก.ย. - ต.ค.</span>
                                        </div>
                                        <div class="tag-tour-num">
                                            <span>รหัส</span>
                                            <span> TH206</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="item-head-body">     
                                        <a href="/tour-detail/japan/206/THG15-XW-JP-1-30SEP18">ทัวร์ญี่ปุ่น ฮอกไกโด หิมะแรก ตามรอยหนังแฟนเดย์ 5 วัน 3 คืน </a>   
                                </div>
                                <div class="item-body">
<!--                                <div class="item-title">
                                        <h2><a href="/tour-detail/japan/206/THG15-XW-JP-1-30SEP18">NRT48 โตเกียวจ๋า พี่มาแล้ว อยู่นี่แล้วนะ กินนมฮอกไกโด 5D3N</a></h2>
                                    </div>-->
                                    <div class="tag-box-left hidden-xs">
                                        <div class="tag-head flexbox">
                                            <span class="flexbox">ระยะเวลา</span>
                                            <span class="flexbox">รหัสทัวร์</span>
                                        </div>
                                        <div class="tag-id flexbox">
                                            <span class="flexbox">5 วัน 3 คืน</span>
                                            <span class="flexbox">TH206</span>
                                        </div>
                                        <div class="tag-airline">
                                            <span class="flexbox">สายการบิน</span>
                                            <div class="tag-airline2 flexbox">
                                                <img alt="" src="../images/airline/thai_airasia_x.png" title="">
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="item-price-more">
                                    <div class="price">ราคา
                                        <ins><span class="amount">16,999<span class="bbb">บาท</span></span></ins>
                                    </div>
                                    <a class="awe-btn" href="/tour-detail/ทัวร์ญี่ปุ่น/206/THG15-XW-JP-1-30SEP18">ดูรายละเอียด</a>
                                </div>
                                <div class="item-hilight-more hilight">
                                    <span class="hi-text">ไฮไลท์ - </span><i class="fas fa-quote-left"></i>
                                    <div class="detail">
                                            <p>โตเกียว – วัดอาซากุสะ – โอชิโนะ ฮัคไค - ฟูจิออนเซ็น-ภูเขาไฟฟูจิ ชั้น 5</p>
                                            <p>พิพิธภัณฑ์แผ่นดินไหว-ชงชาแบบญี่ปุ่น - หมู่บ้านอิยาชิโนะ ซาโตะ</p>
                                            <p>อิออน นาริตะ มอลล์-วัดนาริตะ</p>
                                    </div>
                                </div>
                                <div class="item-period-table hidden-xs">
                                    <div class="table-month">
					<span class="month">ม.ค.</span>
                                    </div>
                                    <div class="peroid">  
                                       <span class="date soldout" data-event-name="">1-4</span>
                                       <span class="separate">/</span>
                                       
                                       <span class="date">7-9</span>
                                       <span class="separate">/</span>
                                       
                                       <span class="date soldout" data-event-name="">14-21</span>
                                       <span class="separate">/</span>
                                       
                                       <span class="date soldout" data-event-name="">20-23</span>
                                       <span class="separate">/</span>
                                       
                                        <span class="date soldout" data-event-name="">24-26</span>
                                       <span class="separate">/</span>
                                       
                                       <span class="date">27-30</span>
                                       <span class="separate">/</span>
                                       
                                       <span class="date soldout" data-event-name="">1-4</span>
                                       <span class="separate">/</span>
                                       
                                       <span class="date">7-9</span>
                                       <span class="separate">/</span>
                                       
                                       <span class="date soldout" data-event-name="">14-21</span>
                                       <span class="separate">/</span>
                                       
                                       <span class="date soldout" data-event-name="">20-23</span>
                                       <span class="separate">/</span>
                                       
                                        <span class="date soldout" data-event-name="">24-26</span>
                                       <span class="separate">/</span>
                                       
                                       <span class="date">27-30</span>
                                       <span class="separate">/</span>
                                       
                                       <span class="date soldout" data-event-name="">1-4</span>
                                       <span class="separate">/</span>
                                       
                                       <span class="date">7-9</span>
                                       <span class="separate">/</span>
                                       
                                       <span class="date soldout" data-event-name="">14-21</span>
                                       <span class="separate">/</span>
                                       
                                       <span class="date soldout" data-event-name="">20-23</span>
                                       <span class="separate">/</span>
                                       
                                        <span class="date soldout" data-event-name="">24-26</span>
                                       <span class="separate">/</span>
                                       
                                       <span class="date">27-30</span>
                                       <span class="separate">/</span>
                                            
                                    </div>
                                </div>
                            </li>
                        </div>
                    </div>
                    <!--       end         เทส Card-->


                    <!--                <div id="sorting" class="row card_show">
                                        <div class="col-md-6">
                                            <div class="page-top">
                                                <select class="awe-select">
                                                    <option>ราคาถูกที่สุด</option> 
                                                </select>
                                                <div class="sort-name hidden-xs"><span>เรียงตาม :</span></div>                           
                                            </div>
                                        </div>
                                    </div>-->
                    <div class="row">
                        <div class="col-xs-12">
                            <!-- FILTER BOX -->
                            <div class="filter-box">
                                <span class="searchtoggle" data-toggle="modal" data-target="#filterModal"><i class="fas fa-sliders-h" style="font-size: 15px"></i> คัดกรอง</span>
                            </div> 
                        </div>
                        <!-- Modal -->
                        <!--                    <div class="modal fade filterModal" id="filterModal" role="dialog">
                                                <div class="modal-dialog">
                                                     Modal content
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal"><i class="fas fa-times-circle"></i></button>
                                                            <h4 class="modal-title"><i class="fas fa-filter"></i> คัดกรอง</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="box-content">
                                                                <div class="filter-bar">    
                                                                    <div class="filter-price">
                                                                        <div class='filter-header'>
                                                                            <span class='filter-header-text'><i class="fas fa-exchange-alt"></i> กำหนดช่วงราคา</span>
                                                                        </div>     
                                                                        <div class="textpricesm"><span id="price_from">0</span> ถึง <span id="price_to">80,000</span> บาท</div>
                                                                        <input id="price" data-slider-id='priceSlider' type="text" class="span2" value="" data-slider-min="10" data-slider-max="1000" data-slider-step="5" data-slider-value="[250,450]"/> 
                                                                    </div>
                        
                                                                    <hr>
                        
                                                                    <div class="filter-route">
                                                                        <div class='filter-header'>
                                                                            <span class='filter-header-text'><i class="far fa-map"></i> เส้นทาง</span>
                                                                        </div>
                                                                        <div id="filter-route">
                                                                            <div class="option-all">
                                                                                <label for="route_all" class="label-cbx">
                                                                                    <input id="route_all" type="checkbox" class="invisible" checked>
                                                                                    <div class="checkbox">
                                                                                        <svg width="20px" height="20px" viewBox="0 0 20 20">
                                                                                        <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                                                                                        <polyline points="4 11 8 15 16 6"></polyline>
                                                                                        </svg>
                                                                                    </div>
                                                                                    <span>แสดงทั้งหมด</span>
                                                                                </label>
                                                                            </div>
                                                                            @foreach ($routeList as $route)
                                                                            <div class="option">
                                                                                <label for="route_{{ $route->r_id }}" class="label-cbx">
                                                                                    <input id="route_{{$route->r_id }}" value="{{ $route->r_name }}" type="checkbox" class="route_checkbox invisible">
                                                                                    <div class="checkbox">
                                                                                        <svg width="20px" height="20px" viewBox="0 0 20 20">
                                                                                        <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                                                                                        <polyline points="4 11 8 15 16 6"></polyline>
                                                                                        </svg>
                                                                                    </div>
                                                                                    <span class="name">{{ $route->r_name }}</span>
                                                                                    <span class="count">({{$route->r_num}})</span>
                                                                                    <span class="clear"></span>
                                                                                </label>
                                                                            </div>
                                                                            @endforeach
                                                                            <div id="expandToggleRoute" class="expand-toggle"><a href="javascript:void(0)" id="loadMoreRoute">ดูเพิ่มเติม <i class="fas fa-caret-down"></i></a></div>                                                                                      
                                                                        </div>
                                                                    </div>
                        
                                                                    <hr>
                        
                                                                    <div class="filter-date">
                                                                        <div class='filter-header'>
                                                                            <span class='filter-header-text'><i class="far fa-calendar-alt"></i> วันเดินทาง ไป-กลับ</span>
                                                                        </div>
                                                                        <div class='filter-pickdate'>
                                                                            <input type="text" id="date_picker" placeholder="กรุณาเลือกวันเดินทาง ไป - กลับ" class="form-control">
                                                                            <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                                                        </div>
                                                                                    เว้นไว้ใส่ปฎิทิน
                                                                        <div id="filter-date">
                                                                            <div class="option-all">
                                                                                <label for="holiday_all" class="label-cbx">
                                                                                    <input id="holiday_all" type="checkbox" class="invisible" checked>
                                                                                    <div class="checkbox">
                                                                                        <svg width="20px" height="20px" viewBox="0 0 20 20">
                                                                                        <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                                                                                        <polyline points="4 11 8 15 16 6"></polyline>
                                                                                        </svg>
                                                                                    </div>
                                                                                    <span>แสดงทั้งหมด</span>
                                                                                </label>
                                                                            </div>
                                                                            @foreach ($holidayList as $holiday)
                                                                            <div class="option">
                                                                                <label for="holiday_{{ $holiday->holiday_id }}" class="label-cbx">
                                                                                    <input id="holiday_{{ $holiday->holiday_id }}" value="{{ $holiday->start_date }}||{{ $holiday->end_date }}" type="checkbox" class="holiday_checkbox invisible">
                                                                                    <div class="checkbox">
                                                                                        <svg width="20px" height="20px" viewBox="0 0 20 20">
                                                                                        <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                                                                                        <polyline points="4 11 8 15 16 6"></polyline>
                                                                                        </svg>
                                                                                    </div>
                                                                                    <span class="name">{{ $holiday->holiday_name }}</span>
                                                                                    <span class="clear"></span>
                                                                                </label>
                                                                            </div>
                                                                            @endforeach
                        
                                                                        </div>
                                                                        <div id="expandToggleHoliday" class="expand-toggle"><a href="javascript:void(0)" id="loadMoreHoliday">ดูเพิ่มเติม <i class="fas fa-caret-down"></i></a></div>
                                                                    </div>
                        
                                                                    <hr>
                        
                                                                    <div class="filter-month">
                                                                        <div class='filter-header'>
                                                                            <span class='filter-header-text'><i class="far fa-calendar-check"></i> เดือน</span>
                                                                        </div>
                                                                        <div id="filter-month">
                                                                            <div class="option-all">
                                                                                <label for="month_all" class="label-cbx">
                                                                                    <input id="month_all" type="checkbox" class="invisible" checked>
                                                                                    <div class="checkbox">
                                                                                        <svg width="20px" height="20px" viewBox="0 0 20 20">
                                                                                        <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                                                                                        <polyline points="4 11 8 15 16 6"></polyline>
                                                                                        </svg>
                                                                                    </div>
                                                                                    <span>แสดงทั้งหมด</span>
                                                                                </label>
                                                                            </div>
                                                                            @foreach ($monthList as $month)
                                                                            <div class="option">
                                                                                @if ($month->m_month === 1)
                                                                                <label for="month_{{ $month->m_month }}" class="label-cbx">
                                                                                    <input id="month_{{ $month->m_month }}" value="{{ $month->m_month }}" type="checkbox" class="invisible month_checkbox">
                                                                                    <div class="checkbox">
                                                                                        <svg width="20px" height="20px" viewBox="0 0 20 20">
                                                                                        <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                                                                                        <polyline points="4 11 8 15 16 6"></polyline>
                                                                                        </svg>
                                                                                    </div>
                                                                                    <span class="name">มกราคม</span>
                                                                                    <span class="count">({{$month->m_num}})</span>
                                                                                    <span class="clear"></span>
                                                                                </label>
                                                                                @elseif ($month->m_month === 2)
                                                                                <label for="month_{{ $month->m_month }}" class="label-cbx">
                                                                                    <input id="month_{{ $month->m_month }}" value="{{ $month->m_month }}" type="checkbox" class="invisible">
                                                                                    <div class="checkbox">
                                                                                        <svg width="20px" height="20px" viewBox="0 0 20 20">
                                                                                        <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                                                                                        <polyline points="4 11 8 15 16 6"></polyline>
                                                                                        </svg>
                                                                                    </div>
                                                                                    <span class="name">กุมภาพันธ์</span>
                                                                                    <span class="count">({{$month->m_num}})</span>
                                                                                    <span class="clear"></span>
                                                                                </label>
                                                                                @elseif ($month->m_month === 3)
                                                                                <label for="month_{{ $month->m_month }}" class="label-cbx">
                                                                                    <input id="month_{{ $month->m_month }}" value="{{ $month->m_month }}" type="checkbox" class="invisible">
                                                                                    <div class="checkbox">
                                                                                        <svg width="20px" height="20px" viewBox="0 0 20 20">
                                                                                        <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                                                                                        <polyline points="4 11 8 15 16 6"></polyline>
                                                                                        </svg>
                                                                                    </div>
                                                                                    <span class="name">มีนาคม</span>
                                                                                    <span class="count">({{$month->m_num}})</span>
                                                                                    <span class="clear"></span>
                                                                                </label>
                                                                                @elseif ($month->m_month === 4)
                                                                                <label for="month_{{ $month->m_month }}" class="label-cbx">
                                                                                    <input id="month_{{ $month->m_month }}" value="{{ $month->m_month }}" type="checkbox" class="invisible">
                                                                                    <div class="checkbox">
                                                                                        <svg width="20px" height="20px" viewBox="0 0 20 20">
                                                                                        <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                                                                                        <polyline points="4 11 8 15 16 6"></polyline>
                                                                                        </svg>
                                                                                    </div>
                                                                                    <span class="name">เมษายน</span>
                                                                                    <span class="count">({{$month->m_num}})</span>
                                                                                    <span class="clear"></span>
                                                                                </label>
                                                                                @elseif ($month->m_month === 5)
                                                                                <label for="month_{{ $month->m_month }}" class="label-cbx">
                                                                                    <input id="month_{{ $month->m_month }}" value="{{ $month->m_month }}" type="checkbox" class="invisible">
                                                                                    <div class="checkbox">
                                                                                        <svg width="20px" height="20px" viewBox="0 0 20 20">
                                                                                        <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                                                                                        <polyline points="4 11 8 15 16 6"></polyline>
                                                                                        </svg>
                                                                                    </div>
                                                                                    <span class="name">พฤษภาคม</span>
                                                                                    <span class="count">({{$month->m_num}})</span>
                                                                                    <span class="clear"></span>
                                                                                </label>
                                                                                @elseif ($month->m_month === 6)
                                                                                <label for="month_{{ $month->m_month }}" class="label-cbx">
                                                                                    <input id="month_{{ $month->m_month }}" value="{{ $month->m_month }}" type="checkbox" class="invisible">
                                                                                    <div class="checkbox">
                                                                                        <svg width="20px" height="20px" viewBox="0 0 20 20">
                                                                                        <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                                                                                        <polyline points="4 11 8 15 16 6"></polyline>
                                                                                        </svg>
                                                                                    </div>
                                                                                    <span class="name">มิถุนายน</span>
                                                                                    <span class="count">({{$month->m_num}})</span>
                                                                                    <span class="clear"></span>
                                                                                </label>
                                                                                @elseif ($month->m_month === 7)
                                                                                <label for="month_{{ $month->m_month }}" class="label-cbx">
                                                                                    <input id="month_{{ $month->m_month }}" value="{{ $month->m_month }}" type="checkbox" class="invisible">
                                                                                    <div class="checkbox">
                                                                                        <svg width="20px" height="20px" viewBox="0 0 20 20">
                                                                                        <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                                                                                        <polyline points="4 11 8 15 16 6"></polyline>
                                                                                        </svg>
                                                                                    </div>
                                                                                    <span class="name">กรกฎาคม</span>
                                                                                    <span class="count">({{$month->m_num}})</span>
                                                                                    <span class="clear"></span>
                                                                                </label>
                                                                                @elseif ($month->m_month === 8)
                                                                                <label for="month_{{ $month->m_month }}" class="label-cbx">
                                                                                    <input id="month_{{ $month->m_month }}" value="{{ $month->m_month }}" type="checkbox" class="invisible">
                                                                                    <div class="checkbox">
                                                                                        <svg width="20px" height="20px" viewBox="0 0 20 20">
                                                                                        <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                                                                                        <polyline points="4 11 8 15 16 6"></polyline>
                                                                                        </svg>
                                                                                    </div>
                                                                                    <span class="name">สิงหาคม</span>
                                                                                    <span class="count">({{$month->m_num}})</span>
                                                                                    <span class="clear"></span>
                                                                                </label>
                                                                                @elseif ($month->m_month === 9)
                                                                                <label for="month_{{ $month->m_month }}" class="label-cbx">
                                                                                    <input id="month_{{ $month->m_month }}" value="{{ $month->m_month }}" type="checkbox" class="invisible">
                                                                                    <div class="checkbox">
                                                                                        <svg width="20px" height="20px" viewBox="0 0 20 20">
                                                                                        <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                                                                                        <polyline points="4 11 8 15 16 6"></polyline>
                                                                                        </svg>
                                                                                    </div>
                                                                                    <span class="name">กันยายน</span>
                                                                                    <span class="count">({{$month->m_num}})</span>
                                                                                    <span class="clear"></span>
                                                                                </label>
                                                                                @elseif ($month->m_month === 10)
                                                                                <label for="month_{{ $month->m_month }}" class="label-cbx">
                                                                                    <input id="month_{{ $month->m_month }}" value="{{ $month->m_month }}" type="checkbox" class="invisible">
                                                                                    <div class="checkbox">
                                                                                        <svg width="20px" height="20px" viewBox="0 0 20 20">
                                                                                        <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                                                                                        <polyline points="4 11 8 15 16 6"></polyline>
                                                                                        </svg>
                                                                                    </div>
                                                                                    <span class="name">ตุลาคม</span>
                                                                                    <span class="count">({{$month->m_num}})</span>
                                                                                    <span class="clear"></span>
                                                                                </label>
                                                                                @elseif ($month->m_month === 11)
                                                                                <label for="month_{{ $month->m_month }}" class="label-cbx">
                                                                                    <input id="month_{{ $month->m_month }}" value="{{ $month->m_month }}" type="checkbox" class="invisible">
                                                                                    <div class="checkbox">
                                                                                        <svg width="20px" height="20px" viewBox="0 0 20 20">
                                                                                        <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                                                                                        <polyline points="4 11 8 15 16 6"></polyline>
                                                                                        </svg>
                                                                                    </div>
                                                                                    <span class="name">พฤศจิกายน</span>
                                                                                    <span class="count">({{$month->m_num}})</span>
                                                                                    <span class="clear"></span>
                                                                                </label>
                                                                                @elseif ($month->m_month === 12)
                                                                                <label for="month_{{ $month->m_month }}" class="label-cbx">
                                                                                    <input id="month_{{ $month->m_month }}" value="{{ $month->m_month }}" type="checkbox" class="invisible">
                                                                                    <div class="checkbox">
                                                                                        <svg width="20px" height="20px" viewBox="0 0 20 20">
                                                                                        <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                                                                                        <polyline points="4 11 8 15 16 6"></polyline>
                                                                                        </svg>
                                                                                    </div>
                                                                                    <span class="name">ธันวาคม</span>
                                                                                    <span class="count">({{$month->m_num}})</span>
                                                                                    <span class="clear"></span>
                                                                                </label>
                                                                                @endif
                                                                            </div>
                                                                            @endforeach
                        
                                                                        </div>
                                                                        <div id="expandToggleMonth" class="expand-toggle"><a href="javascript:void(0)" id="loadMoreMonth">ดูเพิ่มเติม <i class="fas fa-caret-down"></i></a></div>
                                                                    </div>
                        
                                                                    <hr>
                        
                                                                    <div class="filter-countdate">
                                                                        <div class='filter-header'>
                                                                            <span class='filter-header-text'><i class="far fa-clock"></i> จำนวนวัน</span>
                                                                        </div>
                                                                        <div id="filter-countdate">
                                                                            <div class="option-all">
                                                                                <label for="day_all" class="label-cbx">
                                                                                    <input id="day_all" type="checkbox" class="invisible" checked>
                                                                                    <div class="checkbox">
                                                                                        <svg width="20px" height="20px" viewBox="0 0 20 20">
                                                                                        <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                                                                                        <polyline points="4 11 8 15 16 6"></polyline>
                                                                                        </svg>
                                                                                    </div>
                                                                                    <span>แสดงทั้งหมด</span>
                                                                                </label>
                                                                            </div>
                                                                            @foreach ($dayList as $day)
                                                                            <div class="option">
                                                                                <label for="day_{{ $day->duration }}" class="label-cbx">
                                                                                    <input id="day_{{ $day->duration }}" type="checkbox" class="invisible days_checkbox">
                                                                                    <div class="checkbox">
                                                                                        <svg width="20px" height="20px" viewBox="0 0 20 20">
                                                                                        <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                                                                                        <polyline points="4 11 8 15 16 6"></polyline>
                                                                                        </svg>
                                                                                    </div>
                                                                                    <span class="name">{{ $day->duration }} วัน</span>
                                                                                    <span class="count">({{$day->sum}})</span>
                                                                                    <span class="clear"></span>
                                                                                </label>
                                                                            </div>
                                                                            @endforeach
                                                                        </div>
                                                                        <div id="expandToggleDates" class="expand-toggle"><a href="javascript:void(0)" id="loadMoreDates">ดูเพิ่มเติม <i class="fas fa-caret-down"></i></a></div>
                                                                    </div>
                        
                                                                    <hr>
                        
                                                                    <div class="filter-airline">
                                                                        <div class='filter-header'>
                                                                            <span class='filter-header-text'><i class="far fa-paper-plane"></i> สายการบิน</span>
                                                                        </div>
                                                                        <div id="filter-airline">
                                                                            <div class="option-all">
                                                                                <label for="airline_all" class="label-cbx">
                                                                                    <input id="airline_all" type="checkbox" class="invisible" checked>
                                                                                    <div class="checkbox">
                                                                                        <svg width="20px" height="20px" viewBox="0 0 20 20">
                                                                                        <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                                                                                        <polyline points="4 11 8 15 16 6"></polyline>
                                                                                        </svg>
                                                                                    </div>
                                                                                    <span>แสดงทั้งหมด</span>
                                                                                </label>
                                                                            </div>
                                                                            @foreach ($airlineList as $airline)
                                                                            <div class="option">
                                                                                <label for="airline_{{ $airline->a_id }}" class="label-cbx">
                                                                                    <input id="airline_{{ $airline->a_id }}" type="checkbox" class="invisible airline_checkbox">
                                                                                    <div class="checkbox">
                                                                                        <svg width="20px" height="20px" viewBox="0 0 20 20">
                                                                                        <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                                                                                        <polyline points="4 11 8 15 16 6"></polyline>
                                                                                        </svg>
                                                                                    </div>
                                                                                    <span class="name">{{ $airline->a_name }}</span>
                                                                                    <span class="count">({{$airline->a_num}})</span>
                                                                                    <span class="clear"></span>
                                                                                </label>
                                                                            </div>
                                                                            @endforeach
                        
                                                                        </div>
                                                                        <div id="expandToggleAirline" class="expand-toggle"><a href="javascript:void(0)" id="loadMoreAirline">ดูเพิ่มเติม <i class="fas fa-caret-down"></i></a></div>
                                                                    </div>
                        
                        
                                                                                                end filter-bar                                                                           
                                                                </div>
                                                            </div>    
                                                        </div>
                                                        <div class="modal-footer" style="text-align:center;">
                                                            <button type="button" class="awe-btn cancel" data-dismiss="modal">เสร็จสิ้น</button>
                                                        </div>
                                                    </div>
                        
                                                </div>
                                            </div>-->

                    </div>    
                    <br>

                    <div id="card_area" class="card_show filter-item-wrapper">

                    </div>


                    <!-- PAGINATION -->
                    <!--                <div class="page__pagination">
                                        <span class="pagination-prev"><i class="fa fa-caret-left"></i></span>
                                        <span class="current">1</span>
                                        <a href="#">2</a>
                                        <a href="#">3</a>
                                        <a href="#">4</a>
                                        <a href="#" class="pagination-next"><i class="fa fa-caret-right"></i></a>
                                    </div>-->

                    <div class="row card_show">
                        <div class="col-md-12">
                            <ul class="pagination" id="search_tour_pager"></ul>
                        </div>
                    </div>
                    <!-- END / PAGINATION -->
                </div>
            </div>
        </div>
        <!--                    bar ซ้าย-->
        <div class="filter-page-left">
            <div class="col-md-3 col-md-pull-6">

                <div class="page-sidebar">

                    <div class="sidebar-title hidden-xs filter-tittle">

                        <div class="search-box-new">
                            <input id="search_input" type="text" name="search" placeholder="ค้นหาชื่อแพ็คเกจทัวร์" class="search-text-new"/>
                            <a id="search_btn" class="search-btn-new">
                                <i class="fa fa-search"></i>
                            </a>
                            <span><i class="fas fa-align-left"></i></span>
                        </div>


                        <hr style="margin-top:18px; border-style: hidden;">
                        <h3><i class="fas fa-filter"></i> คัดกรอง</h3>      
                    </div>         

                    <div class="left-bar3 mobile-version hidden-xs">
                        <div class="box-content">
                            <div class="filter-bar">
                                <!--                            <div class="filter-text text-center">
                                                                <input id="search_text" type="text" class="form-control" placeholder="ค้นหาชื่อแพ็คเกจทัวร์"> 
                                                            </div>
                                
                                                            <hr>
                                
                                                            <div class="filter-text text-center" style="margin-bottom: 10px;">
                                                                <button id="search_btn" class="btn btn-danger" type="button" style="height: 40px; width: 120px; border-radius: 20px;"><i class="fa fa-search"></i></button>
                                                            </div>
                                
                                                            <hr>-->

                                <div class="filter-price">
                                    <div class='filter-header'>
                                        <span class='filter-header-text'><i class="fas fa-exchange-alt"></i> กำหนดช่วงราคา</span>
                                    </div>     
                                    <div class="textpricesm"><span id="price_from">0</span> ถึง <span id="price_to"></span> บาท</div>
                                    <input id="price" type="text" class="span2" data-slider-step="5">
                                </div>

                                <hr>

                                <div class="filter-route">
                                    <div class='filter-header'>
                                        <span class='filter-header-text'><i class="far fa-map"></i> เส้นทาง</span>
                                    </div>
                                    <div id="filter-route">
                                        <div class="option-all">
                                            <label for="route_all" class="label-cbx">
                                                <input id="route_all" type="checkbox" class="invisible" checked>
                                                <div class="checkbox">
                                                    <svg width="20px" height="20px" viewBox="0 0 20 20">
                                                    <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                                                    <polyline points="4 11 8 15 16 6"></polyline>
                                                    </svg>
                                                </div>
                                                <span>แสดงทั้งหมด</span>
                                            </label>
                                        </div>
                                        @foreach ($routeList as $route)
                                        <div class="option">
                                            <label for="route_{{ $route->r_id }}" class="label-cbx">
                                                <input id="route_{{$route->r_id }}" value="{{ $route->r_name }}" type="checkbox" class="route_checkbox invisible">
                                                <div class="checkbox">
                                                    <svg width="20px" height="20px" viewBox="0 0 20 20">
                                                    <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                                                    <polyline points="4 11 8 15 16 6"></polyline>
                                                    </svg>
                                                </div>
                                                <span class="name">{{ $route->r_name }}</span>
                                                <span class="count">({{$route->r_num}})</span>
                                                <span class="clear"></span>
                                            </label>
                                        </div>
                                        @endforeach
                                        <div id="expandToggleRoute" class="expand-toggle"><a href="javascript:void(0)" id="loadMoreRoute">ดูเพิ่มเติม <i class="fas fa-caret-down"></i></a></div>                                                                                      
                                    </div>
                                </div>

                                <hr>

                                <div class="filter-date">
                                    <div class='filter-header'>
                                        <span class='filter-header-text'><i class="far fa-calendar-alt"></i> วันเดินทาง ไป-กลับ</span>
                                    </div>
                                    <div class='filter-pickdate'>
                                        <input type="text" id="date_picker" placeholder="กรุณาเลือกวันเดินทาง ไป - กลับ" class="form-control">
                                        <i id="clear_calendar" class="far fa-calendar-times"></i>
                                    </div>
                                    <!--            เว้นไว้ใส่ปฎิทิน-->
                                    <div id="filter-date">
                                        <div class="option-all">
                                            <label for="holiday_all" class="label-cbx">
                                                <input id="holiday_all" type="checkbox" class="invisible" checked>
                                                <div class="checkbox">
                                                    <svg width="20px" height="20px" viewBox="0 0 20 20">
                                                    <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                                                    <polyline points="4 11 8 15 16 6"></polyline>
                                                    </svg>
                                                </div>
                                                <span>แสดงทั้งหมด</span>
                                            </label>
                                        </div>
                                        @foreach ($holidayList as $holiday)
                                        <div class="option">
                                            <label for="holiday_{{ $holiday->holiday_id }}" class="label-cbx">
                                                <input id="holiday_{{ $holiday->holiday_id }}" value="{{ $holiday->start_date }}||{{ $holiday->end_date }}" type="checkbox" class="holiday_checkbox invisible">
                                                <div class="checkbox">
                                                    <svg width="20px" height="20px" viewBox="0 0 20 20">
                                                    <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                                                    <polyline points="4 11 8 15 16 6"></polyline>
                                                    </svg>
                                                </div>
                                                <span class="name">{{ $holiday->holiday_name }}</span>
                                                <span class="clear"></span>
                                            </label>
                                        </div>
                                        @endforeach

                                    </div>
                                    <div id="expandToggleHoliday" class="expand-toggle"><a href="javascript:void(0)" id="loadMoreHoliday">ดูเพิ่มเติม <i class="fas fa-caret-down"></i></a></div>
                                </div>

                                <hr>

                                <div class="filter-month">
                                    <div class='filter-header'>
                                        <span class='filter-header-text'><i class="far fa-calendar-check"></i> เดือน</span>
                                    </div>
                                    <div id="filter-month">
                                        <div class="option-all">
                                            <label for="month_all" class="label-cbx">
                                                <input id="month_all" type="checkbox" class="invisible" checked>
                                                <div class="checkbox">
                                                    <svg width="20px" height="20px" viewBox="0 0 20 20">
                                                    <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                                                    <polyline points="4 11 8 15 16 6"></polyline>
                                                    </svg>
                                                </div>
                                                <span>แสดงทั้งหมด</span>
                                            </label>
                                        </div>
                                        @foreach ($monthList as $month)
                                        <div class="option">
                                            @if ($month->m_month === 1)
                                            <label for="month_{{ $month->m_month }}" class="label-cbx">
                                                <input id="month_{{ $month->m_month }}" value="{{ $month->m_month }}" type="checkbox" class="invisible month_checkbox">
                                                <div class="checkbox">
                                                    <svg width="20px" height="20px" viewBox="0 0 20 20">
                                                    <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                                                    <polyline points="4 11 8 15 16 6"></polyline>
                                                    </svg>
                                                </div>
                                                <span class="name">มกราคม</span>
                                                <span class="count">({{$month->m_num}})</span>
                                                <span class="clear"></span>
                                            </label>
                                            @elseif ($month->m_month === 2)
                                            <label for="month_{{ $month->m_month }}" class="label-cbx">
                                                <input id="month_{{ $month->m_month }}" value="{{ $month->m_month }}" type="checkbox" class="invisible month_checkbox">
                                                <div class="checkbox">
                                                    <svg width="20px" height="20px" viewBox="0 0 20 20">
                                                    <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                                                    <polyline points="4 11 8 15 16 6"></polyline>
                                                    </svg>
                                                </div>
                                                <span class="name">กุมภาพันธ์</span>
                                                <span class="count">({{$month->m_num}})</span>
                                                <span class="clear"></span>
                                            </label>
                                            @elseif ($month->m_month === 3)
                                            <label for="month_{{ $month->m_month }}" class="label-cbx">
                                                <input id="month_{{ $month->m_month }}" value="{{ $month->m_month }}" type="checkbox" class="invisible month_checkbox">
                                                <div class="checkbox">
                                                    <svg width="20px" height="20px" viewBox="0 0 20 20">
                                                    <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                                                    <polyline points="4 11 8 15 16 6"></polyline>
                                                    </svg>
                                                </div>
                                                <span class="name">มีนาคม</span>
                                                <span class="count">({{$month->m_num}})</span>
                                                <span class="clear"></span>
                                            </label>
                                            @elseif ($month->m_month === 4)
                                            <label for="month_{{ $month->m_month }}" class="label-cbx">
                                                <input id="month_{{ $month->m_month }}" value="{{ $month->m_month }}" type="checkbox" class="invisible month_checkbox">
                                                <div class="checkbox">
                                                    <svg width="20px" height="20px" viewBox="0 0 20 20">
                                                    <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                                                    <polyline points="4 11 8 15 16 6"></polyline>
                                                    </svg>
                                                </div>
                                                <span class="name">เมษายน</span>
                                                <span class="count">({{$month->m_num}})</span>
                                                <span class="clear"></span>
                                            </label>
                                            @elseif ($month->m_month === 5)
                                            <label for="month_{{ $month->m_month }}" class="label-cbx">
                                                <input id="month_{{ $month->m_month }}" value="{{ $month->m_month }}" type="checkbox" class="invisible month_checkbox">
                                                <div class="checkbox">
                                                    <svg width="20px" height="20px" viewBox="0 0 20 20">
                                                    <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                                                    <polyline points="4 11 8 15 16 6"></polyline>
                                                    </svg>
                                                </div>
                                                <span class="name">พฤษภาคม</span>
                                                <span class="count">({{$month->m_num}})</span>
                                                <span class="clear"></span>
                                            </label>
                                            @elseif ($month->m_month === 6)
                                            <label for="month_{{ $month->m_month }}" class="label-cbx">
                                                <input id="month_{{ $month->m_month }}" value="{{ $month->m_month }}" type="checkbox" class="invisible month_checkbox">
                                                <div class="checkbox">
                                                    <svg width="20px" height="20px" viewBox="0 0 20 20">
                                                    <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                                                    <polyline points="4 11 8 15 16 6"></polyline>
                                                    </svg>
                                                </div>
                                                <span class="name">มิถุนายน</span>
                                                <span class="count">({{$month->m_num}})</span>
                                                <span class="clear"></span>
                                            </label>
                                            @elseif ($month->m_month === 7)
                                            <label for="month_{{ $month->m_month }}" class="label-cbx">
                                                <input id="month_{{ $month->m_month }}" value="{{ $month->m_month }}" type="checkbox" class="invisible month_checkbox">
                                                <div class="checkbox">
                                                    <svg width="20px" height="20px" viewBox="0 0 20 20">
                                                    <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                                                    <polyline points="4 11 8 15 16 6"></polyline>
                                                    </svg>
                                                </div>
                                                <span class="name">กรกฎาคม</span>
                                                <span class="count">({{$month->m_num}})</span>
                                                <span class="clear"></span>
                                            </label>
                                            @elseif ($month->m_month === 8)
                                            <label for="month_{{ $month->m_month }}" class="label-cbx">
                                                <input id="month_{{ $month->m_month }}" value="{{ $month->m_month }}" type="checkbox" class="invisible month_checkbox">
                                                <div class="checkbox">
                                                    <svg width="20px" height="20px" viewBox="0 0 20 20">
                                                    <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                                                    <polyline points="4 11 8 15 16 6"></polyline>
                                                    </svg>
                                                </div>
                                                <span class="name">สิงหาคม</span>
                                                <span class="count">({{$month->m_num}})</span>
                                                <span class="clear"></span>
                                            </label>
                                            @elseif ($month->m_month === 9)
                                            <label for="month_{{ $month->m_month }}" class="label-cbx">
                                                <input id="month_{{ $month->m_month }}" value="{{ $month->m_month }}" type="checkbox" class="invisible month_checkbox">
                                                <div class="checkbox">
                                                    <svg width="20px" height="20px" viewBox="0 0 20 20">
                                                    <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                                                    <polyline points="4 11 8 15 16 6"></polyline>
                                                    </svg>
                                                </div>
                                                <span class="name">กันยายน</span>
                                                <span class="count">({{$month->m_num}})</span>
                                                <span class="clear"></span>
                                            </label>
                                            @elseif ($month->m_month === 10)
                                            <label for="month_{{ $month->m_month }}" class="label-cbx">
                                                <input id="month_{{ $month->m_month }}" value="{{ $month->m_month }}" type="checkbox" class="invisible month_checkbox">
                                                <div class="checkbox">
                                                    <svg width="20px" height="20px" viewBox="0 0 20 20">
                                                    <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                                                    <polyline points="4 11 8 15 16 6"></polyline>
                                                    </svg>
                                                </div>
                                                <span class="name">ตุลาคม</span>
                                                <span class="count">({{$month->m_num}})</span>
                                                <span class="clear"></span>
                                            </label>
                                            @elseif ($month->m_month === 11)
                                            <label for="month_{{ $month->m_month }}" class="label-cbx">
                                                <input id="month_{{ $month->m_month }}" value="{{ $month->m_month }}" type="checkbox" class="invisible month_checkbox">
                                                <div class="checkbox">
                                                    <svg width="20px" height="20px" viewBox="0 0 20 20">
                                                    <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                                                    <polyline points="4 11 8 15 16 6"></polyline>
                                                    </svg>
                                                </div>
                                                <span class="name">พฤศจิกายน</span>
                                                <span class="count">({{$month->m_num}})</span>
                                                <span class="clear"></span>
                                            </label>
                                            @elseif ($month->m_month === 12)
                                            <label for="month_{{ $month->m_month }}" class="label-cbx">
                                                <input id="month_{{ $month->m_month }}" value="{{ $month->m_month }}" type="checkbox" class="invisible month_checkbox">
                                                <div class="checkbox">
                                                    <svg width="20px" height="20px" viewBox="0 0 20 20">
                                                    <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                                                    <polyline points="4 11 8 15 16 6"></polyline>
                                                    </svg>
                                                </div>
                                                <span class="name">ธันวาคม</span>
                                                <span class="count">({{$month->m_num}})</span>
                                                <span class="clear"></span>
                                            </label>
                                            @endif
                                        </div>
                                        @endforeach

                                    </div>
                                    <div id="expandToggleMonth" class="expand-toggle"><a href="javascript:void(0)" id="loadMoreMonth">ดูเพิ่มเติม <i class="fas fa-caret-down"></i></a></div>
                                </div>

                                <hr>

                                <div class="filter-countdate">
                                    <div class='filter-header'>
                                        <span class='filter-header-text'><i class="far fa-clock"></i> จำนวนวัน</span>
                                    </div>
                                    <div id="filter-countdate">
                                        <div class="option-all">
                                            <label for="day_all" class="label-cbx">
                                                <input id="day_all" type="checkbox" class="invisible" checked>
                                                <div class="checkbox">
                                                    <svg width="20px" height="20px" viewBox="0 0 20 20">
                                                    <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                                                    <polyline points="4 11 8 15 16 6"></polyline>
                                                    </svg>
                                                </div>
                                                <span>แสดงทั้งหมด</span>
                                            </label>
                                        </div>
                                        @foreach ($dayList as $day)
                                        <div class="option">
                                            <label for="day_{{ $day->duration }}" class="label-cbx">
                                                <input id="day_{{ $day->duration }}" value="{{ $day->duration }}" type="checkbox" class="invisible days_checkbox">
                                                <div class="checkbox">
                                                    <svg width="20px" height="20px" viewBox="0 0 20 20">
                                                    <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                                                    <polyline points="4 11 8 15 16 6"></polyline>
                                                    </svg>
                                                </div>
                                                <span class="name">{{ $day->duration }} วัน</span>
                                                <span class="count">({{$day->sum}})</span>
                                                <span class="clear"></span>
                                            </label>
                                        </div>
                                        @endforeach
                                    </div>
                                    <div id="expandToggleDates" class="expand-toggle"><a href="javascript:void(0)" id="loadMoreDates">ดูเพิ่มเติม <i class="fas fa-caret-down"></i></a></div>
                                </div>

                                <hr>

                                <div class="filter-airline">
                                    <div class='filter-header'>
                                        <span class='filter-header-text'><i class="far fa-paper-plane"></i> สายการบิน</span>
                                    </div>
                                    <div id="filter-airline">
                                        <div class="option-all">
                                            <label for="airline_all" class="label-cbx">
                                                <input id="airline_all" type="checkbox" class="invisible" checked>
                                                <div class="checkbox">
                                                    <svg width="20px" height="20px" viewBox="0 0 20 20">
                                                    <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                                                    <polyline points="4 11 8 15 16 6"></polyline>
                                                    </svg>
                                                </div>
                                                <span>แสดงทั้งหมด</span>
                                            </label>
                                        </div>
                                        @foreach ($airlineList as $airline)
                                        <div class="option">
                                            <label for="airline_{{ $airline->a_id }}" class="label-cbx">
                                                <input id="airline_{{ $airline->a_id }}" value="{{ $airline->a_name }}" type="checkbox" class="invisible airline_checkbox">
                                                <div class="checkbox">
                                                    <svg width="20px" height="20px" viewBox="0 0 20 20">
                                                    <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                                                    <polyline points="4 11 8 15 16 6"></polyline>
                                                    </svg>
                                                </div>
                                                <span class="name">{{ $airline->a_name }}</span>
                                                <span class="count">({{$airline->a_num}})</span>
                                                <span class="clear"></span>
                                            </label>
                                        </div>
                                        @endforeach

                                    </div>
                                    <div id="expandToggleAirline" class="expand-toggle"><a href="javascript:void(0)" id="loadMoreAirline">ดูเพิ่มเติม <i class="fas fa-caret-down"></i></a></div>
                                </div>


                                <!--                            end filter-bar-->                                                                           
                            </div>
                        </div> 
                    </div>

                    <!--                <div class="sidebar-title hidden-xs">
                                        <h3>ทัวร์ขายดี :</h3>
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
                                                            <img class="media-object lazy" src="{{ asset('images/tour/1-tour6.jpg')}}" 
                                                                 alt="ทัวร์ญี่ปุ่น โอไดบะ ขึ้นภูเขาไฟฟูจิ ชมทุ่งดอกลาเวนเดอร์ นมัสการและขอพรวัดนาริตะและวัดอาซากุสะ" style="display: inline-block;">
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <h6 class="media-heading">
                                                            <a href="" title="">ทัวร์ญี่ปุ่น ออนเซน ภูเขาไฟฟูจิ ชมดอกไม้บาน...</a>
                                                        </h6>
                                                        <div class="peroid">เริ่มเดินทาง 10 ต.ค. 61</div>
                                                        <div class="price"><span>20,900</span> บาท</div>
                                                    </div>                                        
                                                </div>
                                            </div>
                    
                                            <div class="tour-left-bar-item">
                                                <div class="media">
                                                    <div class="media-left">
                                                        <a href="" title="">
                                                            <img class="media-object lazy" src="{{ asset('images/tour/1-tour1.jpg')}}" 
                                                                 alt="ทัวร์ญี่ปุ่น โอไดบะ ขึ้นภูเขาไฟฟูจิ ชมทุ่งดอกลาเวนเดอร์ นมัสการและขอพรวัดนาริตะและวัดอาซากุสะ" style="display: inline-block;">
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <h6 class="media-heading">
                                                            <a href="" title="">ทัวร์ญี่ปุ่น วัดฟุกุสึ เที่ยวชมซากุระบาน...</a>
                                                        </h6>
                                                        <div class="peroid">เริ่มเดินทาง 30 ธ.ค. 61</div>
                                                        <div class="price"><span>48,000</span> บาท</div>
                                                    </div>                                        
                                                </div>
                                            </div>
                                        </div>
                                    </div>-->

                </div>
            </div>
        </div>
        <!--                    bar ขวา-->
        <div class="col-md-3 hidden-sm hidden-xs">
            <div class="page-sidebar sidebar-3">
                @if (count($attractionList) > 0)
                <div class="sidebar-title">
                    <h3><i class="far fa-star"></i> กิจกรรมยอดนิยม</h3>
                </div>
                <div class="right-bar">
                    <div class="box-content">
                        @foreach ($attractionList as $attraction)
                        <div class="tour-left-bar-item">
                            <div class="media">
                                <div class="media-left">
                                    <a href="{{url('/tour/'.$attraction->attraction_url)}}" title="{{$attraction->a_name}}">
                                        <img class="media-object lazy" src="{{ asset('/images/attraction/'.$attraction->attraction_picture) }}" 
                                             alt="" style="display: inline-block;">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h6 class="media-heading">
                                        <a href="{{url('/tour/'.$attraction->attraction_url)}}" title="">{{$attraction->a_name}} ({{$attraction->a_num}})</a>
                                    </h6>
                                </div>                                        
                            </div>
                        </div>
                        @endforeach
                    </div>    
                </div>
                @endif

                @if (count($tagList) > 0)
                <div class="sidebar-title">
                    <h3><i class="fa fa-tags"></i> Tags</h3>         
                </div>
                <div class="left-bar2">
                    <div class="box-content">
                        <div class="swiper-wrapper tour-local-nav" style="transform: translate3d(0px, 0px, 0px);">
                            @foreach ($tagList as $tag)
                            <div class="swiper-slide local-nav-item" style="margin-right: 10px;">
                                <a href="{{url('/tour/'.$tag->tag_url)}}" title="" class="">{{$tag->t_name}}</a>
                            </div>
                            @endforeach                                
                        </div> 
                    </div>
                </div>
                @endif
            </div>
        </div>

    </div>
</section>
@stop

@section('footer_scripts')
<script>
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
    var price_most = <?php echo json_encode($price_most); ?>;
</script>
<script type="text/javascript" src="{{ asset('js/filter/search-tour.js') }}"></script>
<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
@endsection