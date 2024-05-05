
$(document).ready(function () {
    $('.edit-form form').on('submit', function (e) {
        e.preventDefault();
        var url = $(this).attr('action');
        var data = $(this).serialize();
        $.ajax({

            url: url,
            type: 'POST',
            data: data,
            success: function (response) {
                var emailErrorMatch = response.match(/email_exists/);
                if (emailErrorMatch) {
                    alert('Email đã được sử dụng');
                } else {
                    alert('Thành công');
                }
                location.reload();
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
                // Hiển thị thông báo lỗi cho người dùng
                alert('Có lỗi xảy ra. Vui lòng thử lại sau.');
            }
        });
    });


    $(document).on('click', '.paginationOrderList a', function (e) {
        e.preventDefault();
        var url = $(this).attr('href');
        $.ajax({
            url: url,
            type: 'GET',
            success: function (response) {
                $('.customer-info').html($(response).find('.customer-info').html());
                $('.paginationOrderList').html($(response).find('.paginationOrderList').html());
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }
    );


});

