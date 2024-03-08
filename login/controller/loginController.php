<?php
include(__DIR__ . '/../model/loginModel.php');
// include(__DIR__ . '/../../lib/session.php');
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
                echo '<script>alert("Đăng nhập thành công"); window.location.href = "/user/index.php";</script>';
            } else {
                // Đăng nhập không thành công, hiển thị thông báo lỗi
                echo "Tên đăng nhập hoặc mật khẩu không đúng.";
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
    default:
        $loginController->loginView();
}
