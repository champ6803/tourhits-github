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
                <form action="{{ URL::to('saveCountryArticle') }}" method="post" enctype="multipart/form-data">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">จัดการบทความประเทศ</h3>
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
                                                        <input type="hidden" class="form-control" id="country_article_id" name="country_article_id">
                                                        <input type="hidden" value="{{ csrf_token() }}" name="_token">
                                                        <label for="tour_detail_0" class="col-sm-2 control-label">หัวข้อ :</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="country_article_name" name="country_article_name">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <input type="hidden" value="{{ csrf_token() }}" name="_token">
                                                        <label for="tour_detail_0" class="col-sm-2 control-label">ทัวร์ประเทศ :</label>
                                                        <div class="col-sm-2">
                                                            <select class="form-control" id="tour_country_id" name="tour_country_id">
                                                                <option value="">
                                                                    -- กรุณาเลือก --
                                                                </option>
                                                                @foreach($tourCountryList as $tourCountry)
                                                                <option value="{{ $tourCountry->tour_country_id }}">
                                                                    {{ $tourCountry->tour_country_name }}
                                                                </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <label for="country_article_detail" class="col-sm-2 control-label">รายละเอียด :</label>
                                                        <div class="col-sm-10">
                                                            <textarea style="height: 500px;" type="text" class="form-control wysi" id="country_article_detail" name="country_article_detail"></textarea>
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
<script type="text/javascript" src="../js/article/country-article-manage-action.js"></script>
@endsection