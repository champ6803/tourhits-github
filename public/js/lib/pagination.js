$.fn.pageMe = function (opts) {
    var $this = this,
            defaults = {
                perPage: 7,
                showPrevNext: false,
                hidePageNumbers: false
            },
            settings = $.extend(defaults, opts);

    var listElement = $this;
    var perPage = settings.perPage;
    var children = listElement.children();
    var pager = $('.pager');

    if (typeof settings.childSelector != "undefined") {
        children = listElement.find(settings.childSelector);
    }

    if (typeof settings.pagerSelector != "undefined") {
        pager = $(settings.pagerSelector);
    }

    //var numItems = children.size();
    var numItems = settings.totalRecord;
    var numPages = Math.ceil(numItems / perPage);
    var curr = parseInt(settings.pageNum) - 1;
    var pg = curr;
    var last_num = curr + 5;
    pager.data("curr", curr);
    console.log(pager.children());

    if (settings.showPrevNext) {
        $('<li><a href="#" class="prev_link back"><i class="fas fa-chevron-circle-left"></i> หน้าก่อน</a></li>').appendTo(pager);
    }

    while (numPages > pg && (settings.hidePageNumbers == false)) {
        if (pg < last_num) {
            $('<li><a href="javascript:void(0)" class="page_link p">' + (pg + 1) + '</a></li>').appendTo(pager);
        } else if (pg == numPages - 1) {
            $('<li><a href="javascript:void(0)" class="page_link p">' + (pg + 1) + '</a></li>').appendTo(pager);
        } else if (pg == last_num) {
            $('<li><a href="javascript:void(0)">' + " ... " + '</a></li>').appendTo(pager);
        }
        pg++;
    }

//    for (var i = 0; i < numPages; i++) {
//        if (i < last_num) {
//            $('<li><a href="#" class="page_link p">' + (i + 1) + '</a></li>').appendTo(pager);
//        } else if (i == numPages - 1) {
//            $('<li><a href="#" class="page_link p">' + (i + 1) + '</a></li>').appendTo(pager);
//        } else if (i == last_num) {
//            $('<li>' + " ... " + '</li>').appendTo(pager);
//        }
//    }

    if (settings.showPrevNext) {
        $('<li><a href="#" class="next_link next">หน้าถัดไป <i class="fas fa-chevron-circle-right"></i></a></li>').appendTo(pager);
    }

    //pager.find('.page_link:first').addClass('active');
    //pager.find('.prev_link').hide();

//    if (numPages <= 1) {
//        pager.find('.next_link').hide();
//    }
    //pager.children().eq(1).addClass("active");

//    children.hide();
//    children.slice(0, perPage).show();

    pager.find('li .page_link').click(function () {
        var clickedPage = $(this).html().valueOf() - 1;
        goTo(clickedPage, perPage);
        return false;
    });
    pager.find('li .prev_link').click(function () {
        previous();
        return false;
    });
    pager.find('li .next_link').click(function () {
        next();
        return false;
    });

    function previous() {
        var goToPage = parseInt(pager.data("curr")) - 1;
        goTo(goToPage);
    }

    function next() {
        goToPage = parseInt(pager.data("curr")) + 1;
        goTo(goToPage);
    }

    if (curr >= 1) {
        pager.find('.prev_link').show();
    } else {
        pager.find('.prev_link').hide();
    }

    if (curr < (numPages - 1)) {
        pager.find('.next_link').show();
    } else {
        pager.find('.next_link').hide();
    }

    pager.data("curr", curr);
    pager.children().removeClass("active");
    pager.children().eq(1).addClass("active");

    function goTo(page) {
        getTourPackage(parseInt(page) + 1);

    }

//    function goTo(page){
//        var startAt = page * perPage,
//            endOn = startAt + perPage;
//        
//        children.css('display','none').slice(startAt, endOn).show();
//        
//        if (page>=1) {
//            pager.find('.prev_link').show();
//        }
//        else {
//            pager.find('.prev_link').hide();
//        }
//        
//        if (page<(numPages-1)) {
//            pager.find('.next_link').show();
//        }
//        else {
//            pager.find('.next_link').hide();
//        }
//        
//        pager.data("curr",page);
//      	pager.children().removeClass("active");
//        pager.children().eq(page+1).addClass("active");
//    
//    }
};