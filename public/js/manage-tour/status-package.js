$(function () {
    $('#managetour').addClass("active");
    $('#status_package').addClass("active");
    
    var package_list = tourPackageList;

    $('#tour_package_table').bootstrapTable({
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
                field: 'tour_package_name',
                title: 'ชื่อ',
                align: 'center',
                sortable: true
            }, {
                field: 'tour_country_name',
                title: 'ประเทศ',
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
                field: 'tour_package_price',
                title: 'ราคา (บาท)',
                align: 'center',
                sortable: true,
                formatter: numberFormat
            }, {
                field: 'tour_package_period_start',
                title: 'วันเดินทาง',
                align: 'center',
                sortable: true,
                formatter: dateFormate
            }, {
                field: 'tour_package_period_end',
                title: 'วันกลับ',
                align: 'center',
                sortable: true,
                formatter: dateFormate
            }, {
                field: 'tour_package_status',
                title: 'สถานะ',
                align: 'center',
                sortable: true
            }, {
                field: 'actiion',
                title: 'Action',
                align: 'center',
                formatter: actionButton
            }]
    });

    loadTourPackageList(package_list);
});

function loadTourPackageList(data) {
    $('#tour_package_table').bootstrapTable('load', data);
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

function actionButton(value, row, index) {
    return ['<button class="btn btn-primary btn-sm" onclick="viewPeriod(' + row.tour_package_id + ')"><i class="fa fa-eye"></i></button>'];
}

function viewPeriod(tour_package_id){
    window.open(base_path + "/status-period?tour_package_id=" + tour_package_id);
}