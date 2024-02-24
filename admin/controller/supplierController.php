<?php
include(__DIR__ . '/../model/supplierModel.php');

class supplierController
{
    private $supplierModel;

    public function __construct()
    {
        $this->supplierModel = new supplierModel();
    }
    public function showSupplierList()
    {
        $suppliers = $this->supplierModel->getAllSuppliers();
        include __DIR__ . '/../view/supplierView.php';
    }

    public function showAddSupplierForm()
    {
        include __DIR__ . '/../view/addSupplier.php';
    }

    public function addSupplier()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ten = $_POST['ten'];
            $so_dien_thoai = $_POST['so_dien_thoai'];
            $email = $_POST['email'];
            $dia_chi = $_POST['dia_chi'];

            $result = $this->supplierModel->createSupplier($ten, $so_dien_thoai, $email, $dia_chi);

            if ($result) {
                echo "Thêm nhà cung cấp thành công!";
            } else {
                echo "Thêm nhà cung cấp không thành công.";
            }
        }
    }
    public function deleteSupplier()
    {
        if (isset($_GET['id'])) {
            $supplier_id = $_GET['id'];
            $result = $this->supplierModel->deleteSupplier($supplier_id);
        }
    }
    public function showUpdateSupplierForm()
    {
        if (isset($_GET['id'])) {
            $supplier_id = $_GET['id'];
            $supplier = $this->supplierModel->getSupplierById($supplier_id);
            include __DIR__ . '/../view/updateSupplier.php';
        }
    }
    
    public function updateSupplier()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $supplier_id = $_POST['id'];
            $ten = $_POST['ten'];
            $so_dien_thoai = $_POST['so_dien_thoai'];
            $email = $_POST['email'];
            $dia_chi = $_POST['dia_chi'];

            $result = $this->supplierModel->updateSupplier($supplier_id, $ten, $so_dien_thoai, $email, $dia_chi);

            if ($result) {
                echo "Cập nhật nhà cung cấp thành công!";
            } else {
                echo "Cập nhật nhà cung cấp không thành công.";
            }
        }
    }
    
}

$action = 'index';
if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'showSupplierList';
}

$supplierController = new supplierController();
switch ($action) {
    case 'index':
        $supplierController->showSupplierList();
        break;
    case 'viewAddSupplier':
        $supplierController->showAddSupplierForm();
        break;
    case 'addSupplier':
        $supplierController->addSupplier();
        break;
    case 'deleteSupplier':
        $supplierController->deleteSupplier();
        break;
    case 'updateSupplierView':
        $supplierController->showUpdateSupplierForm();
        break;
    case 'updateSupplier':
        $supplierController->updateSupplier();
        break;
    default:
        $supplierController->showSupplierList();
}
