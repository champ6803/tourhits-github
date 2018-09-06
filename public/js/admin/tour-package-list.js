$(function () {
    $('#managetour').addClass("active");
    $('#tour_package_list').addClass("active");
    
    var package_list = tourPackageList;
    
    $('#tour_package_table').bootstrapTable({
        search: true,
        pagination: true,
        pageSize: 10,
        columns: [{
                field: 'tour_package_id',
                align: 'right',
                title: 'ID',
                sortable: true
            }, {
                field: 'tour_package_name',
                title: 'ชื่อ',
                align: 'center',
                sortable: true
            }]
    });
    
    loadTourPackageList(package_list);
});

function loadTourPackageList(data) {
    $('#tour_package_table').bootstrapTable('load', data);
}