@extends('layout.main')
@section('page_title','บทความ')
@section('main-content')

<style>
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

    
</style>    

<section class="article-content-cover">

        <div class="content-cover-img">
            <div class="content-cover-text layer">
                <h1>ประเทศญี่ปุ่น</h1>
                <h2>4 เส้นทางปีนภูเขาไฟฟูจิ วิวดี ชีวิตนี้ต้องไปให้ได้ซักครั้ง</h2>
            </div>
        </div>

</section>

@stop
@section('footer_scripts')
@endsection