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
                Session::setSessionValue('vai_tro', $login['vai_tro']);

                // Lấy thông tin quyền từ bảng phan_quyen
                $vai_tro = Session::getSessionValue('vai_tro');
                $permission = $this->loginModel->getUserPermissionsByRole($vai_tro);
                Session::setSessionValue('permission', $permission);

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

            // Kiểm tra xem mật khẩu nhập lại có khớp với mật khẩu ban đầu hay không
            if ($mat_khau !== $confirm_password) {
                echo '<script>alert("Nhập lại mật khẩu không khớp"); window.location.href = "index.php?ctrl=loginController&action=registerView";</script>';
                exit; // Dừng việc thực thi tiếp nếu mật khẩu không khớp
            }

            try {
                // Tạo người dùng mới cùng thông tin khách hàng
                $result = $this->loginModel->createUser($ten_dang_nhap, $mat_khau, $ho_ten, $email, $so_dien_thoai, $dia_chi);
                if ($result) {
                    echo '<script>alert("Đăng ký thành công"); window.location.href = "index.php?ctrl=loginController";</script>';
                } else {
                    echo '<script>alert("Đăng ký không thành công"); window.location.href = "index.php?ctrl=loginController&action=registerView";</script>';
                }
            } catch (mysqli_sql_exception $e) {
                // Xử lý khi tên tài khoản đã tồn tại hoặc có lỗi khác
                echo '<script>alert("Đã xảy ra lỗi khi đăng ký"); window.location.href = "index.php?ctrl=loginController&action=registerView";</script>';
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
    default:
        $loginController->loginView();
}