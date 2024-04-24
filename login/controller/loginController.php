<?php
include(__DIR__ . '/../model/loginModel.php');
include(__DIR__ . '/../../lib/session.php');


include(__DIR__ . '/../../lib/PHPMailer-master/src/Exception.php');
include(__DIR__ . '/../../lib/PHPMailer-master/src/PHPMailer.php');
include(__DIR__ . '/../../lib/PHPMailer-master/src/SMTP.php');

class loginController
{
    private $loginModel;

    public function __construct()
    {
        $this->loginModel = new loginModel();
    }

    public function loginView()
    {
        include __DIR__ . '/../view/loginView.php';
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $login = $this->loginModel->getUserByUsernameAndPassword($username, $password);

            if ($login) {
                if ($login['trang_thai'] == 0 && $login['vai_tro'] !== 'Quản trị viên') {
                    echo "Tài khoản của bạn đã bị khóa. Vui lòng liên hệ quản trị viên để biết thêm thông tin.; </script>";
                    exit;
                }
                // Đăng nhập thành công, lưu thông tin người dùng vào session
                Session::startSession();
                Session::setSessionValue('login_id', $login['id']);
                Session::setSessionValue('ten_dang_nhap', $login['ten_dang_nhap']);
                Session::setSessionValue('vai_tro', $login['vai_tro']);

                // Lấy thông tin quyền từ bảng phan_quyen
                $vai_tro = Session::getSessionValue('vai_tro');
                $permission = $this->loginModel->getUserPermissionsByRole($vai_tro);

                // Thiết lập giá trị cho các biến session tương ứng với các quyền
                foreach ($permission as $key => $value) {
                    Session::setSessionValue($key, $value);
                }

                $customer = $this->loginModel->getCustomerById($login['id']);
                if ($customer) {
                    Session::setSessionValue('id_khach_hang', $customer['id']);
                }
                echo '<script>alert("Đăng nhập thành công"); window.location.href = "/user/index.php";</script>';
            } else {
                // Đăng nhập không thành công, hiển thị thông báo lỗi
                echo "Tên đăng nhập hoặc mật khẩu không đúng.";
            }
        }
    }

    public function logout()
    {
        Session::startSession();
        Session::destroySession();
        echo '<script>alert("Đăng xuất thành công"); window.location.href = "/user/index.php";</script>';
    }

    public function registerView()
    {
        include __DIR__ . '/../view/registerView.php';
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ten_dang_nhap = $_POST['ten_dang_nhap'];
            $mat_khau = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];
            $ho_ten = $_POST['ho_ten'];
            $email = $_POST['email'];
            $dia_chi = $_POST['dia_chi'];
            $so_dien_thoai = $_POST['so_dien_thoai'];

            if ($mat_khau !== $confirm_password) {
                echo 'confirm_password_error';
                return;
            }

            $email_exists = $this->loginModel->checkEmailExists($email);
            if ($email_exists) {
                $errors[] = 'email_exists';
            }
    
            $ten_dang_nhap_exists = $this->loginModel->checkUsernameExists($ten_dang_nhap);
            if ($ten_dang_nhap_exists) {
                $errors[] = 'username_exists';
            }
    
            if (!empty($errors)) {
                echo json_encode($errors);
                return;
            }

            try {
                $result = $this->loginModel->createUser($ten_dang_nhap, $mat_khau, $ho_ten, $email, $so_dien_thoai, $dia_chi);
                if ($result) {
                    echo 'success';
                } else {
                    echo 'error';
                }
            } catch (mysqli_sql_exception $e) {
                echo 'lỗi';
            }
        }
    }

    public function viewChangePassword()
    {
        include __DIR__ . '/../view/changePassword.php';
    }

    public function changePassword()
    {
        Session::startSession();
        $id_nguoi_dung = Session::getSessionValue('login_id');
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $mat_khau_moi = $_POST['new_password'];
            $confirm_password = $_POST['confirm_password'];
            // Kiểm tra xem mật khẩu mới và mật khẩu nhập lại có khớp nhau không
            if ($mat_khau_moi !== $confirm_password) {
                echo '<script>alert("Nhập lại mật khẩu không khớp"); window.location.href = "index.php?ctrl=loginController&action=viewChangePassword";</script>';
                exit; // Dừng việc thực thi tiếp nếu mật khẩu không khớp
            }
            $result = $this->loginModel->changePassword($id_nguoi_dung, $mat_khau_moi);
            if ($result) {
                echo '<script>alert("Đổi mật khẩu thành công"); window.location.href = "/user/index.php?ctrl=productControllerUser";</script>';
            } else {
                echo '<script>alert("Đổi mật khẩu không thành công"); window.location.href = "index.php?ctrl=loginController";</script>';
            }
        }
    }

    public function resetPassword()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];

            if ($this->loginModel->checkEmailExists($email)) {
                $token = $this->generateResetToken($email);
                $this->sendResetPasswordEmail($email, $token);
                echo '<script>alert("Yêu cầu đặt lại mật khẩu đã được gửi. Vui lòng kiểm tra email."); window.location.href = "index.php?ctrl=loginController";</script>';
            } else {
                echo '<script>alert("Email không tồn tại trong hệ thống."); window.location.href = "index.php?ctrl=loginController&action=resetPassword";</script>';
            }
        } else {
            include __DIR__ . '/../view/resetPassword.php';
        }
    }

    public function resetPasswordConfirm()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['token']) && isset($_POST['new_password'])) {
                $token = $_POST['token'];
                $new_password = $_POST['new_password'];
                $result = $this->loginModel->updatePassword($token, $new_password);
                if ($result) {
                    echo '<script>alert("Đổi mật khẩu thành công"); window.location.href = "index.php?ctrl=loginController";</script>';
                } else {
                    echo '<script>alert("Đổi mật khẩu không thành công"); window.location.href = "index.php?ctrl=loginController&action=resetPassword";</script>';
                }
            }
        } elseif (isset($_GET['token'])) {
            $token = $_GET['token'];
            include __DIR__ . '/../view/resetPasswordConfirm.php';
        } else {
            // Xử lý trường hợp không có token được gửi đến
            echo '<script>alert("Không tìm thấy mã token."); window.location.href = "index.php?ctrl=loginController&action=resetPassword";</script>';
        }
    }


    private function generateResetToken($email)
    {
        $token = bin2hex(random_bytes(16));
        $this->loginModel->saveResetToken($email, $token);
        return $token;
    }

    // private function sendRegistrationEmail($email, $name)
    // {
    //     // Sử dụng thư viện PHPMailer để gửi email


    //     $mail = new PHPMailer\PHPMailer\PHPMailer();
    //     $mail->CharSet = 'UTF-8';

    //     try {
    //         //Server settings
    //         $mail->SMTPDebug = 0;
    //         $mail->isSMTP();
    //         $mail->Host = 'smtp.gmail.com';
    //         $mail->SMTPAuth = true;
    //         $mail->Username = 'asjdasdasdsd@gmail.com'; // Thay bằng email của bạn
    //         $mail->Password = 'frev lkfh zkxb hbez'; // Thay bằng mật khẩu email của bạn
    //         $mail->SMTPSecure = 'tls';
    //         $mail->Port = 587;

    //         //Recipients
    //         $mail->setFrom('your_email@gmail.com', 'Website Name');
    //         $mail->addAddress($email, $name);

    //         //Content
    //         $mail->isHTML(true);
    //         $mail->Subject = 'Xác nhận đăng ký tài khoản';
    //         $mail->Body = 'Xin chào ' . $name . ',<br><br>Cảm ơn bạn đã đăng ký tài khoản trên trang web của chúng tôi.<br><br>Chúc bạn có một trải nghiệm tuyệt vời!<br><br>Trân trọng,<br>Đội ngũ Website Name';

    //         $mail->send();
    //         echo 'Message has been sent';
    //     } catch (Exception $e) {
    //         echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    //     }
    // }
    private function sendResetPasswordEmail($email, $token)
    {
        // Sử dụng thư viện PHPMailer để gửi email
        $mail = new PHPMailer\PHPMailer\PHPMailer();
        $mail->CharSet = 'UTF-8';

        try {
            //Server settings
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'asjdasdasdsd@gmail.com'; // Thay bằng email của bạn
            $mail->Password = 'frev lkfh zkxb hbez'; // Thay bằng mật khẩu email của bạn
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            //Recipients
            $mail->setFrom('your_email@gmail.com', 'Phonestore');
            $mail->addAddress($email);

            //Content
            $mail->isHTML(true); // Sử dụng plain text
            $mail->Subject = 'Đặt lại mật khẩu';
            $mail->Body = "Xin chào,\n\n"
                . "Vui lòng nhấp vào liên kết dưới đây để đặt lại mật khẩu của bạn:\n\n"
                . "<p><a href='http://localhost:3000/login/index.php?ctrl=loginController&action=resetPasswordConfirm&token=$token'>Đặt lại mật khẩu</a></p>"
                . "Nếu bạn không yêu cầu đặt lại mật khẩu, vui lòng bỏ qua email này.\n\n"
                . "Trân trọng,\n"
                . "Đội ngũ Phonestore";

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
    }
}

$action = 'index';
if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'loginView';
}

$loginController = new loginController();
switch ($action) {
    case 'loginView':
        $loginController->loginView();
        break;
    case 'login':
        $loginController->login();
        break;
    case 'logout':
        $loginController->logout();
        break;
    case 'registerView':
        $loginController->registerView();
        break;
    case 'register':
        $loginController->register();
        break;
    case 'viewChangePassword':
        $loginController->viewChangePassword();
        break;
    case 'changePassword':
        $loginController->changePassword();
        break;
    case 'resetPassword':
        $loginController->resetPassword();
        break;
    case 'resetPasswordConfirm':
        $loginController->resetPasswordConfirm();
        break;
    default:
        $loginController->loginView();
}
