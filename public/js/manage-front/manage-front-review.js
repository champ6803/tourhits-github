$(function () {
    //getReview()
});
function getReview() {
        $.ajax({
        type: 'post',
        url: 'searchReview',
        async: false,
        data: {'input_airline_name': null},
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            alert(data.review_img_1)
            if (data != null) {
                    image = document.getElementById('img1');
                    image.src = 'images/review/'+data.review_img_1;
            } else {
                alert('select fail');
            }
        },
        error: function (data) {
            alert('error');
        }
    });
}