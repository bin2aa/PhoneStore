<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/admin/css/common.css">
    <!-- Thư viện BootStrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Thêm danh mục sản phẩm</title>
</head>

<body>
    <div class="addCategory">
        <h2>Thêm danh mục sản phẩm</h2>
        <form class="categorySubmitAdd" action="index.php?ctrl=categoryController&action=addCategory" method="post">
            <div class="mb-3">
                <label for="ten" class="form-label">Tên danh mục:</label>
                <input type="text" name="ten" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Thêm danh mục</button>
        </form>
    </div>
</body>

<script>
    // $(document).ready(function() {
    //     // $('form.categorySubmit').on('submit', function(e) {
    //     $(document).on('submit', 'form.categorySubmit', function(e) {
    //         e.preventDefault();
    //         var url = $(this).attr('action');
    //         var type = $(this).attr('method');
    //         var data = form.serialize();
    //         $.ajax({
    //             url: url,
    //             type: type,
    //             data: data,
    //             success: function(response) {
    //                 alert(response);
    //             }
    //         });
    //     });
    // });
</script>

</html>
