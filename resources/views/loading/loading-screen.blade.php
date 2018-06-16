@extends('layout.main')
@section('page_title','loading ...')
@section('main-content')

<style>

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

</style>

<section class="loading-section">
    <div class="loading-screen">
        <div class="container">
            <div class="">
                <div class="row">
                    <div class="col-xs-12" align="center">
                        <div class="loading-box">
                            <div class="loading-text">
                                <i class="fas fa-spinner"></i> <span>สวัสดีคุณ {{session('name')}} {{session('text')}}</span>
                            </div>
<!--                            <div class="loading-io">
                                ใส่โหลดตรงนี้
                            </div>-->
                        </div>    
                    </div>
                </div>
            </div>
        </div>
    </div>   
</section>

@endsection
@section('footer_scripts')

<script type="text/javascript">
    $(function () {
        setInterval(function () {
            history.go(-2);
        }, 5000);
    });
</script>

@endsection