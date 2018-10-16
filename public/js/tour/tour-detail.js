$(function () {
    $('#package_tour').addClass('menu-active');
    var as = tour_package_period_start.split("-");
    var ae = tour_package_period_end.split("-");
    var ae2 = ae[2].split(' ');
    var as2 = as[2].split(' ');
    var date = as2[0] + " " + setCTMonthString(as[1]) + " - " + ae2[0] + " " + setCTMonthString(ae[1]) + " " + ae[0];
    $('#period_month').html(date);
    while (tour_code.length != 6)
    {
        tour_code = '0' + tour_code;
    }
    $('#tour_code').html(tour_code);

    $('#tour_period').change(function () {
        tour_period = $(this).val();
        var status = "N";
        $.each(tourPackageList, function (key, val) {
            if (parseInt(val['tour_period_id']) == tour_period) {
                status = val['tour_period_status'];
            }
        });

        if ($(this).val() == 0 || status == "N") {
            $('.awe-select').prop('disabled', true);
        } else {
            $('.awe-select').prop('disabled', false);
        }
        $('.awe-select').val(0);
        $('#appraise').html('฿' + 0);
    });

    $('#adult_price').change(function () {
        var value = ($(this).val());
        two_qty = value;
        sum_appraise_adult = 0;
        $.each(tourPackageList, function (key, val) {
            if (parseInt(val['tour_period_id']) == tour_period) {
                sum_appraise_adult = sum_appraise_adult + parseInt(val['tour_period_adult_price']);
            }
        });
        sum_appraise_adult = sum_appraise_adult * parseInt(value);
        $('#appraise').html('฿' + numberWithCommas(sum_appraise_adult + sum_appraise_child + sum_appraise_alone + sum_appraise_child_nb));
    });
    $('#child_price').change(function () {
        var value = ($(this).val());
        child_one_qty = value;
        sum_appraise_child = 0;
        $.each(tourPackageList, function (key, val) {
            if (parseInt(val['tour_period_id']) == tour_period) {
                sum_appraise_child = sum_appraise_child + parseInt(val['tour_period_child_price']);
            }
        });
        sum_appraise_child = sum_appraise_child * parseInt(value);
        $('#appraise').html('฿' + numberWithCommas(sum_appraise_adult + sum_appraise_child + sum_appraise_alone + sum_appraise_child_nb));
    });
    $('#child_nb_price').change(function () {
        var value = ($(this).val());
        child_nb_qty = value;
        sum_appraise_child_nb = 0;
        $.each(tourPackageList, function (key, val) {
            if (parseInt(val['tour_period_id']) == tour_period) {
                sum_appraise_child_nb = sum_appraise_child_nb + parseInt(val['tour_period_child_nb_price']);
            }
        });
        sum_appraise_child_nb = sum_appraise_child_nb * parseInt(value);
        $('#appraise').html('฿' + numberWithCommas(sum_appraise_adult + sum_appraise_child + sum_appraise_alone + sum_appraise_child_nb));
    });
    $('#alone_price').change(function () {
        var value = ($(this).val());
        one_qty = value;
        sum_appraise_alone = 0;
        $.each(tourPackageList, function (key, val) {
            if (parseInt(val['tour_period_id']) == tour_period) {
                sum_appraise_alone = sum_appraise_alone + (parseInt(val['tour_period_adult_price']) + parseInt(val['tour_period_alone_price']));
            }
        });
        sum_appraise_alone = sum_appraise_alone * parseInt(value);
        $('#appraise').html('฿' + numberWithCommas(sum_appraise_adult + sum_appraise_child + sum_appraise_alone + sum_appraise_child_nb));
    });
    $('a.embed').gdocsViewer({width: 1020, height: 1300});
});

function redirect() {
    if (tour_period != 0 && ($('#adult_price').val() != 0 || $('#child_price').val() != 0 || $('#alone_price').val() != 0 || $('#child_nb_price').val() != 0)) {
        window.open('/tour-confirm/' + tour_package_id + '/' + tour_period + '?two_qty=' + two_qty + '&one_qty=' + one_qty + '&child_one_qty=' + child_one_qty + '&child_nb_qty=' + child_nb_qty, '_blank');
    } else {
        alert('กรุณาเลือกช่วงเวลาและจำนวนคน');
    }
}