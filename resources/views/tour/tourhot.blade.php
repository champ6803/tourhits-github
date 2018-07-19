@extends('layout.main')
@section('page_title','ทัวร์มาแรง')
@section('main-content')

<style>
    
    .tourhot-section .tourhot-head-detail{
        font-size: 20px;
        padding-bottom: 10px;
    }
    
</style>

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
                        <div class="hothits-cover-img" style="background-image: url(&quot;https://images.unsplash.com/photo-1504469233511-1a19ead30d33?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=a251900ecb0110fde8dd273f9a6817d5&auto=format&fit=crop&w=500&q=60;);" data-reactid="">
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

<section class="tourhot-section" style="padding: 30px 0;">
    <div class="container">
            <div style="padding-bottom: 30px;">
                <div class="row">
                    <div style="margin-left: 10px;">
                    <h3>แพ็คเกจทัวร์มาแรง</h3>
                    <div class="tourhot-head-detail">เราคัดสรรค์มาให้จากทัวร์ต่างประเทศทั้งหมดที่มีในราคาพิเศษ ณ ที่นี่ที่เดียว</div>   
                    </div>
                    <div class="line-gradient"></div>
                </div>      
            </div>
        
        <div class="row">    
            <div class="col-sm-6 col-md-6 col-lg-3" align="center">
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
                                                <div class="card-airline"><img alt="การบินไทย" src="../images/airline/thai_airway.png" title="Air Asia X"></div>                                         
                                                <div class="card-price">฿49,900</div>         
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
            
            <div class="col-sm-6 col-md-6 col-lg-3" align="center">
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
                                                <div class="card-airline"><img alt="การบินไทย" src="../images/airline/thai_airway.png" title="Air Asia X"></div>                                         
                                                <div class="card-price">฿49,900</div>         
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
            
            <div class="col-sm-6 col-md-6 col-lg-3" align="center">
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
                                                <div class="card-airline"><img alt="การบินไทย" src="../images/airline/thai_airway.png" title="Air Asia X"></div>                                         
                                                <div class="card-price">฿49,900</div>         
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
            
            <div class="col-sm-6 col-md-6 col-lg-3" align="center">
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
                                                <div class="card-airline"><img alt="การบินไทย" src="../images/airline/thai_airway.png" title="Air Asia X"></div>                                         
                                                <div class="card-price">฿49,900</div>         
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
        </div>
        
        <div class="row">    

        </div>
             
    </div>     
</section>
                    
@stop

@section('footer_scripts')

<script type="text/javascript" src="{{ asset('js/tour/tourhot.js') }}"></script>

@endsection