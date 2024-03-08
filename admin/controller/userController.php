<?php
include(__DIR__ . '/../model/userModel.php');

class UserController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }
    public function showUserList()
    {
        $users = $this->userModel->getAllUsers();
        include __DIR__ . '/../view/userView.php';
    }

    public function showAddUserForm()
    {
        include __DIR__ . '/../view/addUser.php';
    }

    public function addUser()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ten = $_POST['ten'];
            $ten_dang_nhap = $_POST['ten_dang_nhap'];
            $mat_khau = $_POST['mat_khau'];
            $vai_tro = $_POST['vai_tro'];

            $result = $this->userModel->createUser($ten, $ten_dang_nhap, $mat_khau, $vai_tro);

            if ($result) {
                echo "Thêm người dùng thành công!";
            } else {
                echo "Thêm người dùng không thành công.";
            }
        }
    }
    public function deleteUser()
    {
        if (isset($_GET['id'])) {
            $user_id = $_GET['id'];
            $result = $this->userModel->deleteUser($user_id);
        }
    }
    public function showUpdateUserForm()
    {
        if (isset($_GET['id'])) {
            $user_id = $_GET['id'];
            $user = $this->userModel->getUserById($user_id);
            include __DIR__ . '/../view/updateUser.php';
        }
    }

    public function updateUser()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $user_id = $_POST['user_id'];
            $ten = $_POST['ten'];
            $ten_dang_nhap = $_POST['ten_dang_nhap'];
            $mat_khau = $_POST['mat_khau'];
            $vai_tro = $_POST['vai_tro'];

            $result = $this->userModel->updateUser($user_id, $ten, $ten_dang_nhap, $mat_khau, $vai_tro);

            if ($result) {
                echo "Cập nhật người dùng thành công!";
            } else {
                echo "Cập nhật người dùng không thành công.";
            }
        }
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

            $user = $this->userModel->getUserByUsernameAndPassword($username, $password);

            if ($user) {
                // Đăng nhập thành công, lưu thông tin người dùng vào session
                Session::startSession();
                Session::setSessionValue('user_id', $user['id']);
                Session::setSessionValue('username', $user['ten_dang_nhap']);
                // Chuyển hướng đến trang chính sau khi đăng nhập thành công
                // header('Location: index.php');
                echo '<script>alert("Đăng nhập thành công"); window.location.href = "index.php";</script>';
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
    $action = 'showUserList';
}

$userController = new UserController();
switch ($action) {
    case 'index':
        $userController->showUserList();
        break;
    case 'loginView':
        $userController->loginView();
        break;
    case 'login':
        $userController->login();
        break;
    case 'viewAddUser':
        $userController->showAddUserForm();
        break;
    case 'addUser':
        $userController->addUser();
        break;
    case 'deleteUser':
        $userController->deleteUser();
        break;
    case 'updateUserView':
        $userController->showUpdateUserForm();
        break;
    case 'updateUser':
        $userController->updateUser();
        break;
    default:
        $userController->showUserList();
}
