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
       <form action="{{ URL::to('saveReview') }}" method="post" enctype="multipart/form-data">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Tour Review</h3>
                <h6 class="box-subtitle">Add New Review</h6>
            </div>
            <div class="box box-body">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group row">
                            <img src="{{ url('images/review/'.$reviewObj->review_img_1) }}" style="height:200px;">
                            <label for="file" class="col-sm-2 control-label">Image 1</label>
                            <div id="div_file" class="col-sm-10">
                                <input class="form-control" type="file" id="file1" name="file1">
                                <input type="hidden" value="{{ csrf_token() }}" name="_token">
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group row">
                            <img src="{{ url('images/review/'.$reviewObj->review_img_2) }}" style="height:200px;">
                            <label for="file" class="col-sm-2 control-label">Image 2</label>
                            <div id="div_file" class="col-sm-10">
                                <input class="form-control" type="file" id="file2" name="file2">
                                <input type="hidden" value="{{ csrf_token() }}" name="_token">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="form-group row">
                            <img src="{{ url('images/review/'.$reviewObj->review_img_3) }}" style="height:200px;">
                            <label for="file" class="col-sm-2 control-label">Image 3</label>

                            <div id="div_file" class="col-sm-10">
                                <input class="form-control" type="file" id="file3" name="file3">
                                <input type="hidden" value="{{ csrf_token() }}" name="_token">
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group row">
                          <img src="{{ url('images/review/'.$reviewObj->review_img_4) }}" style="height:200px;">
                            <label for="file" class="col-sm-2 control-label">Image 4</label>
                            <div id="div_file" class="col-sm-10">
                                <input class="form-control" type="file" id="file4" name="file4">
                                <input type="hidden" value="{{ csrf_token() }}" name="_token">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="form-group row">
                            <img src="{{ url('images/review/'.$reviewObj->review_img_5) }}" style="height:200px;">
                            <label for="file" class="col-sm-2 control-label">Image 5</label>
                            <div id="div_file" class="col-sm-10">
                                <input class="form-control" type="file" id="file5" name="file5">
                                <input type="hidden" value="{{ csrf_token() }}" name="_token">
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group row">
                           <img src="{{ url('images/review/'.$reviewObj->review_img_6) }}" style="height:200px;">
                            <label for="file" class="col-sm-2 control-label">Image 6</label>
                            <div id="div_file" class="col-sm-10">
                                <input class="form-control" type="file" id="file6" name="file6">
                                <input type="hidden" value="{{ csrf_token() }}" name="_token">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="form-group row">
                           <img src="{{ url('images/review/'.$reviewObj->review_img_7) }}" style="height:200px;">
                            <label for="file" class="col-sm-2 control-label">Image 7</label>
                            <div id="div_file" class="col-sm-10">
                                <input class="form-control" type="file" id="file7" name="file7">
                                <input type="hidden" value="{{ csrf_token() }}" name="_token">
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group row">
                         <img src="{{ url('images/review/'.$reviewObj->review_img_8) }}" style="height:200px;">
                            <label for="file" class="col-sm-2 control-label">Image 8</label>
                            <div id="div_file" class="col-sm-10">
                                <input class="form-control" type="file" id="file8" name="file8">
                                <input type="hidden" value="{{ csrf_token() }}" name="_token">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="form-group row">
                           <img src="{{ url('images/review/'.$reviewObj->review_img_9) }}" style="height:200px;">
                            <label for="file" class="col-sm-2 control-label">Image 9</label>
                            <div id="div_file" class="col-sm-10">
                                <input class="form-control" type="file" id="file9" name="file9">
                                <input type="hidden" value="{{ csrf_token() }}" name="_token">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <button type="submit" class="btn btn-info">บันทึก</button>
                    </div>
                </div>
            </div>
        </div>
       </form>
    </section>
</div>


@stop
@section('footer_scripts')
<script type="text/javascript" src="{{asset('js/manage-front/manage-front-review.js')}}"></script>
@endsection