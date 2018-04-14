@extends('layout.main-admin')
@section('page_title','Admin Management')
@section('main-content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            จัดการทัวร์
            <small>จัดการวันหยุด</small>
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
                 <label>ชื่อวันหยุด : </label>
             </div>
            <div class="col-lg-4">
                 <input type="text" class="form-control" id="input_holiday_name">
            </div>
        </div>
        <br>
         <div class="row">
            <div class="col-lg-4"></div>
            <div class="col-lg-6"> 
                <button type="button" id="searchButton" class="btn btn-success">
                    <span class="glyphicon glyphicon-search"></span>&nbsp;ค้นหา</button>
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#holidayModal"> 
                    <span class="glyphicon glyphicon-plus"></span>&nbsp;เพิ่มวันหยุด</button>
                <button type="button" id="clearButton" class="btn btn-danger">
                    <span class="glyphicon glyphicon-erase"></span>&nbsp;ล้างเงื่อนไข</button>
            </div>
        </div>
        <br> <br> <br>
        <div class="row">
        <div class="col-lg-12">
        <table id="holidayTable" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>ลำดับที่</th>
                <th>ชื่อวันหยุด</th>
                <th>วันที่เริ่มต้น</th>
                <th>วันที่สิ้นสุด</th>
                <th>สร้างโดย</th>
                <th>แก้ไข</th>
                <th>ลบ</th>
            </tr>
        </thead>
        <tbody id="holidayData">
        </tbody>
        <tfoot>
            <tr>
                <th>ลำดับที่</th>
                <th>ชื่อวันหยุด</th>
                <th>วันที่เริ่มต้น</th>
                <th>วันที่สิ้นสุด</th>
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
<div class="modal fade" id="holidayModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">เพิ่มข้อมูลวันหยุด</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label class="col-form-label">ชื่อวันหยุด:</label>
            <input type="text" class="form-control" id="holiday_name"><br>
             <label  class="col-form-label">วันที่เริ่มต้น:</label> 
            <input  id="startDate"> ถึง <input type="text" id="endDate">
          </div>
        </form>
      </div>
      <div class="modal-footer" style="text-align: right">
         <button type="button" class="btn btn-secondary" data-dismiss="modal" id="close">ยกเลิก</button>
        <button type="button" class="btn btn-primary" onclick="saveHoliday()">บันทึก</button>
      </div>
    </div>
  </div>
</div>
 
 <!--edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">แก้ไขข้อมูลวันหยุด</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label class="col-form-label">ชื่อวันหยุด:</label>
            <input type="text" class="form-control" id="update_holiday_name">
            <input type="hidden" class="form-control" id="hidden_update_id">
            <br>
             <label  class="col-form-label">วันที่เริ่มต้น:</label> 
            <input  id="startEditDate"> ถึง <input type="text" id="endEditDate">
          </div>
        </form>
      </div>
      <div class="modal-footer" style="text-align: right">
         <button type="button" class="btn btn-secondary" data-dismiss="modal" id="updateClose">ยกเลิก</button>
        <button type="button" class="btn btn-primary" onclick="updateHoliday()">แก้ไข</button>
      </div>
    </div>
  </div>
</div>
 
 
 
 <!-- remove modal -->
 <div class="modal fade" id="removeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ต้องการลบข้อมูลวันหยุดใช่หรือไม่?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          <input type="hidden" class="form-control" id="hidden_remove_id">
        </button>
      </div>
        <div class="modal-footer" style="text-align: center">
         <button type="button" class="btn btn-secondary" data-dismiss="modal" id="deleteClose">ยกเลิก</button>
        <button type="button" class="btn btn-primary" onclick="deleteHoliday()">ตกลง</button>
      </div>
    </div>
  </div>
</div>

@stop
@section('footer_scripts')
<script type="text/javascript" src="../js/admin/manage-holiday.js"></script>
<script src='https://code.jquery.com/jquery-1.12.4.js'></script>
<script src='https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js'></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="dist/locales/bootstrap-datepicker.th.min.js" charset="UTF-8"></script>
<script src="dist/js/bootstrap-datepicker-custom.js"></script>
<script src="dist/locales/bootstrap-datepicker.th.min.js" charset="UTF-8"></script>
@endsection