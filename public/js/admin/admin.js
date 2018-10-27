$(function(){
    $('#login').click(function(){
        
        var source = {
            
        }
        $.ajax({
            type: 'post',
            url: 'admin_login',
            async: false,
            data: source,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                if (data == 'success') {
                    alert('บันทึกข้อมูลเสร็จสมบูรณ์');
                    document.getElementById("close").click(); 
                    refresh();
                    
                }else {
                    alert('เกิดข้อผิดพลาด กรุณาติดต่อผู้ดูแลระบบ');
                }
            },
            error: function (data) {
                alert('เกิดข้อผิดพลาด กรุณาติดต่อผู้ดูแลระบบ');
            }
        });

    });
});
