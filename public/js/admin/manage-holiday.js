$(function () {
    $('#managemaster').addClass('active');
    $('#holidayMenu').addClass('active');

    $('#searchButton').click(function () {
        var input_holiday_name = $('#input_holiday_name').val();
        var checkEmpty = input_holiday_name.trim();
        if (checkEmpty.length <= 0) {
            refresh()
        } else {
            findHolidayByName(input_holiday_name);
        }
    });
    $('#clearButton').click(function () {
        $('#holidayTable').dataTable().fnClearTable();
        $('#input_holiday_name').val('');
        $('#holiday_name').val('');
    });
    $('#close').click(function () {
        $('#holiday_name').val('');
    });

    $("#startDate").datepicker({
        //format: 'dd/mm/yy',
        dateFormat: 'dd/mm/yy',
        todayBtn: true
    }).datepicker("setDate", "0");
    $("#endDate").datepicker({
        //format: 'dd/mm/yy',
        dateFormat: 'dd/mm/yy',
        todayBtn: true
    }).datepicker("setDate", "0");
    $("#startEditDate").datepicker({
        //format: 'dd/mm/yy',
        dateFormat: 'dd/mm/yy',
        todayBtn: true
    });
    $("#endEditDate").datepicker({
        //format: 'dd/mm/yyyy',
        dateFormat: 'dd/mm/yy',
        todayBtn: true
    });

    createTable()
    $('#holidayTable').DataTable();
});

function createTable() {
    var Str = '';
    $.ajax({
        type: 'post',
        url: 'searchHoliday',
        async: false,
        data: {'input_holiday_name': null},
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            if (data != null) {
                var rowNo = 1;
                for (var row = 0; row < data.length; row++) {
                    Str = Str + '<tr>';
                    Str = Str + '<td>' + rowNo + '</td>';
                    Str = Str + '<td>' + data[row].holiday_name + '</td>';
                    Str = Str + '<td>' + format(data[row].start_date) + '</td>';
                    Str = Str + '<td>' + format(data[row].end_date) + '</td>';
                    Str = Str + '<td>' + data[row].created_by + '</td>';
                    Str = Str + '<td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal" onclick="editHoliday(' + data[row].holiday_id + ',\'' + data[row].holiday_name + '\'\n\
                    ,\'' + data[row].start_date + '\' ,\'' + data[row].end_date + '\')">\n\
                    <span class="glyphicon glyphicon-pencil"></span>&nbsp;แก้ไข</button></td>';
                    Str = Str + '<td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#removeModal" onclick="removeHoliday(' + data[row].holiday_id + ')">\n\
                    <span class="glyphicon glyphicon-minus"></span>&nbsp;ลบ</button></td>';
                    Str = Str + '</tr>';
                    rowNo++;
                }
                document.getElementById("holidayData").innerHTML = Str;

            } else {
                alert('select fail');
            }
        },
        error: function (data) {
            alert('error');
        }
    });
}

function removeHoliday(id) {
    $('#hidden_remove_id').val(id);
}
function format(inputDate) {
    if (null == inputDate || '' == inputDate) {
        return null;
    } else {
        var str = inputDate.split(' ');
        var date = new Date(str[0]);
        // Months use 0 index.
        return date.getDate() + '/' + (date.getMonth() + 1) + '/' + date.getFullYear();
    }

}

function editHoliday(id, holidayName, startDate, endDate) {
    var $datepickerStart = $('#startEditDate');
    $datepickerStart.datepicker('setDate', format(startDate));
    var $datepickerEnd = $('#endEditDate');
    $datepickerEnd.datepicker('setDate', format(endDate));

    $('#hidden_update_id').val(id);
    $('#update_holiday_name').val(holidayName);
}

function saveHoliday() {
    var holiday_name = $('#holiday_name').val();
    var start_date = $('#startDate').val();
    var end_date = $('#endDate').val();
    var checkEmpty = holiday_name.trim();
    var checkstartdate = start_date.trim();
    var checkenddate = end_date.trim();
    if (checkEmpty.length <= 0) {
        alert('กรุณาระบุชื่อวันหยุด')
        return false;
    }
    if (checkstartdate.length <= 0) {
        alert('กรุณาระบุวันที่เริ่มต้น')
        return false;
    }
    if (checkenddate.length <= 0) {
        alert('กรุณาระบุวันที่สิ้นสุด')
        return false;
    }
    $.ajax({
        type: 'post',
        url: 'saveHoliday',
        async: false,
        data: {'holiday_name': holiday_name,
            'start_date': start_date, 'end_date': end_date},
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
    document.getElementById("holidayData").innerHTML = '';
    $('#holiday_name').val('');
    $('#holidayTable').DataTable().destroy();
    createTable();
    $('#holidayTable').DataTable();
    $('#hidden_remove_id').val('')
    $('#hidden_update_id').val('')
}

function findHolidayByName(holidayName) {
    var Str = '';
    var input_holiday_name = $('#input_holiday_name').val();
    $.ajax({
        type: 'post',
        url: 'searchHoliday',
        async: false,
        data: {'input_holiday_name': input_holiday_name},
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            if (data != null) {
                document.getElementById("holidayData").innerHTML = '';
                $('#holiday_name').val('');
                $('#holidayTable').DataTable().destroy();
                var rowNo = 1;
                for (var row = 0; row < data.length; row++) {
                    Str = Str + '<tr>';
                    Str = Str + '<td>' + rowNo + '</td>';
                    Str = Str + '<td>' + data[row].holiday_name + '</td>';
                    Str = Str + '<td>' + format(data[row].start_date) + '</td>';
                    Str = Str + '<td>' + format(data[row].end_date) + '</td>';
                    Str = Str + '<td>' + data[row].created_by + '</td>';
                    Str = Str + '<td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal" onclick="editRoute(' + data[row].route_id + ',\'' + data[row].route_name + '\'\n\
                    ,\'' + data[row].start_date + '\' ,\'' + data[row].end_date + '\')">\n\
                    <span class="glyphicon glyphicon-pencil"></span>&nbsp;แก้ไข</button></td>';
                    Str = Str + '<td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#removeModal" onclick="removeRoute(' + data[row].route_id + ')">\n\
                    <span class="glyphicon glyphicon-minus"></span>&nbsp;ลบ</button></td>';
                    Str = Str + '</tr>';
                    rowNo++;
                }
                document.getElementById("holidayData").innerHTML = Str;
                $('#holidayTable').DataTable();
            } else {
                alert('select fail');
            }
        },
        error: function (data) {
            alert('error');
        }
    });
}

function deleteHoliday() {
    var id = $('#hidden_remove_id').val();
    $.ajax({
        type: 'post',
        url: 'deleteHoliday',
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


function updateHoliday() {
    var id = $('#hidden_update_id').val();
    var start_date = $('#startEditDate').val();
    var end_date = $('#endEditDate').val();
    var checkstartdate = start_date.trim();
    var checkenddate = end_date.trim();
    if (checkstartdate.length <= 0) {
        alert('กรุณาระบุวันที่เริ่มต้น')
        return false;
    }
    if (checkenddate.length <= 0) {
        alert('กรุณาระบุวันที่สิ้นสุด')
        return false;
    }
    var update_holiday_name = $('#update_holiday_name').val();
    $.ajax({
        type: 'post',
        url: 'updateHoliday',
        async: false,
        data: {'id': id, 'update_holiday_name': update_holiday_name
            , 'start_date': start_date, 'end_date': end_date},
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



