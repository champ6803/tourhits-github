$(function () {
    $('#managemaster').addClass('active');
    $('#routeMenu').addClass('active');

    $('#searchButton').click(function () {
        var input_route_name = $('#input_route_name').val();
        var checkEmpty = input_route_name.trim();
        if (checkEmpty.length <= 0) {
            refresh()
        } else {
            findRouteByName(input_route_name);
        }
    });
    $('#clearButton').click(function () {
        $('#routeTable').dataTable().fnClearTable();
        $('#input_route_name').val('');
        $('#route_name').val('');
    });
    $('#close').click(function () {
        $('#route_name').val('');
    });
    createTable()
    $('#routeTable').DataTable();
});
function createTable() {
    var Str = '';
    $.ajax({
        type: 'post',
        url: 'searchRoute',
        async: false,
        data: {'input_route_name': null},
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            if (data != null) {
                var rowNo = 1;
                for (var row = 0; row < data.length; row++) {
                    Str = Str + '<tr>';
                    Str = Str + '<td>' + rowNo + '</td>';
                    Str = Str + '<td>' + data[row].route_name + '</td>';
                    Str = Str + '<td>' + data[row].created_by + '</td>';
                    Str = Str + '<td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal" onclick="editRoute(' + data[row].route_id + ',\'' + data[row].route_name + '\')">\n\
                    <span class="glyphicon glyphicon-pencil"></span>&nbsp;แก้ไข</button></td>';
                    Str = Str + '<td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#removeModal" onclick="removeRoute(' + data[row].route_id + ')">\n\
                    <span class="glyphicon glyphicon-minus"></span>&nbsp;ลบ</button></td>';
                    Str = Str + '</tr>';
                    rowNo++;
                }
                document.getElementById("routeData").innerHTML = Str;

            } else {
                alert('select fail');
            }
        },
        error: function (data) {
            alert('error');
        }
    });
}

function removeRoute(id) {
    $('#hidden_remove_id').val(id);
    // $('#removeModal').modal('show'); 
}
function editRoute(id, routeName) {
    $('#hidden_update_id').val(id);
    $('#update_route_name').val(routeName);
    // $('#editModal').modal('hide'); 
}

function saveRoute() {
    var route_name = $('#route_name').val();
    var checkEmpty = route_name.trim();
    if (checkEmpty.length <= 0) {
        alert('กรุณาระบุชื่อเส้นทาง')
        return false;
    }
    $.ajax({
        type: 'post',
        url: 'saveRoute',
        async: false,
        data: {'route_name': route_name},
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
    document.getElementById("routeData").innerHTML = '';
    $('#route_name').val('');
    $('#routeTable').DataTable().destroy();
    createTable();
    $('#routeTable').DataTable();
    $('#hidden_remove_id').val('')
    $('#hidden_update_id').val('')
}

function findRouteByName(routeName) {
    var Str = '';
    var input_route_name = $('#input_route_name').val();
    $.ajax({
        type: 'post',
        url: 'searchRoute',
        async: false,
        data: {'input_route_name': input_route_name},
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            if (data != null) {
                document.getElementById("routeData").innerHTML = '';
                $('#route_name').val('');
                $('#routeTable').DataTable().destroy();
                var rowNo = 1;
                for (var row = 0; row < data.length; row++) {
                    Str = Str + '<tr>';
                    Str = Str + '<td>' + rowNo + '</td>';
                    Str = Str + '<td>' + data[row].route_name + '</td>';
                    Str = Str + '<td>' + data[row].created_by + '</td>';
                    Str = Str + '<td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal" onclick="editRoute(' + data[row].route_id + ',\'' + data[row].route_name + '\')">\n\
                    <span class="glyphicon glyphicon-pencil"></span>&nbsp;แก้ไข</button></td>';
                    Str = Str + '<td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#removeModal" onclick="removeRoute(' + data[row].route_id + ')">\n\
                    <span class="glyphicon glyphicon-minus"></span>&nbsp;ลบ</button></td>';
                    Str = Str + '</tr>';
                    rowNo++;
                }
                document.getElementById("routeData").innerHTML = Str;
                $('#routeTable').DataTable();
            } else {
                alert('select fail');
            }
        },
        error: function (data) {
            alert('error');
        }
    });
}

function deleteRoute() {
    var id = $('#hidden_remove_id').val();
    $.ajax({
        type: 'post',
        url: 'deleteRoute',
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


function updateRoute() {
    var id = $('#hidden_update_id').val();
    var update_route_name = $('#update_route_name').val();
    $.ajax({
        type: 'post',
        url: 'updateRoute',
        async: false,
        data: {'id': id, 'update_route_name': update_route_name},
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



