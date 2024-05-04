$(document).ready(function () {

    // Sự kiện khi click vào phân trang
    $('.comment-section').on('click', '.paginationComment a', function (e) {
        e.preventDefault();

        var page = $(this).data('page'); // Sử dụng .data() để lấy giá trị từ thuộc tính data-page
        // var product_id = <?php echo $product['id']; ?>; chuyển qua product_detail.php

        $.ajax({
            url: 'index.php?ctrl=productControllerUser&action=detail&id=' + product_id + '&page=' + page,
            type: 'GET',
            success: function (response) {
                $('.paginationComment').html($(response).find('.paginationComment').html());
                $('.comment-section').html($(response).find('.comment-section').html());

                console.log(response);

                // Cuộn trang đến vị trí của phân trang
                // $('html, body').animate({
                //     scrollTop: $('.paginationComment').offset().top
                // }, 1);
            },
            error: function (xhr, status, error) {
                console.error('Lỗi:', error);
            }
        });
    });


    // Sự kiện khi submit form thêm bình luận
    $('form.addComment').on('submit', function (e) {
        e.preventDefault();

        if (!$('[name="id_khach_hang"]').val()) {
            alert('Vui lòng đăng nhập để bình luận.');
            return;
        }

        var formData = $(this).serialize();
        $.ajax({
            url: 'index.php?ctrl=commentController&action=addComment',
            method: 'POST',
            data: formData,
            success: function (response) {
                console.log(response);
                alert('Bình luận của bạn đã được gửi thành công.');
                location.reload();
            }
        });
    });

    //sự kiện khi click vào nút xóa bình luận
    $('form.deleteComment').on('submit', function (e) {
        e.preventDefault();
        var comment_id = $(this).attr('id');
        if (!confirm('Bạn có chắc chắn muốn xóa bình luận này không?')) {
            return;
        }
        $.ajax({
            url: 'index.php?ctrl=commentController&action=deleteComment&id=' + comment_id,
            method: 'post',
            success: function (response) {
                console.log(response);
                // alert('Bình luận đã được xóa thành công.');
                $('#comment-' + comment_id).remove(); // Xóa phần tử bình luận
                location.reload();
            }
        });
    });
});