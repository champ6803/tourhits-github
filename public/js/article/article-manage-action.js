// override options
//var wysiwygOptions = {
//  customTemplates: {
//    image: function(locale) {
//      return "<li>" +
//        "<div class='bootstrap-wysihtml5-insert-image-modal modal hide fade'>" +
//        "<div class='modal-header'>" +
//        "<a class='close' data-dismiss='modal'>&times;</a>" +
//        "<h3>" + locale.image.insert + "</h3>" +
//        "</div>" +
//        "<div class='modal-body'>" +
//        "<div class='chooser_wrapper'>" +
//        "<table class='image_chooser images'></table>" +
//        "</div>" +
//        "</div>" +
//        "<div class='modal-footer'>" +
//        "<a href='#' class='btn' data-dismiss='modal'>" + locale.image.cancel + "</a>" +
//        "</div>" +
//        "</div>" +
//        "<a class='btn' data-wysihtml5-command='insertImage' title='" + locale.image.insert + "'><i class='icon-picture'></i></a>" +
//        "</li>";
//    }
//  }
//};

$(function () {
    $('#blog_manage').addClass("active");
    $('#article_manage').addClass("active");
    
//    $('textarea.wysiwyg').each(function() {
//        $(this).wysihtml5($.extend(wysiwygOptions, {html:true, color:false}));
//    });

    //$('textarea').wysihtml5($.extend(wysiwygOptions, {html:true, color:false}));

    //$('textarea').wysihtml5();
    //$('textarea').wysihtml5($.extend(wysiwygOptions, {html: true, color: false}));

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