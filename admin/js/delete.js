$(document).ready(function () {

    $('a.deleteProductLink, a.deleteCategoryLink').click(function (event) {
        event.preventDefault();
        var deleteUrl = $(this).attr('href');
        var userConfirm = confirm('Bạn có chắc chắn muốn xóa sản phẩm này không?');
        if (userConfirm) {
            $.ajax({
                url: deleteUrl, // Sử dụng đường dẫn đã lấy
                method: 'GET',
                success: function (response) {
                    console.log(response);
                    alert('Sản phẩm đã được xóa thành công!');
                    location.reload();
                }
            });
        }
    });

});