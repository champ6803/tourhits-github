@extends('layout.main')
@section('page_title','บทความ')
@section('main-content')

<style>

    @media screen and (max-width: 990px) {
        .article-content-bottom .article-card .article-card-content a{
            font-size: 14px;
        }

        .article-content-bottom .article-card .article-card-cover img{
            max-height: 105px;
        }    
    }


    .article-content-cover .content-cover-img{
        display: block;
        z-index: -99;
        background-image: url("{{asset('images/article-img/japan.jpg')}}");         
        background-size: cover;
        background-position: center;
        width: 100%;
        height: 250px;
        background-color: #000;
        overflow: hidden;
    }

    .layer {
        background-color: rgba(0,0, 0, 0.3);
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }

    /*    .article-social-share{
            position: absolute;
         width: 100%; 
         top: 50%; 
         transform: translateY(-50%); 
        }*/

    .article-social-share .item-shared{
        position: absolute;
        right:10px;
        top: 10px;
        z-index: 999;
    }

    .article-social-share .item-shared .article-line-shared{
        float: left;
        padding-right: 10px;
    }


    .article-social-share .article-line-shared img{
        height: 28px;
    }

</style>    

<section class="article-content-cover">

    <div class="content-cover-img">
        <div class="content-cover-text layer">
            <h1>ประเทศญี่ปุ่น</h1>
            <h2>4 เส้นทางปีนภูเขาไฟฟูจิ วิวดี ชีวิตนี้ต้องไปให้ได้ซักครั้ง</h2>
        </div>
    </div>

</section>

<section class="article-social-share">
    <div class="container">
        <div class="item-shared">
            <!--            แชร์ไลน์ ต้องแก้ลิ้ง url-->
            <div class="article-line-shared">
                <a href="https://social-plugins.line.me/lineit/share?url=http://localhost:8000/article-content" target="_blank">
                    <img src="{{asset('images/icon/share-a.png')}}" class="" alt="">
                </a>
            </div>
            <!--            แชร์facebook ต้องแก้ลิ้ง url-->
            <div class="fb-share-button" data-href="http://localhost:8000/article-content" data-layout="button_count" data-size="large" data-mobile-iframe="true">
                <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Flocalhost%3A8000%2Farticle-content&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore"></a>
            </div>
        </div>
    </div>
</section>

<section class="article-content">

    <div class="container">
        <div class="article-content-date">
            <i class="far fa-clock"></i>27 ตุลาคม 2562
        </div>

        <div class="article-content-head">
            <p>4 เส้นทางปีนภูเขาไฟฟูจิ วิวดี ชีวิตนี้ต้องไปให้ได้ซักครั้ง</p>
        </div>

        <div class="article-content-text">
            <p>4 เส้นทางปีนภูเขาไฟฟูจิ ที่มีดีต่างกัน ภูเขาไฟฟูจิ สูง 3776 เมตรจากระดับน้ำทะเล ฟูจิคือ ภูเขาที่สูงที่สุดของประเทศญี่ปุ่น และจัดเป็นสัญญลักษณ์ของประเทศญี่ปุ่นที่จะสร้างความประทับใจต่อผู้มาเยือน และสร้างความทรงจำต่อนักท่องเที่ยวและนักปีนเขาไม่รู้ลืมตลอดชีวิตเลยทีเดียว ภูเขาแห่งนี้จะน่าสนใจยิ่งกว่าหากได้สัมผัสแบบใกล้ๆยิ่งขึ้นขึ้น มุมมองในวันที่อากาศแจ่มใสและประสบการณ์การปีนเขาในช่วงเช้าตรู่ ท่ามกลางผู้ร่วมเดินทางไกลหลายพันคน ที่มีใจรักการปีนเขาอย่างจริงจังจากทั่วโลก ก็เป็นสิ่งที่คุ้มค่ามากที่ได้มาใช้เวลาในช่วงฤดูร้อนเพื่อมาสัมผัสสัญญลักษณ์ของญี่ปุ่นอย่างเข้าถึงแบบสุดๆ
                4 เส้นทางปีนภูเขาไฟฟูจิ เปิดให้ปีนภูเขาเมื่อไหร่ มีเส้นทางไหนบ้าง และเราควรเตรียมตัวอย่างไร ก่อนไปชมวิวสวยๆของฟูจิ ยามเช้ามืดที่สวยงาม</p>
        </div>
    </div>

</section>

<section class="article-content-bottom article-index-content">

    <div class="container">
        <div class="head">
            <p>บทความอื่นๆของเรา</p>
        </div>
        <div class="row">
            <div class="article-button-next next"><i class="fa fa-angle-right"></i></div>
            <div class="article-button-prev swiper-button-disabled prev"><i class="fa fa-angle-left"></i></div>
        </div>

        <div class="row">

            <div id="owl-demo-article" class="owl-carousel owl-theme">

                <div class="item">
                    <div class="article-card">
                        <div class="article-card-cover">
                            <a href="" title="">
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
                <div class="item">
                    <div class="article-card">
                        <div class="article-card-cover">
                            <a href="" title="">
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
                <div class="item">
                    <div class="article-card">
                        <div class="article-card-cover">
                            <a href="" title="">
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
                <div class="item">
                    <div class="article-card">
                        <div class="article-card-cover">
                            <a href="" title="">
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
                <div class="item">
                    <div class="article-card">
                        <div class="article-card-cover">
                            <a href="" title="">
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
                <div class="item">
                    <div class="article-card">
                        <div class="article-card-cover">
                            <a href="" title="">
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
                <div class="item">
                    <div class="article-card">
                        <div class="article-card-cover">
                            <a href="" title="">
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

            </div>
        </div>
    </div>

</section>

@stop
@section('footer_scripts')
<script type="text/javascript">
    $(document).ready(function () {

        var owl = $("#owl-demo-article");

        owl.owlCarousel({
            items: 4, //5 items above 1000px browser width


            loop: true,
            autoPlay: 6000,
            stopOnHover: true,
            pagination: false,
            margin: 5,
            transitionStyle: "fade",
            itemsDesktop: [1199, 3],
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

</script>

<div id="fb-root"></div>
<script>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id))
            return;
        js = d.createElement(s);
        js.id = id;
        js.src = 'https://connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v3.2';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>

<script src="https://d.line-scdn.net/r/web/social-plugin/js/thirdparty/loader.min.js" async="async" defer="defer"></script>
<script type="text/javascript" src="{{asset('js/article/article-content.js')}}"></script>
@endsection