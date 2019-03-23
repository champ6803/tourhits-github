@extends('layout.main-admin')
@section('page_title','Admin Management')
@section('main-content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Blog
        </h1>
    </section>
    <section class="content">
        <form>
            <fieldset>
                <legend>จัดการบทความประเทศ:</legend>
                <div class="row">
                    <div class="col-lg-4" style="text-align: left">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="ค้นหาบทความ" id="input_article_title">
                            <span class="input-group-btn">
                                <button class="btn btn-secondary" type="button" id="searchButton"> <span class="glyphicon glyphicon-search"></span>ค้นหา</button></button>
                            </span>
                        </div>
                    </div>
                    <div class="col-lg-4" style="text-align: left">
                        <a href="{{url('/country-article-manage-action')}}" type="button" class="btn btn-info"> 
                            <span class="glyphicon glyphicon-plus"></span>&nbsp;เพิ่มบทความ</a>&nbsp;&nbsp;
<!--                        <button type="button" id="clearButton" class="btn btn-danger">
                            <span class="glyphicon glyphicon-erase"></span>&nbsp;ล้างเงื่อนไข</button> -->
                    </div>
                </div>
            </fieldset>
        </form><br> <br>
        <div class="row">
            <div class="col-lg-12" style="overflow-x: scroll;">
                <table id="countryArticleTable" class="display responsive nowrap">
                    <thead>
                        <tr>
                            <th>ลำดับที่</th>
                            <th>หัวข้อ</th>
                            <th>ทัวร์ประเทศ</th>
                            <th>สร้างโดย</th>
                            <th>วันที่สร้าง</th>
                            <th>แก้ไข</th>
                            <th>ลบ</th>
                        </tr>
                    </thead>
                    <tbody id="countryArticleData">
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ลำดับที่</th>
                            <th>หัวข้อ</th>
                            <th>ทัวร์ประเทศ</th>
                            <th>สร้างโดย</th>
                            <th>วันที่สร้าง</th>
                            <th>แก้ไข</th>
                            <th>ลบ</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </section>
</div>

<!-- remove modal -->
<div class="modal fade" id="removeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ต้องการลบข้อมูลบทความ ใช่หรือไม่?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <input type="hidden" class="form-control" id="hidden_remove_id">
                </button>
            </div>
            <div class="modal-footer" style="text-align: center">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="deleteClose">ยกเลิก</button>
                <button type="button" class="btn btn-primary" onclick="deleteCountryArticle()">ตกลง</button>
            </div>
        </div>
    </div>
</div>

@stop
@section('footer_scripts')
<script type="text/javascript" src="../js/article/country-article-manage.js"></script>
@endsection