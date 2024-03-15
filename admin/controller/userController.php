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
            $ten_dang_nhap = $_POST['ten_dang_nhap'];
            $mat_khau = $_POST['mat_khau'];
            $vai_tro = $_POST['vai_tro'];

            $result = $this->userModel->createUser($ten_dang_nhap, $mat_khau, $vai_tro);

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
            $ten_dang_nhap = $_POST['ten_dang_nhap'];
            $mat_khau = $_POST['mat_khau'];
            $vai_tro = $_POST['vai_tro'];

            $result = $this->userModel->updateUser($user_id, $ten_dang_nhap, $mat_khau, $vai_tro);

            if ($result) {
                echo "Cập nhật người dùng thành công!";
            } else {
                echo "Cập nhật người dùng không thành công.";
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
