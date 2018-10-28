$(function () {
    $('#managetour').addClass("active");
    $('#status_package').addClass("active");

    var period_list = tourPeriodList;

    $('#tour_period_table').bootstrapTable({
        search: true,
        pagination: true,
        pageSize: 100,
        columns: [{
                field: 'tour_package_id',
                align: 'center',
                title: 'Tour Package Id',
                sortable: true,
                formatter: padZero
            }, {
                field: 'tour_period_id',
                align: 'center',
                title: 'Tour Period Id',
                sortable: true
            }, {
                field: 'tour_package_name',
                title: 'ชื่อ',
                align: 'center',
                sortable: true
            }, {
                field: 'tour_period_start',
                title: 'วันเดินทาง',
                align: 'center',
                sortable: true
            }, {
                field: 'tour_period_end',
                title: 'วันกลับ',
                align: 'center',
                sortable: true
            }, {
                field: 'tour_period_day_number',
                title: 'จำนวนวัน',
                align: 'center',
                sortable: true
            }, {
                field: 'tour_period_night_number',
                title: 'จำนวนคืน',
                align: 'center',
                sortable: true
            }, {
                field: 'tour_period_adult_price',
                title: 'ราคา (บาท)',
                align: 'center',
                sortable: true,
                formatter: numberFormat
            }, {
                field: 'tour_period_adult_special_price',
                title: 'ราคาพิเศษ (บาท)',
                align: 'center',
                sortable: true,
                formatter: numberFormat
            }, {
                field: 'tour_period_status',
                title: 'สถานะ',
                align: 'center',
                sortable: true,
                formatter: statusFormat
            }]
    });

    loadTourPackageList(period_list);

    $('#status_period_select').change(function () {
        o = JSON.parse(this.value);
        updateTourPeriodStatus(o);
    });
});

function loadTourPackageList(data) {
    $('#tour_period_table').bootstrapTable('load', data);
}

function dateFormate(value, row, index, field) {
    var str = value.split(" ");
    return str[0];
}
function numberFormat(value, row, index, field) {
    return numberWithCommas(parseInt(value));
}

function pad(str, max) {
    str = str.toString();
    return str.length < max ? pad("0" + str, max) : str;
}

function padZero(value, row, index) {
    return "TH" + pad(value, 6);
}

function statusFormat(value, row, index) {
    if (row.tour_period_status == "Y") {
        return ["<select id='status_period_select' class='form-control'><option value='{\"tour_period_id\":\"" + row.tour_period_id + "\",\"tour_period_status\":\"Y\"}' selected >ว่าง</option><option value='{\"tour_period_id\":\"" + row.tour_period_id + "\",\"tour_period_status\":\"N\"}'>เต็ม</option></select>"];
    } else {
        return ["<select id='status_period_select' class='form-control'><option value='{\"tour_period_id\":\"" + row.tour_period_id + "\",\"tour_period_status\":\"Y\"}' >ว่าง</option><option value='{\"tour_period_id\":\"" + row.tour_period_id + "\",\"tour_period_status\":\"N\"}'selected >เต็ม</option></select>"];
    }
}

function updateTourPeriodStatus(o) {
    if (o.tour_period_id && o.tour_period_status) {
        $.ajax({
            type: 'post',
            url: 'updateTourPeriodStatus',
            async: false,
            data: {tour_period_id: o.tour_period_id, tour_period_status: o.tour_period_status},
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                if (data == 'success') {
                    alert('บันทึกเรียบร้อย');
                } else {
                    alert('ไม่สามารถบันทึกข้อมูลได้');
                }
            },
            error: function (data) {
                alert('error');
            }
        });
    }
}