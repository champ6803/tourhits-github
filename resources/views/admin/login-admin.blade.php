@extends('layout.main')
@section('page_title','Administration Login')
@section('main-content')
<style>
    
    .head-logo-login img{
        max-height: 60px;
        
    }
    
    
    .admin-login{
        width: 100%;
        height: 700px;      
        background: #1D4350;  /* fallback for old browsers */
        background: -webkit-linear-gradient(to right, #A43931, #1D4350);  /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(to right, #A43931, #1D4350); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        
    }
    
    .panel-login-admin{
        margin-top: 50px;
        border-radius: 10px;
        background-color: #f2f2f2;
    }
    
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
            margin-top: 10px;
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
          width: 100%;
          margin: auto;
          padding: 0 20px;
          
        }
        
        .col .login-head{
            padding-bottom: 10px;
        }
    
</style>

<section class="admin-login">
    <div class="login-content">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-md-offset-5">
                        <div class="panel panel-login-admin">
                            <div class="panel-heading">
                                <div class="head-logo-login">
                                    <a href=""><img src="../images/logo.png" alt=""></a>
<!--                                    <span style="text-align:center; font-size: 25px;">Administration</span>-->
                                </div>
                            </div>
                        <div class="panel-body">
                              <form action="/action_page.php">
                                <div class="row">
                                  
                  
                                  <div class="col">
                                      <div class="login-head"> 
                                      <span style="font-size: 20px; font-weight: 300;"><i class="fas fa-lock"></i> เข้าสู่ระบบ</span>
                                      </div> 
                                    <input type="text" name="username" placeholder="Username" required autofocus>
                                    <input type="password" name="password" placeholder="Password" required>
                                    <input type="submit" value="เข้าสู่ระบบ">                                   
                                  </div>

                                </div>
                              </form>
                        </div>
                        
                </div>
            </div>
         </div>
        </div>
    </div>
    
    
</section>


@endsection