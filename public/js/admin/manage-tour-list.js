var period_data = [];
var number = 0;
$(function () {
//    $('body').on('DOMNodeInserted', '.attraction_select', function () {
//        $(this).select2();
//    });
    $('.attraction_select').select2({width: '100%'});
    $('#attraction_select').select2({width: '100%'});
    $('#holiday_select').select2({width: '100%'});
    $('#tag_select').select2({width: '100%'});
    $('#airline_select').select2({width: '100%'});
    $('#route_select').select2({width: '100%'});

    $("#divTable").fadeOut("fast");
    $('#saveAll').prop('disabled', true);
    $('#saveBtn').prop('disabled', false);
    $('#day_tour').val(0);
    $('#night_tour').val(0);
    // $('#dayTable').DataTable();
    createTourCountryDropDown();
    createTourCategoryDropDown();
    createHolidayDropDown();
    createAirlineDropDown();
    createTagDropDown();
    createAttractionDropDown();
    createAttractionDayDropDown();
    createRouteDropDown();
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
    $("#period_start").datepicker({
        //format: 'dd/mm/yy',
        dateFormat: 'yy/mm/dd',
        todayBtn: true
    }).datepicker("setDate", "0");
    $("#period_end").datepicker({
        //format: 'dd/mm/yy',
        dateFormat: 'yy/mm/dd',
        todayBtn: true
    }).datepicker("setDate", "0");
    //tinymce.init({selector: '.tour-main'});
    $('.tour-main').wysihtml5();

//    $('#period_table').bootstrapTable({
//        uniqueId: 'number',
//        search: true,
//        pagination: true,
//        pageSize: 10,
//        columns: [{
//                field: 'number',
//                align: 'right',
//                title: 'No.',
//                sortable: true,
//                formatter: runNumber
//            }, {
//                field: 'period_start',
//                title: 'Period Start',
//                align: 'center',
//                sortable: true
//            }, {
//                field: 'period_end',
//                title: 'Period End',
//                align: 'center',
//                sortable: true
//            }, {
//                field: 'adult_price',
//                title: 'Adult Price',
//                sortable: true,
//                formatter: numberFormat
//            }, {
//                field: 'child_price',
//                title: 'Child Price',
//                sortable: true,
//                formatter: numberFormat,
//                align: 'right',
//            }, {
//                field: 'child_nb_price',
//                title: 'Child No extra bed',
//                sortable: true,
//                formatter: numberFormat,
//                align: 'right',
//            }, {
//                field: 'alone_price',
//                title: 'Extra Alone Price',
//                sortable: true,
//                formatter: numberFormat,
//                align: 'right',
//            }]
//    });

    $('#btn_period_add').click(function () {
        var period_start = $('#period_start').val();
        var period_end = $('#period_end').val();
        var adult_price = $('#adult_price').val();
        var child_price = $('#child_price').val();
        var special_price = $('#special_price').val();
        if (period_start && period_end && adult_price && child_price && special_price) {
            if (number == 0) {
                $('#period_body').empty();
            }
            number++;
            var table = "<tr>";
            table = table + "<td>" + number + '<input type="hidden" class="run_number" value="' + number + '" /></td>';
            table = table + "<td>" + period_start + '<input type="hidden" name="period_start[]" value="' + period_start + '" /></td>';
            table = table + "<td>" + period_end + '<input type="hidden" name="period_end[]" value="' + period_end + '" /></td>';
            table = table + "<td align='right'>" + numberWithCommas(adult_price) + '<input type="hidden" name="adult_price[]" value="' + adult_price + '" /></td>';
            table = table + "<td align='right'>" + numberWithCommas(child_price) + '<input type="hidden" name="child_price[]" value="' + child_price + '" /></td>';
            table = table + "<td align='right'>" + numberWithCommas(special_price) + '<input type="hidden" name="special_price[]" value="' + special_price + '" /></td>';
            table = table + "</tr>";
            $('#period_body').append(table);
        }
    });

    $('#btn_period_delete').click(function () {
        var r_number = number - 1;
        if (r_number > -1) {
            $('#period_body > tr').eq(r_number).remove();
            var pe_n = $('#period_body tr').length;
            if (pe_n < number) {
                number--;
            }
            if (number == 0) {
                var tb = '<tr><td align="center" colspan="7">No matching records found</td>';
                $('#period_body').html(tb);
            }
        }
    });
});
function runNumber(value, row, index, field) {
    return parseInt(index) + 1;
}

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
    $('#tour_period_end').val('');
    $('#tour_period_start').val('');
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
//    $('#saveBtn').prop('disabled', true);
    var day = $('#day_tour').val();
    var divs = "";
    var row_no = 1;
    if ((day > 0)) {
        for (var i = 0; i < day; i++) {
            divs = divs + '<div class="row">';
            divs = divs + '<div class="col-12">';
            divs = divs + '<div class="form-group row">';
            divs = divs + '<label for="tour_detail_0" class="col-sm-2 control-label">Day ' + row_no + '</label>';
            divs = divs + '<div class="col-sm-10">';
            divs = divs + '<textarea type="text" class="form-control tour-day" id="tour_detail_' + i + '" name="tour_detail_' + i + '"></textarea>';
            divs = divs + '</div>';
            divs = divs + '</div>';
            divs = divs + '</div>';
            divs = divs + '</div>';
            divs = divs + '<div class="row">';
            divs = divs + '<div class="col-12">';
            divs = divs + '<div class="form-group row">';
            divs = divs + '<label for="tour_detail_0" class="col-sm-2 control-label">Attractions ' + row_no + '</label>';
            divs = divs + '<div class="col-sm-10">';
            divs = divs + '<select id="attraction_select' + i + '" class="form-control js-example-basic-multiple attraction_select" name="attraction_select' + i + '[]" multiple="multiple"></select>';
            divs = divs + '</div>';
            divs = divs + '</div>';
            divs = divs + '</div>';
            divs = divs + '</div>';
            divs = divs + '<hr>';
            row_no++;

        }
        $('#day_body').html(divs);
        createAttractionDayDropDown();
        $('.attraction_select').select2({width: '100%'});
//        tinymce.init({selector: '.tour-day'});
        $('.tour-day').wysihtml5();
        $('.nav-tabs a[href="#detail"]').tab('show');

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

function createAttractionDayDropDown() {
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
                $.each(data, function () {
                    $('.attraction_select').append($('<option></option>').val(this.attraction_id).html(this.attraction_name));
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

function createAttractionDropDown() {
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

function createAirlineDropDown() {
    $.ajax({
        type: 'post',
        url: 'searchAllAirline',
        async: true,
        data: null,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            if (data != null) {
                populateAirlineDropdown('airline_select', data);
            } else {
                alert('select fail');
            }
        },
        error: function (data) {
            alert('error');
        }
    });
}

function createRouteDropDown() {
    $.ajax({
        type: 'post',
        url: 'searchAllRoute',
        async: true,
        data: null,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            if (data != null) {
                $.each(data, function () {
                    $('#route_select').append($('<option></option>').val(this.route_id).html(this.route_name));
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

function populateAirlineDropdown(selector, data) {
    if (data) {
        $.each(data, function () {
            $('#' + selector).append($('<option></option>').val(this.airline_id).html(this.airline_name));
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
                StrDropDown = StrDropDown + "<option value='0'> - Select - </option>";
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
                StrDropDown = StrDropDown + "<option value='0'> - Select - </option>";
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

function numberFormat(value, row, index, field) {
    return numberWithCommas(parseInt(value));
}

const numberWithCommas = (x) => {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}