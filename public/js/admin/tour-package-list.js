var $table = $('#tour_package_table')
var $remove = $('#remove')
var selections = []
var conselect = false;
$(function () {
    $('#managetour').addClass("active");
    $('#tour_package_list').addClass("active");

    var package_list = tourPackageList;

    $('#tour_package_table').bootstrapTable({
        search: true,
        pagination: true,
        pageSize: 100,
        columns: [
            {
                field: 'state',
                checkbox: true
            },
            {
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
                field: 'updated_at',
                title: 'Update',
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

    $('#tour_package_table').on('check.bs.table uncheck.bs.table ' +
            'check-all.bs.table uncheck-all.bs.table',
            function () {
                $remove.prop('disabled', !$('#tour_package_table').bootstrapTable('getSelections').length)

                // save your data, here just save the current page
                selections = getIdSelections()
                // push or splice the selections if you want to save all data selections
            });

    $remove.click(function () {
        var ids = getIdSelections()
//        $table.bootstrapTable('remove', {
//            field: 'tour_package_id',
//            values: ids
//        });
        conselect = confirm("คุณต้องการลบรายการที่เลือกหรือไม่ ?");
        var res = false;
        $.each(ids, function (i, value) {
            res = deleteSelectedPackage(value);
        });
        if (res) {
            alert('ลบข้อมูลเรียบร้อยแล้ว');
            window.location.href = "tour-package-list";
        }


        //$remove.prop('disabled', true)
    })

//    $('#tour_package_table').on('click-row.bs.table', function (row, $element, field) {
//        window.location.href = "./manage-edit-tourlist?id=" + $element.tour_package_id;
//        console.log($element);
//    });
});

function deleteSelectedPackage(tour_package_id) {
    var respone = false;
    if (tour_package_id && conselect) {
        $.ajax({
            type: 'post',
            url: 'deleteTourPackage',
            async: false,
            data: {tour_package_id: tour_package_id},
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                if (data == 'success') {
                    respone = true;
                } else {
                    alert('ไม่สามารถลบข้อมูลได้');
                }
            },
            error: function (data) {
                alert('error');
            }
        });
    }
    return respone;
}

function responseHandler(res) {
    $.each(res.rows, function (i, row) {
        row.state = $.inArray(row.tour_package_id, selections) !== -1
    })
    return res
}

function getIdSelections() {
    return $.map($table.bootstrapTable('getSelections'), function (row) {
        return row.tour_package_id;
    })
}

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
//    return "TH" + pad(value, 6);
    return "TH" + value;
}

function actionButton(value, row, index) {
    return ['<button class="btn btn-primary btn-sm" onclick="editPackage(' + row.tour_package_id + ')"><i class="fa fa-pencil"></i></button> &nbsp; <button class="btn btn-danger btn-sm" onclick="deletePackage(' + row.tour_package_id + ')"><i class="fa fa-trash"></i></button>'];
}

function editPackage(tour_package_id) {
    window.location.href = "./manage-edit-tourlist?id=" + tour_package_id;
}

function deletePackage(tour_package_id) {
    var con = confirm("คุณต้องการลบหรือไม่ ?");
    if (tour_package_id && con) {
        $.ajax({
            type: 'post',
            url: 'deleteTourPackage',
            async: false,
            data: {tour_package_id: tour_package_id},
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                if (data == 'success') {
                    alert('ลบข้อมูลเรียบร้อยแล้ว');
                    window.location.href = "tour-package-list";
                } else {
                    alert('ไม่สามารถลบข้อมูลได้');
                }
            },
            error: function (data) {
                alert('error');
            }
        });
    }
}