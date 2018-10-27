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
            จัดการทัวร์
        </h1>
    </section>
    <section class="content">
        <form>
            <fieldset>
                <legend>จัดการเงื่อนไขโปรแกรมทัวร์ :</legend>
                <div class="row">
                    <div class="col-lg-4" style="text-align: left">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="ค้นหา" id="search_conditions">
                            <span class="input-group-btn">
                                <button class="btn btn-secondary" type="button" id="searchButton"> <span class="glyphicon glyphicon-search"></span>ค้นหา</button></button>
                            </span>
                        </div>
                    </div>
                    <div class="col-lg-4" style="text-align: left">
                        <a href="../manage-conditions-action" class="btn btn-info"> 
                            <span class="glyphicon glyphicon-plus"></span>&nbsp;เพิ่มเงื่อนไขโปรแกรมทัวร์</a>
                        &nbsp;&nbsp;
                        <a href="../manage-conditions" class="btn btn-danger">
                            <span class="glyphicon glyphicon-erase"></span>&nbsp;ล้างเงื่อนไข</a> 
                    </div>
                </div>  </fieldset>
        </form>  <br> <br>
        <div class="row">
            <div class="col-lg-12">
                <div class="box">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-striped" id="conditionsTable">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>
                                                ลำดับ
                                            </th>
                                            <th>
                                                เงื่อนไข
                                            </th>
                                            <th>
                                                ผู้สร้าง
                                            </th>
                                            <th>
                                                Actions
                                            </th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>


<!--                <table id="conditionsTable" class="display responsive nowrap" style="width:100%">
    <thead>
        <tr>
            <th>ลำดับที่</th>
            <th>อัตตราค่าบริการนี้รวม</th>
            <th>อัตตราค่าบริการนี้ไม่รวม</th>
            <th>เงื่อนไขการชำระเงิน</th>
            <th>การยกเลิกและการเปลี่ยนแปลง</th>
            <th>เงื่อนไขและข้อกำหนดอื่นๆ</th>
            <th>เงื่อนไขนอกเหนือความรับผิดชอบ</th>
            <th>คำแนะนำแนะข้อควรระวังในการเดินทาง</th>
            <th>ข้อมูลเกี่ยวกับการยื่นวีซ่า</th>
            <th>ข้อตกลงสำคัญ</th>
            <th>สร้างโดย</th>
            <th>แก้ไข</th>
            <th>ลบ</th>
        </tr>
    </thead>
    <tbody id="conditionsData">
    </tbody>
    <tfoot>
        <tr>
            <th>ลำดับที่</th>
            <th>อัตตราค่าบริการนี้รวม</th>
            <th>อัตตราค่าบริการนี้ไม่รวม</th>
            <th>เงื่อนไขการชำระเงิน</th>
            <th>การยกเลิกและการเปลี่ยนแปลง</th>
            <th>เงื่อนไขและข้อกำหนดอื่นๆ</th>
            <th>เงื่อนไขนอกเหนือความรับผิดชอบ</th>
            <th>คำแนะนำแนะข้อควรระวังในการเดินทาง</th>
            <th>ข้อมูลเกี่ยวกับการยื่นวีซ่า</th>
            <th>ข้อตกลงสำคัญ</th>
            <th>สร้างโดย</th>
            <th>แก้ไข</th>
            <th>ลบ</th>
        </tr>
    </tfoot>
</table>-->
            </div>
        </div>
    </section>
</div>

<!-- remove modal -->
<div class="modal fade" id="removeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ต้องการลบข้อมูลเงื่อนไขใช่หรือไม่?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <input type="hidden" class="form-control" id="rm_condition_id">
                </button>
            </div>
            <div class="modal-footer" style="text-align: center">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="deleteClose">ยกเลิก</button>
                <button type="button" class="btn btn-primary" onclick="conditions_remove()">ตกลง</button>
            </div>
        </div>
    </div>
</div>

@stop
@section('footer_scripts')
<script type="text/javascript" src="../js/master/manage-conditions.js"></script>
@endsection