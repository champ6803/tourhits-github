$(function () {
    $('#package_tour').addClass('menu-active');
    $('#date_picker').daterangepicker({
        "autoApply": true,
        "opens": "center",
        locale: {
            "format": 'DD/MM/YYYY',
        }
    }, function (start, end, label) {
        $('#loading').show();
        $('.card_show').hide();
        start_date = start.format('YYYY-MM-DD');
        end_date = end.format('YYYY-MM-DD');
        getTourPackage(page_num, sort_by);
    });
    $('#date_picker').val("");

    search_text = getUrlParameter('search') == undefined ? "" : getUrlParameter('search');
    start_date = getUrlParameter('start_date') == undefined ? "" : getUrlParameter('start_date');
    end_date = getUrlParameter('end_date') == undefined ? "" : getUrlParameter('end_date');
    var days_no = getUrlParameter('days') == undefined ? [] : getUrlParameter('days');
    ary_days = days_no == "" ? [] : [days_no];

    var page_num = 1; // default page number
    getTourPackage(page_num, sort_by); // init package tour card
    checkboxChecked();
    $('.card_show').show();
    $('#loading').hide();
    if (ary_days.length > 0) {
        $('#day_all').prop('checked', false);
        $('#day_' + days_no).prop('checked', true);
    }
    if (start_date && end_date) {
        $('#date_picker').val(changeFormateDate(start_date) + " - " + changeFormateDate(end_date));
    }
    if (search_text) {
        $('#search_input').val(search_text);
    }

    expandCheckboxRoute();
    expandCheckboxAirline();
    expandCheckboxHoliday();
    expandCheckboxMonth();
    expandCheckboxDates();

    $('#search_btn').click(function () {
        $('#loading').show();
        $('.card_show').hide();
        search_text = $('#search_input').val();
        getTourPackage(page_num, sort_by);
    });

    $('#search_input').keypress(function (e) {
        var key = e.which;
        if (key == 13)  // the enter key code
        {
            $('#loading').show();
            $('.card_show').hide();
            search_text = $('#search_input').val();
            getTourPackage(page_num, sort_by);
            return false;
        }
    });

    $('#clear_calendar').click(function () {
        $('#date_picker').val("");
        $('#loading').show();
        $('.card_show').hide();
        start_date = "";
        end_date = "";
        getTourPackage(page_num, sort_by);
    });

    $('#price_to').text(numberWithCommas(price_most - 5000));

    $('#price').slider({
        min: 0,
        max: price_most,
        value: [0, (price_most - 5000)]
    });

    $('#price').slider().on('slide', function (sliderValue) {
        document.getElementById("price_from").textContent = numberWithCommas(sliderValue.value[0]);
        document.getElementById("price_to").textContent = numberWithCommas(sliderValue.value[1]);
        price_from = sliderValue.value[0];
        price_to = sliderValue.value[1];
    });

//$('#card_area').endlessScroll({
//            pagesToKeep: 10,
//            fireOnce: false,
//            insertBefore: "#list div:first",
//            insertAfter: "#list div:last",
//            content: function (i, p) {
//                console.log(i, p)
//                return '<li>' + p + '</li>'
//            },
//            ceaseFire: function (i) {
//                if (i >= 10) {
//                    return true;
//                }
//            },
//            intervalFrequency: 5
//        });

});

var search_text = "";
//var slider = new Slider('#price', {
//    min: 0,
//    max: price_most,
//    range: true,
//    value: [0, 50000]
//});

//var sliderMobile = new Slider('#price_mobile', {
//    min: 0,
//    max: 100000,
//    range: true,
//    value: [0, 80000]
//});

//slider.on("slide", function (sliderValue) {
//    document.getElementById("price_from").textContent = numberWithCommas(sliderValue[0]);
//    document.getElementById("price_to").textContent = numberWithCommas(sliderValue[1]);
//    price_from = sliderValue[0];
//    price_to = sliderValue[1];
//});

//sliderMobile.on("slide", function (sliderValue) {
//    document.getElementById("price_mobile_from").textContent = numberWithCommas(sliderValue[0]);
//    document.getElementById("price_mobile_to").textContent = numberWithCommas(sliderValue[1]);
//});



function expandCheckboxRoute() {
    var size_li = $("#filter-route .option").size();
    var x = 5;
    if (size_li <= 5) {
        $("#expandToggleRoute").hide();
    }
    $('#filter-route .option:lt(' + x + ')').show();

    $('#loadMoreRoute').click(function () {
        if (x === 5) {
//            x = (x + 10 <= size_li) ? x + 5 : size_li;
            x = size_li;
            $("#loadMoreRoute").html("ดูน้อยลง&nbsp;<i class='fas fa-caret-up'></i>");
            $('#filter-route .option:lt(' + x + ')').slideDown();
        } else if (x > 5) {
//            x = (x - 5 <= 5) ? 5 : x - 5;'
            x = 5;
            $("#loadMoreRoute").html("ดูเพิ่มเติม&nbsp;<i class='fas fa-caret-down'></i>");
            $('#filter-route .option').not(':lt(' + x + ')').slideUp();
        }
    });
}

function expandCheckboxAirline() {
    var size_li = $("#filter-airline .option").size();
    var x = 5;
    if (size_li <= 5) {
        $("#expandToggleAirline").hide();
    }
    //$('#filter-airline .option:lt(' + x + ')').show();
    $('#filter-airline .option').each(function (key, val) {
        var num = key;
        if (parseInt(num) > 4) {
            $(this).hide();
        }

    });

    $('#loadMoreAirline').click(function () {
        if (x === 5) {
//            x = (x + 10 <= size_li) ? x + 5 : size_li;
            x = size_li;
            $("#loadMoreAirline").html("ดูน้อยลง&nbsp;<i class='fas fa-caret-up'></i>");
            $('#filter-airline .option:lt(' + x + ')').slideDown();
        } else if (x > 5) {
//            x = (x - 5 <= 5) ? 5 : x - 5;
            x = 5;
            $("#loadMoreAirline").html("ดูเพิ่มเติม&nbsp;<i class='fas fa-caret-down'></i>");
            $('#filter-airline .option').not(':lt(' + x + ')').slideUp();
        }
    });
}

function expandCheckboxHoliday() {
    var size_li = $("#filter-date .option").size();
    var x = 5;
    if (size_li <= 5) {
        $("#expandToggleHoliday").hide();
    }
//    $('#filter-date .option:lt(' + x + ')').show();

    $('#filter-date .option').each(function (key, val) {
        var num = key;
        if (parseInt(num) > 4) {
            $(this).hide();
        }

    });
    $('#loadMoreHoliday').click(function () {
        if (x === 5) {
//            x = (x + 10 <= size_li) ? x + 5 : size_li;
            x = size_li;
            $("#loadMoreHoliday").html("ดูน้อยลง&nbsp;<i class='fas fa-caret-up'></i>");
            $('#filter-date .option:lt(' + x + ')').slideDown();
        } else if (x > 5) {
//            x = (x - 5 <= 5) ? 5 : x - 5;
            x = 5;
            $("#loadMoreHoliday").html("ดูเพิ่มเติม&nbsp;<i class='fas fa-caret-down'></i>");
            $('#filter-date .option').not(':lt(' + x + ')').slideUp();
        }
    });
}

function expandCheckboxMonth() {
    var size_li = $("#filter-month .option").size();
    var x = 5;
    if (size_li <= 5) {
        $("#expandToggleMonth").hide();
    }
//    $('#filter-month .option:lt(' + x + ')').show();
    $('#filter-month .option').each(function (key, val) {
        var num = key;
        if (parseInt(num) > 4) {
            $(this).hide();
        }

    });
    $('#loadMoreMonth').click(function () {
        if (x === 5) {
//            x = (x + 10 <= size_li) ? x + 5 : size_li;
            x = size_li;
            $("#loadMoreMonth").html("ดูน้อยลง&nbsp;<i class='fas fa-caret-up'></i>");
            $('#filter-month .option:lt(' + x + ')').slideDown();
        } else if (x > 5) {
//            x = (x - 5 <= 5) ? 5 : x - 5;
            x = 5;
            $("#loadMoreMonth").html("ดูเพิ่มเติม&nbsp;<i class='fas fa-caret-down'></i>");
            $('#filter-month .option').not(':lt(' + x + ')').slideUp();
        }
    });
}

function expandCheckboxDates() {
    var size_li = $("#filter-countdate .option").size();
    var x = 5;
    if (size_li <= 5) {
        $("#expandToggleDates").hide();
    }
//    $('#filter-countdate .option:lt(' + x + ')').show();
    $('#filter-countdate .option').each(function (key, val) {
        var num = key;
        if (parseInt(num) > 4) {
            $(this).hide();
        }

    });
    $('#loadMoreDates').click(function () {
        if (x === 5) {
//            x = (x + 10 <= size_li) ? x + 5 : size_li;
            x = size_li;
            $("#loadMoreDates").html("ดูน้อยลง&nbsp;<i class='fas fa-caret-up'></i>");
            $('#filter-countdate .option:lt(' + x + ')').slideDown();
        } else if (x > 5) {
//            x = (x - 5 <= 5) ? 5 : x - 5;
            x = 5;
            $("#loadMoreDates").html("ดูเพิ่มเติม&nbsp;<i class='fas fa-caret-down'></i>");
            $('#filter-countdate .option').not(':lt(' + x + ')').slideUp();
        }
    });
}

var sort_by = "lowest_price";

function sortPackage() {
    sort_by = $('#sort_package option:selected').val();
    getTourPackage(1, sort_by);
}

function getTourPackage(page_num, sort_by) {
    var path = window.location.pathname.split('/');
    var last_path = path.length - 1;
    var country = path[last_path];
    var take = 7;
    if (country != "" && country != null) {
        $.ajax({
            type: 'post',
            url: 'getTourPackage',
            async: true,
            data: {
                '_search_text': search_text,
                '_country': country,
                '_route': JSON.stringify(ary_route),
                '_start_date': start_date,
                '_end_date': end_date,
                '_month': JSON.stringify(ary_month),
                '_days': JSON.stringify(ary_days),
                '_airline': JSON.stringify(ary_airline),
                '_tags': JSON.stringify(ary_tags),
                '_attraction': JSON.stringify(ary_attraction),
                '_others': JSON.stringify(ary_others),
                '_price_from': "",
                '_price_to': "",
                '_page_num': page_num,
                '_take': take,
                '_sort_by': sort_by
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                renderTourCard(data.tourPackageList, data.tourPeriod);
                if (data != null && data.tourPackageList.length > 0) {
                    var total_record = parseInt(data.totalRecord);
                    $('#package_country2').html(data.filterName);
                    $('#package_country').html(" ทั้งหมด " + total_record + " แพ็คเกจ");
                    if (data.filterType == "country") {
                        $("#package_country_image").attr("src", "../images/fg/" + data.tourPackageList[0].country_code.toLowerCase() + ".png");
                    } else {
                        $("#package_country_image").hide();
                    }

                    $("#search_tour_pager").empty();
                    $('#card_area').pageMe({pagerSelector: '#search_tour_pager', showPrevNext: true, hidePageNumbers: false, pageNum: page_num, perPage: take, totalRecord: total_record});

                    $('.card_show').show();
                    $('#loading').hide();
                    document.body.scrollTop = 0; // For Safari
                    document.documentElement.scrollTop = 0;
                }
            },
            error: function (data) {
                alert('error');
            }
        });
    } else {
        alert("no country");
    }
}

var start_date = "";
var end_date = "";
var ary_route = [];
var ary_month = [];
var ary_days = [];
var ary_airline = [];
var ary_tags = [];
var ary_attraction = [];
var ary_others = [];
var price_from = 0;
var price_to = 50000;

function checkboxChecked() {
    $('#route_all').on('change', function (evt) {
        if ($('#route_all').is(':checked')) {
            $('#loading').show();
            $('.card_show').hide();
            ary_route = [];
            $('.route_checkbox').prop('checked', false);
            getTourPackage(1, sort_by);
        }
    });

    $('.route_checkbox:checkbox').on('change', function (evt) {
        $('#loading').show();
        $('.card_show').hide();
        ary_route = [];
        $('.route_checkbox:checkbox:checked').each(function (i) {
            ary_route[i] = $(this).val();
        });
        $('#route_all').prop('checked', false); // Unchecks it
        getTourPackage(1, sort_by);
    });

    $('#holiday_all').on('change', function (evt) {
        if ($('#holiday_all').is(':checked')) {
            $('#loading').show();
            $('.card_show').hide();
            start_date = "";
            end_date = "";
            $('.holiday_checkbox').prop('checked', false);
            getTourPackage(1, sort_by);
        }
    });

    $('.holiday_checkbox:checkbox').on('change', function (evt) {
        $('#loading').show();
        $('.card_show').hide();
        $('.holiday_checkbox:checkbox:checked').each(function (i) {
            var se = $(this).val().split("||");
            start_date = se[0];
            end_date = se[1];
        });
        $('#holiday_all').prop('checked', false); // Unchecks it
        $('.holiday_checkbox').not(this).prop('checked', false);
        getTourPackage(1, sort_by);
    });

    $('#month_all').on('change', function (evt) {
        if ($('#month_all').is(':checked')) {
            $('#loading').show();
            $('.card_show').hide();
            ary_month = [];
            $('.month_checkbox').prop('checked', false);
            getTourPackage(1, sort_by);
        }
    });

    $('.month_checkbox:checkbox').on('change', function (evt) {
        $('#loading').show();
        $('.card_show').hide();
        ary_month = [];
        $('.month_checkbox:checkbox:checked').each(function (i) {
            ary_month[i] = $(this).val();
        });
        $('#month_all').prop('checked', false); // Unchecks it
        getTourPackage(1, sort_by);
    });

    $('#day_all').on('change', function (evt) {
        if ($('#day_all').is(':checked')) {
            $('#loading').show();
            $('.card_show').hide();
            ary_days = [];
            $('.days_checkbox').prop('checked', false);
            getTourPackage(1, sort_by);
        }
    });

    $('.days_checkbox:checkbox').on('change', function (evt) {
        $('#loading').show();
        $('.card_show').hide();
        ary_days = [];
        $('.days_checkbox:checkbox:checked').each(function (i) {
            ary_days[i] = $(this).val();
        });
        $('#day_all').prop('checked', false); // Unchecks it
        getTourPackage(1, sort_by);
    });

    $('#airline_all').on('change', function (evt) {
        if ($('#airline_all').is(':checked')) {
            $('#loading').show();
            $('.card_show').hide();
            ary_airline = [];
            $('.airline_checkbox').prop('checked', false);
            getTourPackage(1, sort_by);
        }
    });

    $('.airline_checkbox:checkbox').on('change', function (evt) {
        $('#loading').show();
        $('.card_show').hide();
        ary_airline = [];
        $('.airline_checkbox:checkbox:checked').each(function (i) {
            ary_airline[i] = $(this).val();
        });
        $('#airline_all').prop('checked', false); // Unchecks it
        getTourPackage(1, sort_by);
    });
}

//function renderTourCard(tourPackageList, tourPeriod) {
//    var obj = tourPackageList;
//    if (obj != null && obj.length > 0) {
//        $('#package_country').show();
//        $('#package_country_image').show();
//        $('#sorting').show();
//        var divs = "";
//        $("#card_area").empty();
//        $.each(obj, function (key, val) {
//            var div = '<li class="trip-item">';
//            div = div + '<div class="item-media">';
//            div = div + '<div class="image-cover">';
//            div = div + '<img src="../images/tour/' + this.tour_package_image + '" alt="">';
//            div = div + '</div>';
//
//            div = div + '<div class="bot-img-detail">';
//            div = div + '<div class="tag-day-and-period">';
//            var all_as = val["tour_package_period_start"].split("-");
//            var all_ae = val["tour_package_period_end"].split("-");
//            div = div + '<span>' + this.tour_period_day_number + ' </span>';
//            div = div + '<span>วัน</span>';
//            div = div + '<span> ' + this.tour_period_night_number + ' </span>';
//            div = div + '<span>คืน</span>';
//            div = div + '<span>' + setCTMonthString(all_as[1]) + ' - ' + setCTMonthString(all_ae[1]) + '</span>';
//            div = div + '</div>';
//            div = div + '<div class="tag-tour-num">';
//            var tour_code = val['tour_package_id'];
//            div = div + '<span>รหัส</span>';
//            div = div + '<span> TH' + tour_code + '</span>';
//            div = div + '</div>';
//
//            div = div + '</div>';
//            div = div + '</div>';
//
//
//            div = div + '<div class="item-body">';
//            //div = div + '<div class="item-title"><h5 style="color:#ea1c24"><a href="/tour-detail/' + val['tour_country_name'] + '/' + val['tour_package_id'] + '/' + val['tour_package_name'] + '">' + this.tour_package_name + '</a></h5></div>';
//            div = div + '<div class="item-title"><h2><a href="/tour-detail/' + val['tour_country_url'] + '/' + val['tour_package_id'] + '/' + val['tour_package_code'] + '">' + this.tour_package_name + '</a></h2></div>';
//            div = div + '<div class="hilight">';
//            div = div + '<i class="fas fa-quote-left"></i>';
//            div = div + '<div class="detail">';
//            div = div + this.tour_package_detail;
//            div = div + '</div>';
//            div = div + '</div>';
////            div = div + '<div class="item-list">';
////            div = div + '<ul>';
////            div = div + '<li><i class="far fa-clock"></i> ' + this.tour_period_day_number + ' วัน ' + this.tour_period_night_number + ' คืน</li>';
////            var all_as = val["tour_package_period_start"].split("-");
////            var all_ae = val["tour_package_period_end"].split("-");
////            div = div + '<li><i class="far fa-calendar"></i> ช่วงเวลา ' + setCTMonthString(all_as[1]) + ' - ' + setCTMonthString(all_ae[1]) + '</li>';
////            div = div + '</ul>';
////            div = div + '</div>';
//            div = div + '<div class="item-footer">';
//            div = div + '<div class="item-rate">';
//            div = div + '<div class="card-airline">';
//            div = div + '<img alt="' + this.airline_name + '" src="../images/airline/' + this.airline_picture + '" title="">';
//            div = div + '</div>';
//            div = div + '</div>';
////            div = div + '<div class="item-icon">';
////            var tour_code = val['tour_package_id'];
//////            while (tour_code.length != 6)
//////            {
//////                tour_code = '0' + tour_code;
//////            }
////            div = div + '<div class="pass">รหัสทัวร์&nbsp</div>TH' + tour_code;
////            div = div + '</div>';
//            div = div + '</div>';
//            div = div + '</div>';
//            div = div + '<div class="item-price-more">';
//            div = div + '<div class="price">';
//            div = div + 'ราคา';
//            if (this.tour_package_special_price > 0) {
//                div = div + '<ins>';
//                div = div + '<span class="amount">' + numberWithCommas(this.tour_package_special_price) + '฿</span>';
//                div = div + '</ins>';
//                div = div + '<del>';
//                div = div + '<span class="amount">' + numberWithCommas(this.tour_package_price) + '฿</span>';
//                div = div + '</del>'
//            } else {
//                div = div + '<ins>';
//                div = div + '<span class="amount">' + numberWithCommas(this.tour_package_price) + '฿</span>';
//                div = div + '</ins>';
//            }
//
////            $.each(tourPeriod, function (keyPrice, valPrice) {
////                if (valPrice['tour_package_id'] === val['tour_package_id']) {
////                    div = div + '<span class="amount">฿' + numberWithCommas(tourPeriod[keyPrice].tour_period_adult_price) + '</span>';
////                    return false;
////                }
////            });
//            div = div + '</div>';
//            div = div + '<a class="awe-btn" href="/tour-detail/' + val['tour_country_name'] + '/' + val['tour_package_id'] + '/' + val['tour_package_code'] + '">รายละเอียด</a>';
//            div = div + '</div>';
//            div = div + '</li>';
//            divs = divs + div;
//        });
//        $('#card_area').html(divs);
//        $('#search_tour_pager').show();
//    } else {
//        $('.card_show').show();
//        $('#loading').hide();
//        $('#package_country').hide();
//        $('#package_country_image').hide();
//        $('#sorting').hide();
//        $("#card_area").empty();
//        var div = "<div class='search-empty'>ขออภัยไม่พบทัวร์ที่ค้นหา</div>";
//        $('#card_area').html(div);
//        $('#search_tour_pager').hide();
//    }
//}

function renderTourCard(tourPackageList, tourPeriod) {
    var obj = tourPackageList;
    if (obj != null && obj.length > 0) {
        $('#package_country').show();
        $('#package_country_image').show();
        $('#sorting').show();
        var divs = "";
        $("#card_area").empty();
        $.each(obj, function (key, val) {
            var div = '<li class="trip-item">';
            div = div + '<div class="item-media">';
            div = div + '<div class="image-cover">';
            div = div + '<img src="../images/tour/' + this.tour_package_image + '" alt="">';
            div = div + '</div>';

            div = div + '<div class="bot-img-detail visible-xs visible-sm">';
            div = div + '<div class="tag-day-and-period">';

            var all_as = val["tour_package_period_start"].split("-");
            var all_ae = val["tour_package_period_end"].split("-");

            div = div + '<span>' + this.tour_period_day_number + ' </span>';
            div = div + '<span>วัน</span>';
            div = div + '<span> ' + this.tour_period_night_number + ' </span>';
            div = div + '<span>คืน</span>';
            div = div + '<span>' + setCTMonthString(all_as[1]) + ' - ' + setCTMonthString(all_ae[1]) + '</span>';
            div = div + '</div>';

            div = div + '<div class="tag-tour-num">';
            var tour_code = val['tour_package_id'];
            div = div + '<span>รหัส</span>';
            div = div + '<span> TH' + tour_code + '</span>';
            div = div + '</div>';

            div = div + '</div>';
            div = div + '</div>';


            div = div + '<div class="item-head-body">';
            div = div + '<h3><a href="/tour-detail/' + val['tour_country_url'] + '/' + val['tour_package_id'] + '/' + val['tour_package_code'] + '">' + this.tour_package_name + '</a></h3>';
            div = div + '</div>';


            div = div + '<div class="item-body">';
            div = div + '<div class="tag-box-left hidden-xs">';
            div = div + '<div class="tag-head flexbox">';
            div = div + '<span class="flexbox">ระยะเวลา</span>';
            div = div + '<span class="flexbox">รหัสทัวร์</span>';
            div = div + '</div>'

            div = div + '<div class="tag-id flexbox">';
            div = div + '<span class="flexbox">' + this.tour_period_day_number + ' วัน ' + this.tour_period_night_number + ' คืน</span>';
            div = div + '<span class="flexbox">TH' + tour_code + '</span>';
            div = div + '</div>'

            div = div + '<div class="tag-airline">';
            div = div + '<span class="flexbox">สายการบิน</span>';
            div = div + '<div class="tag-airline2 flexbox">';
            div = div + '<img alt="' + this.airline_name + '" src="../images/airline/' + this.airline_picture + '" title="">';
            div = div + '</div>';
            div = div + '</div>';
            div = div + '</div>';
            div = div + '</div>';

            div = div + '<div class="item-price-more">';
            div = div + '<div class="price">ราคา';
            div = div + '<ins><span class="amount">' + numberWithCommas(this.tour_package_price) + '<span class="bbb">บาท</span></span></ins>'
            div = div + '</div>';
            div = div + '<a class="awe-btn" href="/tour-detail/' + val['tour_country_url'] + '/' + val['tour_package_id'] + '/' + val['tour_package_code'] + '">ดูรายละเอียด</a>';
            div = div + '</div>';

            div = div + '<div class="item-hilight-more hilight">';
            div = div + '<span class="hi-text">ไฮไลท์ - </span><i class="fas fa-quote-left"></i>';
            div = div + '<div class="detail">';
            div = div + this.tour_package_detail;
            div = div + '</div>';
            div = div + '</div>';

            var months = [];
            var h01 = "";
            var h02 = "";
            var h03 = "";
            var h04 = "";
            var h05 = "";
            var h06 = "";
            var h07 = "";
            var h08 = "";
            var h09 = "";
            var h10 = "";
            var h11 = "";
            var h12 = "";

            $.each(tourPeriod, function (keyPrice, valPrice) {
                if (valPrice['tour_package_id'] === val['tour_package_id']) {
                    var as = valPrice["tour_period_start"].split("-");
                    var ae = valPrice["tour_period_end"].split("-");
                    var ae2 = ae[2].split(' ');
                    var as2 = as[2].split(' ');
                    var date = as2[0] + "-" + ae2[0];

                    if (as[1] === "01") {
                        h01 = h01 + '<span class="date soldout" data-event-name="">' + date + '</span>';
                        h01 = h01 + '<span class="separate"> / </span>';
                        months.indexOf("01") == -1 ? months.push("01") : "";
                    }

                    if (as[1] === "02") {
                        h02 = h02 + '<span class="date soldout" data-event-name="">' + date + '</span>';
                        h02 = h02 + '<span class="separate"> / </span>';
                        months.indexOf("02") == -1 ? months.push("02") : "";
                    }
                    if (as[1] === "03") {
                        h03 = h03 + '<span class="date soldout" data-event-name="">' + date + '</span>';
                        h03 = h03 + '<span class="separate"> / </span>';
                        months.indexOf("03") == -1 ? months.push("03") : "";
                    }
                    if (as[1] === "04") {
                        h04 = h04 + '<span class="date soldout" data-event-name="">' + date + '</span>';
                        h04 = h04 + '<span class="separate"> / </span>';
                        months.indexOf("04") == -1 ? months.push("04") : "";
                    }
                    if (as[1] === "05") {
                        h05 = h05 + '<span class="date soldout" data-event-name="">' + date + '</span>';
                        h05 = h05 + '<span class="separate"> / </span>';
                        months.indexOf("05") == -1 ? months.push("05") : "";
                    }
                    if (as[1] === "06") {
                        h06 = h06 + '<span class="date soldout" data-event-name="">' + date + '</span>';
                        h06 = h06 + '<span class="separate"> / </span>';
                        months.indexOf("06") == -1 ? months.push("06") : "";
                    }
                    if (as[1] === "07") {
                        h07 = h07 + '<span class="date soldout" data-event-name="">' + date + '</span>';
                        h07 = h07 + '<span class="separate"> / </span>';
                        months.indexOf("07") == -1 ? months.push("07") : "";
                    }
                    if (as[1] === "08") {
                        h08 = h08 + '<span class="date soldout" data-event-name="">' + date + '</span>';
                        h08 = h08 + '<span class="separate"> / </span>';
                        months.indexOf("08") == -1 ? months.push("08") : "";
                    }
                    if (as[1] === "09") {
                        h09 = h09 + '<span class="date soldout" data-event-name="">' + date + '</span>';
                        h09 = h09 + '<span class="separate"> / </span>';
                        months.indexOf("09") == -1 ? months.push("09") : "";
                    }
                    if (as[1] === "10") {
                        h10 = h10 + '<span class="date soldout" data-event-name="">' + date + '</span>';
                        h10 = h10 + '<span class="separate"> / </span>';
                        months.indexOf("10") == -1 ? months.push("10") : "";
                    }
                    if (as[1] === "11") {
                        h11 = h11 + '<span class="date soldout" data-event-name="">' + date + '</span>';
                        h11 = h11 + '<span class="separate"> / </span>';
                        months.indexOf("11") == -1 ? months.push("11") : "";
                    }
                    if (as[1] === "12") {
                        h12 = h12 + '<span class="date soldout" data-event-name="">' + date + '</span>';
                        h12 = h12 + '<span class="separate"> / </span>';
                        months.indexOf("12") == -1 ? months.push("12") : "";
                    }
                }
            });

            if (months.indexOf("01") != -1) {
                div = div + '<div class="item-period-table">';
                div = div + '<div class="table-month">';
                div = div + '<span class="month">' + setCTMonthString("01") + '</span>';
                div = div + '</div>';
                div = div + '<div class="peroid">';
                div = div + h01;
                div = div + '</div>';
                div = div + '</div>';
            }
            if (months.indexOf("02") != -1) {
                div = div + '<div class="item-period-table">';
                div = div + '<div class="table-month">';
                div = div + '<span class="month">' + setCTMonthString("02") + '</span>';
                div = div + '</div>';
                div = div + '<div class="peroid">';
                div = div + h02;
                div = div + '</div>';
                div = div + '</div>';
            }
            if (months.indexOf("03") != -1) {
                div = div + '<div class="item-period-table">';
                div = div + '<div class="table-month">';
                div = div + '<span class="month">' + setCTMonthString("03") + '</span>';
                div = div + '</div>';
                div = div + '<div class="peroid">';
                div = div + h03;
                div = div + '</div>';
                div = div + '</div>';
            }
            if (months.indexOf("04") != -1) {
                div = div + '<div class="item-period-table">';
                div = div + '<div class="table-month">';
                div = div + '<span class="month">' + setCTMonthString("04") + '</span>';
                div = div + '</div>';
                div = div + '<div class="peroid">';
                div = div + h04;
                div = div + '</div>';
                div = div + '</div>';
            }
            if (months.indexOf("05") != -1) {
                div = div + '<div class="item-period-table">';
                div = div + '<div class="table-month">';
                div = div + '<span class="month">' + setCTMonthString("05") + '</span>';
                div = div + '</div>';
                div = div + '<div class="peroid">';
                div = div + h05;
                div = div + '</div>';
                div = div + '</div>';
            }
            if (months.indexOf("06") != -1) {
                div = div + '<div class="item-period-table">';
                div = div + '<div class="table-month">';
                div = div + '<span class="month">' + setCTMonthString("06") + '</span>';
                div = div + '</div>';
                div = div + '<div class="peroid">';
                div = div + h06;
                div = div + '</div>';
                div = div + '</div>';
            }
            if (months.indexOf("07") != -1) {
                div = div + '<div class="item-period-table">';
                div = div + '<div class="table-month">';
                div = div + '<span class="month">' + setCTMonthString("07") + '</span>';
                div = div + '</div>';
                div = div + '<div class="peroid">';
                div = div + h07;
                div = div + '</div>';
                div = div + '</div>';
            }
            if (months.indexOf("08") != -1) {
                div = div + '<div class="item-period-table">';
                div = div + '<div class="table-month">';
                div = div + '<span class="month">' + setCTMonthString("08") + '</span>';
                div = div + '</div>';
                div = div + '<div class="peroid">';
                div = div + h08;
                div = div + '</div>';
                div = div + '</div>';
            }
            if (months.indexOf("09") != -1) {
                div = div + '<div class="item-period-table">';
                div = div + '<div class="table-month">';
                div = div + '<span class="month">' + setCTMonthString("09") + '</span>';
                div = div + '</div>';
                div = div + '<div class="peroid">';
                div = div + h09;
                div = div + '</div>';
                div = div + '</div>';
            }
            if (months.indexOf("10") != -1) {
                div = div + '<div class="item-period-table">';
                div = div + '<div class="table-month">';
                div = div + '<span class="month">' + setCTMonthString("10") + '</span>';
                div = div + '</div>';
                div = div + '<div class="peroid">';
                div = div + h10;
                div = div + '</div>';
                div = div + '</div>';
            }
            if (months.indexOf("11") != -1) {
                div = div + '<div class="item-period-table">';
                div = div + '<div class="table-month">';
                div = div + '<span class="month">' + setCTMonthString("11") + '</span>';
                div = div + '</div>';
                div = div + '<div class="peroid">';
                div = div + h11;
                div = div + '</div>';
                div = div + '</div>';
            }
            if (months.indexOf("12") != -1) {
                div = div + '<div class="item-period-table">';
                div = div + '<div class="table-month">';
                div = div + '<span class="month">' + setCTMonthString("12") + '</span>';
                div = div + '</div>';
                div = div + '<div class="peroid">';
                div = div + h12;
                div = div + '</div>';
                div = div + '</div>';
            }


            div = div + '</li>';
            divs = divs + div;
        });
        $('#card_area').html(divs);
        $('#search_tour_pager').show();
    } else {
        $('.card_show').show();
        $('#loading').hide();
        $('#package_country').hide();
        $('#package_country_image').hide();
        $('#sorting').hide();
        $("#card_area").empty();
        var div = "<div class='search-empty'>ขออภัยไม่พบทัวร์ที่ค้นหา</div>";
        $('#card_area').html(div);
        $('#search_tour_pager').hide();
    }
}
