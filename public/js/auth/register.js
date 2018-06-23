$(function () {
    //var country = getCountry();
    facebook_login(user);
    $('#country').val(94);

//    $('select[name=country]').change(function () {
//
//        var url = '{{ url('country') }}' + $(this).val() + '/states/';
//
//        $.get(url, function (data) {
//            var select = $('form select[name= state]');
//
//            select.empty();
//
//            $.each(data, function (key, value) {
//                select.append('<option value=' + value.id + '>' + value.name + '</option>');
//            });
//        });
//    });

    $('#country').change(function () {
        if ($('#country').val() != "94") {
            alert("ยังไม่สามารถเลิอกประเทศอื่นได้");
        }
        $('#country').val(94);
    });

    $('#province').change(function () {
        var province_id = $('#province').val();
        var district = getDistrict(province_id);
        var select = $('#district');
        select.empty();
        select.append("<option value=''> -- กรุณาเลือกอำเภอ -- </option>");
        var selectsub = $('#subdistrict');
        selectsub.empty();
        selectsub.append("<option value=''> -- กรุณาเลือกตำบล -- </option>");
        var postcode = $('#post_code');
        postcode.val('');
        $.each(district, function (key, value) {
            select.append('<option value=' + value.district_id + '>' + value.district_name + '</option>');
        });
    });

    $('#district').change(function () {
        var district_id = $('#district').val();
        subdistrict = getSubdistrict(district_id);
        var select = $('#subdistrict');
        select.empty();
        select.append("<option value=''> -- กรุณาเลือกตำบล -- </option>");
        var postcode = $('#post_code');
        postcode.val('');
        $.each(subdistrict, function (key, value) {
            select.append('<option value=' + value.subdistrict_code + '>' + value.subdistrict_name + '</option>');
        });
    });

    $('#subdistrict').change(function () {
        var subdistrict_code = $('#subdistrict').val();
        var postcode = $('#post_code');
        postcode.empty();
        $.each(subdistrict, function (key, value) {
            if (value.subdistrict_code === subdistrict_code) {
                postcode.val(value.post_code);
            }
            //select.append('<option value=' + value.subdistrict_id + '>' + value.subdistrict_name + '</option>');
        });
    });
});

function getDistrict(province_id) {
    var district = '';
    //var province_id = $('#province').val();
    $.ajax({
        type: 'post',
        url: 'getDistrict',
        async: false,
        data: {
            'province_id': province_id
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            if (data != null) {
                district = data;
            } else {
                alert('select fail');
            }
        },
        error: function (data) {
            alert('error');
        }
    });
    return district;
}

function getSubdistrict(district_id) {
    var subdistrict = '';
    //var province_id = $('#province').val();
    $.ajax({
        type: 'post',
        url: 'getSubdistrict',
        async: false,
        data: {
            'district_id': district_id
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            if (data != null) {
                subdistrict = data;
            } else {
                alert('select fail');
            }
        },
        error: function (data) {
            alert('error');
        }
    });
    return subdistrict;
}

function facebook_login(source) {
    if (source) {
        if (source.email)
            $('#email').val(source.email);
        if (source.name) {
            var fullname = source.name.split(" ");
            var firstname = fullname[0];
            var lastname = fullname[1];
            $('#first_name').val(firstname);
            $('#last_name').val(lastname);
        }
        if (source.password){
            $('#password').val(source.password);
            $('#password-confirm').val(source.password);
        }
    }
}