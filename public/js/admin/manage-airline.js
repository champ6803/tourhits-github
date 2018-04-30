$(function () {
    $('#searchButton').click(function () {
        var input_airline_name= $('#input_airline_name').val();
        var checkEmpty = input_airline_name.trim();
        if(checkEmpty.length<=0){
            refresh()
        }
        else{
             findAirlineByName(input_airline_name);
        }
    });
    $('#clearButton').click(function () {
           $('#airlineTable').dataTable().fnClearTable();
           $('#input_airline_name').val('');
           $('#airline_name').val('');
           $('#airline_picture').val('')
           $('#update_airline_picture').val('');
           $('#file').val('');
    });
    $('#updateClose').click(function () {
           $('#airline_name').val('');
           $('#airline_picture').val('');
           $('#update_airline_picture').val('');
           $('#fileUpdate').val('');
    });
    $('#close').click(function () {
           $('#airline_name').val('');
           $('#airline_picture').val('');
           $('#update_airline_picture').val('');
           $('#file').val('');
    });
    $(document).ready(function() {
        //ไฮไลต์เมนูที่เข้าอยู่
        document.getElementById("airlineMenu").style.color = "blue";
                document.getElementById("managetour").className = "active";
        createTable()
        $('#airlineTable').DataTable();
    } );
});

function createTable(){
    var Str = '';
            $.ajax({
            type: 'post',
            url: 'searchAirline',
            async: false,
            data: {'input_airline_name': null},
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                if (data != null) {
                 var rowNo=1;
                 for(var row = 0 ; row<data.length ;row++){
                    Str=Str+'<tr>';
                    Str=Str+'<td>'+rowNo+'</td>';
                    Str=Str+'<td>'+data[row].airline_name+'</td>';
                    Str=Str+'<td> <img src="images/airline/'+data[row].airline_picture+'" style="height:40px;"></td>'; 
                    Str=Str+'<td>'+data[row].created_by+'</td>';
                    Str=Str+'<td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal" onclick="editAirline('+data[row].airline_id+',\''+data[row].airline_name+'\')">\n\
                    <span class="glyphicon glyphicon-pencil"></span>&nbsp;แก้ไข</button></td>';
                    Str=Str+'<td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#removeModal" onclick="removeAirline('+data[row].airline_id+')">\n\
                    <span class="glyphicon glyphicon-minus"></span>&nbsp;ลบ</button></td>';
                    Str=Str+'</tr>';  
                    rowNo++;
               }
                document.getElementById("airlineData").innerHTML = Str;
                    
                } else {
                    alert('select fail');
                }
            },
            error: function (data) {
                alert('error');
            }
        });
}

function removeAirline(id){
        $('#hidden_remove_id').val(id);
}
function editAirline(id,airlineName){
    $('#hidden_update_id').val(id);
    $('#update_airline_name').val(airlineName);
}

function saveAirline(){
    var airline_name= $('#airline_name').val();
    var checkEmpty = airline_name.trim();
    if(checkEmpty.length<=0){
        alert('กรุณาระบุชื่อสายการบิน')
        return false;
    }
    var airline_picture= $('#airline_picture').val();
    $.ajax({
            type: 'post',
            url: 'saveAirline',
            async: false,
            data: {'airline_name': airline_name,'airline_picture': airline_picture},
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
               
}

function refresh(){
    document.getElementById("airlineData").innerHTML = '';
    $('#airline_name').val('');
    $('#airlineTable').DataTable().destroy();
    createTable();
    $('#airlineTable').DataTable();
    $('#hidden_remove_id').val('')
    $('#hidden_update_id').val('')
    $('#update_airline_picture').val('');
    $('#airline_picture').val('');
}

function findAirlineByName(airlineName){
        var Str = '';
            var input_airline_name= $('#input_airline_name').val();
            $.ajax({
            type: 'post',
            url: 'searchAirline',
            async: false,
            data: {'input_airline_name': input_airline_name},
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                if (data != null) {
                    document.getElementById("airlineData").innerHTML = '';
                    $('#airline_name').val('');
                    $('#airlineTable').DataTable().destroy();
                    var rowNo=1;
                 for(var row = 0 ; row<data.length ;row++){
                    Str=Str+'<tr>';
                    Str=Str+'<td>'+rowNo+'</td>';
                    Str=Str+'<td>'+data[row].airline_name+'</td>';
                    Str=Str+'<td> <img src="images/airline/'+data[row].airline_picture+'" style="height:40px;"></td>'; 
                    Str=Str+'<td>'+data[row].created_by+'</td>';
                    Str=Str+'<td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal" onclick="editRoute('+data[row].route_id+',\''+data[row].route_name+'\')">\n\
                    <span class="glyphicon glyphicon-pencil"></span>&nbsp;แก้ไข</button></td>';
                    Str=Str+'<td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#removeModal" onclick="removeRoute('+data[row].route_id+')">\n\
                    <span class="glyphicon glyphicon-minus"></span>&nbsp;ลบ</button></td>';
                    Str=Str+'</tr>';  
                    rowNo++;
                    }
                document.getElementById("airlineData").innerHTML = Str;
                $('#airlineTable').DataTable();   
                } else {
                    alert('select fail');
                }
            },
            error: function (data) {
                alert('error');
            }
        });
}

function deleteAirline(){
    var id= $('#hidden_remove_id').val();
            $.ajax({
            type: 'post',
            url: 'deleteAirline',
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


function updateAirline(){
    var id= $('#hidden_update_id').val();
    var update_airline_name= $('#update_airline_name').val();
    var airline_picture= $('#update_airline_picture').val();
            $.ajax({
            type: 'post',
            url: 'updateAirline',
            async: false,
            data: {'id': id,'update_airline_name': update_airline_name,'airline_picture': airline_picture},
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



