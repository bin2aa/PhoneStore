

// ---------------------------------------------------------------------
$(document).ready(function () {

    //Tăng số lượng sản phẩm trong giỏ hàng
    $(document).on('click', '.add-to-cart', function () {
        var productId = $(this).data('product-id');
        var quantity = 1;
        data = {
            'cart_id': productId,
            'quantity': quantity
        };
        $.ajax({
            url: 'index.php?ctrl=cartController&action=addToCart&cart_id=' + productId + '&quantity=' + quantity,
            type: 'GET',
            data: data,
            success: function (data) {
                // Cập nhật lại phần hiển thị giỏ hàng
                $('.cart-items-form').html($(data).find('.cart-items-form').html());
            }
        });
    });

    //Giảm số lượng sản phẩm trong giỏ hàng
    $(document).on('click', '.decrease', function () {
        var productId = $(this).data('product-id');
        var quantity = -1;
        data = {
            'cart_id': productId,
            'quantity': quantity
        };
        $.ajax({
            url: 'index.php?ctrl=cartController&action=decreaseQuantity&cart_id=' + productId + '&quantity=' + quantity,
            type: 'GET',
            data: data,
            success: function (data) {
                // Cập nhật lại phần hiển thị giỏ hàng
                $('.cart-items-form').html($(data).find('.cart-items-form').html());
            }
        });
    });



    //Xóa sản phẩm khỏi giỏ hàng
    $(document).on('click', 'a.remove-from-cart', function (e) {
        e.preventDefault();
        var url = $(this).attr('href');
        var confirmDelete = confirm('Bạn có chắc chắn muốn xóa sản phẩm này khỏi giỏ hàng?');
        if (confirmDelete) {
            $.ajax({
                url: url,
                type: 'GET',
                success: function (data) {
                    $('.cart-items-form').html($(data).find('.cart-items-form').html());
                }
            });
        }
    });
});