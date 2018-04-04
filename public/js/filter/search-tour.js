$(function () {
    $("#price").slider({});
    $("#price").on("slide", function (slideEvt) {
        var test = slideEvt;
        $("#price_from").text(slideEvt.value[0]);
        $("#price_to").text(slideEvt.value[1]);
    });
    expandCheckboxRoute();
    expandCheckboxAirline();
    expandCheckboxHoliday();
});

var slider = new Slider('#price', {});
slider.on("slide", function (sliderValue) {
    document.getElementById("price_from").textContent = sliderValue[0];
    document.getElementById("price_to").textContent = sliderValue[1];
});

function expandCheckboxRoute() {
    var size_li = $("#filter-route .option").size();
    var x = 5;
    if (size_li < 5) {
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
    if (size_li < 5) {
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
    if (size_li < 5) {
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