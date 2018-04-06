$(function () {
    $("#price").slider({});
    $("#price").on("slide", function (slideEvt) {
        $("#price_from").text(slideEvt.value[0]);
        $("#price_to").text(slideEvt.value[1]);
    });
    expandCheckboxRoute();
    expandCheckboxAirline();
    expandCheckboxHoliday();

    $('#card_area').pageMe({pagerSelector: '#search_tour_pager', showPrevNext: true, hidePageNumbers: false, perPage: 9});

    //getTourPackage("", "", "", "", "", "", "", "", "");

    $("#test").click(function () {
        getTourPackage("ญี่ปุ่น", "", "", "", "", "", "", "", "");
    });
    getDistrict(1);
});

var slider = new Slider('#price', {});
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

function getTourPackage(country, route, start_date, end_date, month, days, airline, tags, attraction) {
    var tour_package = "";
    if (country != "" && country != null) {
        // check null
        route = null ? "" : route;
        start_date = null ? "" : start_date;
        end_date = null ? "" : end_date;
        month = null ? "" : month;
        days = null ? "" : days;
        airline = null ? "" : days;
        tags = null ? "" : tags;
        attraction = null ? "" : attraction;

        $.ajax({
            type: 'post',
            url: 'getTourPackage',
            async: false,
            data: {
                'country': country
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                if (data != null) {
                    tour_package = data;
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

    return tour_package;
}

function getDistrict(province_id) {
    var district = '';
    //var province_id = $('#province').val();
    $.ajax({
        type: 'post',
        url: 'getDistrict',
        async: false,
        data: {
            'province_id': province_id
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            if (data != null) {
                district = data;
            } else {
                alert('select fail');
            }
        },
        error: function (data) {
            alert('error');
        }
    });
    return district;
}