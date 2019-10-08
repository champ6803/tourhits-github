$(function () {
    $('#blog_manage').addClass("active");
    $('#article_manage').addClass("active");
    
    var article_id = getUrlParameter('article_id');
    getArticle(article_id);
});


function getArticle(article_id) {
    if (article_id) {
        $.ajax({
            type: 'post',
            url: 'getArticleById',
            async: false,
            data: {'article_id': article_id},
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                if (data) {
                    initArticle(data[0]);
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

function initArticle(data) {
    $('#article_id').val(data.article_id);
    $('#article_title').val(data.article_title);
    $('#article_detail_name').val(data.article_detail_name);
    $('#article_short_detail').val(data.article_short_detail);

    var src = "images/article-img/" + data.article_image;
    $("#file_show").attr("src", src);
    $("#file_show").removeClass('hide');
}