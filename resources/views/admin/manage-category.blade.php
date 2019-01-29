@extends('layout.main-admin')
@section('page_title','Admin Management')
@section('main-content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
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
        <legend>จัดการหมวดหมู่:</legend>
        <div class="row">
            <div class="col-lg-4" style="text-align: left">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="ค้นหาหมวดหมู่"id="input_tour_category_name">
                    <span class="input-group-btn">
                    <button class="btn btn-secondary" type="button" id="searchButton"> <span class="glyphicon glyphicon-search"></span>ค้นหา</button></button>
                  </span>
                </div>
            </div>
            <div class="col-lg-4" style="text-align: left">
             <button type="button" class="btn btn-info" data-toggle="modal" data-target="#tourCategoryModal"> 
                    <span class="glyphicon glyphicon-plus"></span>&nbsp;เพิ่มหมวดหมู่</button>&nbsp;&nbsp;
              <button type="button" id="clearButton" class="btn btn-danger">
             <span class="glyphicon glyphicon-erase"></span>&nbsp;ล้างเงื่อนไข</button> 
            </div>
        </div>  </fieldset>
        </form> <br> <br>
        <div class="row">
        <div class="col-lg-12">
        <table id="tourCategoryTable" class="display responsive nowrap" style="width:100%">
        <thead>
            <tr>
                <th>ลำดับที่</th>
                <th>ชื่อหมวดหมู่</th>
                <th>รูปภาพ</th>
                <th>สร้างโดย</th>
                <th>แก้ไข</th>
                <th>ลบ</th>
            </tr>
        </thead>
        <tbody id="tourCategoryData">
        </tbody>
        <tfoot>
            <tr>
                <th>ลำดับที่</th>
                <th>ชื่อหมวดหมู่</th>
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
<div class="modal fade" id="tourCategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">เพิ่มข้อมูลหมวดหมู่</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ URL::to('saveCategory') }}" method="post" enctype="multipart/form-data">
      <div class="modal-body">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">ชื่อหมวดหมู่:</label>
            <input type="text" class="form-control" id="tour_category_name" name="tour_category_name" required="required">
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
        <h5 class="modal-title" id="exampleModalLabel">แก้ไขข้อมูลหมวดหมู่</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <form action="{{ URL::to('updateCategory') }}" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">ชื่อหมวดหมู่:</label>
            <input type="text" class="form-control" id="update_tour_category_name" name="update_tour_category_name">
            <input type="hidden" class="form-control" id="hidden_update_id" name="hidden_update_id">
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
        <h5 class="modal-title" id="exampleModalLabel">ต้องการลบข้อมูลหมวดหมู่ใช่หรือไม่?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          <input type="hidden" class="form-control" id="hidden_remove_id">
        </button>
      </div>
        <div class="modal-footer" style="text-align: center">
         <button type="button" class="btn btn-secondary" data-dismiss="modal" id="deleteClose">ยกเลิก</button>
        <button type="button" class="btn btn-primary" onclick="deleteTourCategory()">ตกลง</button>
      </div>
    </div>
  </div>
</div>

@stop
@section('footer_scripts')
<script type="text/javascript" src="../js/admin/manage-tour-category.js"></script>
<script src='https://code.jquery.com/jquery-1.12.4.js'></script>
<script src='https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js'></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
 
@endsection