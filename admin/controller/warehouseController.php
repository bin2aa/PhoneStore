<?php
include(__DIR__ . '/../model/warehouseModel.php');

class WarehouseController
{
    private $warehouseModel;

    public function __construct()
    {
        $this->warehouseModel = new WarehouseModel();
    }

    public function showWarehouseReceiptList()
    {
        if ($_SESSION['qlnhap_kho'] != 1) {
            exit("Bạn không có quyền truy cập vào trang này!");
        }
        $warehouseReceipts = $this->warehouseModel->getAllWarehouseReceipts();
        if (isset($_GET['search'])) {
            $keyword = $_GET['search'];
            $warehouseReceipts = $this->warehouseModel->searchWarehouseReceipt($keyword);
        }
        include __DIR__ . '/../view/warehouseView.php';
    }

    public function showAddWarehouseReceiptForm()
    {
        $products = $this->warehouseModel->getAllProductSelect();
        $suppliers = $this->warehouseModel->getAllSupplierSelect();
        include __DIR__ . '/../view/addWarehouseReceipt.php';
    }

    public function addWarehouseReceipt()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id_nha_cung_cap = $_POST['id_nha_cung_cap'];
            $ngay = $_POST['ngay'];
            $ghi_chu = $_POST['ghi_chu'];

            // Lấy thông tin chi tiết đơn nhập hàng từ form
            $details = [];
            $i = 1;
            while (isset($_POST['id_san_pham_' . $i])) {
                $detail['id_san_pham'] = $_POST['id_san_pham_' . $i];
                $detail['so_luong'] = $_POST['so_luong_' . $i];
                $detail['gia'] = $_POST['gia_nhap_' . $i];  
                $details[] = $detail;
                $i++;
            }

            $result = $this->warehouseModel->addWarehouseReceipt($id_nha_cung_cap, $ngay, $ghi_chu, $details);

            if ($result) {
                echo "Thêm phiếu nhập kho thành công!";
            } else {
                echo "Thêm phiếu nhập kho không thành công.";
            }
        }
    }

    public function deleteWarehouseReceipt()
    {
        if (isset($_GET['id'])) {
            $warehouseReceipt_id = $_GET['id'];
            $result = $this->warehouseModel->deleteWarehouseReceipt($warehouseReceipt_id);
        }
    }

    public function showUpdateWarehouseReceiptForm()
    {
        if (isset($_GET['id'])) {
            $warehouseReceipt_id = $_GET['id'];
            $suppliers = $this->warehouseModel->getAllSupplierSelect();
            $warehouseReceipt = $this->warehouseModel->getWarehouseReceiptById($warehouseReceipt_id);
            include __DIR__ . '/../view/updateWarehouseReceipt.php';
        }
    }

    public function updateWarehouseReceipt()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $warehouseReceipt_id = $_POST['id'];
            $id_nha_cung_cap = $_POST['id_nha_cung_cap'];
            $ngay = $_POST['ngay'];
            $tong_tien = $_POST['tong_tien'];
            $ghi_chu = $_POST['ghi_chu'];

            $result = $this->warehouseModel->updateWarehouseReceipt($warehouseReceipt_id, $id_nha_cung_cap, $ngay, $tong_tien, $ghi_chu);

            if ($result) {
                echo "Cập nhật phiếu nhập kho thành công!";
            } else {
                echo "Cập nhật phiếu nhập kho không thành công.";
            }
        }
    }

    public function viewWarehouseDetail()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $warehousess = $this->warehouseModel->getWarehouseDetailsById($id);
            include __DIR__ . '/../view/warehouseDetailView.php';
        }
    }


    public function deleteWarehouseDetail()
    {
        if (isset($_GET['id'])) {
            $warehouseDetail_id = $_GET['id'];
            $result = $this->warehouseModel->deleteWarehouseDetail($warehouseDetail_id);
        }
    }
}

$action = 'showWarehouseReceiptList';
if (isset($_GET['action'])) {
    $action = $_GET['action'];
}

$warehouseController = new WarehouseController();

switch ($action) {
    case 'showWarehouseReceiptList':
        $warehouseController->showWarehouseReceiptList();
        break;
    case 'showAddWarehouseReceiptForm':
        $warehouseController->showAddWarehouseReceiptForm();
        break;
    case 'addWarehouseReceipt':
        $warehouseController->addWarehouseReceipt();
        break;
    case 'deleteWarehouseReceipt':
        $warehouseController->deleteWarehouseReceipt();
        break;
    case 'showUpdateWarehouseReceiptForm':
        $warehouseController->showUpdateWarehouseReceiptForm();
        break;
    case 'updateWarehouseReceipt':
        $warehouseController->updateWarehouseReceipt();
        break;
    case 'deleteWarehouseDetail':
        $warehouseController->deleteWarehouseDetail();
        break;
    case 'viewWarehouseDetail':
        $warehouseController->viewWarehouseDetail();
        break;
    default:
        $warehouseController->showWarehouseReceiptList();
}