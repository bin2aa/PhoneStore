$(document).ready(function () {
    // Tìm kiếm sản phẩm
    $('form').submit(function (event) {
        if ($(this).hasClass('search-form')) {
            event.preventDefault();
            var keyword = $('#search').val();
            $.ajax({
                url: 'index.php?ctrl=productController&action=searchProducts&search=' + keyword,
                method: 'GET',
                success: function (data) {
                    $('table').html($(data).find('table').html());
                }
            });
        }
    });

    // Chuyển sang form cập nhật sản phẩm
    $('a.updateProducts-form').click(function (event) {
        //productView.php
        event.preventDefault(); // Ngăn chặn hành động mặc định của liên kết
        var updateUrl = $(this).attr('href');
        $.ajax({
            url: updateUrl, // Sử dụng đường dẫn đã lấy
            method: 'GET',
            success: function (response) {
                $('body').html(response);
            }
        });
    });


    // Cập nhật sản phẩm
    $('form').submit(function (event) {
        if ($(this).hasClass('update-product-btn')) {
            event.preventDefault();
            var formData = new FormData($(this)[0]);
            $.ajax({
                url: 'index.php?ctrl=productController&action=updateProduct',
                method: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    console.log(response);
                    alert('Cập nhật sản phẩm thành công!');

                },
                error: function () {
                    console.error('Có lỗi khi gửi yêu cầu AJAX.');
                    alert('Có lỗi khi cập nhật sản phẩm.');
                }
            });
        }
    });

    //Xóa sản phẩm
    $('a.deleteProducts-form').click(function (event) {
        event.preventDefault();
        var deleteUrl = $(this).attr('href');
        $.ajax({
            url: deleteUrl, // Sử dụng đường dẫn đã lấy
            method: 'GET',
            success: function (response) {
                console.log(response);
                alert('Sản phẩm đã được xóa thành công!');
                location.reload();
            }
        });
    });


    // $(document).ready(function () {
    //     $('form').submit(function (event) {
    //         event.preventDefault();
    //         var orderId = $(this).find('input[name="orderId"]').val();
    //         $.ajax({
    //             url: 'index.php?ctrl=orderController&action=toggleOrderStatus',
    //             type: 'POST',
    //             data: { orderId: orderId },
    //             success: function (data) {
    //                 var button = $('input[name="orderId"][value="' + orderId + '"]').siblings('button');
    //                 button.text((button.text() === 'Chờ xác nhận') ? 'Xác nhận' : 'Chờ xác nhận');
    //             },
    //             error: function (xhr, status, error) {
    //                 console.error('Đã có lỗi khi gửi yêu cầu.');
    //             }
    //         });
    //     });
    // });




});
