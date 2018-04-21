@extends('layout.main')
@section('page_title','Login')
@section('main-content')


<style>
    
        * {box-sizing: border-box}

        
        /* style inputs and link buttons */
        input, .btn-lr{
          width: 100%;
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
        }
        
        input[type="text"], input[type="password"] {
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
          margin-top: 30px;
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
/*          height: 175px;*/
          width: 400px;
          height: 0px;
/*          top: 50%;*/
          margin-top: -18px;
        }

        /* text inside the vertical line */
        .inner {
          position: absolute;
          top: 50%;
          transform: translate(-50%, -50%);
          background-color: #f1f1f1;
          border: 1px solid #ccc;
          border-radius: 50%;
          padding: 8px 10px;
        }

        /* hide some text on medium and large screens */
        .hide-md-lg {
          display: none;
        }

        /* bottom container */
        .bottom-container {
          text-align: center;
          background-color: #4CAF50;
          border-radius: 0px 0px 4px 4px;
          
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
          

        .vl-innertext {
            position: absolute;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #f2f2f2;
            padding: 5px 10px;
            font-size: 18px;
            color:
        }
        
        .login-section2 .panel-body{
            background-color: #f2f2f2;
        }
        
/*        style หน้ากรอกรายละเอียด*/


    
</style>


<section class="login-section">
    <div class="login-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">Login</div>
                        <div class="panel-body">
                            {!! Form::open(['url' => 'login', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'POST'] ) !!}

                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">Email</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">Password</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required>

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
                                <div class="col-md-6 col-md-offset-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group margin-bottom-3">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Login
                                    </button>

                                    <a class="btn btn-link" href="{{ url('/') }}">
                                        Forgot Your Password?
                                    </a>
                                </div>
                            </div>

                            <p class="text-center margin-bottom-3">
                                Or Login with
                            </p>
                            <div class="row">
                                <div class="col-md-12" align="center">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fab fa-facebook-square"></i>&nbsp;Facebook
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

<section class="login-section2">
    <div class="login-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">เข้าสู่ระบบ</div>
                        <div class="panel-body">
                              <form action="/action_page.php">
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
                                    <input type="text" name="username" placeholder="Email" required autofocus>
                                    <input type="password" name="password" placeholder="Password" required>
                                    <input type="submit" value="เข้าสู่ระบบ">
                                    <a class="btn btn-link forgot" href="http://localhost:8000">Forgot Your Password ?</a>
                                    
                                  </div>

                                </div>
                              </form>
                        </div>
                        <div class="bottom-container">
                            <div class="row">
                              <div class="col-signup">
                                  <a href="#" style="color:white; font-size: 25px;" class="btn-lr">สมัครสมาชิก ?</a>
                                
                              </div>                             
                            </div>
                    
                    
                    
                    </div>
                </div>
            </div>
         </div>
    </div>
</section>


@endsection

