$(document).ready(function () {

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

    // --------------------------   NOTE   ---------------------
    // Tìm kiếm danh mục
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

    $('form.filterOrder').submit(function (event) {
        event.preventDefault();
        var fromDate = $('input[name="from_date"]').val();
        var toDate = $('input[name="to_date"]').val();
        $.ajax({
            url: 'index.php',
            method: 'GET',
            data: {
                ctrl: 'orderController',
                action: 'filterOrder',
                from_date: fromDate,
                to_date: toDate
            },
            success: function (data) {
                $('table').html($(data).find('table').html());
            }
        });
    });


});

