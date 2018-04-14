$(function () {
    $('#searchButton').click(function () {
        var input_tag_name= $('#input_tag_name').val();
        var checkEmpty = input_tag_name.trim();
        if(checkEmpty.length<=0){
            refresh()
        }
        else{
             findTagByName(input_tag_name);
        }
    });
    $('#clearButton').click(function () {
           $('#tagTable').dataTable().fnClearTable();
           $('#input_tag_name').val('');
           $('#tag_name').val('');
    });
    $('#close').click(function () {
           $('#tag_name').val('');
    });
    $(document).ready(function() {
        createTable()
        $('#tagTable').DataTable();
    } );
});

function createTable(){
    var Str = '';
            $.ajax({
            type: 'post',
            url: 'searchTag',
            async: false,
            data: {'input_tag_name': null},
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                if (data != null) {
                 var rowNo=1;
                 for(var row = 0 ; row<data.length ;row++){
                    Str=Str+'<tr>';
                    Str=Str+'<td>'+rowNo+'</td>';
                    Str=Str+'<td>'+data[row].tag_name+'</td>';
                    Str=Str+'<td>'+data[row].created_by+'</td>';
                    Str=Str+'<td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal" onclick="editTag('+data[row].tag_id+',\''+data[row].tag_name+'\')">\n\
                    <span class="glyphicon glyphicon-pencil"></span>&nbsp;แก้ไข</button></td>';
                    Str=Str+'<td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#removeModal" onclick="removeTag('+data[row].tag_id+')">\n\
                    <span class="glyphicon glyphicon-minus"></span>&nbsp;ลบ</button></td>';
                    Str=Str+'</tr>';  
                    rowNo++;
               }
                document.getElementById("tagData").innerHTML = Str;
                    
                } else {
                    alert('select fail');
                }
            },
            error: function (data) {
                alert('error');
            }
        });
}

function removeTag(id){
        $('#hidden_remove_id').val(id);
       // $('#removeModal').modal('show'); 
}
function editTag(id,tagName){
    $('#hidden_update_id').val(id);
    $('#update_tag_name').val(tagName);
   // $('#editModal').modal('hide'); 
}

function saveTag(){
    var tag_name= $('#tag_name').val();
    var checkEmpty = tag_name.trim();
    if(checkEmpty.length<=0){
        alert('กรุณาระบุชื่อ Tags')
        return false;
    }
    $.ajax({
            type: 'post',
            url: 'saveTag',
            async: false,
            data: {'tag_name': tag_name},
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
    document.getElementById("tagData").innerHTML = '';
    $('#tag_name').val('');
    $('#tagTable').DataTable().destroy();
    createTable();
    $('#tagTable').DataTable();
    $('#hidden_remove_id').val('')
    $('#hidden_update_id').val('')
}

function findTagByName(tagName){
        var Str = '';
            var input_tag_name= $('#input_tag_name').val();
            $.ajax({
            type: 'post',
            url: 'searchTag',
            async: false,
            data: {'input_tag_name': input_tag_name},
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                if (data != null) {
                    document.getElementById("tagData").innerHTML = '';
                    $('#tag_name').val('');
                    $('#tagTable').DataTable().destroy();
                    var rowNo=1;
                 for(var row = 0 ; row<data.length ;row++){
                    Str=Str+'<tr>';
                    Str=Str+'<td>'+rowNo+'</td>';
                    Str=Str+'<td>'+data[row].tag_name+'</td>';
                    Str=Str+'<td>'+data[row].created_by+'</td>';
                    Str=Str+'<td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal" onclick="editTag('+data[row].tag_id+',\''+data[row].tag_name+'\')">\n\
                    <span class="glyphicon glyphicon-pencil"></span>&nbsp;แก้ไข</button></td>';
                    Str=Str+'<td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#removeModal" onclick="removeTag('+data[row].tag_id+')">\n\
                    <span class="glyphicon glyphicon-minus"></span>&nbsp;ลบ</button></td>';
                    Str=Str+'</tr>';  
                    rowNo++;
                    }
                document.getElementById("tagData").innerHTML = Str;
                $('#tagTable').DataTable();   
                } else {
                    alert('select fail');
                }
            },
            error: function (data) {
                alert('error');
            }
        });
}

function deleteTag(){
    var id= $('#hidden_remove_id').val();
            $.ajax({
            type: 'post',
            url: 'deleteTag',
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


function updateTag(){
    var id= $('#hidden_update_id').val();
    var update_tag_name= $('#update_tag_name').val();
            $.ajax({
            type: 'post',
            url: 'updateTag',
            async: false,
            data: {'id': id,'update_tag_name': update_tag_name},
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



