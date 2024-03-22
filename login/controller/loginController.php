<?php
include(__DIR__ . '/../model/loginModel.php');
include(__DIR__ . '/../../lib/session.php');
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
                // Đăng nhập thành công, lưu thông tin người dùng vào session
                Session::startSession();
                Session::setSessionValue('login_id', $login['id']);
                Session::setSessionValue('ten_dang_nhap', $login['ten_dang_nhap']);
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
    // public function checkLogin()
    // {
    //     Session::startSession();
    //     $ten_dang_nhap = Session::getSessionValue('ten_dang_nhap');
    //     if (!$ten_dang_nhap) {
    //         echo '<script>alert("Bạn chưa đăng nhập"); window.location.href = "/login/index.php?ctrl=loginController";</script>';
    //     }
    // }


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

            // Kiểm tra xem mật khẩu nhập lại có khớp với mật khẩu ban đầu hay không
            if ($mat_khau !== $confirm_password) {
                echo '<script>alert("Nhập lại mật khẩu không khớp"); window.location.href = "index.php?ctrl=loginController&action=registerView";</script>';
                exit; // Dừng việc thực thi tiếp nếu mật khẩu không khớp
            }

            try {
                // Tạo người dùng mới
                $result = $this->loginModel->createUser($ten_dang_nhap, $mat_khau);
                if ($result) {
                    echo '<script>alert("Đăng ký thành công"); window.location.href = "index.php?ctrl=loginController";</script>';
                } else {
                    echo '<script>alert("Đăng ký không thành công"); window.location.href = "index.php?ctrl=loginController&action=registerView";</script>';
                }
            } catch (mysqli_sql_exception $e) {
                // Xử lý khi tên tài khoản đã tồn tại
                echo '<script>alert("Tên tài khoản đã tồn tại"); window.location.href = "index.php?ctrl=loginController&action=registerView";</script>';
            }
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
    default:
        $loginController->loginView();
}
