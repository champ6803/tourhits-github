@extends('layout.main-admin')
@section('page_title','Admin Management')
@section('main-content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            จัดการหน้าเว็ป
            <small>จัดการทัวร์ประเทศ</small>
        </h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-2" style="text-align: right">
                 <label>ชื่อทัวร์ประเทศ : </label>
             </div>
            <div class="col-lg-4">
                 <input type="text" class="form-control" id="input_tour_country_name">
            </div>
        </div>
        <br>
         <div class="row">
            <div class="col-lg-4"></div>
            <div class="col-lg-6"> 
                <button type="button" id="searchButton" class="btn btn-success">
                    <span class="glyphicon glyphicon-search"></span>&nbsp;ค้นหา</button>
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#tourCountryModal"> 
                    <span class="glyphicon glyphicon-plus"></span>&nbsp;เพิ่มทัวร์ประเทศ</button>
                <button type="button" id="clearButton" class="btn btn-danger">
                    <span class="glyphicon glyphicon-erase"></span>&nbsp;ล้างเงื่อนไข</button>
            </div>
        </div>
        <br> <br> <br>
        <div class="row">
        <div class="col-lg-12">
        <table id="tourCountryTable" class="display responsive nowrap" style="width:100%">
        <thead>
            <tr>
                <th>ลำดับที่</th>
                <th>ชื่อประเทศ</th>
                <th>ชื่อทัวร์ประเทศ</th>
                <th>รายละเอียด</th>
                <th>รูปภาพ</th>
                <th>สร้างโดย</th>
                <th>แก้ไข</th>
                <th>ลบ</th>
            </tr>
        </thead>
        <tbody id="tourCountryData">
        </tbody>
        <tfoot>
            <tr>
                <th>ลำดับที่</th>
                <th>ชื่อประเทศ</th>
                <th>ชื่อทัวร์ประเทศ</th>
                <th>รายละเอียด</th>
                <th>รูปภาพ</th>
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
<div class="modal fade" id="tourCountryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">เพิ่มข้อมูลทัวร์ประเทศ</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">ชื่อประเทศ:</label>
            <div id="selectCountry"></div>
            </br> 
            <label for="recipient-name" class="col-form-label">ชื่อทัวร์ประเทศ:</label>
            <input type="text" class="form-control" id="tour_country_name" maxlength="100">
            </br> 
            <label for="recipient-name" class="col-form-label">รายละเอียด:</label>
            <input type="text" class="form-control" id="tour_country_detail">
            <br>
            <label for="recipient-name" class="col-form-label">รูปภาพ:</label>
            <input type="file" class="form-control" id="tour_country_picture">
          </div>
        </form>
      </div>
      <div class="modal-footer" style="text-align: right">
         <button type="button" class="btn btn-secondary" data-dismiss="modal" id="close">ยกเลิก</button>
        <button type="button" class="btn btn-primary" onclick="saveTourCountry()">บันทึก</button>
      </div>
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
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">ชื่อประเทศ:</label>
            <div id="selectCountryEdit"></div>
            </br> 
            <label for="recipient-name" class="col-form-label">ชื่อทัวร์ประเทศ:</label>
            <input type="text" class="form-control" id="update_tour_country_name" maxlength="100">
            <input type="hidden" class="form-control" id="hidden_update_id">
            </br> 
            <label for="recipient-name" class="col-form-label">รายละเอียด:</label>
            <input type="text" class="form-control" id="update_tour_country_detail">
            <br>
            <label for="recipient-name" class="col-form-label">รูปภาพ:</label>
            <input type="file" class="form-control" id="update_tour_country_picture">
          </div>
        </form>
      </div>
      <div class="modal-footer" style="text-align: right">
         <button type="button" class="btn btn-secondary" data-dismiss="modal" id="updateClose">ยกเลิก</button>
        <button type="button" class="btn btn-primary" onclick="updateTourCountry()">แก้ไข</button>
      </div>
    </div>
  </div>
</div>
 
 
 
 <!-- remove modal -->
 <div class="modal fade" id="removeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ต้องการลบข้อมูล ทัวร์ประเทศ ใช่หรือไม่?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          <input type="hidden" class="form-control" id="hidden_remove_id">
        </button>
      </div>
        <div class="modal-footer" style="text-align: center">
         <button type="button" class="btn btn-secondary" data-dismiss="modal" id="deleteClose">ยกเลิก</button>
        <button type="button" class="btn btn-primary" onclick="deleteTourCountry()">ตกลง</button>
      </div>
    </div>
  </div>
</div>

@stop
@section('footer_scripts')
<script type="text/javascript" src="../js/manage-front/manage-front-country.js"></script>
<script src='https://code.jquery.com/jquery-1.12.4.js'></script>
<script src='https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js'></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
 
@endsection