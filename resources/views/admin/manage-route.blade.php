@extends('layout.main-admin')
@section('page_title','Admin Management')
@section('main-content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            จัดการทัวร์
            <small>จัดการเส้นทาง</small>
        </h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-1">
                 <label>เส้นทาง : </label>
             </div>
            <div class="col-lg-4">
                 <input type="text" class="form-control" id="usr">
            </div>
        </div>
        <br>
         <div class="row">
            <div class="col-lg-4"></div>
            <div class="col-lg-6"> 
                <button type="button" class="btn btn-success">ค้นหา</button>
                <button type="button" class="btn btn-info">เพิ่มเส้นทาง</button>
                <button type="button" class="btn btn-danger">ล้างเงื่อนไข</button>
            </div>
        </div>
        <br> <br> <br>
        <div class="row">
        <table id="routeTable" class="display" style="width:100%">
        <thead>
            <tr>
                <th>รหัสเส้นทาง</th>
                <th>ชื่อเส้นทาง</th>
                <th>ผู้สร้าง</th>
                <th>แก้ไขข้อมูล</th>
                <th>ลบข้อมูล</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>รหัสเส้นทาง</th>
                <th>ชื่อเส้นทาง</th>
                <th>ผู้สร้าง</th>
                <th>แก้ไขข้อมูล</th>
                <th>ลบข้อมูล</th>
            </tr>
        </tfoot>
    </table>
        </div>
    </section>
</div>

@stop
@section('footer_scripts')
<script type="text/javascript" src="../js/admin/manage-route.js"></script>
<script src='https://code.jquery.com/jquery-1.12.4.js'></script>
<script src='https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js'></script>
@endsection