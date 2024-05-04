$(document).ready(function () {
    // ------------------------------------------- phân trang
    $('.paginationProduct').on('click', 'a', function (e) {
        e.preventDefault();

        var page = $(this).attr('page');

        $.ajax({
            url: 'index.php?ctrl=productControllerUser&page=' + page,
            type: 'GET',
            success: function (response) {
                $('.paginationProduct').html($(response).find('.paginationProduct').html());
                $('.product-list').html($(response).find('.product-list').html());


                // Cuộn trang đến vị trí của phân trang
                // $('html, body').animate({
                //     scrollTop: $('.paginationProduct').offset().top
                // }, 1);

            },
            error: function (xhr, status, error) {
                console.error('Lỗiiiiiiiiiiiiii:', error);
            }
        });
    });



    //------------------------------------- lọc sản phẩm theo giá

    $(function () {
        var minPrice = 1; // Giá nhỏ nhất
        var maxPrice = maxPriceFromPHP; // Giá trị lớn nhất

        $("#price_slider").slider({
            range: true,
            min: minPrice,
            max: maxPrice,
            values: [minPrice, maxPrice],
            slide: function (event, ui) {
                $("#price_min_value").text(ui.values[0]);
                $("#price_max_value").text(ui.values[1]);
            },
            // Sự kiện dừng kéo slider
            stop: function (event, ui) {
                // Gọi hàm ajax khi dừng kéo thanh slider
                filterProducts(ui.values[0], ui.values[1]);
            }
        });

        $("#price_min_value").text($("#price_slider").slider("values", 0));
        $("#price_max_value").text($("#price_slider").slider("values", 1));
    });

    function filterProducts(minPrice, maxPrice) {
        $.ajax({
            url: 'index.php?ctrl=productControllerUser', // Đường dẫn tới file xử lý ajax
            type: 'GET',
            data: {
                price_min: minPrice,
                price_max: maxPrice
            },
            success: function (response) {

                console.log(response);
                // Hiển thị danh sách sản phẩm đã lọc
                // $('#product-list').html(response);

                $('#product-list').html($(response).find('.product-list').html());
                $('.pagination').html($(response).find('.pagination').html());
            },
            error: function (xhr, status, error) {
                // Xử lý lỗi nếu có
                console.error(xhr.responseText);
            }
        });
    }


    // ------------------------------------------- thêm sản phẩm vào giỏ hàng
    // $('.buy-button').on('click', function (e) {
    //     e.preventDefault();
    //     var productId = $(this).data('product-id'); // Lấy id của sản phẩm từ thuộc tính data-product-id
    //     var quantity = 1; // Số lượng sản phẩm cần thêm vào giỏ hàng
    //     var data = {
    //         cart_id: productId,
    //         quantity: quantity
    //     };
    //     $('#notification').show();
    //     $('#notification-text').text('');
    //     $.ajax({
    //         url: 'index.php?ctrl=cartController&action=addToCart' + '&cart_id=' + productId + '&quantity=' + quantity,
    //         type: 'POST',
    //         data: data,
    //         success: function (response) {
    //             $('#notification-text').text('Sản phẩm đã được thêm vào giỏ hàng thành công!');
    //             setTimeout(function () {
    //                 $('#notification').slideUp();
    //             }, 800);
    //         },
    //         error: function () {
    //             alert('Đã xảy ra lỗi khi thêm sản phẩm vào giỏ hàng.');
    //         }
    //     });
    // });
});