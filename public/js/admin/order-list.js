$(function () {
    $('#order_table').bootstrapTable({
        search: true,
        pagination: true,
        pageSize: 10,
        columns: [{
                field: 'order_id',
                align: 'right',
                title: 'Order Id',
                sortable: true
            }, {
                field: 'name',
                title: 'ชื่อ',
                align: 'center',
                sortable: true
            }, {
                field: 'phone',
                title: 'เบอร์โทรศัพท์',
                align: 'right'
            }, {
                field: 'order_date',
                title: 'วันที่จอง',
                sortable: true
            }, {
                field: 'order_total_price',
                title: 'ราคารวม',
                align: 'right',
                formatter: numberFormat,
                sortable: true
            }, {
                field: 'order_status_detail',
                align: 'center',
                title: 'สถานะ',
                formatter: createBadge,
                sortable: true
            }, {
                field: 'actiion',
                title: 'Action',
                align: 'center',
                formatter: actionButton
            }]
    });
    loadOrderList(orderList);
});

function loadOrderList(data) {
    $('#order_table').bootstrapTable('load', data);
}

function numberFormat(value, row, index, field) {
    return numberWithCommas(parseInt(value));
}

const numberWithCommas = (x) => {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

function actionButton(value, row, index) {
    if (row.order_status_detail == 'รอชำระเงิน')
        return ['<button class="btn btn-primary" onclick="order_view(' + row.order_id + ')">Detail</button> &nbsp; <button onclick="order_action(' + row.order_id + ', \'CL\')" class="btn btn-success">Confirm</button> &nbsp; <button onclick="order_action(' + row.order_id + ',\'CA\')" class="btn btn-danger">Cancel</button>'];
    else
        return ['<button class="btn btn-primary" onclick="order_view(' + row.order_id + ')">Detail</button>'];
}

function order_action(order_id, status) {
    if (order_id) {
        var source = {
            'order_id': order_id,
            'status': status
        }
        $.ajax({
            type: 'post',
            url: 'order_action',
            async: false,
            data: source,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                if (data) {
                    alert('บันทึกข้อมูลเรียบร้อย');
                    $('#order_table').bootstrapTable('load', data);
                } else {
                    alert('เกิดข้อผิดพลาด');
                }
            },
            error: function (data) {
                alert('เกิดข้อผิดพลาด กรุณาติดต่อผู้ดูแลระบบ');
            }
        });
    }

}

function createBadge(value, row, index) {
    return '<span class="badge badge-danger">' + value + '</span>';
}

function order_view(order_id) {
    var source = {
        'order_id': order_id
    }
    $.ajax({
        type: 'post',
        url: 'getOrderDetailList',
        async: false,
        data: source,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            if (data) {
                $('#order_detail_table').bootstrapTable({
                    search: true,
                    pagination: true,
                    pageSize: 10,
                    columns: [{
                            field: 'tour_package_id',
                            align: 'right',
                            title: 'Tour Package Id',
                            sortable: true,
                            formatter: padZero
                        }, {
                            field: 'tour_package_name',
                            title: 'ชื่อทัวร์',
                            align: 'center',
                            sortable: true
                        }, {
                            field: 'tour_period_start',
                            title: 'วันเดินทาง',
                            align: 'right'
                        }, {
                            field: 'tour_period_end',
                            title: 'วันที่กลับ',
                            sortable: true
                        }, {
                            field: 'quantity_adult',
                            title: 'จำนวนผู้ใหญ่',
                            align: 'right',
                            sortable: true
                        }, {
                            field: 'quantity_child',
                            title: 'จำนวนเด็ก',
                            align: 'right',
                            formatter: numberFormat,
                            sortable: true
                        }, {
                            field: 'tour_period_adult_price',
                            title: 'ราคาผู้ใหญ่',
                            align: 'right',
                            sortable: true
                        }, {
                            field: 'tour_period_child_price',
                            title: 'ราคาเด็ก',
                            align: 'right',
                            formatter: numberFormat,
                            sortable: true
                        }]
                });
                $('#order_detail_table').bootstrapTable('load', data);
                $('#orderDetailModal').modal();
            } else {
                alert('เกิดข้อผิดพลาด');
            }
        },
        error: function (data) {
            alert('เกิดข้อผิดพลาด กรุณาติดต่อผู้ดูแลระบบ');
        }
    });
}

function pad(str, max) {
    str = str.toString();
    return str.length < max ? pad("0" + str, max) : str;
}

function padZero(value, row, index) {
    return "#" + pad(value, 6);
}