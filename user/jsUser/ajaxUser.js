$(document).ready(function () {
    // // Hàm tăng số lượng sản phẩm
    // function increaseQuantity(productId) {
    //     var quantityElement = $('#quantity_' + productId);
    //     var quantity = parseInt(quantityElement.text());
    //     quantity++;
    //     quantityElement.text(quantity);
    //     updateQuantity(productId, quantity);
    // }

    // // Hàm giảm số lượng sản phẩm
    // function decreaseQuantity(productId) {
    //     var quantityElement = $('#quantity_' + productId);
    //     var quantity = parseInt(quantityElement.text());
    //     if (quantity > 1) {
    //         quantity--;
    //         quantityElement.text(quantity);
    //         updateQuantity(productId, quantity);
    //     }
    // }

    // // Hàm AJAX để cập nhật số lượng sản phẩm
    // function updateQuantity(productId, quantity) {
    //     $.ajax({
    //         url: 'index.php?ctrl=cartController&action=updateQuantity&cart_id=' + productId + '&quantity=' + quantity,
    //         method: 'GET',
    //         success: function (response) {
    //             console.log(response);
    //             // Điều chỉnh giao diện nếu cần thiết
    //         },
    //         error: function () {
    //             console.error('Có lỗi khi gửi yêu cầu AJAX.');
    //             // Xử lý lỗi nếu cần thiết
    //         }
    //     });
    // }

    // // Sự kiện khi click nút '+' 
    // $('body').on('click', '.quantity-buttons button:first-child', function () {
    //     var productId = $(this).closest('.quantity-buttons').data('productId');
    //     increaseQuantity(productId);
    // });

    // // Sự kiện khi click nút '-'
    // $('body').on('click', '.quantity-buttons button:last-child', function () {
    //     var productId = $(this).closest('.quantity-buttons').data('productId');
    //     decreaseQuantity(productId);
    // });



    
});
