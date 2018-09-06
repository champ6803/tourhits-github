@extends('layout.main-admin')
@section('page_title','Admin Management')
@section('main-content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Tour Package Management
        </h1>
    </section>

    <section class="content">
        <form action="{{ URL::to('saveTourlistAndDay') }}" method="post" enctype="multipart/form-data">  
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Tour Package</h3>
                    <h6 class="box-subtitle">Add New Package</h6>
                </div>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <!-- /.box-header -->
                <!-- Nav tabs -->
                <div class="vtabs customvtab">
                    <ul class="nav nav-tabs tabs-vertical" role="tablist">
                        <li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="#main" role="tab" aria-expanded="true" aria-selected="true"><span class="hidden-sm-up"><i class="ion-home"></i></span> <span class="hidden-xs-down">Main</span> </a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#detail" role="tab" aria-expanded="false" aria-selected="false"><span class="hidden-sm-up"><i class="ion-person"></i></span> <span class="hidden-xs-down">Detail</span></a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#periods" role="tab" aria-expanded="false" aria-selected="false"><span class="hidden-sm-up"><i class="ion-email"></i></span> <span class="hidden-xs-down">Periods</span></a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#images" role="tab" aria-expanded="false" aria-selected="false"><span class="hidden-sm-up"><i class="ion-email"></i></span> <span class="hidden-xs-down">Images</span></a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#tags" role="tab" aria-expanded="false" aria-selected="false"><span class="hidden-sm-up"><i class="ion-email"></i></span> <span class="hidden-xs-down">Tags</span></a> </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active show" id="main" role="tabpanel" aria-expanded="true">
                            <div class='row'>
                                <div class='col-12'>
                                    <div class="form-horizontal form-element">
                                        <div class="box-body">
                                            <div class="row">
<!--                                                <div class="col-6">
                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-2 control-label">Category</label>

                                                        <div class="col-sm-10">
                                                            <div id="selectTourCategory"></div>
                                                        </div>
                                                    </div>
                                                </div>-->
                                                <div class="col-6">
                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-2 control-label">Country</label>

                                                        <div class="col-sm-10">
                                                            <div id="selectTourCountry"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group row">
                                                        <label for="tour_name" class="col-sm-2 control-label">Name</label>

                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="tour_name" name="tour_name">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group row">
                                                        <label for="file" class="col-sm-2 control-label">Image</label>

                                                        <div id="div_file" class="col-sm-10">
                                                            <input class="form-control" type="file" id="file" name="file">
                                                            <input type="hidden" value="{{ csrf_token() }}" name="_token">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <label for="tour_detail" class="col-sm-1 control-label">Detail</label>

                                                        <div class="col-sm-11">
                                                            <textarea type="text" class="form-control tour-main" id="tour_detail" name="tour_detail"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group row">
                                                        <label for="day_tour" class="col-sm-2 control-label">No. Day</label>

                                                        <div class="col-sm-10">
                                                            <input type="number" class="form-control" id="day_tour" name="day_tour">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group row">
                                                        <label for="night_tour" class="col-sm-2 control-label">No. Night</label>

                                                        <div class="col-sm-10">
                                                            <input type="number" class="form-control" id="night_tour" name="night_tour">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group row">
                                                        <label for="start_date" class="col-sm-2 control-label">Start Date</label>

                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="start_date" name="start_date">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group row">
                                                        <label for="end_date" class="col-sm-2 control-label">End Date</label>

                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="end_date" name="end_date">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group row">
                                                        <label for="main_price" class="col-sm-2 control-label">Price</label>

                                                        <div class="col-sm-10">
                                                            <input type="number" class="form-control" id="main_price" name="main_price">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group row">
                                                        <label for="main_special_price" class="col-sm-2 control-label">Special Price</label>

                                                        <div class="col-sm-10">
                                                            <input type="number" class="form-control" id="main_special_price" name="main_special_price">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group row">
                                                        <label for="tour_package_code" class="col-sm-2 control-label">Tour Code</label>

                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="tour_package_code" name="tour_package_code">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group row">
                                                        <label for="pdf_file" class="col-sm-2 control-label">PDF File</label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control" type="file" id="pdf_file" name="pdf_file"> 
                                                            <input type="hidden" value="{{ csrf_token() }}" name="_token">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 control-label"></label>
                                                        <label id="pdf_show" class="col-sm-offset-2 col-sm-10 control-label"></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.box-body -->
                                        <div class="box-footer">
                                            <button id="saveBtn" type="button" class="btn btn-info" onclick="genTable();"> 
                                                <span class="glyphicon glyphicon-plus"></span>&nbsp;Add</button>
<!--                                            <button type="button" id="clearButton" class="btn btn-danger" onclick="clearGenTable();">
                                                <span class="glyphicon glyphicon-erase" ></span>&nbsp;Clear</button>                                            -->
                                        </div>
                                        <!-- /.box-footer -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane pad" id="detail" role="tabpanel" aria-expanded="false">
                            <div class='row'>
                                <div class='col-12'>
                                    <div class="form-horizontal form-element">
                                        <div class="box-body">
                                            <div id="day_body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <label for="tour_detail_0" class="col-sm-2 control-label">Day 1</label>

                                                            <div class="col-sm-10">
                                                                <textarea type="text" class="form-control tour-main" id="tour_detail_0" name="tour_detail_0"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <label for="tour_detail_0" class="col-sm-2 control-label">Attractions 1</label>

                                                            <div class="col-sm-10">
                                                                <input hidden id="day_name0" name="day_name[]" value="">
                                                                <select id="attraction_select0" class="form-control js-example-basic-multiple attraction_select" name="attraction_select0[]" multiple="multiple"></select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.box-body -->
                                    <!--                                    <div class="box-footer">
                                                                            <button id="btn_detail_next" type="button" class="btn btn-info"> 
                                                                                Next&nbsp;<span class="glyphicon glyphicon-arrow-right"></span></button>                                        
                                                                        </div>-->
                                    <!-- /.box-footer -->
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane pad" id="periods" role="tabpanel" aria-expanded="false">
                            <div class='row'>
                                <div class='col-12'>
                                    <div class="form-horizontal form-element">
                                        <div class="box-body">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group row">
                                                        <label for="period_start" class="col-sm-2 control-label">Period Start</label>

                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="period_start" name="period_start">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group row">
                                                        <label for="period_end" class="col-sm-2 control-label">Period End</label>

                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="period_end" name="period_end">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group row">
                                                        <label for="adult_price" class="col-sm-2 control-label">Adult Price</label>

                                                        <div class="col-sm-10">
                                                            <input type="number" class="form-control" id="adult_price" name="adult_price">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group row">
                                                        <label for="child_price" class="col-sm-2 control-label">Child Price</label>

                                                        <div class="col-sm-10">
                                                            <input type="number" class="form-control" id="child_price" name="child_price">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
<!--                                                <div class="col-6">
                                                    <div class="form-group row">
                                                        <label for="alone_price" class="col-sm-2 control-label">Extra Alone Price</label>
                                                        <div class="col-sm-10">
                                                            <input type="number" class="form-control" id="alone_price" name="alone_price">
                                                        </div>
                                                    </div>
                                                </div>-->
                                                <div class="col-6">
                                                    <div class="form-group row">
                                                        <label for="alone_price" class="col-sm-2 control-label">Special Price</label>
                                                        <div class="col-sm-10">
                                                            <input type="number" class="form-control" id="special_price" name="special_price">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <button id="btn_period_add" type="button" class="btn btn-info"> 
                                                        <span class="glyphicon glyphicon-plus"></span>&nbsp;Add</button>
                                                    <button id="btn_period_delete" type="button" class="btn btn-info"> 
                                                        <span class="glyphicon glyphicon-trash"></span>&nbsp;Delete</button>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-12">
                                                    <table class="table table-bordered" id="period_table">
                                                        <thead>
                                                            <tr>
                                                                <th align='center'>
                                                                    No.
                                                                </th>
                                                                <th align='center'>
                                                                    Period Start
                                                                </th>
                                                                <th align='center'>
                                                                    Period End
                                                                </th>
                                                                <th align='center'>
                                                                    Adult Price
                                                                </th>
                                                                <th align='center'>
                                                                    Child Price
                                                                </th>
                                                                <th align='center'>
                                                                    Special Price
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="period_body">
                                                            <tr>
                                                                <td align="center" colspan="7">
                                                                    No matching records found
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.box-body -->
                                        <!--                                        <div class="box-footer">
                                                                                    <button id="btn_period_save" type="button" class="btn btn-info"> 
                                                                                        <span class="glyphicon glyphicon-plus"></span>&nbsp;Next</button>                                        
                                                                                </div>-->
                                        <!-- /.box-footer -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane pad" id="images" role="tabpanel" aria-expanded="false">
                            <div class='row'>
                                <div class='col-12'>
                                    <div class="form-horizontal form-element">
                                        <div class="box-body">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group row">
                                                        <label for="file1" class="col-sm-2 control-label">Image 1</label>

                                                        <div class="col-sm-10">
                                                            <div class="col-sm-10">
                                                                <input class="form-control" type="file" id="file1" name="file_img[]"> 
                                                                <input type="hidden" value="{{ csrf_token() }}" name="_token">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group row">
                                                        <label for="file2" class="col-sm-2 control-label">Image 2</label>

                                                        <div class="col-sm-10">
                                                            <div class="col-sm-10">
                                                                <input class="form-control" type="file" id="file2" name="file_img[]"> 
                                                                <input type="hidden" value="{{ csrf_token() }}" name="_token">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group row">
                                                        <label for="file3" class="col-sm-2 control-label">Image 3</label>

                                                        <div class="col-sm-10">
                                                            <div class="col-sm-10">
                                                                <input class="form-control" type="file" id="file3" name="file_img[]"> 
                                                                <input type="hidden" value="{{ csrf_token() }}" name="_token">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group row">
                                                        <label for="file4" class="col-sm-2 control-label">Image 4</label>

                                                        <div class="col-sm-10">
                                                            <div class="col-sm-10">
                                                                <input class="form-control" type="file" id="file4" name="file_img[]"> 
                                                                <input type="hidden" value="{{ csrf_token() }}" name="_token">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group row">
                                                        <label for="file5" class="col-sm-2 control-label">Image 5</label>

                                                        <div class="col-sm-10">
                                                            <div class="col-sm-10">
                                                                <input class="form-control" type="file" id="file5" name="file_img[]"> 
                                                                <input type="hidden" value="{{ csrf_token() }}" name="_token">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group row">
                                                        <label for="file6" class="col-sm-2 control-label">Image 6</label>

                                                        <div class="col-sm-10">
                                                            <div class="col-sm-10">
                                                                <input class="form-control" type="file" id="file6" name="file_img[]"> 
                                                                <input type="hidden" value="{{ csrf_token() }}" name="_token">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group row">
                                                        <label for="file7" class="col-sm-2 control-label">Image 7</label>

                                                        <div class="col-sm-10">
                                                            <div class="col-sm-10">
                                                                <input class="form-control" type="file" id="file7" name="file_img[]"> 
                                                                <input type="hidden" value="{{ csrf_token() }}" name="_token">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group row">
                                                        <label for="file8" class="col-sm-2 control-label">Image 8</label>

                                                        <div class="col-sm-10">
                                                            <div class="col-sm-10">
                                                                <input class="form-control" type="file" id="file8" name="file_img[]"> 
                                                                <input type="hidden" value="{{ csrf_token() }}" name="_token">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group row">
                                                        <label for="file9" class="col-sm-2 control-label">Image 9</label>

                                                        <div class="col-sm-10">
                                                            <div class="col-sm-10">
                                                                <input class="form-control" type="file" id="file9" name="file_img[]"> 
                                                                <input type="hidden" value="{{ csrf_token() }}" name="_token">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group row">
                                                        <label for="file10" class="col-sm-2 control-label">Image 10</label>

                                                        <div class="col-sm-10">
                                                            <div class="col-sm-10">
                                                                <input class="form-control" type="file" id="file10" name="file_img[]"> 
                                                                <input type="hidden" value="{{ csrf_token() }}" name="_token">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.box-body -->
                                        <!--                                        <div class="box-footer">
                                                                                    <button id="btn_period_save" type="button" class="btn btn-info"> 
                                                                                        Next <span class="glyphicon glyphicon-arrow-right"></span></button>                                        
                                                                                </div>-->
                                        <!-- /.box-footer -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane pad" id="tags" role="tabpanel" aria-expanded="false">
                            <div class='row'>
                                <div class='col-12'>
                                    <div class="form-horizontal form-element">
                                        <div class="box-body">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group row">
                                                        <label for="tag_select" class="col-sm-2 control-label">Tag</label>

                                                        <div class="col-sm-10">
                                                            <select id="tag_select" class="form-control js-example-basic-multiple" name="tag_select[]" multiple="multiple">

                                                            </select> 
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="form-group row">
                                                        <label for="attraction_select" class="col-sm-2 control-label">Attraction</label>

                                                        <div class="col-sm-10">
                                                            <select id="attraction_select" class="form-control js-example-basic-multiple" name="attraction_select[]" multiple="multiple">
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group row">
                                                        <label for="holiday_select" class="col-sm-2 control-label">Holiday</label>

                                                        <div class="col-sm-10">
                                                            <select id="holiday_select" class="form-control js-example-basic-multiple" name="holiday_select[]" multiple="multiple">
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group row">
                                                        <label for="airline_select" class="col-sm-2 control-label">Airline</label>

                                                        <div class="col-sm-10">
                                                            <select id="airline_select" class="form-control js-example-basic-multiple" name="airline_select[]" multiple="multiple">
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group row">
                                                        <label for="holiday_select" class="col-sm-2 control-label">Route</label>

                                                        <div class="col-sm-10">
                                                            <select id="route_select" class="form-control js-example-basic-multiple" name="route_select[]" multiple="multiple">
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.box-body -->
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <button id="submit_all" type="submit" class="btn btn-info" id="saveAll"> 
                                                <i class="fa fa-floppy-o"></i>&nbsp;Save</button>
                                            </div>
                                        </div>
                                        <!-- /.box-footer -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- /.box-body -->
            </div>

            <!--            <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">เพิ่มรายละเอียดวัน package ทัวร์ &nbsp;<red style="color: red;">*</red></h3>
            
                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="row" style="padding: 7px;" id="divTable">
                                    <div class="col-lg-1"></div>
                                    <table id="dayTable" style="width:85%;">
                                        <thead >
                                            <tr style="background-color:#FF9966; border-radius: 12px;">
                                                <th style="color: white; font-size: 20px">วันที่</th>
                                                <th style="color: white; font-size: 20px">package</th>
                                                <th style="color: white; font-size: 20px">รายละเอียด</th>
                                            </tr>
                                        </thead>
                                        <tbody id="genTable">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                             /.box-body 
                        </div>-->

            <!--            <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">เพิ่มวันหยุด</h3>
            
                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="row" style="padding: 7px">
                                    <div class="col-lg-1"></div>
                                    <select id="holiday_select" class="js-example-basic-multiple" name="holiday_select[]" multiple="multiple" style="width: 800px">
                                    </select>
                                </div>
                            </div>
                             /.box-body 
                        </div>
            
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">เพิ่มสถานที่ท่องเที่ยว</h3>
            
                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="row" style="padding: 7px">
                                    <div class="col-lg-1"></div>
                                    <select id="attraction_select" class="js-example-basic-multiple" name="attraction_select[]" multiple="multiple" style="width: 800px">
            
                                    </select>
                                </div>
                            </div>
                             /.box-body 
                        </div>
            
            
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">เพิ่ม Tags</h3>
            
                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="row" style="padding: 7px">
                                    <div class="col-lg-1"></div>
                                    <select id="tag_select" class="js-example-basic-multiple" name="tag_select[]" multiple="multiple" style="width: 800px">
            
                                    </select>
                                </div>
                            </div>
                             /.box-body 
                        </div>-->

        </form>
    </section>
</div>
@stop
@section('footer_scripts')
<script type="text/javascript" src="{{asset('js/admin/manage-tour-list.js')}}"></script>
@endsection