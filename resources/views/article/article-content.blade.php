@extends('layout.main')
@section('page_title','บทความ')
@section('meta_tag')
<!-- Open Graph data -->
        <meta property="og:title" content="{{ $articleDetailList[0]->article_title }}" />
        <meta property="og:type" content="article" />
        <!--<meta property="og:url" content="http://www.tourhitsthai.com/article-content?id=4" />-->
        <meta property="og:image" content="http://www.tourhitsthai.com/images/article-img/{{ $articleDetailList[0]->article_image }}" />
        <!--<meta property="og:description" content="<?php echo $articleDetailList[0]->article_detail_name ?>" />-->
        <meta property="og:site_name" content="Tourhits" />
        <meta property="article:published_time" content="<?php echo date('d-m-Y', strtotime($articleDetailList[0]->created_date)); ?>" />
        <!--<meta property="article:modified_time" content="2013-09-16T19:08:47+01:00" />-->
        <meta property="article:section" content="Article Section" />
        <meta property="article:tag" content="{{ $articleDetailList[0]->article_title }}" />
        <!--<meta property="fb:admins" content="Facebook numberic ID" />-->
@endsection
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
        display: flex;
    }

    .article-social-share .item-shared .article-line-shared{
/*        float: left;*/
       padding-right: 10px;
    }


    .article-social-share .article-line-shared img{
        height: 28px;
    }

</style>    


<!--<section class="article-content-cover">

    <div class="content-cover-img">
        <div class="content-cover-text layer">
            <h1>บทความ</h1>
            <h1> {{ $articleDetailList[0]->article_title }} </h1>
        </div>
    </div>

</section>-->

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
        
        <div class="article-content-head">
            <p>{{ $articleDetailList[0]->article_title }}</p>
        </div>
        <div class="article-content-short">
           <?php echo $articleDetailList[0]->article_short_detail ?>
        </div>
        <div class="article-content-date">
            <i class="far fa-clock"></i><?php echo date('d-m-Y', strtotime($articleDetailList[0]->created_date)); ?>
        </div>
       
        <div style="padding: 0;" class="article-content-date">
            <img style="width:100%; padding: 0;" src="../images/article-img/{{ $articleDetailList[0]->article_image }}">
        </div>
        
        <div class="article-content-text">
           <?php echo $articleDetailList[0]->article_detail_name ?>
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
                @foreach($articleList as $article)
                <div class="item">
                    <div class="article-card">
                        <div class="article-card-cover">
                            <a href="" title="">
                                <img src="{{asset('images/article-img/'.$article->article_image)}}" class="" alt="" scale="0">
                            </a>
                        </div>
                        <div class="article-card-content">
                            <a href="" title="">
                                {{ $article->article_title }}
                            </a>
                            <div class="article-card-date">
                                <i class="far fa-clock"></i><?php echo date('d-m-Y', strtotime($article->created_date)); ?>
                            </div>
                        </div>
                    </div> 
                </div>
                @endforeach


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