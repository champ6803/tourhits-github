$(function () {
    $('#manage_front_country').addClass("active");
    $('#manage_front').addClass("active");

    $('#country_select').select2({width: '100%', dropdownParent: $("#tourCountryModal")});
    $('#update_country_select').select2({width: '100%', dropdownParent: $("#editModal")});

    $('#upload').on('click', function () {
        var file_data = $('#sortpicture').prop('files')[0];
        var form_data = new FormData();
        form_data.append('file', file_data);
        alert(form_data);
        $.ajax({
            url: 'saveImageTourCountry', // point to server-side PHP script 
            dataType: 'text', // what to expect back from the PHP script, if anything
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function (php_script_response) {
                alert(php_script_response); // display response from the PHP script, if any
            }
        });
    });
    $('#searchButton').click(function () {
        createTable()
        var input_tour_country_name = $('#input_tour_country_name').val();
        var checkEmpty = input_tour_country_name.trim();
        if (checkEmpty.length <= 0) {
            refresh()
        } else {
            findTourCountryByName(input_tour_country_name);
        }
    });
    $('#clearButton').click(function () {
        $('#tourCountryTable').dataTable().fnClearTable();
        $('#input_tour_country_name').val('');
        $('#tour_country_name').val('');
        $('#tour_country_picture').val('');
        $('#update_tour_country_picture').val('');
    });
    $('#updateClose').click(function () {
        $('#tour_country_name').val('');
        $('#tour_country_picture').val('');
        $('#update_tour_country_picture').val('');
        document.getElementById("country").selectedIndex = "0";
        document.getElementById("countryEdit").selectedIndex = "0";
        $('#updateFile').val('');
    });
    $('#close').click(function () {
        $('#tour_country_name').val('');
        $('#tour_country_picture').val('');
        $('#update_tour_country_picture').val('');
        document.getElementById("country").selectedIndex = "0";
        document.getElementById("countryEdit").selectedIndex = "0";
        $('#file').val('');
    });

    createCountryDropDown('country_select');
    createTable();
    $('#tourCountryTable').DataTable();

});

function createCountryDropDown(selector) {
    $('#' + selector).html($('<option></option>').val("").html("-- กรุณาเลือก --"));
    $.ajax({
        type: 'get',
        url: 'getCountry',
        async: false,
        data: null,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            if (data != null) {
                $.each(data, function () {
                    $('#' + selector).append($('<option></option>').val(this.country_id).html(this.country_name));
                });
            } else {
                alert('select fail');
            }
        },
        error: function (data) {
            alert('error');
        }
    });
}

//function createCountryDropDown() {
//    var StrDropDown = '';
//    $.ajax({
//        type: 'post',
//        url: 'searchAllCountry',
//        async: false,
//        data: null,
//        headers: {
//            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//        },
//        success: function (data) {
//            if (data != null) {
//                StrDropDown = '<select class="form-control" id="country" name="country">';
//                for (var row = 0; row < data.length; row++) {
//                    StrDropDown = StrDropDown + "<option value=" + data[row].country_id + ">" + data[row].country_name + "</option>";
//                }
//                StrDropDown = StrDropDown + '</select>';
//                document.getElementById("selectCountry").innerHTML = StrDropDown;
//            } else {
//                alert('select fail');
//            }
//        },
//        error: function (data) {
//            alert('error');
//        }
//    });
//
//}

function createCountryDropDownEdit() {
    var StrDropDown = '';
    $.ajax({
        type: 'post',
        url: 'searchAllCountry',
        async: false,
        data: null,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            if (data != null) {
                StrDropDown = '<select class="form-control" id="countryEdit" name="countryEdit">';
                for (var row = 0; row < data.length; row++) {
                    StrDropDown = StrDropDown + "<option value=" + data[row].country_id + ">" + data[row].country_name + "</option>";
                }
                StrDropDown = StrDropDown + '</select>';
                document.getElementById("selectCountryEdit").innerHTML = StrDropDown;
            } else {
                alert('select fail');
            }
        },
        error: function (data) {
            alert('error');
        }
    });

}

function createTable() {
    var Str = '';
    $.ajax({
        type: 'post',
        url: 'searchTourCountry',
        async: false,
        data: {'input_tour_country_name': null},
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            if (data != null) {
                var rowNo = 1;
                for (var row = 0; row < data.length; row++) {
                    Str = Str + '<tr>';
                    Str = Str + '<td>' + rowNo + '</td>';
                    Str = Str + '<td>' + data[row].country_name + '</td>';
                    Str = Str + '<td>' + data[row].tour_country_name + '</td>';
                    Str = Str + '<td>' + data[row].tour_country_detail + '</td>';
//                    Str=Str+'<td> <img src="images/tourCountry/'+data[row].tour_country_img+'" style="height:40px;"></td>'; 
                    Str = Str + '<td>' + data[row].created_by + '</td>';
                    Str = Str + '<td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal" onclick="editTourCountry(' + data[row].tour_country_id + ',\'' + data[row].tour_country_name + '\',\'' + data[row].tour_country_detail + '\',\'' + data[row].country_id + '\')">\n\
                    <span class="glyphicon glyphicon-pencil"></span>&nbsp;แก้ไข</button></td>';
                    Str = Str + '<td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#removeModal" onclick="removeTourCountry(' + data[row].tour_country_id + ')">\n\
                    <span class="glyphicon glyphicon-minus"></span>&nbsp;ลบ</button></td>';
                    Str = Str + '</tr>';
                    rowNo++;
                }
                document.getElementById("tourCountryData").innerHTML = Str;

            } else {
                alert('select fail');
            }
        },
        error: function (data) {
            alert('error');
        }
    });
}

function removeTourCountry(id) {
    $('#hidden_remove_id').val(id);
    // $('#removeModal').modal('show'); 
}
function editTourCountry(id, tourCountryName, tourCountryDetail, countryId) {
    createCountryDropDown('update_country_select');
    $('#hidden_update_id').val(id);
    $('#update_tour_country_name').val(tourCountryName);
    $('#update_tour_country_detail').val(tourCountryDetail);
    $('#update_country_select').val(countryId);
    // $('#editModal').modal('hide'); 
}

function saveTourCountry() {
    var tour_country_name = $('#tour_country_name').val();
    var checkEmpty = tour_country_name.trim();
    if (checkEmpty.length <= 0) {
        alert('กรุณาระบุชื่อ ทัวร์ประเทศ')
        return false;
    }
    var country_id = $('#country').val();
    var tour_country_detail = $('#tour_country_detail').val();
    var tour_country_img = $('#tour_country_picture').val();

    $.ajax({
        type: 'post',
        url: 'saveTourCountry',
        async: false,
        data: {'tour_country_name': tour_country_name, 'country_id': country_id
            , 'tour_country_detail': tour_country_detail, 'tour_country_img': tour_country_img},
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            if (data == 'success') {
                alert('บันทึกข้อมูลเสร็จสมบูรณ์');
                document.getElementById("close").click();
                refresh();

            } else {
                alert('เกิดข้อผิดพลาด กรุณาติดต่อผู้ดูแลระบบ');
            }
        },
        error: function (data) {
            alert('เกิดข้อผิดพลาด กรุณาติดต่อผู้ดูแลระบบ');
        }
    });

}

function refresh() {
    document.getElementById("tourCountryData").innerHTML = '';
    $('#tour_country_name').val('');
    $('#tourCountryTable').DataTable().destroy();
    createTable();
    $('#tourCountryTable').DataTable();
    $('#hidden_remove_id').val('');
    $('#hidden_update_id').val('');
    $('#tour_country_picture').val('');
    $('#update_tour_country_picture').val('');
}

function findTourCountryByName(input_tour_country_name) {
    var Str = '';
    var input_tour_country_name = $('#input_tour_country_name').val();
    $.ajax({
        type: 'post',
        url: 'searchTourCountry',
        async: false,
        data: {'input_tour_country_name': input_tour_country_name},
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            if (data != null) {
                var rowNo = 1;
                for (var row = 0; row < data.length; row++) {
                    Str = Str + '<tr>';
                    Str = Str + '<td>' + rowNo + '</td>';
                    Str = Str + '<td>' + data[row].country_name + '</td>';
                    Str = Str + '<td>' + data[row].tour_country_name + '</td>';
                    Str = Str + '<td>' + data[row].tour_country_detail + '</td>';
                    Str = Str + '<td> <img src="images/tourCountry/' + data[row].tour_country_img + '" style="height:40px;"></td>';
                    Str = Str + '<td>' + data[row].created_by + '</td>';
                    Str = Str + '<td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal" onclick="editTourCountry(' + data[row].tour_country_id + ',\'' + data[row].tour_country_name + '\',\'' + data[row].tour_country_detail + '\',\'' + data[row].country_id + '\')">\n\
                    <span class="glyphicon glyphicon-pencil"></span>&nbsp;แก้ไข</button></td>';
                    Str = Str + '<td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#removeModal" onclick="removeTourCountry(' + data[row].tour_country_id + ')">\n\
                    <span class="glyphicon glyphicon-minus"></span>&nbsp;ลบ</button></td>';
                    Str = Str + '</tr>';
                    rowNo++;
                }
                document.getElementById("tourCountryData").innerHTML = Str;

            } else {
                alert('select fail');
            }
        },
        error: function (data) {
            alert('error');
        }
    });
}

function deleteTourCountry() {
    var id = $('#hidden_remove_id').val();
    $.ajax({
        type: 'post',
        url: 'deleteTourCountry',
        async: false,
        data: {'id': id},
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            if (data != null) {
                alert('ลบข้อมูลเสร็จสมบูรณ์');
                document.getElementById("deleteClose").click();
                refresh()
            } else {
                alert('select fail');
            }
        },
        error: function (data) {
            alert('error');
        }
    });
}


function updateTourCountry() {
    var id = $('#hidden_update_id').val();
    var update_tour_country_name = $('#update_tour_country_name').val();
    var country_id = $('#countryEdit').val();
    var tour_country_detail = $('#update_tour_country_detail').val();
    var tour_country_img = $('#update_tour_country_picture').val();

    $.ajax({
        type: 'post',
        url: 'updateTourCountry',
        async: false,
        data: {'id': id, 'update_tour_country_name': update_tour_country_name
            , 'country_id': country_id, 'tour_country_detail': tour_country_detail
            , 'tour_country_img': tour_country_img},
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            if (data != null) {
                alert('แก้ไขข้อมูลเสร็จสมบูรณ์');
                document.getElementById("updateClose").click();
                refresh()
            } else {
                alert('select fail');
            }
        },
        error: function (data) {
            alert('error');
        }
    });
}