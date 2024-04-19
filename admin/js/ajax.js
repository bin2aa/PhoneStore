$(document).ready(function () {



    // // Tìm kiếm danh mục
    // $('form.search-form-product').submit(function (event) {
    //     event.preventDefault();
    //     var keyword = $('#search').val();
    //     $.ajax({
    //         url: 'index.php?ctrl=productController&action=searchProducts&search=' + keyword,
    //         method: 'GET',
    //         success: function (data) {
    //             $('table').html($(data).find('table').html());
    //         }
    //     });
    // });


    // // Tìm kiếm sản phẩm
    // $('form.search-form-category').submit(function (event) {
    //     event.preventDefault();
    //     var keyword = $('#search').val();
    //     $.ajax({
    //         url: 'index.php?ctrl=categoryController&action=index&search=' + keyword,
    //         method: 'GET',
    //         success: function (data) {
    //             $('table').html($(data).find('table').html());
    //         }
    //     });
    // });

    // Hàm tìm kiếm tổng quát yamatekudasai
    function handleSearchForm(formClass, controller) {
        $(formClass).submit(function (event) {
            event.preventDefault();
            var keyword = $('#search').val();
            $.ajax({
                url: 'index.php?ctrl=' + controller + '&search=' + keyword,
                method: 'GET',
                success: function (data) {
                    $('table').html($(data).find('table').html());
                }
            });
        });
    }

    // Tìm kiếm danh mục sản phẩm
    handleSearchForm('form.search-form-product', 'productController');

    // Tìm kiếm sản phẩm
    handleSearchForm('form.search-form-category', 'categoryController');

    //Tìm kiếm đơn đặt hàng
    handleSearchForm('form.search-form-order', 'orderController');

    //Tìm kiếm khách hàng
    handleSearchForm('form.search-form-customer', 'customerController');

    //Tìm kiếm người dùng
    handleSearchForm('form.search-form-user', 'userController');

    //Tìm kiếm nhà cung cấp
    handleSearchForm('form.search-form-supplier', 'supplierController');

    //Tìm kiếm nhập kho
    handleSearchForm('form.search-form-warehouse', 'warehouseController');

    // Tìm kiếm bảo hành
    handleSearchForm('form.search-form-warranty', 'warrantyController');






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


    //danh mục
    $("a.addCategoryLink").click(function (e) {
        e.preventDefault(); // Ngăn chặn hành động mặc định của thẻ a

        $.ajax({
            url: "index.php?ctrl=categoryController&action=viewAddCategory",
            method: "GET",
            success: function (data) {
                // Lấy nội dung của phần tử có class "addCategory"
                var addCategoryContent = $(data).find(".addCategory").html();
                // Hiển thị nội dung trong một modal hoặc một phần tử mới
                $("#addCategoryContainer").html(addCategoryContent).show();
            }
        });
    });

    // Đóng modal khi click vào nút đóng
    // $(document).on("click", "#addCategoryContainer .close-btn", function () {
    //     $("#addCategoryContainer").hide();
    // });



});
