<?php
include(__DIR__ . '/../model/permissionModel.php');

class PermissionController
{
    private $permissionModel;

    public function __construct()
    {
        $this->permissionModel = new PermissionModel();
    }

    public function showPermissionList()
    {
        if ($_SESSION['vai_tro'] != "Quản trị viên") {
            exit("Bạn không có quyền truy cập vào trang này!");
        }
        $permissions = $this->permissionModel->getAllPermissions();
        include(__DIR__ . '/../view/permissionView.php');
    }

    public function showAddPermissionForm()
    {


        if ($_SESSION['vai_tro'] != "Quản trị viên") {
            exit("Bạn không có quyền truy cập vào trang này!");
        }

        include(__DIR__ . '/../view/addPermission.php');
    }

    public function addPermission()
    {

        if ($_SESSION['vai_tro'] != "Quản trị viên") {
            exit("Bạn không có quyền truy cập vào trang này!");
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $role = $_POST['role'];
            $qlnhap_kho = isset($_POST['qlnhap_kho']) ? 1 : 0;
            $qlnha_cung_cap = isset($_POST['qlnha_cung_cap']) ? 1 : 0;
            $qlnguoi_dung = isset($_POST['qlnguoi_dung']) ? 1 : 0;
            $qlkhach_hang = isset($_POST['qlkhach_hang']) ? 1 : 0;
            $qldon_hang = isset($_POST['qldon_hang']) ? 1 : 0;
            $qlsan_pham = isset($_POST['qlsan_pham']) ? 1 : 0;
            $qldanh_muc = isset($_POST['qldanh_muc']) ? 1 : 0;
            $qlbao_hanh = isset($_POST['qlbao_hanh']) ? 1 : 0;
            $qlbinh_luan = isset($_POST['qlbinh_luan']) ? 1 : 0;
            $qlgiam_gia = isset($_POST['qlgiam_gia']) ? 1 : 0;

            $result = $this->permissionModel->createPermission($role, $qlnhap_kho, $qlnha_cung_cap, $qlnguoi_dung, $qlkhach_hang, $qldon_hang, $qlsan_pham, $qldanh_muc, $qlbao_hanh, $qlbinh_luan, $qlgiam_gia);

            if ($result) {
                echo "Thêm quyền thành công!";
            } else {
                echo "Thêm quyền không thành công.";
            }
        }
    }

    public function deletePermission()
    {


        if ($_SESSION['vai_tro'] != "Quản trị viên") {
            exit("Bạn không có quyền truy cập vào trang này!");
        }

        if (isset($_GET['role'])) {
            $role = $_GET['role'];
            $result = $this->permissionModel->deletePermission($role);
        }
    }

    public function showUpdatePermissionForm()
    {

        if ($_SESSION['vai_tro'] != "Quản trị viên") {
            exit("Bạn không có quyền truy cập vào trang này!");
        }

        if (isset($_GET['role'])) {
            $role = $_GET['role'];
            $permission = $this->permissionModel->getPermissionByRole($role);
            include(__DIR__ . '/../view/updatePermission.php');
        }
    }

    public function updatePermission()
    {


        if ($_SESSION['vai_tro'] != "Quản trị viên") {
            exit("Bạn không có quyền truy cập vào trang này!");
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $role = $_POST['role'];
            $qlnhap_kho = isset($_POST['qlnhap_kho']) ? 1 : 0;
            $qlnha_cung_cap = isset($_POST['qlnha_cung_cap']) ? 1 : 0;
            $qlnguoi_dung = isset($_POST['qlnguoi_dung']) ? 1 : 0;
            $qlkhach_hang = isset($_POST['qlkhach_hang']) ? 1 : 0;
            $qldon_hang = isset($_POST['qldon_hang']) ? 1 : 0;
            $qlsan_pham = isset($_POST['qlsan_pham']) ? 1 : 0;
            $qldanh_muc = isset($_POST['qldanh_muc']) ? 1 : 0;
            $qlbao_hanh = isset($_POST['qlbao_hanh']) ? 1 : 0;
            $qlbinh_luan = isset($_POST['qlbinh_luan']) ? 1 : 0;
            $qlgiam_gia = isset($_POST['qlgiam_gia']) ? 1 : 0;

            $result = $this->permissionModel->updatePermission($role, $qlnhap_kho, $qlnha_cung_cap, $qlnguoi_dung, $qlkhach_hang, $qldon_hang, $qlsan_pham, $qldanh_muc, $qlbao_hanh, $qlbinh_luan, $qlgiam_gia);

            if ($result) {
                echo "Cập nhật quyền thành công!";
            } else {
                echo "Cập nhật quyền không thành công.";
            }
        }
    }
}

// Xử lý hành động từ người dùng
$action = 'index';
if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'showPermissionList';
}

$permissionController = new PermissionController();
switch ($action) {
    case 'index':
        $permissionController->showPermissionList();
        break;
    case 'viewAddPermission':
        $permissionController->showAddPermissionForm();
        break;
    case 'addPermission':
        $permissionController->addPermission();
        break;
    case 'deletePermission':
        $permissionController->deletePermission();
        break;
    case 'updatePermissionView':
        $permissionController->showUpdatePermissionForm();
        break;
    case 'updatePermission':
        $permissionController->updatePermission();
        break;
    default:
        $permissionController->showPermissionList();
}
