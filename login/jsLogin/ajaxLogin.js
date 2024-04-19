// $(document).ready(function () {
//     $('.register_form').on('submit', function (e) {
//         e.preventDefault();
//         var formData = {
//             ten_dang_nhap: $('#ten_dang_nhap').val(),
//             password: $('#password').val(),
//             confirm_password: $('#confirm_password').val(),
//             ho_ten: $('#ho_ten').val(),
//             email: $('#email').val(),
//             dia_chi: $('#dia_chi').val(),
//             so_dien_thoai: $('#so_dien_thoai').val()
//         };
//         // Kiểm tra xác nhận mật khẩu
//         if (password !== confirmPassword) {
//             $('#confirm-password-error').text('Mật khẩu và xác nhận mật khẩu không khớp.').show();
//             return;
//         }else{
//             $('#confirm-password-error').text('').hide();
//         }

//         $.ajax({
//             type: "POST",
//             url: "index.php?ctrl=loginController&action=register",
//             data: formData,
//             success: function (response) {
//                 if (response === 'success') {
//                     alert("Đăng ký thành công!");
//                 }
//                 else if (response.trim() === 'user_exists') {
//                     alert("Tài khoản đã tồn tại. Vui lòng chọn tên đăng nhập khác.");
//                 }
//                 else if (response.trim() === 'email_exists') {
//                     alert("Email đã tồn tại. Vui lòng chọn email khác.");
//                 }


//             },
//             error: function () {
//                 alert("Có lỗi xảy ra. Vui lòng thử lại sau.");
//             }
//         });
//     });
// });


$(document).ready(function () {
    $('.register_form').submit(function (event) {
        event.preventDefault(); // Ngăn chặn gửi form mặc định



        var password = $('#password').val();
        var confirmPassword = $('#confirm_password').val();

        // Kiểm tra xác nhận mật khẩu
        if (password !== confirmPassword) {
            $('#confirm-password-error').text('Mật khẩu và xác nhận mật khẩu không khớp.').show();
            return;
        } else {
            $('#confirm-password-error').text('').hide();
        }

        var formData = $(this).serialize();
        $.ajax({
            type: 'POST',
            url: 'index.php?ctrl=loginController&action=register',
            data: formData,
            success: function (response) {
                var usernameErrorMatch = response.match(/username_exists/);
                var emailErrorMatch = response.match(/email_exists/);

                if (usernameErrorMatch) {
                    $('#username-exists-message').text('Tên tài khoản đã tồn tại!').show();
                } else {
                    $('#username-exists-message').hide();
                }
                if (emailErrorMatch) {
                    $('#email-exists-message').text('Email đã tồn tại!').show();
                } else {
                    $('#email-exists-message').hide();
                }

                if (!usernameErrorMatch && !emailErrorMatch) {
                    $('#username-exists-message').hide();
                    $('#email-exists-message').hide();
                    alert("Đăng ký thành công!");
                    window.location.href = 'index.php?ctrl=loginController';
                }
            },
            error: function (xhr, status, error) {
                alert("Có lỗi xảy ra. Vui lòng thử lại sau.");
            }
        });
    });
});