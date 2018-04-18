@extends('layout.main')
@section('page_title','สถานที่ยอดฮิต')
@section('main-content')
<style>
    
    @media (min-width: 768px){
/*    .hothits-section{
        margin-left: 16px;}*/
    }
    
    .hothits-item{
        max-width: 280px;
        position: relative;
        box-shadow: 0px 0px 6px rgba(0,0,0,0.25);
        margin: 10px 10px 10px 0px;
        margin-left: auto;
        margin-right: auto;
    }
    
    .hothits-name-box {
    position: absolute;
    left: 0;
    top: 20px;
    background: rgba(226, 29, 44, .8);
    box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.2);
    }
    
    .hothits-name-box .text {
    color: #ffffff;
    padding: 3px 10px 2px 10px;
    font-size: 20px; 
    }
    
    .hothits-img {
    overflow: hidden;
    height: 200px;
    }  
    
    .center-crop {
         max-width: 280px;
         overflow:hidden;  
    }  
    
    .hothits-detail {
    background: #d30000;
    color: #fff;
    font-size: 17px;
    height: 100px;
    line-height: 20px;
    padding: 10px;
/*    text-align: justify;*/
    overflow: hidden;
    text-overflow: ellipsis;
    }
    
    .tour-description {
    padding: 8px 5px;
    min-height: 65px;
    background: #fff;
    }
    
    .tour-description .tour-price {
    color: #d30000;
    font-size: 25px;
    text-align: right;
    position: absolute;
    
    right: 0;
    padding: 0px 20px;
    line-height: 2;
/*    text-shadow: 0px 1px 5px rgba(0,0,0,0.1);*/
    }
    
    .tour-description .tour-airline-logo {
    max-width: 110px;
    margin-top: 5px; }
    
    .tour-description .num-pack-here{
       color: #d30000;
       font-size: 30px;
       font-weight: 500;
       text-align: center;
       position: absolute;
       bottom: 0;
       left: 0;
       padding: 10px 10px; 
    }
    
    .tour-description .tour-price small.strike {
    line-height: 27px;
    color: #999;}
    
    .tour-description .tour-price small {
    color: #999;
    font-size: 20px;
    line-height: 24px;
    display: block;
    }
    
    .tour-description .strike {
    position: relative;
    }
    
    .hothits-item a .hothits-img .center-crop img{
       min-height: 200px!important;
       width: 100%;    
        
      -moz-transition: all 0.7s;
      -webkit-transition: all 0.7s;
      -transition: all 0.7s;
    }
      
    .hothits-item a .hothits-img .center-crop img:hover{
        -moz-transform: scale(1.1);
        -webkit-transform: scale(1.1);
        transform: scale(1.2);
        opacity: 0.7;
    }
    
    
</style>
    <!-- BREADCRUMB -->
<!--        <section>
            <div class="container">
                <div class="breadcrumb">
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Destinations</a></li>                        
                        <li><span>สถานที่ยอดฮิต</span></li>
                    </ul>
                </div>
            </div>
        </section>-->
        <!-- BREADCRUMB -->

        <section class="hothits-section">
            <div class="container-hothits">
         
                <div class="hothits-cover-all">
                    <div class="hothits-cover" style="margin-left:16px;">
                        <div class="hothits-cover-img" style="background-image: url(&quot;https://images.unsplash.com/photo-1466051764869-02218eeb1fa5?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=678d990346bef090dde43652de0731ee&auto=format&fit=crop&w=500&q=60;);" data-reactid="">
                            <a class="hothits-country-name" title="" href="" data-reactid="">ญี่ปุ่น</a>
                        </div>
                    </div>
                    
                    <div class="hothits-cover">
                        <div class="hothits-cover-img" style="background-image: url(&quot;https://images.unsplash.com/photo-1474181487882-5abf3f0ba6c2?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=cf44488039b7a87e6ae039375d8dc094&auto=format&fit=crop&w=500&q=60;);" data-reactid="">
                            <a class="hothits-country-name" title="" href="" data-reactid="">จีน</a>
                        </div>                                     
                    </div>
                    
                    <div class="hothits-cover">
                        <div class="hothits-cover-img" style="background-image: url(&quot;https://images.unsplash.com/photo-1493707553966-283afac8c358?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=d9b329925fa0c2c554debff4f2cd6d30&auto=format&fit=crop&w=500&q=60;);" data-reactid="">
                            <a class="hothits-country-name" title="" href="" data-reactid="">ยุโรป</a>
                        </div>                                     
                    </div>
                    
                    <div class="hothits-cover">
                        <div class="hothits-cover-img" style="background-image: url(&quot;https://images.unsplash.com/photo-1519222588400-47f6bea38294?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=dc0077daebb63d648cc5bdf8b314f4d5&auto=format&fit=crop&w=500&q=60;);" data-reactid="">
                            <a class="hothits-country-name" title="" href="" data-reactid="">ฮ่องกง</a>
                        </div>                                     
                    </div>
                    
                    <div class="hothits-cover">
                        <div class="hothits-cover-img" style="background-image: url(&quot;https://images.unsplash.com/photo-1523131992001-c485ccc0d326?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=790dc6ba6ec1f7b5bc95cb025e6ce5ed&auto=format&fit=crop&w=500&q=60;);" data-reactid="">
                            <a class="hothits-country-name" title="" href="" data-reactid="">พม่า</a>
                        </div>                                     
                    </div>
                                       
                    <div class="hothits-cover">
                        <div class="hothits-cover-img" style="background-image: url(&quot;https://images.unsplash.com/photo-1515975325863-a4ceb4b7d6c0?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=9589db82eb05383f9a0983dbd9f9906b&auto=format&fit=crop&w=500&q=60;);" data-reactid="">
                            <a class="hothits-country-name" title="" href="" data-reactid="">ไต้หวัน</a>
                        </div>                                     
                    </div>
                    
                    <div class="hothits-cover">
                        <div class="hothits-cover-img" style="background-image: url(&quot;https://images.unsplash.com/photo-1505881502353-a1986add3762?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=79770836c467adb5a78c392855fb1557&auto=format&fit=crop&w=500&q=60;);" data-reactid="">
                            <a class="hothits-country-name" title="" href="" data-reactid="">มัลดีฟ</a>
                        </div>                                     
                    </div>
                    
                    <div class="hothits-cover">
                        <div class="hothits-cover-img" style="background-image: url(&quot;https://images.unsplash.com/photo-1516264665768-5525834929bf?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=3eaa201fe57a46b1ec8bb8411d90b906&auto=format&fit=crop&w=500&q=60;);" data-reactid="">
                            <a class="hothits-country-name" title="" href="" data-reactid="">เกาหลี</a>
                        </div>                                     
                    </div>
                    
                    <div class="hothits-cover">
                        <div class="hothits-cover-img" style="background-image: url(&quot;https://images.unsplash.com/photo-1509957296319-3473fa3828a0?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=9df69c2b19d823fa31b84e644d7522d3&auto=format&fit=crop&w=500&q=60;);" data-reactid="">
                            <a class="hothits-country-name" title="" href="" data-reactid="">เวียดนาม</a>
                        </div>                                     
                    </div>
                    
                    <div class="hothits-cover">
                        <div class="hothits-cover-img" style="background-image: url(&quot;https://images.unsplash.com/photo-1490105171842-5fab28613c56?ixlib=rb-0.3.5&s=7d74b890cf2f3ab6145bd1c74539d198&auto=format&fit=crop&w=500&q=60;);" data-reactid="">
                            <a class="hothits-country-name" title="" href="" data-reactid="">สิงคโปร์</a>
                        </div>                                     
                    </div>
                                       
                    <div class="hothits-cover">
                        <div class="hothits-cover-img" style="background-image: url(&quot;https://images.unsplash.com/photo-1513326738677-b964603b136d?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=fce300c2a97366451fee4528e72bf3dd&auto=format&fit=crop&w=500&q=60;);" data-reactid="">
                            <a class="hothits-country-name" title="" href="" data-reactid="">รัสเซีย</a>
                        </div>                                     
                    </div>
                    
                    <div class="hothits-cover">
                        <div class="hothits-cover-img" style="background-image: url(&quot;https://images.unsplash.com/photo-1500640925231-1eaeae0e78fd?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=eb2438b17a116a77f09936c515c595cd&auto=format&fit=crop&w=500&q=60;);" data-reactid="">
                            <a class="hothits-country-name" title="" href="" data-reactid="">ลาว</a>
                        </div>                                     
                    </div>
                    
                    <div class="hothits-cover">
                        <div class="hothits-cover-img" style="background-image: url(&quot;https://images.unsplash.com/photo-1520874628750-bed9c0a19086?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=e8bbf6a9f505c5b006b2d5671422eb52&auto=format&fit=crop&w=500&q=60;);" data-reactid="">
                            <a class="hothits-country-name" title="" href="" data-reactid="">อิตาลี</a>
                        </div>                                     
                    </div>
                    
                    <div class="hothits-cover">
                        <div class="hothits-cover-img" style="background-image: url(&quot;https://images.unsplash.com/photo-1509358033937-2784de2bfed8?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=6035789c1a204378ae8419c2e84f8783&auto=format&fit=crop&w=500&q=60;);" data-reactid="">
                            <a class="hothits-country-name" title="" href="" data-reactid="">ออสเตรีย</a>
                        </div>                                     
                    </div>
                    
                    <div class="hothits-cover">
                        <div class="hothits-cover-img" style="background-image: url(&quot;https://images.unsplash.com/photo-1449265614232-03dfc33163a0?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=0510dd0b1a58f623b8991b8fd9fe240c&auto=format&fit=crop&w=500&q=60;);" data-reactid="">
                            <a class="hothits-country-name" title="" href="" data-reactid="">ฝรั่งเศส</a>
                        </div>                                     
                    </div>
                                       
                    <div class="hothits-cover">
                        <div class="hothits-cover-img" style="background-image: url(&quot;https://images.unsplash.com/photo-1448400025760-7c27c7b9e3c4?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=4a418e400bae02cc9f69f10d53c46401&auto=format&fit=crop&w=500&q=60;);" data-reactid="">
                            <a class="hothits-country-name" title="" href="" data-reactid="">สวิส</a>
                        </div>                                     
                    </div>
                    
                    <div class="hothits-cover">
                        <div class="hothits-cover-img" style="background-image: url(&quot;https://images.unsplash.com/photo-1512734532361-927fee81296c?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=92f82d35047375c1a015ba53b06f56b3&auto=format&fit=crop&w=500&q=60;);" data-reactid="">
                            <a class="hothits-country-name" title="" href="" data-reactid="">เยอรมัน</a>
                        </div>                                     
                    </div>
                    
                    <div class="hothits-cover">
                        <div class="hothits-cover-img" style="background-image: url(&quot;https://images.unsplash.com/photo-1505192392652-30565b158d09?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=a42e0163de3189e81fb2a5ae39cd0a76&auto=format&fit=crop&w=500&q=60;);" data-reactid="">
                            <a class="hothits-country-name" title="" href="" data-reactid="">มาเก๊า</a>
                        </div>                                     
                    </div>
                    
                    <div class="hothits-cover">
                        <div class="hothits-cover-img" style="background-image: url(&quot;https://images.unsplash.com/photo-1482790197944-0bd99292659b?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=49285ca5bb3523da1a30fa1b708441b7&auto=format&fit=crop&w=500&q=60;);" data-reactid="">
                            <a class="hothits-country-name" title="" href="" data-reactid="">ดูไบ</a>
                        </div>                                     
                    </div>
                    
                    <div class="hothits-cover">
                        <div class="hothits-cover-img" style="background-image: url(&quot;https://images.unsplash.com/photo-1504682213184-3082b2bc5c3a?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=27511b6b9a3c833fcc67b9df730abf21&auto=format&fit=crop&w=500&q=60;);" data-reactid="">
                            <a class="hothits-country-name" title="" href="" data-reactid="">ออสเตรเลีย</a>
                        </div>                                     
                    </div>
                                       
                    <div class="hothits-cover">
                        <div class="hothits-cover-img" style="background-image: url(&quot;https://images.unsplash.com/photo-1502091094786-a83d1eaa36e7?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=b9aa4d306bdd71d9c3e065d325cec569&auto=format&fit=crop&w=500&q=60;);" data-reactid="">
                            <a class="hothits-country-name" title="" href="" data-reactid="">อียิปต์</a>
                        </div>                                     
                    </div>
                    
                    <div class="hothits-cover">
                        <div class="hothits-cover-img" style="background-image: url(&quot;https://images.unsplash.com/photo-1507415953574-2aadbf10e38a?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=771b324d28585ce6a270c431e4f39a01&auto=format&fit=crop&w=500&q=60;);" data-reactid="">
                            <a class="hothits-country-name" title="" href="" data-reactid="">สเปน</a>
                        </div>                                     
                    </div>
                    
                    <div class="hothits-cover">
                        <div class="hothits-cover-img" style="background-image: url(&quot;https://images.unsplash.com/photo-1519139152854-41679baacb21?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=3aadb460ca542c4119b87c66a00a670e&auto=format&fit=crop&w=500&q=60;);" data-reactid="">
                            <a class="hothits-country-name" title="" href="" data-reactid="">ฟินแลนด์</a>
                        </div>                                     
                    </div>
                    
                    <div class="hothits-cover">
                        <div class="hothits-cover-img" style="background-image: url(&quot;https://images.unsplash.com/photo-1523428461295-92770e70d7ae?ixlib=rb-0.3.5&s=9db580d00d5802e57daea2561b05ef57&auto=format&fit=crop&w=500&q=60;);" data-reactid="">
                            <a class="hothits-country-name" title="" href="" data-reactid="">อินเดีย</a>
                        </div>                                     
                    </div>
                    
                    <div class="hothits-cover">
                        <div class="hothits-cover-img" style="background-image: url(&quot;https://images.unsplash.com/photo-1491252476179-5f2566566ab8?ixlib=rb-0.3.5&s=5155553f0fdd2d61975c35eeb9c6ae17&auto=format&fit=crop&w=500&q=60;);" data-reactid="">
                            <a class="hothits-country-name" title="" href="" data-reactid="">ตุรกี</a>
                        </div>                                     
                    </div>
                                       
                    <div class="hothits-cover">
                        <div class="hothits-cover-img" style="background-image: url(&quot;https://images.unsplash.com/photo-1506868700978-15f92feaa723?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=e6ccc6e915515dfd061f1c7a4cac488e&auto=format&fit=crop&w=500&q=60;);" data-reactid="">
                            <a class="hothits-country-name" title="" href="" data-reactid="">อินโดนีเซีย</a>
                        </div>                                     
                    </div>
                    
                    <div class="hothits-cover">
                        <div class="hothits-cover-img" style="background-image: url(&quot;https://images.unsplash.com/photo-1516749744210-1981409bd921?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=e63a4c0cf7913028f67fd4484835f1cf&auto=format&fit=crop&w=500&q=60;);" data-reactid="">
                            <a class="hothits-country-name" title="" href="" data-reactid="">แอฟริกาใต้</a>
                        </div>                                     
                    </div>
                    
                    <div class="hothits-cover">
                        <div class="hothits-cover-img" style="background-image: url(&quot;https://images.unsplash.com/photo-1486608766848-9b9fe0c37b9d?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=b18e2352c5e3a493882f03e337d3ec81&auto=format&fit=crop&w=500&q=60;);" data-reactid="">
                            <a class="hothits-country-name" title="" href="" data-reactid="">เนเธอร์แลนด์</a>
                        </div>                                     
                    </div>
                    
                    <div class="hothits-cover">
                        <div class="hothits-cover-img" style="background-image: url(&quot;https://images.unsplash.com/photo-1508247489384-8a5d237ac250?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=e614fa91a779151185dd42899c9639ce&auto=format&fit=crop&w=500&q=60;);" data-reactid="">
                            <a class="hothits-country-name" title="" href="" data-reactid="">นอร์เวย์</a>
                        </div>                                     
                    </div>
                    
                    <div class="hothits-cover">
                        <div class="hothits-cover-img" style="background-image: url(&quot;https://images.unsplash.com/photo-1521298952602-fe6019e6acf2?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=5a2c98b9a53c877a24c3be51bd7839f3&auto=format&fit=crop&w=500&q=60;);" data-reactid="">
                            <a class="hothits-country-name" title="" href="" data-reactid="">โปแลนด์</a>
                        </div>                                     
                    </div>
                                       
                    <div class="hothits-cover">
                        <div class="hothits-cover-img" style="background-image: url(&quot;https://images.unsplash.com/photo-1492584328860-c0c7bb599679?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=781e0302ba8a58491a6106ae5c668e9e&auto=format&fit=crop&w=500&q=60;);" data-reactid="">
                            <a class="hothits-country-name" title="" href="" data-reactid="">เนปาล</a>
                        </div>                                     
                    </div>
<!--                    32-->
                    <div class="hothits-cover">
                        <div class="hothits-cover-img" style="background-image: url(&quot;https://images.unsplash.com/photo-1506320775314-84c60bff00ff?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=2c70f9ba7a9ed5ee7c05d1ef9447d43a&auto=format&fit=crop&w=500&q=60;);" data-reactid="">
                            <a class="hothits-country-name" title="" href="" data-reactid="">มาเลเซีย</a>
                        </div>                                     
                    </div>

                    <div class="hothits-cover">
                        <div class="hothits-cover-img" style="background-image: url(&quot;https://images.unsplash.com/photo-1494079218307-7fa091ab4df2?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=7305f1f0596975f6e99dc45b6fce795d&auto=format&fit=crop&w=500&q=60;);" data-reactid="">
                            <a class="hothits-country-name" title="" href="" data-reactid="">นิวซีแลนด์</a>
                        </div>                                     
                    </div>
                    
                    <div class="hothits-cover">
                        <div class="hothits-cover-img" style="background-image: url(&quot;;);" data-reactid="">
                            <a class="hothits-country-name" title="" href="" data-reactid="">บรูไน</a>
                        </div>                                     
                    </div>

                    <div class="hothits-cover">
                        <div class="hothits-cover-img" style="background-image: url(&quot;https://images.unsplash.com/photo-1504639369832-85ea84c60cf2?ixlib=rb-0.3.5&s=0d6db9ac407ec905554a6876e454949d&auto=format&fit=crop&w=500&q=60;);" data-reactid="">
                            <a class="hothits-country-name" title="" href="" data-reactid="">กัมพูชา</a>
                        </div>                                     
                    </div>
<!-- 36 -->
                    <div class="hothits-cover">
                        <div class="hothits-cover-img" style="background-image: url(&quot;https://images.unsplash.com/photo-1496212108404-e2977b6c7e1a?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=a3b93312746d7a088f1ac123b92b2a64&auto=format&fit=crop&w=500&q=60;);" data-reactid="">
                            <a class="hothits-country-name" title="" href="" data-reactid="">อเมริกา</a>
                        </div>                                     
                    </div>

                    <div class="hothits-cover">
                        <div class="hothits-cover-img" style="background-image: url(&quot;https://images.unsplash.com/photo-1507301409852-188e6770a8db?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=3ec54d4e337bf43ea74d39237cf3331e&auto=format&fit=crop&w=500&q=60;);" data-reactid="">
                            <a class="hothits-country-name" title="" href="" data-reactid="">โครเอเชีย</a>
                        </div>                                     
                    </div>
<!-- 38 -->
                    <div class="hothits-cover">
                        <div class="hothits-cover-img" style="background-image: url(&quot;https://images.unsplash.com/photo-1481014472607-f71254019973?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=3ef224b7a523caa5d3d836eba7fb884a&auto=format&fit=crop&w=500&q=60;);" data-reactid="">
                            <a class="hothits-country-name" title="" href="" data-reactid="">อังกฤษ</a>
                        </div>                                     
                    </div>

                </div>
                
            </div>
            
            
            
        </section>

        <section class="detail-section" style="padding: 30px 0;">
            <div class="container">
<!--                ญี่ปุ่น-->
                <div class="row">
                    <h1>สถานที่ยอดฮิตในญี่ปุ่น</h1><div class="line-gradient"></div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <div class="hothits-item">
                            <a href="">
				<div class="hothits-img lazyloaded">
                                    <div class="center-crop"> 
                                        <img src="https://images.unsplash.com/photo-1454179659346-524fcc7bd5e7?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=7b0a70cb51906491b81b41534be2b6cd&auto=format&fit=crop&w=500&q=60" alt="">
                                        
                                   </div> 
				</div>
				<div class="hothits-detail">
					ภูเขาฟูจิเป็นภูเขาที่สูงที่สุดในญี่ปุ่น รอบๆภูเขาเต็มไปด้วยธรรชาติอันงดงาม ภูเขาฟูจิมีอิทธิพลต่อศิลปวัฒนธรรมของญี่ปุ่นมาตั้งแต่สมัยโบราณ เรียกว่าภูเขาฟูจิเป็นหัวใจของญี่ปุ่น
                                        
                                </div>    
				<div class="hothits-name-box">
                                    <div class="text ">ภูเขาไฟฟูจิ</div>
				</div>
                            </a>
                            
                            <div class="tour-description">
					<!-- <ul class="single_blog_post_info nopadding">
						<li><a href="javascript:void(0);">TT171696</a></li>
						<li>
							<div class="five-stars-container pull-right">
								<span class="five-stars" style="width: 60%;"></span>
							</div>
						</li>
					</ul> -->
<!--                                    <div class="tour-airline-logo">
                                        <img src="https://www.thaitravelcenter.com/_admin2/userfiles//vehicle/airline/171004-CX-1-188x66.png" alt="Cathay Pacific คาเธ่ย์ แปซิฟิค" title="Cathay Pacific คาเธ่ย์ แปซิฟิค">
                                    </div>-->
                                    <div class="num-pack-here">
                                           139 แพ็คเกจไปที่นี่
                                    </div>
					<a class="tour-price" href="">
                                            <!-- <small>ราคาเริ่มต้น</small> -->
                                            <small class="strike"></small>
                                            <i class="fas fa-map-marker"></i>
                                        </a>
                            </div>
                        
			</div>
                    </div>
                    
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <div class="hothits-item">
                            <a href="">
				<div class="hothits-img lazyloaded">
                                    <div class="center-crop"> 
                                        <img src="" alt="">                                       
                                   </div> 
				</div>
				<div class="hothits-detail">
					รายละเอียด
                                </div>    
				<div class="hothits-name-box">
                                    <div class="text ">ชื่อ</div>
				</div>
                            </a>
                            
                            <div class="tour-description">
					
                                    <div class="num-pack-here">
                                           xxx แพ็คเกจไปที่นี่
                                    </div>
					<a class="tour-price" href="">
                                            <!-- <small>ราคาเริ่มต้น</small> -->
                                            <small class="strike"></small>
                                            <i class="fas fa-map-marker"></i>
                                        </a>
                            </div>
                           
			</div>
                    </div>
                    
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <div class="hothits-item">
                            <a href="">
				<div class="hothits-img lazyloaded">
                                    <div class="center-crop"> 
                                        <img src="" alt="">                                       
                                   </div> 
				</div>
				<div class="hothits-detail">
					รายละเอียด
                                </div>    
				<div class="hothits-name-box">
                                    <div class="text ">ชื่อ</div>
				</div>
                            </a>
                            
                            <div class="tour-description">
					
                                    <div class="num-pack-here">
                                           xxx แพ็คเกจไปที่นี่
                                    </div>
					<a class="tour-price" href="">
                                            <!-- <small>ราคาเริ่มต้น</small> -->
                                            <small class="strike"></small>
                                            <i class="fas fa-map-marker"></i>
                                        </a>
                            </div>
                           
			</div>
                    </div>
                    
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <div class="hothits-item">
                            <a href="">
				<div class="hothits-img lazyloaded">
                                    <div class="center-crop"> 
                                        <img src="" alt="">                                       
                                   </div> 
				</div>
				<div class="hothits-detail">
					รายละเอียด
                                </div>    
				<div class="hothits-name-box">
                                    <div class="text ">ชื่อ</div>
				</div>
                            </a>
                            
                            <div class="tour-description">
					
                                    <div class="num-pack-here">
                                           xxx แพ็คเกจไปที่นี่
                                    </div>
					<a class="tour-price" href="">
                                            <!-- <small>ราคาเริ่มต้น</small> -->
                                            <small class="strike"></small>
                                            <i class="fas fa-map-marker"></i>
                                        </a>
                            </div>
                           
			</div>
                    </div>
                    
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <div class="hothits-item">
                            <a href="">
				<div class="hothits-img lazyloaded">
                                    <div class="center-crop"> 
                                        <img src="" alt="">                                       
                                   </div> 
				</div>
				<div class="hothits-detail">
					รายละเอียด
                                </div>    
				<div class="hothits-name-box">
                                    <div class="text ">ชื่อ</div>
				</div>
                            </a>
                            
                            <div class="tour-description">
					
                                    <div class="num-pack-here">
                                           xxx แพ็คเกจไปที่นี่
                                    </div>
					<a class="tour-price" href="">
                                            <!-- <small>ราคาเริ่มต้น</small> -->
                                            <small class="strike"></small>
                                            <i class="fas fa-map-marker"></i>
                                        </a>
                            </div>
                           
			</div>
                    </div>
                    
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <div class="hothits-item">
                            <a href="">
				<div class="hothits-img lazyloaded">
                                    <div class="center-crop"> 
                                        <img src="" alt="">                                       
                                   </div> 
				</div>
				<div class="hothits-detail">
					รายละเอียด
                                </div>    
				<div class="hothits-name-box">
                                    <div class="text ">ชื่อ</div>
				</div>
                            </a>
                            
                            <div class="tour-description">
					
                                    <div class="num-pack-here">
                                           xxx แพ็คเกจไปที่นี่
                                    </div>
					<a class="tour-price" href="">
                                            
                                            <small class="strike"></small>
                                            <i class="fas fa-map-marker"></i>
                                        </a>
                            </div>
                           
			</div>
                    </div>
                    
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <div class="hothits-item">
                            <a href="">
				<div class="hothits-img lazyloaded">
                                    <div class="center-crop"> 
                                        <img src="" alt="">                                       
                                   </div> 
				</div>
				<div class="hothits-detail">
					รายละเอียด
                                </div>    
				<div class="hothits-name-box">
                                    <div class="text ">ชื่อ</div>
				</div>
                            </a>
                            
                            <div class="tour-description">
				
                                    <div class="num-pack-here">
                                           xxx แพ็คเกจไปที่นี่
                                    </div>
					<a class="tour-price" href="">
                                            
                                            <small class="strike"></small>
                                            <i class="fas fa-map-marker"></i>
                                        </a>
                            </div>
                           
			</div>
                    </div>
                    
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <div class="hothits-item">
                            <a href="">
				<div class="hothits-img lazyloaded">
                                    <div class="center-crop"> 
                                        <img src="" alt="">                                       
                                   </div> 
				</div>
				<div class="hothits-detail">
					รายละเอียด
                                </div>    
				<div class="hothits-name-box">
                                    <div class="text ">ชื่อ</div>
				</div>
                            </a>
                            
                            <div class="tour-description">
					
                                    <div class="num-pack-here">
                                           xxx แพ็คเกจไปที่นี่
                                    </div>
					<a class="tour-price" href="">
                                            
                                            <small class="strike"></small>
                                            <i class="fas fa-map-marker"></i>
                                        </a>
                            </div>  
			</div>
                    </div>                        
                </div>
                
<!--                เกาหลี-->                
                <div class="row">
                    <h2>สถานที่ยอดฮิตในเกาหลี</h2><div class="line-gradient"></div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <div class="hothits-item">
                            <a href="">
				<div class="hothits-img lazyloaded">
                                    <div class="center-crop"> 
                                        <img src="https://images.unsplash.com/photo-1502737459521-e4b80edec108?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=f79faf1db2e29a3b469562cd68c53c05&auto=format&fit=crop&w=500&q=60" alt="">                                       
                                   </div> 
				</div>
				<div class="hothits-detail">
					รายละเอียด
                                </div>    
				<div class="hothits-name-box">
                                    <div class="text ">ชื่อ</div>
				</div>
                            </a>
                            
                            <div class="tour-description">
					<!-- <ul class="single_blog_post_info nopadding">
						<li><a href="javascript:void(0);">TT171696</a></li>
						<li>
							<div class="five-stars-container pull-right">
								<span class="five-stars" style="width: 60%;"></span>
							</div>
						</li>
					</ul> -->
<!--                                    <div class="tour-airline-logo">
                                        <img src="https://www.thaitravelcenter.com/_admin2/userfiles//vehicle/airline/171004-CX-1-188x66.png" alt="Cathay Pacific คาเธ่ย์ แปซิฟิค" title="Cathay Pacific คาเธ่ย์ แปซิฟิค">
                                    </div>-->
                                    <div class="num-pack-here">
                                           xxx แพ็คเกจไปที่นี่
                                    </div>
					<a class="tour-price" href="">
                                            <!-- <small>ราคาเริ่มต้น</small> -->
                                            <small class="strike"></small>
                                            <i class="fas fa-map-marker"></i>
                                        </a>
                            </div>
                           
			</div>
                    </div>
                    
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <div class="hothits-item">
                            <a href="">
				<div class="hothits-img lazyloaded">
                                    <div class="center-crop"> 
                                        <img src="" alt="">                                       
                                   </div> 
				</div>
				<div class="hothits-detail">
					รายละเอียด
                                </div>    
				<div class="hothits-name-box">
                                    <div class="text ">ชื่อ</div>
				</div>
                            </a>
                            
                            <div class="tour-description">
					
                                    <div class="num-pack-here">
                                           xxx แพ็คเกจไปที่นี่
                                    </div>
					<a class="tour-price" href="">
                                            <!-- <small>ราคาเริ่มต้น</small> -->
                                            <small class="strike"></small>
                                            <i class="fas fa-map-marker"></i>
                                        </a>
                            </div>
                           
			</div>
                    </div>
                    
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <div class="hothits-item">
                            <a href="">
				<div class="hothits-img lazyloaded">
                                    <div class="center-crop"> 
                                        <img src="" alt="">                                       
                                   </div> 
				</div>
				<div class="hothits-detail">
					รายละเอียด
                                </div>    
				<div class="hothits-name-box">
                                    <div class="text ">ชื่อ</div>
				</div>
                            </a>
                            
                            <div class="tour-description">
					
                                    <div class="num-pack-here">
                                           xxx แพ็คเกจไปที่นี่
                                    </div>
					<a class="tour-price" href="">
                                            <!-- <small>ราคาเริ่มต้น</small> -->
                                            <small class="strike"></small>
                                            <i class="fas fa-map-marker"></i>
                                        </a>
                            </div>
                           
			</div>
                    </div>
                    
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <div class="hothits-item">
                            <a href="">
				<div class="hothits-img lazyloaded">
                                    <div class="center-crop"> 
                                        <img src="" alt="">                                       
                                   </div> 
				</div>
				<div class="hothits-detail">
					รายละเอียด
                                </div>    
				<div class="hothits-name-box">
                                    <div class="text ">ชื่อ</div>
				</div>
                            </a>
                            
                            <div class="tour-description">
					
                                    <div class="num-pack-here">
                                           xxx แพ็คเกจไปที่นี่
                                    </div>
					<a class="tour-price" href="">
                                            <!-- <small>ราคาเริ่มต้น</small> -->
                                            <small class="strike"></small>
                                            <i class="fas fa-map-marker"></i>
                                        </a>
                            </div>
                           
			</div>
                    </div>
                    
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <div class="hothits-item">
                            <a href="">
				<div class="hothits-img lazyloaded">
                                    <div class="center-crop"> 
                                        <img src="" alt="">                                       
                                   </div> 
				</div>
				<div class="hothits-detail">
					รายละเอียด
                                </div>    
				<div class="hothits-name-box">
                                    <div class="text ">ชื่อ</div>
				</div>
                            </a>
                            
                            <div class="tour-description">
					
                                    <div class="num-pack-here">
                                           xxx แพ็คเกจไปที่นี่
                                    </div>
					<a class="tour-price" href="">
                                            <!-- <small>ราคาเริ่มต้น</small> -->
                                            <small class="strike"></small>
                                            <i class="fas fa-map-marker"></i>
                                        </a>
                            </div>
                           
			</div>
                    </div>
                    
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <div class="hothits-item">
                            <a href="">
				<div class="hothits-img lazyloaded">
                                    <div class="center-crop"> 
                                        <img src="" alt="">                                       
                                   </div> 
				</div>
				<div class="hothits-detail">
					รายละเอียด
                                </div>    
				<div class="hothits-name-box">
                                    <div class="text ">ชื่อ</div>
				</div>
                            </a>
                            
                            <div class="tour-description">
					
                                    <div class="num-pack-here">
                                           xxx แพ็คเกจไปที่นี่
                                    </div>
					<a class="tour-price" href="">
                                            
                                            <small class="strike"></small>
                                            <i class="fas fa-map-marker"></i>
                                        </a>
                            </div>
                           
			</div>
                    </div>
                    
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <div class="hothits-item">
                            <a href="">
				<div class="hothits-img lazyloaded">
                                    <div class="center-crop"> 
                                        <img src="" alt="">                                       
                                   </div> 
				</div>
				<div class="hothits-detail">
					รายละเอียด
                                </div>    
				<div class="hothits-name-box">
                                    <div class="text ">ชื่อ</div>
				</div>
                            </a>
                            
                            <div class="tour-description">
				
                                    <div class="num-pack-here">
                                           xxx แพ็คเกจไปที่นี่
                                    </div>
					<a class="tour-price" href="">
                                            
                                            <small class="strike"></small>
                                            <i class="fas fa-map-marker"></i>
                                        </a>
                            </div>
                           
			</div>
                    </div>
                    
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <div class="hothits-item">
                            <a href="">
				<div class="hothits-img lazyloaded">
                                    <div class="center-crop"> 
                                        <img src="" alt="">                                       
                                   </div> 
				</div>
				<div class="hothits-detail">
					รายละเอียด
                                </div>    
				<div class="hothits-name-box">
                                    <div class="text ">ชื่อ</div>
				</div>
                            </a>
                            
                            <div class="tour-description">
					
                                    <div class="num-pack-here">
                                           xxx แพ็คเกจไปที่นี่
                                    </div>
					<a class="tour-price" href="">
                                            
                                            <small class="strike"></small>
                                            <i class="fas fa-map-marker"></i>
                                        </a>
                            </div>  
			</div>
                    </div>                        
                </div>

<!--                ฮ่องกง-->                
                <div class="row">
                    <h2>สถานที่ยอดฮิตในฮ่องกง</h2><div class="line-gradient"></div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <div class="hothits-item">
                            <a href="">
				<div class="hothits-img lazyloaded">
                                    <div class="center-crop"> 
                                        <img src="https://images.unsplash.com/photo-1519222588400-47f6bea38294?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=dc0077daebb63d648cc5bdf8b314f4d5&auto=format&fit=crop&w=500&q=60" alt="">                                       
                                   </div> 
				</div>
				<div class="hothits-detail">
					รายละเอียด
                                </div>    
				<div class="hothits-name-box">
                                    <div class="text ">ชื่อ</div>
				</div>
                            </a>
                            
                            <div class="tour-description">
					<!-- <ul class="single_blog_post_info nopadding">
						<li><a href="javascript:void(0);">TT171696</a></li>
						<li>
							<div class="five-stars-container pull-right">
								<span class="five-stars" style="width: 60%;"></span>
							</div>
						</li>
					</ul> -->
<!--                                    <div class="tour-airline-logo">
                                        <img src="https://www.thaitravelcenter.com/_admin2/userfiles//vehicle/airline/171004-CX-1-188x66.png" alt="Cathay Pacific คาเธ่ย์ แปซิฟิค" title="Cathay Pacific คาเธ่ย์ แปซิฟิค">
                                    </div>-->
                                    <div class="num-pack-here">
                                           xxx แพ็คเกจไปที่นี่
                                    </div>
					<a class="tour-price" href="">
                                            <!-- <small>ราคาเริ่มต้น</small> -->
                                            <small class="strike"></small>
                                            <i class="fas fa-map-marker"></i>
                                        </a>
                            </div>
                           
			</div>
                    </div>
                    
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <div class="hothits-item">
                            <a href="">
				<div class="hothits-img lazyloaded">
                                    <div class="center-crop"> 
                                        <img src="" alt="">                                       
                                   </div> 
				</div>
				<div class="hothits-detail">
					รายละเอียด
                                </div>    
				<div class="hothits-name-box">
                                    <div class="text ">ชื่อ</div>
				</div>
                            </a>
                            
                            <div class="tour-description">
					
                                    <div class="num-pack-here">
                                           xxx แพ็คเกจไปที่นี่
                                    </div>
					<a class="tour-price" href="">
                                            <!-- <small>ราคาเริ่มต้น</small> -->
                                            <small class="strike"></small>
                                            <i class="fas fa-map-marker"></i>
                                        </a>
                            </div>
                           
			</div>
                    </div>
                    
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <div class="hothits-item">
                            <a href="">
				<div class="hothits-img lazyloaded">
                                    <div class="center-crop"> 
                                        <img src="" alt="">                                       
                                   </div> 
				</div>
				<div class="hothits-detail">
					รายละเอียด
                                </div>    
				<div class="hothits-name-box">
                                    <div class="text ">ชื่อ</div>
				</div>
                            </a>
                            
                            <div class="tour-description">
					
                                    <div class="num-pack-here">
                                           xxx แพ็คเกจไปที่นี่
                                    </div>
					<a class="tour-price" href="">
                                            <!-- <small>ราคาเริ่มต้น</small> -->
                                            <small class="strike"></small>
                                            <i class="fas fa-map-marker"></i>
                                        </a>
                            </div>
                           
			</div>
                    </div>
                    
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <div class="hothits-item">
                            <a href="">
				<div class="hothits-img lazyloaded">
                                    <div class="center-crop"> 
                                        <img src="" alt="">                                       
                                   </div> 
				</div>
				<div class="hothits-detail">
					รายละเอียด
                                </div>    
				<div class="hothits-name-box">
                                    <div class="text ">ชื่อ</div>
				</div>
                            </a>
                            
                            <div class="tour-description">
					
                                    <div class="num-pack-here">
                                           xxx แพ็คเกจไปที่นี่
                                    </div>
					<a class="tour-price" href="">
                                            <!-- <small>ราคาเริ่มต้น</small> -->
                                            <small class="strike"></small>
                                            <i class="fas fa-map-marker"></i>
                                        </a>
                            </div>
                           
			</div>
                    </div>
                    
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <div class="hothits-item">
                            <a href="">
				<div class="hothits-img lazyloaded">
                                    <div class="center-crop"> 
                                        <img src="" alt="">                                       
                                   </div> 
				</div>
				<div class="hothits-detail">
					รายละเอียด
                                </div>    
				<div class="hothits-name-box">
                                    <div class="text ">ชื่อ</div>
				</div>
                            </a>
                            
                            <div class="tour-description">
					
                                    <div class="num-pack-here">
                                           xxx แพ็คเกจไปที่นี่
                                    </div>
					<a class="tour-price" href="">
                                            <!-- <small>ราคาเริ่มต้น</small> -->
                                            <small class="strike"></small>
                                            <i class="fas fa-map-marker"></i>
                                        </a>
                            </div>
                           
			</div>
                    </div>
                    
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <div class="hothits-item">
                            <a href="">
				<div class="hothits-img lazyloaded">
                                    <div class="center-crop"> 
                                        <img src="" alt="">                                       
                                   </div> 
				</div>
				<div class="hothits-detail">
					รายละเอียด
                                </div>    
				<div class="hothits-name-box">
                                    <div class="text ">ชื่อ</div>
				</div>
                            </a>
                            
                            <div class="tour-description">
					
                                    <div class="num-pack-here">
                                           xxx แพ็คเกจไปที่นี่
                                    </div>
					<a class="tour-price" href="">
                                            
                                            <small class="strike"></small>
                                            <i class="fas fa-map-marker"></i>
                                        </a>
                            </div>
                           
			</div>
                    </div>
                    
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <div class="hothits-item">
                            <a href="">
				<div class="hothits-img lazyloaded">
                                    <div class="center-crop"> 
                                        <img src="" alt="">                                       
                                   </div> 
				</div>
				<div class="hothits-detail">
					รายละเอียด
                                </div>    
				<div class="hothits-name-box">
                                    <div class="text ">ชื่อ</div>
				</div>
                            </a>
                            
                            <div class="tour-description">
				
                                    <div class="num-pack-here">
                                           xxx แพ็คเกจไปที่นี่
                                    </div>
					<a class="tour-price" href="">
                                            
                                            <small class="strike"></small>
                                            <i class="fas fa-map-marker"></i>
                                        </a>
                            </div>
                           
			</div>
                    </div>
                    
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <div class="hothits-item">
                            <a href="">
				<div class="hothits-img lazyloaded">
                                    <div class="center-crop"> 
                                        <img src="" alt="">                                       
                                   </div> 
				</div>
				<div class="hothits-detail">
					รายละเอียด
                                </div>    
				<div class="hothits-name-box">
                                    <div class="text ">ชื่อ</div>
				</div>
                            </a>
                            
                            <div class="tour-description">
					
                                    <div class="num-pack-here">
                                           xxx แพ็คเกจไปที่นี่
                                    </div>
					<a class="tour-price" href="">
                                            
                                            <small class="strike"></small>
                                            <i class="fas fa-map-marker"></i>
                                        </a>
                            </div>  
			</div>
                    </div>                        
                </div>
                
                
                
                
                
                
                
                
            </div>
        </section>
























@stop