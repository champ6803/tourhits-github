@extends('layout.main')
@section('page_title','Login')
@section('main-content')


<style>
    /* style inputs and link buttons */
    input, .btn-lr{
        
        padding: 12px;
        border: none;
        border-radius: 4px;
        margin: 5px 0;
        opacity: 0.85;
        display: inline-block;
        font-size: 17px;
        line-height: 20px;
        text-decoration: none; /* remove underline from anchors */
    }

    input:hover{}
    .btn-lr:hover {
        opacity: 1;
        color : white;
    }

    /* add appropriate colors to fb, twitter and google buttons */

    /* style the submit button */
    input[type=submit] {
        background-color: #333333;
        color: #fff;
        cursor: pointer;
        border: 1px solid #333333;
        width: 50%;
        font-size: 25px;
        margin-left: 25%;
        margin-right: 25%;
        opacity: 0.85;
        box-shadow: 0px 0px 2px rgba(0, 0, 0, 0.5);
    }

    input[type=submit]:hover {
        background-color: #333333;
        color: #fff;
        cursor: pointer;
        border: 1px solid #333333;
        width: 50%;
        font-size: 25px;
        margin-left: 25%;
        margin-right: 25%;
        opacity: 1;     
    }

    input[type="email"], input[type="password"] {
        background-color: #ffffff;
        border: 0px solid #7F7FF5;
        width: 100%;
        font-size: 20px;
    }
    
    /* Two-column layout */
    .col {
        float: left;
        width: 50%;
        margin: auto;
        padding: 0 50px;
/*        margin-top: 30px;*/
    }

    /* Clear floats after the columns */
    .row:after {
        content: "";
        display: table;
        clear: both;
    }

    /* vertical line */
    .vl {
        position: absolute;
        left: 26%;
        transform: translate(-50%);
        border: 1.2px solid #EC2424;
        width: 400px;
        height: 0px;
        margin-top: -43px;
    }
    
    /* hide some text on medium and large screens */
    .hide-md-lg {
        display: none;
    }


    /* Responsive layout - when the screen is less than 650px wide, make the two columns stack on top of each other instead of next to each other */
    @media screen and (max-width: 740px) {
        .col {
            width: 100%;
            margin-top: 0;
        }

        /* show the hidden text on small screens */
        .hide-md-lg {
            display: block;
            text-align: center;
        }
    }

    @media screen and (max-width: 1404px) {
        /* hide the vertical line */
        .vl {
            display: none;
        }
    }
    
    

</style>

<section class="login-section">
    <div class="login-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-login">
                        <div class="panel-heading"><i class="fab fa-pushed"></i> เข้าสู่ระบบ</div>
                        <div class="panel-body">
                            <div class="row">
                                <h2 style="text-align:center"></h2>
                                <div class="col">
                                    <div class="vl">
                                        <span class="vl-innertext" style="color:#333333;">Login with social media</span>
                                    </div>

                                    <a href="#" class="fb btn-lr">
                                        <i class="fab fa-facebook-f"></i> Login with Facebook
                                    </a>
                                    <a href="#" class="twitter btn-lr">
                                        <i class="fab fa-twitter"></i> Login with Twitter
                                    </a>
                                    <a href="#" class="google btn-lr">
                                        <i class="fab fa-google"></i> Login with Google+
                                    </a>

                                </div>

                                <div class="col">
                                    <div class="hide-md-lg">
                                        <h4>หรือ</h4>
                                    </div>
                                    <div class="login-head"> 
                                        <span style="font-size: 20px; font-weight: 300;"><i class="far fa-envelope"></i> เข้าสู่ระบบด้วยอีเมล์</span>
                                    </div> 
                                    {!! Form::open(['url' => 'login', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'POST'] ) !!}

                                    {{ csrf_field() }}
                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <div class="col-md-12">
                                            <input id="email" type="email" placeholder="Email" class="form-control" name="email" value="{{ old('email') }}" required>
                                            @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <div class="col-md-12">
                                            <input id="password" type="password" placeholder="Password" class="form-control" name="password" required>
                                            @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                            @endif
                                            @if (session('error'))
                                            <span class="help-block">
                                                <strong>{{ session('error') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="checkbox">                                              
                                                <label>
                                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>Remember Me                                                           
                                                </label> 
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <input type="text" hidden="" name="role" value="C">
                                    <input type="submit" value="เข้าสู่ระบบ">
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            <a class="btn btn-link forgot" href="{{ url('/') }}">Forgot Your Password ?</a>
                                        </div>
                                    </div>

                                    {!! Form::close() !!}
                                </div>

                            </div>
                        </div>
                        <div class="bottom-container">
                            <div class="row">
                                <div class="col-signup">
                                    <a href="{{url('/register')}}" style="color:white; font-size: 25px;" class="btn-lr"><i class="fas fa-plus-circle"></i> สมัครสมาชิก ?</a>
                                </div>                             
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection

