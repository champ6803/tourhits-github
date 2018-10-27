@extends('layout.main')
@section('page_title','ติดต่อเรา')
@section('main-content')   
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="">
                    <!--<div data-latlong="13.7986948,100.6484321"></div>-->
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3874.676895007023!2d100.64626601483099!3d13.798341090317356!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x311d63697f9a80a9%3A0x89aec0139885f7db!2sTourhits+Co.%2CLtd.!5e0!3m2!1sth!2sth!4v1540654946507" width="100%" height="800" frameborder="0" style="border:0" allowfullscreen></iframe></div>

            </div>
            <div class="col-md-6">
                <div class="contact-page__form">
                    <div class="title">
                        <span style="color: #333333; font-weight: 600;">รับจัดทัวร์ ทัวร์ส่วนตัว ทัวร์กรุ๊ป ในทุกเส้นทาง ทั่วโลก กับทีมงานมืออาชีพ</span>
                        <h2 style="color: #EC2424;">ติดต่อเรา</h2>
                    </div>
                    <div class="descriptions">
                        <p>บริษัท ทัวร์ฮิตส์ จำกัด</p>
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

    </div    

</div>
</section>
@stop
@section('footer_scripts')
    <script type="text/javascript" src="{{ asset('js/contact/contact.js') }}"></script>
@endsection