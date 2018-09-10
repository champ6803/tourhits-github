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
        <div class="row">
            <div class="col-lg-12">
                <form action="{{ URL::to('saveConditions') }}" method="post" enctype="multipart/form-data">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">จัดการเงื่อนไขโปรแกรมทัวร์</h3>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-horizontal form-element">
                                        <div class="box-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <input type="hidden" class="form-control" id="conditions_id" name="conditions_id">
                                                        <input type="hidden" value="{{ csrf_token() }}" name="_token">
                                                        <label for="tour_detail_0" class="col-sm-2 control-label">เงื่อนไขโปรแกรมทัวร์ :</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="conditions_name" name="conditions_name">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <label for="tour_detail_0" class="col-sm-2 control-label">อัตตราค่าบริการนี้รวม :</label>
                                                        <div class="col-sm-10">
                                                            <textarea type="text" class="form-control" id="rate_include" name="rate_include"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <label for="tour_detail_0" class="col-sm-2 control-label">อัตตราค่าบริการนี้ไม่รวม :</label>
                                                        <div class="col-sm-10">
                                                            <textarea type="text" class="form-control" id="rate_not_include" name="rate_not_include"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <label for="tour_detail_0" class="col-sm-2 control-label">เงื่อนไขการชำระเงิน :</label>
                                                        <div class="col-sm-10">
                                                            <textarea type="text" class="form-control" id="payment_condition" name="payment_condition"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <label for="tour_detail_0" class="col-sm-2 control-label">การยกเลิกและการเปลี่ยนแปลง :</label>
                                                        <div class="col-sm-10">
                                                            <textarea type="text" class="form-control" id="cancel_change" name="cancel_change"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <label for="tour_detail_0" class="col-sm-2 control-label">เงื่อนไขและข้อกำหนดอื่นๆ :</label>
                                                        <div class="col-sm-10">
                                                            <textarea type="text" class="form-control" id="other_condition" name="other_condition"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <label for="tour_detail_0" class="col-sm-2 control-label">เงื่อนไขนอกเหนือความรับผิดชอบ :</label>
                                                        <div class="col-sm-10">
                                                            <textarea type="text" class="form-control" id="beyond_respon" name="beyond_respon"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <label for="tour_detail_0" class="col-sm-2 control-label">คำแนะนำแนะข้อควรระวังในการเดินทาง :</label>
                                                        <div class="col-sm-10">
                                                            <textarea type="text" class="form-control" id="suggest_warning" name="suggest_warning"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <label for="tour_detail_0" class="col-sm-2 control-label">ข้อมูลเกี่ยวกับการยื่นวีซ่า :</label>
                                                        <div class="col-sm-10">
                                                            <textarea type="text" class="form-control" id="visa_detail" name="visa_detail"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <label for="tour_detail_0" class="col-sm-2 control-label">ข้อตกลงสำคัญ :</label>
                                                        <div class="col-sm-10">
                                                            <textarea type="text" class="form-control" id="agreement" name="agreement"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer" style="text-align: right">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i>&nbsp;บันทึก</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
@stop
@section('footer_scripts')
<script type="text/javascript" src="../js/master/manage-conditions-action.js"></script>
@endsection