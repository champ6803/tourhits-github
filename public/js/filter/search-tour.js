$(function () {
    $('#date_picker').daterangepicker({
        "autoApply": true,
        "opens": "center",
        locale: {
            "format": 'DD/MM/YYYY',
        }
    }, function (start, end, label) {
        start_date = start.format('YYYY-MM-DD hh:mm:ss');
        end_date = end.format('YYYY-MM-DD hh:mm:ss');
    });
    $('#date_picker').val("");

    expandCheckboxRoute();
    expandCheckboxAirline();
    expandCheckboxHoliday();
    expandCheckboxMonth();
    expandCheckboxDates();

    $('#card_area').pageMe({pagerSelector: '#search_tour_pager', showPrevNext: true, hidePageNumbers: false, perPage: 9});

    $("#test").click(function () {
        getTourPackage();
    });
    checkboxChecked();
});

var slider = new Slider('#price', {
    min: 0,
    max: 100000,
    range: true,
    value: [0, 80000]
});
slider.on("slide", function (sliderValue) {
    document.getElementById("price_from").textContent = sliderValue[0];
    document.getElementById("price_to").textContent = sliderValue[1];
});

function expandCheckboxRoute() {
    var size_li = $("#filter-route .option").size();
    var x = 5;
    if (size_li <= 5) {
        $("#expandToggleRoute").hide();
    }
    $('#filter-route .option:lt(' + x + ')').show();
    $('#loadMoreRoute').click(function () {
        if (x === 5) {
            x = (x + 10 <= size_li) ? x + 5 : size_li;
            $("#loadMoreRoute").html("ดูน้อยลง&nbsp;<i class='fas fa-caret-up'></i>");
            $('#filter-route .option:lt(' + x + ')').show();
        } else if (x > 5) {
            x = (x - 5 <= 5) ? 5 : x - 5;
            $("#loadMoreRoute").html("ดูเพิ่มเติม&nbsp;<i class='fas fa-caret-down'></i>");
            $('#filter-route .option').not(':lt(' + x + ')').hide();
        }
    });
}

function expandCheckboxAirline() {
    var size_li = $("#filter-airline .option").size();
    var x = 5;
    if (size_li <= 5) {
        $("#expandToggleAirline").hide();
    }
    $('#filter-airline .option:lt(' + x + ')').show();
    $('#loadMoreAirline').click(function () {
        if (x === 5) {
            x = (x + 10 <= size_li) ? x + 5 : size_li;
            $("#loadMoreAirline").html("ดูน้อยลง&nbsp;<i class='fas fa-caret-up'></i>");
            $('#filter-airline .option:lt(' + x + ')').show();
        } else if (x > 5) {
            x = (x - 5 <= 5) ? 5 : x - 5;
            $("#loadMoreAirline").html("ดูเพิ่มเติม&nbsp;<i class='fas fa-caret-down'></i>");
            $('#filter-airline .option').not(':lt(' + x + ')').hide();
        }
    });
}

function expandCheckboxHoliday() {
    var size_li = $("#filter-date .option").size();
    var x = 5;
    if (size_li <= 5) {
        $("#expandToggleHoliday").hide();
    }
    $('#filter-holiday .option:lt(' + x + ')').show();
    $('#loadMoreHoliday').click(function () {
        if (x === 5) {
            x = (x + 10 <= size_li) ? x + 5 : size_li;
            $("#loadMoreHoliday").html("ดูน้อยลง&nbsp;<i class='fas fa-caret-up'></i>");
            $('#filter-date .option:lt(' + x + ')').show();
        } else if (x > 5) {
            x = (x - 5 <= 5) ? 5 : x - 5;
            $("#loadMoreHoliday").html("ดูเพิ่มเติม&nbsp;<i class='fas fa-caret-down'></i>");
            $('#filter-date .option').not(':lt(' + x + ')').hide();
        }
    });
}

function expandCheckboxMonth() {
    var size_li = $("#filter-month .option").size();
    var x = 5;
    if (size_li <= 5) {
        $("#expandToggleMonth").hide();
    }
    $('#filter-month .option:lt(' + x + ')').show();
    $('#loadMoreMonth').click(function () {
        if (x === 5) {
            x = (x + 10 <= size_li) ? x + 5 : size_li;
            $("#loadMoreMonth").html("ดูน้อยลง&nbsp;<i class='fas fa-caret-up'></i>");
            $('#filter-month .option:lt(' + x + ')').show();
        } else if (x > 5) {
            x = (x - 5 <= 5) ? 5 : x - 5;
            $("#loadMoreMonth").html("ดูเพิ่มเติม&nbsp;<i class='fas fa-caret-down'></i>");
            $('#filter-month .option').not(':lt(' + x + ')').hide();
        }
    });
}

function expandCheckboxDates() {
    var size_li = $("#filter-countdate .option").size();
    var x = 5;
    if (size_li <= 5) {
        $("#expandToggleDates").hide();
    }
    $('#filter-countdate .option:lt(' + x + ')').show();
    $('#loadMoreDates').click(function () {
        if (x === 5) {
            x = (x + 10 <= size_li) ? x + 5 : size_li;
            $("#loadMoreDates").html("ดูน้อยลง&nbsp;<i class='fas fa-caret-up'></i>");
            $('#filter-countdate .option:lt(' + x + ')').show();
        } else if (x > 5) {
            x = (x - 5 <= 5) ? 5 : x - 5;
            $("#loadMoreDates").html("ดูเพิ่มเติม&nbsp;<i class='fas fa-caret-down'></i>");
            $('#filter-countdate .option').not(':lt(' + x + ')').hide();
        }
    });
}

function getTourPackage() {
    var country = getUrlParameter('country');
    if (country != "" && country != null) {
        $.ajax({
            type: 'post',
            url: 'getTourPackage',
            async: false,
            data: {
                '_country': country,
                '_route': JSON.stringify(ary_route),
                '_start_date': start_date,
                '_end_date': end_date,
                '_month': JSON.stringify(ary_month),
                '_days': JSON.stringify(ary_days),
                '_airline': JSON.stringify(ary_airline),
                '_tags': JSON.stringify(ary_tags),
                '_attraction': JSON.stringify(ary_attraction)
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                if (data != null) {
                    renderTourPackage(data.tourPackageList, data.tourPeriod);
                } else {
                    alert('select fail');
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
function checkboxChecked() {
    $('.route_checkbox:checkbox').on('change', function (evt) {
        ary_route = [];
        $('.route_checkbox:checkbox:checked').each(function (i) {
            ary_route[i] = $(this).val();
        });
    });
    $('.month_checkbox:checkbox').on('change', function (evt) {
        ary_month = [];
        $('.month_checkbox:checkbox:checked').each(function (i) {
            ary_month[i] = $(this).val();
        });
    });
    $('.days_checkbox:checkbox').on('change', function (evt) {
        ary_days = [];
        $('.days_checkbox:checkbox:checked').each(function (i) {
            ary_days[i] = $(this).val();
        });
    });
    $('.airline_checkbox:checkbox').on('change', function (evt) {
        ary_airline = [];
        $('.airline_checkbox:checkbox:checked').each(function (i) {
            ary_airline[i] = $(this).val();
        });
    });
    $('.month_checkbox:checkbox').on('change', function (evt) {
        ary_month = [];
        $('.month_checkbox:checkbox:checked').each(function (i) {
            ary_month[i] = $(this).val();
        });
    });
}



function renderTourPackage(tourPackageList, tourPeriod) {
    var obj = tourPackageList;
    if (obj != '') {
        var divs = "";
        $("#card_area").empty();
        $.each(obj, function (key, val) {
            var div = '<div class="col-sm-6 col-md-4" align="center">';
            div = div + '<div class="thumbnail">';
            div = div + '<a href="/tour-detail">';
            div = div + '<div class="tour-cover lazyloaded" data-bg="../images/tour/' + val['tour_package_image'] + '" style="background-image: url(&quot;../images/tour/' + val['tour_package_image'] + '&quot;);">';
            div = div + '<div class="tour-footer">';
            div = div + '<div class="pull-left">';
            div = div + '<span class="flag">';
            div = div + '<img width="70%" alt="" src="https://d4ulp9jtgcw4i.cloudfront.net/assets/countries/Vietnam/flag-9fb374d4ac69e1ef0f871250a59f1077.png">';
            div = div + '</span>';
            div = div + '</div>';
            div = div + '</div>';
            div = div + '<div class="tour-header">';
            div = div + '<div class="pull-right">';
            div = div + '<span class="days">' + val['tour_period_day_number'] + ' วัน ' + val['tour_period_night_number'] + ' คืน</span>';
            div = div + '</div>';
            div = div + '<span class="clear"></span>';
            div = div + '</div>';
            div = div + '</div>';
            div = div + '</a>';
            div = div + '<div class="caption">';
            div = div + '<div class="tabbable">';
            div = div + '<div class="tab-content">';
            div = div + '<div id="tab' + val['tour_package_id'] + '1" class="tab-pane active">';
            div = div + '<div class="card-detail">' + val['tour_package_detail'] + '</div>';
            div = div + '<hr>';
            div = div + '<div class="card-time"><i class="fas fa-calendar-alt"></i>&nbsp;ช่วงเวลา ' + 'period' + '</div>';
            div = div + '<hr>';
            $.each(tourPeriod, function (keyPrice, valPrice) {
                if (valPrice['tour_package_id'] === val['tour_package_id']) {
                    div = div + '<div class="card-price">ราคา ' + tourPeriod[keyPrice].tour_period_adult_price + ' บาท</div>';
                    return false;
                }
            });
            div = div + '<hr>';
            div = div + '<div class="button-card">';
            div = div + '<a href="' + 'pdf' + '" class="btn btn-pdf"><i class="fas fa-cloud-download-alt"></i>&nbsp;PDF</a>';
            div = div + '<a href="tour-detail?package=' + val['tour_package_detail_id'] + '" class="btn btn-pdf">ดูรายละเอียด</a>';
            div = div + '</div>';
            div = div + '</div>';
            div = div + '<div id="tab' + val['tour_package_id'] + '2" class="tab-pane">';
            div = div + '<div class="card-highlight">' + val['tour_package_highlight'] + '</div>';
            div = div + '</div>'
            div = div + '<div id="tab' + val['tour_package_id'] + '3" class="tab-pane">';
            div = div + '<div class="card-period">'
            div = div + '<table class="table table-bordered">';
            div = div + '<tr class="info"><th style="text-align:center">ช่วงเวลา</th><th style="text-align:center">ราคา</th></tr>'
            $.each(tourPeriod, function (keyPrice, valPrice) {
                if (valPrice['tour_package_id'] === val['tour_package_id']) {
                    var as = valPrice["tour_period_start"].split("-");
                    var ae = valPrice["tour_period_end"].split("-");
                    var ae2 = ae[2].split(' ');
                    var as2 = as[2].split(' ');
                    var date = as2[0] + " " + setCTMonthString(as[1]) + " - " + ae2[0] + " " + setCTMonthString(ae[1]) + " " + ae[0];
                    
                    div = div + '<tr><td>' + date + '</td>';
                    div = div + '<td>' + valPrice['tour_period_adult_price'] + '</td></tr>';
                }
            });
            div = div + '</table>';
            div = div + '</div>';
            div = div + '</div>';
            div = div + '</div>';
            div = div + '<ul class="nav nav-tabs">';
            div = div + '<li class="active"><a href="#tab' + val['tour_package_id'] + '1" data-toggle="tab" class="active">แพ็คเกจ</a></li>';
            div = div + '<li><a href="#tab' + val['tour_package_id'] + '2" data-toggle="tab">ดีเทล</a></li>';
            div = div + '<li><a href="#tab' + val['tour_package_id'] + '3" data-toggle="tab">ช่วงเวลา</a></li>';
            div = div + '</ul>';
            div = div + '</div>';
            div = div + '</div>';
            div = div + '</div>';
            div = div + '</div>';
            divs = divs + div;
        });
        $('#card_area').html(divs);
    }
}                       