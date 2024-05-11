<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>

</head>

<body>
    <div class="CartContent">
        <h1>Giỏ hàng</h1>

        <div class="cart-items-form">
            <a class="deleteAll" href="index.php?ctrl=cartController&action=clearCart" onclick="return confirm('Bạn có chắc chắn muốn xóa toàn bộ giỏ hàng?');">Xóa toàn bộ giỏ hàng</a>
            <?php if (!empty($cartItems)) : ?>
                <?php foreach ($cartItems as $productId => $quantity) : ?>
                    <div class="cart-item" id="cart-item">
                        <div class="item-image">
                            <img src="/image/SanPham/<?php echo $productImages[$productId]; ?>" alt="Hình ảnh sản phẩm" width="100">
                        </div>
                        <div class="item-details">
                            <div class="item-name">Tên sản phẩm: <?php echo $productNames[$productId]; ?></div>
                            <div class="quantity-section">
                                <span>Số lượng:</span>
                                <div class="quantity-buttons">
                                    <!-- <button onclick="decrease(<?php echo $productId; ?>, -1)">-</button> -->
                                    <button class="decrease" data-product-id="<?php echo $productId; ?>">-</button>
                                    <span id="quantity_<?php echo $productId; ?>"><?php echo $quantity; ?></span>
                                    <button class="add-to-cart" data-product-id="<?php echo $productId; ?>">+</button>
                                </div>
                            </div>
                            <span>Giá: <?php echo number_format($productPrices[$productId]); ?>đ</span>
                        </div>
                        <div class="item-total">
                            <span>Tổng tiền: <?php echo number_format($quantity * $productPrices[$productId]); ?>đ</span>
                            <a class='remove-from-cart' href="index.php?ctrl=cartController&action=removeFromCart&cart_id=<?php echo $productId; ?>"><i class="fa fa-trash"></i></a>
                        </div>
                    </div>

                <?php endforeach; ?>
                <!-- Thêm nút button để mua toàn bộ giỏ hàng -->
            <?php else : ?>
                <!-- Hiển thị thông báo khi giỏ hàng trống -->
                <p>Giỏ hàng của bạn đang trống.</p>
            <?php endif; ?>
            <p>Tổng số lượng sản phẩm: <?php echo $totalQuantity; ?></p>
            <p>Thành tiền: <?php echo number_format($totalPrice); ?> đ</p>








            <form id='buyAllForm' class='buyAll' method="post" action="index.php?ctrl=cartController&action=createOrder" onsubmit='return checkLoggedIn()'>
                <?php if (isset($_SESSION['id_khach_hang'])) : ?>
                    <input type="hidden" name="id_khach_hang" value="<?php echo $_SESSION['id_khach_hang']; ?>">
                    <input type="hidden" name="tong_tien" value="<?php echo $totalPrice; ?>">
                <?php endif; ?>



                <!-- -------------------------Chương trình giảm giá--------------------------------- -->
                <h3>Ưu đãi khi mua hàng:</h3>
                <select name="discount_program">
                    <option value="">Chọn chương trình giảm giá</option>
                    <?php foreach ($discountPrograms as $discountProgram) : ?>
                        <option value="<?php echo $discountProgram['id']; ?>">
                            <?php echo $discountProgram['ten']; ?> - Giảm <?php echo $discountProgram['phan_tram_giam_gia']; ?>% cho đơn hàng từ <?php echo number_format($discountProgram['dieu_kien_mua']); ?>đ trở lên
                        </option>
                    <?php endforeach; ?>
                </select><br><br>

                <input type="text" style="width: 30%; height: 50px" name="ghi_chu" placeholder="Ghi chú"><br>
                <button class="buyAllForm" type="submit">Mua</button>
            </form>
            <!-- ------------------------------------------------------------------------------------- -->

            <script>
                function checkLoggedIn() {
                    var isLoggedIn = <?php echo isset($_SESSION['id_khach_hang']) ? 'true' : 'false'; ?>;
                    var totalQuantity = <?php echo $totalQuantity; ?>;
                    var totalProducts = <?php echo $totalProducts; ?>;
                    if (!isLoggedIn) {
                        alert('Vui lòng đăng nhập trước khi mua hàng.');
                        return false;
                    } else if (totalQuantity === 0 || totalProducts === 0) {
                        alert('Giỏ hàng của bạn đang trống. Vui lòng chọn sản phẩm trước khi mua.');
                        return false;
                    }
                    return true;
                }
            </script>
        </div>
    </div>

</body>

<?php
//Lấy thông tin từ session ở cartController (addToCart)

// khởi tạo một mảng trống
$productInfos = array();
foreach ($cartItems as $productId => $quantity) {
    $productInfo = Session::getSessionValue('product_' . $productId);
    $productInfos[$productId] = $productInfo;
}
?>


</html>

<script>
    $(document).ready(function() {
        $(document).on('submit', '#buyAllForm', function(e) {
            e.preventDefault();
            var id_khach_hang = $('input[name="id_khach_hang"]').val();
            var tong_tien = $('input[name="tong_tien"]').val();
            var ghi_chu = $('input[name="ghi_chu"]').val();
            var discount_program = $('select[name="discount_program"]').val();
            var products = <?php echo json_encode(array_column($productInfos, 'ten')); ?>;
            var availableProducts = <?php echo json_encode(array_column($productInfos, 'so_luong')); ?>;

            data = {
                id_khach_hang: id_khach_hang,
                tong_tien: tong_tien,
                ghi_chu: ghi_chu,
                discount_program: discount_program,
                products: products,
                availableProducts: availableProducts
            }

            $.ajax({
                url: 'index.php?ctrl=cartController&action=createOrder',
                type: 'POST',
                data: data,
                success: function(response) {
                    console.log(response);
                    alert("Tạo đơn hàng thành công");
                    $('.cart-items-form').html($(response).find('.cart-items-form').html());
                    location.reload();
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    if (jqXHR.status == 400) {
                        alert("Không đạt điều kiện để áp dụng giảm giá");
                    } else if (jqXHR.status == 401) {
                        alert(products + " chỉ còn " + availableProducts + " sản phẩm trong kho. Vui lòng giảm số lượng sản phẩm trong giỏ hàng.");
                    } else {
                        alert('Có lỗi xảy ra');
                    }
                }
            });
        });
    });
</script>