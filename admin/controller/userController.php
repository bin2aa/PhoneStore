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
        if ($_SESSION['qlnguoi_dung'] != 1) {
            exit("Bạn không có quyền truy cập vào trang này!");
        }
        $users = $this->userModel->getAllUsers();


        if (isset($_GET['search'])) {
            $keyword = $_GET['search'];
            $users = $this->userModel->searchUser($keyword);
        }

        include __DIR__ . '/../view/userView.php';
    }

    public function showAddUserForm()
    {
        $users = $this->userModel->getAllPermissionsSelect();
        include __DIR__ . '/../view/addUser.php';
    }

    public function addUser()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ten_dang_nhap = $_POST['ten_dang_nhap'];
            $mat_khau = $_POST['mat_khau'];
            $vai_tro = $_POST['vai_tro'];
            $trang_thai = $_POST['trang_thai'];


            if ($this->userModel->checkUsernameExists($ten_dang_nhap)) {
                echo "Tên đăng nhập đã tồn tại. Vui lòng chọn tên đăng nhập khác.";
                return; // Dừng lại và không thực hiện thêm người dùng mới
            }
            $result = $this->userModel->createUser($ten_dang_nhap, $mat_khau, $vai_tro, $trang_thai);

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
            $permissions = $this->userModel->getAllPermissionsSelect();
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
            $trang_thai = $_POST['trang_thai'];

            $result = $this->userModel->updateUser($user_id, $ten_dang_nhap, $mat_khau, $vai_tro, $trang_thai);

            if ($result) {
                echo "Cập nhật người dùng thành công!";
            } else {
                echo "Cập nhật người dùng không thành công.";
            }
        }
    }

    public function toggleUserStatus()
    {
        if (isset($_GET['id']) && isset($_GET['status'])) {
            $user_id = $_GET['id'];
            $current_status = $_GET['status'];

            $new_status = ($current_status == 1) ? 0 : 1; // Đổi trạng thái

            $result = $this->userModel->updateUserStatus($user_id, $new_status);

            // if ($result) {
            //     // header('Location: index.php?ctrl=userController');
            //     // echo "<script> window.location.href='index.php?ctrl=userController' </script>";
            //     // exit();
            // } else {
            //     echo 'Đã xảy ra lỗi khi đổi trạng thái người dùng.';
            // }
        } else {
            echo 'Thiếu tham số id hoặc status.';
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
    case 'toggleUserStatus':
        $userController->toggleUserStatus();
        break;
    default:
        $userController->showUserList();
}
