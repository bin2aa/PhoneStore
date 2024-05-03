<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm danh mục sản phẩm</title>
</head>

<body>
    <div class="addCategory">
        <!-- <div class="text-end">
            <button type="button" id="closeContainer">
                <span>&times;</span>
            </button>
        </div> -->
        <h2>Thêm danh mục sản phẩm</h2>
        <form class="categorySubmitAdd" action="index.php?ctrl=categoryController&action=addCategory" method="post">
            <label for="ten">Tên danh mục:</label>
            <input type="text" name="ten" required><br><br>
            <button type="submit">Thêm danh mục</button>
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