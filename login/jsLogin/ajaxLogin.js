
$(document).ready(function () {



    // ------------------- Đăng nhập -------------------


    $('.login_form').submit(function (event) {
        event.preventDefault(); // Ngăn chặn gửi form mặc định
        var formData = $(this).serialize();
        $.ajax({
            type: 'POST',
            url: 'index.php?ctrl=loginController&action=login',
            data: formData,
            success: function (response) {
                var error = response.match(/Tên đăng nhập hoặc mật khẩu không đúng./);
                var susses = response.match(/Đăng nhập thành công/);
                if (error) {
                    $('#login-error').text('Tên tài khoản hoặc mật khẩu không chính xác.').show();
                }
                else {
                    $('#login-error').hide();
                }
                if (susses) {
                    alert("Đăng nhập thành công!");
                    window.location.href = '/user/index.php?ctrl=productControllerUser';
                }


            },
            error: function (xhr, status, error) {
                alert("Có lỗi xảy ra. Vui lòng thử lại sau.");
            }
        });
    });




    // ------------------- Đăng ký -------------------
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




    $('.changePassword').on('submit', function (e) {
        e.preventDefault();
        var url = $(this).attr('action');
        var data = $(this).serialize();
        $.ajax({
            url: url,
            type: 'POST',
            data: data,
            success: function (response) {
                var confirmpassworderror = response.match(/confirm-password-error/);
                if (confirmpassworderror) {
                    $('#confirm-password-error').text('Mật khẩu không khớp.').show();
                } else {
                    $('#confirm-password-error').hide();
                }

                // Kiểm tra nếu có lỗi mật khẩu cũ không đúng
                var paswordOldErrorMatch = response.match(/paswordOldErrorMatch/);
                if (paswordOldErrorMatch) {
                    $('#paswordOldErrorMatch').text('Mật khẩu củ không đúng!').show();
                }
                else {
                    $('#paswordOldErrorMatch').hide();
                }

                if (!paswordOldErrorMatch && !confirmpassworderror) {
                    $('#paswordOldErrorMatch').hide();
                    $('#confirm-password-errore').hide();
                    alert("Đăng ký thành công!");
                    window.location.href = '/user/index.php?ctrl=customerUserController';
                }
                console.log(response);
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });

});