
$(function () {
    $(document).ready(function () {
        $("#divTable").fadeOut("fast");
        $('#saveAll').prop('disabled', true);
        $('#saveBtn').prop('disabled', false);
        $('#night_tour').val(0);
        // $('#dayTable').DataTable();
        createTourCountryDropDown();
        createTourCategoryDropDown();
        createHolidayDropDown();
        createAttractionDropDown();
        createTagDropDown();
        $("#start_date").datepicker({
            //format: 'dd/mm/yy',
            dateFormat: 'yy/mm/dd',
            todayBtn: true
        }).datepicker("setDate", "0");
        $("#end_date").datepicker({
            //format: 'dd/mm/yy',
            dateFormat: 'yy/mm/dd',
            todayBtn: true
        }).datepicker("setDate", "0");
    });
});
function clearGenTable() {
    /* $('#saveBtn').prop('disabled', false);
     $('#saveAll').prop('disabled', true);
     $('#tour_category').prop('disabled', false);
     $('#tour_country').prop('disabled', false);
     $('#highlight_tour').prop('disabled', false);
     $('#tour_name').prop('disabled', false);
     $('#tour_detail').prop('disabled', false);
     $('#file').prop('disabled', false);
     $('#day_tour').prop('disabled', false);
     $('#night_tour').prop('disabled', false);
     $('#start_date').prop('disabled', false);
     $('#end_date').prop('disabled', false);
     $('#tour_package_code').prop('disabled', false);*/
    $("#divTable").fadeOut("fast");
    //$('#dayTable').dataTable().fnClearTable();
    document.getElementById("tour_category").selectedIndex = "0";
    document.getElementById("tour_country").selectedIndex = "0";
    $('#highlight_tour').val('');
    $('#tour_name').val('');
    $('#tour_detail').val('');
    $('#file').val('');
    $('#day_tour').val('');
    $('#night_tour').val('');
    $('#start_date').val('');
    $('#end_date').val('');
    $('#tour_package_code').val('');
    
    location.reload();
}
function inputDisabled() {
    /* $('#tour_category').prop('disabled', true);
     $('#tour_country').prop('disabled', true);
     $('#highlight_tour').prop('disabled', true);
     $('#tour_name').prop('disabled', true);
     $('#tour_detail').prop('disabled', true);
     $('#file').prop('disabled', true);
     $('#day_tour').prop('disabled', true);
     $('#night_tour').prop('disabled', true);
     $('#start_date').prop('disabled', true);
     $('#end_date').prop('disabled', true);
     $('#tour_package_code').prop('disabled', true);*/
}
function genTable() {
    $("#divTable").fadeIn("slow");
    $('#saveBtn').prop('disabled', true);
    var day = $('#day_tour').val();
    if ((day > 0)) {
        inputDisabled();
        var Str = '';
        var rowNo = 1;
        for (var row = 0; row < day; row++) {
            Str = Str + '<tr>';
            Str = Str + '<td  style="width : 60px" id="' + row + 'day' + '" name="' + row + 'day' + '">' + rowNo + '</td>';
            Str = Str + '<td><input class="form-control" id="tour_name_' + row + '" type="text" name="tour_name_' + row + '"></td>';
            Str = Str + '<td style="width : 800px"><textarea name="tour_detail_' + row + '" id="tour_detail_' + row + '" cols="50"></textarea></td>';
            rowNo++;
        }
        document.getElementById("genTable").innerHTML = Str;
        tinymce.init({selector: 'textarea'});
    } else {
        alert('กรุณาระบุจำนวนวันให้ถูกต้อง')
        $('#saveBtn').prop('disabled', false);
        return false;
    }
    $('#saveAll').prop('disabled', false);
}

function createHolidayDropDown() {
    var StrDropDown = '';
    $.ajax({
        type: 'post',
        url: 'searchAllHoliday',
        async: true,
        data: null,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            if (data != null) {
                populateDropdown('holiday_select', data);
            } else {
                alert('select fail');
            }
        },
        error: function (data) {
            alert('error');
        }
    });

}

function createAttractionDropDown() {
    var StrDropDown = '';
    $.ajax({
        type: 'post',
        url: 'searchAllAttraction',
        async: true,
        data: null,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            if (data != null) {
                populateAttractionDropdown('attraction_select', data);
            } else {
                alert('select fail');
            }
        },
        error: function (data) {
            alert('error');
        }
    });
}

function createTagDropDown() {
    var StrDropDown = '';
    $.ajax({
        type: 'post',
        url: 'searchAllTag',
        async: true,
        data: null,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            if (data != null) {
                populateTagDropdown('tag_select', data);
            } else {
                alert('select fail');
            }
        },
        error: function (data) {
            alert('error');
        }
    });
}

function populateTagDropdown(selector, data) {
    if (data) {
        $.each(data, function () {
            $('#' + selector).append($('<option></option>').val(this.tag_id).html(this.tag_name));
        });
    }
}

function populateAttractionDropdown(selector, data) {
    if (data) {
        $.each(data, function () {
            $('#' + selector).append($('<option></option>').val(this.attraction_id).html(this.attraction_name));
        });
    }
}

function populateDropdown(selector, data) {
    if (data) {
        $.each(data, function () {
            $('#' + selector).append($('<option></option>').val(this.holiday_id).html(this.holiday_name));
        });
    }
}



function createTourCategoryDropDown() {
    var StrDropDown = '';
    $.ajax({
        type: 'post',
        url: 'searchAllCategory',
        async: true,
        data: null,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            if (data != null) {
                StrDropDown = '<select class="form-control" id="tour_category" name="tour_category">';
                StrDropDown = StrDropDown + "<option value='0'>----กรุณาระบุ----</option>";
                for (var row = 0; row < data.length; row++) {
                    StrDropDown = StrDropDown + "<option value=" + data[row].category_id + ">" + data[row].category_name + "</option>";
                }
                StrDropDown = StrDropDown + '</select>';
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

function createTourCountryDropDown() {
    var StrDropDown = '';
    $.ajax({
        type: 'post',
        url: 'searchAllTourCountry',
        async: true,
        data: null,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            if (data != null) {
                StrDropDown = '<select class="form-control" id="tour_country" name="tour_country">';
                StrDropDown = StrDropDown + "<option value='0'>----กรุณาระบุ----</option>";
                for (var row = 0; row < data.length; row++) {
                    StrDropDown = StrDropDown + "<option value=" + data[row].tour_country_id + ">" + data[row].tour_country_name + "</option>";
                }
                StrDropDown = StrDropDown + '</select>';
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