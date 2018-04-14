$(function () {
    $('#searchButton').click(function () {
        var input_other_name= $('#input_other_name').val();
        var checkEmpty = input_other_name.trim();
        if(checkEmpty.length<=0){
            refresh()
        }
        else{
             findOtherByName(input_other_name);
        }
    });
    $('#clearButton').click(function () {
           $('#otherTable').dataTable().fnClearTable();
           $('#input_other_name').val('');
           $('#other_name').val('');
    });
    $('#close').click(function () {
           $('#other_name').val('');
    });
    $(document).ready(function() {
        createTable()
        $('#otherTable').DataTable();
    } );
});

function createTable(){
    var Str = '';
            $.ajax({
            type: 'post',
            url: 'searchOther',
            async: false,
            data: {'input_other_name': null},
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                if (data != null) {
                 var rowNo=1;
                 for(var row = 0 ; row<data.length ;row++){
                    Str=Str+'<tr>';
                    Str=Str+'<td>'+rowNo+'</td>';
                    Str=Str+'<td>'+data[row].other_name+'</td>';
                    Str=Str+'<td>'+data[row].created_by+'</td>';
                    Str=Str+'<td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal" onclick="editOther('+data[row].other_id+',\''+data[row].other_name+'\')">\n\
                    <span class="glyphicon glyphicon-pencil"></span>&nbsp;แก้ไข</button></td>';
                    Str=Str+'<td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#removeModal" onclick="removeOther('+data[row].other_id+')">\n\
                    <span class="glyphicon glyphicon-minus"></span>&nbsp;ลบ</button></td>';
                    Str=Str+'</tr>';  
                    rowNo++;
               }
                document.getElementById("otherData").innerHTML = Str;
                    
                } else {
                    alert('select fail');
                }
            },
            error: function (data) {
                alert('error');
            }
        });
}

function removeOther(id){
        $('#hidden_remove_id').val(id);
       // $('#removeModal').modal('show'); 
}
function editOther(id,otherName){
    $('#hidden_update_id').val(id);
    $('#update_other_name').val(otherName);
   // $('#editModal').modal('hide'); 
}

function saveOther(){
    var other_name= $('#other_name').val();
    var checkEmpty = other_name.trim();
    if(checkEmpty.length<=0){
        alert('กรุณาระบุชื่อ Tags')
        return false;
    }
    $.ajax({
            type: 'post',
            url: 'saveOther',
            async: false,
            data: {'other_name': other_name},
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
    document.getElementById("otherData").innerHTML = '';
    $('#other_name').val('');
    $('#otherTable').DataTable().destroy();
    createTable();
    $('#otherTable').DataTable();
    $('#hidden_remove_id').val('')
    $('#hidden_update_id').val('')
}

function findOtherByName(otherName){
        var Str = '';
            var input_other_name= $('#input_other_name').val();
            $.ajax({
            type: 'post',
            url: 'searchOther',
            async: false,
            data: {'input_other_name': input_other_name},
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                if (data != null) {
                    document.getElementById("otherData").innerHTML = '';
                    $('#other_name').val('');
                    $('#otherTable').DataTable().destroy();
                    var rowNo=1;
                 for(var row = 0 ; row<data.length ;row++){
                    Str=Str+'<tr>';
                    Str=Str+'<td>'+rowNo+'</td>';
                    Str=Str+'<td>'+data[row].other_name+'</td>';
                    Str=Str+'<td>'+data[row].created_by+'</td>';
                    Str=Str+'<td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal" onclick="editOther('+data[row].other_id+',\''+data[row].other_name+'\')">\n\
                    <span class="glyphicon glyphicon-pencil"></span>&nbsp;แก้ไข</button></td>';
                    Str=Str+'<td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#removeModal" onclick="removeOther('+data[row].other_id+')">\n\
                    <span class="glyphicon glyphicon-minus"></span>&nbsp;ลบ</button></td>';
                    Str=Str+'</tr>';  
                    rowNo++;
                    }
                document.getElementById("otherData").innerHTML = Str;
                $('#otherTable').DataTable();   
                } else {
                    alert('select fail');
                }
            },
            error: function (data) {
                alert('error');
            }
        });
}

function deleteOther(){
    var id= $('#hidden_remove_id').val();
            $.ajax({
            type: 'post',
            url: 'deleteOther',
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


function updateOther(){
    var id= $('#hidden_update_id').val();
    var update_other_name= $('#update_other_name').val();
            $.ajax({
            type: 'post',
            url: 'updateOther',
            async: false,
            data: {'id': id,'update_other_name': update_other_name},
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



