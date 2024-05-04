<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kích hoạt tài khoản</title>
    <style>
    /* Style cho trang kích hoạt tài khoản */
    .container {
        width: 400px;
        margin: 0 auto;
        padding: 20px;
        text-align: center;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #f9f9f9;
    }

    .success-message {
        color: green;
        font-weight: bold;
    }

    .error-message {
        color: red;
        font-weight: bold;
    }
    </style>
</head>

<body>
    <div class="container">
        <?php if ($isActivated): ?>
        <div class="success-message">Tài khoản của bạn đã được kích hoạt thành công!</div>
        <?php else: ?>
        <div class="error-message">Kích hoạt tài khoản không thành công. Vui lòng thử lại.</div>
        <?php endif; ?>
    </div>
</body>

</html>