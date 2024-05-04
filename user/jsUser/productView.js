$(document).ready(function () {

    //Tìm kiếm sản phẩm
    $("form.search-form-productUser").submit(function (event) {
        event.preventDefault();
        var keyword = $('#search').val();
        var url = 'index.php?ctrl=productControllerUser&search=' + keyword; // Định nghĩa biến url ở đây
        $.ajax({
            url: url,
            method: 'GET',
            success: function (data) {
                $('#product-list').html($(data).find('.product-list').html());
                $('.paginationProduct').html($(data).find('.paginationProduct').html());
                history.pushState({}, '', url);
            }
        });
    });

    $(".price-MintoMaxlink form").submit(function (event) {
        event.preventDefault();
        var priceMin = $('#price_min').val();
        var priceMax = $('#price_max').val();
        var url = 'index.php?ctrl=productControllerUser&price_min=' + priceMin + '&price_max=' + priceMax;

        $.ajax({
            url: url, // Sử dụng URL hoàn chỉnh
            method: 'GET',
            success: function (data) {
                $('#product-list').html($(data).find('.product-list').html());
                $('.paginationProduct').html($(data).find('.paginationProduct').html());
                history.pushState({}, '', url); // Thay đổi lịch sử trình duyệt mà không làm thay đổi URL
            },
            error: function (xhr, status, error) {
                console.error('Lỗi:', error);
            }
        });
    });


    $(".sortAscOrDesc form").submit(function (event) {
        event.preventDefault();

        var action = $(this).find('select[name="action"]').val();
        url = 'index.php?ctrl=productControllerUser&action=' + action;
        $.ajax({
            url: url,
            method: 'GET',
            success: function (data) {
                $('#product-list').html($(data).find('.product-list').html());
                $('.paginationProduct').html($(data).find('.paginationProduct').html());

                history.pushState({}, '', url);
            }
        });
    });


    //Danh mục sản phẩm
    $(document).on('click', '.category-link', function (e) {
        e.preventDefault();
        var url = $(this).attr('href');
        $.ajax({
            url: url,
            type: 'GET',
            success: function (response) {
                $('.product-list').html($(response).find('.product-list').html());
                $('.paginationProduct').html($(response).find('.paginationProduct').html());
                // Thay đổi lịch sử trình duyệt mà không làm thay đổi URL
                history.pushState({}, '', url);
            },
            error: function (xhr, status, error) {
                console.error('Lỗi:', error);
            }
        });
    });

    // ------------------------------------------- phân trang
    $(document).on('click', '.paginationProduct a', function (e) {
        e.preventDefault();
        var page = $(this).data('page');
        var url = 'index.php?ctrl=productControllerUser&page=' + page;

        // Lấy giá trị của tham số filter từ URL hiện tại
        var filterParam = new URLSearchParams(window.location.search).get('filter');
        var categoryParam = new URLSearchParams(window.location.search).get('id');
        var priceMinParam = new URLSearchParams(window.location.search).get('price_min');
        var priceMaxParam = new URLSearchParams(window.location.search).get('price_max')
        var searchParam = new URLSearchParams(window.location.search).get('search');
        var price_slider = new URLSearchParams(window.location.search).get('price_slider');
        //tăng giảm giá
        var actionParam = new URLSearchParams(window.location.search).get('action');


        // Nếu có tham số filter, thêm nó vào URL
        if (filterParam) {
            url += '&filter=' + filterParam;
        }

        // Nếu có tham số id danh mục, thêm nó vào URL
        if (categoryParam) {
            url += '&id=' + categoryParam;
        }

        if (priceMinParam && priceMaxParam) {
            url += '&price_min=' + priceMinParam + '&price_max=' + priceMaxParam;
        }

        if (searchParam) {
            url += '&search=' + searchParam;
        }

        if (price_slider) {
            url += '&price_slider=' + price_slider;
        }

        if (actionParam) {
            url += '&action=' + actionParam;
        }



        $.ajax({
            url: url,
            type: 'GET',
            success: function (response) {
                $('.paginationProduct').html($(response).find('.paginationProduct').html());
                $('.product-list').html($(response).find('.product-list').html());
            },
            error: function (xhr, status, error) {
                console.error('Lỗi:', error);
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
                $('.paginationProduct').html($(response).find('.paginationProduct').html());
            },
            error: function (xhr, status, error) {
                // Xử lý lỗi nếu có
                console.error(xhr.responseText);
            }
        });
    }


});




//---------------------------Hàm thêm sản phẩm bacsic đê dự phòng--------------------------- 
// $(document).ready(function() {
//     // Hiển thị thông báo khi thêm vào giỏ hàng
//     $('.buy-button').on('click', function(e) {
//         e.preventDefault();
//         var productId = $(this).data('product-id'); // Lấy id của sản phẩm từ thuộc tính data-product-id
//         var quantity = 1; // Số lượng sản phẩm cần thêm vào giỏ hàng
//         var data = {
//             cart_id: productId,
//             quantity: quantity
//         };
//         $('#notification').css('display', 'block'); // Hiển thị thông báo bằng css
//         $('#notification-text').text('');
//         $.ajax({
//             url: 'index.php?ctrl=cartController&action=addToCart' + '&cart_id=' + productId + '&quantity=' + quantity,
//             type: 'POST',
//             data: data,
//             success: function(response) {
//                 $('#notification-text').text('Sản phẩm đã được thêm vào giỏ hàng thành công!');
//                 setTimeout(function() {
//                     $('#notification').css('display', 'none'); // Ẩn thông báo bằng css
//                 }, 500);
//             },
//             error: function() {
//                 alert('Đã xảy ra lỗi khi thêm sản phẩm vào giỏ hàng.');
//             }
//         });
//     });
// });
// ---------------------------Thêm sản phẩm ver 2 có thông báo css---------------------------
$(document).ready(function () {
    var notifications = []; // Mảng lưu trữ các thông báo
    var notificationId = 0; // Biến đếm id của thông báo
    var timeoutId; // Biến để lưu ID của setTimeout

    // Hiển thị thông báo khi thêm vào giỏ hàng
    $(document).on('click', '.buy-button', function (e) {
        e.preventDefault();

        // Lấy trạng thái của sản phẩm từ thuộc tính data-product-status
        var productStatus = $(this).data('product-status');

        // Nếu sản phẩm tạm hết hàng, không thực hiện thêm vào giỏ hàng
        if (productStatus === 'out-of-stock') {
            return;
        }

        // Lấy id của sản phẩm từ thuộc tính data-product-id
        var productId = $(this).data('product-id');

        var quantity = 1; // Số lượng sản phẩm cần thêm vào giỏ hàng
        var data = {
            cart_id: productId,
            quantity: quantity
        };

        clearTimeout(timeoutId);
        var newNotification = $('<div id="notification' + notificationId + '" class="notification" style="top: ' + ((notificationId % 5) * 50 + 60) + 'px;"></div>');
        newNotification.html('<span id="notification-text">Sản phẩm đã được thêm vào giỏ hàng thành công!</span><div class="loading-bar"></div>'); // Thêm nội dung thông báo và thanh tiến trình
        notifications.push(newNotification); // Thêm thông báo mới vào mảng
        $('body').append(newNotification); // Hiển thị thông báo mới lên màn hình
        newNotification.addClass('show'); // Thêm lớp CSS .show để hiển thị thông báo

        $.ajax({
            url: 'index.php?ctrl=cartController&action=addToCart' + '&cart_id=' + productId + '&quantity=' + quantity,
            type: 'POST',
            data: data,
            success: function (response) {
                setTimeout(function () {
                    newNotification.removeClass('show'); // Xóa lớp CSS .show để ẩn thông báo
                    var index = notifications.indexOf(newNotification);

                    for (var i = index; i < notifications.length; i++) {
                        var top = parseInt(notifications[i].css('top'));
                        notifications[i].css('top', (top - 100) + 'px');
                    }
                }, 500);
            },
            error: function () {
                alert('Đã xảy ra lỗi khi thêm sản phẩm vào giỏ hàng.');
            }
        });
        timeoutId = setTimeout(function () {
            notificationId = 0; // Reset notificationId về 0
        }, 1000);
        notificationId++; // Tăng biến đếm id của thông báo
    });


});