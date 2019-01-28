$(function () {
    $('#blog_manage').addClass("active");
    $('#article_manage').addClass("active");

    $('#tour_country_select').select2({width: '100%', dropdownParent: $("#addTourCategoryModal")});
    $('#tour_package_select').select2({width: '100%', dropdownParent: $("#addTourCategoryModal")});
    $('#category_select').select2({width: '100%', dropdownParent: $("#addTourCategoryModal")});
    $('#edit_tour_country_select').select2({width: '100%', dropdownParent: $("#editTourCategoryModal")});
    $('#edit_tour_package_select').select2({width: '100%', dropdownParent: $("#editTourCategoryModal")});
    $('#edit_category_select').select2({width: '100%', dropdownParent: $("#editTourCategoryModal")});

    $('#addTourCategoryBtn').click(function () {
        $('#addTourCategoryModal').modal();
        createTourCountryDropDown("tour_country_select");
    });

    $('#tour_country_select').on('select2:select', function (e) {
        var tour_country_id = e.params.data.id;
        createTourPackegeByTourCountryIdDropDown("tour_package_select", tour_country_id);
    });

    $('#category_type_select').change(function () {
        createCategoryDropDown("category_select", this.value);
    });

    $('#edit_tour_country_select').on('select2:select', function (e) {
        var tour_country_id = e.params.data.id;
        createTourPackegeByTourCountryIdDropDown("edit_tour_package_select", tour_country_id);
    });

    $('#edit_category_type_select').change(function () {
        createCategoryDropDown("edit_category_select", this.value);
    });

    $('#searchButton').click(function () {
        var search_tour_category_name = $('#search_tour_category_id').val();
        createTable(search_tour_category_name);
    });

    $('#clearButton').click(function () {
        $('#search_tour_category_id').val("");
        createTable("");
    });

    createTable("");

    $('#articleTable').DataTable();
});

function article_detail_view(article_id) {
    if (article_id) {
        window.location.href = "article-manage-action?article_id=" + article_id;
    }
}

function createTable(param) {
    $.ajax({
        type: 'post',
        url: 'searchArticle',
        async: false,
        data: {'article_title': param},
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            if (data != null) {
                var html = '';
                $.each(data, function (key, val) {
                    html = html + '<tr>';
                    html = html + '<td>' + (key + 1) + '</td>';
                    html = html + '<td>' + this.article_title + '</td>';
                    //html = html + '<td class="overflow"  style="width:40%">' + this.article_detail_name + '</td>';
                    html = html + '<td> <img src="images/article-img/' + this.article_image + '" style="height:40px;"></td>';
                    html = html + '<td>' + this.created_by + '</td>';
                    html = html + '<td>' + this.created_date + '</td>';
                    html = html + '<td><button type="button" class="btn btn-primary" onclick="article_detail_view(' + this.article_id + ')">\n\
                    <span class="glyphicon glyphicon-pencil"></span>&nbsp;แก้ไข</button></td>';
                    html = html + '<td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#removeModal" onclick="removeArticle(' + this.article_id + ')">\n\
                    <span class="glyphicon glyphicon-minus"></span>&nbsp;ลบ</button></td>';
                    html = html + '</tr>';
                });
                $('#articleData').html(html);
            } else {
                alert('select fail');
            }
        },
        error: function (data) {
            alert('error');
        }
    });
}

function createTourCountryDropDown(selector) {
    $('#' + selector).html($('<option></option>').val("").html("-- กรุณาเลือก --"));
    $.ajax({
        type: 'post',
        url: 'searchAllTourCountry',
        async: false,
        data: null,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            if (data != null) {
                $.each(data, function () {
                    $('#' + selector).append($('<option></option>').val(this.tour_country_id).html(this.tour_country_name));
                });
            } else {
                alert('select fail');
            }
        },
        error: function (data) {
            alert('error');
        }
    });
}

function createTourPackegeByTourCountryIdDropDown(selector, $tour_country_id) {
    $('#' + selector).empty();
    $('#' + selector).append($('<option></option>').val("").html("-- กรุณาเลือก --"));
    $.ajax({
        type: 'post',
        url: 'searchTourPackegeByTourCountryId',
        async: false,
        data: {'tour_country_id': $tour_country_id},
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            if (data != null) {
                $.each(data, function () {
                    $('#' + selector).append($('<option></option>').val(this.tour_package_id).html(this.tour_package_name));
                });
            } else {
                alert('select fail');
            }
        },
        error: function (data) {
            alert('error');
        }
    });
}

function createCategoryDropDown(selector, $category_type) {
    $('#' + selector).empty();
    $('#' + selector).append($('<option></option>').val("").html("-- กรุณาเลือก --"));
    $.ajax({
        type: 'post',
        url: 'searchCategoryByCategoryType',
        async: false,
        data: {'category_type': $category_type},
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            if (data) {
                $.each(data, function () {
                    $('#' + selector).append($('<option></option>').val(this.category_id).html(this.category_name));
                });
            } else {
                alert('select fail');
            }
        },
        error: function (data) {
            alert('error');
        }
    });
}

function editTourCategory(tour_category_id, tour_country_id, tour_package_id, category_type, category_id) {
    createTourCountryDropDown("edit_tour_country_select");
    createTourPackegeByTourCountryIdDropDown("edit_tour_package_select", tour_country_id);
    createCategoryDropDown("edit_category_select", category_type);
    $('#edit_tour_category_id').val(tour_category_id);
    $('#edit_tour_country_select').val(tour_country_id);
    $('#edit_tour_package_select').val(tour_package_id);
    $('#edit_category_type_select').val(category_type);
    $('#edit_category_select').val(category_id);
    // $('#editModal').modal('hide'); 
}

function removeArticle(id) {
    $('#hidden_remove_id').val(id);
}

function deleteArticle() {
    var id = $('#hidden_remove_id').val();
    $.ajax({
        type: 'post',
        url: 'removeArticle',
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