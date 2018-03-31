@extends('layout.main-admin')
@section('page_title','Admin Management')
@section('main-content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xl-12 col-12">		  
                <!-- AREA CHART -->
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Sales Difference</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <ul class="list-inline text-right">
                            <li>
                                <h5><i class="fa fa-circle mr-5 text-info"></i>Site A View</h5>
                            </li>
                            <li>
                                <h5><i class="fa fa-circle mr-5 text-danger"></i>Site B View</h5>
                            </li>
                        </ul>
                        <div id="morris-area-chart2" style="height: 250px;"></div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
        <div class="row">
            <div class="col-xl-3 col-md-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-blue"><i class="ion ion-stats-bars"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-number">90<small>%</small></span>
                        <span class="info-box-text">Store Traffic</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-xl-3 col-md-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-success"><i class="ion ion-thumbsup"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-number">41,410</span>
                        <span class="info-box-text">User Likes</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>

            <div class="col-xl-3 col-md-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-purple"><i class="ion ion-bag"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-number">760</span>
                        <span class="info-box-text">Monthly Sales</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-xl-3 col-md-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-red"><i class="ion ion-person-stalker"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-number">2,000</span>
                        <span class="info-box-text">Join Members</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>

        <div class="row">
            <div class="col-md-12 col-lg-4">
                <div class="box">
                    <div class="box-header with-border">
                        <h5 class="box-title">Top Advertisers</h5>
                        <div class="box-tools pull-right">
                            <ul class="card-controls">
                                <li class="dropdown">
                                    <a data-toggle="dropdown" href="#"><i class="ion-android-more-vertical"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item active" href="#">Today</a>
                                        <a class="dropdown-item" href="#">Yesterday</a>
                                        <a class="dropdown-item" href="#">Last week</a>
                                        <a class="dropdown-item" href="#">Last month</a>
                                    </div>
                                </li>
                                <li><a href="" class="link card-btn-reload" data-toggle="tooltip" title="" data-original-title="Refresh"><i class="fa fa-circle-thin"></i></a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="box-body">
                        <div class="text-center py-20">                  
                            <div class="donut" data-peity='{ "fill": ["#ef5350", "#e9ab2e", "#398bf7"], "radius": 78, "innerRadius": 58  }' >9,6,5</div>
                        </div>

                        <ul class="list-inline">
                            <li class="flexbox mb-5">
                                <div>
                                    <span class="badge badge-dot badge-lg mr-1 bg-danger"></span>
                                    <span>New York</span>
                                </div>
                                <div>953</div>
                            </li>

                            <li class="flexbox mb-5">
                                <div>
                                    <span class="badge badge-dot badge-lg mr-1 bg-warning"></span>
                                    <span>Los Angeles</span>
                                </div>
                                <div>813</div>
                            </li>

                            <li class="flexbox">
                                <div>
                                    <span class="badge badge-dot badge-lg mr-1 bg-info"></span>
                                    <span>Dallas</span>
                                </div>
                                <div>369</div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-xl-8 col-lg-8 col-12">
                <!-- AREA CHART -->
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Top Products sales</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <ul class="list-inline text-center">
                            <li>
                                <h5><i class="fa fa-circle mr-5 text-success"></i>iMac</h5>
                            </li>
                            <li>
                                <h5><i class="fa fa-circle mr-5 text-secondary"></i>iPhone</h5>
                            </li>
                        </ul>
                        <div class="chart">
                            <div class="chart" id="revenue-chart" style="height: 230px;"></div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>		

        </div>      
        <!-- /.row -->

        <div class="row">

            <div class="col-md-6 col-lg-4">
                <div class="box box-body bg-info">
                    <div class="flexbox">
                        <div id="linechart" >1,4,3,7,6,4,8,9,6,8,12</div>
                        <div class="text-right">
                            <span>New Users</span><br>
                            <span>
                                <i class="ion-ios-arrow-up text-white"></i>
                                <span class="font-size-18 ml-1">113</span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="box box-body bg-success">
                    <div class="flexbox">
                        <div id="barchart">1,4,3,7,6,4,8,9,6,8,12</div>
                        <div class="text-right">
                            <span>Monthly Sale</span><br>
                            <span>
                                <i class="ion-ios-arrow-up text-white"></i>
                                <span class="font-size-18 ml-1">%80</span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 d-none d-lg-block">
                <div class="box box-body bg-red">
                    <div class="flexbox">
                        <div id="discretechart">1,4,3,7,6,4,8,9,6,8,12</div>
                        <div class="text-right">
                            <span>Impressions</span><br>
                            <span>
                                <i class="ion-ios-arrow-up text-white"></i>
                                <span class="font-size-18 ml-1">%80</span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

        </div>      
        <!-- /.row -->
        <div class="row">
            <div class="col-xl-7 col-12">
                <!-- quick email widget -->
                <div class="box">
                    <div class="box-header">
                        <i class="fa fa-envelope"></i>

                        <h3 class="box-title">Quick Email</h3>
                        <!-- tools box -->
                        <div class="pull-right box-tools">
                            <button type="button" class="btn btn-danger btn-sm" data-widget="remove" data-toggle="tooltip"
                                    title="Remove">
                                <i class="fa fa-times"></i></button>
                        </div>
                        <!-- /. tools -->
                    </div>
                    <div class="box-body">
                        <form action="#" method="post">
                            <div class="form-group">
                                <input type="email" class="form-control" name="emailto" placeholder="Email to:">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="subject" placeholder="Subject">
                            </div>
                            <div>
                                <textarea class="textarea b-1 p-10 w-p100" placeholder="Message"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="box-footer clearfix">
                        <button type="button" class="pull-right btn btn-blue" id="sendEmail"> Send <i class="fa fa-paper-plane-o"></i></button>
                    </div>
                </div>

                <div class="media align-items-center py-30 bg-inverse">
                    <img class="avatar avatar-xxl" src="../images/avatar/7.jpg" alt="...">
                    <div class="media-body">
                        <h5>Racky Behal</h5>
                        <p class="text-white font-size-12 my-3">Continually underwhelm stand-alone relationships via information. Dramatically productivate extensive process improvements for pandemic niches.</p>
                        <div class="gap-items font-size-16">
                            <a class="text-white" href="#"><i class="fa fa-twitter"></i></a>
                            <a class="text-white" href="#"><i class="fa fa-instagram"></i></a>
                            <a class="text-white" href="#"><i class="fa fa-facebook"></i></a>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-xl-5 col-12">
                <div class="box">
                    <div class="card-body bg-img py-60" style="background-image: url(../images/gallery/thumb/5.jpg)" data-overlay="5">
                        <blockquote class="blockquote blockquote-inverse no-border no-margin">
                            <p class="font-size-22">Some quick example text to build blockquote content long enough.</p>
                            <footer>Someone famous in <cite title="Source Title">Source Title</cite></footer>
                        </blockquote>
                    </div>

                    <div class="box-body">
                        <h4><a href="#">Awesome Quote Blog Post</a></h4>
                        <p>October 16, 2017</p>

                        <p>Holisticly maximize team building ROI via next-generation resources. Enthusiastically promote team driven customer service and error-free solutions.</p>

                        <div class="flexbox align-items-center mt-3">
                            <a class="btn btn-blue" href="#">Read more</a>

                            <div class="gap-items-4">
                                <a class="text-muted" href="#">
                                    <i class="fa fa-heart mr-1"></i> 12
                                </a>
                                <a class="text-muted" href="#">
                                    <i class="fa fa-comment mr-1"></i> 3
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="box">
                    <div class="box-header">
                        <h4 class="box-title">Site Traffic</h4>
                        <div class="box-tool pull-right">
                            <small class="mt-10 text-success"><i class="fa fa-sort-asc"></i> 18% High then last month</small> 
                        </div>
                    </div>
                    <div class="box-body">
                        <ul class="flexbox flex-justified text-center my-20">
                            <li class="br-1">
                                <div class="font-size-18">80.40%</div>
                                <small>Overall Growth</small>
                            </li>

                            <li class="br-1">
                                <div class="font-size-18">15.40%</div>
                                <small>Montly</small>
                            </li>

                            <li>
                                <div class="font-size-18">5.50%</div>
                                <small>Day</small>
                            </li>
                        </ul>
                        <div id="sparkline8"><canvas width="484" height="60" style="display: inline-block; width: 484px; height: 60px; vertical-align: top;"></canvas></div>
                    </div>
                </div>

            </div>      	

        </div>

    </section>
    <!-- /.content -->
</div>

@stop
@section('footer_scripts')

@endsection