@extends('layout.main')
@section('page_title','บทความ')
@section('main-content')

<style>
    @media screen and (min-width: 320px) and (max-width: 990px) {
/*        #fix-col {clear: both;}*/        
        .article-index-content .container .col-sm-6:nth-child(3){
            clear: both;
        }
    }   
</style>    

<section class="article-index-cover">

        <div class="index-cover-img">
            <div class="index-cover-text">
                <h1>บทความ</h1>
                <h2>บทความท่องเที่ยวจากทั่วทุกมุมโลก</h2>
            </div>
        </div>

</section>

<section class="article-index-content">
    
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-3">
                    <div class="article-card">
                        <div class="article-card-cover">
                            <a href="{{ url('article-content') }}" title="">
                                <img src="{{asset('images/article-img/japan-0.jpg')}}" class="" alt="" scale="0">
                            </a>
                        </div>
                        <div class="article-card-content">
                            <a href="" title="">
                               10 ชายหาดแนะนำซัมเมอร์นี้ที่ญี่ปุ่น ใครว่าหาดที่ญี่ปุ่นไม่สวย บทความนี้อาจเปลี่ยนความคิดคุณไปโดยสิ้นเชิง
                            </a>
                            <div class="article-card-date">
                                <i class="far fa-clock"></i>31 ตุลาคม 2562
                            </div>
                        </div>
                    </div> 
                </div> 
                
                <div class="col-sm-6 col-md-3">
                    <div class="article-card">
                        <div class="article-card-cover">
                            <a href="{{ url('article-content') }}" title="">
                                <img src="{{asset('images/article-img/japan-1.jpg')}}" class="" alt="" scale="0">
                            </a>
                        </div>
                        <div class="article-card-content">
                            <a href="" title="">
                               5 เทศกาลหน้าร้อนญี่ปุ่น ที่จะทำให้คุณหลงไหลในมนต์เสน่ห์ความเป็นญี่ปุ่นแท้ๆ แบบไม่รู้ลืม
                            </a>
                            <div class="article-card-date">
                                <i class="far fa-clock"></i>27 ตุลาคม 2562
                            </div>
                        </div>
                    </div>
                </div>
            
                <div class="col-sm-6 col-md-3">
                    <div class="article-card">
                        <div class="article-card-cover">
                             <a href="{{ url('article-content') }}" title="">
                                <img src="{{asset('images/article-img/japan.jpg')}}" class="" alt="" scale="0">
                            </a>
                        </div>
                        <div class="article-card-content">
                            <a href="" title="">
                               4 เส้นทางปีนภูเขาไฟฟูจิ วิวดี ชีวิตนี้ต้องไปให้ได้ซักครั้ง
                            </a>
                            <div class="article-card-date">
                                <i class="far fa-clock"></i>25 ตุลาคม 2562
                            </div>
                        </div>
                            
                    </div>
                </div> 
                
                <div class="col-sm-6 col-md-3">
                    <div class="article-card">
                        <div class="article-card-cover">
                             <a href="{{ url('article-content') }}" title="">
                                <img src="{{asset('images/article-img/switzerland.jpg')}}" class="" alt="" scale="0">
                            </a>
                        </div>
                        <div class="article-card-content">
                            <a href="" title="">
                               15 เมืองน่าเที่ยวหน้าหนาวในสวิส เที่ยวให้มิด พิชิตยอดเขา เข้าถึงวัฒนธรรม จดจำประทับใจ!
                            </a>
                            <div class="article-card-date">
                             <i class="far fa-clock"></i>24 ตุลาคม 2562
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-3">
                    <div class="article-card">
                        <div class="article-card-cover">
                             <a href="{{ url('article-content') }}" title="">
                                <img src="{{asset('images/article-img/paris.jpg')}}" class="" alt="" scale="0">
                            </a>
                        </div>
                        <div class="article-card-content">
                            <a href="" title="">
                               10 ชายหาดแนะนำซัมเมอร์นี้ที่ญี่ปุ่น ใครว่าหาดที่ญี่ปุ่นไม่สวย บทความนี้อาจเปลี่ยนความคิดคุณไปโดยสิ้นเชิง
                            </a>
                            <div class="article-card-date">
                                <i class="far fa-clock"></i>31 ตุลาคม 2562
                            </div>
                        </div>
                    </div> 
                </div> 
                
                <div class="col-sm-6 col-md-3">
                    <div class="article-card">
                        <div class="article-card-cover">
                             <a href="{{ url('article-content') }}" title="">
                                <img src="{{asset('images/article-img/china.jpg')}}" class="" alt="" scale="0">
                            </a>
                        </div>
                        <div class="article-card-content">
                            <a href="" title="">
                               5 เทศกาลหน้าร้อนญี่ปุ่น ที่จะทำให้คุณหลงไหลในมนต์เสน่ห์ความเป็นญี่ปุ่นแท้ๆ แบบไม่รู้ลืม
                            </a>
                            <div class="article-card-date">
                                <i class="far fa-clock"></i>27 ตุลาคม 2562
                            </div>
                        </div>
                    </div>
                </div>
            
                <div class="col-sm-6 col-md-3">
                    <div class="article-card">
                        <div class="article-card-cover">
                             <a href="{{ url('article-content') }}" title="">
                                <img src="{{asset('images/article-img/soul.jpg')}}" class="" alt="" scale="0">
                            </a>
                        </div>
                        <div class="article-card-content">
                            <a href="" title="">
                               4 เส้นทางปีนภูเขาไฟฟูจิ วิวดี ชีวิตนี้ต้องไปให้ได้ซักครั้ง
                            </a>
                            <div class="article-card-date">
                                <i class="far fa-clock"></i>25 ตุลาคม 2562
                            </div>
                        </div>
                            
                    </div>
                </div> 
                
                <div class="col-sm-6 col-md-3">
                    <div class="article-card">
                        <div class="article-card-cover">
                             <a href="{{ url('article-content') }}" title="">
                                <img src="{{asset('images/article-img/thailand.jpg')}}" class="" alt="" scale="0">
                            </a>
                        </div>
                        <div class="article-card-content">
                             <a href="{{ url('article-content') }}" title="">
                               15 เมืองน่าเที่ยวหน้าหนาวในสวิส เที่ยวให้มิด พิชิตยอดเขา เข้าถึงวัฒนธรรม จดจำประทับใจ!
                            </a>
                            <div class="article-card-date">
                             <i class="far fa-clock"></i>24 ตุลาคม 2562
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>

    <div class="container">
        <div class="row card_show">
            <div class="col-md-12">
                 <ul class="pagination" id="search_tour_pager"></ul>
            </div>
        </div>
    </div>
    
</section>

@stop
@section('footer_scripts')
<script type="text/javascript" src="{{asset('js/article/article-index.js')}}"></script>
@endsection