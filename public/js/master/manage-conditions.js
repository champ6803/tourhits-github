$(function () {
    $('#managemaster').addClass('active');
    $('#conditionsMenu').addClass('active');
    $('#conditionsTable').bootstrapTable({
        search: true,
        pagination: true,
        pageSize: 10,
        height: 400,
        columns: [{
                field: 'conditions_id',
                align: 'right',
                title: 'Conditions Id',
                sortable: true,
                width: '100px'
            }, {
                field: 'conditions_name',
                title: 'เงื่อนไข',
                align: 'center',
                sortable: true
            }, {
                field: 'created_by',
                align: 'center',
                title: 'ผู้สร้าง',
                sortable: true
            }, {
                field: 'action',
                title: 'Action',
                align: 'center',
                formatter: actionButton
            }]
    });
    getConditionsList();

});

function getConditionsList() {
    $.ajax({
        type: 'post',
        url: 'getConditionsList',
        async: false,
        data: {'conditions': ""},
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            if (data) {
                $('#conditionsTable').bootstrapTable('load', data);
            } else {
                alert('select fail');
            }
        },
        error: function (data) {
            alert('error');
        }
    });
}

function createTable(data) {
    if (data) {
        var html = "";
        $.each(data, function (key, value) {
            html = html + '<tr>';
            html = html + '<td>' + (key + 1) + '</td>';
            html = html + '<td>' + this.rate_include + '</td>';
            html = html + '<td>' + this.rate_not_include + '</td>';
            html = html + '<td>' + this.payment_condition + '</td>';
            html = html + '<td>' + this.cancel_change + '</td>';
            html = html + '<td>' + this.other_condition + '</td>';
            html = html + '<td>' + this.beyond_respon + '</td>';
            html = html + '<td>' + this.suggest_warning + '</td>';
            html = html + '<td>' + this.visa_detail + '</td>';
            html = html + '<td>' + this.agreement + '</td>';
            html = html + '<td>' + this.craeted_by + '</td>';
            html = html + '<td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal"\n\
                    <span class="glyphicon glyphicon-pencil"></span>&nbsp;แก้ไข</button></td>';
            html = html + '<td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#removeModal"\n\
                    <span class="glyphicon glyphicon-minus"></span>&nbsp;ลบ</button></td>';
            html = html + '</tr>';
        });
        $('#conditionsData').html(html);
    }
}

function actionButton(value, row, index) {
    return ['<button class="btn btn-primary" onclick="conditions_view(' + row.conditions_id + ')"><i class="fa fa-eye"></i></button> &nbsp; <button onclick="btn_remove(' + row.conditions_id + ')" class="btn btn-danger"><i class="fa fa-trash"></i></button>'];
}

function conditions_view(conditions_id) {
    if (conditions_id) {
        window.location.href = "manage-conditions-action?conditions_id=" + conditions_id;
    }
}

function conditions_remove() {
    var conditions_id = $('#rm_condition_id').val();
    if (conditions_id) {
        $.ajax({
            type: 'post',
            url: 'removeConditions',
            async: false,
            data: {'conditions_id': conditions_id},
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                if (data == "success") {
                    alert('ลบข้อมูลเรียบร้อย');
                    window.location.href = "manage-conditions";
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

function btn_remove(conditions_id) {
    $('#removeModal').modal();
    $('#rm_condition_id').val(conditions_id);
}