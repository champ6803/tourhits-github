@extends('layout.main-admin')
@section('page_title','Admin Management')
@section('main-content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            จัดการรายการทัวร์
        </h1>
    </section>
    <section class="content">
  <div class="card border-success mb-3" >
  <div class="card-body text-success">
      <h4 class="card-title" style="color: black; background-color: #F0FFF0 ">เพิ่ม packageทัวร์</h4>
         <div class="row" style="padding: 7px">
          <div class="col-lg-1"></div>
          <div class="col-lg-2"> <p class="card-text" style="font-size: 15px ; color: black;  font-weight: 600;">ประเภททัวร์ : </p></div> 
          <div class="col-lg-3"><div id="selectTourCategory"></div></div>
          <div class="col-lg-2"><p class="card-text" style="font-size: 15px ; color: black;  font-weight: 600;" >ประเทศทัวร์ : </p> </div> 
          <div class="col-lg-3"><div id="selectTourCountry"></div></div>
          </div>
          <div class="row" style="padding: 7px">
          <div class="col-lg-1"></div>
          <div class="col-lg-2"><p class="card-text" style="font-size: 15px ; color: black;  font-weight: 600;"> ชื่อทัวร์ : </p> </div>
          <div class="col-lg-3"><input  type="text" id="tourName"> </div>
          <div class="col-lg-2"><p class="card-text" style="font-size: 15px ; color: black;  font-weight: 600;"> รายละเอียดทัวร์ : </p></div>
          <div class="col-lg-3"> <textarea id="tourDetail" rows="4"></textarea></div>
          </div>
          <div class="row" style="padding: 7px">
          <div class="col-lg-1"></div>
          <div class="col-lg-2"><p class="card-text" style="font-size: 15px ; color: black;  font-weight: 600;">ไฮไลต์ของทัวร์ : </p> </div>
          <div class="col-lg-3"><input type="text" id="highlightTour"></div>
          <div class="col-lg-2"><p class="card-text" style="font-size: 15px ; color: black;  font-weight: 600;">รูปภาพ :</p> </div>
          <div class="col-lg-3"><input type="file" id="picture" name="picture"> </div>
          </div>
          <div class="row" style="padding: 7px">
          <div class="col-lg-1"></div>
          <div class="col-lg-2"><p class="card-text" style="font-size: 15px ; color: black;  font-weight: 600;">จำนวนวัน : </p> </div>
          <div class="col-lg-3"><input id="day" type="number" name="day"></div>
          <div class="col-lg-2"><p class="card-text" style="font-size: 15px ; color: black;  font-weight: 600;">จำนวนคืน :</p> </div>
          <div class="col-lg-3"><input id="night" type="number" name="night"></div>
          </div>
          <div class="row" style="padding: 7px">
          <div class="col-lg-1"></div>
          <div class="col-lg-2"><p class="card-text" style="font-size: 15px ; color: black;  font-weight: 600;">วันที่เริ่มต้น : </p> </div>
          <div class="col-lg-3"><input  id="startDate"></div>
          <div class="col-lg-2"><p class="card-text" style="font-size: 15px ; color: black;  font-weight: 600;">วันที่สิ้นสุด :</p> </div>
          <div class="col-lg-3"><input type="text" id="endDate"></div>
          </div> 
          
          <div class="row" style="padding: 7px;" >
              <div class="col-lg-10"></div>
              <button type="button" class="btn btn-info" onclick="genTable();"> 
              <span class="glyphicon glyphicon-plus"></span>&nbsp;ตกลง</button>&nbsp;&nbsp;
              <button type="button" id="clearButton" class="btn btn-danger" onclick="clearGenTable();">
             <span class="glyphicon glyphicon-erase" ></span>&nbsp;ล้างเงื่อนไข</button> 
         </div>
  </div>
</div>
        
<div class="card border-success mb-3" >
  <div class="card-body text-success">
      <h4 class="card-title" style="color: black; background-color: #F0FFF0 ">เพิ่ม รายละเอียดวันpackageทัวร์</h4>
       <div class="row" style="padding: 7px;" >
       <div class="col-lg-2"></div>
        <table id="dayTable" class="display responsive nowrap" style="width:100%">
        <thead>
            <tr>
                <th>    วันที่     </th>
                <th>    ชื่อรายการทัวร์ของวัน    </th>
                <th>    รายะละเอียด  </th>
            </tr>
        </thead>
        <tbody id="genTable">
        </tbody>
    </table>    
       </div>
         <div class="row" style="padding: 7px;" >
          <div class="col-lg-10"></div>
             <button type="button" class="btn btn-info" id="saveAll"> 
                  <span class="glyphicon glyphicon-plus"></span>&nbsp;บันทึกข้อมูลทั้งหมด</button>
         </div>
  </div>
</div>
    </section>
</div>

 
 
 

@stop
@section('footer_scripts')
<script type="text/javascript" src="../js/admin/manage-tour-list.js"></script>
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