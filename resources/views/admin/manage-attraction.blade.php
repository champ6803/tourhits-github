@extends('layout.main-admin')
@section('page_title','Admin Management')
@section('main-content')
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
        <legend>จัดการสถานที่ท่องเที่ยว:</legend>
        <div class="row">
            <div class="col-lg-4" style="text-align: left">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="ค้นหาสถานที่ท่องเที่ยว "id="input_attraction_name">
                    <span class="input-group-btn">
                    <button class="btn btn-secondary" type="button" id="searchButton"> <span class="glyphicon glyphicon-search"></span>ค้นหา</button></button>
                  </span>
                </div>
            </div>
            <div class="col-lg-4" style="text-align: left">
             <button type="button" class="btn btn-info" id="btn_add_attraction"> 
                    <span class="glyphicon glyphicon-plus"></span>&nbsp;เพิ่มสถานที่ท่องเที่ยว</button>&nbsp;&nbsp;
              <a class="btn btn-danger" href="../manage-attraction">
             <span class="glyphicon glyphicon-erase"></span>&nbsp;ล้างเงื่อนไข</a> 
            </div>
        </div>  </fieldset>
        </form> <br> <br>
        <div class="row">
        <div class="col-lg-12">
        <table id="attractionTable" class="display responsive nowrap" style="width:100%">
        <thead>
            <tr>
                <th>ลำดับที่</th>
                <th>ชื่อสถานที่ท่องเที่ยว</th>
                <th>ประเทศ</th>
                <th>รูปภาพ</th>
                <th>สร้างโดย</th>
                <th>แก้ไข</th>
                <th>ลบ</th>
            </tr>
        </thead>
        <tbody id="attractionData">
        </tbody>
        <tfoot>
            <tr>
                <th>ลำดับที่</th>
                <th>ชื่อสถานที่ท่องเที่ยว</th>
                <th>ประเทศ</th>
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
<div class="modal fade" id="attractionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">เพิ่มข้อมูลสถานที่ท่องเที่ยว</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ URL::to('saveAttraction') }}" method="post" enctype="multipart/form-data">
      <div class="modal-body">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">ชื่อสถานที่ท่องเที่ยว:</label>
            <input type="text" class="form-control" id="attraction_name" name="attraction_name" required="required">
            <br>
            <label for="recipient-name" class="col-form-label">ทัวร์ประเทศ:</label>
            <select type="text" class="form-control" id="country_select"name="country_select" required="required">               
            </select>
            <br>
            <label for="recipient-name" class="col-form-label">รูปภาพ:</label>
            <input class="form-control" type="file" id="file" name="file">
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
        <h5 class="modal-title" id="exampleModalLabel">แก้ไขข้อมูลสถานที่ท่องเที่ยว</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ URL::to('updateAttraction') }}" method="post" enctype="multipart/form-data">
      <div class="modal-body">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">ชื่อสถานที่ท่องเที่ยว:</label>
            <input type="text" class="form-control" id="update_attraction_name" name="update_attraction_name">
            <input type="hidden" class="form-control" id="hidden_update_id" name="hidden_update_id">
            <br>
            <label for="recipient-name" class="col-form-label">ทัวร์ประเทศ:</label>
            <select type="text" class="form-control" id="update_country_select" name="update_country_select" required="required">               
            </select>
            <br>
            <label for="recipient-name" class="col-form-label">รูปภาพ:</label>
            <input class="form-control" type="file" id="updateFile" name="file">
            <input type="hidden" value="{{ csrf_token() }}" name="_token">
          </div>
      </div>
      <div class="modal-footer" style="text-align: right; width: 100%">
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
        <h5 class="modal-title" id="exampleModalLabel">ต้องการลบข้อมูลสถานที่ท่องเที่ยวใช่หรือไม่?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          <input type="hidden" class="form-control" id="hidden_remove_id">
        </button>
      </div>
        <div class="modal-footer" style="text-align: center">
         <button type="button" class="btn btn-secondary" data-dismiss="modal" id="deleteClose">ยกเลิก</button>
        <button type="button" class="btn btn-primary" onclick="deleteAttraction()">ตกลง</button>
      </div>
    </div>
  </div>
</div>

@stop
@section('footer_scripts')
<script type="text/javascript" src="{{asset('js/admin/manage-attraction.js')}}"></script>
@endsection