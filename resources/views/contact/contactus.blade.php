<!DOCTYPE html>
@extends('layout.main')
@section('page_title','ติดต่อเรา')
@section('main-content')   

    <!-- PAGE WRAP -->
    <div id="page-wrap">
        <!-- PRELOADER -->
        <div class="preloader"></div>
        <!-- END / PRELOADER -->

        
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="">
<!--<div data-latlong="13.7986948,100.6484321"></div>-->
<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1937.3355103034582!2d100.64843205024845!3d13.798694785765278!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x623ec46dd9d0000f!2sTour+Express+Center+Co.%2CLtd.!5e0!3m2!1sen!2sth!4v1523219948967" width="100%" height="800" frameborder="0" style="border:0" allowfullscreen></iframe></div>
                       
                    </div>
                    <div class="col-md-6">
                        <div class="contact-page__form">
                            <div class="title">
                                <span style="color: #333333; font-weight: 600;">รับจัดทัวร์ ทัวร์ส่วนตัว ทัวร์กรุ๊ป ในทุกเส้นทาง ทั่วโลก กับทีมงานมืออาชีพ</span>
                                <h2 style="color: #EC2424;">ติดต่อเรา</h2>
                            </div>
                            <div class="descriptions">
                                <p>เลขที่ 300/76 โครงการพรีเมี่ยมเพลส 6 ถนนนวมินทร์ แขวงนวมินทร์ เขตบึงกุ่ม กทม. 10240</strong></p>
                                <p>300/76 PREMIUM PLACE 6 NAWAMIN RD. NAWAMIN BUENGKUM BANGKOK THAILAND 10240</p>
                                <p><hr></p>
                                <p>Tel : <strong>0-2379-1249</strong> Fax : <strong>0-2379-1966-7</strong> Hotlines : <strong>062 914 2361</strong></p>
                                <p>E-mail address : <strong><a href="mailto:tourhits@gmail.com">tourhits@gmail.com</a></strong></p>
                            </div>
                            <form class="contact-form" action="processContact.php" method="post">
                                <div class="form-item">
                                    <input type="text" value="" name="name" placeholder="ชื่อของคุณ *" autofocus>
                                </div>
                                <div class="form-item">
                                    <input type="email" value="" name="email" placeholder="อีเมล์ของคุณ *">
                                </div>
                                <div class="form-item">
                                    <input type="text" value="" name="subject" placeholder="เรื่องที่ต้องการติดต่อ *">
                                </div>
                                <div class="form-item">
                                    <input type="number" value="" name="number" maxlength="10" placeholder="เบอร์โทรศัพท์ *">
                                </div>
                                <div class="form-item form-captcha">
                                    <img src="images/img/captcha-demo.png" alt="" class="wpcf7-captchac">
                                    <span class="wpcf7-form-control-wrap">
                                        <input type="text" value="Captcha">
                                    </span>
                                </div>
                                <div class="form-textarea-wrapper">
                                    <textarea name="message">กรอกข้อมูล</textarea>
                                </div>
                                <div class="form-actions">
                                    <input type="submit" value="Send" class="submit-contact">
                                </div>
                                <div id="contact-content"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>


    </div>
    <!-- END / PAGE WRAP -->

    <!-- LOAD JQUERY -->
    <script type="text/javascript" src="js/lib/jquery-1.11.2.min.js"></script>
    <script type="text/javascript" src="js/lib/masonry.pkgd.min.js"></script>
    <script type="text/javascript" src="js/lib/jquery.parallax-1.1.3.js"></script>
    <script type="text/javascript" src="js/lib/jquery.owl.carousel.js"></script>
    <script type="text/javascript" src="js/lib/theia-sticky-sidebar.js"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3"></script>
    <script type="text/javascript" src="js/lib/md-map-extend.js"></script>
    <script type='text/javascript' src="js/lib/jquery-ui.js"></script>
    <script type="text/javascript" src="js/scripts.js"></script>

    <!-- CONTACT FORM -->
    <script type="text/javascript" src="js/lib/jquery.form.min.js"></script>
    <script type="text/javascript" src="js/lib/jquery.validate.min.js"></script>
    <script type="text/javascript">
        /*==============================
            Ajax contact form
        ==============================*/
        if($(".contact-form").length > 0) {
          // Validate the contact form
          $('.contact-form').validate({
            // Add requirements to each of the fields
            rules: {
              name: {
                required: true,
                minlength: 2
              },
              email: {
                required: true,
                email: true
              },
              message: {
                required: true,
                minlength: 10
              }
            },

            // Specify what error messages to display
            // when the user does something horrid
            messages: {
              name: {
                required: "Please enter your first name.",
                minlength: $.format("At least {0} characters required.")
              },
              email: {
                required: "Please enter your email.",
                email: "Please enter a valid email."
              },
              message: {
                required: "Please enter a message.",
                minlength: $.format("At least {0} characters required.")
              }
            },

            // Use Ajax to send everything to processForm.php
            submitHandler: function(form) {
              $(".submit-contact").html("Sending...");
              $(form).ajaxSubmit({
                success: function(responseText, statusText, xhr, $form) {
                  $("#contact-content").slideUp(600, function() {
                    $("#contact-content").html(responseText).slideDown(600);
                    $(".submit-contact").html("Send");
                  });
                }
              });
              return false;
            }
          });
        }
    </script>
</body>
</html>

@stop