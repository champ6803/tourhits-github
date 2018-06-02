$(function () {
    $(document).ready(function() {
      $('#saveAll').prop('disabled', true);
      $('#dayTable').DataTable();
      createTourCountryDropDown();
      createTourCategoryDropDown();
      $( "#startDate" ).datepicker({
                //format: 'dd/mm/yy',
                dateFormat: 'dd/mm/yy',
                todayBtn: true
            }).datepicker("setDate", "0");
       $( "#endDate" ).datepicker({
                //format: 'dd/mm/yy',
                dateFormat: 'dd/mm/yy',
                todayBtn: true
            }).datepicker("setDate", "0");
    } );
});
function clearGenTable(){
    $('#tourCategory').prop('disabled', false);
    $('#tourCountry').prop('disabled', false);
    $('#highlightTour').prop('disabled', false);
    $('#tourName').prop('disabled', false);
    $('#tourDetail').prop('disabled', false);
    $('#picture').prop('disabled', false);
    $('#day').prop('disabled', false);
    $('#night').prop('disabled', false);
    $('#startDate').prop('disabled', false);
    $('#endDate').prop('disabled', false);
    $('#dayTable').dataTable().fnClearTable();
    document.getElementById("tourCategory").selectedIndex = "0";
    document.getElementById("tourCountry").selectedIndex = "0";
    $('#highlightTour').val('');
    $('#tourName').val('');
    $('#tourDetail').val('');
    $('#picture').val('');
    $('#day').val('');
    $('#night').val('');
    $('#startDate').val('');
    $('#endDate').val('');
}
function inputDisabled(){
    $('#tourCategory').prop('disabled', true);
    $('#tourCountry').prop('disabled', true);
    $('#highlightTour').prop('disabled', true);
    $('#tourName').prop('disabled', true);
    $('#tourDetail').prop('disabled', true);
    $('#picture').prop('disabled', true);
    $('#day').prop('disabled', true);
    $('#night').prop('disabled', true);
    $('#startDate').prop('disabled', true);
    $('#endDate').prop('disabled', true);
}
function genTable(){
    var day= $('#day').val();
    if((day>0)){
    inputDisabled();
    var Str = '';
                var rowNo=1;
                 for(var row = 0 ; row<day ;row++){
                    Str=Str+'<tr>';
                    Str=Str+'<td>'+rowNo+'</td>';
                    Str=Str+'<td><input type="text" style="width:200px"></td>';
                    Str=Str+'<td><input type="text" style="width:400px"></td>';
                    Str=Str+'</tr>';  
                    rowNo++;
               }
    document.getElementById("genTable").innerHTML = Str;
    }else{
        alert('กรุณาระบุจำนวนวันให้ถูกต้อง')
        return false;
    }
}
function createTourCategoryDropDown(){
       var StrDropDown = '';
      $.ajax({
            type: 'post',
            url: 'searchAllTourCategory',
            async: false,
            data: null,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                if (data != null) {
                    StrDropDown='<select class="form-control" id="tourCategory" name="tourCategory">';
                     StrDropDown=StrDropDown+"<option value='0'>----กรุณาระบุ----</option>";
                     for(var row = 0 ; row<data.length ;row++){
                         StrDropDown=StrDropDown+"<option value="+data[row].tour_category_id+">"+data[row].tour_category_name+"</option>";
                     }
                     StrDropDown=StrDropDown+'</select>';
                     document.getElementById("selectTourCategory").innerHTML = StrDropDown;
                } else {
                    alert('select fail');
                }
            },
            error: function (data) {
                alert('error');
            }
        });
    
}

function createTourCountryDropDown(){
       var StrDropDown = '';
      $.ajax({
            type: 'post',
            url: 'searchAllTourCountry',
            async: false,
            data: null,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                if (data != null) {
                    StrDropDown='<select class="form-control" id="tourCountry" name="tourCountry">';
                     StrDropDown=StrDropDown+"<option value='0'>----กรุณาระบุ----</option>";
                     for(var row = 0 ; row<data.length ;row++){
                         StrDropDown=StrDropDown+"<option value="+data[row].tour_country_id+">"+data[row].tour_country_name+"</option>";
                     }
                     StrDropDown=StrDropDown+'</select>';
                     document.getElementById("selectTourCountry").innerHTML = StrDropDown;
                } else {
                    alert('select fail');
                }
            },
            error: function (data) {
                alert('error');
            }
        });
    
}