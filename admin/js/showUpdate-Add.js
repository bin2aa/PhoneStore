$(document).ready(function () {


    // Xử lý sự kiện click vào nút sửa, thêm, chi tiết
    $(document).on('click', "a.updateCategoryLink, a.updateProductLink, a.updateOrderLink, a.updateCustomerLink,\
    a.updateUserLink, a.updateSupplierLink, a.updateWarehouseReceiptLink, a.updateWarrantyLink,\
    a.updatePermissionLink, a.updateDiscountLink,\
    a.addCategoryLink, a.addProductLink, a.addOrderLink, a.addCustomerLink,\
    a.addUserLink, a.addSupplierLink, a.addWareHouseReceiptLink, a.addWarrantyLink,\
    a.addPermissionLink, a.addDiscountLink, a.detailOrderLink, a.detailWarehouseReceiptLink, a.productsByCategoryViewLink",
        function (e) {
            e.preventDefault();
            var href = $(this).attr("href");
            var containerId;
            var contentClass;

            //hasClass kiểm tra xem thẻ a href vừa click có class ... không
            if ($(this).hasClass('updateCategoryLink')) {
                containerId = '#updateCategoryContainer';
                contentClass = '.updateCategory';
            } if ($(this).hasClass('updateProductLink')) {
                containerId = '#updateProductContainer';
                contentClass = '.updateProduct';
            } if ($(this).hasClass('updateOrderLink')) {
                containerId = '#updateOrderContainer';
                contentClass = '.updateOrder';
            } if ($(this).hasClass('updateCustomerLink')) {
                containerId = '#updateCustomerContainer';
                contentClass = '.updateCustomer';
            } if ($(this).hasClass('updateUserLink')) {
                containerId = '#updateUserContainer';
                contentClass = '.updateUser';
            } if ($(this).hasClass('updateSupplierLink')) {
                containerId = '#updateSupplierContainer';
                contentClass = '.updateSupplier';
            } if ($(this).hasClass('updateWarehouseReceiptLink')) {
                containerId = '#updateWarehouseReceiptContainer';
                contentClass = '.updateWarehouseReceipt';
            } if ($(this).hasClass('updateWarrantyLink')) {
                containerId = '#updateWarrantyContainer';
                contentClass = '.updateWarranty';
            } if ($(this).hasClass('updatePermissionLink')) {
                containerId = '#updatePermissionContainer';
                contentClass = '.updatePermission';
            } if ($(this).hasClass('updateDiscountLink')) {
                containerId = '#updateDiscountContainer';
                contentClass = '.updateDiscount';
            } if ($(this).hasClass('addCategoryLink')) {
                containerId = '#addCategoryContainer';
                contentClass = '.addCategory';
            } if ($(this).hasClass('addProductLink')) {
                containerId = '#addProductContainer';
                contentClass = '.addProduct';
            } if ($(this).hasClass('addOrderLink')) {
                containerId = '#addOrderContainer';
                contentClass = '.addOrder';
            } if ($(this).hasClass('addCustomerLink')) {
                containerId = '#addCustomerContainer';
                contentClass = '.addCustomer';
            } if ($(this).hasClass('addUserLink')) {
                containerId = '#addUserContainer';
                contentClass = '.addUser';
            } if ($(this).hasClass('addSupplierLink')) {
                containerId = '#addSupplierContainer';
                contentClass = '.addSupplier';
            } if ($(this).hasClass('addWareHouseReceiptLink')) {
                containerId = '#addWarehouseReceiptContainer';
                contentClass = '.addWareHouseReceipt';
            } if ($(this).hasClass('addWarrantyLink')) {
                containerId = '#addWarrantyContainer';
                contentClass = '.addWarranty';
            } if ($(this).hasClass('addPermissionLink')) {
                containerId = '#addPermissionContainer';
                contentClass = '.addPermission';
            } if ($(this).hasClass('addDiscountLink')) {
                containerId = '#addDiscountContainer';
                contentClass = '.addDiscount';
            } if ($(this).hasClass('detailOrderLink')) {
                containerId = '#detailOrderContainer';
                contentClass = '.detailOrder';
            } if ($(this).hasClass('detailWarehouseReceiptLink')) {
                containerId = '#detailWarehouseReceiptContainer';
                contentClass = '.detailWarehouseReceipt';
            } if ($(this).hasClass('productsByCategoryViewLink')) {
                containerId = '#productsByCategoryViewContainer';
                contentClass = '.productsByCategoryView';
            }


            $.ajax({
                url: href,
                method: "GET",
                success: function (data) {
                    var content = $(data).find(contentClass).html();
                    $(containerId).html(content).show();
                    $(".overlay").show();

                    // $("#closeContainer").click(function () {
                    //     $(containerId).hide();
                    //     $(".overlay").hide();
                    // });
                }
            });
        });


    // Xử lý sự kiện submit form thêm, sửa
    $(document).on('submit', 'form.categorySubmitAdd, form.productSubmitAdd, form.orderSubmitAdd,\
        form.customerSubmitAdd, form.userSubmitAdd, form.supplierSubmitAdd, form.warehouseReceiptSubmitAdd,\
        form.warrantySubmitAdd, form.permissionSubmitAdd, form.discountSubmitAdd, \
        form.categorySubmitUd, form.productSubmitUd, form.orderSubmitUd,\
        form.customerSubmitUd, form.userSubmitUd, form.supplierSubmitUd, form.warehouseReceiptSubmitUd,\
        form.warrantySubmitUd, form.permissionSubmitUd, form.discountSubmitUd ', function (e) {
        e.preventDefault();
        var formData = new FormData(this); // Tạo đối tượng FormData chứa dữ liệu form (Sử dụng cho file ảnh)
        $.ajax({
            url: $(this).attr('action'), // Lấy đường dẫn action của form
            type: $(this).attr('method'), // Lấy phương thức của form (POST)
            data: formData, // Dữ liệu cần gửi
            processData: false, // Không xử lý dữ liệu trước khi gửi  (Sử dụng cho file ảnh)
            contentType: false, // Không thiết lập kiểu dữ liệu nội dung (Sử dụng cho file ảnh)
            success: function (response) {
                // Xử lý phản hồi từ server
                location.reload();
                alert("Thêm thành công");
                // console.log();
            },
            error: function (xhr, status, error) {
                // Xử lý lỗi
                console.error(error);
            }
        });
    });




    $(document).on('click', function (e) {
        if (!$(e.target).closest('#updateCategoryContainer').length &&
            !$(e.target).closest('#updateProductContainer').length &&
            !$(e.target).closest('#updateOrderContainer').length &&
            !$(e.target).closest('#updateCustomerContainer').length &&
            !$(e.target).closest('#updateUserContainer').length &&
            !$(e.target).closest('#updateSupplierContainer').length &&
            !$(e.target).closest('#updateWarehouseReceiptContainer').length &&
            !$(e.target).closest('#updateWarrantyContainer').length &&
            !$(e.target).closest('#updatePermissionContainer').length &&
            !$(e.target).closest('#updateDiscountContainer').length &&
            !$(e.target).closest('#addCategoryContainer').length &&
            !$(e.target).closest('#addProductContainer').length &&
            !$(e.target).closest('#addOrderContainer').length &&
            !$(e.target).closest('#addCustomerContainer').length &&
            !$(e.target).closest('#addUserContainer').length &&
            !$(e.target).closest('#addSupplierContainer').length &&
            !$(e.target).closest('#addWarehouseReceiptContainer').length &&
            !$(e.target).closest('#addWarrantyContainer').length &&
            !$(e.target).closest('#addPermissionContainer').length &&
            !$(e.target).closest('#addDiscountContainer').length &&
            !$(e.target).closest('#detailOrderContainer').length &&
            !$(e.target).closest('#detailWarehouseReceiptContainer').length &&
            !$(e.target).closest('#productsByCategoryViewContainer').length) {
            $('#updateCategoryContainer').hide();
            $('#updateProductContainer').hide();
            $('#updateOrderContainer').hide();
            $('#updateCustomerContainer').hide();
            $('#updateUserContainer').hide();
            $('#updateSupplierContainer').hide();
            $('#updateWarehouseReceiptContainer').hide();
            $('#updateWarrantyContainer').hide();
            $('#updatePermissionContainer').hide();
            $('#updateDiscountContainer').hide();
            $('#addCategoryContainer').hide();
            $('#addProductContainer').hide();
            $('#addOrderContainer').hide();
            $('#addCustomerContainer').hide();
            $('#addUserContainer').hide();
            $('#addSupplierContainer').hide();
            $('#addWarehouseReceiptContainer').hide();
            $('#addWarrantyContainer').hide();
            $('#addPermissionContainer').hide();
            $('#addDiscountContainer').hide();
            $('#detailOrderContainer').hide();
            $('#detailWarehouseReceiptContainer').hide();
            $('#productsByCategoryViewContainer').hide();
            $(".overlay").hide();
        }
    });


});
