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
    }</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            จัดการทัวร์
        </h1>
    </section>
    <section class="content">
        <form>
            <fieldset>
                <legend>จัดการ Tags :</legend>
                <div class="row">
                    <div class="col-lg-4" style="text-align: left">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="ค้นหาTags"id="input_tag_name">
                            <span class="input-group-btn">
                                <button class="btn btn-secondary" type="button" id="searchButton"> <span class="glyphicon glyphicon-search"></span>ค้นหา</button></button>
                            </span>
                        </div>
                    </div>
                    <div class="col-lg-4" style="text-align: left">
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#tagModal"> 
                            <span class="glyphicon glyphicon-plus"></span>&nbsp;เพิ่ม Tag</button>&nbsp;&nbsp;
                        <button type="button" id="clearButton" class="btn btn-danger">
                            <span class="glyphicon glyphicon-erase"></span>&nbsp;ล้างเงื่อนไข</button> 
                    </div>
                </div>  </fieldset>
        </form>  <br> <br>
        <div class="row">
            <div class="col-lg-12">
                <table id="tagTable" class="display responsive nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>ลำดับที่</th>
                            <th>ชื่อ Tags</th>
                            <th>URL</th>
                            <th>สร้างโดย</th>
                            <th>แก้ไข</th>
                            <th>ลบ</th>
                        </tr>
                    </thead>
                    <tbody id="tagData">
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ลำดับที่</th>
                            <th>ชื่อ Tags</th>
                            <th>URL</th>
                            <th>สร้างโดย</th>
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
<div class="modal fade" id="tagModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">เพิ่มข้อมูล Tags</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="tag_name" class="col-form-label">ชื่อ Tags:</label>
                        <input type="text" class="form-control" id="tag_name">
                    </div>
                    <div class="form-group">
                        <label for="rtag_url" class="col-form-label">URL:</label>
                        <input type="text" class="form-control" id="tag_url">
                    </div>
                    <div class="form-group">
                        <label for="meta_title" class="col-form-label">Meta Title:</label>
                        <input type="text" class="form-control" id="meta_title">
                    </div>
                    <div class="form-group">
                        <label for="meta_title" class="col-form-label">Meta Keywords:</label>
                        <input type="text" class="form-control" id="meta_keywords">
                    </div>
                    <div class="form-group">
                        <label for="meta_title" class="col-form-label">Meta Description:</label>
                        <input type="text" class="form-control" id="meta_description">
                    </div>
                </form>
            </div>
            <div class="modal-footer" style="text-align: right">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="close">ยกเลิก</button>
                <button type="button" class="btn btn-primary" onclick="saveTag()">บันทึก</button>
            </div>
        </div>
    </div>
</div>

<!--edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">แก้ไขข้อมูล Tags</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">ชื่อ Tags:</label>
                        <input type="text" class="form-control" id="update_tag_name">
                        <input type="hidden" class="form-control" id="hidden_update_id">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">URL:</label>
                        <input type="text" class="form-control" id="update_tag_url">
                    </div>
                    <div class="form-group">
                        <label for="meta_title" class="col-form-label">Meta Title:</label>
                        <input type="text" class="form-control" id="update_meta_title">
                    </div>
                    <div class="form-group">
                        <label for="meta_title" class="col-form-label">Meta Keywords:</label>
                        <input type="text" class="form-control" id="update_meta_keywords">
                    </div>
                    <div class="form-group">
                        <label for="meta_title" class="col-form-label">Meta Description:</label>
                        <input type="text" class="form-control" id="update_meta_description">
                    </div>
                </form>
            </div>
            <div class="modal-footer" style="text-align: right">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="updateClose">ยกเลิก</button>
                <button type="button" class="btn btn-primary" onclick="updateTag()">แก้ไข</button>
            </div>
        </div>
    </div>
</div>



<!-- remove modal -->
<div class="modal fade" id="removeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ต้องการลบข้อมูล Tags ใช่หรือไม่?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <input type="hidden" class="form-control" id="hidden_remove_id">
                </button>
            </div>
            <div class="modal-footer" style="text-align: center">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="deleteClose">ยกเลิก</button>
                <button type="button" class="btn btn-primary" onclick="deleteTag()">ตกลง</button>
            </div>
        </div>
    </div>
</div>

@stop
@section('footer_scripts')
<script type="text/javascript" src="../js/admin/manage-tag.js"></script>
<script src='https://code.jquery.com/jquery-1.12.4.js'></script>
<script src='https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js'></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">

@endsection