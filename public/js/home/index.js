$(function () {
    $('#home').addClass('menu-active');
    renderTourPackage(tourHitsPackageActiveList, tourHitPeriodActive, "card_area_hit");
    renderTourPackage(tourSalesPackageActiveList, tourSalesPeriodActive, "card_area_sale");
});

//var start_date = getDateNow();
//var end_date = getDateNow();



function renderTourPackage(tourPackageList, tourPeriod, selection) {
    var obj = tourPackageList;
    if (obj != '') {
        var divs = "";
        $('#' + selection).empty();
        $.each(obj, function (key, val) {
            var div = '<div class="col-sm-6 col-md-6 col-lg-3" align="center">';
            div = div + '<div class="thumbnail card--content">';
            div = div + '<a href="/tour-detail/' + val['tour_country_url'] + '/' + val['tour_package_id'] + '/' + val['tour_package_code'] + '">';
            div = div + '<div class="tour-cover lazyloaded" data-bg="' + rootPath + '/tour/' + val['tour_package_image'] + '" style="background-image: url(&quot;' + rootPath + '/tour/' + val['tour_package_image'] + '&quot;);">';
            div = div + '<div class="tour-footer">';
            div = div + '<div class="pull-left">';
            div = div + '<span class="flag">';
            div = div + '<img class="flag-small" alt="" src="' + rootPath + '/fg/' + this.country_code.toLowerCase() + '.png">';
            div = div + '</span>';
            div = div + '</div>';
            div = div + '</div>';
            div = div + '<div class="tour-header">';
            div = div + '<div class="pull-right">';
            div = div + '<span class="days">' + val['tour_period_day_number'] + ' วัน ' + val['tour_period_night_number'] + ' คืน</span>';
            div = div + '</div>';
            div = div + '<span class="clear"></span>';
            div = div + '</div>';
            div = div + '<div class="tour-bottom-right">';
            div = div + '<div class="pull-right">';
            var tour_code = val['tour_package_id'];
//            while (tour_code.length != 4)
//            {
//                tour_code = '0' + tour_code;
//            }

            div = div + '<span class="tag">TH' + tour_code + '</span>';
            div = div + '</div>';
            div = div + '<span class="clear"></span>';
            div = div + '</div>';
            div = div + '</div>';
            div = div + '</a>';
            div = div + '<div class="caption">';
            div = div + '<div class="tabbable">';
            div = div + '<div class="tab-content">';
            div = div + '<div id="tab' + val['tour_package_id'] + '1" class="tab-pane active">';
            //div = div + '<div class="card-detail">' + val['tour_package_detail'] + '</div>';
            div = div + '<div class="card-detail">'
            div = div + '<div class="country-name">' + this.tour_country_name + '</div>'
            div = div + '<div class="city">' + this.tour_package_name + '</div>';
            div = div + '<div class="hilight"><i class="fa fa-flag"></i><div class="detail">' + this.tour_package_detail + '</div></div>';
            div = div + '</div>';

            div = div + '<hr>';
            var all_as = val["tour_package_period_start"].split("-");
            var all_ae = val["tour_package_period_end"].split("-");
            div = div + '<div class="card-time"><i class="far fa-calendar-check"></i>&nbsp;ช่วงเวลา ' + setCTMonthString(all_as[1]) + ' - ' + setCTMonthString(all_ae[1]) + '</div>';
            div = div + '<hr>';
            div = div + '<div class="bar-bottom-card">';
            div = div + '<div class="card-airline"><img alt="' + this.airline_name + '" src="' + rootPath + '/airline/' + val['airline_picture'] + '" title="การบินไทย"></div>';
            if (this.tour_package_special_price > 0) {
                div = div + '<div class="card-price-dis"><strike>' + numberWithCommas(this.tour_package_price) + '฿</strike></div>' + '<div class="card-price">' + numberWithCommas(this.tour_package_special_price) + '฿</div>';
            } else {
                div = div + '<div class="card-price-dis"><strike></strike></div>' + '<div class="card-price">' + numberWithCommas(this.tour_package_price) + '฿</div>';
            }
            div = div + '</div>';
            div = div + '</div>';
            div = div + '<div id="tab' + val['tour_package_id'] + '2" class="tab-pane">';
            div = div + '<div class="card-highlight">' + val['tour_package_highlight'] + '</div>';
            div = div + '</div>'
            div = div + '<div id="tab' + val['tour_package_id'] + '3" class="tab-pane">';
            div = div + '<div class="card-period">'
            div = div + '<table class="table table-bordered">';
            div = div + '<tr class="info"><th style="text-align:center">ช่วงเวลา</th><th style="text-align:center">ราคา</th><th style="text-align:center">ราคาพิเศษ</th></tr>'
            $.each(tourPeriod, function (keyPrice, valPrice) {
                if (valPrice['tour_package_id'] === val['tour_package_id']) {
                    var as = valPrice["tour_period_start"].split("-");
                    var ae = valPrice["tour_period_end"].split("-");
                    var ae2 = ae[2].split(' ');
                    var as2 = as[2].split(' ');
                    var date = as2[0] + " " + setCTMonthString(as[1]) + " - " + ae2[0] + " " + setCTMonthString(ae[1]) + " " + ae[0];

                    div = div + '<tr><td>' + date + '</td>';
                    if (this.tour_period_adult_special_price > 0) {
                        div = div + '<td style="text-align:right"><strike>' + numberWithCommas(valPrice['tour_period_adult_price']) + '฿</strike></td>';
                        div = div + '<td style="text-align:right">' + numberWithCommas(valPrice['tour_period_adult_special_price']) + '฿</td></tr>';
                    } else {
                        div = div + '<td style="text-align:right">' + numberWithCommas(valPrice['tour_period_adult_price']) + '฿</td>';
                        div = div + '<td style="text-align:right"> - </td></tr>';
                    }
                }
            });
            div = div + '</table>';
            div = div + '</div>';
            div = div + '</div>';
            div = div + '</div>';
            div = div + '<ul class="nav nav-tabs">';
            div = div + '<li class="active"><a href="#tab' + val['tour_package_id'] + '1" data-toggle="tab" class="active">แพ็คเกจ</a></li>';
            div = div + '<li><a href="#tab' + val['tour_package_id'] + '3" data-toggle="tab">ช่วงเวลา</a></li>';
            div = div + '</ul>';
            div = div + '</div>';
            div = div + '</div>';
            div = div + '</div>';
            div = div + '</div>';
            divs = divs + div;
        });
        $('#' + selection).html(divs);
        $('#search_tour_pager').show();
    } else {
        $('#' + selection).empty();
        var div = "<div class='search-empty' style='color: #c33132;'>Coming Soon <i class='fa fa-plane-departure'></i></div>";
        $('#' + selection).html(div);
        $('#search_tour_pager').hide();
    }
}
