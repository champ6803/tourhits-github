@extends('layout.main-admin')
@section('page_title','Admin Management')
@section('main-content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<style>fieldset
    {
        padding:16px;	
    }
    .legend
    {
        margin-bottom:0px;
        margin-left:16px;
    }
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Blog
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-lg-12">
                <form action="{{ URL::to('saveArticle') }}" method="post" enctype="multipart/form-data">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">จัดการบทความ</h3>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-horizontal form-element">
                                        <div class="box-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <input type="hidden" class="form-control" id="article_id" name="article_id">
                                                        <input type="hidden" value="{{ csrf_token() }}" name="_token">
                                                        <label for="tour_detail_0" class="col-sm-2 control-label">หัวข้อ :</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="article_title" name="article_title">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <input type="hidden" value="{{ csrf_token() }}" name="_token">
                                                        <label for="tour_detail_0" class="col-sm-2 control-label">รูปภาพ :</label>
                                                        <div class="col-sm-2">
                                                            <img class="hide" id="file_show" height="100px;">
                                                            <input class="form-control" type="file" id="image" name="image">
                                                            <input type="hidden" value="{{ csrf_token() }}" name="_token">

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <label for="article_short_detail" class="col-sm-2 control-label">รายละเอียด(ย่อ) :</label>
                                                        <div class="col-sm-10">
                                                            <textarea style="height: 200px;" type="text" class="form-control wysi" id="article_short_detail" name="article_short_detail"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <label for="article_detail_name" class="col-sm-2 control-label">รายละเอียด :</label>
                                                        <div class="col-sm-10">
                                                            <textarea style="height: 500px;" type="text" class="form-control wysi" id="article_detail_name" name="article_detail_name"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer" style="text-align: right">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i>&nbsp;บันทึก</button>
                            <button onclick="window.history.back();" type="button" class="btn btn-danger"><i class="fa fa-times"></i>&nbsp;ยกเลิก</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
@stop
@section('footer_scripts')
<script type="text/javascript" src="../js/article/article-manage-action.js"></script>
@endsection