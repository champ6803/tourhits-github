$(function () {
    $('#searchButton').click(function () {
        var input_tour_category_name= $('#input_tour_category_name').val();
        var checkEmpty = input_tour_category_name.trim();
        if(checkEmpty.length<=0){
            refresh()
        }
        else{
             findTourCategoryByName(input_tour_category_name);
        }
    });
    $('#clearButton').click(function () {
           $('#tourCategoryTable').dataTable().fnClearTable();
           $('#input_tour_category_name').val('');
           $('#tour_category_name').val('');
           $('#tour_category_picture').val('')
           $('#update_tour_category_picture').val('');
           $('#file').val('')
           $('#updateFile').val('')
    });
    $('#updateClose').click(function () {
           $('#tour_category_name').val('');
           $('#tour_category_picture').val('')
           $('#file').val('')
           $('#updateFile').val('')
    });
    $('#close').click(function () {
           $('#tour_category_name').val('');
           $('#tour_category_picture').val('')
           $('#file').val('')
           $('#updateFile').val('')
    });
    $(document).ready(function() {
        //ไฮไลต์เมนูที่เข้าอยู่
        document.getElementById("categoryMenu").style.color = "blue";
        createTable()
        $('#tourCategoryTable').DataTable();
    } );
});

function createTable(){
    var Str = '';
            $.ajax({
            type: 'post',
            url: 'searchTourCategory',
            async: false,
            data: {'input_tour_category_name': null},
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                if (data != null) {
                 var rowNo=1;
                 for(var row = 0 ; row<data.length ;row++){
                    Str=Str+'<tr>';
                    Str=Str+'<td>'+rowNo+'</td>';
                    Str=Str+'<td>'+data[row].category_name+'</td>';
                    if(data[row].category_img && data[row].category_img != "-"){
                        Str=Str+'<td> <img src="images/category/'+data[row].category_img+'" style="height:40px;"></td>'; 
                    }else{
                        Str=Str+'<td> - </td>'; 
                    }
                    
                    Str=Str+'<td>'+data[row].created_by+'</td>';
                    Str=Str+'<td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal" onclick="editTourCategory('+data[row].category_id+',\''+data[row].category_name+'\')">\n\
                    <span class="glyphicon glyphicon-pencil"></span>&nbsp;แก้ไข</button></td>';
                    Str=Str+'<td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#removeModal" onclick="removeTourCategory('+data[row].category_id+')">\n\
                    <span class="glyphicon glyphicon-minus"></span>&nbsp;ลบ</button></td>';
                    Str=Str+'</tr>';  
                    rowNo++;
               }
                document.getElementById("tourCategoryData").innerHTML = Str;
                    
                } else {
                    alert('select fail');
                }
            },
            error: function (data) {
                alert('error');
            }
        });
}

function removeTourCategory(id){
        $('#hidden_remove_id').val(id);
       // $('#removeModal').modal('show'); 
}
function editTourCategory(id,tourCategoryName){
    $('#hidden_update_id').val(id);
    $('#update_tour_category_name').val(tourCategoryName);
   // $('#editModal').modal('hide'); 
}

function saveTourCategory(){
    var category_name= $('#tour_category_name').val();
//    var tour_category_picture= $('#tour_category_picture').val();
    var checkEmpty = tour_category_name.trim();
    if(checkEmpty.length<=0){
        alert('กรุณาระบุชื่อหมวดหมู่')
        return false;
    }
    $.ajax({
            type: 'post',
            url: 'saveTourCategory',
            async: false,
            data: {'tour_category_name': category_name
                ,'tour_category_picture': tour_category_picture},
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
    document.getElementById("tourCategoryData").innerHTML = '';
    $('#tour_category_name').val('');
    $('#tourCategoryTable').DataTable().destroy();
    createTable();
    $('#tourCategoryTable').DataTable();
    $('#hidden_remove_id').val('')
    $('#hidden_update_id').val('')
    $('#update_tour_category_picture').val('');
    $('#tour_category_picture').val('');
}

function findTourCategoryByName(tourCategoryName){
        var Str = '';
            var input_tour_category_name= $('#input_tour_category_name').val();
            $.ajax({
            type: 'post',
            url: 'searchTourCategory',
            async: false,
            data: {'input_tour_category_name': input_tour_category_name},
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                if (data != null) {
                    document.getElementById("tourCategoryData").innerHTML = '';
                    $('#tour_category_name').val('');
                    $('#tourCategoryTable').DataTable().destroy();
                    var rowNo=1;
                 for(var row = 0 ; row<data.length ;row++){
                    Str=Str+'<tr>';
                    Str=Str+'<td>'+rowNo+'</td>';
                    Str=Str+'<td>'+data[row].tour_category_name+'</td>';
                    Str=Str+'<td> <img src="images/category/'+data[row].tour_category_img+'" style="height:40px;"></td>'; 
                    Str=Str+'<td>'+data[row].created_by+'</td>';
                    Str=Str+'<td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal" onclick="editTourCategory('+data[row].tour_category_id+',\''+data[row].tour_category_name+'\')">\n\
                    <span class="glyphicon glyphicon-pencil"></span>&nbsp;แก้ไข</button></td>';
                    Str=Str+'<td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#removeModal" onclick="removeTourCategory('+data[row].tour_category_id+')">\n\
                    <span class="glyphicon glyphicon-minus"></span>&nbsp;ลบ</button></td>';
                    Str=Str+'</tr>';  
                    rowNo++;
                    }
                document.getElementById("tourCategoryData").innerHTML = Str;
                $('#tourCategoryTable').DataTable();   
                } else {
                    alert('select fail');
                }
            },
            error: function (data) {
                alert('error');
            }
        });
}

function deleteTourCategory(){
    var id= $('#hidden_remove_id').val();
            $.ajax({
            type: 'post',
            url: 'deleteTourCategory',
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


function updateTourCategory(){
    var id= $('#hidden_update_id').val();
    var update_tour_category_name= $('#update_tour_category_name').val();
    var tour_category_picture= $('#update_tour_category_picture').val();
            $.ajax({
            type: 'post',
            url: 'updateTourCategory',
            async: false,
            data: {'id': id,'update_tour_category_name': update_tour_category_name,
                'tour_category_picture': tour_category_picture},
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



