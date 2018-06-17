$(function () {
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
    populateSelect($('#sel_tour_package_period'), tourPackageList);
    $('#sel_tour_package_period').val(tourPackagePeriod.tour_period_id);
    setValueQty();
    renderOrderTourPackage(tourPackagePeriod);

    $('#sel_tour_package_period').change(function () {
        var value = ($(this).val());
        $.each(tourPackageList, function () {
            if (parseInt(this.tour_period_id) == value) {
                tourPackagePeriod = this;
            }
        });
        resetValueQty();
        renderOrderTourPackage(tourPackagePeriod);
    });

    $('.two_minus').click(function () { // คือการเพิ่ม
        var nextInput = parseInt($(this).next('.qty').val());
        nextInput = nextInput + 2;
        $(this).next('.qty').val(nextInput);
        $('#two_amount').html(numberWithCommas(calculatePrice(removeCommas($('#two_price').text()), $('#two_qty').val())));
        $('.adult_total_amount').html(numberWithCommas(calculateTotalPrice($('.adult-subtotal'))));
        $('#all_total_amount').html(numberWithCommas(calculateAllTotalPrice()));
        calculateQty('adult');
        calculateQty('child');
    });
    $('.two_plus').click(function () { // คือการลบ
        var prevInput = parseInt($(this).prev('.qty').val());
        if (prevInput != 0) {
            prevInput = prevInput - 2;
            $(this).prev('.qty').val(prevInput);
            $('#two_amount').html(numberWithCommas(calculatePrice(removeCommas($('#two_price').text()), $('#two_qty').val())));
            $('.adult_total_amount').html(numberWithCommas(calculateTotalPrice($('.adult-subtotal'))));
            $('#all_total_amount').html(numberWithCommas(calculateAllTotalPrice()));
            calculateQty('adult');
            calculateQty('child');
        }
    });
    $('.one_minus').click(function () { // คือการเพิ่ม
        var nextInput = parseInt($(this).next('.qty').val());
        nextInput++;
        $(this).next('.qty').val(nextInput);
        $('#one_amount').html(numberWithCommas(calculatePrice(removeCommas($('#one_price').text()), $('#one_qty').val())));
        $('.adult_total_amount').html(numberWithCommas(calculateTotalPrice($('.adult-subtotal'))));
        $('#all_total_amount').html(numberWithCommas(calculateAllTotalPrice()));
        calculateQty('adult');
        calculateQty('child');
    });
    $('.one_plus').click(function () { // คือการลบ
        var prevInput = parseInt($(this).prev('.qty').val());
        if (prevInput != 0) {
            prevInput--;
            $(this).prev('.qty').val(prevInput);
            $('#one_amount').html(numberWithCommas(calculatePrice(removeCommas($('#one_price').text()), $('#one_qty').val())));
            $('.adult_total_amount').html(numberWithCommas(calculateTotalPrice($('.adult-subtotal'))));
            $('#all_total_amount').html(numberWithCommas(calculateAllTotalPrice()));
            calculateQty('adult');
            calculateQty('child');
        }
    });
    $('.three_minus').click(function () { // คือการเพิ่ม
        var nextInput = parseInt($(this).next('.qty').val());
        nextInput = nextInput + 3;
        $(this).next('.qty').val(nextInput);
        $('#three_amount').html(numberWithCommas(calculatePrice(removeCommas($('#three_price').text()), $('#three_qty').val())));
        $('.adult_total_amount').html(numberWithCommas(calculateTotalPrice($('.adult-subtotal'))));
        $('#all_total_amount').html(numberWithCommas(calculateAllTotalPrice()));
        calculateQty('adult');
        calculateQty('child');
    });
    $('.three_plus').click(function () { // คือการลบ
        var prevInput = parseInt($(this).prev('.qty').val());
        if (prevInput != 0) {
            prevInput = prevInput - 3;
            $(this).prev('.qty').val(prevInput);
            $('#three_amount').html(numberWithCommas(calculatePrice(removeCommas($('#three_price').text()), $('#three_qty').val())));
            $('.adult_total_amount').html(numberWithCommas(calculateTotalPrice($('.adult-subtotal'))));
            $('#all_total_amount').html(numberWithCommas(calculateAllTotalPrice()));
            calculateQty('adult');
            calculateQty('child');
        }
    });

    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    $('#child_two_minus').click(function () { // คือการเพิ่ม
        var nextInput = parseInt($(this).next('.qty').val());
        nextInput = nextInput + 2;
        $(this).next('.qty').val(nextInput);
        $('#child_two_amount').html(numberWithCommas(calculatePrice(removeCommas($('#child_two_price').text()), $('#child_two_qty').val())));
        $('.child_total_amount').html(numberWithCommas(calculateTotalPrice($('.child-subtotal'))));
        $('#all_total_amount').html(numberWithCommas(calculateAllTotalPrice()));
        calculateQty('adult');
        calculateQty('child');
    });
    $('#child_two_plus').click(function () { // คือการลบ
        var prevInput = parseInt($(this).prev('.qty').val());
        if (prevInput != 0) {
            prevInput = prevInput - 2;
            $(this).prev('.qty').val(prevInput);
            $('#child_two_amount').html(numberWithCommas(calculatePrice(removeCommas($('#child_two_price').text()), $('#child_two_qty').val())));
            $('.child_total_amount').html(numberWithCommas(calculateTotalPrice($('.child-subtotal'))));
            $('#all_total_amount').html(numberWithCommas(calculateAllTotalPrice()));
            calculateQty('adult');
            calculateQty('child');
        }
    });
    $('#child_one_minus').click(function () { // คือการเพิ่ม
        var nextInput = parseInt($(this).next('.qty').val());
        nextInput++;
        $(this).next('.qty').val(nextInput);
        $('#child_one_amount').html(numberWithCommas(calculatePrice(removeCommas($('#child_one_price').text()), $('#child_one_qty').val())));
        $('.child_total_amount').html(numberWithCommas(calculateTotalPrice($('.child-subtotal'))));
        $('#all_total_amount').html(numberWithCommas(calculateAllTotalPrice()));
        calculateQty('adult');
        calculateQty('child');
    });
    $('#child_one_plus').click(function () { // คือการลบ
        var prevInput = parseInt($(this).prev('.qty').val());
        if (prevInput != 0) {
            prevInput--;
            $(this).prev('.qty').val(prevInput);
            $('#child_one_amount').html(numberWithCommas(calculatePrice(removeCommas($('#child_one_price').text()), $('#child_one_qty').val())));
            $('.child_total_amount').html(numberWithCommas(calculateTotalPrice($('.child-subtotal'))));
            $('#all_total_amount').html(numberWithCommas(calculateAllTotalPrice()));
            calculateQty('adult');
            calculateQty('child');
        }
    });
    $('#child_nb_minus').click(function () { // คือการเพิ่ม
        var nextInput = parseInt($(this).next('.qty').val());
        nextInput = nextInput + 1;
        $(this).next('.qty').val(nextInput);
        $('#child_nb_amount').html(numberWithCommas(calculatePrice(removeCommas($('#child_nb_price').text()), $('#child_nb_qty').val())));
        $('.child_total_amount').html(numberWithCommas(calculateTotalPrice($('.child-subtotal'))));
        $('#all_total_amount').html(numberWithCommas(calculateAllTotalPrice()));
        calculateQty('adult');
        calculateQty('child');
    });
    $('#child_nb_plus').click(function () { // คือการลบ
        var prevInput = parseInt($(this).prev('.qty').val());
        if (prevInput != 0) {
            prevInput = prevInput - 1;
            $(this).prev('.qty').val(prevInput);
            $('#child_nb_amount').html(numberWithCommas(calculatePrice(removeCommas($('#child_nb_price').text()), $('#child_nb_qty').val())));
            $('.child_total_amount').html(numberWithCommas(calculateTotalPrice($('.child-subtotal'))));
            $('#all_total_amount').html(numberWithCommas(calculateAllTotalPrice()));
            calculateQty('adult');
            calculateQty('child');
        }
    });

    var customer = $('#customer_id').val();
    if (customer) { // check show/hide login button
        $('#login_panel').hide();
    } else {
        $('#login_panel').show();
    }
});

function populateSelect(selector, array) {
    $.each(array, function () {
        var status = this.tour_period_status == 'Y' ? 'ว่าง' : 'เต็ม';
        selector.append($("<option />").val(this.tour_period_id).text(this.tour_period_start + ' - ' + this.tour_period_end + ' ' + '(' + status + ')'));
    });
}

function renderOrderTourPackage(tour_package_period) {
    $('#txt_tour_period_start').html(tour_package_period.tour_period_start);
    $('#txt_tour_period_end').html(tour_package_period.tour_period_end);

    //init
    $('#two_price').html(numberWithCommas(tour_package_period.tour_period_adult_price));
    $('#one_price').html(numberWithCommas(parseInt(tour_package_period.tour_period_adult_price) + parseInt(tour_package_period.tour_period_alone_price)));
    $('#three_price').html(numberWithCommas(tour_package_period.tour_period_adult_price));
    $('#two_amount').html(numberWithCommas(calculatePrice(removeCommas($('#two_price').text()), $('#two_qty').val())));
    $('#one_amount').html(numberWithCommas(calculatePrice(removeCommas($('#one_price').text()), $('#one_qty').val())));
    $('#three_amount').html(numberWithCommas(calculatePrice(removeCommas($('#three_price').text()), $('#three_qty').val())));
    $('.adult_total_amount').html(numberWithCommas(calculateTotalPrice($('.adult-subtotal'))));
    $('#child_two_price').html(numberWithCommas(tour_package_period.tour_period_child_price));
    $('#child_one_price').html(numberWithCommas(tour_package_period.tour_period_child_price));
    $('#child_nb_price').html(numberWithCommas(tour_package_period.tour_period_child_nb_price));
    $('#child_two_amount').html(numberWithCommas(calculatePrice(removeCommas($('#child_two_price').text()), $('#child_two_qty').val())));
    $('#child_one_amount').html(numberWithCommas(calculatePrice(removeCommas($('#child_one_price').text()), $('#child_one_qty').val())));
    $('#child_nb_amount').html(numberWithCommas(calculatePrice(removeCommas($('#child_nb_price').text()), $('#child_nb_qty').val())));
    $('.child_total_amount').html(numberWithCommas(calculateTotalPrice($('.child-subtotal'))));
    $('#all_total_amount').html(numberWithCommas(calculateAllTotalPrice()));
    calculateQty('adult');
    calculateQty('child');
}

function calculateQty(type) {
    if (type == 'adult') {
        var atq = parseInt($('#two_qty').val());
        var anq = parseInt($('#one_qty').val());
        var athq = parseInt($('#three_qty').val());
        var sum_of_aqty = atq + anq + athq;
        if (sum_of_aqty != 0) {
            $('#adult_qty').html(sum_of_aqty);
        } else {
            $('#adult_qty').html('');
        }
    } else if (type == 'child') {
        var ctq = parseInt($('#child_two_qty').val());
        var cnq = parseInt($('#child_one_qty').val());
        var cnbq = parseInt($('#child_nb_qty').val());
        var sum_of_cqty = ctq + cnq + cnbq;
        if (sum_of_cqty != 0) {
            $('#child_qty').html(sum_of_cqty);
        } else {
            $('#child_qty').html('');
        }
    }
}

function calculatePrice(price, qty) {
    var total = 0;
    total = parseInt(price) * parseInt(qty);
    return total;
}

function calculateAllTotalPrice() {
    var total = 0;
    total = parseInt(removeCommas($('#adult_total_amount').text())) + parseInt(removeCommas($('#child_total_amount').text()));
    return total;
}

function calculateTotalPrice(selector) {
    var total = 0;
    $.map(selector, function ($el) {
        total = total + parseInt(removeCommas($el.innerText));
    });
    return total;
}

function setValueQty() {
    var two_qty = getUrlParameter('two_qty') || 0;
    var one_qty = getUrlParameter('one_qty') || 0;
    var child_one_qty = getUrlParameter('child_one_qty') || 0;
    var child_nb_qty = getUrlParameter('child_nb_qty') || 0;

    $('#two_qty').val(two_qty);
    $('#one_qty').val(one_qty);
    $('#child_one_qty').val(child_one_qty);
    $('#child_nb_qty').val(child_nb_qty);
}

function resetValueQty() {
    $.each($('.qty'), function () {
        $(this).val(0);
    });
}

function sendTourOrders() {
    var customer_id = $('#customer_id').val();
    var cus_name = $('#cus_name').val();
    var cus_email = $('#cus_email').val();
    var line_id = $('#line_id').val();
    var phone = $('#phone').val();
    var remark = $('#remark').val();

    var all_total_amount = removeCommas($('#all_total_amount').text());
    var adult_total_amount = removeCommas($('#adult_total_amount').text());
    var child_total_amount = removeCommas($('#child_total_amount').text());
    var adult_qty = $('#adult_qty').text();
    var child_qty = $('#child_qty').text();
    var tour_period_id = tourPackagePeriod.tour_period_id;
    var tour_package_id = tourPackage.tour_package_id;

    if ($('#other_info').prop('checked')) {
        if (cus_name && cus_email && line_id && phone) {
            $.ajax({
                type: 'post',
                url: base_path + '/orders',
                async: false,
                data: {
                    'customer_id': customer_id,
                    'cus_name': cus_name,
                    'cus_email': cus_email,
                    'line_id': line_id,
                    'phone': phone,
                    'remark': remark
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    if (data == "true") {
                        alert('ส่งข้อมูลการจองเรียบร้อย');
                        window.location.href = "/";
                    } else {
                        alert('จองไม่สำเร็จ');
                    }
                },
                error: function (data) {
                    alert('error');
                }
            });
        } else {
            alert('กรุณากรอกข้อมูลให้ครบ');
        }
    } else if (customer_id) {
        $.ajax({
            type: 'post',
            url: base_path + "/orders",
            async: false,
            data: {
                'customer_id': customer_id,
                'cus_name': cus_name,
                'cus_email': cus_email,
                'line_id': line_id,
                'phone': phone,
                'remark': remark,
                'all_total_amount': all_total_amount,
                'adult_qty': adult_qty,
                'child_qty': child_qty,
                'tour_period_id': tour_period_id,
                'tour_package_id': tour_package_id
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                if (data == 'true') {
                    alert('ส่งข้อมูลการจองเรียบร้อย');
                    window.location.href = "/";
                } else {
                    alert('จองไม่สำเร็จ');
                }
            },
            error: function (data) {
                alert('error');
            }
        });
    } else {
        alert('กรุณาเข้าสู่ระบบ');
    }
}