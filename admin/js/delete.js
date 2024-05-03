$(document).ready(function () {

    $('a.deleteProductLink, a.deleteCategoryLink, a.deleteCustomerLink, a.deleteDiscountLink,\
    a.deleteOrderLink, a.deletePermissionLink, a.deleteSupplierLink, a.deleteWarehouseReceiptLink,a.deleteUserLink')
        .click(function (event) {
            event.preventDefault();
            var deleteUrl = $(this).attr('href');
            var userConfirm = confirm('Bạn có chắc chắn muốn xóa không?');
            if (userConfirm) {
                $.ajax({
                    url: deleteUrl, // Sử dụng đường dẫn đã lấy
                    method: 'GET',
                    success: function (response) {
                        location.reload();
                        alert('Sản phẩm đã được xóa thành công!');
                    }
                });
            }
        });

});