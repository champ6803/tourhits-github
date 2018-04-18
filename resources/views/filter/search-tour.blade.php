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

</style>
<section class="filter-section">
    <div class="container">
        <div class="row">
            <!--เนื้อหาทางขวา-->         
            <!-- Nav tabs -->
            <div class="col-md-9 col-md-push-3">
                <div class="row filter-tabcard">
                    <div class="col-md-12">
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#event" aria-controls="event" role="tab" data-toggle="tab"><i class="fas fa-bolt"></i><span class="tab-text"> กิจกรรม</span></a></li>
                            <li role="presentation"><a href="#place" aria-controls="profile" role="place" data-toggle="tab"><i class="fas fa-location-arrow"></i><span class="tab-text"> สถานที่</span></a></li>
                            <li role="presentation"><a href="#etc" aria-controls="messages" role="etc" data-toggle="tab"><i class="fas fa-clone"></i><span> อื่นๆ</span></a></li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <!--เนื้อหา tab event-->
                            <div role="tabpanel" class="tab-pane active" id="event">
                                <div class="row tab-tags">
                                    @foreach ($tagList as $tag)
                                    <div class="col-lg-3 col-md-6 option">
                                        <label for="tag_{{ $tag->t_id }}" class="label-cbx">
                                            <input id="tag_{{ $tag->t_id }}" type="checkbox" class="invisible">
                                            <div class="checkbox">
                                                <svg width="20px" height="20px" viewBox="0 0 20 20">
                                                <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                                                <polyline points="4 11 8 15 16 6"></polyline>
                                                </svg>
                                            </div>
                                            <span class="name">{{ $tag->t_name }}</span>
                                            <span class="count">({{ $tag->t_num }})</span>
                                            <span class="clear"></span>
                                        </label>
                                    </div>
                                    @endforeach
                                </div>
                                <!--จบเนื้อหา tab event-->                
                            </div>

                            <!--เนื้อหา tab สถานที่-->
                            <div role="tabpanel" class="tab-pane" id="place">
                                แสดงเป็นรูปภาพช่องๆ
                                <!--จบเนื้อหา tab สถานที่-->               
                            </div>

                            <!--เนื้อหา tab อื่นๆ-->
                            <div role="tabpanel" class="tab-pane" id="etc">
                                <div class="row tab-other">
                                    <div class="col-lg-3 col-md-6 option">
                                        <label for="cbx-ect" class="label-cbx">
                                            <input id="cbx-ect" type="checkbox" class="invisible">
                                            <div class="checkbox">
                                                <svg width="20px" height="20px" viewBox="0 0 20 20">
                                                <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                                                <polyline points="4 11 8 15 16 6"></polyline>
                                                </svg>
                                            </div>
                                            <span class="name">บินตรง</span>
                                            <span class="count">(2)</span>
                                            <span class="clear"></span>
                                        </label>
                                    </div>
                                    <div class="col-lg-3 col-md-6 option">
                                        <label for="cbx-ect" class="label-cbx">
                                            <input id="cbx-ect" type="checkbox" class="invisible">
                                            <div class="checkbox">
                                                <svg width="20px" height="20px" viewBox="0 0 20 20">
                                                <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                                                <polyline points="4 11 8 15 16 6"></polyline>
                                                </svg>
                                            </div>
                                            <span class="name">บินตรง</span>
                                            <span class="count">(2)</span>
                                            <span class="clear"></span>
                                        </label>
                                    </div>
                                    <div class="col-lg-3 col-md-6 option">
                                        <label for="cbx-ect" class="label-cbx">
                                            <input id="cbx-ect" type="checkbox" class="invisible">
                                            <div class="checkbox">
                                                <svg width="20px" height="20px" viewBox="0 0 20 20">
                                                <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                                                <polyline points="4 11 8 15 16 6"></polyline>
                                                </svg>
                                            </div>
                                            <span class="name">บินตรง</span>
                                            <span class="count">(2)</span>
                                            <span class="clear"></span>
                                        </label>
                                    </div>
                                    <div class="col-lg-3 col-md-6 option">
                                        <label for="cbx-ect" class="label-cbx">
                                            <input id="cbx-ect" type="checkbox" class="invisible">
                                            <div class="checkbox">
                                                <svg width="20px" height="20px" viewBox="0 0 20 20">
                                                <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                                                <polyline points="4 11 8 15 16 6"></polyline>
                                                </svg>
                                            </div>
                                            <span class="name">บินตรง</span>
                                            <span class="count">(2)</span>
                                            <span class="clear"></span>
                                        </label>
                                    </div>
                                    <div class="col-lg-3 col-md-6 option">
                                        <label for="cbx-ect" class="label-cbx">
                                            <input id="cbx-ect" type="checkbox" class="invisible">
                                            <div class="checkbox">
                                                <svg width="20px" height="20px" viewBox="0 0 20 20">
                                                <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                                                <polyline points="4 11 8 15 16 6"></polyline>
                                                </svg>
                                            </div>
                                            <span class="name">บินตรง</span>
                                            <span class="count">(2)</span>
                                            <span class="clear"></span>
                                        </label>
                                    </div>
                                    <div class="col-lg-3 col-md-6 option">
                                        <label for="cbx-ect" class="label-cbx">
                                            <input id="cbx-ect" type="checkbox" class="invisible">
                                            <div class="checkbox">
                                                <svg width="20px" height="20px" viewBox="0 0 20 20">
                                                <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                                                <polyline points="4 11 8 15 16 6"></polyline>
                                                </svg>
                                            </div>
                                            <span class="name">บินตรง</span>
                                            <span class="count">(2)</span>
                                            <span class="clear"></span>
                                        </label>
                                    </div>
                                    <div class="col-lg-3 col-md-6 option">
                                        <label for="cbx-ect" class="label-cbx">
                                            <input id="cbx-ect" type="checkbox" class="invisible">
                                            <div class="checkbox">
                                                <svg width="20px" height="20px" viewBox="0 0 20 20">
                                                <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                                                <polyline points="4 11 8 15 16 6"></polyline>
                                                </svg>
                                            </div>
                                            <span class="name">บินตรง</span>
                                            <span class="count">(2)</span>
                                            <span class="clear"></span>
                                        </label>
                                    </div>
                                    <div class="col-lg-3 col-md-6 option">
                                        <label for="cbx-ect" class="label-cbx">
                                            <input id="cbx-ect" type="checkbox" class="invisible">
                                            <div class="checkbox">
                                                <svg width="20px" height="20px" viewBox="0 0 20 20">
                                                <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                                                <polyline points="4 11 8 15 16 6"></polyline>
                                                </svg>
                                            </div>
                                            <span class="name">บินตรง</span>
                                            <span class="count">(2)</span>
                                            <span class="clear"></span>
                                        </label>
                                    </div>
                                    <div class="col-lg-3 col-md-6 option">
                                        <label for="cbx-ect" class="label-cbx">
                                            <input id="cbx-ect" type="checkbox" class="invisible">
                                            <div class="checkbox">
                                                <svg width="20px" height="20px" viewBox="0 0 20 20">
                                                <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                                                <polyline points="4 11 8 15 16 6"></polyline>
                                                </svg>
                                            </div>
                                            <span class="name">บินตรง</span>
                                            <span class="count">(2)</span>
                                            <span class="clear"></span>
                                        </label>
                                    </div>
                                    <div class="col-lg-3 col-md-6 option">
                                        <label for="cbx-ect" class="label-cbx">
                                            <input id="cbx-ect" type="checkbox" class="invisible">
                                            <div class="checkbox">
                                                <svg width="20px" height="20px" viewBox="0 0 20 20">
                                                <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                                                <polyline points="4 11 8 15 16 6"></polyline>
                                                </svg>
                                            </div>
                                            <span class="name">บินตรง</span>
                                            <span class="count">(2)</span>
                                            <span class="clear"></span>
                                        </label>
                                    </div>
                                    <div class="col-lg-3 col-md-6 option">
                                        <label for="cbx-ect" class="label-cbx">
                                            <input id="cbx-ect" type="checkbox" class="invisible">
                                            <div class="checkbox">
                                                <svg width="20px" height="20px" viewBox="0 0 20 20">
                                                <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                                                <polyline points="4 11 8 15 16 6"></polyline>
                                                </svg>
                                            </div>
                                            <span class="name">บินตรง</span>
                                            <span class="count">(2)</span>
                                            <span class="clear"></span>
                                        </label>
                                    </div>
                                </div> 
                                <!--จบเนื้อหา tab อื่นๆ-->                
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12" ><h4>ตัวเลือกที่คุณเลือก</h4></div>

                        </div>
                        <!--วาง Tag-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="alert alert-danger alert-dismissible pull-left" style="margin-right: 5px;">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="fas fa-times"></i></span></button>
                                    <strong><span style="font-size: 18px"><i class="fas fa-map"></i> โตเกียว</span></strong>
                                </div>
                                <div class="alert alert-danger alert-dismissible pull-left">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="fas fa-times"></i></span></button>
                                    <strong><span style="font-size: 18px"><i class="fas fa-map"></i> ฮอกไกโด</span></strong>
                                </div>
                            </div>    

                        </div>
                    </div>
                </div>
                <!--วางธง/ความนิยม-->        
                <div class="row" style="padding-bottom: 10px;">       
                    <div class="col-md-6">
                        <img style="float: left; margin-right: 10px;" data-src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/6/Korea_-South.png" alt="ทัวร์เกาหลี" class=" lazyloaded" src="https://d4ulp9jtgcw4i.cloudfront.net/uploads/region_collection/flag/6/Korea_-South.png">
                        <h5>ทัวร์ญี่ปุ่น ทั้งหมด 132 แพ็คเกจ</h5>
                    </div>
                    <div class="col-md-6 dropdown-pos">
                        <ul class="nav navbar-nav pull-right">
                            <li class="dropdown">
                                <a href="#" class="" data-toggle="dropdown">
                                    <div>
                                        <span class="price">ราคา</span>
                                        <span class="pull-right">มาก-น้อย<i class="fa fa-angle-down pull-right"></i></span>
                                    </div>	
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="#"><span>มาก-น้อย</span></a>
                                    </li>
                                    <li>
                                        <a href="#"><span>น้อย-มาก</span></a>
                                    </li>
                                </ul>
                            </li>
                        </ul> 
                        <ul class="nav navbar-nav pull-right">
                            <li class="dropdown">
                                <a href="#" class="" data-toggle="dropdown">
                                    <div>
                                        <span class="price">ความนิยม</span>
                                        <span class="pull-right">มาก-น้อย<i class="fa fa-angle-down pull-right"></i></span>
                                    </div>	
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="#"><span>มาก-น้อย</span></a>
                                    </li>
                                    <li>
                                        <a href="#"><span>น้อย-มาก</span></a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <!--วางการ์ด-->
                <div id="card_area" class="row">
                    <div class="col-sm-6 col-md-4" align="center">
                                        <div class="thumbnail">
                    <a href="{{ url('tour-detail') }}">
                        <div class="tour-cover lazyloaded" data-bg="../images/card/tour1.jpg" style="background-image: url(https://images.unsplash.com/photo-1461727885569-b2ddec0c4328?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=52688612d33fced91e12c8ee7755002c&auto=format&fit=crop&w=500&q=60;);">
                            <div class="tour-footer">
                                <div class="pull-left">
                                    <span class="flag">
                                        <img width="70%" alt="ทัวร์เวียดนาม" src="https://d4ulp9jtgcw4i.cloudfront.net/assets/countries/Vietnam/flag-9fb374d4ac69e1ef0f871250a59f1077.png">
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
                                        #6600
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
                                    <div class="card-detail">ทัวร์ฮ่องกง เกาะลันเตา วัดโป่วหลิน วัดแชกงหมิว นั่งรถรางพีคแทรม ยอดเขาวิคตรอเรีย พีค สวนสนุกดิสนีย์แลนด์เต็มวัน (รวมค่าตั๋ว) ชมโชว์ SYMPHONY OF LIGHT ช้อปปิ้งจิมซาจุ่ย ทัวร์ฮ่องกง 
                                        เกาะลันเตา วัดโป่วหลิน วัดแชกงหมิว นั่งรถรางพีคแทรม ยอดเขาวิคตรอเรีย พีค สวนสนุกดิสนีย์แลนด์เต็มวัน (รวมค่าตั๋ว) ชมโชว์ SYMPHONY OF LIGHT ช้อปปิ้งจิมซาจุ่ย ทัวร์ฮ่องกง เกาะลันเตา วัดโป่วหลิน วัดแชกงหมิว นั่งรถรางพีคแทรม 
                                        ยอดเขาวิคตรอเรีย พีค สวนสนุกดิสนีย์แลนด์เต็มวัน (รวมค่าตั๋ว) ชมโชว์ SYMPHONY OF LIGHT ช้อปปิ้งจิมซาจุ่ย</div>
                                    <hr>
                                    <div class="card-time"><i class="fas fa-calendar-alt"></i>&nbsp;ช่วงเวลา มิ.ย. - ส.ค.</div>
                                    <hr>
                                    <div>                                        
                                        <div class="card-airline"><img alt="การบินไทย" src="../images/airline/thai.png" title="การบินไทย"></div>                                         
                                        <div class="card-price">฿49,900</div>                                       
                                    </div>
                                    <hr>
                                    <div class="button-card">
                                        <a href="#" class="btn btn-pdf"><i class="fas fa-cloud-download-alt"></i>&nbsp;PDF</a>
                                        <a href="#" class="btn btn-detail">ดูรายละเอียด</a>
                                    </div>
                                </div>
                                <div id="tab2" class="tab-pane">tab2 content</div>
                                <div id="tab3" class="tab-pane">tab3 content</div>
                            </div>
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tab1" data-toggle="tab" class="active">แพ็คเกจ</a></li>
                                <li><a href="#tab2" data-toggle="tab">ไฮไลท์</a></li>
                                <li><a href="#tab3" data-toggle="tab">ช่วงเวลา</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-sm-6 col-md-4" align="center">
                <div class="thumbnail">
                    <a href="{{ url('tour-detail') }}">
                        <div class="tour-cover lazyloaded" data-bg="../images/card/tour1.jpg" style="background-image: url(https://images.unsplash.com/photo-1496284045406-d3e0b918d7ba?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=da8271878b509b7558a598dc60703949&auto=format&fit=crop&w=500&q=60;);">
                            <div class="tour-footer">
                                <div class="pull-left">
                                    <span class="flag">
                                        <img width="70%" alt="ทัวร์เวียดนาม" src="https://d4ulp9jtgcw4i.cloudfront.net/assets/countries/Vietnam/flag-9fb374d4ac69e1ef0f871250a59f1077.png">
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
                                        #6600
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
                                    <div class="card-detail">ทัวร์ฮ่องกง เกาะลันเตา วัดโป่วหลิน วัดแชกงหมิว นั่งรถรางพีคแทรม ยอดเขาวิคตรอเรีย พีค สวนสนุกดิสนีย์แลนด์เต็มวัน (รวมค่าตั๋ว) ชมโชว์ SYMPHONY OF LIGHT ช้อปปิ้งจิมซาจุ่ย ทัวร์ฮ่องกง 
                                        เกาะลันเตา วัดโป่วหลิน วัดแชกงหมิว นั่งรถรางพีคแทรม ยอดเขาวิคตรอเรีย พีค สวนสนุกดิสนีย์แลนด์เต็มวัน (รวมค่าตั๋ว) ชมโชว์ SYMPHONY OF LIGHT ช้อปปิ้งจิมซาจุ่ย ทัวร์ฮ่องกง เกาะลันเตา วัดโป่วหลิน วัดแชกงหมิว นั่งรถรางพีคแทรม 
                                        ยอดเขาวิคตรอเรีย พีค สวนสนุกดิสนีย์แลนด์เต็มวัน (รวมค่าตั๋ว) ชมโชว์ SYMPHONY OF LIGHT ช้อปปิ้งจิมซาจุ่ย</div>
                                    <hr>
                                    <div class="card-time"><i class="fas fa-calendar-alt"></i>&nbsp;ช่วงเวลา มิ.ย. - ส.ค.</div>
                                    <hr>
                                    <div class="card-airline"><img alt="การบินไทย" src="../images/airline/airasia_x.png" title="Air Asia X"></div>                                         
                                    <div class="card-price">฿49,900</div>
                                    <hr>
                                    <div class="button-card">
                                        <a href="#" class="btn btn-pdf"><i class="fas fa-cloud-download-alt"></i>&nbsp;PDF</a>
                                        <a href="#" class="btn btn-detail">ดูรายละเอียด</a>
                                    </div>
                                </div>
                                <div id="tab2" class="tab-pane">tab2 content</div>
                                <div id="tab3" class="tab-pane">tab3 content</div>
                            </div>
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tab1" data-toggle="tab" class="active">แพ็คเกจ</a></li>
                                <li><a href="#tab2" data-toggle="tab">ไฮไลท์</a></li>
                                <li><a href="#tab3" data-toggle="tab">ช่วงเวลา</a></li>
                            </ul>
                        </div>
                    </div>
                </div>                        
            </div>
                    <div class="col-sm-6 col-md-4" align="center">
                        <div class="thumbnail">
                    <a href="{{ url('tour-detail') }}">
                        <div class="tour-cover lazyloaded" data-bg="../images/card/tour1.jpg" style="background-image: url(https://images.unsplash.com/photo-1496284045406-d3e0b918d7ba?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=da8271878b509b7558a598dc60703949&auto=format&fit=crop&w=500&q=60;);">
                            <div class="tour-footer">
                                <div class="pull-left">
                                    <span class="flag">
                                        <img width="70%" alt="ทัวร์เวียดนาม" src="https://d4ulp9jtgcw4i.cloudfront.net/assets/countries/Vietnam/flag-9fb374d4ac69e1ef0f871250a59f1077.png">
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
                                        #6600
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
                                    <div class="card-detail">ทัวร์ฮ่องกง เกาะลันเตา วัดโป่วหลิน วัดแชกงหมิว นั่งรถรางพีคแทรม ยอดเขาวิคตรอเรีย พีค สวนสนุกดิสนีย์แลนด์เต็มวัน (รวมค่าตั๋ว) ชมโชว์ SYMPHONY OF LIGHT ช้อปปิ้งจิมซาจุ่ย ทัวร์ฮ่องกง 
                                        เกาะลันเตา วัดโป่วหลิน วัดแชกงหมิว นั่งรถรางพีคแทรม ยอดเขาวิคตรอเรีย พีค สวนสนุกดิสนีย์แลนด์เต็มวัน (รวมค่าตั๋ว) ชมโชว์ SYMPHONY OF LIGHT ช้อปปิ้งจิมซาจุ่ย ทัวร์ฮ่องกง เกาะลันเตา วัดโป่วหลิน วัดแชกงหมิว นั่งรถรางพีคแทรม 
                                        ยอดเขาวิคตรอเรีย พีค สวนสนุกดิสนีย์แลนด์เต็มวัน (รวมค่าตั๋ว) ชมโชว์ SYMPHONY OF LIGHT ช้อปปิ้งจิมซาจุ่ย</div>
                                    <hr>
                                    <div class="card-time"><i class="fas fa-calendar-alt"></i>&nbsp;ช่วงเวลา มิ.ย. - ส.ค.</div>
                                    <hr>
                                    <div class="card-airline"><img alt="การบินไทย" src="../images/airline/airasia_x.png" title="Air Asia X"></div>                                         
                                    <div class="card-price">฿49,900</div>
                                    <hr>
                                    <div class="button-card">
                                        <a href="#" class="btn btn-pdf"><i class="fas fa-cloud-download-alt"></i>&nbsp;PDF</a>
                                        <a href="#" class="btn btn-detail">ดูรายละเอียด</a>
                                    </div>
                                </div>
                                <div id="tab2" class="tab-pane">tab2 content</div>
                                <div id="tab3" class="tab-pane">tab3 content</div>
                            </div>
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tab1" data-toggle="tab" class="active">แพ็คเกจ</a></li>
                                <li><a href="#tab2" data-toggle="tab">ไฮไลท์</a></li>
                                <li><a href="#tab3" data-toggle="tab">ช่วงเวลา</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                    </div>
                    <div class="col-sm-6 col-md-4" align="center">
                        <div class="thumbnail">
                    <a href="{{ url('tour-detail') }}">
                        <div class="tour-cover lazyloaded" data-bg="../images/card/tour1.jpg" style="background-image: url(https://images.unsplash.com/photo-1496284045406-d3e0b918d7ba?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=da8271878b509b7558a598dc60703949&auto=format&fit=crop&w=500&q=60;);">
                            <div class="tour-footer">
                                <div class="pull-left">
                                    <span class="flag">
                                        <img width="70%" alt="ทัวร์เวียดนาม" src="https://d4ulp9jtgcw4i.cloudfront.net/assets/countries/Vietnam/flag-9fb374d4ac69e1ef0f871250a59f1077.png">
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
                                        #6600
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
                                    <div class="card-detail">ทัวร์ฮ่องกง เกาะลันเตา วัดโป่วหลิน วัดแชกงหมิว นั่งรถรางพีคแทรม ยอดเขาวิคตรอเรีย พีค สวนสนุกดิสนีย์แลนด์เต็มวัน (รวมค่าตั๋ว) ชมโชว์ SYMPHONY OF LIGHT ช้อปปิ้งจิมซาจุ่ย ทัวร์ฮ่องกง 
                                        เกาะลันเตา วัดโป่วหลิน วัดแชกงหมิว นั่งรถรางพีคแทรม ยอดเขาวิคตรอเรีย พีค สวนสนุกดิสนีย์แลนด์เต็มวัน (รวมค่าตั๋ว) ชมโชว์ SYMPHONY OF LIGHT ช้อปปิ้งจิมซาจุ่ย ทัวร์ฮ่องกง เกาะลันเตา วัดโป่วหลิน วัดแชกงหมิว นั่งรถรางพีคแทรม 
                                        ยอดเขาวิคตรอเรีย พีค สวนสนุกดิสนีย์แลนด์เต็มวัน (รวมค่าตั๋ว) ชมโชว์ SYMPHONY OF LIGHT ช้อปปิ้งจิมซาจุ่ย</div>
                                    <hr>
                                    <div class="card-time"><i class="fas fa-calendar-alt"></i>&nbsp;ช่วงเวลา มิ.ย. - ส.ค.</div>
                                    <hr>
                                    <div class="card-airline"><img alt="การบินไทย" src="../images/airline/airasia_x.png" title="Air Asia X"></div>                                         
                                    <div class="card-price">฿49,900</div>
                                    <hr>
                                    <div class="button-card">
                                        <a href="#" class="btn btn-pdf"><i class="fas fa-cloud-download-alt"></i>&nbsp;PDF</a>
                                        <a href="#" class="btn btn-detail">ดูรายละเอียด</a>
                                    </div>
                                </div>
                                <div id="tab2" class="tab-pane">tab2 content</div>
                                <div id="tab3" class="tab-pane">tab3 content</div>
                            </div>
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tab1" data-toggle="tab" class="active">แพ็คเกจ</a></li>
                                <li><a href="#tab2" data-toggle="tab">ไฮไลท์</a></li>
                                <li><a href="#tab3" data-toggle="tab">ช่วงเวลา</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                    </div>
                    <div class="col-sm-6 col-md-4" align="center">
                        <div class="thumbnail">
                    <a href="{{ url('tour-detail') }}">
                        <div class="tour-cover lazyloaded" data-bg="../images/card/tour1.jpg" style="background-image: url(https://images.unsplash.com/photo-1496284045406-d3e0b918d7ba?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=da8271878b509b7558a598dc60703949&auto=format&fit=crop&w=500&q=60;);">
                            <div class="tour-footer">
                                <div class="pull-left">
                                    <span class="flag">
                                        <img width="70%" alt="ทัวร์เวียดนาม" src="https://d4ulp9jtgcw4i.cloudfront.net/assets/countries/Vietnam/flag-9fb374d4ac69e1ef0f871250a59f1077.png">
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
                                        #6600
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
                                    <div class="card-detail">ทัวร์ฮ่องกง เกาะลันเตา วัดโป่วหลิน วัดแชกงหมิว นั่งรถรางพีคแทรม ยอดเขาวิคตรอเรีย พีค สวนสนุกดิสนีย์แลนด์เต็มวัน (รวมค่าตั๋ว) ชมโชว์ SYMPHONY OF LIGHT ช้อปปิ้งจิมซาจุ่ย ทัวร์ฮ่องกง 
                                        เกาะลันเตา วัดโป่วหลิน วัดแชกงหมิว นั่งรถรางพีคแทรม ยอดเขาวิคตรอเรีย พีค สวนสนุกดิสนีย์แลนด์เต็มวัน (รวมค่าตั๋ว) ชมโชว์ SYMPHONY OF LIGHT ช้อปปิ้งจิมซาจุ่ย ทัวร์ฮ่องกง เกาะลันเตา วัดโป่วหลิน วัดแชกงหมิว นั่งรถรางพีคแทรม 
                                        ยอดเขาวิคตรอเรีย พีค สวนสนุกดิสนีย์แลนด์เต็มวัน (รวมค่าตั๋ว) ชมโชว์ SYMPHONY OF LIGHT ช้อปปิ้งจิมซาจุ่ย</div>
                                    <hr>
                                    <div class="card-time"><i class="fas fa-calendar-alt"></i>&nbsp;ช่วงเวลา มิ.ย. - ส.ค.</div>
                                    <hr>
                                    <div class="card-airline"><img alt="การบินไทย" src="../images/airline/airasia_x.png" title="Air Asia X"></div>                                         
                                    <div class="card-price">฿49,900</div>
                                    <hr>
                                    <div class="button-card">
                                        <a href="#" class="btn btn-pdf"><i class="fas fa-cloud-download-alt"></i>&nbsp;PDF</a>
                                        <a href="#" class="btn btn-detail">ดูรายละเอียด</a>
                                    </div>
                                </div>
                                <div id="tab2" class="tab-pane">tab2 content</div>
                                <div id="tab3" class="tab-pane">tab3 content</div>
                            </div>
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tab1" data-toggle="tab" class="active">แพ็คเกจ</a></li>
                                <li><a href="#tab2" data-toggle="tab">ไฮไลท์</a></li>
                                <li><a href="#tab3" data-toggle="tab">ช่วงเวลา</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                    </div>
                    <div class="col-sm-6 col-md-4" align="center">
                        <div class="thumbnail">
                    <a href="{{ url('tour-detail') }}">
                        <div class="tour-cover lazyloaded" data-bg="../images/card/tour1.jpg" style="background-image: url(https://images.unsplash.com/photo-1496284045406-d3e0b918d7ba?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=da8271878b509b7558a598dc60703949&auto=format&fit=crop&w=500&q=60;);">
                            <div class="tour-footer">
                                <div class="pull-left">
                                    <span class="flag">
                                        <img width="70%" alt="ทัวร์เวียดนาม" src="https://d4ulp9jtgcw4i.cloudfront.net/assets/countries/Vietnam/flag-9fb374d4ac69e1ef0f871250a59f1077.png">
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
                                        #6600
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
                                    <div class="card-detail">ทัวร์ฮ่องกง เกาะลันเตา วัดโป่วหลิน วัดแชกงหมิว นั่งรถรางพีคแทรม ยอดเขาวิคตรอเรีย พีค สวนสนุกดิสนีย์แลนด์เต็มวัน (รวมค่าตั๋ว) ชมโชว์ SYMPHONY OF LIGHT ช้อปปิ้งจิมซาจุ่ย ทัวร์ฮ่องกง 
                                        เกาะลันเตา วัดโป่วหลิน วัดแชกงหมิว นั่งรถรางพีคแทรม ยอดเขาวิคตรอเรีย พีค สวนสนุกดิสนีย์แลนด์เต็มวัน (รวมค่าตั๋ว) ชมโชว์ SYMPHONY OF LIGHT ช้อปปิ้งจิมซาจุ่ย ทัวร์ฮ่องกง เกาะลันเตา วัดโป่วหลิน วัดแชกงหมิว นั่งรถรางพีคแทรม 
                                        ยอดเขาวิคตรอเรีย พีค สวนสนุกดิสนีย์แลนด์เต็มวัน (รวมค่าตั๋ว) ชมโชว์ SYMPHONY OF LIGHT ช้อปปิ้งจิมซาจุ่ย</div>
                                    <hr>
                                    <div class="card-time"><i class="fas fa-calendar-alt"></i>&nbsp;ช่วงเวลา มิ.ย. - ส.ค.</div>
                                    <hr>
                                    <div class="card-airline"><img alt="การบินไทย" src="../images/airline/airasia_x.png" title="Air Asia X"></div>                                         
                                    <div class="card-price">฿49,900</div>
                                    <hr>
                                    <div class="button-card">
                                        <a href="#" class="btn btn-pdf"><i class="fas fa-cloud-download-alt"></i>&nbsp;PDF</a>
                                        <a href="#" class="btn btn-detail">ดูรายละเอียด</a>
                                    </div>
                                </div>
                                <div id="tab2" class="tab-pane">tab2 content</div>
                                <div id="tab3" class="tab-pane">tab3 content</div>
                            </div>
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tab1" data-toggle="tab" class="active">แพ็คเกจ</a></li>
                                <li><a href="#tab2" data-toggle="tab">ไฮไลท์</a></li>
                                <li><a href="#tab3" data-toggle="tab">ช่วงเวลา</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                    </div>
                    <div class="col-sm-6 col-md-4" align="center">
                        <div class="thumbnail">
                    <a href="{{ url('tour-detail') }}">
                        <div class="tour-cover lazyloaded" data-bg="../images/card/tour1.jpg" style="background-image: url(https://images.unsplash.com/photo-1496284045406-d3e0b918d7ba?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=da8271878b509b7558a598dc60703949&auto=format&fit=crop&w=500&q=60;);">
                            <div class="tour-footer">
                                <div class="pull-left">
                                    <span class="flag">
                                        <img width="70%" alt="ทัวร์เวียดนาม" src="https://d4ulp9jtgcw4i.cloudfront.net/assets/countries/Vietnam/flag-9fb374d4ac69e1ef0f871250a59f1077.png">
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
                                        #6600
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
                                    <div class="card-detail">ทัวร์ฮ่องกง เกาะลันเตา วัดโป่วหลิน วัดแชกงหมิว นั่งรถรางพีคแทรม ยอดเขาวิคตรอเรีย พีค สวนสนุกดิสนีย์แลนด์เต็มวัน (รวมค่าตั๋ว) ชมโชว์ SYMPHONY OF LIGHT ช้อปปิ้งจิมซาจุ่ย ทัวร์ฮ่องกง 
                                        เกาะลันเตา วัดโป่วหลิน วัดแชกงหมิว นั่งรถรางพีคแทรม ยอดเขาวิคตรอเรีย พีค สวนสนุกดิสนีย์แลนด์เต็มวัน (รวมค่าตั๋ว) ชมโชว์ SYMPHONY OF LIGHT ช้อปปิ้งจิมซาจุ่ย ทัวร์ฮ่องกง เกาะลันเตา วัดโป่วหลิน วัดแชกงหมิว นั่งรถรางพีคแทรม 
                                        ยอดเขาวิคตรอเรีย พีค สวนสนุกดิสนีย์แลนด์เต็มวัน (รวมค่าตั๋ว) ชมโชว์ SYMPHONY OF LIGHT ช้อปปิ้งจิมซาจุ่ย</div>
                                    <hr>
                                    <div class="card-time"><i class="fas fa-calendar-alt"></i>&nbsp;ช่วงเวลา มิ.ย. - ส.ค.</div>
                                    <hr>
                                    <div class="card-airline"><img alt="การบินไทย" src="../images/airline/airasia_x.png" title="Air Asia X"></div>                                         
                                    <div class="card-price">฿49,900</div>
                                    <hr>
                                    <div class="button-card">
                                        <a href="#" class="btn btn-pdf"><i class="fas fa-cloud-download-alt"></i>&nbsp;PDF</a>
                                        <a href="#" class="btn btn-detail">ดูรายละเอียด</a>
                                    </div>
                                </div>
                                <div id="tab2" class="tab-pane">tab2 content</div>
                                <div id="tab3" class="tab-pane">tab3 content</div>
                            </div>
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tab1" data-toggle="tab" class="active">แพ็คเกจ</a></li>
                                <li><a href="#tab2" data-toggle="tab">ไฮไลท์</a></li>
                                <li><a href="#tab3" data-toggle="tab">ช่วงเวลา</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                    </div>
                    <div class="col-sm-6 col-md-4" align="center">
                        <div class="thumbnail">
                        <a href="{{ url('tour-detail') }}">
                            <div class="tour-cover lazyloaded" data-bg="../images/card/tour1.jpg" style="background-image: url(https://images.unsplash.com/photo-1496284045406-d3e0b918d7ba?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=da8271878b509b7558a598dc60703949&auto=format&fit=crop&w=500&q=60;);">
                                    <div class="tour-footer">
                                        <div class="pull-left">
                                            <span class="flag">
                                                <img width="70%" alt="ทัวร์เวียดนาม" src="https://d4ulp9jtgcw4i.cloudfront.net/assets/countries/Vietnam/flag-9fb374d4ac69e1ef0f871250a59f1077.png">
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
                                                #6600
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
                                        <div class="card-detail">ทัวร์ฮ่องกง เกาะลันเตา วัดโป่วหลิน วัดแชกงหมิว นั่งรถรางพีคแทรม ยอดเขาวิคตรอเรีย พีค สวนสนุกดิสนีย์แลนด์เต็มวัน (รวมค่าตั๋ว) ชมโชว์ SYMPHONY OF LIGHT ช้อปปิ้งจิมซาจุ่ย ทัวร์ฮ่องกง 
                                            เกาะลันเตา วัดโป่วหลิน วัดแชกงหมิว นั่งรถรางพีคแทรม ยอดเขาวิคตรอเรีย พีค สวนสนุกดิสนีย์แลนด์เต็มวัน (รวมค่าตั๋ว) ชมโชว์ SYMPHONY OF LIGHT ช้อปปิ้งจิมซาจุ่ย ทัวร์ฮ่องกง เกาะลันเตา วัดโป่วหลิน วัดแชกงหมิว นั่งรถรางพีคแทรม 
                                            ยอดเขาวิคตรอเรีย พีค สวนสนุกดิสนีย์แลนด์เต็มวัน (รวมค่าตั๋ว) ชมโชว์ SYMPHONY OF LIGHT ช้อปปิ้งจิมซาจุ่ย</div>
                                        <hr>
                                        <div class="card-time"><i class="fas fa-calendar-alt"></i>&nbsp;ช่วงเวลา มิ.ย. - ส.ค.</div>
                                        <hr>
                                        <div class="card-airline"><img alt="การบินไทย" src="../images/airline/airasia_x.png" title="Air Asia X"></div>                                         
                                        <div class="card-price">฿49,900</div>
                                        <hr>
                                        <div class="button-card">
                                            <a href="#" class="btn btn-pdf"><i class="fas fa-cloud-download-alt"></i>&nbsp;PDF</a>
                                            <a href="#" class="btn btn-detail">ดูรายละเอียด</a>
                                        </div>
                                    </div>
                                    <div id="tab2" class="tab-pane">tab2 content</div>
                                    <div id="tab3" class="tab-pane">tab3 content</div>
                                </div>
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#tab1" data-toggle="tab" class="active">แพ็คเกจ</a></li>
                                    <li><a href="#tab2" data-toggle="tab">ไฮไลท์</a></li>
                                    <li><a href="#tab3" data-toggle="tab">ช่วงเวลา</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="col-sm-6 col-md-4" align="center">
                        <div class="thumbnail">
                        <a href="{{ url('tour-detail') }}">
                            <div class="tour-cover lazyloaded" data-bg="../images/card/tour1.jpg" style="background-image: url(https://images.unsplash.com/photo-1496284045406-d3e0b918d7ba?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=da8271878b509b7558a598dc60703949&auto=format&fit=crop&w=500&q=60;);">
                                <div class="tour-footer">
                                    <div class="pull-left">
                                        <span class="flag">
                                            <img width="70%" alt="ทัวร์เวียดนาม" src="https://d4ulp9jtgcw4i.cloudfront.net/assets/countries/Vietnam/flag-9fb374d4ac69e1ef0f871250a59f1077.png">
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
                                            #6600
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
                                        <div class="card-detail">ทัวร์ฮ่องกง เกาะลันเตา วัดโป่วหลิน วัดแชกงหมิว นั่งรถรางพีคแทรม ยอดเขาวิคตรอเรีย พีค สวนสนุกดิสนีย์แลนด์เต็มวัน (รวมค่าตั๋ว) ชมโชว์ SYMPHONY OF LIGHT ช้อปปิ้งจิมซาจุ่ย ทัวร์ฮ่องกง 
                                            เกาะลันเตา วัดโป่วหลิน วัดแชกงหมิว นั่งรถรางพีคแทรม ยอดเขาวิคตรอเรีย พีค สวนสนุกดิสนีย์แลนด์เต็มวัน (รวมค่าตั๋ว) ชมโชว์ SYMPHONY OF LIGHT ช้อปปิ้งจิมซาจุ่ย ทัวร์ฮ่องกง เกาะลันเตา วัดโป่วหลิน วัดแชกงหมิว นั่งรถรางพีคแทรม 
                                            ยอดเขาวิคตรอเรีย พีค สวนสนุกดิสนีย์แลนด์เต็มวัน (รวมค่าตั๋ว) ชมโชว์ SYMPHONY OF LIGHT ช้อปปิ้งจิมซาจุ่ย</div>
                                        <hr>
                                        <div class="card-time"><i class="fas fa-calendar-alt"></i>&nbsp;ช่วงเวลา มิ.ย. - ส.ค.</div>
                                        <hr>
                                        <div class="card-airline"><img alt="การบินไทย" src="../images/airline/airasia_x.png" title="Air Asia X"></div>                                         
                                        <div class="card-price">฿49,900</div>
                                        <hr>
                                        <div class="button-card">
                                            <a href="#" class="btn btn-pdf"><i class="fas fa-cloud-download-alt"></i>&nbsp;PDF</a>
                                            <a href="#" class="btn btn-detail">ดูรายละเอียด</a>
                                        </div>
                                    </div>
                                    <div id="tab2" class="tab-pane">tab2 content</div>
                                    <div id="tab3" class="tab-pane">tab3 content</div>
                                </div>
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#tab1" data-toggle="tab" class="active">แพ็คเกจ</a></li>
                                    <li><a href="#tab2" data-toggle="tab">ไฮไลท์</a></li>
                                    <li><a href="#tab3" data-toggle="tab">ช่วงเวลา</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="col-sm-6 col-md-4" align="center">
                        <div class="thumbnail">
                        <a href="{{ url('tour-detail') }}">
                            <div class="tour-cover lazyloaded" data-bg="../images/card/tour1.jpg" style="background-image: url(https://images.unsplash.com/photo-1496284045406-d3e0b918d7ba?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=da8271878b509b7558a598dc60703949&auto=format&fit=crop&w=500&q=60;);">
                                <div class="tour-footer">
                                    <div class="pull-left">
                                        <span class="flag">
                                            <img width="70%" alt="ทัวร์เวียดนาม" src="https://d4ulp9jtgcw4i.cloudfront.net/assets/countries/Vietnam/flag-9fb374d4ac69e1ef0f871250a59f1077.png">
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
                                            #6600
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
                                        <div class="card-detail">ทัวร์ฮ่องกง เกาะลันเตา วัดโป่วหลิน วัดแชกงหมิว นั่งรถรางพีคแทรม ยอดเขาวิคตรอเรีย พีค สวนสนุกดิสนีย์แลนด์เต็มวัน (รวมค่าตั๋ว) ชมโชว์ SYMPHONY OF LIGHT ช้อปปิ้งจิมซาจุ่ย ทัวร์ฮ่องกง 
                                            เกาะลันเตา วัดโป่วหลิน วัดแชกงหมิว นั่งรถรางพีคแทรม ยอดเขาวิคตรอเรีย พีค สวนสนุกดิสนีย์แลนด์เต็มวัน (รวมค่าตั๋ว) ชมโชว์ SYMPHONY OF LIGHT ช้อปปิ้งจิมซาจุ่ย ทัวร์ฮ่องกง เกาะลันเตา วัดโป่วหลิน วัดแชกงหมิว นั่งรถรางพีคแทรม 
                                            ยอดเขาวิคตรอเรีย พีค สวนสนุกดิสนีย์แลนด์เต็มวัน (รวมค่าตั๋ว) ชมโชว์ SYMPHONY OF LIGHT ช้อปปิ้งจิมซาจุ่ย</div>
                                        <hr>
                                        <div class="card-time"><i class="fas fa-calendar-alt"></i>&nbsp;ช่วงเวลา มิ.ย. - ส.ค.</div>
                                        <hr>
                                        <div class="card-airline"><img alt="การบินไทย" src="../images/airline/airasia_x.png" title="Air Asia X"></div>                                         
                                        <div class="card-price">฿49,900</div>
                                        <hr>
                                        <div class="button-card">
                                            <a href="#" class="btn btn-pdf"><i class="fas fa-cloud-download-alt"></i>&nbsp;PDF</a>
                                            <a href="#" class="btn btn-detail">ดูรายละเอียด</a>
                                        </div>
                                    </div>
                                    <div id="tab2" class="tab-pane">tab2 content</div>
                                    <div id="tab3" class="tab-pane">tab3 content</div>
                                </div>
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#tab1" data-toggle="tab" class="active">แพ็คเกจ</a></li>
                                    <li><a href="#tab2" data-toggle="tab">ไฮไลท์</a></li>
                                    <li><a href="#tab3" data-toggle="tab">ช่วงเวลา</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="col-sm-6 col-md-4" align="center">
                        <div class="thumbnail">
                    <a href="{{ url('tour-detail') }}">
                        <div class="tour-cover lazyloaded" data-bg="../images/card/tour1.jpg" style="background-image: url(https://images.unsplash.com/photo-1496284045406-d3e0b918d7ba?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=da8271878b509b7558a598dc60703949&auto=format&fit=crop&w=500&q=60;);">
                            <div class="tour-footer">
                                <div class="pull-left">
                                    <span class="flag">
                                        <img width="70%" alt="ทัวร์เวียดนาม" src="https://d4ulp9jtgcw4i.cloudfront.net/assets/countries/Vietnam/flag-9fb374d4ac69e1ef0f871250a59f1077.png">
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
                                        #6600
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
                                    <div class="card-detail">ทัวร์ฮ่องกง เกาะลันเตา วัดโป่วหลิน วัดแชกงหมิว นั่งรถรางพีคแทรม ยอดเขาวิคตรอเรีย พีค สวนสนุกดิสนีย์แลนด์เต็มวัน (รวมค่าตั๋ว) ชมโชว์ SYMPHONY OF LIGHT ช้อปปิ้งจิมซาจุ่ย ทัวร์ฮ่องกง 
                                        เกาะลันเตา วัดโป่วหลิน วัดแชกงหมิว นั่งรถรางพีคแทรม ยอดเขาวิคตรอเรีย พีค สวนสนุกดิสนีย์แลนด์เต็มวัน (รวมค่าตั๋ว) ชมโชว์ SYMPHONY OF LIGHT ช้อปปิ้งจิมซาจุ่ย ทัวร์ฮ่องกง เกาะลันเตา วัดโป่วหลิน วัดแชกงหมิว นั่งรถรางพีคแทรม 
                                        ยอดเขาวิคตรอเรีย พีค สวนสนุกดิสนีย์แลนด์เต็มวัน (รวมค่าตั๋ว) ชมโชว์ SYMPHONY OF LIGHT ช้อปปิ้งจิมซาจุ่ย</div>
                                    <hr>
                                    <div class="card-time"><i class="fas fa-calendar-alt"></i>&nbsp;ช่วงเวลา มิ.ย. - ส.ค.</div>
                                    <hr>
                                    <div class="card-airline"><img alt="การบินไทย" src="../images/airline/airasia_x.png" title="Air Asia X"></div>                                         
                                    <div class="card-price">฿49,900</div>
                                    <hr>
                                    <div class="button-card">
                                        <a href="#" class="btn btn-pdf"><i class="fas fa-cloud-download-alt"></i>&nbsp;PDF</a>
                                        <a href="#" class="btn btn-detail">ดูรายละเอียด</a>
                                    </div>
                                </div>
                                <div id="tab2" class="tab-pane">tab2 content</div>
                                <div id="tab3" class="tab-pane">tab3 content</div>
                            </div>
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tab1" data-toggle="tab" class="active">แพ็คเกจ</a></li>
                                <li><a href="#tab2" data-toggle="tab">ไฮไลท์</a></li>
                                <li><a href="#tab3" data-toggle="tab">ช่วงเวลา</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                    </div>
                    <div class="col-sm-6 col-md-4" align="center">
                        <div class="thumbnail">
                        <a href="{{ url('tour-detail') }}">
                            <div class="tour-cover lazyloaded" data-bg="../images/card/tour1.jpg" style="background-image: url(https://images.unsplash.com/photo-1496284045406-d3e0b918d7ba?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=da8271878b509b7558a598dc60703949&auto=format&fit=crop&w=500&q=60;);">
                                <div class="tour-footer">
                                    <div class="pull-left">
                                        <span class="flag">
                                            <img width="70%" alt="ทัวร์เวียดนาม" src="https://d4ulp9jtgcw4i.cloudfront.net/assets/countries/Vietnam/flag-9fb374d4ac69e1ef0f871250a59f1077.png">
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
                                            #6600
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
                                        <div class="card-detail">ทัวร์ฮ่องกง เกาะลันเตา วัดโป่วหลิน วัดแชกงหมิว นั่งรถรางพีคแทรม ยอดเขาวิคตรอเรีย พีค สวนสนุกดิสนีย์แลนด์เต็มวัน (รวมค่าตั๋ว) ชมโชว์ SYMPHONY OF LIGHT ช้อปปิ้งจิมซาจุ่ย ทัวร์ฮ่องกง 
                                            เกาะลันเตา วัดโป่วหลิน วัดแชกงหมิว นั่งรถรางพีคแทรม ยอดเขาวิคตรอเรีย พีค สวนสนุกดิสนีย์แลนด์เต็มวัน (รวมค่าตั๋ว) ชมโชว์ SYMPHONY OF LIGHT ช้อปปิ้งจิมซาจุ่ย ทัวร์ฮ่องกง เกาะลันเตา วัดโป่วหลิน วัดแชกงหมิว นั่งรถรางพีคแทรม 
                                            ยอดเขาวิคตรอเรีย พีค สวนสนุกดิสนีย์แลนด์เต็มวัน (รวมค่าตั๋ว) ชมโชว์ SYMPHONY OF LIGHT ช้อปปิ้งจิมซาจุ่ย</div>
                                        <hr>
                                        <div class="card-time"><i class="fas fa-calendar-alt"></i>&nbsp;ช่วงเวลา มิ.ย. - ส.ค.</div>
                                        <hr>
                                        <div class="card-airline"><img alt="การบินไทย" src="../images/airline/airasia_x.png" title="Air Asia X"></div>                                         
                                        <div class="card-price">฿49,900</div>
                                        <hr>
                                        <div class="button-card">
                                            <a href="#" class="btn btn-pdf"><i class="fas fa-cloud-download-alt"></i>&nbsp;PDF</a>
                                            <a href="#" class="btn btn-detail">ดูรายละเอียด</a>
                                        </div>
                                    </div>
                                    <div id="tab2" class="tab-pane">tab2 content</div>
                                    <div id="tab3" class="tab-pane">tab3 content</div>
                                </div>
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#tab1" data-toggle="tab" class="active">แพ็คเกจ</a></li>
                                    <li><a href="#tab2" data-toggle="tab">ไฮไลท์</a></li>
                                    <li><a href="#tab3" data-toggle="tab">ช่วงเวลา</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="col-sm-6 col-md-4" align="center">
                        <div class="thumbnail">
                        <a href="{{ url('tour-detail') }}">
                            <div class="tour-cover lazyloaded" data-bg="../images/card/tour1.jpg" style="background-image: url(https://images.unsplash.com/photo-1496284045406-d3e0b918d7ba?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=da8271878b509b7558a598dc60703949&auto=format&fit=crop&w=500&q=60;);">
                                <div class="tour-footer">
                                    <div class="pull-left">
                                        <span class="flag">
                                            <img width="70%" alt="ทัวร์เวียดนาม" src="https://d4ulp9jtgcw4i.cloudfront.net/assets/countries/Vietnam/flag-9fb374d4ac69e1ef0f871250a59f1077.png">
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
                                            #6600
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
                                        <div class="card-detail">ทัวร์ฮ่องกง เกาะลันเตา วัดโป่วหลิน วัดแชกงหมิว นั่งรถรางพีคแทรม ยอดเขาวิคตรอเรีย พีค สวนสนุกดิสนีย์แลนด์เต็มวัน (รวมค่าตั๋ว) ชมโชว์ SYMPHONY OF LIGHT ช้อปปิ้งจิมซาจุ่ย ทัวร์ฮ่องกง 
                                            เกาะลันเตา วัดโป่วหลิน วัดแชกงหมิว นั่งรถรางพีคแทรม ยอดเขาวิคตรอเรีย พีค สวนสนุกดิสนีย์แลนด์เต็มวัน (รวมค่าตั๋ว) ชมโชว์ SYMPHONY OF LIGHT ช้อปปิ้งจิมซาจุ่ย ทัวร์ฮ่องกง เกาะลันเตา วัดโป่วหลิน วัดแชกงหมิว นั่งรถรางพีคแทรม 
                                            ยอดเขาวิคตรอเรีย พีค สวนสนุกดิสนีย์แลนด์เต็มวัน (รวมค่าตั๋ว) ชมโชว์ SYMPHONY OF LIGHT ช้อปปิ้งจิมซาจุ่ย</div>
                                        <hr>
                                        <div class="card-time"><i class="fas fa-calendar-alt"></i>&nbsp;ช่วงเวลา มิ.ย. - ส.ค.</div>
                                        <hr>
                                        <div class="card-airline"><img alt="การบินไทย" src="../images/airline/airasia_x.png" title="Air Asia X"></div>                                         
                                        <div class="card-price">฿49,900</div>
                                        <hr>
                                        <div class="button-card">
                                            <a href="#" class="btn btn-pdf"><i class="fas fa-cloud-download-alt"></i>&nbsp;PDF</a>
                                            <a href="#" class="btn btn-detail">ดูรายละเอียด</a>
                                        </div>
                                    </div>
                                    <div id="tab2" class="tab-pane">tab2 content</div>
                                    <div id="tab3" class="tab-pane">tab3 content</div>
                                </div>
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#tab1" data-toggle="tab" class="active">แพ็คเกจ</a></li>
                                    <li><a href="#tab2" data-toggle="tab">ไฮไลท์</a></li>
                                    <li><a href="#tab3" data-toggle="tab">ช่วงเวลา</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="col-sm-6 col-md-4" align="center">
                        <div class="thumbnail">
                        <a href="{{ url('tour-detail') }}">
                            <div class="tour-cover lazyloaded" data-bg="../images/card/tour1.jpg" style="background-image: url(https://images.unsplash.com/photo-1496284045406-d3e0b918d7ba?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=da8271878b509b7558a598dc60703949&auto=format&fit=crop&w=500&q=60;);">
                                <div class="tour-footer">
                                    <div class="pull-left">
                                        <span class="flag">
                                            <img width="70%" alt="ทัวร์เวียดนาม" src="https://d4ulp9jtgcw4i.cloudfront.net/assets/countries/Vietnam/flag-9fb374d4ac69e1ef0f871250a59f1077.png">
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
                                            #6600
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
                                        <div class="card-detail">ทัวร์ฮ่องกง เกาะลันเตา วัดโป่วหลิน วัดแชกงหมิว นั่งรถรางพีคแทรม ยอดเขาวิคตรอเรีย พีค สวนสนุกดิสนีย์แลนด์เต็มวัน (รวมค่าตั๋ว) ชมโชว์ SYMPHONY OF LIGHT ช้อปปิ้งจิมซาจุ่ย ทัวร์ฮ่องกง 
                                            เกาะลันเตา วัดโป่วหลิน วัดแชกงหมิว นั่งรถรางพีคแทรม ยอดเขาวิคตรอเรีย พีค สวนสนุกดิสนีย์แลนด์เต็มวัน (รวมค่าตั๋ว) ชมโชว์ SYMPHONY OF LIGHT ช้อปปิ้งจิมซาจุ่ย ทัวร์ฮ่องกง เกาะลันเตา วัดโป่วหลิน วัดแชกงหมิว นั่งรถรางพีคแทรม 
                                            ยอดเขาวิคตรอเรีย พีค สวนสนุกดิสนีย์แลนด์เต็มวัน (รวมค่าตั๋ว) ชมโชว์ SYMPHONY OF LIGHT ช้อปปิ้งจิมซาจุ่ย</div>
                                        <hr>
                                        <div class="card-time"><i class="fas fa-calendar-alt"></i>&nbsp;ช่วงเวลา มิ.ย. - ส.ค.</div>
                                        <hr>
                                        <div class="card-airline"><img alt="การบินไทย" src="../images/airline/airasia_x.png" title="Air Asia X"></div>                                         
                                        <div class="card-price">฿49,900</div>
                                        <hr>
                                        <div class="button-card">
                                            <a href="#" class="btn btn-pdf"><i class="fas fa-cloud-download-alt"></i>&nbsp;PDF</a>
                                            <a href="#" class="btn btn-detail">ดูรายละเอียด</a>
                                        </div>
                                    </div>
                                    <div id="tab2" class="tab-pane">tab2 content</div>
                                    <div id="tab3" class="tab-pane">tab3 content</div>
                                </div>
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#tab1" data-toggle="tab" class="active">แพ็คเกจ</a></li>
                                    <li><a href="#tab2" data-toggle="tab">ไฮไลท์</a></li>
                                    <li><a href="#tab3" data-toggle="tab">ช่วงเวลา</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="col-sm-6 col-md-4" align="center">
                        <div class="thumbnail">
                        <a href="{{ url('tour-detail') }}">
                            <div class="tour-cover lazyloaded" data-bg="../images/card/tour1.jpg" style="background-image: url(https://images.unsplash.com/photo-1496284045406-d3e0b918d7ba?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=da8271878b509b7558a598dc60703949&auto=format&fit=crop&w=500&q=60;);">
                                <div class="tour-footer">
                                    <div class="pull-left">
                                        <span class="flag">
                                            <img width="70%" alt="ทัวร์เวียดนาม" src="https://d4ulp9jtgcw4i.cloudfront.net/assets/countries/Vietnam/flag-9fb374d4ac69e1ef0f871250a59f1077.png">
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
                                            #6600
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
                                        <div class="card-detail">ทัวร์ฮ่องกง เกาะลันเตา วัดโป่วหลิน วัดแชกงหมิว นั่งรถรางพีคแทรม ยอดเขาวิคตรอเรีย พีค สวนสนุกดิสนีย์แลนด์เต็มวัน (รวมค่าตั๋ว) ชมโชว์ SYMPHONY OF LIGHT ช้อปปิ้งจิมซาจุ่ย ทัวร์ฮ่องกง 
                                            เกาะลันเตา วัดโป่วหลิน วัดแชกงหมิว นั่งรถรางพีคแทรม ยอดเขาวิคตรอเรีย พีค สวนสนุกดิสนีย์แลนด์เต็มวัน (รวมค่าตั๋ว) ชมโชว์ SYMPHONY OF LIGHT ช้อปปิ้งจิมซาจุ่ย ทัวร์ฮ่องกง เกาะลันเตา วัดโป่วหลิน วัดแชกงหมิว นั่งรถรางพีคแทรม 
                                            ยอดเขาวิคตรอเรีย พีค สวนสนุกดิสนีย์แลนด์เต็มวัน (รวมค่าตั๋ว) ชมโชว์ SYMPHONY OF LIGHT ช้อปปิ้งจิมซาจุ่ย</div>
                                        <hr>
                                        <div class="card-time"><i class="fas fa-calendar-alt"></i>&nbsp;ช่วงเวลา มิ.ย. - ส.ค.</div>
                                        <hr>
                                        <div class="card-airline"><img alt="การบินไทย" src="../images/airline/airasia_x.png" title="Air Asia X"></div>                                         
                                        <div class="card-price">฿49,900</div>
                                        <hr>
                                        <div class="button-card">
                                            <a href="#" class="btn btn-pdf"><i class="fas fa-cloud-download-alt"></i>&nbsp;PDF</a>
                                            <a href="#" class="btn btn-detail">ดูรายละเอียด</a>
                                        </div>
                                    </div>
                                    <div id="tab2" class="tab-pane">tab2 content</div>
                                    <div id="tab3" class="tab-pane">tab3 content</div>
                                </div>
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#tab1" data-toggle="tab" class="active">แพ็คเกจ</a></li>
                                    <li><a href="#tab2" data-toggle="tab">ไฮไลท์</a></li>
                                    <li><a href="#tab3" data-toggle="tab">ช่วงเวลา</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="col-sm-6 col-md-4" align="center">
                        <div class="thumbnail">
                        <a href="{{ url('tour-detail') }}">
                            <div class="tour-cover lazyloaded" data-bg="../images/card/tour1.jpg" style="background-image: url(https://images.unsplash.com/photo-1496284045406-d3e0b918d7ba?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=da8271878b509b7558a598dc60703949&auto=format&fit=crop&w=500&q=60;);">
                                <div class="tour-footer">
                                    <div class="pull-left">
                                        <span class="flag">
                                            <img width="70%" alt="ทัวร์เวียดนาม" src="https://d4ulp9jtgcw4i.cloudfront.net/assets/countries/Vietnam/flag-9fb374d4ac69e1ef0f871250a59f1077.png">
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
                                            #6600
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
                                        <div class="card-detail">ทัวร์ฮ่องกง เกาะลันเตา วัดโป่วหลิน วัดแชกงหมิว นั่งรถรางพีคแทรม ยอดเขาวิคตรอเรีย พีค สวนสนุกดิสนีย์แลนด์เต็มวัน (รวมค่าตั๋ว) ชมโชว์ SYMPHONY OF LIGHT ช้อปปิ้งจิมซาจุ่ย ทัวร์ฮ่องกง 
                                            เกาะลันเตา วัดโป่วหลิน วัดแชกงหมิว นั่งรถรางพีคแทรม ยอดเขาวิคตรอเรีย พีค สวนสนุกดิสนีย์แลนด์เต็มวัน (รวมค่าตั๋ว) ชมโชว์ SYMPHONY OF LIGHT ช้อปปิ้งจิมซาจุ่ย ทัวร์ฮ่องกง เกาะลันเตา วัดโป่วหลิน วัดแชกงหมิว นั่งรถรางพีคแทรม 
                                            ยอดเขาวิคตรอเรีย พีค สวนสนุกดิสนีย์แลนด์เต็มวัน (รวมค่าตั๋ว) ชมโชว์ SYMPHONY OF LIGHT ช้อปปิ้งจิมซาจุ่ย</div>
                                        <hr>
                                        <div class="card-time"><i class="fas fa-calendar-alt"></i>&nbsp;ช่วงเวลา มิ.ย. - ส.ค.</div>
                                        <hr>
                                        <div class="card-airline"><img alt="การบินไทย" src="../images/airline/airasia_x.png" title="Air Asia X"></div>                                         
                                        <div class="card-price">฿49,900</div>
                                        <hr>
                                        <div class="button-card">
                                            <a href="#" class="btn btn-pdf"><i class="fas fa-cloud-download-alt"></i>&nbsp;PDF</a>
                                            <a href="#" class="btn btn-detail">ดูรายละเอียด</a>
                                        </div>
                                    </div>
                                    <div id="tab2" class="tab-pane">tab2 content</div>
                                    <div id="tab3" class="tab-pane">tab3 content</div>
                                </div>
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#tab1" data-toggle="tab" class="active">แพ็คเกจ</a></li>
                                    <li><a href="#tab2" data-toggle="tab">ไฮไลท์</a></li>
                                    <li><a href="#tab3" data-toggle="tab">ช่วงเวลา</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="col-sm-6 col-md-4" align="center">
                        <div class="thumbnail">
                        <a href="{{ url('tour-detail') }}">
                            <div class="tour-cover lazyloaded" data-bg="../images/card/tour1.jpg" style="background-image: url(https://images.unsplash.com/photo-1496284045406-d3e0b918d7ba?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=da8271878b509b7558a598dc60703949&auto=format&fit=crop&w=500&q=60;);">
                                <div class="tour-footer">
                                    <div class="pull-left">
                                        <span class="flag">
                                            <img width="70%" alt="ทัวร์เวียดนาม" src="https://d4ulp9jtgcw4i.cloudfront.net/assets/countries/Vietnam/flag-9fb374d4ac69e1ef0f871250a59f1077.png">
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
                                            #6600
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
                                        <div class="card-detail">ทัวร์ฮ่องกง เกาะลันเตา วัดโป่วหลิน วัดแชกงหมิว นั่งรถรางพีคแทรม ยอดเขาวิคตรอเรีย พีค สวนสนุกดิสนีย์แลนด์เต็มวัน (รวมค่าตั๋ว) ชมโชว์ SYMPHONY OF LIGHT ช้อปปิ้งจิมซาจุ่ย ทัวร์ฮ่องกง 
                                            เกาะลันเตา วัดโป่วหลิน วัดแชกงหมิว นั่งรถรางพีคแทรม ยอดเขาวิคตรอเรีย พีค สวนสนุกดิสนีย์แลนด์เต็มวัน (รวมค่าตั๋ว) ชมโชว์ SYMPHONY OF LIGHT ช้อปปิ้งจิมซาจุ่ย ทัวร์ฮ่องกง เกาะลันเตา วัดโป่วหลิน วัดแชกงหมิว นั่งรถรางพีคแทรม 
                                            ยอดเขาวิคตรอเรีย พีค สวนสนุกดิสนีย์แลนด์เต็มวัน (รวมค่าตั๋ว) ชมโชว์ SYMPHONY OF LIGHT ช้อปปิ้งจิมซาจุ่ย</div>
                                        <hr>
                                        <div class="card-time"><i class="fas fa-calendar-alt"></i>&nbsp;ช่วงเวลา มิ.ย. - ส.ค.</div>
                                        <hr>
                                        <div class="card-airline"><img alt="การบินไทย" src="../images/airline/airasia_x.png" title="Air Asia X"></div>                                         
                                        <div class="card-price">฿49,900</div>
                                        <hr>
                                        <div class="button-card">
                                            <a href="#" class="btn btn-pdf"><i class="fas fa-cloud-download-alt"></i>&nbsp;PDF</a>
                                            <a href="#" class="btn btn-detail">ดูรายละเอียด</a>
                                        </div>
                                    </div>
                                    <div id="tab2" class="tab-pane">tab2 content</div>
                                    <div id="tab3" class="tab-pane">tab3 content</div>
                                </div>
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#tab1" data-toggle="tab" class="active">แพ็คเกจ</a></li>
                                    <li><a href="#tab2" data-toggle="tab">ไฮไลท์</a></li>
                                    <li><a href="#tab3" data-toggle="tab">ช่วงเวลา</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="col-sm-6 col-md-4" align="center">
                        <div class="thumbnail">
                        <a href="{{ url('tour-detail') }}">
                            <div class="tour-cover lazyloaded" data-bg="../images/card/tour1.jpg" style="background-image: url(https://images.unsplash.com/photo-1496284045406-d3e0b918d7ba?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=da8271878b509b7558a598dc60703949&auto=format&fit=crop&w=500&q=60;);">
                                <div class="tour-footer">
                                    <div class="pull-left">
                                        <span class="flag">
                                            <img width="70%" alt="ทัวร์เวียดนาม" src="https://d4ulp9jtgcw4i.cloudfront.net/assets/countries/Vietnam/flag-9fb374d4ac69e1ef0f871250a59f1077.png">
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
                                            #6600
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
                                        <div class="card-detail">ทัวร์ฮ่องกง เกาะลันเตา วัดโป่วหลิน วัดแชกงหมิว นั่งรถรางพีคแทรม ยอดเขาวิคตรอเรีย พีค สวนสนุกดิสนีย์แลนด์เต็มวัน (รวมค่าตั๋ว) ชมโชว์ SYMPHONY OF LIGHT ช้อปปิ้งจิมซาจุ่ย ทัวร์ฮ่องกง 
                                            เกาะลันเตา วัดโป่วหลิน วัดแชกงหมิว นั่งรถรางพีคแทรม ยอดเขาวิคตรอเรีย พีค สวนสนุกดิสนีย์แลนด์เต็มวัน (รวมค่าตั๋ว) ชมโชว์ SYMPHONY OF LIGHT ช้อปปิ้งจิมซาจุ่ย ทัวร์ฮ่องกง เกาะลันเตา วัดโป่วหลิน วัดแชกงหมิว นั่งรถรางพีคแทรม 
                                            ยอดเขาวิคตรอเรีย พีค สวนสนุกดิสนีย์แลนด์เต็มวัน (รวมค่าตั๋ว) ชมโชว์ SYMPHONY OF LIGHT ช้อปปิ้งจิมซาจุ่ย</div>
                                        <hr>
                                        <div class="card-time"><i class="fas fa-calendar-alt"></i>&nbsp;ช่วงเวลา มิ.ย. - ส.ค.</div>
                                        <hr>
                                        <div class="card-airline"><img alt="การบินไทย" src="../images/airline/airasia_x.png" title="Air Asia X"></div>                                         
                                        <div class="card-price">฿49,900</div>
                                        <hr>
                                        <div class="button-card">
                                            <a href="#" class="btn btn-pdf"><i class="fas fa-cloud-download-alt"></i>&nbsp;PDF</a>
                                            <a href="#" class="btn btn-detail">ดูรายละเอียด</a>
                                        </div>
                                    </div>
                                    <div id="tab2" class="tab-pane">tab2 content</div>
                                    <div id="tab3" class="tab-pane">tab3 content</div>
                                </div>
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#tab1" data-toggle="tab" class="active">แพ็คเกจ</a></li>
                                    <li><a href="#tab2" data-toggle="tab">ไฮไลท์</a></li>
                                    <li><a href="#tab3" data-toggle="tab">ช่วงเวลา</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                <!--ปุ่ม next-->
                <div class="row">
                    <div class="col-md-12">
                        <ul class="pagination" id="search_tour_pager"></ul>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-md-pull-9 filter-bar">
                <div class="filter-price">
                    <div class='filter-header'>
                        <span class='filter-header-text'>฿ ราคา</span>
                    </div>
                    <div class="textsm">กำหนดช่วงราคา</div>
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
                        <div class="option">
                            <label for="5" class="label-cbx">
                                <input id="5" type="checkbox" class="invisible">
                                <div class="checkbox">
                                    <svg width="20px" height="20px" viewBox="0 0 20 20">
                                    <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                                    <polyline points="4 11 8 15 16 6"></polyline>
                                    </svg>
                                </div>
                                <span class="name">test</span>
                                <span class="count">(1)</span>
                                <span class="clear"></span>
                            </label>
                        </div>
                        <div class="option">
                            <label for="5" class="label-cbx">
                                <input id="5" type="checkbox" class="invisible">
                                <div class="checkbox">
                                    <svg width="20px" height="20px" viewBox="0 0 20 20">
                                    <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                                    <polyline points="4 11 8 15 16 6"></polyline>
                                    </svg>
                                </div>
                                <span class="name">test</span>
                                <span class="count">(1)</span>
                                <span class="clear"></span>
                            </label>
                        </div>
                        <div class="option">
                            <label for="5" class="label-cbx">
                                <input id="5" type="checkbox" class="invisible">
                                <div class="checkbox">
                                    <svg width="20px" height="20px" viewBox="0 0 20 20">
                                    <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                                    <polyline points="4 11 8 15 16 6"></polyline>
                                    </svg>
                                </div>
                                <span class="name">test</span>
                                <span class="count">(1)</span>
                                <span class="clear"></span>
                            </label>
                        </div>
                        <div class="option">
                            <label for="5" class="label-cbx">
                                <input id="5" type="checkbox" class="invisible">
                                <div class="checkbox">
                                    <svg width="20px" height="20px" viewBox="0 0 20 20">
                                    <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                                    <polyline points="4 11 8 15 16 6"></polyline>
                                    </svg>
                                </div>
                                <span class="name">test</span>
                                <span class="count">(1)</span>
                                <span class="clear"></span>
                            </label>
                        </div>
                        <div class="option">
                            <label for="5" class="label-cbx">
                                <input id="5" type="checkbox" class="invisible">
                                <div class="checkbox">
                                    <svg width="20px" height="20px" viewBox="0 0 20 20">
                                    <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                                    <polyline points="4 11 8 15 16 6"></polyline>
                                    </svg>
                                </div>
                                <span class="name">test</span>
                                <span class="count">(1)</span>
                                <span class="clear"></span>
                            </label>
                        </div>
                    </div>
                    <div id="expandToggleRoute" class="expand-toggle"><a href="javascript:void(0)" id="loadMoreRoute">ดูเพิ่มเติม <i class="fas fa-caret-down"></i></a></div>
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
                                <input id="holiday_{{ $holiday->holiday_id }}" type="checkbox" class="invisible">
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
                    <button class="btn btn-primary" id="test">test</button>
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
                <hr>
            </div>

        </div>       
    </div>
</section>
@stop

@section('footer_scripts')

<script type="text/javascript" src="{{ asset('js/filter/search-tour.js') }}"></script>

@endsection