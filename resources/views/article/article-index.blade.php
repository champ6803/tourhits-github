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
        <?php
        $i = 0;
        $rows = ceil(count($articleList) / 4);
        ?>
        <?php for ($i = 0; $i < $rows; $i++) { ?>
            <div class="row">
                <?php for ($j = ($i * 4); $j < (($i * 4) + 4 > count($articleList) ? count($articleList) : ($i * 4) + 4); $j++) { ?>
                    <div class="col-sm-6 col-md-3">
                        <div class="article-card">
                            <div class="article-card-cover">
                                <a href="{{ url('article-content?id='.$articleList[$j]->article_id) }}" title="">
                                    <img src="{{asset('images/article-img/'.$articleList[$j]->article_image)}}" class="" alt="" scale="0">
                                </a>
                            </div>
                            <div class="article-card-content">
                                <a href="{{ url('article-content?id='.$articleList[$j]->article_id) }}" title="">
                                    {{ $articleList[$j]->article_title }}
                                </a>
                                <div class="article-card-date">
                                    <i class="far fa-clock"></i><?php echo date('d-m-Y', strtotime($articleList[$j]->created_date)); ?>
                                </div>
                            </div>
                        </div> 
                    </div>
                <?php } ?>
            </div>
        <?php } ?>

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