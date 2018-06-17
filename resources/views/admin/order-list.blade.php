@extends('layout.main-admin')
@section('page_title','Admin Management')
@section('main-content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Order List
        </h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="breadcrumb-item active">Order List</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xl-12 col-12">		  
                <!-- AREA CHART -->
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">รายการการจองทัวร์</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table id="order_table"></table>
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
@stop

@section('footer_scripts')
<script>
    var orderList = <?php echo json_encode($orderList); ?>;
</script>

<script type="text/javascript" src="{{asset('js/admin/order-list.js')}}"></script>
@endsection