$(function () {
    $('#managemaster').addClass('active');
    $('#conditionsMenu').addClass('active');
    $('textarea').wysihtml5();
    var conditions_id = getUrlParameter('conditions_id');
    getCondition(conditions_id);
});

function getCondition(conditions_id) {
    if (conditions_id) {
        $.ajax({
            type: 'post',
            url: 'getConditionsById',
            async: false,
            data: {'conditions_id': conditions_id},
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                if (data) {
                    initCondition(data);
                } else {
                    alert('select fail');
                }
            },
            error: function (data) {
                alert('error');
            }
        });
    }
}

function initCondition(data) {
    $('#conditions_id').val(data.conditions_id);
    $('#conditions_name').val(data.conditions_name);
    $('#rate_include').val(data.rate_include);
    $('#rate_not_include').val(data.rate_not_include);
    $('#payment_condition').val(data.payment_condition);
    $('#cancel_change').val(data.cancel_change);
    $('#other_condition').val(data.other_condition);
    $('#beyond_respon').val(data.beyond_respon);
    $('#suggest_warning').val(data.suggest_warning);
    $('#visa_detail').val(data.visa_detail);
    $('#agreement').val(data.agreement);
}