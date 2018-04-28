$(function () {
    $('#searchButton').click(function () {
        var input_attraction_name= $('#input_attraction_name').val();
        var checkEmpty = input_attraction_name.trim();
        if(checkEmpty.length<=0){
            refresh()
        }
        else{
             findAttractionByName(input_attraction_name);
        }
    });
    $('#clearButton').click(function () {
           $('#attractionTable').dataTable().fnClearTable();
           $('#input_attraction_name').val('');
           $('#attraction_name').val('');
           $('#attraction_picture').val('')
           $('#update_attraction_picture').val('');
           $('#file').val('');
           $('#updateFile').val('');
    });
    $('#close').click(function () {
           $('#attraction_name').val('');
           $('#attraction_picture').val('')
           $('#update_attraction_picture').val('');
           $('#file').val('');
           $('#updateFile').val('');
    });
    $('#updateClose').click(function () {
           $('#attraction_name').val('');
           $('#attraction_picture').val('')
           $('#update_attraction_picture').val('');
           $('#file').val('');
           $('#updateFile').val('');
    });
    $(document).ready(function() {
        createTable()
        $('#attractionTable').DataTable();
    } );
});

function createTable(){
    var Str = '';
            $.ajax({
            type: 'post',
            url: 'searchAttraction',
            async: false,
            data: {'input_attraction_name': null},
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                if (data != null) {
                 var rowNo=1;
                 for(var row = 0 ; row<data.length ;row++){
                    Str=Str+'<tr>';
                    Str=Str+'<td>'+rowNo+'</td>';
                    Str=Str+'<td>'+data[row].attraction_name+'</td>';
                    Str=Str+'<td> <img src="images/attraction/'+data[row].attraction_picture+'" style="width:60px;height:60px;"></td>'; 
                    Str=Str+'<td>'+data[row].created_by+'</td>';
                    Str=Str+'<td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal" onclick="editAttraction('+data[row].attraction_id+',\''+data[row].attraction_name+'\')">\n\
                    <span class="glyphicon glyphicon-pencil"></span>&nbsp;แก้ไข</button></td>';
                    Str=Str+'<td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#removeModal" onclick="removeAttraction('+data[row].attraction_id+')">\n\
                    <span class="glyphicon glyphicon-minus"></span>&nbsp;ลบ</button></td>';
                    Str=Str+'</tr>';  
                    rowNo++;
               }
                document.getElementById("attractionData").innerHTML = Str;
                    
                } else {
                    alert('select fail');
                }
            },
            error: function (data) {
                alert('error');
            }
        });
}

function removeAttraction(id){
        $('#hidden_remove_id').val(id);
       // $('#removeModal').modal('show'); 
}
function editAttraction(id,attractionName){
    $('#hidden_update_id').val(id);
    $('#update_attraction_name').val(attractionName);
   // $('#editModal').modal('hide'); 
}

function saveAttraction(){
    var attraction_name= $('#attraction_name').val();
    var attraction_picture= $('#attraction_picture').val();
    var checkEmpty = attraction_name.trim();
    if(checkEmpty.length<=0){
        alert('กรุณาระบุชื่อสถานที่ท่องเที่ยว')
        return false;
    }
    $.ajax({
            type: 'post',
            url: 'saveAttraction',
            async: false,
            data: {'attraction_name': attraction_name,'attraction_picture': attraction_picture},
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
    document.getElementById("attractionData").innerHTML = '';
    $('#attraction_name').val('');
    $('#attractionTable').DataTable().destroy();
    createTable();
    $('#attractionTable').DataTable();
    $('#hidden_remove_id').val('')
    $('#hidden_update_id').val('')
    $('#update_attraction_picture').val('');
    $('#attraction_picture').val('');
}

function findAttractionByName(attractionName){
        var Str = '';
            var input_attraction_name= $('#input_attraction_name').val();
            $.ajax({
            type: 'post',
            url: 'searchAttraction',
            async: false,
            data: {'input_attraction_name': input_attraction_name},
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                if (data != null) {
                    document.getElementById("attractionData").innerHTML = '';
                    $('#attraction_name').val('');
                    $('#attractionTable').DataTable().destroy();
                    var rowNo=1;
                 for(var row = 0 ; row<data.length ;row++){
                    Str=Str+'<tr>';
                    Str=Str+'<td>'+rowNo+'</td>';
                    Str=Str+'<td>'+data[row].attraction_name+'</td>';
                    Str=Str+'<td> <img src="images/attraction/'+data[row].attraction_picture+'" style="width:60px;height:60px;"></td>'; 
                    Str=Str+'<td>'+data[row].created_by+'</td>';
                    Str=Str+'<td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal" onclick="editAttraction('+data[row].attraction_id+',\''+data[row].attraction_name+'\')">\n\
                    <span class="glyphicon glyphicon-pencil"></span>&nbsp;แก้ไข</button></td>';
                    Str=Str+'<td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#removeModal" onclick="removeAttraction('+data[row].attraction_id+')">\n\
                    <span class="glyphicon glyphicon-minus"></span>&nbsp;ลบ</button></td>';
                    Str=Str+'</tr>';  
                    rowNo++;
                    }
                document.getElementById("attractionData").innerHTML = Str;
                $('#attractionTable').DataTable();   
                } else {
                    alert('select fail');
                }
            },
            error: function (data) {
                alert('error');
            }
        });
}

function deleteAttraction(){
    var id= $('#hidden_remove_id').val();
            $.ajax({
            type: 'post',
            url: 'deleteAttraction',
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


function updateAttraction(){
    var id= $('#hidden_update_id').val();
    var update_attraction_name= $('#update_attraction_name').val();
    var attraction_picture= $('#update_attraction_picture').val();
            $.ajax({
            type: 'post',
            url: 'updateAttraction',
            async: false,
            data: {'id': id,'update_attraction_name': update_attraction_name,
                'attraction_picture': attraction_picture},
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



