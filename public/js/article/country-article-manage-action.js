$(function () {
    $('#blog_manage').addClass("active");
    $('#country_article_manage').addClass("active");

    $('textarea').wysihtml5();
    var country_article_id = getUrlParameter('country_article_id');
    getCountryArticle(country_article_id);
});

function getCountryArticle(country_article_id) {
    if (country_article_id) {
        $.ajax({
            type: 'post',
            url: 'getCountryArticleById',
            async: false,
            data: {'country_article_id': country_article_id},
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                if (data) {
                    initCountryArticle(data[0]);
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

function initCountryArticle(data) {
    $('#country_article_id').val(data.country_article_id);
    $('#country_article_name').val(data.country_article_name);
    $('#country_article_detail').val(data.country_article_detail);
    $('#tour_country_id').val(data.tour_country_id);
}