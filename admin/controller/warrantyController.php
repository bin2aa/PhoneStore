<?php
include(__DIR__ . '/../model/warrantyModel.php');

class WarrantyController
{
    private $warrantyModel;

    public function __construct()
    {
        $this->warrantyModel = new WarrantyModel();
    }

    public function showWarrantyList()
    {
        if ($_SESSION['qlbao_hanh'] != 1) {
            exit("Bạn không có quyền truy cập vào trang này!");
        }
        $warranties = $this->warrantyModel->getAllWarranties();

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            if (isset($_GET['search'])) {
                $keyword = $_GET['search'];
                $warranties = $this->warrantyModel->searchWarranty($keyword);
            }
        }

        include __DIR__ . '/../view/warrantyView.php';
    }

    public function showAddWarrantyForm()
    {

        $orders = $this->warrantyModel->getAllOrderSelect();
        $products = $this->warrantyModel->getAllProductSelect();
        include __DIR__ . '/../view/addWarranty.php';
    }

    public function addWarranty()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id_san_pham = $_POST['id_san_pham'];
            $id_don_hang = $_POST['id_don_hang'];
            $ngay_lap = $_POST['ngay_lap'];
            $ngay_het_han = $_POST['ngay_het_han'];
            $tinh_trang = $_POST['tinh_trang'];
            $ghi_chu = $_POST['ghi_chu'];

            // Lấy ngày hiện tại
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $ngay_hien_tai = date('Y-m-d H:i:s');

            // Kiểm tra nếu ngày hết hạn vượt qua ngày hiện tại
            if ($ngay_het_han < $ngay_hien_tai) {
                // Nếu vượt qua, cập nhật tình trạng thành "Hết hạn bảo hành"
                $tinh_trang = 'Hết hạn bảo hành';
            }

            $result = $this->warrantyModel->createWarranty($id_san_pham, $id_don_hang, $ngay_lap, $ngay_het_han, $tinh_trang, $ghi_chu);

            if ($result) {
                echo "Thêm phiếu bảo hành thành công!";
            } else {
                echo "Thêm phiếu bảo hành không thành công.";
            }
        }
    }


    public function showUpdateWarrantyForm()
    {
        if (isset($_GET['id'])) {
            $warranty_id = $_GET['id'];
            $warranty = $this->warrantyModel->getWarrantyById($warranty_id);
            $orders = $this->warrantyModel->getAllOrderSelect();
            $products = $this->warrantyModel->getAllProductSelect();
            $statuses = ['Đang bảo hành', 'Chờ xử lý', 'Đã từ chối', 'Đã hoàn thành', 'Hết hạn bảo hành'];
            include __DIR__ . '/../view/updateWarranty.php';
        }
    }

    public function updateWarranty()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $warranty_id = $_POST['warranty_id'];
            $id_san_pham = $_POST['id_san_pham'];
            $id_don_hang = $_POST['id_don_hang'];
            $ngay_lap = $_POST['ngay_lap'];
            $ngay_het_han = $_POST['ngay_het_han'];
            $tinh_trang = $_POST['tinh_trang'];
            $ghi_chu = $_POST['ghi_chu'];

            // Lấy ngày hiện tại
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $ngay_hien_tai = date('Y-m-d H:i:s');

            // So sánh ngày hết hạn với ngày hiện tại
            if ($ngay_het_han < $ngay_hien_tai) {
                // Nếu Ngày hết hạn vượt qua ngày hiện tại, cập nhật tình trạng thành "Hết hạn bảo hành"
                $tinh_trang = 'Hết hạn bảo hành';
            }

            $result = $this->warrantyModel->updateWarranty($warranty_id, $id_san_pham, $id_don_hang, $ngay_lap, $ngay_het_han, $tinh_trang, $ghi_chu);

            if ($result) {
                echo "Cập nhật phiếu bảo hành thành công!";
            } else {
                echo "Cập nhật phiếu bảo hành không thành công.";
            }
        }
    }


    // Phương thức để xóa phiếu bảo hành
    public function deleteWarranty()
    {
        if (isset($_GET['id'])) {
            $warranty_id = $_GET['id'];
            $result = $this->warrantyModel->deleteWarranty($warranty_id);

            if ($result) {
                echo "Xóa phiếu bảo hành thành công!";
            } else {
                echo "Xóa phiếu bảo hành không thành công.";
            }
        }
    }
}

$action = 'index';
if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'showWarrantyList';
}

$warrantyController = new WarrantyController();
switch ($action) {
    case 'index':
        $warrantyController->showWarrantyList();
        break;
    case 'viewAddWarranty':
        $warrantyController->showAddWarrantyForm();
        break;
    case 'addWarranty':
        $warrantyController->addWarranty();
        break;
    case 'deleteWarranty':
        $warrantyController->deleteWarranty();
        break;
    case 'updateWarrantyView':
        $warrantyController->showUpdateWarrantyForm();
        break;
    case 'updateWarranty':
        $warrantyController->updateWarranty();
        break;
    default:
        $warrantyController->showWarrantyList();
}
