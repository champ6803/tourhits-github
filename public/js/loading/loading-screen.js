$(function () {
    var page = getUrlParameter('page');
    setInterval(function () {
        if (page == "register") {
            window.location.href = "/";
        }
        else{
            window.location.href = "/";
//            history.go(-2);
        }
    }, 5000);
});