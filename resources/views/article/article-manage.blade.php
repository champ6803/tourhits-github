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
                <legend>จัดการบทความ:</legend>
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
                        <a href="{{url('/article-manage-action')}}" type="button" class="btn btn-info"> 
                            <span class="glyphicon glyphicon-plus"></span>&nbsp;เพิ่มบทความ</a>&nbsp;&nbsp;
<!--                        <button type="button" id="clearButton" class="btn btn-danger">
                            <span class="glyphicon glyphicon-erase"></span>&nbsp;ล้างเงื่อนไข</button> -->
                    </div>
                </div>
            </fieldset>
        </form><br> <br>
        <div class="row">
            <div class="col-lg-12" style="overflow-x: scroll;">
                <table id="articleTable" class="display responsive nowrap">
                    <thead>
                        <tr>
                            <th>ลำดับที่</th>
                            <th>หัวข้อ</th>
                            <!--<th>รายละเอียด</th>-->
                            <th>รูปภาพ</th>
                            <th>สร้างโดย</th>
                            <th>วันที่สร้าง</th>
                            <th>แก้ไข</th>
                            <th>ลบ</th>
                        </tr>
                    </thead>
                    <tbody id="articleData">
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ลำดับที่</th>
                            <th>หัวข้อ</th>
                            <!--<th>รายละเอียด</th>-->
                            <th>รูปภาพ</th>
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

<!--add Modal -->
<div class="modal fade" id="articleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">เพิ่มข้อมูลทัวร์ประเทศ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ URL::to('saveTourCountry') }}" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">ชื่อประเทศ:</label>
                        <select id="country_select" name="country"></select>
                        <!--<div id="selectCountry"></div>-->
                        <br> 
                        <label for="recipient-name" class="col-form-label">ชื่อทัวร์ประเทศ:</label>
                        <input type="text" class="form-control" id="tour_country_name" name="tour_country_name" maxlength="100" required="required">
                        <br> 
                        <label for="recipient-name" class="col-form-label">URL:</label>
                        <input type="text" class="form-control" id="tour_country_url" name="tour_country_url" maxlength="100" required="required">
                        <br> 
                        <label for="recipient-name" class="col-form-label">รายละเอียด:</label>
                        <input type="text" class="form-control" id="tour_country_detail" name="tour_country_detail">
                        <!--            <br>
                                    <label for="recipient-name" class="col-form-label">รูปภาพ:</label>
                                    <input class="form-control" type="file" id="file" name="file">-->
                        <input type="hidden" value="{{ csrf_token() }}" name="_token">
                    </div>

                </div>
                <div class="modal-footer" style="text-align: right; width: 100%">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" id="close">ยกเลิก</button>
                    <button type="submit" value="Upload" name="submit" class="btn btn-primary">บันทึก</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!--edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">แก้ไขข้อมูลทัวร์ประเทศ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ URL::to('updateTourCountry') }}" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">ชื่อประเทศ:</label>
                        <select id="update_country_select" name="countryEdit"></select>
                        <!--<div id="selectCountryEdit"></div>-->
                        <br> 
                        <label for="recipient-name" class="col-form-label">ชื่อทัวร์ประเทศ:</label>
                        <input type="text" class="form-control" id="update_tour_country_name" name="update_tour_country_name" maxlength="100" >
                        <input type="hidden" class="form-control" id="hidden_update_id" name="hidden_update_id">
                        <br> 
                        <label for="recipient-name" class="col-form-label">URL:</label>
                        <input type="text" class="form-control" id="update_tour_country_url" name="update_tour_country_url" maxlength="100" required="required">
                        <br> 
                        <label for="recipient-name" class="col-form-label">รายละเอียด:</label>
                        <input type="text" class="form-control" id="update_tour_country_detail" name="update_tour_country_detail">
                        <!--            <br>
                                    <label for="recipient-name" class="col-form-label">รูปภาพ:</label>
                                    <input class="form-control" type="file" id="updateFile" name="file">-->
                        <input type="hidden" value="{{ csrf_token() }}" name="_token">
                    </div>
                </div>
                <div class="modal-footer" style="text-align: right ; width: 100%">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" id="updateClose">ยกเลิก</button>
                    <button type="submit" value="Upload" name="submit" class="btn btn-primary">แก้ไข</button>
                </div>
            </form>    
        </div>
    </div>
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
                <button type="button" class="btn btn-primary" onclick="deleteArticle()">ตกลง</button>
            </div>
        </div>
    </div>
</div>

@stop
@section('footer_scripts')
<script type="text/javascript" src="../js/article/article-manage.js"></script>
@endsection