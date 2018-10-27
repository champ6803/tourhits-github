@extends('layout.main-admin')
@section('page_title','Admin Management')
@section('main-content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            จัดการหน้าเว็บ
        </h1>
    </section>
    <section class="content">
        <form>
            <fieldset>
                <legend>จัดการหมวดหมู่หน้าบ้าน:</legend>
                <div class="row">
                    <div class="col-lg-4" style="text-align: left">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="ค้นหาแพ็คเกจ" id="search_tour_category_id">
                            <span class="input-group-btn">
                                <button class="btn btn-secondary" type="button" id="searchButton"> <span class="glyphicon glyphicon-search"></span>ค้นหา</button></button>
                            </span>
                        </div>
                    </div>
                    <div class="col-lg-4" style="text-align: left">
                        <button id="addTourCategoryBtn" type="button" class="btn btn-info"> 
                            <span class="glyphicon glyphicon-plus"></span>&nbsp;เพิ่มทัวร์</button>&nbsp;&nbsp;
                        <button type="button" id="clearButton" class="btn btn-danger">
                            <span class="glyphicon glyphicon-erase"></span>&nbsp;ล้างเงื่อนไข</button> 
                    </div>
                </div>  </fieldset>
        </form>
        <br>
        <br>
        <div class="row">
            <div class="col-lg-12" style="overflow-x: scroll;">
                <table id="tourCategoryTable" class="display responsive nowrap">
                    <thead>
                        <tr>
                            <th>ลำดับที่</th>
                            <th>ชื่อทัวร์</th>
                            <th>หมวดหมู่</th>
                            <th>ประเภทหมวดหมู่</th>
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
                            <th>ชื่อทัวร์</th>
                            <th>หมวดหมู่</th>
                            <th>ประเภทหมวดหมู่</th>
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
<div class="modal fade" id="addTourCategoryModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addTourCategoryModalLabel">เพิ่มข้อมูลหมวดหมู่แพ็คเกจทัวร์</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{ URL::to('saveTourCategory') }}" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="tour_country_select" class="col-form-label">ชื่อทัวร์ประเทศ:</label>
                        <select id="tour_country_select" class="form-control" name="tour_country_select">
                            <option value="">-- กรุณาเลือก --</option>
                        </select>
                        <br>
                        <label for="tour_package_select" class="col-form-label">ชื่อแพ็คเกจทัวร์:</label>
                        <select id="tour_package_select" class="form-control" name="tour_package_select">
                            <option value="">-- กรุณาเลือก --</option>
                        </select>
                        <br>
                        <label for="category_type_select class="col-form-label">ประเภท:</label>
                        <select id="category_type_select" class="form-control" name="category_type_select">
                            <option value="">-- กรุณาเลือก --</option>
                            <option value="I">บล็อคด้านหน้า</option>
                            <option value="G">บล็อคหมวดหมู่</option>
                        </select>
                        <br> 
                        <label for="category_select" class="col-form-label">หมวดหมู่:</label>
                        <select id="category_select" class="form-control" name="category_select">
                            <option value="">-- กรุณาเลือก --</option>
                        </select>
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
<div class="modal fade" id="editTourCategoryModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editTourCategoryModalLabel">แก้ไขข้อมูลหมวดหมู่แพ็คเกจทัวร์</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{ URL::to('updateTourCategory') }}" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <input hidden id="edit_tour_category_id" name="edit_tour_category_id">
                        <label for="edit_tour_country_select" class="col-form-label">ชื่อทัวร์ประเทศ:</label>
                        <select id="edit_tour_country_select" class="form-control" name="edit_tour_country_select">
                            <option value="">-- กรุณาเลือก --</option>
                        </select>
                        <br>
                        <label for="edit_tour_package_select" class="col-form-label">ชื่อแพ็คเกจทัวร์:</label>
                        <select id="edit_tour_package_select" class="form-control" name="edit_tour_package_select">
                            <option value="">-- กรุณาเลือก --</option>
                        </select>
                        <br>
                        <label for="edit_category_type_select class="col-form-label">ประเภท:</label>
                        <select id="edit_category_type_select" class="form-control" name="edit_category_type_select">
                            <option value="">-- กรุณาเลือก --</option>
                            <option value="I">บล็อคด้านหน้า</option>
                            <option value="G">บล็อคหมวดหมู่</option>
                        </select>
                        <br> 
                        <label for="edit_category_select" class="col-form-label">หมวดหมู่:</label>
                        <select id="edit_category_select" class="form-control" name="edit_category_select">
                            <option value="">-- กรุณาเลือก --</option>
                        </select>
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

<!-- remove modal -->
<div class="modal fade" id="removeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ต้องการลบข้อมูล แพ็คเกจทัวร์ ใช่หรือไม่?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-footer" style="text-align: center">
                <form action="{{ URL::to('removeTourCategory') }}" method="post" enctype="multipart/form-data">
                    <input type="hidden" value="{{ csrf_token() }}" name="_token">
                    <input type="hidden" class="form-control" id="tour_category_id" name="tour_category_id">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" id="deleteClose">ยกเลิก</button>
                    <button type="submit" name="submit" class="btn btn-primary">ตกลง</button>
                </form>
            </div>
            </form>
        </div>
    </div>
</div>

@stop
@section('footer_scripts')
<script type="text/javascript" src="{{asset('js/manage-front/manage-front-category.js')}}"></script>
@endsection