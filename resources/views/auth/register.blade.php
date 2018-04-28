@extends('layout.main')
@section('page_title','Register')
@section('main-content')
<style>
    .hide-md {
        display: none;
    }
@media screen and (max-width: 991px) {
     /* show the hidden text on small screens */
        .hide-md{
            display: inline-grid;
            font-size: 18px;
            padding-left: 10px;
        }
    }
</style>


<section class="register-section">
    <div class="register-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-register">
                        <div class="panel-heading" align="center">
                            <a href="#" class="fb btn-facebook-reg"><i class="fab fa-facebook-f"></i> Login with Facebook</a>
<!--                        <button class="btn btn-primary"><i class="fab fa-facebook"></i>&nbsp;Continuous With Facebook</button>-->
<!--                            <button class="btn btn-success"><i class="fab fa-line"></i>&nbsp;Start With Line</button>-->
                        </div>
                        <div class="panel-body" style="background-color: #f2f2f2;">
                            <div class="row">
                                <div class="col-md-6">
                                    <hr />
                                </div>
                                <div class="col-md-6">
                                    <hr />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12" align="center">
                                    <h4>กรอกข้อมูลสมาชิก</h4>
                                </div>
                            </div>
                            {!! Form::open(['url' => 'register', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'POST'] ) !!}

                            {{ csrf_field() }}
                            <!--default company is tour expresscenter-->
                            <input hidden="true" id="company" name="company" value="1"> 
                            <div class="row">
                                <div class="col-md-6">

                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label for="email" class="col-md-2 control-label"><i class="far fa-envelope fa-2x"></i></label><span class="hide-md"> อีเมล์</span>
                                        <div class="col-md-10">
                                            {!! Form::email('email', null, ['class' => 'form-control', 'id' => 'email', 'placeholder' => 'Email' , 'required', 'autofocus']) !!}
                                            @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                        <label for="username" class="col-md-2 control-label"><i class="far fa-user-circle fa-2x"></i></label><span class="hide-md"> ยูสเซอร์ไอดี</span>
                                        <div class="col-md-10">
                                            {!! Form::text('username', null, ['class' => 'form-control','id' => 'username', 'placeholder' => 'Username', 'required']) !!}
                                            @if ($errors->has('username'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('username') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <label for="password" class="col-md-2 control-label"><i class="fas fa-key fa-2x"></i></label><span class="hide-md"> พาสเวิร์ด</span>
                                        <div class="col-md-10">
                                            {!! Form::password('password', ['class' => 'form-control', 'id' => 'password', 'placeholder' => 'Password', 'required']) !!}
                                            @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="password-confirm" class="col-md-2 control-label"><i class="fas fa-check-circle fa-2x" style="color: #20bf6b;"></i></label><span class="hide-md"> ยืนยันพาสเวิร์ด</span>
                                        <div class="col-md-10">
                                            {!! Form::password('password_confirmation', ['class' => 'form-control', 'id' => 'password-confirm', 'placeholder' => 'Confirm Password', 'required']) !!}
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                                        <label for="first_name" class="col-md-2 control-label"><i class="fas fa-user-circle fa-2x"></i></label><span class="hide-md"> ชื่อจริง-นามสกุล</span>
                                        <div class="col-md-5">
                                            {!! Form::text('first_name', null, ['class' => 'form-control', 'id' => 'first_name', 'placeholder' => 'First Name']) !!}
                                            @if ($errors->has('first_name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('first_name') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="col-md-5">
                                            {!! Form::text('last_name', null, ['class' => 'form-control', 'id' => 'last_name', 'placeholder' => 'Last Name']) !!}
                                            @if ($errors->has('last_name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('last_name') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                        <label for="phone" class="col-md-2 control-label"><i class="fas fa-mobile-alt fa-2x"></i></label><span class="hide-md"> หมายเลขโทรศัพท์</span>
                                        <div class="col-md-10">
                                            {!! Form::text('phone', null, ['class' => 'form-control', 'id' => 'phone', 'placeholder' => 'Phone']) !!}
                                            @if ($errors->has('phone'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('phone') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group{{ $errors->has('line_id') ? ' has-error' : '' }}">
                                        <label for="phone" class="col-md-2 control-label"><i class="fab fa-line fa-2x"></i></label><span class="hide-md"> ไอดีไลน์</span>
                                        <div class="col-md-10">
                                            {!! Form::text('line_id', null, ['class' => 'form-control', 'id' => 'line_id', 'placeholder' => 'Line']) !!}
                                            @if ($errors->has('line_id'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('line_id') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
<!--                                <div class="vl"></div>-->
                                <div class="col-md-6">
                                    <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                        <label for="address" class="col-md-3 control-label"><i class="far fa-address-card fa-2x"></i></label><span class="hide-md"> บ้านเลขที่</span>
                                        <div class="col-md-9">
                                            {!! Form::text('address', null, ['class' => 'form-control', 'id' => 'address', 'placeholder' => 'Address']) !!}
                                            @if ($errors->has('address'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('address') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
                                        <label for="country" class="col-md-3 control-label">ประเทศ</label>
                                        <div class="col-md-9">
                                            <select class="full-width" id='country' name="country">
                                                <option value=''> -- กรุณาเลือกประเทศ -- </option>
                                                @foreach ($countryList as $country)
                                                <option value='{{ $country->country_id }}'>{{$country->country_name}}</option>
                                                @endforeach
                                            </select>

                                            @if ($errors->has('country'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('country') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('province') ? ' has-error' : '' }}">
                                        <label for="province" class="col-md-3 control-label">จังหวัด</label>
                                        <div class="col-md-9">
                                            <select class="full-width" id="province" name="province">
                                                <option value=''>จังหวัด</option>
                                                @foreach ($provinceList as $province)
                                                <option value='{{ $province->province_id}}'>{{$province->province_name}}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('province'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('province') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('district') ? ' has-error' : '' }}">
                                        <label for="province" class="col-md-3 control-label">อำเภอ</label>
                                        <div class="col-md-9">
                                            <select class="full-width" id="district" name="district">
                                                <option value=''>อำเภอ</option>
                                            </select>
                                            @if ($errors->has('district'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('district') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('subdistrict') ? ' has-error' : '' }}">
                                        <label for="province" class="col-md-3 control-label">ตำบล</label>
                                        <div class="col-md-9">
                                            <select class="full-width" id="subdistrict" name="subdistrict">
                                                <option value=''>ตำบล</option>
                                            </select>
                                            @if ($errors->has('subdistrict'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('subdistrict') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('post_code') ? ' has-error' : '' }}">
                                        <label for="province" class="col-md-3 control-label">รหัสไปรษณีย์</label>
                                        <div class="col-md-9">
                                            {!! Form::text('post_code', null, ['class' => 'form-control', 'id' => 'post_code', 'placeholder' => 'Post Code']) !!}
                                            @if ($errors->has('post_code'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('post_code') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group margin-bottom-2 padding-top-10">
                                <div class="col-md-12" align="center">
                                    <button type="submit" class="btn btn-reg-submit">
                                        สมัครสมาชิก
                                    </button>
                                </div>
                            </div>

                            {!! Form::close() !!}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('footer_scripts')

<script src='https://www.google.com/recaptcha/api.js'></script>
<script type="text/javascript" src="js/auth/register.js"></script>

@endsection