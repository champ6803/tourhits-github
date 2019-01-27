@extends('layout.main-admin')
@section('page_title','Admin Management')
@section('main-content')
<style>
    [type=checkbox]:checked, [type=checkbox]:not(:checked) {
        position: relative;
        left: 0; 
        opacity: 1; 
}
</style>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            จัดการทัวร์
        </h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#"><i class="fa fa-database"></i> จัดการทัวร์</a></li>
            <li class="breadcrumb-item active">รายการทัวร์ทั้งหมด</li>
        </ol>
    </section>

    <!-- Main content -->
    <sec    tion class="content">
        <div class="row">
            <div class="col-xl-12 col-12">		  
                <!-- AREA CHART -->
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">รายการทัวร์ทั้งหมด</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <button disabled="true" id="remove" class="btn btn-danger">
                                    <i class="fa fa-check-square"></i>
                                    ลบรายการที่เลือก
                                </button>
                                <table class="table" id="tour_package_table">

                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>

    </section>
    <!-- /.content -->
</div>

<div id="orderDetailModal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">รายละเอียด</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="order_detail_table"></table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@stop

@section('footer_scripts')
<script>
    var tourPackageList = <?php echo json_encode($tourPackageList); ?>;
</script>

<script type="text/javascript" src="{{asset('js/admin/tour-package-list.js')}}"></script>
@endsection