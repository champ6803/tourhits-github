$(function () {
    $(document).ready(function() {
        searchCompanyByCompanyCode();
    } );
});

function searchCompanyByCompanyCode(){
     var company_code= $('#company_code').val();
      $.ajax({
            type: 'post',
            url: 'searchCompanyByCompanyCode',
            async: false,
            data: {'company_code': company_code},
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                if (data != null) {
                    $('#company_name').text(data[0].company_name);
                    $('#company_address').text(data[0].company_address);
                    $('#company_tel_1').text(data[0].company_tel_1);
                    $('#company_tel_2').text(data[0].company_tel_2);
                    $('#company_fax').text(data[0].company_fax);
                    $('#company_email').text(data[0].company_email);
                } else {
                    alert('select fail');
                }
            },
            error: function (data) {
                alert('error');
            }
        });
    
}

