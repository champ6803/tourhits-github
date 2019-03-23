$(function () {
    $('#blog_manage').addClass("active");
    $('#country_article_manage').addClass("active");

    createTable("");

    $('#countryArticleTable').DataTable();
});

function country_article_detail_view(country_article_id) {
    if (country_article_id) {
        window.location.href = "country-article-manage-action?country_article_id=" + country_article_id;
    }
}

function createTable(param) {
    $.ajax({
        type: 'post',
        url: 'searchCountryArticle',
        async: false,
        data: {'country_article_name': param},
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            if (data != null) {
                var html = '';
                $.each(data, function (key, val) {
                    html = html + '<tr>';
                    html = html + '<td>' + (key + 1) + '</td>';
                    html = html + '<td>' + this.country_article_name + '</td>';
                    html = html + '<td>' + this.tour_country_name + '</td>';
                    html = html + '<td>' + this.created_by + '</td>';
                    html = html + '<td>' + this.created_at + '</td>';
                    html = html + '<td><button type="button" class="btn btn-primary" onclick="country_article_detail_view(' + this.country_article_id + ')">\n\
                    <span class="glyphicon glyphicon-pencil"></span>&nbsp;แก้ไข</button></td>';
                    html = html + '<td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#removeModal" onclick="removeCountryArticle(' + this.country_article_id + ')">\n\
                    <span class="glyphicon glyphicon-minus"></span>&nbsp;ลบ</button></td>';
                    html = html + '</tr>';
                });
                $('#countryArticleData').html(html);
            } else {
                alert('select fail');
            }
        },
        error: function (data) {
            alert('error');
        }
    });
}

function removeCountryArticle(id) {
    $('#hidden_remove_id').val(id);
}

function deleteCountryArticle() {
    var id = $('#hidden_remove_id').val();
    $.ajax({
        type: 'post',
        url: 'removeCountryArticle',
        async: false,
        data: {'id': id},
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            if (data == "success") {
                alert('ลบข้อมูลเสร็จสมบูรณ์');
                document.getElementById("deleteClose").click();
                location.reload();
            } else {
                alert('ผิดพลาด');
            }
        },
        error: function (data) {
            alert('error');
        }
    });
}