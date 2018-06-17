$(function () {
    $('#order_table').bootstrapTable({
        columns: [{
                field: 'order_id',
                title: 'Order Id'
            }, {
                field: 'order_name',
                title: 'ชื่อ'
            }, {
                field: 'order_phone',
                title: 'เบอร์โทรศัพท์'
            }, {
                field: 'order_status_detail',
                title: 'สถานะ'
            }, {
                field: 'order_date',
                title: 'วันที่จอง'
            }, {
                field: 'order_total_price',
                title: 'ราคา'
            }, {
                field: 'order_status_detail',
                title: 'สถานะ'
            }, {
                field: 'actiion',
                title: 'Action'
            }]
    });
    loadOrderList(orderList);
});

function loadOrderList(data){
    $('#order_table').bootstrapTable('load', data);
}