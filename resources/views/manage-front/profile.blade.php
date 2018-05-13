@extends('layout.main-admin')
@section('page_title','Admin Management')
@section('main-content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            การติดต่อ
        </h1>
    </section>
    <section class="content">
        <input type="hidden" id="company_code" value="THG">
        <div class="card border-success mb-3" >
  <div class="card-body text-success">
      <h4 class="card-title" style="color: black; background-color: #F0FFF0 ">รายละเอียดการติดต่อ</h4>
         <div class="row" style="padding: 7px">
          <div class="col-lg-1"></div>
          <div class="col-lg-2"> <p class="card-text" style="font-size: 15px ; color: black;  font-weight: 600;">บริษัท : </p></div> 
          <div class="col-lg-9"><p class="card-text" style="font-size: 15px ;" id="company_name"></p></div>
          </div>
          <div class="row" style="padding: 7px">
          <div class="col-lg-1"></div>
          <div class="col-lg-2"><p class="card-text" style="font-size: 15px ; color: black;  font-weight: 600;" >ที่อยู่ : </p> </div> 
          <div class="col-lg-9"><p class="card-text" style="font-size: 15px ;" id="company_address"></p></div>
          </div>
          <div class="row" style="padding: 7px">
          <div class="col-lg-1"></div>
          <div class="col-lg-2"><p class="card-text" style="font-size: 15px ; color: black;  font-weight: 600;"> เบอร์โทร 1 : </p> </div>
          <div class="col-lg-3"><p class="card-text" style="font-size: 15px ;" id="company_tel_1"></p></div>
          <div class="col-lg-2"><p class="card-text" style="font-size: 15px ; color: black;  font-weight: 600;"> เบอร์โทร 2 : </p></div>
          <div class="col-lg-3"><p class="card-text" style="font-size: 15px ;" id="company_tel_2"></p></div>
          </div>
          <div class="row" style="padding: 7px">
          <div class="col-lg-1"></div>
          <div class="col-lg-2"><p class="card-text" style="font-size: 15px ; color: black;  font-weight: 600;">Fax : </p> </div>
           <div class="col-lg-3"><p class="card-text" style="font-size: 15px ;"id="company_fax"></p></div>
          <div class="col-lg-2"><p class="card-text" style="font-size: 15px ; color: black;  font-weight: 600;">email :</p> </div>
          <div class="col-lg-3"><p class="card-text" style="font-size: 15px ;" id="company_email"></p></div>
          </div>
  
  </div>
</div>
        </div>
    </section>
</div>



@stop
@section('footer_scripts')
<script type="text/javascript" src="../js/manage-front/profile.js"></script>
<script src='https://code.jquery.com/jquery-1.12.4.js'></script>
<script src='https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js'></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
 
@endsection